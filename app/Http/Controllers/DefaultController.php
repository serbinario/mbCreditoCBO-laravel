<?php

namespace MbCreditoCBO\Http\Controllers;

use Illuminate\Http\Request;

use MbCreditoCBO\Http\Requests;
use MbCreditoCBO\Http\Controllers\Controller;

class DefaultController extends Controller
{
    public function index()
    {
        return view('default.index');
    }
}
