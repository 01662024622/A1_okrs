<?php

namespace App\Models\HT30;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $fillable = [
        'kpi_id', 'date', 'description', 'number', 'status','create_by','modify_by'
    ];
    protected $fillable_store = [
        'kpi_id', 'date', 'description', 'number'
    ];
    protected $fillable_update = [
        'kpi_id', 'date', 'description', 'number'
    ];
    protected $table = "ht30_results";
}
