<!-- FILTERS -->
<form action="#" method="POST" id="formation_filters">
    <?php

    // DISPLAY ALL CATEGORIES
    if ($terms = get_terms(array('taxonomy' => 'categorie'))) : ?>
        <input value="all" type="hidden" name="category_formation_filters" id="category" class="category_formation_filters">
        <div class="custom-dropdown">
            <div value="all" class="dropdown-header" onclick="selectOption(this)">
                Catégories
            </div>
            <div class="dropdown-options" id="options">
                <?php foreach ($terms as $term) : ?>
                    <div id="category_option" onclick="selectOption(this)" value="<?php echo $term->term_id; ?>" class="option"><?php echo $term->name; ?></div>
                <?php endforeach; ?>
            </div>
        </div>
    <?php
    endif;
    // DISPLAY ALL FORMATS
    if ($terms = get_terms(array('taxonomy' => 'format'))) : ?>
        <select id="format" name="format_formation_filters" class="format_formation_filters">
            <option value="all">Formats</option>
            <?php foreach ($terms as $term) :
                echo '<option value="' . $term->term_id . '">' . $term->name . '</option>';
            endforeach; ?>
        </select>
    <?php
    endif; ?>

    <select id="order_filter" name="order_filter" class="order_filter">
        <option value="DESC">Trier par</option>
        <option value="ASC">Les plus anciennes</option>
        <option value="DESC">Les plus récentes</option>
    </select>
    <!-- required hidden field for admin-ajax.php -->
    <input type="hidden" name="action" value="ccformationfilter" />
</form>