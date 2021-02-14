<?php

namespace App\Http\Controllers\DataApi;

use App\Http\Controllers\Controller;
use App\Models\HT30\Kpi;
use App\Models\HT30\Target;
use App\Models\HT30\TargetKpi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class TargetApiController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    public function anyData(Request $request)
    {
        $data = Target::leftJoin('ht30_target_kpi', function ($join) use ($request) {
            $join->on('ht30_target_kpi.target_id', '=', 'ht30_targets.id')
                ->where('ht30_target_kpi.user_id', $request->user_id)
                ->where('ht30_target_kpi.status', 0)
                ->where('ht30_target_kpi.year', $request->year);
        })
            ->select(['ht30_targets.name','ht30_targets.id', 'ht30_targets.level','ht30_target_kpi.user_id','ht30_target_kpi.id as td_id'])->where('ht30_targets.status', 0)
            ->where('ht30_targets.create_by', Auth::id())
            ->where('ht30_targets.status', 0)
            ->orderBy('ht30_targets.name')->get();

        // $products->user;
        return DataTables::of($data)
            ->addColumn('action', function ($dt) {
                return '
			<button type="button" class="btn btn-xs btn-danger" onclick="alDeleteTarget(' . $dt['id'] . ')">
			<i class="fa fa-trash" aria-hidden="true"></i></button>
			';
            })
            ->editColumn('level', function ($dt) {
                if ($dt['level'] == 2) return '<i class="fa fa-square" style="color: green" aria-hidden="true"></i>';
                elseif ($dt['level'] == 4) return '<i class="fa fa-square" style="color: yellow" aria-hidden="true"></i>';
                elseif ($dt['level'] == 6) return '<i class="fa fa-square" style="color: orange" aria-hidden="true"></i>';
                else return '<i class="fa fa-square" style="color: red" aria-hidden="true"></i>';
            })
            ->addIndexColumn()
            ->setRowId('target-{{$id}}')
            ->rawColumns(['action', 'level'])
            ->make(true);
    }
    public function anyDataResult(Request $request)
    {
        $data = Kpi::with('results')
            ->where('status', 0)
            ->whereIn('td_id', $request->kpis)
            ->orderBy('updated_at')->get();

        // $products->user;
        return DataTables::of($data)
            ->editColumn('level', function ($dt) {
                if ($dt['level'] == 2) return '<i class="fa fa-square" style="color: green" aria-hidden="true"></i>';
                elseif ($dt['level'] == 4) return '<i class="fa fa-square" style="color: yellow" aria-hidden="true"></i>';
                elseif ($dt['level'] == 6) return '<i class="fa fa-square" style="color: orange" aria-hidden="true"></i>';
                else return '<i class="fa fa-square" style="color: red" aria-hidden="true"></i>';
            })
            ->addIndexColumn()
            ->setRowId('kpi-{{$id}}')
            ->rawColumns(['action', 'level'])
            ->make(true);
    }
}
