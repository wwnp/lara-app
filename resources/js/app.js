// import './bootstrap';
import '../sass/app.scss';
import { removeNotification } from './remove-notication.js';

import Prism from 'prismjs';

import ClipboardJS from 'clipboard';

document.addEventListener('DOMContentLoaded', function () {
    Prism.highlightAll();
    console.log(Prism)
});

// const clipboard = new ClipboardJS('.copy-btn');

document.addEventListener('DOMContentLoaded', function () {
    console.log(123)
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