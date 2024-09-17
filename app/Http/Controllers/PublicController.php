<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function welcome()
    {
        return view('welcome');
    }
    public function detailentreprise()
    {
        return view('public.detailentreprise');
    }
    public function detailpro()
    {
        return view('public.detailpro');
    }
    public function entreprise()
    {
        return view('public.entreprise');
    }
    public function pro()
    {
        return view('public.pro');
    }
    public function help()
    {
        return view('public.help');
    }
    public function annuaire()
    {
        return view('public.annuaire');
    }
}
