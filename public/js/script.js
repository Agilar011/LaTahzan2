const menu = document.getElementById('menu-label');
const sidebar = document.getElementsByClassName('sidebar')[0];

menu.addEventListener('click', function(){
    sidebar.classList.toggle('hide');

})

// function tambahOto(){
//     window.open('/tambah-oto')
// }
