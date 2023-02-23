// import './bootstrap';
import '../sass/app.scss';

const currentYearId = document.querySelector("#currentYearId")
currentYearId.innerHTML = (new Date()).getFullYear();