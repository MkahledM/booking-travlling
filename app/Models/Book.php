<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['name', 'price', 'name_image','days','total','arive','leave','user_id'];

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
