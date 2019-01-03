<?php

namespace App\Admin\Extensions;

use Encore\Admin\Admin;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\URL;


class CusToolsBtn
{
    protected $data;
    protected $urlParams;


    /**
     * CusToolsBtn constructor.
     * @param $data
     *
     */
    public function __construct($data)
    {
//       [
//            'name' => '列表',
//            'color' => 'default',
//            'icon' => 'fa fa-list',
//            'loc' => 'right',
//            'url' => '/admin/wx/live/index',
//            'marginLeft' => 10
//        ]

        $this->urlParams = Input::get();
        $this->data = $data;

        //&page=2&per_page=30
        $url = $this->data['url'];
        $con = strpos($url, '?') ? '&' : '?';
        if (isset($this->data['url']) && isset($this->urlParams['back'])) {

            $backData = $this->urlParams['back'];
            $this->data['url'] = $url."$con".http_build_query($backData);

        } elseif (isset($this->data['url']) && !isset($this->urlParams['back']) && $this->urlParams) {
            $params = $this->urlParams;
            unset($params['_pjax']);
            unset($params['pjax-container']);
            $this->data['url'] = $url.$con.http_build_query(['back' => $params]);
        }

    }

    protected function render()
    {
        $color = $this->data['color'] ?? 'default';
        $icon = $this->data['icon'] ?? '';
        $marginLeft = $this->data['marginLeft'] ?? '';
        $loc = $this->data['loc'] ?? 'none';
        return '<span></span><div class="btn-group pull-'.$loc.'" style="margin-right: 10px;'."margin-left:{$marginLeft}px;".'">
    <a href="'.$this->data['url'].'" class="btn btn-sm btn-'.$color.'"><i class="'.$icon.'"></i>&nbsp;'.$this->data['name'].'</a>
</div></span>';

    }

    public function __toString()
    {
        return $this->render();
    }
}