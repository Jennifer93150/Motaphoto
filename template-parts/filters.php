<!-- FILTERS -->
<form action="#" method="POST" id="filters">
    <div class="dropdown">
        <?php // Formulaire de filtrage. On boucle directement sur les taxonomie de mon custom post type 
        // CATEGORY FILTER
        if ($terms = get_terms(array('taxonomy' => 'categorie'))) : ?>
            <div class="custom-dropdown">
                <input value="all" type="hidden" name="category_filter" id="category">
                <div class="dropdown-header" onclick="toggleDropdown(this)" id="category_options">
                    Catégories
                </div>
                <div class="dropdown-options" id="options">
                    <div onclick="selectOption(this, category)" value="all" class="option">Toutes</div>
                    <?php foreach ($terms as $term) : ?>
                        <div id="category_option" onclick="selectOption(this, category)" value="<?php echo $term->term_id; ?>" class="option"><?php echo $term->name; ?></div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php
        endif;
        // FORMAT FILTER
        if ($terms = get_terms(array('taxonomy' => 'format'))) : ?>
            <div class="custom-dropdown">
                <input value="all" type="hidden" name="format_filter" id="format">
                <div class="dropdown-header" onclick="toggleDropdown(this)">
                    Formats
                </div>
                <div class="dropdown-options" id="options">
                    <div onclick="selectOption(this, format)" value="all" class="option">Tous</div>
                    <?php foreach ($terms as $term) : ?>
                        <div id="format_option" onclick="selectOption(this, format)" value="<?php echo $term->term_id; ?>" class="option"><?php echo $term->name; ?></div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php
        endif; ?>
    </div>
    <!-- <div class="dropdown"> -->
        <!-- DATE FILTER -->
        <div class="custom-dropdown">
            <input value="DESC" type="hidden" name="order_filter" id="order" class="order">
            <div class="dropdown-header" onclick="toggleDropdown(this)">
                Trier par
            </div>
            <div class="dropdown-options" id="options">
                <div onclick="selectOption(this, order)" value="DESC" class="option">Tous</div>

                <div onclick="selectOption(this, order)" value="ASC" class="option">Les plus anciennes</div>

                <div onclick="selectOption(this, order)" value="DESC" class="option">Les plus récentes</div>
            </div>
        </div>
        <!-- required hidden field for admin-ajax.php -->
        <input type="hidden" name="action" value="filter" />
    <!-- </div> -->
</form>