<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
    use HasFactory;

    protected $table = 'bookmark'; 

    protected $fillable = [
        'user_id',
        'tipe',       // "scholarship" atau "contest"
        'item_id',
    ];

    public function item()
    {
        // Relasi dinamis berdasarkan tipe
        return $this->morphTo(__FUNCTION__, 'tipe', 'item_id');
    }
}
