<?php

// Fonction de filtre
function cc_formation_filter_function()
{
	$category = $_POST['category_formation_filters'];
	$format = $_POST['format_formation_filters'];
	$order = $_POST['order_filter'];
	
	$args = array(
		'post_type' => 'photos', // Remplacez 'votre_cpt' par le nom de votre CPT
		'order' => $order,
		'tax_query' => array(
			'relation' => 'AND', // Utilisez 'AND' ou 'OR' en fonction de votre logique
			array(
				'taxonomy' => 'categorie', // Remplacez 'taxonomie_1' par le nom de votre première taxonomie
				'field'    => 'term_id', // Vous pouvez également utiliser 'slug' ou 'name' ici
				'terms'    => $category, // Remplacez par les ID des termes que vous souhaitez inclure
				'operator' => 'AND', // Utilisez 'IN', 'NOT IN', 'AND', etc.
			),
			array(
				'taxonomy' => 'format', // Remplacez 'taxonomie_2' par le nom de votre deuxième taxonomie
				'field'    => 'term_id',
				'terms'    => $format, // Remplacez par les ID des termes de la deuxième taxonomie
				'operator' => 'AND',
			),
			// Ajoutez d'autres tableaux d'argument pour plus de taxonomies
		),
	);

	$query = new WP_Query($args);
	
	if ($query->have_posts()) :
		ob_start(); //Turn on output buffering

		while ($query->have_posts()) : $query->the_post();
		// var_dump(file_get_contents("php://input"), $category);
			get_template_part('template-parts/photo_block');
			
		endwhile;

		$posts_html = ob_get_contents();
		ob_end_clean();
	else :
		$posts_html = '<p>Aucun résultat.</p>';
	endif;

	echo json_encode(array(
		'posts' => json_encode($query->query_vars),
		'max_page' => $query->max_num_pages,
		'found_posts' => $query->found_posts,
		'content' => $posts_html
	));
	die();
}

// Function button "Charger plus" in home page
function load_more_photos_home(){
	$paged = $_POST['paged']+1;
	$order = $_POST['order'];

	$args = array(
		'post_type' => 'photos',
		'posts_per_page' => 12,
		'order'=> $order,
		'paged' => $paged
	);

	$query = new WP_Query($args);
	
	if ($query->have_posts()) :
	  while ($query->have_posts()) : $query->the_post();
		
		get_template_part('template-parts/photo_block');

	  endwhile;
	endif;
	
	wp_reset_postdata();
	die();
}

// Function button "Toutes les photos" in single page
function load_more_photos_single(){
	$paged = $_POST['paged']+1;
	$categoryName = $_POST['categorie'];
	
	$args = array(
		'post_type' => 'photos',
		'posts_per_page' => 2,
		'paged' => $paged,
		'categorie' => $categoryName,
	);

	$query = new WP_Query($args);
	
	if ($query->have_posts()) :
	  while ($query->have_posts()) : $query->the_post();
			$termsArray = get_the_terms($post->ID, "categorie");
			$termsString = "";
			foreach ($termsArray as $term) {
				$termsString .= $term->slug . ' ';
			}
			get_template_part('template-parts/photo_block');

	  endwhile;
	endif;
	
	wp_reset_postdata();
	die();
}

// Actions
add_action('wp_ajax_load_more_photos_single', 'load_more_photos_single');
add_action('wp_ajax_nopriv_load_more_photos_single', 'load_more_photos_single');

add_action('wp_ajax_load_more_photos_home', 'load_more_photos_home');
add_action('wp_ajax_nopriv_load_more_photos_home', 'load_more_photos_home');

add_action('wp_ajax_ccformationfilter', 'cc_formation_filter_function');
add_action('wp_ajax_nopriv_ccformationfilter', 'cc_formation_filter_function');