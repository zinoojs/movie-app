
<div class="relative mt-3 md:mt-0" x-data="{ open : true }" @click.away="open = false">
        <input 
        wire:model.debounce.500ms="search" 
        @focus="open=true"
        @keydown="open=true"
        @keydown.escape.window="open=false"
        @keydown.shift.tab="open=false"
        type="text" class="bg-gray-800 text-sm rounded-full w-64 px-4 pl-8 py-1 focus:outline-none focus:shadow-outline" placeholder="Search">
 
    <div class="spinner"></div>
    @if (strlen($search) >= 2)
        <div 
        class="z-50 absolute rounded bg-gray-800 mt-4 w-64 text-sm"
        x-show.transition.opacity="open"
         @keydown.escape.window = "open = false"
         >
            @if ($searchResults->count() > 0)
                <ul>
                    @foreach ($searchResults as $result)
                    <li class="border-b border-gray-700">
                        <a 
                        href="{{route('movie.show',$result['id']) }}" class="block hover:bg-gray-700 px-3 py-3 flex items-center"
                        @if ($loop->last) @keydown.tab="open=false" @endif
                        >
                            @if ($result['poster_path'])
                                <img src="https://image.tmdb.org/t/p/w92/{{$result['poster_path']}}" alt="poster" class="w-8">
                            @else
                                <img src="https://via.placeholder.com/50x75" alt="images" class="w-8">
                            @endif
                            <span class="ml-4">{{$result['title']}}</span>  
                        </a>
                    </li>
                    @endforeach
                </ul>
                @else
                    <div class="px-3 py3">No Results For "{{$search}}"</div>
            @endif
        </div>
    @endif
</div>
