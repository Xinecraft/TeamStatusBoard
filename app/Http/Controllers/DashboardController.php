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

    public function show(Request $request)
    {
        $currentTeamUsers = $request->user()->currentTeam->allUsers()->sortByDesc('last_seen_at')->values()->toArray();

        return Inertia::render('Dashboard', [
            'users' => $currentTeamUsers
        ]);
    }
}
