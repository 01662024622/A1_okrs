<?php

namespace App\Http\Controllers\DataApi;

use App\Http\Controllers\Controller;
use App\Models\HT20\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class GroupApiController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }
    public function anyData(Request $request)
    {

        $data = Group::select(DB::raw("ht20_groups.id,ht20_groups.name,ht20_groups.description,GROUP_CONCAT(CONCAT('- ', ht20_users.name) SEPARATOR '<br>') as users"))
            ->leftjoin('ht20_group_user', 'ht20_group_user.group_id', '=', 'ht20_groups.id')
            ->leftjoin('ht20_users', 'ht20_users.id', '=', 'ht20_group_user.user_id')
            ->where('ht20_groups.status', 0)->get();

        // $products->user;
        return DataTables::of($data)
            ->addColumn('action', function ($dt) {
                return '<button type="button" class="btn btn-xs btn-warning"data-toggle="modal"
			onclick="getInfo(' . $dt['id'] . ')" href="#add-modal"><i class="fas fa-pencil-alt"
			aria-hidden="true"></i></button>
			<button type="button" class="btn btn-xs btn-danger" onclick="alDelete(' . $dt['id'] . ')">
			<i class="fa fa-trash" aria-hidden="true"></i></button>
			';
            })
            ->addIndexColumn()
            ->setRowId('data-{{$id}}')
            ->rawColumns(['action','users'])
            ->make(true);
    }
    public function getListUserCategory(Request $request,$query){
        $listUser= (array)$request->input('users');
        if ($query==""){
            return Group::select('name','id')->where('status',0)->whereNotIn('id',$listUser)->get();
        }
        return Group::select('name','id')->where('status',0)->whereNotIn('id',$listUser)->where('name','LIKE','%'.$query.'%')->get();
    }
}
