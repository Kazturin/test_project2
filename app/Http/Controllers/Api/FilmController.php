<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Genre;
use App\Models\Film;
use App\Http\Resources\FilmResource;

class FilmController extends Controller
{
    public function index(){
        return (FilmResource::collection(Film::where('is_published',1)->paginate(10)))->response()->setEncodingOptions(JSON_UNESCAPED_UNICODE);
    }
    public function show(Film $film){
        return (new FilmResource($film))->response()->setEncodingOptions(JSON_UNESCAPED_UNICODE);
    }
}
