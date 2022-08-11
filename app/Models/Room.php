<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $cast = [
        'services' => 'array',
        'gallery' => 'array'
    ];

    protected $fillable = [
        'hotel_id',
        'price',
        'status',
        'type',
        'services',
        'gallery'
    ];

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }

    public function book()
    {
        return $this->hasMany(Book::class);
    }

}
