@extends('layouts.main')
@section('content')
    <div class="movies-info border-b border-gray-800">
        <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
            <img src="{{ $movie['poster_path']}}" alt="parasite" class="md:w-1/3 w-full">
            <div class="md:ml-24 md:w-2/3 ">
                <div class="text-4xl text-semibold">
                    {{ $movie['title'] }}
                </div>
                <div class="flex flex-wrap items-center text-gray-400 text-sm mt-1">
                    <span>star</span>
                    <span class="ml-1">{{ $movie['vote_average']}}</span>
                    <span class="mx-2">|</span>
                    <span>{{ $movie['release_date']}} </span>
                    <span class="mx-2">|</span>
                    <span>
                       {{ $movie['genres']}}
                    </span>
                </div>
                <p class="text-gray-300 mt-8">
                    {{ $movie['overview']}}
                </p>
                <div class="mt-12">
                    <h4 class="text-white text-lg font-semibold">Features Cast</h4>
                    <div class="mt-4 flex">
                        @foreach ($movie['crew'] as $crew)
                                <div class="mr-8">
                                    <div >{{$crew['name']}}</div>
                                    <div class="text-gray-400 text-sm">{{ $crew['job']}}</div>
                                </div> 
                        @endforeach
                    </div>
                </div>
                <div x-data="{open:false}">
                    @if ($movie['videos']['results'] > 0)
                        <div class="mt-12">
                        <button 
                        @click="open=true"
                        class="flex inline-flex items-center bg-orange-500 text-gray-900 rounded font-semibold px-5 py-4 hover:bg-orange-700 transition ease-in-out duration-150 w-auto"><span class="text-center">Play Traliar</span></button>
                        </div>
                    @endif
                    <div 
                        style="background-color: rgba(0, 0, 0, 0.5);"
                        class="fixed top-0 left-0 w-full h-full flex items-center shawdow-lg"
                        x-show.transition.opacity="open"
                        >
                            <div class="container mx-auto lg:px-32 rounded-lg overflow-y-auto">
                                <div class="bg-gray-900 rounded">
                                    <div class="flex justify-end pr-4 pt-2">
                                        <button 
                                        @click="open=false"
                                        {{-- @keydown.escape.window="open=false" --}}
                                        class="text-3xl leading-none hover:text-grey-300">&times;</button>
                                    </div>
                                    <div class="modal-body px-8 py-8 ">
                                        <div class="responsive-container             overflow-hidden relative" 
                                            style="padding-top: 56.25%"; >
                                            <iframe width="560" height="349" class="absolute top-0 left-0 w-full h-full" src="http://www.youtube.com/embed/{{ isset($movie['videos']['results'][0]) ? $movie['videos']['results'][0]['key'] : ''}}" 
                                            style="border:0;" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="movie-cast border-b border-gray-800">
        <div class="container mx-auto px-4 py-16">
            <h2 class="text-4xl font-semibold">Cast</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                @foreach ($movie['cast'] as $cast)
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
                @endforeach
            </div>
        </div>
    </div>
    <div class="images border-b border-gray-800" x-data="{open:false, image:''}">
        <div class="container mx-auto px-4 py-16">
            <h2 class="text-4xl font-semibold">Images</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-8">
                @foreach ($movie['images'] as $image)
                        <div class="mt-8">
                            <a 
                            @click.prevent="
                            open=true
                            image='https://image.tmdb.org/t/p/original/{{ $image['file_path']}}'
                            "
                            
                            href="#">
                                <img src="https://image.tmdb.org/t/p/w500/{{ $image['file_path']}}" alt="parasite" class="hover:opacity-75 transition ease-in-out duration-150 w-full" >
                            </a>
                            
                        </div>
                @endforeach
            </div>
            <div 
                style="background-color: rgba(0, 0, 0, 0.5);"
                class="fixed top-0 left-0 w-full h-full flex items-center shawdow-lg"
                x-show.transition.opacity="open"
                >
                    <div class="container mx-auto lg:px-32 rounded-lg overflow-y-auto">
                        <div class="bg-gray-900 rounded">
                            <div class="flex justify-end pr-4 pt-2">
                                <button 
                                @click="open=false"
                                {{-- @keydown.escape.window="open=false" --}}
                                class="text-3xl leading-none hover:text-grey-300">&times;</button>
                            </div>
                            <div class="modal-body px-8 py-8 ">
                                <img :src="image" alt="">
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
@endsection