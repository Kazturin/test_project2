<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FilmGenre extends Model
{
    use HasFactory;

    protected $table = 'film_genres';
    protected $guarded = false;
    public $timestamps = false;
    protected $hidden = ['pivot'];
}
