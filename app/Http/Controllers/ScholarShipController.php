<?php

namespace App\Http\Controllers;

use App\Models\Scholarship;
use Illuminate\Http\Request;

class ScholarshipController extends Controller
{
    public function index()
    {
        // Ambil data beasiswa kategori_id = 1 dengan pagination
        $scholarships = Scholarship::where('category_id', 1)
            ->latest()
            ->paginate(4);

        return view('scholarship.index', compact('scholarships'));
    }

    public function show($id)
    {
        // Tampilkan detail beasiswa berdasarkan ID
        $item = Scholarship::findOrFail($id);
        return view('home.show', compact('item'));
    }
}
