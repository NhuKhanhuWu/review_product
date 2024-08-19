<!-- <button data-modal-target="popup-modal" data-modal-toggle="popup-modal">
    Toggle modal
</button>
 -->
<div id="popup-modal" tabindex="-1"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button"
                class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                data-modal-hide="popup-modal">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="p-4 md:p-5 text-center">
                <span class="material-symbols-outlined mx-auto text-gray-400 text-5xl dark:text-gray-200">
                    login
                </span>
                <h3 class="mb-5 text-lg font-normal text-black">You need to login to use this feature.</h3>
                <button data-modal-hide="popup-modal" type="button" class="btn-round-white border-2">
                    Cancel
                </button>
                <a href="{{route('login')}}" type="button" class="btn-round-black">Login</a>
            </div>
        </div>
    </div>
</div>