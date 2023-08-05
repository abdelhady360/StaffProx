<?php

namespace App\Http\Controllers;

use App\Models\Sex;
use Illuminate\Http\Request;

class SexController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Sex $sex)
    {
        //
    }

    public function edit(Sex $sex)
    {
        //
    }

    public function update(Request $request, Sex $sex)
    {
        //
    }

    public function destroy(Sex $sex)
    {
        //
    }
}
