var imageUrl;
var totalCountPhoto;
var photoTitle;
var reference;

window.addEventListener("DOMContentLoaded", (event) => {

    document.getElementById('cc_formation_wrap').addEventListener('click', function (event) {
        // Vérifie si l'élément cible du clic correspond à celui sur lequel je veux agir
        if (event.target && event.target.classList.contains('overlay-icon_fullscreen')) {
            //Je recup les infos de l'image envoyés coté php sur l'element cliqué
            imageUrl = event.target.getAttribute('data-image');
            totalCountPhoto = event.target.getAttribute('data-count');
            photoTitle = event.target.getAttribute('data-title');
            photoRef = event.target.getAttribute('data-ref');

            //Change url image in lightbox
            const lightboxPhoto = document.querySelector("#lightbox-photo");
            const lightboxTitle = document.querySelector("#lightbox-photo_title");
            const lightboxRef = document.querySelector("#lightbox-photo_ref");
            lightboxPhoto.setAttribute('src', imageUrl);
            lightboxTitle.innerHTML=photoTitle;
            lightboxRef.innerHTML=photoRef;
            

        }
    });
});

function openLightbox() {
    const lightbox = document.getElementById("lightbox");
    lightbox.style.display = "block";

}

function lightboxClose() {
    lightbox.style.display = "none";
}

function changeImage(change) {
    const lightboxPhoto = document.querySelector("#lightbox-photo");
    const lightboxId = document.querySelector("#lightbox-photo_id");
    // ID de l'image
    var lightboxImageId = imageUrl.split('-')[2];
    var numberId = parseInt(lightboxImageId);
    // ID - or + 1 (prec/next)
    var newId = numberId += change;

    const totalImages = parseInt(totalCountPhoto); // nombre total d'images
    var urlArray = imageUrl.split('-');

    if (newId < totalImages && newId != -1) {
        // newId = (totalImages) - 1;
        imageUrl = urlArray[0] + '-' + urlArray[1] + '-' + newId + '-' + urlArray[3]
    } else if (newId >= totalImages) {
        newId = 0;
        imageUrl = urlArray[0] + '-' + urlArray[1] + '-' + newId + '-' + urlArray[3]
    } else if (newId < 0) {
        newId = totalImages - 1;
        imageUrl = urlArray[0] + '-' + urlArray[1] + '-' + newId + '-' + urlArray[3]
    }
    lightboxPhoto.setAttribute('src', imageUrl);
}




// jQuery(document).ready(function ($) {
//     $('.lightbox-link').click(function (e) {
//         e.preventDefault();
//         var target = $(this).attr('href');
//         $(target).fadeIn();
//     });

//     $('.lightbox-content').click(function () {
//         $(this).fadeOut();
//     });

//     // Exemple de fonctionnalité de navigation
//     $('.lightbox-content').click(function () {
//         $(this).fadeOut();
//     });

//     $('.lightbox-next').click(function () {
//         var currentId = parseInt($(this).attr('data-cpt-id'));
//         var nextId = currentId + 1; // Calculez le prochain ID
//         // Chargez le contenu du prochain élément dans la lightbox
//         // Mettez à jour les boutons de navigation avec les nouveaux IDs
//     });

// });
