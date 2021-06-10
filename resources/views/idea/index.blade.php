<x-app-layout>
    <div class="filter flex flex-col md:flex-row space-y-3 md:space-y-0 md:space-x-6">
        <div class="w-full md:w-1/3">
            <select name="category" id="category" class="w-full rounded-xl border-none px-4 py-2">
                <option value="categoryOne">Category One</option>
                <option value="categoryOne">Category One</option>
                <option value="categoryOne">Category One</option>
                <option value="categoryOne">Category One</option>
                <option value="categoryOne">Category One</option>
            </select>
        </div>
        <div class="w-full md:w-1/3">
            <select name="other_filters" id="other_filters" class="w-full rounded-xl border-none px-4 py-2">
                <option value="Filter One">Filter One</option>
                <option value="Filter One">Filter One</option>
                <option value="Filter One">Filter One</option>
                <option value="Filter One">Filter One</option>
                <option value="Filter One">Filter One</option>
            </select>
        </div>
        <div class="w-full md:w-1/3 relative">
            <input type="search" placeholder="Find an Idea"
                class="w-full rounded-xl border-none placeholder-gray-900 bg-white px-4 py-2 pl-8"
            >
            <div class="absolute top-0 flex items-center h-full ml-2">
                <svg class="h-4 w-4 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>
        </div>
    </div>  {{-- End Filters --}}

    <div class="ideas-container space-y-6 my-6">
        @foreach ($ideas as $idea)
            <div 
                x-data
                @click="
                    const clicked = $event.target
                    const target = clicked.tagName.toLowerCase()
                    
                    const ignores = ['button', 'svg', 'path', 'a']
                        
                    if (! ignores.includes(target)) {
                        
                        clicked.closest('.ideas-container').querySelector('.idea-link').click()
                    }
                "
                class="idea-container hover:shadow-card transition duration-150
                ease-in bg-white rounded-xl flex cursor-pointer"
            >
                <div class="hidden md:block border-r  border-gray-100 px-5 py-8">
                    <div class="text-center">
                        <div class="font-semibold text-2xl">12</div>
                        <div class="text-gray-500">Votes</div>
                    </div>

                    <div class="mt-8">
                        <button class="w-20 bg-gray-200 border border-gray-200
                        hover:border-gray-400 font-bold text-xxs uppercase
                        rounded-xl transition duration-150 ease-in px-4
                        py-3">Vote</button>
                    </div>
                </div>
                <div class="flex flex-col md:flex-row flex-1 px-2 py-6">
                    <div class="flex-none mx-2 md:mx-0">
                        <a href="#" class="flex-none">
                            <img src="https://source.unsplash.com/200x200/?face&corp=face&v=1" alt="avatar"
                            class="w-14 h-14 rounded-xl">
                        </a>
                    </div>
                    <div class="w-full flex flex-col justify-between mx-2 md:mx-4">
                        <h4 class="text-xl font-semibold mt-2 md:mt-0">
                            <a href="{{ route('idea.show', $idea) }}" class="idea-link hover:underline">{{ $idea->title }}</a>
                        </h4>
                        <div class="text-gray-600 mt-3 line-clamp-3">
                            {{ $idea->description }}
                        </div>

                        <div class="flex flex-col md:flex-row md:items-center justify-between mt-6">
                            <div class="flex items-center text-xs text-gray-400 font-semibold space-x-2">
                                <div>{{ $idea->created_at->diffForHumans() }}</div>
                                <div>&bull;</div>
                                <div>Category 1</div>
                                <div>&bull;</div>
                                <div class="text-gray-900">3 Comments</div>
                            </div>
                            <div
                                x-data="{ isOpen:false }" 
                                class="flex items-center space-x-2 mt-4 md:mt-0"
                            >
                                <div class="bg-gray-200 text-xxs font-bold
                                uppercase leading-none rounded-full text-center
                                w-28 h-7 py-2 px-4">Open</div>
                                <button
                                    @click="{ isOpen = !isOpen }" 
                                    class="relative bg-gray-100 border hover:bg-gray-200
                                    transition duration-150 ease-in rounded-full h-7
                                    py-2 px-3"
                                >
                                    <svg class="h-6 w-6 text-gray-400" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                                    </svg>
                                    <ul
                                        x-cloak
                                        x-show.transition.top.left="isOpen" 
                                        @click.away="isOpen = false"
                                        @keydown.escape.window="isOpen = false"
                                        class="absolute w-44 text-left font-semibold
                                        bg-white shadow-dialog rounded-xl py-3 md:ml-8
                                        md:top-6 right-0 md:left-0"
                                    >
                                        <li>
                                            <a href="#" class="hover:bg-gray-100
                                            block transition duration-150 ease-in
                                            px-5 py-3">Mark As Spam</a>
                                        </li>
                                        <li>
                                            <a href="#" class="hover:bg-gray-100
                                            block transition duration-150 ease-in
                                            px-5 py-3">Delete Post</a>
                                        </li>
                                    </ul>
                                </button>
                            </div>
                            <div class="flex md:hidden mt-4 md:mt-0">
                                <div class="bg-gray-100 text-center rounded-xl h-10 px-4 py-2 pr-8">
                                    <div class="text-sm font-bold leading-none">12</div>
                                    <div class="text-xxs font-semibold leading-none text-gray-400">Votes</div>
                                </div>
                                <button 
                                    class="w-20 bg-gray-200 border border-gray-200
                                    hover:border-gray-400 font-bold text-xxs uppercase
                                    rounded-xl transition duration-150 ease-in px-4
                                    py-3 -mx-5"
                                >Vote
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        {{-- <div class="idea-container hover:shadow-card transition duration-150
        ease-in bg-white rounded-xl flex cursor-pointer">
            <div class="border-r borger-gray-100 px-5 py-8">
                <div class="text-center">
                    <div class="font-semibold text-2xl">66</div>
                    <div class="text-gray-500">Votes</div>
                </div>

                <div class="mt-8">
                    <button class="w-20 bg-blue border border-gray-200
                    hover:border-gray-400 font-bold text-xxs uppercase
                    rounded-xl transition duration-150 ease-in px-4
                    py-3 text-white ">Vote</button>
                </div>
            </div>
            <div class="flex px-2 py-6">
                <a href="#" class="flex-none">
                    <img src="https://source.unsplash.com/200x200/?face&corp=face&v=1" alt="avatar"
                    class="w-14 h-14 rounded-xl">
                </a>
                <div class="mx-4">
                    <h4 class="text-xl font-semibold">
                        <a href="#" class="hover:underline">Another random title can go here</a>
                    </h4>
                    <div class="text-gray-600 mt-3 line-clamp-3">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Nesciunt, atque ex enim hic aliquam quas aliquid, asperiores
                        molestias tempora soluta numquam libero odit quaerat aspernatur
                        blanditiis error. Labore molestiae dolor iste eligendi
                        suscipit debitis. Aspernatur id excepturi explicabo!
                        Sapiente explicabo nesciunt repudiandae, repellat debitis
                        modi quibusdam quia! Sapiente placeat natus exercitationem
                        reiciendis modi, aliquam rerum ad, rem minima praesentium
                        perspiciatis assumenda ipsam, laudantium corporis!
                        Assumenda a mollitia quas inventore ipsam nemo doloremque
                        consequuntur temporibus cumque consectetur nam magni,
                        deleniti quasi quia dolores repudiandae beatae explicabo
                        minima qui eveniet, porro adipisci. Sed iste laborum
                        aliquid culpa debitis eius cum magnam ullam.
                    </div>

                    <div class="flex items-center justify-between mt-6">
                        <div class="flex items-center text-xs text-gray-400 font-semibold space-x-2">
                            <div>10 Hours Ago</div>
                            <div>&bull;</div>
                            <div>Category 1</div>
                            <div>&bull;</div>
                            <div class="text-gray-900">3 Comments</div>
                        </div>
                        <div class="flex items-center space-x-2">
                            <div class="bg-yellow text-xxs text-white font-bold
                            uppercase leading-none rounded-full text-center
                            w-28 h-7 py-2 px-4">In progress</div>
                            <button class="relative bg-gray-100 hover:bg-gray-200
                            transition duration-150 ease-in rounded-full h-7
                            py-2 px-3">
                                <svg class="h-6 w-6 text-gray-400" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="idea-container hover:shadow-card transition duration-150
        ease-in bg-white rounded-xl flex cursor-pointer">
            <div class="border-r borger-gray-100 px-5 py-8">
                <div class="text-center">
                    <div class="font-semibold text-2xl">12</div>
                    <div class="text-gray-500">Votes</div>
                </div>

                <div class="mt-8">
                    <button class="w-20 bg-gray-200 border border-gray-200
                    hover:border-gray-400 font-bold text-xxs uppercase
                    rounded-xl transition duration-150 ease-in px-4
                    py-3">Vote</button>
                </div>
            </div>
            <div class="flex px-2 py-6">
                <a href="#" class="flex-none">
                    <img src="https://source.unsplash.com/200x200/?face&corp=face&v=1" alt="avatar"
                    class="w-14 h-14 rounded-xl">
                </a>
                <div class="mx-4">
                    <h4 class="text-xl font-semibold">
                        <a href="#" class="hover:underline">Yet another random title can go here</a>
                    </h4>
                    <div class="text-gray-600 mt-3 line-clamp-3">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Nesciunt, atque ex enim hic aliquam quas aliquid, asperiores
                        molestias tempora soluta numquam libero odit quaerat aspernatur
                        blanditiis error. Labore molestiae dolor iste eligendi
                        suscipit debitis. Aspernatur id excepturi explicabo!
                        Sapiente explicabo nesciunt repudiandae, repellat debitis
                        modi quibusdam quia! Sapiente placeat natus exercitationem
                        reiciendis modi, aliquam rerum ad, rem minima praesentium
                        perspiciatis assumenda ipsam, laudantium corporis!
                        Assumenda a mollitia quas inventore ipsam nemo doloremque
                        consequuntur temporibus cumque consectetur nam magni,
                        deleniti quasi quia dolores repudiandae beatae explicabo
                        minima qui eveniet, porro adipisci. Sed iste laborum
                        aliquid culpa debitis eius cum magnam ullam.
                    </div>

                    <div class="flex items-center justify-between mt-6">
                        <div class="flex items-center text-xs text-gray-400 font-semibold space-x-2">
                            <div>10 Hours Ago</div>
                            <div>&bull;</div>
                            <div>Category 1</div>
                            <div>&bull;</div>
                            <div class="text-gray-900">3 Comments</div>
                        </div>
                        <div class="flex items-center space-x-2">
                            <div class="bg-red text-white text-xxs font-bold
                            uppercase leading-none rounded-full text-center
                            w-28 h-7 py-2 px-4">Closed</div>
                            <button class="relative bg-gray-100 hover:bg-gray-200
                            transition duration-150 ease-in rounded-full h-7
                            py-2 px-3">
                                <svg class="h-6 w-6 text-gray-400" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="idea-container hover:shadow-card transition duration-150
        ease-in bg-white rounded-xl flex cursor-pointer">
            <div class="border-r borger-gray-100 px-5 py-8">
                <div class="text-center">
                    <div class="font-semibold text-2xl">12</div>
                    <div class="text-gray-500">Votes</div>
                </div>

                <div class="mt-8">
                    <button class="w-20 bg-gray-200 border border-gray-200
                    hover:border-gray-400 font-bold text-xxs uppercase
                    rounded-xl transition duration-150 ease-in px-4
                    py-3">Vote</button>
                </div>
            </div>
            <div class="flex px-2 py-6">
                <a href="#" class="flex-none">
                    <img src="https://source.unsplash.com/200x200/?face&corp=face&v=1" alt="avatar"
                    class="w-14 h-14 rounded-xl">
                </a>
                <div class="mx-4">
                    <h4 class="text-xl font-semibold">
                        <a href="#" class="hover:underline">Yet another random title can go here</a>
                    </h4>
                    <div class="text-gray-600 mt-3 line-clamp-3">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Nesciunt, atque ex enim hic aliquam quas aliquid, asperiores
                        molestias tempora soluta numquam libero odit quaerat aspernatur
                        blanditiis error. Labore molestiae dolor iste eligendi
                        suscipit debitis. Aspernatur id excepturi explicabo!
                        Sapiente explicabo nesciunt repudiandae, repellat debitis
                        modi quibusdam quia! Sapiente placeat natus exercitationem
                        reiciendis modi, aliquam rerum ad, rem minima praesentium
                        perspiciatis assumenda ipsam, laudantium corporis!
                        Assumenda a mollitia quas inventore ipsam nemo doloremque
                        consequuntur temporibus cumque consectetur nam magni,
                        deleniti quasi quia dolores repudiandae beatae explicabo
                        minima qui eveniet, porro adipisci. Sed iste laborum
                        aliquid culpa debitis eius cum magnam ullam.
                    </div>

                    <div class="flex items-center justify-between mt-6">
                        <div class="flex items-center text-xs text-gray-400 font-semibold space-x-2">
                            <div>10 Hours Ago</div>
                            <div>&bull;</div>
                            <div>Category 1</div>
                            <div>&bull;</div>
                            <div class="text-gray-900">3 Comments</div>
                        </div>
                        <div class="flex items-center space-x-2">
                            <div class="bg-green text-white text-xxs font-bold
                            uppercase leading-none rounded-full text-center
                            w-28 h-7 py-2 px-4">Implemented</div>
                            <button class="relative bg-gray-100 hover:bg-gray-200
                            transition duration-150 ease-in rounded-full h-7
                            py-2 px-3">
                                <svg class="h-6 w-6 text-gray-400" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="idea-container hover:shadow-card transition duration-150
        ease-in bg-white rounded-xl flex cursor-pointer">
            <div class="border-r borger-gray-100 px-5 py-8">
                <div class="text-center">
                    <div class="font-semibold text-2xl">12</div>
                    <div class="text-gray-500">Votes</div>
                </div>

                <div class="mt-8">
                    <button class="w-20 bg-gray-200 border border-gray-200
                    hover:border-gray-400 font-bold text-xxs uppercase
                    rounded-xl transition duration-150 ease-in px-4
                    py-3">Vote</button>
                </div>
            </div>
            <div class="flex px-2 py-6">
                <a href="#" class="flex-none">
                    <img src="https://source.unsplash.com/200x200/?face&corp=face&v=1" alt="avatar"
                    class="w-14 h-14 rounded-xl">
                </a>
                <div class="mx-4">
                    <h4 class="text-xl font-semibold">
                        <a href="#" class="hover:underline">Yet another random title can go here</a>
                    </h4>
                    <div class="text-gray-600 mt-3 line-clamp-3">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Nesciunt, atque ex enim hic aliquam quas aliquid, asperiores
                        molestias tempora soluta numquam libero odit quaerat aspernatur
                        blanditiis error. Labore molestiae dolor iste eligendi
                        suscipit debitis. Aspernatur id excepturi explicabo!
                        Sapiente explicabo nesciunt repudiandae, repellat debitis
                        modi quibusdam quia! Sapiente placeat natus exercitationem
                        reiciendis modi, aliquam rerum ad, rem minima praesentium
                        perspiciatis assumenda ipsam, laudantium corporis!
                        Assumenda a mollitia quas inventore ipsam nemo doloremque
                        consequuntur temporibus cumque consectetur nam magni,
                        deleniti quasi quia dolores repudiandae beatae explicabo
                        minima qui eveniet, porro adipisci. Sed iste laborum
                        aliquid culpa debitis eius cum magnam ullam.
                    </div>

                    <div class="flex items-center justify-between mt-6">
                        <div class="flex items-center text-xs text-gray-400 font-semibold space-x-2">
                            <div>10 Hours Ago</div>
                            <div>&bull;</div>
                            <div>Category 1</div>
                            <div>&bull;</div>
                            <div class="text-gray-900">3 Comments</div>
                        </div>
                        <div class="flex items-center space-x-2">
                            <div class="bg-purple text-white text-xxs font-bold
                            uppercase leading-none rounded-full text-center
                            w-28 h-7 py-2 px-4">Considering</div>
                            <button class="relative bg-gray-100 hover:bg-gray-200
                            transition duration-150 ease-in rounded-full h-7
                            py-2 px-3">
                                <svg class="h-6 w-6 text-gray-400" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    </div> {{-- End Ideas Container --}}
    <div class="py-2">
        {{ $ideas->links() }}
    </div>
</x-app-layout>
