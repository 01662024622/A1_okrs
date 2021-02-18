<?php

namespace App\Http\Controllers\HT50;

use App\Http\Controllers\Controller;
use App\Services\HT50\SpeedSMSApiServerice;
use Illuminate\Http\Request;

class SMSController extends Controller
{
    private $service;
    function __construct(SpeedSMSApiServerice $service)
    {
        $this->service=$service;

    }

}
