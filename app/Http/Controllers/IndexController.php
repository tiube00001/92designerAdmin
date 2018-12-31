<?php
/**
 * Created by PhpStorm.
 * User: yhl
 * Date: 2018/12/23
 * Time: 下午3:54
 */

namespace App\Http\Controllers;

class IndexController extends Controller
{
    public function actionIndex()
    {
        return response()->view('front.index');
    }
}
