<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    // In ProfileController.php
public function index() {
    return view('Dashboard.admin.profile.index');
}


}
