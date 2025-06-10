<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\UserProfile;

class UserProfileController extends Controller
{
    public function showAuthenticated()
    {
        $profile = UserProfile::with('user')
                    ->where('user_id', Auth::id())
                    ->firstOrFail();

        return view('user_profiles.show', compact('profile'));
    }
}
