<?php

namespace App\Http\Controllers\HT30;

use App\Http\Controllers\Base\ResouceController;
use App\Models\HT30\KpiResult;
use App\Models\HT30\Result;
use App\Services\HT30\ResultService;
use Illuminate\Http\Request;

class ResultController extends ResouceController
{
    function __construct(ResultService $service)
    {
        $this->middleware('auth');
        parent::__construct($service, array('active' => 'okrs'), '.key');
    }

    public function store(Request $request)
    {
        $kpi = KpiResult::select(['minus','result','ht30_kpi_result.id'])->join('ht30_kpis', 'ht30_kpi_result.kpi_id', '=', 'ht30_kpis.id')->find($request->kr_id);
        $result = $kpi->result - ($kpi->minus * $request->number);
//        return $kpi;
        $kpi->update(array('result' => $result));
        parent::storeRequest($request);
        return $this->show($request->kr_id);
    }

    public function destroy($id)
    {
        $result = Result::find($id);
        $kpi = KpiResult::select(['minus','result','ht30_kpi_result.id'])->join('ht30_kpis', 'ht30_kpi_result.kpi_id', '=', 'ht30_kpis.id')->find($result->kr_id);
//        return $kpi;
        $res = $kpi->result + ($kpi->minus * $result->number);
        KpiResult::find($kpi->id)->update(array('result' => $res));
        $result->update(array('status' => 1)); // TODO: Change the autogenerated stub
        return $this->show($kpi->id);
    }

    public function show($id)
    {
        $data = KpiResult::with('resultDetails')->select(['ht30_kpis.name', 'ht30_kpis.level','ht30_kpis.type','ht30_kpis.minus', 'ht30_kpi_result.month','ht30_kpi_result.id', 'ht30_kpi_result.result'])
            ->join('ht30_kpis', 'ht30_kpi_result.kpi_id', '=', 'ht30_kpis.id')
            ->find($id);
        if ($data['level'] == 2) $data['levelEdit'] = '<i class="fa fa-square" style="color: green" aria-hidden="true"></i>--5 Điểm';
        elseif ($data['level'] == 4) $data['levelEdit'] = '<i class="fa fa-square" style="color: yellow" aria-hidden="true"></i>--10 Điểm';
        elseif ($data['level'] == 6) $data['levelEdit'] = '<i class="fa fa-square" style="color: orange" aria-hidden="true"></i>--15 Điểm';
        else $data['levelEdit'] = '<i class="fa fa-square" style="color: red" aria-hidden="true"></i>--20 Điểm';
        if ($data['type'] == 0) $data['typeEdit'] = '%đạt';
        else $data['typeEdit'] = 'trừ' . $data['minus'] . '%/lỗi';
        return $data;
    }
}
