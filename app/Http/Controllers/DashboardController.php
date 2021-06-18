<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware([ 'auth:sanctum', 'verified' ]);
    }

    public function show()
    {
        return Inertia::render('Dashboard');
    }
}
