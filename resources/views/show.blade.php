@extends('layouts.main')
@section('content')
    <div class="movies-info border-b border-gray-800">
        <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
            <img src="https://image.tmdb.org/t/p/w500/{{ $movie['poster_path']}}" alt="parasite" class="md:w-1/3 w-full">
            <div class="md:ml-24 md:w-2/3 ">
                <div class="text-4xl text-semibold">
                    {{ $movie['title'] }}
                </div>
                <div class="flex flex-wrap items-center text-gray-400 text-sm mt-1">
                    <span>star</span>
                    <span class="ml-1">{{ $movie['vote_average'] * 10 . '%'}}</span>
                    <span class="mx-2">|</span>
                    <span>{{ \Carbon\Carbon::parse($movie['release_date'])->format('M d, Y')}} </span>
                    <span class="mx-2">|</span>
                    <span>
                        @foreach ($movie['genres'] as $genre)
                            {{ $genre['name'] }}@if (!$loop->last),
                            @endif
                        @endforeach
                    </span>
                </div>
                <p class="text-gray-300 mt-8">
                    {{ $movie['overview']}}
                </p>
                <div class="mt-12">
                    <h4 class="text-white text-lg font-semibold">Features Cast</h4>
                    <div class="mt-4 flex">
                        @foreach ($movie['credits']['crew'] as $crew)
                            @if ($loop->index < 2)
                                <div class="mr-8">
                                    <div >{{$crew['name']}}</div>
                                    <div class="text-gray-400 text-sm">{{ $crew['job']}}</div>
                                </div> 
                            @endif
                        @endforeach
                    </div>
                </div>
                @if ($movie['videos']['results'] > 0)
                    <div class="mt-12">
                    <a href="https://youtube.com/watch?v={{ isset($movie['videos']['results'][0]) ? $movie['videos']['results'][0]['key'] : ''}}" class="flex inline-flex items-center bg-orange-500 text-gray-900 rounded font-semibold px-5 py-4 hover:bg-orange-700 transition ease-in-out duration-150 w-auto"><span class="text-center">Play Traliar</span></a>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div class="movie-cast border-b border-gray-800">
        <div class="container mx-auto px-4 py-16">
            <h2 class="text-4xl font-semibold">Cast</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                @foreach ($movie['credits']['cast'] as $cast)
                @if ($loop->index < 5)
                <div class="mt-8">
                    <a href="#">
                        <img src="https://image.tmdb.org/t/p/w500/{{ $cast['profile_path']}}" alt="parasite" class="hover:opacity-75 transition ease-in-out duration-150 w-full" >
                    </a>
                    <div class="mt-2">
                        <a href="#" class="mt-2 text-lg hover:text-gray:300" >{{$cast['name']}}</a>
                        <div class="text-sm text-gray-400">
                            {{$cast['character']}}
                        </div>
                    </div>
                    
                </div>
                @endif
                @endforeach
            </div>
        </div>
    </div>
    <div class="movie-cast border-b border-gray-800">
        <div class="container mx-auto px-4 py-16">
            <h2 class="text-4xl font-semibold">Images</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-8">
                @foreach ($movie['images']['backdrops'] as $image)
                    @if ($loop->index < 6)
                        <div class="mt-8">
                            <a href="#">
                                <img src="https://image.tmdb.org/t/p/w500/{{ $image['file_path']}}" alt="parasite" class="hover:opacity-75 transition ease-in-out duration-150 w-full" >
                            </a>
                            
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
@endsection