<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Scholarship;

class AdminController extends Controller
{
    public function index()
    {
        $mostView = Scholarship::orderByDesc('view_count')->take(5)->get();
        $mostApply = Scholarship::orderByDesc('apply_count')->take(5)->get();
        $leastViewApply = Scholarship::orderBy('view_count')->take(5)->get();
        $users = User::all();

        return view('admin.index', compact(
            'mostView',
            'mostApply',
            'leastViewApply',
            'users'
        ));
    }
}
