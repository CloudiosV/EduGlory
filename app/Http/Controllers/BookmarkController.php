<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Bookmark;
use App\Models\Scholarship;

class BookmarkController extends Controller
{
    // Menampilkan daftar bookmark user
    public function index()
    {
        $bookmarks = Bookmark::where('user_id', Auth::id())->get();

        // Ambil semua item terkait
        $items = $bookmarks->map(function ($bookmark) {
            $item = Scholarship::find($bookmark->item_id);
            return [
                'id' => $item->id ?? null,
                'title' => $item->title ?? '-',
                'description' => $item->description ?? '-',
                'organizer' => $item->organizer ?? '-',
                'picture' => $item->picture ?? '',
                'category_id' => $item->category_id ?? null,
                'tipe' => $bookmark->tipe,
            ];
        })->filter(fn ($i) => $i['id'] !== null);

        return view('bookmark.index', compact('items'));
    }

    // Menambah / menghapus bookmark
    public function toggle($id, $tipe)
    {
        $userId = Auth::id();

        $existing = Bookmark::where('user_id', $userId)
            ->where('item_id', $id)
            ->where('tipe', $tipe)
            ->first();

        if ($existing) {
            $existing->delete();
            return back()->with('success', 'Removed from bookmarks.');
        }

        Bookmark::create([
            'user_id' => $userId,
            'tipe' => $tipe,
            'item_id' => $id,
        ]);

        return back()->with('success', 'Added to bookmarks!');
    }
}
