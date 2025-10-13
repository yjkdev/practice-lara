<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;

class ValidateTestController extends Controller
{
    public function create()
    {
        return view('valid.validate');
    }

    public function store(RegisterRequest $request)
    {
        $validateData = $request->validated();
        return redirect()->route('validate.complete');
    }
}