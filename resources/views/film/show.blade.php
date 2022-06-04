@extends('layout.main')
@section('header')
    <h1 class="text-3xl font-bold text-gray-900">Жанр</h1>
@endsection
@section('content')
    <div class="m-5">
        <div class="mb-5 flex">
          <div class="text-xl">{{$genre->name}}</div>
            <a href="{{ route('genres.edit',$genre->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">Изменить</a>
            <form action="{{ route('genres.destroy',$genre->id) }}" method="post">
                @csrf
                @method('delete')
                <input type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" value="Удалить">
            </form>
        </div>
       
       <hr>
       <div>
         id:  {{$genre->id}}
       </div>
        <div>
          Название:  {{$genre->name}}
        </div>
    </div>
@endsection
