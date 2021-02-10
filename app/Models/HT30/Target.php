<?php

namespace App\Models\HT30;

use Illuminate\Database\Eloquent\Model;

class Target extends Model
{
    protected $fillable = [
        'name', 'description','level','status','create_by','modify_by'
    ];
    protected $fillable_store = [
        'name', 'description','level'
    ];
    protected $fillable_update = [
        'name', 'description'
    ];
    protected $table = "ht30_targets";
}
