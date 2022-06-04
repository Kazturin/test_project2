@extends('layout.main')
@section('header')
    <h1 class="text-3xl font-bold text-gray-900">Изменить жанр</h1>
@endsection
@section('content')
    <div class="m-10" >
        <form action="{{ route('genres.update',$genre->id) }}" method="POST">
            @csrf
            @method('put')
            
            <div class="">
                <label for="name" class="block text-sm font-medium text-gray-700">Жанр</label>
                <input type="text" name="name" id="name" value="{{ $genre->name }}" autocomplete="name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>
            <div class="px-4 py-3 text-right sm:px-6">
                <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Изменить
                </button>
            </div>
        </form>
    </div>
@endsection

