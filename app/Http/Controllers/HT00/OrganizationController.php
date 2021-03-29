<?php

namespace App\Http\Controllers\HT00;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrganizationController extends Controller
{
    public function index(){
        return view('organization.col');
    }
    public function show($key){
        return view('organization.'.$key);
    }
}
