<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Genre;

class Film extends Model
{
    use HasFactory;
    
    protected $table = 'films';
    protected $fillable = ['name', 'is_published', 'poster'];
    public $timestamps = false;
    protected $hidden = ['pivot'];
    protected $casts = [
        'is_published' => 'boolean',
      ];


      public function genres(){

        return $this->belongsToMany(Genre::class, 'film_genres', 'film_id', 'genre_id');
      
      }

      public function setIsPublishedAttribute($value){
        $this->attributes['is_published'] = ($value==='on')?1:0;
      }
}
