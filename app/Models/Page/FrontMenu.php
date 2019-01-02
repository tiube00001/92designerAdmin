<?php

namespace App\Models\Page;

use Encore\Admin\Traits\AdminBuilder;
use Encore\Admin\Traits\ModelTree;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

/**
 * Class FrontMenu
 * @package App
 */
class FrontMenu extends Model
{
    protected $table = 'front_menu';
    use Notifiable;
    use AdminBuilder, ModelTree {
        ModelTree::boot as treeBoot;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'parent_id',
        'order',
        'title',
        'icon',
        'uri',
        'permission'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];
}
