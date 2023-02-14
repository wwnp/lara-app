import './bootstrap';
// import '../sass/app.scss';

console.log(123123);

const currentYearId = document.querySelector("#currentYearId")
currentYearId.innerHTML = (new Date()).getFullYear();
