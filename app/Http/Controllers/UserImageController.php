<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserImageController extends Controller
{
    public function update()
    {
    	$path = request('image')->store('images/users');

        auth()->user()->update(['image_path' => $path]);

    	return redirect()->to('/settings/profile');
    }
}
