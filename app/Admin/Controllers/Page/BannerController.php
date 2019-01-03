<?php

namespace App\Admin\Controllers\Page;

use App\Admin\Extensions\CusActionBtn;
use App\Admin\Extensions\Tools;
use App\Http\Controllers\Controller;
use App\Models\Page\Banner;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class BannerController extends Controller
{
    use HasResourceActions;

    /**
     * Index interface.
     *
     * @param Content $content
     * @return Content
     */
    public function index(Content $content)
    {
        return $content
            ->header('Banner管理')
            ->description('')
            ->body($this->grid());
    }

    /**
     * Show interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function show($id, Content $content)
    {
        return $content
            ->header('Detail')
            ->description('description')
            ->body($this->detail($id));
    }

    /**
     * Edit interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function edit($id, Content $content)
    {
        return $content
            ->header('Edit')
            ->description('description')
            ->body($this->form()->edit($id));
    }

    /**
     * Create interface.
     *
     * @param Content $content
     * @return Content
     */
    public function create(Content $content)
    {
        return $content
            ->header('创建banner')
            ->description('')
            ->body($this->form());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid($this->createBannerModel());
        $grid->column('id', 'ID')->sortable();
        $grid->column('big_img', '主图')
            ->display(function ($v) {
                $url = config('filesystems.disks.admin.url') . $v;
                return '<img src="' . $url . '"/>';
            });
        $grid->column('top_img', '顶部小图')
            ->display(function ($v) {
                $url = config('filesystems.disks.admin.url') . $v;
                return '<img src="' . $url . '"/>';
            });
        $grid->actions(function (Grid\Displayers\Actions $actions) {
            /**
             * @var Banner $model
             */
            $model = $actions->row;

            $url = "page/{$model->id}/sub-banner";
            $actions->append(new CusActionBtn([
                'url' => Tools::adminUrl($url),
                'name' => '下级banner',
                'color' => 'info'
            ]));

        });
        $grid->disableRowSelector();
        $grid->disableExport();
        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Banner::findOrFail($id));

        $show->field('id', 'ID');
        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form($this->createBannerModel());

        $form->display('id', 'ID');
        $form->image('big_img', '主要图片')
            ->rules('required');
        $form->image('top_img', '顶部小图')
            ->rules('required');
        $form->display('created_at', 'Created At');
        $form->display('updated_at', 'Updated At');

        $form->disableViewCheck();
        $form->disableEditingCheck();
        $form->disableCreatingCheck();

        return $form;
    }

    protected function createBannerModel()
    {
        return (new Banner());
    }
}
