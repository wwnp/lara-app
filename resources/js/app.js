// import './bootstrap';
import '../sass/app.scss';
import { removeNotification } from './remove-notication.js';
import { tagbuttons } from './tagbuttons.js';

import Prism from 'prismjs';

import ClipboardJS from 'clipboard';

// import './toastify.js';

document.addEventListener('DOMContentLoaded', function () {
    Prism.highlightAll();
});

// const clipboard = new ClipboardJS('.copy-btn');

document.addEventListener('DOMContentLoaded', function () {
    new ClipboardJS('.copy-btn', {
        text: function (trigger) {
            return trigger.previousElementSibling.textContent;
        }
    }).on('success', function (e) {
        e.clearSelection();
        console.log('Copied!');
    });
});


removeNotification()


const loading = document.querySelector('#loading');
const currentYearId = document.querySelector("#currentYearId")
currentYearId.innerHTML = (new Date()).getFullYear();

// window.addEventListener('load', function () {
//     loading.style.display = 'none';
// });

tagbuttons()

