<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApprenantController extends Controller
{
    public function notes() {
        return view('apprenant.notes');
    }
}
