document.querySelector('.left-arrow').addEventListener('click', function() {
    const asideElement = document.querySelector('aside');
    asideElement.classList.toggle('hidden');
    
    if (asideElement.classList.contains('hidden')) {
        this.innerHTML = '&rarr;'; 
    } else {
        this.innerHTML = '&larr;'; 
    }
});
