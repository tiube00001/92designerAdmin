<?php
/**
 * Created by PhpStorm.
 * User: yhl
 * Date: 2019/1/3
 * Time: 15:23
 */

namespace App\Admin\Extensions;

class CusActionBtn
{

    protected $data;
    public function __construct($data)
    {
        $this->data = $data;
    }

    protected function render()
    {
//        $data = [
//            'url' => '',
//            'name' => '',
//            'color' => '',
//            'size' => '',
//        ];
        $url = $this->data['url'] ?? 'javascript:void(0)';
        $name = $this->data['name'];
        $size = $this->data['size'] ?? 'xs';
        $color = $this->data['color'] ?? 'primary';

        return '<a class="btn btn-'.$size.' btn-'.$color.'" href="'.$url.'" style="margin: 5px 10px;">'.$name.'</a>';
    }
    public function __toString()
    {
        // TODO: Implement __toString() method.
        return $this->render();
    }
}