<?php

namespace App\Http\Controllers\HT50;

use App\Http\Controllers\Base\ResouceController;
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
        $data= parent::getService()->all();
        foreach ($data as $value){
            $phone=$value->phone;
            $content="Cam on Quy khach da mua hang tai HT Auto. Vui long danh gia dich vu tại HT Auto: https://cskh.htauto.vn/HT02/".$value->code." . CSKH:0888315599. Tran trong cam on va chuc Quy khach suc khoe.";
            $SMSservice->sendSMS([$phone], $content, SpeedSMSApiServericeImpl::SMS_TYPE_BRANDNAME, "HTAUTO");
        }
    }
}
