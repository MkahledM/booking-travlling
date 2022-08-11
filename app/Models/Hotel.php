<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $fillable =["name", "price", "description", "location", "name_img", "rate"];
    use HasFactory;
    public function room()
    {
        return $this->hasMany(Room::class);
    }
    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
