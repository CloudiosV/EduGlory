<?php

namespace App\Http\Controllers;

use App\Models\Scholarship;
use Illuminate\Http\Request;

class ContestController extends Controller
{
    public function index()
    {
        // Ambil data lomba kategori_id = 2 dengan pagination
        $contests = Scholarship::where('category_id', 2)
            ->latest()
            ->paginate(4);

        return view('contest.index', compact('contests'));
    }

    public function show($id)
    {
        // Tampilkan detail lomba berdasarkan ID
        $item = Scholarship::findOrFail($id);
        return view('home.show', compact('item'));
    }
}
