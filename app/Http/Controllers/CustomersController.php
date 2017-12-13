<?php

namespace App\Http\Controllers;

use App\Address;
use App\Company;
use App\Customer;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    public function index(){
        //Relationship in model must be set in order to work
        return response()->json(Customer::with(['address'])->get());
    }

    public function show($id){
        $response = Customer::find($id);
        $status = 200;

        if ($response == null) {
            $response = ["message" =>"Customer not found"];
            $status = 404;
        }
        return response()->json($response, $status);
    }

    public function showAddress($id){
        $response = Address::find($id);
        $status = 200;

        if ($response == null){
            $response = ["message" => "Customer address not found "];
            $status = 404;
        }
        return response()->json($response, $status);
    }

    public function showCompany($id){
        $response = Company::find($id);
        $status = 200;
        if ($response == null){
            $response = ["message" => "Company doesn't exist"];
            $status = 404;
        }
        return response()->json($response, $status);
    }
}
