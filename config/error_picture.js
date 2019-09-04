document.addEventListener("DOMContentLoaded", function(event) {
    document.querySelector('img').forEach(function(img){
        img.onerror = function(){this.style.display='none';};
    })
});
