<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="profile" href="https://gmpg.org/xfn/11">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

  <!-- Header -->
  <header class="navbar navbar-expand-lg bg-white shadow-sm sticky-top py-3">
    <div class="container">
      <?php
      // Custom logo or site title
      if (has_custom_logo()) {
        the_custom_logo();
      } else {
        ?>
        <a class="navbar-brand d-flex align-items-center" href="<?php echo esc_url(home_url('/')); ?>">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="<?php bloginfo('name'); ?>" height="40" class="me-2">
          <span class="fw-bold text-success"><?php bloginfo('name'); ?></span>
        </a>
        <?php
      }
      ?>

      <!-- Search -->
      <div class="search-bar">
        <span class="search-icon">🔍</span>
        <?php get_search_form(); ?>
        <button>Explore <span class="arrow">▼</span></button>
      </div>

      <!-- Menu -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="<?php esc_attr_e('Toggle navigation', 'bamboo-study'); ?>">
        <span class="navbar-toggler-icon"></span>
      </button>
      
      <div class="collapse navbar-collapse" id="navbarNav">
        <?php
        wp_nav_menu(array(
          'theme_location' => 'primary',
          'menu_class'     => 'navbar-nav me-auto mb-2 mb-lg-0',
          'container'      => false,
          'fallback_cb'    => 'bamboo_study_fallback_menu',
        ));
        ?>
      </div>

      <a href="#" class="btn btn-success rounded-pill fw-bold"><?php _e('Lịch thi & tham khảo', 'bamboo-study'); ?></a>
    </div>
  </header>


