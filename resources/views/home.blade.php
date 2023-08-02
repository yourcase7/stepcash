<x-app-layout>
    {{-- <link rel="stylesheet" href="style.css"> --}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <!-- <x-welcome />/ -->
            </div>
        </div>
    </div>
    <div class="container" style="margin-top:-50px;">
        <h4 class="text-2xl text-white pl-4 font-bold">Hello {{ Str::words($user->name, 1, '') }}</h4>
        <span class="text-1xl text-white pl-4">{{ date('D, d M Y') }}</span>
        <span class="text-1xl text-white pl-12">Goal : <b>{{ $user->level->limit_step }} Steps</b></span>
    </div>
    <!-- <h4 class="steps text-2xl text-white pl-2 font-bold">6,000 Steps</h4> -->
    <div class="pie" style="--p:60;--b:10px;--c:#66CC33; margin-top:40px; margin-left:70px;"><span
            style="color:#ffffff; font-size:26px; margin-top: -40px; margin-left:20px;">{{ $data['steps'] }} <span
                style="font-size:20px; color:#66CC33;">Steps</span></span></div>
    <a href="/sync">
        <div class="box-border h-40 w-40 p-4 rounded-full"></div>
        <!-- <div class="box-border1 h-40 w-40 p-4 rounded-full"></div>
            <div class="box-border2 h-40 w-40 p-4 rounded-full"></div> -->
        <div class="box-border4 h-40 w-40 p-4 rounded-full"></div>
    </a>
    <a href="/sync">
        <img src="{{ url('image/reload.png') }}" class="reload" alt="">
    </a>
    <img src="{{ url('image/foot.png') }}" class="foot" alt="">

    <div class="container">
        <div class="box-border7 h-40 w-40 p-4 rounded-lg"></div>
        <div class="box-border8 h-40 w-40 p-4 rounded-lg"></div>
        <div class="box-border9 h-40 w-40 p-4 rounded-lg"></div>
        <div class="box-border10 h-40 w-40 p-4 rounded-lg"></div>

        <img src="{{ url('image/fire.png') }}" class="cal" alt="">
        <h4 class="calori">{{ $data['calories'] }}</h4>
        <p class="name">Cal</p>

        <img src="{{ url('image/clock.png') }}" class="clock" alt="">
        <h4 class="time">{{ $data['time_spent'] }}</h4>
        <p class="desk">Time</p>

        <img src="{{ url('image/location.png') }}" class="location" alt="">
        <h4 class="distance">{{ $data['distances'] }}</h4>
        <p class="km">KM</p>
    </div>

    {{-- <div class="container" style="margin-top:80px;">
        <div class="nav box-border p-4 rounded"></div>
        <a href="{{ url('dashboard') }}">
            <img src="{{ url('image/home.png') }}" class="home" alt="">
            <p class="text-home">Home</p>
        </a>
        <a href="{{ url('rewards') }}">
            <img src="{{ url('image/reward.png') }}" class="reward" alt="">
            <p class="text-reward">Reward</p>
        </a>

        <a href="{{ url('bonus') }}">
            <img src="{{ url('image/bonus.png') }}" class="bonus" alt="">
            <p class="text-bonus">Bonus</p>
        </a>
    </div> --}}
</x-app-layout>
