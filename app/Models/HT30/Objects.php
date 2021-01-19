<?php

namespace App\Models\HT30;

use Illuminate\Database\Eloquent\Model;

class Objects extends Model
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
    protected $table = "ht30_objects";
}
