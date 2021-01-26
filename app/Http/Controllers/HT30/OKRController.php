<?php

namespace App\Http\Controllers\HT30;

use App\Http\Controllers\Base\ResouceController;
use App\Models\HT20\User;
use App\Models\HT30\Objects;
use App\Models\HT30\ObjectUser;
use App\Services\HT30\ObjectUserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OKRController extends ResouceController
{
    function __construct(ObjectUserService $service)
    {
        $this->middleware('auth');
        parent::__construct($service, array('active' => 'okrs'),'.key');
    }
    public function index()
    {
        $user = User::join('ht20_apartments', 'ht20_users.apartment_id', '=', 'ht20_apartments.id')
            ->where('ht20_users.status',0)
            ->where('ht20_apartments.status',0)
            ->where('ht20_apartments.id',Auth::user()->apartment_id)
            ->get(['ht20_users.id','ht20_users.name']);
        return parent::index()
            ->with('objects',Objects::where('status',0)->get())
            ->with('users',$user);
    }

    public function store(Request $request){
        return ObjectUser::updateOrCreate(
            ['user_id' => $request->user_id, 'object_id' =>  $request->object_id,'month_year' =>  $request->month_year],
            ['modify_by' => Auth::id(), 'percent' => $request->percent]
        );
    }
}
