<?php

namespace App\Http\Controllers\HT50;

use App\Http\Controllers\Base\ResouceController;
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
        $data= SMS::where('status',5)->orderBy('id')->offset(300)->limit(100)->get();
//        return $data;
//        $data= SMS::where('status',0)->orderBy('id')->get();
        $count= 0;
        foreach ($data as $value){
            if (strlen($value->phone)==11) continue;
            $count++;
            $phone=$value->phone;
            $content="Cam on Quy khach da mua hang tai HT Auto. Vui long danh gia dich vu tai HT Auto: https://cskh.htauto.vn/HT02/".$value->code.". CSKH:0888315599. Tran trong cam on!";
            $SMSservice->sendSMS([$phone], $content, SpeedSMSApiServericeImpl::SMS_TYPE_BRANDNAME, "HTAUTO");
        }
//        395
        return $count;
    }
}
