   document.querySelectorAll(".announcement-item").forEach(item => {
    item.addEventListener("click", function () {
        let imgSrc = this.getAttribute("data-img");

        if(imgSrc){ // check if image exists
            document.getElementById("imgModal").style.display = "block";
            document.getElementById("modalImg").src = imgSrc;
        }
    });
});

// close button
document.querySelector(".close-btn").onclick = function() {
    document.getElementById("imgModal").style.display = "none";
};
var swiper = new Swiper(".myNewsSlider", {
    slidesPerView: 3,
    spaceBetween: 30,
    loop: true,

    autoplay: {
        delay: 3000,
        disableOnInteraction: false,
    },

    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },

    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },

    breakpoints: {
        0: {
            slidesPerView: 1
        },
        576: {
            slidesPerView: 1
        },
        768: {
            slidesPerView: 2
        },
        992: {
            slidesPerView: 3
        }
    }
});