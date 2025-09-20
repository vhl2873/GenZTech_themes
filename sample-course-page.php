<?php
/**
 * Sample Course Page - For testing the course detail template
 * This file demonstrates how to use the course-detail.php template
 * 
 * @package BambooStudy
 */

// This is a sample page to show how the course detail template works
// In a real WordPress site, you would create a page and assign the "Course Detail" template to it

get_header(); ?>

<main id="primary" class="site-main">
    <div class="container py-4">
        <!-- Course Header -->
        <div class="course-header mb-4">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h1 class="course-title">[Record] IELTS Foundation by IELTS Huyền Nguyễn</h1>
                    
                    <!-- Course Categories -->
                    <div class="course-categories mb-3">
                        <span class="badge bg-secondary me-2">All</span>
                        <span class="badge bg-light text-dark me-2">Speaking</span>
                        <span class="badge bg-light text-dark me-2">Writing</span>
                        <span class="badge bg-light text-dark me-2">Reading</span>
                        <span class="badge bg-light text-dark">Listening</span>
                    </div>
                    
                    <!-- Creator Info -->
                    <div class="creator-info d-flex align-items-center">
                        <div class="creator-logo me-2">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="Bamboo Study" width="24" height="24">
                        </div>
                        <span class="text-muted">Created by: <strong>Bamboo Study</strong></span>
                        <div class="rating ms-3">
                            <span class="text-warning">★★★★★</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Main Content -->
            <div class="col-lg-8">
                <!-- Video Player -->
                <div class="video-container mb-4">
                    <div class="video-player bg-dark rounded position-relative" style="height: 400px;">
                        <div class="position-absolute top-50 start-50 translate-middle text-center text-white">
                            <div class="play-button bg-success rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                                <i class="fas fa-play fs-2"></i>
                            </div>
                            <p class="mt-3">Click to play video</p>
                        </div>
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
                                <p>There's nothing quite like the satisfaction of getting paid to do work you love, and earning $5,000+ for a single project is the cherry on top. I got into Web Design, not just because I love it, but because of the LIFESTYLE it allows me to live.</p>
                                
                                <p>In this course, I'll teach you the exact same methods I've used over the past 5 years to build this lifestyle. Web Design can seem complicated, but I've developed life hacks to make it simple and fun. My goal is to help you become a Freelance Web Designer in no time.</p>
                                
                                <p>This is a Design course, but I won't teach you Photoshop (it's needlessly complicated). Instead, I'll show you how to use Figma to design a complete website in just one week.</p>
                                
                                <p>This is a Development course, but I won't teach you coding (HTML & CSS are basics everyone learns). Instead, I'll show you how to use Webflow to build complex websites in just two weeks.</p>
                                
                                <p>This is a Freelancing course that gives you a winning proposal template and helps you create a stunning portfolio website. Ready to get started? Let's begin!</p>
                            </div>
                        </div>
                        
                        <!-- Content Tab -->
                        <div class="tab-pane fade" id="content" role="tabpanel" aria-labelledby="content-tab">
                            <div class="course-content">
                                <ul class="list-unstyled">
                                    <li class="mb-2">
                                        <span class="text-danger me-2">→</span>
                                        This course is for those who want to launch a Freelance Web Design career.
                                    </li>
                                    <li class="mb-2">
                                        <span class="text-danger me-2">→</span>
                                        Prassent eget consequat elit. Duis a pretium purus.
                                    </li>
                                    <li class="mb-2">
                                        <span class="text-danger me-2">→</span>
                                        Sed sagittis suscipit condimentum pellentesque vulputate feugiat libero nec accumsan.
                                    </li>
                                    <li class="mb-2">
                                        <span class="text-danger me-2">→</span>
                                        Sed nec depibus orci integer nisi turpis, eleifend sit amet aliquam vel, lacinia quis ex.
                                    </li>
                                    <li class="mb-2">
                                        <span class="text-danger me-2">→</span>
                                        Those who are looking to reboot their work life and try a new profession that is fun, rewarding and highly in-demand.
                                    </li>
                                    <li class="mb-2">
                                        <span class="text-danger me-2">→</span>
                                        Nunc auctor consequat lorem, in posuere enim hendrerit sed.
                                    </li>
                                    <li class="mb-2">
                                        <span class="text-danger me-2">→</span>
                                        Duis ornare enim ullamcorper congue consectetur suspendisse interdum tristique est sed molestie.
                                    </li>
                                </ul>
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
                        <div class="price-display mb-3">
                            <div class="current-price text-success fs-2 fw-bold">69 K</div>
                            <div class="original-price text-muted text-decoration-line-through">100K</div>
                        </div>
                        
                        <div class="discount-badge bg-danger text-white px-2 py-1 rounded mb-3 d-inline-block">
                            56% OFF
                        </div>
                        
                        <div class="discount-valid text-muted small mb-3">
                            Gia giảm áp dụng tới 31/12/2025
                        </div>
                    </div>

                    <!-- Course Info -->
                    <div class="course-info bg-white border rounded p-4 mb-4">
                        <h5 class="mb-3">Thông tin khóa học</h5>
                        <div class="info-item d-flex justify-content-between mb-2">
                            <span>Thời lượng:</span>
                            <strong>8 hours</strong>
                        </div>
                        <div class="info-item d-flex justify-content-between mb-2">
                            <span>Số lượng:</span>
                            <strong>10 videos</strong>
                        </div>
                        <div class="info-item d-flex justify-content-between">
                            <span>Nội dung:</span>
                            <strong>Business English</strong>
                        </div>
                    </div>

                    <!-- Purchase Button -->
                    <div class="purchase-section mb-4">
                        <button class="btn btn-success w-100 py-3 rounded-pill fw-bold">
                            Thanh Toán Bên Dưới
                        </button>
                    </div>

                    <!-- Notes -->
                    <div class="notes bg-warning bg-opacity-10 p-3 rounded mb-4">
                        <h6 class="text-warning">Note nhỏ xíu</h6>
                        <p class="small mb-2">Khóa học được ghi hình và ghi chú bởi một học viên chăm chỉ của giảng viên</p>
                        <p class="small mb-2">Bạn có thể tham khảo thêm nguồn chính thống để hiểu sâu hơn nhé</p>
                        <p class="small">Cảm ơn bạn nhiều nhaa</p>
                    </div>

                    <!-- Payment Instructions -->
                    <div class="payment-instructions bg-light p-3 rounded">
                        <h6>Hướng dẫn mua hàng & thanh toán</h6>
                        <ol class="small">
                            <li class="mb-1">Quét mã QR bên dưới hoặc chuyển khoản đến STK...</li>
                            <li class="mb-1">Nội dung chuyển khoản: Gmail + [(Mã khóa học 1)] [(Mã khóa học 2)]</li>
                            <li class="mb-1">Gửi thông tin thanh toán về fanpage BambooStudy</li>
                            <li class="mb-1">Chờ phản hồi, Bamboo sẽ gửi khóa học qua Gmail của bạn</li>
                            <li class="mb-0">Cảm ơn bạn đã chọn Bamboostudy. Let's study cute & smart together!</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>
