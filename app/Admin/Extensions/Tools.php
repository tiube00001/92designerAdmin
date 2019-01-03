<?php
/**
 * Created by PhpStorm.
 * User: yhl
 * Date: 2019/1/3
 * Time: 15:50
 */

namespace App\Admin\Extensions;

class Tools
{
    public static function adminUrl($url)
    {
        return '/'.config('admin.route.prefix').'/'.$url;
    }

    public static function storageUrl($url)
    {
        return config('filesystems.disks.admin.url') . $url;
    }
}