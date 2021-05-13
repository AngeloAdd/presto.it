<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RevisorController extends Controller
{
    public function __construct() 
    {
        $this->middleware('auth.revisor');
    }
    public function index() 
    {
        return view('revisors.index');
    }

    public function storeAccepted() 
    {

    }

    public function storeRejected() 
    {

    }

}