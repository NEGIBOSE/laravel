// // import "./bootstrap.js";

// import Alpine from "alpinejs";

// window.Alpine = Alpine;

// Alpine.start();

window.onload = function () {
    var images = [
        "/images/picture1.png",
        "/images/picture2.png",
        "/images/picture3.png",
        "/images/picture4.png",
        "/images/picture5.png",
        "/images/picture6.png",
        "/images/picture7.png",
        "/images/picture8.png",
        "/images/picture9.png",
    ];

    var randomIndex = Math.floor(Math.random() * images.length);
    var randomImage = images[randomIndex];

    var img = document.getElementById("myImage");
    img.src = randomImage;
};
