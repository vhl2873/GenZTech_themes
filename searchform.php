<?php
/**
 * Search form template
 *
 * @package BambooStudy
 */
?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
    <input type="search" class="search-field" placeholder="<?php echo esc_attr_x('Want to learn?', 'placeholder', 'bamboo-study'); ?>" value="<?php echo get_search_query(); ?>" name="s" />
</form>
