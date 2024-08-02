import './bootstrap';


import Swiper from 'swiper';
import 'swiper/css';
import noUiSlider from 'nouislider';
import 'nouislider/dist/nouislider.css';
import wNumb from 'wnumb';
import NiceSelect from "nice-select2";


let rangeInstance = null;

function initializePriceRangeSlider() {
    const elements = document.querySelectorAll(".range-filter");

    if (!elements) return;

    elements.forEach(function (rangeFilter) {
        let max = parseFloat(rangeFilter.getAttribute('data-max'));
        let setMax = parseFloat(rangeFilter.getAttribute('data-set-max'));
        let min = parseFloat(rangeFilter.getAttribute('data-min'));
        let setMin = parseFloat(rangeFilter.getAttribute('data-set-min'));
        let propId = rangeFilter.getAttribute('data-prop-id');

        noUiSlider.create(rangeFilter, {
            start: [setMin, setMax],
            step: 1,
            connect: true,
            range: {
                'min': min,
                'max': max
            },
            format: wNumb({
                decimals: 0
            })
        });

        rangeFilter.noUiSlider.on('update', function (values, handle) {
            document.getElementById('rangeValue-property' + propId).innerText = values[0] + ' - ' + values[1];
        });

        rangeFilter.noUiSlider.on('end', function (values, handle) {
            Livewire.dispatch('updateRangeFilter', {min: values[0], max: values[1], property: propId});
        });
    })

}


const swiper = new Swiper('.swiper', {
    loop: true,

    pagination: {
        el: '.swiper-pagination',
        clickable: true
    },
});

const productSwiper = new Swiper('.productSwiper', {
    slidesPerView: '4',
    spaceBetween: 8,
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
});

/*// ending in
const countMinute = document.getElementById('count_minute')
const countSecond = document.getElementById('count_second')

const currentYear = new Date().getFullYear();
const newYearTime = new Date(`january 1 ${currentYear + 1} 00:00`);

function updateEndingTime() {
    const currentYear = new Date();
    const diff = newYearTime - currentYear;

    const m = Math.floor(diff / 1000 / 60) % 60;
    const s = Math.floor(diff / 1000) % 60;

    countMinute.innerText = m
    countSecond.innerText = s
}
setInterval(() => {
    updateEndingTime()
}, 1000);*/


document.addEventListener('changeViewType', function (event) {
    const type = event.detail.type;
    const gridButton = document.getElementById('change_view_type_grid');
    const listButton = document.getElementById('change_view_type_list');

    function activateButton(button) {
        button.classList.add('bg-primary', 'text-white');
        button.classList.remove('text-black');
    }

    function deactivateButton(button) {
        button.classList.remove('bg-primary', 'text-white');
        button.classList.add('text-black');
    }

    if (type === 'grid') {
        activateButton(gridButton);
        deactivateButton(listButton);
    } else {
        activateButton(listButton);
        deactivateButton(gridButton);
    }
});

function initializeNiceSelect() {
    const elements = document.querySelectorAll(".nice-select");

    elements.forEach((element) => {
        const instance = new NiceSelect(element);
    });
}

initializeNiceSelect();


document.addEventListener('livewire:initialized', () => {
    initializePriceRangeSlider();
});

document.addEventListener('livewire:alert', function (event) {
    const alert = event.detail[0];
    notificationManager.showNotification(alert.message, alert.type, alert.timeout);
});

class NotificationManager {
    constructor() {
        this.queue = [];
        this.isShowing = false;
    }

    showNotification(message, type = 'info', duration = 3) {
        duration *= 1000;
        const notification = { message, type, duration };
        this.queue.push(notification);
        if (!this.isShowing) {
            this.displayNext();
        }
    }

    displayNext() {
        if (this.queue.length === 0) {
            this.isShowing = false;
            return;
        }

        this.isShowing = true;
        const { message, type, duration } = this.queue.shift();

        const notificationElement = document.createElement('div');
        notificationElement.classList.add('notification', type);
        notificationElement.textContent = message;

        const container = document.getElementById('notificationContainer');
        container.appendChild(notificationElement);

        // Show the notification
        requestAnimationFrame(() => {
            notificationElement.classList.add('show');
        });

        setTimeout(() => {
            // Hide the notification
            notificationElement.classList.remove('show');
            setTimeout(() => {
                container.removeChild(notificationElement);
                this.displayNext();
            }, 400);
        }, duration);
    }
}

const notificationManager = new NotificationManager();
