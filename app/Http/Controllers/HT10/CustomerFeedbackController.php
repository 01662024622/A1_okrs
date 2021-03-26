<?php

namespace App\Http\Controllers\HT10;

use App\Models\HT10\CustomerFeedback;
use App\Models\HT20\B20Customer;
use App\Http\Controllers\Base\ResouceController;
use App\Services\HT10\CustomerFeedbackService;
use Illuminate\Http\Request;

class CustomerFeedbackController extends ResouceController
{
    function __construct(CustomerFeedbackService $service)
    {
        parent::__construct($service, array('active' => 'report_feedback', 'group' => 'manager'));
    }

    public function store(Request $request)
    {
        $data = $request->only(['name','phone','email', 'attitude', 'knowledge', 'time', 'cost', 'diversity', 'quality', 'note']);
         CustomerFeedback::create($data);
       return view('feedback.success');
    }

    public function destroy($id)
    {
    }
    public function show($id)
    {
        if (B20Customer::where("Code",$id)->first())
            return "true";
        else return response()
            ->json([
                'code' => 400,
                'message' => 'Mã khách hàng không hợp lệ!'
            ], 400);
    }

    public function index()
    {
        return view("feedback.customerFeedback");
    }
    public function create(){
        return view("feedback.customerFeedbackv1");
    }

}
