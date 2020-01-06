<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MisvisController extends Controller
{
    public function show() {
        return view('nosotros.misvis');
    }
}
