<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function __construct()
    {
        $this->middleware([ 'auth:sanctum', 'verified' ]);
    }

    public function ping(Request $request)
    {
        // If is_automatic_status then mark user as online
        if ($request->user()->is_automatic_status) {
            $request->user()->status = 'online';
        }
        $request->user()->last_seen_at = now();
        $request->user()->save();

        return [
            'status' => 'ok',
        ];
    }

    public function update(Request $request)
    {
        $request->validate([
            'status' => 'required|in:online,offline,busy',
            'workStatus' => 'nullable|string|max:255',
            'autoStatus' => 'required|boolean'
        ]);

        $status = $request->status;
        if ($request->autoStatus) {
            $status = 'online';
        }
        $request->user()->status = $status;
        $request->user()->work_status = $request->workStatus;
        $request->user()->is_automatic_status = $request->autoStatus;
        $request->user()->save();

        return redirect()->back();
    }
}
