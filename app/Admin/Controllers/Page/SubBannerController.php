<?php

namespace App\Admin\Controllers\Page;

use App\Admin\Extensions\CusActionBtn;
use App\Admin\Extensions\CusToolsBtn;
use App\Admin\Extensions\Tools;
use App\Http\Controllers\Controller;
use App\Models\Page\Banner;
use App\Models\Page\SubBanner;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use Illuminate\Http\Request;

class SubBannerController extends Controller
{
    use HasResourceActions;

    protected $parentId;

    public function __construct(Request $request)
    {
        $this->parentId = $request->route()->parameter('parentId');
    }

    /**
     * Index interface.
     *
     * @param Content $content
     * @param integer $parentId
     * @return Content
     */
    public function index(Content $content, $parentId)
    {
        $this->parentId = $parentId;
        return $content
            ->header('下级Banner管理')
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
        $grid = new Grid($this->createSubBannerModel());
        $grid->column('id', 'ID')->sortable();
        $grid->column('main_img', '图片')
            ->display(function ($v) {
                $url = Tools::storageUrl($v);
                return '<img src="'.$url.'"/>';
            });

        $grid->column('width', '宽（px）');
        $grid->column('height', '高（px）');
        $grid->column('summary', '描述');
        $grid->disableRowSelector();
        $grid->disableExport();
        $grid->tools(function (Grid\Tools $tools) {
            $tools->append(new CusToolsBtn([
                'name' => '上级banner列表',
                'color' => 'info',
                'icon' => 'fa fa-list',
                'loc' => 'right',
                'url' => Tools::adminUrl('page/banner'),
                'marginLeft' => 10
            ]));
        });
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
        $form = new Form($this->createSubBannerModel());

        $form->display('id', 'ID');
        $form->image('main_img', '图片')
            ->rules('required');
        $form->number('width', '宽度')
            ->help('单位px')
            ->rules('required');
        $form->number('height', '高度')
            ->help('单位px')
            ->rules('required');
        $form->text('summary', '描述文字')->rules('required|string|min:1|max:255');

        $form->display('created_at', 'Created At');
        $form->display('updated_at', 'Updated At');

        $form->disableViewCheck();
        $form->disableEditingCheck();
        $form->disableCreatingCheck();
        $parentId = $this->parentId;
        $form->saving(function (Form $form) use($parentId) {
            $form->model()->setAttribute('parent_id', $parentId);
        });

        return $form;
    }

    protected function createSubBannerModel()
    {
        return (new SubBanner());
    }
}
