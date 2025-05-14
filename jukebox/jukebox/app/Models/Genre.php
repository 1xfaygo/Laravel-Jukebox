<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    // Relatie met artiesten
    public function artists()
    {
        return $this->hasMany(Artist::class, 'genre', 'name');
    }

    public function songs()
    {
        return $this->hasMany(Song::class);
    }
}


