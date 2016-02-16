<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class WidgetController extends Controller
{
    public function table()
    {
        $data = User::all();
        return view('table', ['data' => $data]);
    }
}
