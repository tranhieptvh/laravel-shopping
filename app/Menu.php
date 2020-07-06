<?php

namespace App;

use App\Components\Recursive;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    use SoftDeletes;
    protected $fillable = ['name', 'parent_id', 'slug'];

    public function  getMenu($parentId) {
        $data = Menu::all();
        $recursive = new Recursive($data);
        $htmlOption = $recursive->recursive($parentId);

        return $htmlOption;
    }
}
