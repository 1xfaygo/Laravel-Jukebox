<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    protected $fillable = ['name'];

    public function songs()
    {
        return $this->belongsToMany(Song::class);
    }
}
