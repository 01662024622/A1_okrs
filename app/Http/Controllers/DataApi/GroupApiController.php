<?php

namespace App\Http\Controllers\DataApi;

use App\Http\Controllers\Controller;
use App\Models\HT20\Group;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class GroupApiController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }
    public function anyData(Request $request)
    {

        $data = Group::select('ht20_groups.*')->where('status', 0);

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
            ->rawColumns(['action'])
            ->make(true);
    }
}
