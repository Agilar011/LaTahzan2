const menu = document.getElementById('menu-label');
const sidebar = document.getElementsByClassName('sidebar')[0];

menu.addEventListener('click', function(){
    sidebar.classList.toggle('hide');

});


const buttons = document.querySelectorAll('.list-items a');

buttons.forEach(button => {
    button.addEventListener('click', () => {
        // Hapus kelas "active" dari tombol yang lain
        buttons.forEach(otherButton => {
            otherButton.classList.remove('active');
        });

        // Tambahkan kelas "active" pada tombol yang diklik
        button.classList.add('active');
    });
});
