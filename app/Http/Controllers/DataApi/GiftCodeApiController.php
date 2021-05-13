<?php

namespace App\Http\Controllers\DataApi;

use App\Http\Controllers\Controller;
use App\Models\HT20\B20Customer;
use App\Models\HT50\GiftCustomer;
use App\Models\HT50\InforCustomerSurvey;
use App\Models\HT50\Revenue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class GiftCodeApiController extends Controller
{

    public function anyData(Request $request)
    {

        $data = B20Customer::select(DB::raw("
        B20Customer.Id as id,
        B20Customer.Code as code,
        B20Customer.Name as name,
        B20Customer.PhoneVT as phone1,
        ht50_information_customer_surveys.phone as phone2,
        B20Customer.Role_PT as role_pt,
        B20Customer.Role_CS as role_cs,
        ht50_information_customer_surveys.code as checks,
        ht50_revenues.coin as coin,
        ht50_revenues.used as used,
        ht50_revenues.level as level,
        ht50_revenues.total as total,
        ht50_revenues.`2020` as `2020`,
        (ht50_revenues.t1+ht50_revenues.t2+ht50_revenues.t3+
        ht50_revenues.t4+ht50_revenues.t5+ht50_revenues.t6+
        ht50_revenues.t7+ht50_revenues.t8+ht50_revenues.t9+
        ht50_revenues.t10+ht50_revenues.t11+ht50_revenues.t12) as `2021`
"))->leftjoin('ht50_revenues', 'B20Customer.Code', '=', 'ht50_revenues.code')
            ->leftjoin('ht50_information_customer_surveys', 'ht50_information_customer_surveys.code', '=', 'B20Customer.code')
            ->where('B20Customer.isActive', 1)
            ->where('B20Customer.isCustomer', 0)
            ->where('B20Customer.isGroup', 0);
        if ($request->role_pt != '') $data = $data->where('B20Customer.Role_PT', $request->role_pt);

        $data = $data->get();

//        return $data;
        return DataTables::of($data)
            ->addColumn('action', function ($dt) {
                if ($dt['checks'])
                    return '<button type="button" data-toggle="modal"  href="#manageGift"class="btn btn-xs btn-warning" onclick="getGift(`' . $dt['code'] . '`)">
			<i class="fa fa-gift" aria-hidden="true"></i></button>
			';
                else return '<button type="button" class="btn btn-xs btn-info" data-toggle="modal"
			onclick="getInfo(`https://cskh.htauto.vn/HT01/' . $dt['code'] . '`)" href="#add-modal"><i class="fas fa-eye"
			aria-hidden="true"></i></button>';
            })
            ->addColumn('availability', function ($dt) {
                if ($dt['coin'] == null) return "0";
                return $dt['coin'] - $dt['used'];
            })
            ->addColumn('phone', function ($dt) {
                if ($dt['phone2'] == null) return $dt['phone1'];
                return $dt['phone2'];
            })
            ->addColumn('process', function ($dt) {
                if (trim($dt['level']) == 'Platinum') return "hạng cao nhất";
                $process = $dt['2021'];
                $next = 200000000;
                if (trim($dt['level'])=== 'Gold')
                    $next = 2000000000;
                if (trim($dt['level']) === 'Titan')
                    $next = 1000000000;
                if (trim($dt['level']) === 'Silver')
                    $next = 500000000;
                return '<div class="plus-up">' . number_format($next-$process) . 'VNĐ</div><div class="progress">
  <div class="progress-bar" role="progressbar" style="width: ' . intval($process*100/$next) . '%;" aria-valuenow="' . intval($process*100/$next) . '" aria-valuemin="0" aria-valuemax="100">' . intval($process*100/$next) . '%</div>
</div>';
            })
            ->addIndexColumn()
            ->setRowId('data-{{$id}}')
            ->rawColumns(['action', 'process'])
            ->make(true);
    }

    public function anyGift(Request $request)
    {
        $data = GiftCustomer::select(DB::raw("ht50_gifts.name as name,ht50_gifts.coin as coin,ht50_gift_customer.created_at as date,ht50_gift_customer.id as id,ht50_gift_customer.code as code"))
            ->leftjoin('ht50_gifts', 'ht50_gifts.id', '=', 'ht50_gift_customer.gift_id')->where('ht50_gift_customer.customer_code', $request->id)->get();
        return DataTables::of($data)
            ->addIndexColumn()
            ->setRowId('data-{{$id}}')
            ->rawColumns(['action', 'process'])
            ->make(true);
    }
    public function anyCustomer(Request $request)
    {
        $data = InforCustomerSurvey::select(DB::raw("ht50_gifts.name as name,ht50_gifts.coin as coin,ht50_gift_customer.created_at as date,ht50_gift_customer.id as id,ht50_gift_customer.code as code"))
            ->leftjoin('ht50_gifts', 'ht50_gifts.id', '=', 'ht50_gift_customer.gift_id')->where('ht50_gift_customer.customer_code', $request->id)->get();
        return DataTables::of($data)
            ->addIndexColumn()
            ->setRowId('data-{{$id}}')
            ->rawColumns(['action', 'process'])
            ->make(true);
    }
}
