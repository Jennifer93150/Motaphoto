let id;
let slideIndex = 1;
let currentIndex;

function openLightbox(postId) {
    const lightbox = document.getElementById("lightbox");
    const lightboxContent = document.getElementById('lightbox-content');

    data = {
        action: 'get_post_content',
        post_id: postId,
    }
    $.ajax({
        url: ajaxurl,
        type: 'POST',
        data: data,
        success: function (response) {
            lightboxContent.innerHTML = response;
            lightbox.style.display = "block";
            id = postId;
        }
    });
}

function lightboxClose() {
    lightbox.style.display = "none";
}

function plusSlides(n) {
    
    let slides = document.getElementsByClassName("lightbox-photo");
    let currentSlide = document.getElementById('lightbox-photo-' + id);
    currentIndex = parseInt(currentSlide.getAttribute('data-index'));
    currentSlide.setAttribute('data-index', currentIndex += n);
    slideIndex = currentIndex;

    if (slideIndex > slides.length) {
        slideIndex = 1;
        currentSlide.setAttribute('data-index', slideIndex);
    }
    if (slideIndex < 1) {
        slideIndex = slides.length;
        currentSlide.setAttribute('data-index', slideIndex);
    }
    showSlides(slideIndex);
}

function showSlides(n) {

    let slides = document.getElementsByClassName("lightbox-photo");

    for (let i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    slides[slideIndex - 1].style.display = "block";
}
