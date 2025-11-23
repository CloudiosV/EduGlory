<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scholarship extends Model
{
    use HasFactory;

    protected $table = 'scholarship';

    protected $fillable = [
        'picture',
        'title',
        'description',
        'organizer',
        'deadline',
        'registration_link',
        'category_id',
    ];
}
