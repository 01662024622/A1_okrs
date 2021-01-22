<?php

namespace App\Http\Controllers\DataApi;

use App\Http\Controllers\Controller;
use App\Models\HT30\Objects;
use App\Models\HT30\ObjectUser;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class OkrApiController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    public function anyData(Request $request)
    {

        $data = ObjectUser::join('ht30_objects', 'ht30_object_user.object_id', '=', 'ht30_objects.id')
            ->leftJoin('ht30_keys', 'ht30_object_user.id', '=', 'ht30_keys.ou_id')
            ->get(['ht30_keys.*','ht30_object_user.percent']);

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
