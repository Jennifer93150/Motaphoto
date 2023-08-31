//FUNCTION FOR LOADMORE AND FILTERS
jQuery(function ($) {
    /* LOAD MORE FUNCTION ON FORMATION ARCHIVE PAGE */
    $('#loadmore_home_gallery').on('click', function () {
        data = {
            'action': 'load_more_photos_home', // ajax action name
            'query': posts_myajax, // my assigned variable in the file photo-query.php
            'paged': current_page_myajax, // my assigned variable in the file photo-query.php
            'order': $('#order').serialize().split('=')[1]
        };
        $.ajax({
            url: ajaxurl, // endpoint URL AJAX de WordPress
            type: 'POST',
            data: data,
            success: function (response) {
                if (response) {
                    $('#gallery_wrap').append(response);
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
                    $('#gallery_wrap').append(response);
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
    $('#filters').change(function () {    
       
        $.ajax({
            url: ajaxurl,
            // data: $('#filters').serialize(), // form data
            data: {
                action: 'filter',
                category_filter: $('#category').val(),
                format_filter: $('#format').val(),
                order_filter: $('#order').val(),
            },
            dataType: 'json',
            type: 'POST',
            success: function (data) {
                current_page_myajax = 1;

                posts_myajax = data.posts;

                max_page_myajax = data.max_page;

                $('#gallery_wrap').html(data.content);

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

function toggleDropdown(element) {
    $(element).parent().toggleClass('open');
}

function selectOption(optionElement, id) {
    //Selection de la valeur de l'elt cliqué
    let optionSelected = $(optionElement).attr('value');
    //Ajout de cette valeur à l'input concerné (categorie, format, date)
    $(id).val(optionSelected);
    //Ouverture et fermeture du select
    if(!$(optionElement).parent().hasClass('custom-dropdown')){
        $('.custom-dropdown').removeClass('open');
    }
    $(optionElement).parent().toggleClass('open');
    //Enclenchement du formulaire
    $('#filters').change();
}