<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileSettingsController extends Controller
{
    public function show()
    {
    	return view('settings.profile.show');
    }
}
