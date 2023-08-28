//FUNCTION FOR LOADMORE AND FILTERS
jQuery(function ($) {
    /* LOAD MORE FUNCTION ON FORMATION ARCHIVE PAGE */
    $('#loadmore_home_gallery').on('click', function () {
        data = {
            'action': 'load_more_photos_home', // ajax action name
            'query': posts_myajax, // my assigned variable in the file photo-query.php
            'paged': current_page_myajax, // my assigned variable in the file photo-query.php
            'order': $('#order_filter').serialize().split('=')[1]
        };
        $.ajax({
            url: ajaxurl, // endpoint URL AJAX de WordPress
            type: 'POST',
            data: data,
            success: function (response) {
                if (response) {
                    $('#cc_formation_wrap').append(response);
                    current_page_myajax++;

                    if (current_page_myajax == max_page_myajax)
                        $('#loadmore_home_gallery').hide();

                } else {
                    $('#loadmore_home_gallery').hide();
                }
            }
        });
    });

    /* LOAD MORE FUNCTION in single PAGE */
    $('#loadmore_single').on('click', function () {
        data = {
            'action': 'load_more_photos_single', // le nom de mon action ajax
            'query': posts_myajax, // ma variable attribuée dans le fichier page-formation.php
            'paged': current_page_myajax, // ma variable attribuée dans le fichier page-formation.php
            'categorie': categoryName,
        };
        $.ajax({
            url: ajaxurl, // endpoint url AJAX WordPress
            type: 'POST',
            data: data,
            success: function (response) {
                if (response) {
                    $('#cc_formation_wrap').append(response);
                    current_page_myajax++;

                    if (current_page_myajax == max_page_myajax)
                        $('#loadmore_single').hide();

                } else {
                    $('#loadmore_single').hide();
                }
            }
        });
    });

    /* FILTERING FUNCTION ON FORMATION ARCHIVE PAGE */
    $('#formation_filters').change(function () {    
       
        $.ajax({
            url: ajaxurl,
            // data: $('#formation_filters').serialize(), // form data
            data: {
                action: 'ccformationfilter',
                category_formation_filters: $('#category').val(),
                format_formation_filters: $('#format').val(),
                order_filter: $('#order_filter').val(),
            },
            dataType: 'json',
            type: 'POST',
            success: function (data) {
            console.log(data)
                current_page_myajax = 1;

                posts_myajax = data.posts;

                max_page_myajax = data.max_page;

                $('#cc_formation_wrap').html(data.content);

                if (data.max_page < 2) {
                    $('#loadmore_home_gallery').hide();
                } else {
                    $('#loadmore_home_gallery').show();
                }
            }
        });
        return false;
    });
});

function toggleDropdown() {
    const dropdown = $('.custom-dropdown');
    dropdown.toggleClass('open');
}

function selectOption(optionElement) {
    // const category = $(optionElement).attr('value');
    // const format = $('#format').attr('value');
    // const order = $('#order_filter').attr('value');
    
    // const data = { 
    //     'categorie': category,
    // };
    // Envoi de la valeur sélectionnée vers le serveur en utilisant AJAX
    // $.ajax({
    //     type: "POST",
    //     url: ajaxurl,
    //     data: JSON.stringify(data),
    //     contentType: "application/json",
    //     success: function(data) {
    //         console.log(data)
    //         current_page_myajax = 1;

    //         posts_myajax = data.posts;

    //         max_page_myajax = data.max_page;

    //         $('#cc_formation_wrap').html(data.content);

    //         if (data.max_page < 2) {
    //             $('#loadmore_home_gallery').hide();
    //         } else {
    //             $('#loadmore_home_gallery').show();
    //         }
    //     },
    //     error: function(error) {
    //         console.error("Une erreur s'est produite : " + error);
    //     }
    // });
    let categorySelected = $(optionElement).attr('value');
    $('#category').val(categorySelected);
    toggleDropdown();
    $('#formation_filters').change();
}

  