<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        return response()->json(array('customers' => $customers), 200);
    }

    public function get($id)
    {
        $customer = Customer::whereId($id)->first();
        return respone()->json(["customers"=>$customer], 200);
    }

    public function save(Request $request)
    {
        $customer = Customer::create($request->only(['name', 'email', 'phone', 'website']));
        return respone()->json(["customers" => $customer], 200);
    }
}
