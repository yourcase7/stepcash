<x-app-layout>
    <link rel="stylesheet" href="style.css">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <!-- <x-welcome />/ -->
            </div>
        </div>
    </div>
        <div class="container" style="margin-top:-50px;">
        <h4 class="text-2xl text-white pl-4 font-bold">Hello Bagus</h4>
        <span class="text-1xl text-white pl-4">Wed, 03 August 2023</span>
        <span class="text-1xl text-white pl-12">Goal : <b>6000 Steps</b></span>
    </div>
    <!-- <h4 class="steps text-2xl text-white pl-2 font-bold">6,000 Steps</h4> -->
    <div class="pie" style="--p:60;--b:10px;--c:#66CC33; margin-top:40px; margin-left:70px;"><span style="color:#ffffff; font-size:30px; margin-top: -40px; margin-left:20px;">6,000 <span style="font-size:20px; color:#66CC33;">Steps</span></span></div>

    <div class="box-border h-40 w-40 p-4 rounded-full"></div>
    <!-- <div class="box-border1 h-40 w-40 p-4 rounded-full"></div>
    <div class="box-border2 h-40 w-40 p-4 rounded-full"></div> -->
    <div class="box-border4 h-40 w-40 p-4 rounded-full"></div>
    <img src="{{ url('image/reload.png') }}" class="reload" alt="">

    <img src="{{ url('image/foot.png') }}" class="foot" alt="">

    <div class="container">
        <div class="box-border7 h-40 w-40 p-4 rounded-lg"></div>
        <div class="box-border8 h-40 w-40 p-4 rounded-lg"></div>
        <div class="box-border9 h-40 w-40 p-4 rounded-lg"></div>
        <div class="box-border10 h-40 w-40 p-4 rounded-lg"></div>

        <img src="{{ url('image/fire.png') }}" class="cal" alt="">
        <h4 class="calori">150</h4>
        <p class="name">Cal</p>

        <img src="{{ url('image/clock.png') }}" class="clock" alt="">
        <h4 class="time">30.00</h4>
        <p class="desk">Time</p>

        <img src="{{ url('image/location.png') }}" class="location" alt="">
        <h4 class="distance">5.4</h4>
        <p class="km">KM</p>
    </div>

    <div class="container" style="margin-top:80px;">
        <div class="nav box-border p-4 rounded"></div>
        <a href="{{ url('dashboard') }}">
            <img src="{{ url('image/home.png') }}" class="home" alt="">
            <p class="text-home">Home</p>
        </a>
        <a href="{{ url('reward') }}">
            <img src="{{ url('image/reward.png') }}" class="reward" alt="">
            <p class="text-reward">Reward</p>
        </a>

        <a href="{{ url('bonus') }}">
            <img src="{{ url('image/bonus.png') }}" class="bonus" alt="">
            <p class="text-bonus">Bonus</p>
        </a>
    </div>
</x-app-layout>
