<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    private $customer;
    public function __construct(Customer $customer){
        $this->customer = $customer;
    }
    public function index()
    {
        $customers = $this->customer->paginate(10);
        return view('admin.customer.index', compact('customers'));
    }
}
