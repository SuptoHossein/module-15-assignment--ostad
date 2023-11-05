<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        $message = 'Welcome to the website';
        return Inertia::render('Dashboard')->with(['message'=>$message]);
    }
}
