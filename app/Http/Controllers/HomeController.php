<?php

namespace App\Http\Controllers;

use App\Models\Scholarship;

class HomeController extends Controller
{
    public function index()
    {
        session()->forget('return_url');

        // Ambil beasiswa (category_id = 1)
        $scholarships = Scholarship::where('category_id', 1)
            ->latest()
            ->take(5)
            ->get();

        // Ambil lomba (category_id = 2)
        $contests = Scholarship::where('category_id', 2)
            ->latest()
            ->take(5)
            ->get();

        // Ambil file banner dari folder
        $bannerFiles = collect(glob(public_path('img/home/banner/*')))
            ->map(fn($path) => basename($path));

        // Ambil 3 banner acak
        $banners = $bannerFiles->shuffle()->take(3);

        return view('home.index', compact('scholarships', 'contests', 'banners'));
    }

    public function show($id)
    {
        if (!session()->has('return_url')) {
            session(['return_url' => url()->previous()]);
        }

        $item = Scholarship::findOrFail($id);
        return view('home.show', compact('item'));
    }

    public function scholarships()
    {
        session()->forget('return_url');

        $scholarships = Scholarship::where('category_id', 1)
            ->latest()
            ->paginate(9);

        return view('scholarship.index', compact('scholarships'));
    }

    public function contests()
    {
        session()->forget('return_url');

        $contests = Scholarship::where('category_id', 2)
            ->latest()
            ->paginate(9);

        return view('contest.index', compact('contests'));
    }
}
