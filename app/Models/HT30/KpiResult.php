<?php

namespace App\Models\HT30;

use Illuminate\Database\Eloquent\Model;

class KpiResult extends Model
{

    protected $fillable = [
        'kpi_id', 'month', 'year', 'type','result','minus', 'status','create_by','modify_by'
    ];
    protected $fillable_store = [
        'kpi_id', 'month', 'year', 'type','result','minus'
    ];
    protected $fillable_update = [
        'result'
    ];
    protected $table = "ht30_kpi_result";
}
