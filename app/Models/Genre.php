<?php

namespace App\Models;

use App\Models\Film;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;
    
    protected $table = 'genres';
    protected $guarded = false;
    public $timestamps = false;
    protected $hidden = ['pivot'];

    public function films(){
        return $this->belongsToMany(Film::class,'film_genres');
    }

}
