<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContenController extends Controller
{
    public function index()
    {
        return view('isi.home');
    }
    public function contak()
    {
        return view('isi.contak');
    }
}
