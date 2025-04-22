<?php

namespace App\Http\Controllers\Hospital;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HospitalController extends Controller
{
    public function testDetails()
    {
        return view('hospital.testDetails');
    }

    public function settinghospital()
    {
        return view('hospital.setting');
    }
}
