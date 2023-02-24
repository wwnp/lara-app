// import './bootstrap';
import '../sass/app.scss';
const loading = document.querySelector('#loading');
const currentYearId = document.querySelector("#currentYearId")

currentYearId.innerHTML = (new Date()).getFullYear();

// window.addEventListener('load', function () {
//     loading.style.display = 'none';
// });