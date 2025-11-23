<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Scholarship;
use App\Models\Notification;

class NotificationController extends Controller
{
    // --- TOGGLE NOTIFICATION (ON / OFF) ---
    public function toggle($id)
    {
        $user = Auth::user();

        // Cek apakah user sudah menyalakan notifikasi untuk item ini
        $existing = $user->notifications()
            ->where('data->item_id', $id)
            ->first();

        if ($existing) {
            // Jika sudah ada → matikan notifikasi
            $existing->delete();
            return back()->with('status', 'Notifikasi dimatikan.');
        }

        // Ambil item (scholarship / contest)
        $item = Scholarship::findOrFail($id);

        // Hitung sisa hari deadline, kalau tidak ada deadline → null
        $remainingDays = null;
        if ($item->deadline ?? false) {
            $remainingDays = now()->diffInDays($item->deadline, false);
        }

        // Data yang disimpan di kolom JSON "data"
        $data = [
            'item_id' => $item->id,
            'title' => $item->title,
            'message' => $remainingDays !== null
                ? "Pengingat: {$item->title} — sisa {$remainingDays} hari!"
                : "Pengingat aktif untuk {$item->title}.",
            'image' => $item->picture,
            'category_id' => $item->category_id,
        ];

        // Simpan notifikasi (aktif)
        $user->notifications()->create([
            'type' => 'deadline_reminder',
            'data'  => $data,
        ]);

        return back()->with('status', 'Notifikasi diaktifkan!');
    }


    // --- HALAMAN LIST NOTIFIKASI ---
    public function index()
    {
        $notifications = Auth::user()->notifications()->latest()->get();
        return view('notifications.index', compact('notifications'));
    }

    public function markAsRead($id)
    {
        $notif = Auth::user()->notifications()->findOrFail($id);

        // Update kolom read_at
        $notif->update([
            'read_at' => now(),
        ]);

        return back()->with('status', 'Notifikasi ditandai sebagai dibaca.');
    }


    // --- HAPUS SALAH SATU NOTIFIKASI ---
    public function destroy($id)
    {
        $notif = Auth::user()->notifications()->findOrFail($id);
        $notif->delete();

        return back()->with('status', 'Notifikasi berhasil dihapus.');
    }
}
