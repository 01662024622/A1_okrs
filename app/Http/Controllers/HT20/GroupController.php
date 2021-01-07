<?php

namespace App\Http\Controllers\HT20;

use App\Http\Controllers\Base\ResouceController;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreApartment;
use App\Models\HT20\User;
use App\Services\HT20\ApartmentService;
use App\Services\HT20\GroupService;
use App\Services\Impl\HT20\GroupServiceImpl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class GroupController extends ResouceController
{
    function __construct(GroupService $service)
    {
        $this->middleware('admin');
        parent::__construct($service, array('active' => 'groups'));
    }

    public function store(StoreApartment $request)
    {
        if ($request->has("id")) {
            $data = $request->only(['id', 'name', 'code', 'description', 'user_id']);
        } else {
            $data = $request->only(['name', 'code', 'description', 'user_id']);
        }
        return parent::storeRequest($request,$data);
    }
}
