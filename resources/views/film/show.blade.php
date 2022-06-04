@extends('layout.main')
@section('header')
    <h1 class="text-3xl font-bold text-gray-900"> <span class="font-semibold">Фильм:</span> {{$film->name}}</h1>
@endsection
@section('content')
    <div class="m-5">
        <div class="mb-5">
        <div class="flex flex-col items-center bg-gray-300 rounded-md border-b shadow-md">
         
               <img src="{{isset($film->poster) ? asset('/storage/'.$film->poster) : '/image/no-photo.png'}}" class="block mx-auto w-full" alt="image">
         
        
            
            <div class="p-2 text-center">
            <a href="{{route('films.show',$film->id)}}" class="font-semibold text-3xl">{{$film->name}}</a>
             <p>
                <span class="font-semibold">Жанр:</span>  
             @foreach($film->genres as $genre)
               {{$genre->name}},   
             @endforeach
            </p>
            <div class="flex items-center justify-center">
               <a href="{{route('films.edit',$film->id)}}" class="ml-10 text-blue-500">
                   <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                     <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                   </svg>
                 </a>
                 <form action="{{ route('films.destroy',$film->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="bg-transparent  text-red-500 font-bold">
                       <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                       </svg>
                    </button>
                 </form>
            </div>
            </div>           
            </div>
        </div>
    </div>
@endsection
