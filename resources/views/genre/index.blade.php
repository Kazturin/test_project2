@extends('layout.main')
@section('header')
    <h1 class="text-3xl font-bold text-gray-900">Жанры</h1>
@endsection
@section('content')
   <div class="m-5">
   <a href="{{ route('genres.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded ml-5">Добавить жанр</a>
       <ul class="list-disc m-5">
           @foreach($genres as $genre)
               <li class="flex border-b py-2">
                 <a href="{{route('genres.show',$genre->id)}}">{{$genre->name}}</a>
                   <a href="{{route('genres.edit',$genre->id)}}" class="ml-10 text-blue-500">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                      </svg>
                    </a>
                    <form action="{{ route('genres.destroy',$genre->id) }}" method="post">
                       @csrf
                       @method('delete')
                       <button type="submit" class="bg-transparent  text-red-500 font-bold">
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                             <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                          </svg>
                       </button>
                    </form>
                </li>
           @endforeach
       </ul>
   </div>
@endsection
