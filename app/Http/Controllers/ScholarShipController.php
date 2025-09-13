<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Notifications\DeadlineReminder;

class ScholarShipController extends Controller
{
    public function store(Request $request)
    {
        // logika simpan beasiswa ke database
        // Beasiswa::create([...]);

        // contoh ambil semua user
        $users = User::all();

        foreach ($users as $user) {
            $user->notify(new DeadlineReminder("Ada beasiswa baru! Deadline tinggal 3 hari lagi."));
        }

        return redirect()->back()->with('success', 'Beasiswa berhasil ditambahkan dan notifikasi terkirim!');
    }
}
