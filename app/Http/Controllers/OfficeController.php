<?php

namespace App\Http\Controllers;

use App\Models\Logement;
use Illuminate\Http\Request;

class OfficeController extends Controller
{
    //Landing Page Route
    public function index()
    {
        $landingList = Logement::all();
        return view('office.landing', compact('landingList'));
    }

    //Propos PAGE Route
    public function propos()
    {
        return view('office.propos');
    }
}
