<?php

namespace App\Models\HT00;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title', 'avata', 'slug', 'content', 'embed', 'role', 'create_by', 'modify_by'
    ];
    public $fillable_store = [
        'title', 'content', 'embed', 'role'
    ];
    public $fillable_update = [
        'title', 'content', 'embed', 'role'
    ];
    protected $table = "ht00_posts";

    public function category()
    {
        return $this->hasManyThrough(PostCategory::class, Category::class, 'post_id', 'category_id', 'id', 'id');
    }
}
