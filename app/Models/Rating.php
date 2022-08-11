<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    Protected $table= 'ratings';

    public $fillable =[
        'rating',
        'hotel_id',
        'user_id'
    ];

    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function hotel()
    {
        return $this->hasMany(Hotel::class);
    }
    use HasFactory;
}
