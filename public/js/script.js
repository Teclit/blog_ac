const menus = document.querySelectorAll('.navbar-nav .nav-item a');
console.log(menus);

menus.forEach((menu) => {
    menu.addEventListener('click', () => {
        const menuLink = document.querySelector('.nav-item .active')
        menuLink.classList.remove('active');
        menu.classList.add('active');
        console.log(menuLink);
        console.log(menu);
    })
});



