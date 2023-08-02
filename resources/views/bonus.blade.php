<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Rewards') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <!-- <x-welcome />/ -->
            </div>
            @if (\Session::has('success'))
                <div class="flex items-center bg-green-500 text-white text-sm font-bold px-4 py-3 mb-3" role="alert">
                    <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path
                            d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z" />
                    </svg>
                    <p>{!! \Session::get('success') !!}</p>
                </div>
            @endif
            @foreach ($data as $result)
                <div class="max-w-sm w-full lg:max-w-full lg:flex">
                    <div class="h-48 lg:h-auto lg:w-48 flex-none bg-cover rounded-t lg:rounded-t-none lg:rounded-l text-center overflow-hidden"
                        style="background-image: {{ "url('" . $result->thumbnail . "')" }}" title="Woman holding a mug">
                    </div>
                    <div
                        class="border-r border-b border-l border-gray-400 lg:border-l-0 lg:border-t lg:border-gray-400 bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
                        <div class="mb-2">
                            <div class="text-gray-900 font-bold text-xl mb-2"> {{ $result->title }}
                            </div>
                            <p class="text-gray-700 text-base">{{ $result->description }}.</p>
                            <div class="py-2">
                                <span
                                    class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">{{ $result->reward_coin }}
                                    Coin</span>
                            </div>
                            <a href="{{ url('bonus/get/' . $result->id) }}"
                                class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg focus:ring-4 focus:outline-none focus:ring-blue-300 bg-blue-700 hover:bg-blue-800 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 ">
                                Get Bonus
                                <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 14 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                {{-- <div class="max-w-sm w-full lg:max-w-full lg:flex rounded-lg">
                    <div
                        class="border-r border-b border-l border-gray-900 lg:border-l-0 lg:border-t  bg-gray-950 rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
                        <div class="mb-8">
                            <p class="text-white text-base">{{ $result->title }}.</p>
                        </div>

                        <div class="flex flex-row">
                            <div class="flex basis-1/2 pr-10">
                                <img class="w-10 h-10 rounded-full mr-4" src="image/tokped.png" alt="#">
                                <div class="text-sm">
                                    <p class="text-white leading-none pt-3">Tokopedia</p>
                                </div>
                            </div>

                            <div class="flex basis-1/2 pl-10">
                                <svg viewBox="0 0 24 24" height="30px" width="30px" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <ellipse rx="8.5" ry="9" transform="matrix(-1 0 0 1 10.5 12)"
                                            stroke="#66CC33" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round"></ellipse>
                                        <path
                                            d="M13 8.8C12.3732 8.29767 11.5941 8 10.7498 8C8.67883 8 7 9.79086 7 12C7 14.2091 8.67883 16 10.7498 16C11.5941 16 12.3732 15.7023 13 15.2"
                                            stroke="#66CC33" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round"></path>
                                        <path d="M11 3C14.6667 3 22 3.9 22 12C22 20.1 14.6667 21 11 21" stroke="#66CC33"
                                            stroke-width="2"></path>
                                    </g>
                                </svg>
                                <div class="text-sm">
                                    <p class="text-white leading-none pt-2 font-bold text-2xl/6">2</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div> --}}
            @endforeach
        </div>
    </div>

</x-app-layout>
