function toggleForm() {
    let container = document.querySelector('.container');
    let section = document.querySelector('section');  

    container.classList.toggle('active');
    section.classList.toggle('bg-toggled');  
}

window.addEventListener('DOMContentLoaded', () => {
    if (window.location.hash === '#register') {
        document.querySelector('.container').classList.add('active');
        document.querySelector('section').classList.add('bg-toggled'); 
    }
});