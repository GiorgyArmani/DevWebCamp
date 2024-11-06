import Swiper from'swiper';
import 'swiper/css/bundle';
import { FreeMode, Navigation } from 'swiper/modules';

document.addEventListener('DOMContentLoaded', function() {
    if (document.querySelector('.slider')){
        const opciones = {
            slidesPerView: 1,
            spaceBetween: 15,
            FreeMode: true,
            navigation:{
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev'
            },
            breakpoints:{//los breakpoints funcionan como mediaquerys de css pero en js de swiper.js
                768:{
                    slidesPerView: 2
                },
                1024:{
                    slidesPerView: 3
                },
                1280:{
                    slidesPerView: 4
                }
            }


        }
        Swiper.use([Navigation])
        new Swiper('.slider', opciones)
    }
});