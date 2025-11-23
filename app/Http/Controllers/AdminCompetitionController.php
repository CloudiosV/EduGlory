<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Scholarship;

class AdminCompetitionController extends Controller
{
    private $categoryId = 2; // Competition

    public function index()
    {
        $items = Scholarship::where('category_id', $this->categoryId)->latest()->get();
        return view('admin.competition.index', compact('items'));
    }

    public function create()
    {
        return view('admin.competition.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'picture' => 'nullable|image|max:2048',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'organizer' => 'required|string|max:255',
        ]);

        $imgPath = null;
        if ($request->hasFile('picture')) {
            $imgPath = $request->file('picture')->store('img/home/contest', 'public');
        }

        Scholarship::create([
            'category_id' => $this->categoryId,
            'picture' => $imgPath,
            'title' => $request->title,
            'description' => $request->description,
            'organizer' => $request->organizer,
            'deadline' => $request->deadline ?? null,
            'registration_link' => $request->registration_link ?? null,
        ]);

        return redirect()->route('competition.index')->with('success', 'Competition added!');
    }

    public function edit($id)
    {
        $item = Scholarship::where('category_id', $this->categoryId)->findOrFail($id);
        return view('admin.competition.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = Scholarship::where('category_id', $this->categoryId)->findOrFail($id);

        $request->validate([
            'picture' => 'nullable|image|max:2048',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'organizer' => 'required|string|max:255',
        ]);

        if ($request->hasFile('picture')) {
            if ($item->picture && Storage::disk('public')->exists($item->picture)) {
                Storage::disk('public')->delete($item->picture);
            }
            $item->picture = $request->file('picture')->store('img/home/contest', 'public');
        }

        $item->title = $request->title;
        $item->description = $request->description;
        $item->organizer = $request->organizer;
        $item->deadline = $request->deadline ?? $item->deadline;
        $item->registration_link = $request->registration_link ?? $item->registration_link;
        $item->save();

        return redirect()->route('competition.index')->with('success', 'Competition updated!');
    }

    public function destroy($id)
    {
        $item = Scholarship::where('category_id', $this->categoryId)->findOrFail($id);

        if ($item->picture && Storage::disk('public')->exists($item->picture)) {
            Storage::disk('public')->delete($item->picture);
        }

        $item->delete();
        return back()->with('success', 'Competition deleted!');
    }
}
