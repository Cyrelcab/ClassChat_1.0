document.addEventListener("DOMContentLoaded", function() {
    var body = document.querySelector("body");
    var backgroundImage = new Image();
    backgroundImage.src = "image/background-color.jpg";
    backgroundImage.loading = "lazy";
    body.style.backgroundImage = "url('" + backgroundImage.src + "')";
});