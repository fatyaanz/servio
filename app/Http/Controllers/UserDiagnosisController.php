<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserDiagnosisController extends Controller
{
    public function form()
    {
        return view(
            'user.diagnosis.diagnosis-form'
        );
    }

    public function analyze(Request $request)
    {

    }
}
