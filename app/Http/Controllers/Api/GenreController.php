<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Genre;
use App\Http\Resources\GenreResource;
use App\Http\Resources\FilmResource;

class GenreController extends Controller
{
    public function index(){
     
        return (GenreResource::collection(Genre::paginate(10)))->response()->setEncodingOptions(JSON_UNESCAPED_UNICODE);
        
    }
    public function show(Genre $genre){
        return (FilmResource::collection($genre->films()->paginate(10)))->response()->setEncodingOptions(JSON_UNESCAPED_UNICODE);
    }
}
