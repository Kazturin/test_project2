@extends('layout.main')
@section('header')
    <h1 class="text-3xl font-bold text-gray-900">Добавить фильм</h1>
@endsection
@section('content')
    <div class="m-10" >
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li class="bg-red-500 text-white my-2 p-2 rounded">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

        <form action="{{ route('films.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('post')
            <div class="">
                <label for="name" class="block text-sm font-medium text-gray-700">Названия</label>
                <input type="text" name="name" id="name" autocomplete="name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>
            <div class="my-5">
               <label for="genre" class="block text-sm font-medium text-gray-700 pb=2">Жанр:</label>
                 <select class="m-0" id="genre" class="my-5" multiple="multiple" name="genres[]" >
                    @foreach($genres as $genre)
                    <option value="{{ $genre->id }}"> {{$genre->name}} </option>
                    @endforeach
                 </select>
            </div>
            
            <div class="my-5">
               <input type="file" name="poster">
              
            </div>
            <div class="flex items-start">
                  <div class="flex items-center h-5">
                    <input type="hidden" name="is_published" value=0>
                    <input id="is_published" name="is_published"  type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                  </div>
                  <div class="ml-3 text-sm">
                    <label for="is_published" class="font-medium text-gray-700">Опубликовать</label>
                  </div>
                </div>
                
            <div class="px-4 py-3 text-right sm:px-6">
                <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                   Добавить
                </button>
            </div>
        </form>
    </div>
@endsection

