<?php

namespace App\Models\HT30;

use Illuminate\Database\Eloquent\Model;

class Key extends Model
{
    protected $fillable = [
        'ou_id', 'name', 'description', 'type', 'result','minus','percent','status','create_by','modify_by'
    ];
    protected $fillable_store = [
        'ou_id', 'name', 'description', 'type', 'result','percent','minus'
    ];
    protected $fillable_update = [
        'ou_id', 'name', 'description', 'type', 'result','percent','minus'
    ];
    protected $table = "ht30_keys";
}
