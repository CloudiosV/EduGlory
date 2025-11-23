<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Scholarship;

class AdminScholarshipController extends Controller
{
    private $categoryId = 1; // Scholarship

    public function index()
    {
        $items = Scholarship::where('category_id', $this->categoryId)->latest()->get();
        return view('admin.scholarship.index', compact('items'));
    }

    public function create()
    {
        return view('admin.scholarship.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'picture' => 'nullable|image|max:2048',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'organizer' => 'required|string|max:255',
            'deadline' => 'nullable|date',
            'registration_link' => 'nullable|url',
        ]);

        $imgPath = null;
        if ($request->hasFile('picture')) {
            // simpan di storage/app/public/img/home/scholarships
            $imgPath = $request->file('picture')->store('img/home/scholarships', 'public');
        }

        Scholarship::create([
            'category_id' => $this->categoryId,
            'picture' => $imgPath,
            'title' => $request->title,
            'description' => $request->description,
            'organizer' => $request->organizer,
            'deadline' => $request->deadline,
            'registration_link' => $request->registration_link,
        ]);

        return redirect()->route('scholarship.index')->with('success', 'Scholarship added!');
    }

    public function edit($id)
    {
        $item = Scholarship::where('category_id', $this->categoryId)->findOrFail($id);
        return view('admin.scholarship.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = Scholarship::where('category_id', $this->categoryId)->findOrFail($id);

        $request->validate([
            'picture' => 'nullable|image|max:2048',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'organizer' => 'required|string|max:255',
            'deadline' => 'nullable|date',
            'registration_link' => 'nullable|url',
        ]);

        if ($request->hasFile('picture')) {
            // hapus gambar lama (jika ada)
            if ($item->picture && Storage::disk('public')->exists($item->picture)) {
                Storage::disk('public')->delete($item->picture);
            }
            $item->picture = $request->file('picture')->store('img/home/scholarships', 'public');
        }

        $item->title = $request->title;
        $item->description = $request->description;
        $item->organizer = $request->organizer;
        $item->deadline = $request->deadline;
        $item->registration_link = $request->registration_link;
        $item->save();

        return redirect()->route('scholarship.index')->with('success', 'Scholarship updated!');
    }

    public function destroy($id)
    {
        $item = Scholarship::where('category_id', $this->categoryId)->findOrFail($id);

        // hapus gambar terkait (jika ada)
        if ($item->picture && Storage::disk('public')->exists($item->picture)) {
            Storage::disk('public')->delete($item->picture);
        }

        $item->delete();
        return back()->with('success', 'Scholarship deleted!');
    }
}
