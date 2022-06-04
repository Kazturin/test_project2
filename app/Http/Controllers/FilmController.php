<?php

namespace App\Http\Controllers;


use App\Models\FilmGenre;
use App\Models\Film;
use App\Models\Genre;
use App\Http\Requests\FilmRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $films = Film::all();
        return view('film.index',['films'=>$films]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genres = Genre::all();

        return view('film.create',['genres'=>$genres]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FilmRequest $request)
    {
        $data = $request->validated();

        if(isset($data['poster'])){
            $data['poster'] = $request->file('poster')->store('uploads','public');
        }
        
        $film =Film::create($data);


        $this->addGenresToFilm($data['genres'],$film->id);

        return redirect()->route('films.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function show(Film $film)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function edit(Film $film)
    {
        $genres = Genre::all();

        //dd($film->is_published);

       // $film->genres->pluck('id');

        return view('film.edit',['film'=>$film,'genres'=>$genres]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function update(FilmRequest $request, Film $film)
    {
   
        $data = $request->validated();

        // изменить файл
        if(isset($data['poster'])){
            if(File::exists(public_path('storage/'.$film->poster))){
                \File::delete(public_path('storage/'.$film->poster));
              }
            $data['poster'] = $request->file('poster')->store('uploads','public');
        }
        
        $film->update($data);

        $this->updateGenres($film,$data['genres']);
       
        return redirect()->route('films.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function destroy(Film $film)
    {
        $film->delete();

        return redirect()->route('films.index');
    }

    public function updateGenres($film,$genreIds){

        $oldIds = $film->genres->pluck('id')->toArray();

        $toDelete = array_diff($oldIds,$genreIds); // список id жанра который нужно удалить
        $toAdd = array_diff($genreIds,$oldIds);  // список id жанра который нужно добавить
       
        // удаляем не выбранные жанры
        foreach($toDelete as $item){
            FilmGenre::where(['film_id'=>$film->id,'genre_id'=>$item])->delete();
        }
        // добавляем новые жанры
        $this->addGenresToFilm($toAdd,$film->id);
    }

    public function addGenresToFilm($genreIds,$filmId){
        foreach($genreIds as $genreId){
            FilmGenre::create([
                'film_id' => $filmId,
                'genre_id' => $genreId
            ]);
        }
    }
}
