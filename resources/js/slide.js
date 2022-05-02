
//Togle menu
let toggle = document.querySelector('.toggle');
let navegacion = document.querySelector('.navegacion');
let main_topbar = document.querySelector('.main_topbar');

toggle.onclick = function(){
    navegacion.classList.toggle('active');
    main_topbar.classList.toggle('active');
}

//Agregar clase hovered cuando se seleccione un item
let list = document.querySelectorAll('.navegacion li');
function activeLinks() {
    list.forEach((item) =>
        item.classList.remove('hovered'));
        this.classList.add('hovered');
}
list.forEach((item) => item.addEventListener('mouseover', activeLinks));