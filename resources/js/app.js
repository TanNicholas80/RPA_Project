import './bootstrap';
import 'flowbite';
import Alpine from 'alpinejs';
import { Carousel } from 'flowbite';

window.Alpine = Alpine;

Alpine.start();

document.addEventListener('DOMContentLoaded', function () {
    const carouselElement = document.getElementById('carousel-example');

    const items = [{
        position: 0,
        el: document.getElementById('carousel-item-1'),
    },
    {
        position: 1,
        el: document.getElementById('carousel-item-2'),
    },
    {
        position: 2,
        el: document.getElementById('carousel-item-3'),
    },
    ];

    // options with default values
    const options = {
        defaultPosition: 0,
        interval: 3000,

        indicators: {
            activeClasses: 'w-10 dark:bg-gray-800 rounded-lg bg-[#764C31]',
            inactiveClasses: 'w-3 dark:bg-gray-800/50 hover:bg-[#764C31] dark:hover:bg-gray-800 rounded-full bg-[#764C31]',
            items: [{
                position: 0,
                el: document.getElementById('carousel-indicator-1'),
            },
            {
                position: 1,
                el: document.getElementById('carousel-indicator-2'),
            },
            {
                position: 2,
                el: document.getElementById('carousel-indicator-3'),
            },
            ],
        },

        // callback functions
        onNext: () => {
            console.log('next slider item is shown');
        },
        onPrev: () => {
            console.log('previous slider item is shown');
        },
        onChange: () => {
            console.log('new slider item has been shown');
        },
    };

    // instance options object
    const instanceOptions = {
        id: 'carousel-example',
        override: true
    };

    const carousel = new Carousel(carouselElement, items, options, instanceOptions);
});