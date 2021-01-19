<?php

namespace App\Http\Controllers\HT30;

use App\Http\Controllers\Base\ResouceController;
use App\Services\HT30\KeyService;
use Illuminate\Http\Request;

class KeyController extends ResouceController
{
    function __construct(KeyService $service)
    {
        $this->middleware('auth');
        parent::__construct($service, array('active' => 'okrs'),'.key');
    }
    public function store(Request $request){
        return parent::storeRequest($request);
    }
}
