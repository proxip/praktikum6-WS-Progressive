<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TutorialController extends Controller
{
    /**
     * Halaman daftar tutorial
     */
    public function index()
    {
        return view('tutorial.index');
    }

    /**
     * ACARA 13: Tutorial Edit Data
     */
    public function acara13()
    {
        return view('tutorial.acara13');
    }

    /**
     * ACARA 14: Tutorial Delete Data
     */
    public function acara14()
    {
        return view('tutorial.acara14');
    }
}
