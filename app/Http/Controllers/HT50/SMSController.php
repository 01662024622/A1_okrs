<?php

namespace App\Http\Controllers\HT50;

use App\Http\Controllers\Base\ResouceController;
use App\Models\HT50\InforCustomerSurvey;
use App\Models\HT50\SMS;
use App\Services\HT50\SMSService;
use App\Services\Impl\HT50\SpeedSMSApiServericeImpl;
use Illuminate\Http\Request;

class SMSController extends ResouceController
{
    function __construct(SMSService $service)
    {
        parent::__construct($service, array('active' => 'okrs'),'.key');
    }
    public function index()
    {
        $SMSservice = new SpeedSMSApiServericeImpl("I9NybjZuDjcA2Lfx2dAiLyFwSU3aFqAg");
//        $content="Chao mung Quy khach da tro thanh khach hang than thiet cua HTAuto Viet Nam. Chi tiet chuong trinh: https://htauto.com.vn/chinh-sach-khach . CSKH: 0888315599";
//        $data=$SMSservice->sendSMS($phone, $content, SpeedSMSApiServericeImpl::SMS_TYPE_BRANDNAME, "HTAUTO");
//        return $data;
//        $data= InforCustomerSurvey::orderBy('id')->offset(205)->limit(100)->get();
//        return $data;
        $data= SMS::where('status',0)->orderBy('id')->get();
        $count= 0;
        foreach ($data as $value){
            if (strlen($value->phone)>10) continue;
            if (strlen($value->phone)<10) continue;
            $count++;
            $phone=$value->phone;
            $content="Cam on Quy khach da mua hang tai HT Auto. Vui long danh gia dich vu tai HT Auto: https://cskh.htauto.vn/HT02/".$value->code.". CSKH:0888315599. Tran trong cam on!";
//            $content="Chao mung Quy khach da tro thanh khach hang than thiet cua HTAuto Viet Nam. Chi tiet chuong trinh: https://htauto.com.vn/chinh-sach-khach . CSKH: 0888315599";
            $SMSservice->sendSMS([$phone], $content, SpeedSMSApiServericeImpl::SMS_TYPE_BRANDNAME, "HTAUTO");
        }
//        395
        return $count;
    }
}
