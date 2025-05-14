<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function artist()
    {
        return $this->belongsTo(Artist::class);
    }

    // Add this to cast release_date as a date object
    protected $casts = [
        'release_date' => 'date',
    ];

    public function songs()
    {
        return $this->hasMany(Song::class);
    }
}
