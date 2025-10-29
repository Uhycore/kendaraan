<?php

namespace App\Http\Controllers;

use App\Models\Cars;
use App\Models\Trip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserDashboardController extends Controller
{
    public function index()
    {
        $cars = Cars::get();
        return view('user.dashboard', compact('cars'));
    }
    public function history()
    {
        $trips = Trip::with('car')->where('user_id', Auth::id())->get();
        return view('user.history.index', compact('trips'));
    }
}
