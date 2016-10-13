<?php

namespace cboMbcredito\Http\Controllers;

use Illuminate\Http\Request;

use cboMbcredito\Http\Requests;
use cboMbcredito\Http\Controllers\Controller;

class DefaultController extends Controller
{
    public function index()
    {
        return view('default.index');
    }
}
