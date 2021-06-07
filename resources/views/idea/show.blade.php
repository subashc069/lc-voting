<x-app-layout>
    <div class="flex items-center font-semibold hover:underline">
        <svg class="h-4 w-4 " fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
        </svg>
        <span class="ml-2">All Ideas</span>
    </div>
    <div class="idea-container bg-white rounded-xl flex mt-4">
        <div class="flex flex-col md:flex-row flex-1 px-4 py-6">
            <div class="flex-none mx-2 md:mx-4">
                <a href="#" class="flex-none">
                    <img src="https://source.unsplash.com/200x200/?face&corp=face&v=1" alt="avatar"
                    class="w-14 h-14 rounded-xl">
                </a>
            </div>
            <div class=" w-full mx-2 md:mx-4">
                <h4 class="text-xl font-semibold">
                    <a href="#" class="hover:underline">{{ $idea->title }}</a>
                </h4>
                <div class="text-gray-600 mt-3 line-clamp-3">
                    {{ $idea->description }}
                </div>

                <div class="flex flex-col md:flex-row md:items-center justify-between mt-6">
                    <div class="flex items-center text-xs text-gray-400 font-semibold space-x-2">
                        <div class="hidden md:block font-bold text-gray-900">{{ $idea->user->name }}</div>
                        <div class="hidden md:block">&bull;</div>
                        <div>{{ $idea->created_at->diffForHumans() }}</div>
                        <div>&bull;</div>
                        <div>category 1</div>
                        <div>&bull;</div>
                        <div class="text-gray-900">3 comments</div>
                    </div>
                    <div
                        x-data="{ isopen:false }"  
                        class="flex items-center space-x-2 mt-4 md:mt-0"
                    >
                        <div class="bg-gray-200 text-xxs font-bold
                        uppercase leading-none rounded-full text-center
                        w-28 h-7 py-2 px-4">open</div>
                        <button 
                            @click="isopen = !isopen"
                            class="relative bg-gray-100 border hover:bg-gray-200
                            transition duration-150 ease-in rounded-full h-7
                            py-2 px-3"
                        >
                            <svg class="h-6 w-6 text-gray-400" fill="none"
                            viewbox="0 0 24 24" stroke="currentcolor">
                                <path stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2" d="m5 12h.01m12 12h.01m19 12h.01m6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                            </svg>
                            <ul 
                                x-cloak
                                x-show.transition.top.left="isopen" 
                                @click.away="isopen = false"
                                @keydown.escape.window="isopen = false"
                                class="absolute w-44 text-left font-semibold
                                bg-white shadow-dialog rounded-xl z-10 py-3 md:ml-8
                                md:top-6 right-0 md:left-0"
                            >
                                <li>
                                    <a href="#" class="hover:bg-gray-100
                                    block transition duration-150 ease-in
                                    px-5 py-3">mark as spam</a>
                                </li>
                                <li>
                                    <a href="#" class="hover:bg-gray-100
                                    block transition duration-150 ease-in
                                    px-5 py-3">delete post</a>
                                </li>
                            </ul>
                        </button>
                    </div>
                    <div class="flex md:hidden mt-4 md:mt-0">
                        <div class="bg-gray-100 text-center rounded-xl h-10 px-4 py-2 pr-8">
                            <div class="text-sm font-bold leading-none">12</div>
                            <div class="text-xxs font-semibold leading-none text-gray-400">votes</div>
                        </div>
                        <button 
                            class="w-20 bg-gray-200 border border-gray-200
                            hover:border-gray-400 font-bold text-xxs uppercase
                            rounded-xl transition duration-150 ease-in px-4
                            py-3 -mx-5"
                        >vote
                        </button>
                    </div>

                </div>
            </div>
        </div>
    </div>
    {{-- End Idea Container --}}

    <div class="buttons-container flex items-center justify-between mt-6">
        <div class="flex flex-col md:flex-row items-center space-x-4 md:ml-6">
            <div
                x-data="{ isOpen: false }" 
                class="relative"
            >
                <button 
                    @click="isOpen = !isOpen"
                    type="button"
                    class="flex items-center justify-center h-11 w-32 text-sm text-white
                    bg-blue font-semibold rounded-xl
                    border border-blue hover:bg-blue-hover
                    transition duration-150 ease-in px-6 py-3"
                >
                    Reply
                </button>
                <div
                    x-cloak
                    x-show.transition.top.left="isOpen" 
                    @click.away="isOpen = false"
                    @keydown.escape.window="isOpen = false" 
                    class="absolute z-10 w-64 md:w-104 text-left font-semibold text-sm
                    bg-white shadow-dialog rounded-xl mt-2"
                >
                    <form action="#" class="space-y-4 px-4 py-6">
                        <div>
                            <textarea name="post_comment" id="post_comment"
                            cols="30" rows="4" class="w-full text-sm
                            bg-gray-100 rounded-xl palceholder-gray-900"
                            placeholder="Go ahead, don't be shy. Share Your Thoughts..."></textarea>
                        </div>
                        <div class="flex flex-col md:flex-row items-center md:space-x-3">
                            <button type="button"
                                class="flex items-center justify-center h-11
                                w-full md:w-1/2 text-sm text-white
                                bg-blue font-semibold rounded-xl
                                border border-blue hover:bg-blue-hover
                                transition duration-150 ease-in px-6 py-3"
                            >
                                Post Comment
                            </button>
                            <button type="button"
                                class="flex items-center justify-center w-full md:w-32
                                h-11 text-xs bg-gray-200 font-semibold rounded-xl
                                border border-gray-200 hover:border-gray-400
                                transition duration-150 ease-in px-6 py-3 mt-2 md:mt-0"
                            >
                                <svg class="h-4 w-4 text-gray-600 transform
                                -rotate-45"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                                </svg>
                                <span class="ml-1">Attach</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div
                x-data="{ isOpen: false }" 
                class="relative"
            >
                <button
                    @click="isOpen = !isOpen" 
                    type="button"
                    class="flex items-center justify-center h-11 w-36
                    text-sm bg-gray-200 font-semibold rounded-xl
                    border border-gray-200 hover:border-gray-400
                    transition duration-150 ease-in px-6 py-3 mt-2 md:mt-0"
                >
                    <span>Set Status</span>
                    <svg class="ml-2 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div 
                    x-cloak
                    x-show.transition.top.left="isOpen" 
                    @click.away="isOpen = false"
                    @keydown.escape.window="isOpen = false" 
                    class="absolute z-20 w-64 md:w-76 text-left font-semibold text-sm
                    bg-white shadow-dialog rounded-xl mt-2"
                >
                    <form action="#" class="space-y-4 px-4 py-6">
                        <div class="mt-2 space-y-2">
                            <div>
                                <label for="inline-flex items-center">
                                    <input type="radio" checked=""
                                    class="bg-gray-200 text-gray-900 border-none"
                                    name="radio-direct" value="1">
                                    <span class="ml-2">Open</span>
                                </label>
                            </div>
                            <div>
                                <label for="inline-flex items-center">
                                    <input type="radio" checked=""
                                    class="bg-gray-200 text-purple border-none"
                                    name="radio-direct" value="1">
                                    <span class="ml-2">Considering</span>
                                </label>
                            </div>
                            <div>
                                <label for="inline-flex items-center">
                                    <input type="radio" checked=""
                                    class="bg-gray-200 text-yellow border-none"
                                    name="radio-direct" value="1">
                                    <span class="ml-2">In Progress</span>
                                </label>
                            </div>
                            <div>
                                <label for="inline-flex items-center">
                                    <input type="radio" checked=""
                                    class="bg-gray-200 text-green border-none"
                                    name="radio-direct" value="1">
                                    <span class="ml-2">Implemented</span>
                                </label>
                            </div>
                            <div>
                                <label for="inline-flex items-center">
                                    <input type="radio" checked=""
                                    class="bg-gray-200 text-red border-none"
                                    name="radio-direct" value="1">
                                    <span class="ml-2">Closed</span>
                                </label>
                            </div>
                        </div>
                        <div>
                            <textarea name="update_comment" id="update_comment"
                            cols="30" rows="3" class="w-full text-sm
                            bg-gray-100 border-none rounded-xl palceholder-gray-900 px-4 py-2"
                            placeholder="Add an Updated comment(optional)"></textarea>
                        </div>
                        <div class="flex items-center space-x-3">
                            <button type="button"
                                class="flex items-center justify-center w-1/2
                                h-11 text-xs bg-gray-200 font-semibold rounded-xl
                                border border-gray-200 hover:border-gray-400
                                transition duration-150 ease-in px-6 py-3"
                            >
                                <svg class="h-4 w-4 text-gray-600 transform
                                -rotate-45"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                                </svg>
                                <span class="ml-1">Attach</span>
                            </button>
                            <button type="button"
                                class="flex items-center justify-center h-11
                                w-1/2 text-sm text-white
                                bg-blue font-semibold rounded-xl
                                border border-blue hover:bg-blue-hover
                                transition duration-150 ease-in px-6 py-3"
                            >
                                Update
                            </button>
                        </div>
                        <div>
                            <label class="font-normal inline-flex items-center">
                                <input type="checkbox"
                                class="rounded bg-gray-200"
                                name="notify_voters" checked="">
                                <span class="ml-2">Notify All Voters</span>
                            </label>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="hidden md:flex items-center space-x-3">
            <div class="bg-white font-semibold text-center rounded-xl px-3 py-2">
                <div class="text-xl leading-snug">12</div>
                <div class="text-gray-400 text-xs leading-none">Votes</div>
            </div>
            <button type="button"
                class="h-11 w-32 uppercase
                text-xs bg-gray-200 font-semibold rounded-xl
                border border-gray-200 hover:border-gray-400
                transition duration-150 ease-in px-6 py-3"
            >
                <span>Vote</span>
            </button>
        </div>
    </div>
    {{-- End Buttons Container --}}

    <div class="comments-container relative space-7-6 md:ml-22 my-8 pt-4 mt-1">
        <div class="comment-container relative bg-white rounded-xl flex mt-4">
            <div class="flex flex-col md:flex-row  flex-1 px-4 py-6">
                <div class="flex-none">
                    <a href="#" class="flex-none">
                        <img src="https://source.unsplash.com/200x200/?face&corp=face&v=2" alt="avatar"
                        class="w-14 h-14 rounded-xl">
                    </a>
                </div>
                <div class="w-full md:mx-4">
                    {{-- <h4 class="text-xl font-semibold">
                        <a href="#" class="hover:underline">A random title can go here</a>
                    </h4> --}}
                    <div class="text-gray-600 mt-3 line-clamp-3">
                        Lorem ipsum dolor sit amet consectetur
                    </div>

                    <div class="flex items-center justify-between mt-6">
                        <div class="flex items-center text-xs text-gray-400 font-semibold space-x-2">
                            <div class="font-bold text-gray-900">John Doe</div>
                            <div>&bull;</div>
                            <div>10 Hours Ago</div>
                        </div>
                        <div
                            x-data="{isOpen:false}" 
                            class="flex items-center space-x-2"
                        >
                            <button
                                @click="isOpen = !isOpen" 
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
                                    bg-white shadow-dialog rounded-xl z-10 py-3 md:ml-8
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
                    </div>
                </div>
            </div>
        </div>
        <div class="is-admin comment-container relative bg-white rounded-xl flex mt-4">
            <div class="flex flex-1 px-4 py-6">
                <div class="flex-none">
                    <a href="#" class="flex-none">
                        <img src="https://source.unsplash.com/200x200/?face&corp=face&v=3" alt="avatar"
                        class="w-14 h-14 rounded-xl">
                        <div class="text-center text-blue text-xxs uppercase
                            font-semibold mt-1">ADMIN</div>
                    </a>
                </div>
                <div class=" w-full mx-4">
                    <h4 class="text-xl font-semibold">
                        <a href="#" class="hover:underline">Status changed to "Under Consideration"</a>
                    </h4>
                    <div class="text-gray-600 mt-3">
                        Lorem ipsum dolor sit amet consectetur
                    </div>

                    <div class="flex items-center justify-between mt-6">
                        <div class="flex items-center text-xs text-gray-400 font-semibold space-x-2">
                            <div class="font-bold text-blue">Andrea</div>
                            <div>&bull;</div>
                            <div>10 Hours Ago</div>
                        </div>
                        <div class="flex items-center space-x-2">
                            <button class="relative bg-gray-100 border hover:bg-gray-200
                            transition duration-150 ease-in rounded-full h-7
                            py-2 px-3">
                                <svg class="h-6 w-6 text-gray-400" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                                </svg>
                                <ul class="hidden absolute w-44 text-left font-semibold
                                bg-white shadow-dialog rounded-xl py-3 ml-8">
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
                    </div>
                </div>
            </div>
        </div>
        <div class="comment-container relative bg-white rounded-xl flex mt-4">
            <div class="flex flex-1 px-4 py-6">
                <div class="flex-none">
                    <a href="#" class="flex-none">
                        <img src="https://source.unsplash.com/200x200/?face&corp=face&v=4" alt="avatar"
                        class="w-14 h-14 rounded-xl">
                    </a>
                </div>
                <div class=" w-full mx-4">
                    {{-- <h4 class="text-xl font-semibold">
                        <a href="#" class="hover:underline">A random title can go here</a>
                    </h4> --}}
                    <div class="text-gray-600 mt-3 line-clamp-3">
                        Lorem ipsum dolor sit amet consectetur
                    </div>

                    <div class="flex items-center justify-between mt-6">
                        <div class="flex items-center text-xs text-gray-400 font-semibold space-x-2">
                            <div class="font-bold text-gray-900">John Doe</div>
                            <div>&bull;</div>
                            <div>10 Hours Ago</div>
                        </div>
                        <div class="flex items-center space-x-2">
                            <button class="relative bg-gray-100 border hover:bg-gray-200
                            transition duration-150 ease-in rounded-full h-7
                            py-2 px-3">
                                <svg class="h-6 w-6 text-gray-400" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                                </svg>
                                <ul class="hidden absolute w-44 text-left font-semibold
                                bg-white shadow-dialog rounded-xl py-3 ml-8">
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
                    </div>
                </div>
            </div>
        </div>
        {{-- End Comment Container --}}
    </div>
    {{-- End Comments Container --}}
</x-app-layout>

