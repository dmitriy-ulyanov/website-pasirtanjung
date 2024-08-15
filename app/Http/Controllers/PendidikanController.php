<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PendidikanController extends Controller
{
    public function homindex()
    {
        return view('pendidikan.homindex');
    }

    public function umum()
    {
        return view('pendidikanumum.homindex');
    }

    public function keagamaan()
    {
        return view('pendidikankeagamaan.homindex');
    }

}
