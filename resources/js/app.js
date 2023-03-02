// import './bootstrap';
import '../sass/app.scss';
import { removeNotification } from './remove-notication.js';

import Prism from 'prismjs';


document.addEventListener('DOMContentLoaded', function () {
    Prism.highlightAll();
    console.log(Prism)
});


removeNotification()


const loading = document.querySelector('#loading');
const currentYearId = document.querySelector("#currentYearId")
currentYearId.innerHTML = (new Date()).getFullYear();

// window.addEventListener('load', function () {
//     loading.style.display = 'none';
// });