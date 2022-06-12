<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class ListBook extends Authenticatable
{
    // use HasFactory;
    protected $fillable = [
        'title',
        'genre',
        'sinopsis',
        'rating',
        'status'
    ];
    public function borrowedBook() {
        return $this->belongsTo(BorrowedBook::class);
    }
}
