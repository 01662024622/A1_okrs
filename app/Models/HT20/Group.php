<?php

namespace App\Models\HT20;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = [
        'name', 'description','status','create_by','modify_by'
    ];
    protected $fillable_store = [
        'name', 'description'
    ];
    protected $fillable_update = [
        'name', 'description'
    ];
    public function users()
    {

    }
    protected $table = "ht20_groups";
}
