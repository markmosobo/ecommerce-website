<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserLog;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function getProfile()
    {
        $user = Auth::user();
        $currentuser = User::where('id', $user->id)->get();
        $userlogs = UserLog::orderByDesc('created_at')->where('user_id', $user->id)->get();
        return view('profile.profile',compact('currentuser','userlogs'));
    }
}
