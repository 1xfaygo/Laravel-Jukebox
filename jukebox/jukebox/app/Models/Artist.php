<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Genre;

class Artist extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'genre'];

    // Automatically sync genres when a new artist is created
    protected static function booted()
    {
        static::created(function ($artist) {
            Genre::firstOrCreate(['name' => $artist->genre]);
        });
    }
}
