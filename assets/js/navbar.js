document.addEventListener('DOMContentLoaded', function() {
    const navbar = document.querySelector('.navbar');
    
    checkScroll();
    window.addEventListener('scroll', function() {
        requestAnimationFrame(checkScroll);
    });
    
    function checkScroll() {
        if (window.scrollY > 30) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    }
});