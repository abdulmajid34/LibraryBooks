<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class BorrowedBook extends Authenticatable
{
    // use HasFactory;
    public function user_admin() {
        return $this->belongsTo(UserAdmin::class);
    }
    public function listBook() {
        return $this->hashOne(ListBook::class);
    }
}
