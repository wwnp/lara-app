// import './bootstrap';
import '../sass/app.scss';
import { removeNotification } from './remove-notication.js';

removeNotification()


const loading = document.querySelector('#loading');
const currentYearId = document.querySelector("#currentYearId")

currentYearId.innerHTML = (new Date()).getFullYear();

// window.addEventListener('load', function () {
//     loading.style.display = 'none';
// });