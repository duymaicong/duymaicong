<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class SearchController extends Controller
{
    public function find(Request $request) {
        $name=$request->name;
        $customer = Customer::where('name', 'like', '%' . $name . '%')->get();
        return response()->json($customer);
      }
}
