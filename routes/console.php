<?php

use Illuminate\Support\Facades\Schedule;
use App\Models\Scholarship;
use App\Models\User;

Schedule::call(function () {

    // Ambil semua beasiswa & lomba yang punya deadline
    $items = Scholarship::whereNotNull('deadline')->get();

    foreach ($items as $item) {

        // Hitung sisa hari
        $remaining = now()->diffInDays($item->deadline, false);

        // Kalau sudah lewat deadline — skip
        if ($remaining < 0) continue;

        // Tentukan apakah hari ini perlu membuat notifikasi
        // Misalnya H-3, H-1, dan H-0 (hari ini)
        $needNotify = in_array($remaining, [3, 1, 0]);

        if (!$needNotify) continue;

        // Kirim notifikasi kepada semua user
        foreach (User::all() as $user) {

            // Jangan spam, cek UI sudah ada notifikasi untuk item yang sama & hari yang sama
            $already = $user->notifications()
                ->where('data->item_id', $item->id)
                ->whereDate('created_at', now()->toDateString())
                ->exists();

            if ($already) continue;

            $message = match ($remaining) {
                3 => "Peringatan: {$item->title} tersisa 3 hari lagi!",
                1 => "Besok adalah batas akhir {$item->title}!",
                0 => "Hari ini adalah hari terakhir untuk {$item->title}!",
            };

            $user->notifications()->create([
                'type' => 'deadline_auto',
                'data' => [
                    'item_id'      => $item->id,
                    'title'        => $item->title,
                    'message'      => $message,
                    'image'        => $item->picture,
                    'category_id'  => $item->category_id,
                    'deadline'     => $item->deadline,
                ]
            ]);
        }
    }

})->daily(); // dijalankan setiap hari
