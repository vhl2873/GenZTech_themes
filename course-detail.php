<?php
/**
 * Template Name: Course Detail
 * 
 * @package BambooStudy
 * @since 1.0
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

get_header(); ?>

<main id="primary" class="site-main">
    <div class="container py-4">
        <!-- Course Header -->
        <div class="course-header mb-4">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                        <h1 class="course-title"><?php the_title(); ?></h1>
                        
                        <!-- Course Categories -->
                        <div class="course-categories mb-3">
                            <?php
                            $course_categories = get_post_meta(get_the_ID(), 'course_categories', true);
                            if ($course_categories) {
                                $categories = explode(',', $course_categories);
                                foreach ($categories as $category) {
                                    $category = trim($category);
                                    if (!empty($category)) {
                                        echo '<span class="badge bg-light text-dark me-2">' . esc_html($category) . '</span>';
                                    }
                                }
                            } else {
                                // Default categories if no custom field is set
                                $default_categories = ['All', 'Speaking', 'Writing', 'Reading', 'Listening'];
                                foreach ($default_categories as $category) {
                                    echo '<span class="badge bg-light text-dark me-2">' . esc_html($category) . '</span>';
                                }
                            }
                            ?>
                        </div>
                        
                        <!-- Creator Info -->
                        <div class="creator-info d-flex align-items-center">
                            <div class="creator-logo me-2">
                                <?php if (has_custom_logo()) : ?>
                                    <?php the_custom_logo(); ?>
                                <?php else : ?>
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="<?php bloginfo('name'); ?>" width="24" height="24">
                                <?php endif; ?>
                            </div>
                            <span class="text-muted">
                                <?php _e('Created by:', 'bamboo-study'); ?> 
                                <strong><?php echo esc_html(get_post_meta(get_the_ID(), 'course_instructor', true) ?: get_bloginfo('name')); ?></strong>
                            </span>
                            <div class="rating ms-3">
                                <?php
                                $rating = get_post_meta(get_the_ID(), 'course_rating', true) ?: 5;
                                for ($i = 1; $i <= 5; $i++) {
                                    echo '<span class="text-warning">' . ($i <= $rating ? '★' : '☆') . '</span>';
                                }
                                ?>
                            </div>
                        </div>
                    <?php endwhile; endif; ?>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Main Content -->
            <div class="col-lg-8">
                <!-- Video Player -->
                <div class="video-container mb-4">
                    <?php
                    $video_url = get_post_meta(get_the_ID(), 'course_video_url', true);
                    $video_thumbnail = get_post_meta(get_the_ID(), 'course_video_thumbnail', true);
                    ?>
                    <div class="video-player bg-dark rounded position-relative" style="height: 400px;">
                        <?php if ($video_url) : ?>
                            <video width="100%" height="100%" controls style="border-radius: 12px;">
                                <source src="<?php echo esc_url($video_url); ?>" type="video/mp4">
                                <?php _e('Your browser does not support the video tag.', 'bamboo-study'); ?>
                            </video>
                        <?php else : ?>
                            <div class="position-absolute top-50 start-50 translate-middle text-center text-white">
                                <div class="play-button bg-success rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                                    <i class="fas fa-play fs-2"></i>
                                </div>
                                <p class="mt-3"><?php _e('Click to play video', 'bamboo-study'); ?></p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Course Tabs -->
                <div class="course-tabs">
                    <ul class="nav nav-tabs" id="courseTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="overview-tab" data-bs-toggle="tab" data-bs-target="#overview" type="button" role="tab" aria-controls="overview" aria-selected="true">
                                Tổng quan
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="content-tab" data-bs-toggle="tab" data-bs-target="#content" type="button" role="tab" aria-controls="content" aria-selected="false">
                                Nội dung
                            </button>
                        </li>
                    </ul>
                    
                    <div class="tab-content mt-4" id="courseTabContent">
                        <!-- Overview Tab -->
                        <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                            <div class="course-overview">
                                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                                    <div class="entry-content">
                                        <?php the_content(); ?>
                                    </div>
                                <?php endwhile; endif; ?>
                            </div>
                        </div>
                        
                        <!-- Content Tab -->
                        <div class="tab-pane fade" id="content" role="tabpanel" aria-labelledby="content-tab">
                            <div class="course-content">
                                <?php
                                $course_features = get_post_meta(get_the_ID(), 'course_features', true);
                                if ($course_features) {
                                    $features = explode("\n", $course_features);
                                    echo '<ul class="list-unstyled">';
                                    foreach ($features as $feature) {
                                        $feature = trim($feature);
                                        if (!empty($feature)) {
                                            echo '<li class="mb-2"><span class="text-danger me-2">→</span>' . esc_html($feature) . '</li>';
                                        }
                                    }
                                    echo '</ul>';
                                } else {
                                    // Default content if no custom field is set
                                    $default_features = [
                                        __('This course is for those who want to launch a Freelance Web Design career.', 'bamboo-study'),
                                        __('Prassent eget consequat elit. Duis a pretium purus.', 'bamboo-study'),
                                        __('Sed sagittis suscipit condimentum pellentesque vulputate feugiat libero nec accumsan.', 'bamboo-study'),
                                        __('Those who are looking to reboot their work life and try a new profession that is fun, rewarding and highly in-demand.', 'bamboo-study')
                                    ];
                                    echo '<ul class="list-unstyled">';
                                    foreach ($default_features as $feature) {
                                        echo '<li class="mb-2"><span class="text-danger me-2">→</span>' . esc_html($feature) . '</li>';
                                    }
                                    echo '</ul>';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <div class="course-sidebar">
                    <!-- Pricing -->
                    <div class="pricing-card bg-light p-4 rounded mb-4">
                        <?php
                        $current_price = get_post_meta(get_the_ID(), 'course_current_price', true) ?: '69 K';
                        $original_price = get_post_meta(get_the_ID(), 'course_original_price', true) ?: '100K';
                        $discount_percent = get_post_meta(get_the_ID(), 'course_discount_percent', true) ?: '56';
                        $discount_valid = get_post_meta(get_the_ID(), 'course_discount_valid', true) ?: '31/12/2025';
                        ?>
                        <div class="price-display mb-3">
                            <div class="current-price text-success fs-2 fw-bold"><?php echo esc_html($current_price); ?></div>
                            <div class="original-price text-muted text-decoration-line-through"><?php echo esc_html($original_price); ?></div>
                        </div>
                        
                        <div class="discount-badge bg-danger text-white px-2 py-1 rounded mb-3 d-inline-block">
                            <?php echo esc_html($discount_percent); ?>% OFF
                        </div>
                        
                        <div class="discount-valid text-muted small mb-3">
                            <?php printf(__('Gia giảm áp dụng tới %s', 'bamboo-study'), esc_html($discount_valid)); ?>
                        </div>
                    </div>

                    <!-- Course Info -->
                    <div class="course-info bg-white border rounded p-4 mb-4">
                        <h5 class="mb-3"><?php _e('Thông tin khóa học', 'bamboo-study'); ?></h5>
                        <?php
                        $duration = get_post_meta(get_the_ID(), 'course_duration', true) ?: '8 hours';
                        $video_count = get_post_meta(get_the_ID(), 'course_video_count', true) ?: '10 videos';
                        $content_type = get_post_meta(get_the_ID(), 'course_content_type', true) ?: __('Business English', 'bamboo-study');
                        ?>
                        <div class="info-item d-flex justify-content-between mb-2">
                            <span><?php _e('Thời lượng:', 'bamboo-study'); ?></span>
                            <strong><?php echo esc_html($duration); ?></strong>
                        </div>
                        <div class="info-item d-flex justify-content-between mb-2">
                            <span><?php _e('Số lượng:', 'bamboo-study'); ?></span>
                            <strong><?php echo esc_html($video_count); ?></strong>
                        </div>
                        <div class="info-item d-flex justify-content-between">
                            <span><?php _e('Nội dung:', 'bamboo-study'); ?></span>
                            <strong><?php echo esc_html($content_type); ?></strong>
                        </div>
                    </div>

                    <!-- Purchase Button -->
                    <div class="purchase-section mb-4">
                        <?php
                        $purchase_button_text = get_post_meta(get_the_ID(), 'course_purchase_button_text', true) ?: __('Thanh Toán Bên Dưới', 'bamboo-study');
                        $purchase_url = get_post_meta(get_the_ID(), 'course_purchase_url', true);
                        ?>
                        <?php if ($purchase_url) : ?>
                            <a href="<?php echo esc_url($purchase_url); ?>" class="btn btn-success w-100 py-3 rounded-pill fw-bold">
                                <?php echo esc_html($purchase_button_text); ?>
                            </a>
                        <?php else : ?>
                            <button class="btn btn-success w-100 py-3 rounded-pill fw-bold">
                                <?php echo esc_html($purchase_button_text); ?>
                            </button>
                        <?php endif; ?>
                    </div>

                    <!-- Notes -->
                    <div class="notes bg-warning bg-opacity-10 p-3 rounded mb-4">
                        <h6 class="text-warning"><?php _e('Note nhỏ xíu', 'bamboo-study'); ?></h6>
                        <?php
                        $course_notes = get_post_meta(get_the_ID(), 'course_notes', true);
                        if ($course_notes) {
                            $notes = explode("\n", $course_notes);
                            foreach ($notes as $note) {
                                $note = trim($note);
                                if (!empty($note)) {
                                    echo '<p class="small mb-2">' . esc_html($note) . '</p>';
                                }
                            }
                        } else {
                            // Default notes
                            echo '<p class="small mb-2">' . __('Khóa học được ghi hình và ghi chú bởi một học viên chăm chỉ của giảng viên', 'bamboo-study') . '</p>';
                            echo '<p class="small mb-2">' . __('Bạn có thể tham khảo thêm nguồn chính thống để hiểu sâu hơn nhé', 'bamboo-study') . '</p>';
                            echo '<p class="small">' . __('Cảm ơn bạn nhiều nhaa', 'bamboo-study') . '</p>';
                        }
                        ?>
                    </div>

                    <!-- Payment Instructions -->
                    <div class="payment-instructions bg-light p-3 rounded">
                        <h6><?php _e('Hướng dẫn mua hàng & thanh toán', 'bamboo-study'); ?></h6>
                        <?php
                        $payment_instructions = get_post_meta(get_the_ID(), 'course_payment_instructions', true);
                        if ($payment_instructions) {
                            $instructions = explode("\n", $payment_instructions);
                            echo '<ol class="small">';
                            foreach ($instructions as $instruction) {
                                $instruction = trim($instruction);
                                if (!empty($instruction)) {
                                    echo '<li class="mb-1">' . esc_html($instruction) . '</li>';
                                }
                            }
                            echo '</ol>';
                        } else {
                            // Default payment instructions
                            $default_instructions = [
                                __('Quét mã QR bên dưới hoặc chuyển khoản đến STK...', 'bamboo-study'),
                                __('Nội dung chuyển khoản: Gmail + [(Mã khóa học 1)] [(Mã khóa học 2)]', 'bamboo-study'),
                                __('Gửi thông tin thanh toán về fanpage BambooStudy', 'bamboo-study'),
                                __('Chờ phản hồi, Bamboo sẽ gửi khóa học qua Gmail của bạn', 'bamboo-study'),
                                __('Cảm ơn bạn đã chọn Bamboostudy. Let\'s study cute & smart together!', 'bamboo-study')
                            ];
                            echo '<ol class="small">';
                            foreach ($default_instructions as $instruction) {
                                echo '<li class="mb-1">' . esc_html($instruction) . '</li>';
                            }
                            echo '</ol>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>
