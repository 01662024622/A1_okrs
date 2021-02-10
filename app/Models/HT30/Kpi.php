<?php

namespace App\Models\HT30;

use Illuminate\Database\Eloquent\Model;

class Kpi extends Model
{
    protected $fillable = [
        'name','td_id', 'description', 'level','status','create_by','modify_by'
    ];
    protected $fillable_store = [
       'name', 'td_id', 'description', 'level'
    ];
    protected $fillable_update = [
        'name','td_id', 'description'
    ];
    public function results()
    {
        return $this->hasMany(KpiResult::class,'kpi_id','id')
            ->where('status',0);
    }
    protected $table = "ht30_kpis";
}
