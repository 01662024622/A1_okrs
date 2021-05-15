<?php

namespace App\Http\Controllers\Export;

use App\Exports\RevenueExport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
class ExportController extends Controller
{
    public function export($id){
        return Excel::download(new RevenueExport(['role_pt'=>$id]), 'KHTT'.time().'.xlsx');
    }
    public function total(){
        return Excel::download(new RevenueExport(['role_pt'=>'']), 'KHTT'.time().'.xlsx');
    }
}
