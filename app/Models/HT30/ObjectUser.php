<?php

namespace App\Models\HT30;

use Illuminate\Database\Eloquent\Model;

class ObjectUser extends Model
{
    protected $fillable = [
        'user_id', 'object_id', 'percent', 'month_year', 'status','create_by','modify_by'
    ];
    protected $fillable_store = [
        'user_id', 'object_id', 'percent', 'month_year'
    ];
    protected $fillable_update = [
        'user_id', 'object_id', 'percent', 'month_year'
    ];
    protected $table = "ht30_object_user";
}
