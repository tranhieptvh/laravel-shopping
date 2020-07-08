<?php

namespace App;

use App\Components\Recursive;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    protected $fillable = ['name', 'parent_id', 'slug'];

    public function getCategory($parentId) {
        $data = Category::all();
        $recursive = new Recursive($data);
        $htmlOption = $recursive->recursive($parentId);

        return $htmlOption;
    }

    public function products() {
        return $this->hasMany(Product::class, 'product_id');
    }
}
