<?php

namespace App\Http\Controllers\HT30;

use App\Http\Controllers\Base\ResouceController;
use App\Http\Controllers\Controller;
use App\Models\HT30\Kpi;
use App\Services\HT30\KpiService;
use Illuminate\Http\Request;

class KpiController extends ResouceController
{
    function __construct(KpiService $service)
    {
        $this->middleware('auth');
        parent::__construct($service, array('active' => 'okrs'), '.key');
    }

    public function store(Request $request)
    {
        $data = [];
        if ($request->type == 1) {
            $data['result'] = 100;
        }
        return parent::storeRequest($request, $data);
    }
    public function create(Request $request)
    {
        return Kpi::whereIn('id',$request->kpis)->update(array('status'=>1));
    }
}