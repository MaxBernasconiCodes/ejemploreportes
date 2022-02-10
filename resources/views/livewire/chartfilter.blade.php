<div class="flex flex-col pointer bg-gray-200 z-10 justify-content-center overflow-y-auto overflow-x-hidden h-12 text-lg border-2 rounded w-full absolute ease-in-out duration-150 hover:h-48 hover:bg-gray-400">
        @forelse ($data as $item)
            @if($filtertype == 'gral' || $this->checkifavailable($item->id))
                <span wire:click="checkitem({{$item->id}})" class="flex whitespace-nowrap select-none cursor-pointer p-2 active:ml-2 ease-in-out duration-100 hover:font-bold

                @if ($this->checkifchecked($item->id))
                    text-green-300 bg-gray-600 border-b  border-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                @else
                    bg-white ">
                @endif
           |     {{$item->name}}</span>
           @endif
        @empty

        @endforelse
</div>
