<?php

namespace App\Models\HT00;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    protected $fillable = [
        'title', 'parent_id', 'status', 'slug', 'type', 'url','sort','role', 'create_by', 'modify_by'
    ];
    public $fillable_store = [
        'title', 'parent_id', 'type', 'url','role'
    ];
    public $fillable_update = [
        'title', 'parent_id', 'type', 'url','role'
    ];
    protected $table = "ht00_categories";
    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }
    public function mapping($array=[])
    {
//        $categoriesId= DB::select('SELECT id FROM ht00_categories ct WHERE role < 2 AND id NOT IN(
//                SELECT DISTINCT(category_id) as id FROM ht00_category_user us where us.role=2 AND us.user_id=93 UNION
//                SELECT ap.category_id as id FROM ht00_category_apartment ap where ap.role=2 and ap.apartment_id=24 AND ap.category_id NOT IN(
//                SELECT us.category_id as id FROM ht00_category_user us WHERE us.role=1 and us.user_id=93))
//                UNION
//                SELECT id FROM ht00_categories WHERE role = 2 AND id IN(
//                SELECT DISTINCT(category_id) as id FROM ht00_category_user us where us.role=1 AND us.user_id=93 UNION
//                SELECT ap.category_id as id FROM ht00_category_apartment ap where ap.role=1 and ap.apartment_id=24 AND ap.category_id NOT IN(
//                SELECT us.category_id as id FROM ht00_category_user us WHERE us.role=2 and us.user_id=93))');
//        $array=[];
//        foreach ($categoriesId as $id){
//            array_push($array,$id->id);
//        }
        return $this->hasMany(Category::class, 'parent_id', 'id')->orderBy('sort');
    }
}
