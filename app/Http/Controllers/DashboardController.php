<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\ActivityUpdate;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $activities = Activity::with('updates')->get();
        $user = Auth::user();

        return view('dashboard', compact('activities', 'user'));
    }
}
