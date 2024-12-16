<div id="carousel-example" class="relative max-w-7xl mx-auto my-10" data-carousel="slide">
    <!-- Carousel wrapper -->
    <div class="relative h-80 mx-16 overflow-hidden rounded-lg lg:h-[550px]">
        <!-- Item 1 -->
        <div id="carousel-item-1" class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="{{ asset('assets/img/carousel_1.png') }}"
                class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
        <!-- Item 2 -->
        <div id="carousel-item-2" class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="{{ asset('assets/img/carousel_2.png') }}"
                class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
        <!-- Item 3 -->
        <div id="carousel-item-3" class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="{{ asset('assets/img/carousel_3.png') }}"
                class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
    </div>
    <!-- Slider indicators -->
    <div class="absolute z-30 flex flex-col items-center justify-center w-full top-1/2 -translate-y-1/2 text-center">
        <h1 class="font-bold text-5xl">WELCOME TO</h1>
        <h1 class="font-bold text-5xl">RPA PROJECT PHOTO STUDIO</h1>
        <p class="text-2xl mt-6">Capture Moments, Create Memories</p>
        <div class="flex gap-x-3 mt-5">
            <button id="carousel-indicator-1" type="button" class="h-3 w-3 rounded-full" aria-current="true" aria-label="Slide 1"
                data-carousel-slide-to="0"></button>
            <button id="carousel-indicator-2" type="button" class="h-3 w-3 rounded-full" aria-current="false" aria-label="Slide 2"
                data-carousel-slide-to="1"></button>
            <button id="carousel-indicator-3" type="button" class="h-3 w-3 rounded-full" aria-current="false" aria-label="Slide 3"
                data-carousel-slide-to="2"></button>
        </div>
    </div>
</div>
