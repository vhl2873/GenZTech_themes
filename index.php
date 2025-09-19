<?php get_header(); ?>

  <!-- Hero Section -->
  <section class="hero py-5">
    <div class="container">
      <div class="row align-items-center">
        <!-- Left -->
        <div class="col-lg-6">
          <h1 class="display-5 fw-bold">
            <span class="text-dark"><?php echo esc_html(bamboo_study_get_option('hero_title', 'Let The Panda')); ?></span>
            <span class="text-success"><?php echo esc_html(bamboo_study_get_option('hero_subtitle', 'Do The Prep')); ?></span><br>
            <span class="text-dark">You Just</span>
            <span class="text-success">Show Up!</span>
          </h1>
          <p class="lead text-muted">
            <?php _e('IELTS, JLPT, HSK, Business English – all in one place.', 'bamboo-study'); ?><br>
            <?php _e('Curated study materials wrapped in a panda\'s charm.', 'bamboo-study'); ?><br>
            <?php _e('Learn smart. Stay motivated. Pass with confidence.', 'bamboo-study'); ?>
          </p>
          <div class="d-flex gap-3 mb-3">
            <a href="#" class="btn btn-success rounded-pill px-4"><?php _e('Get Started', 'bamboo-study'); ?></a>
            <a href="#" class="btn btn-outline-secondary rounded-pill px-4"><?php _e('Hướng dẫn đặt hàng', 'bamboo-study'); ?></a>
          </div>
          <div class="d-flex flex-wrap gap-2">
            <span class="badge bg-light text-dark border">🗣 <?php _e('Speaking Fluency', 'bamboo-study'); ?></span>
            <span class="badge bg-light text-dark border">✍ <?php _e('Writing Skills', 'bamboo-study'); ?></span>
            <span class="badge bg-light text-dark border">🎧 <?php _e('Listening Comprehension', 'bamboo-study'); ?></span>
            <span class="badge bg-light text-dark border">📖 <?php _e('Reading Strategies', 'bamboo-study'); ?></span>
            <span class="badge bg-light text-dark border">⏱ <?php _e('Time Management', 'bamboo-study'); ?></span>
            <span class="badge bg-light text-dark border">📝 <?php _e('Test-taking Techniques', 'bamboo-study'); ?></span>
            <span class="badge bg-light text-dark border">✅ <?php _e('Answer Accuracy', 'bamboo-study'); ?></span>
            <span class="badge bg-light text-dark border">🔧 <?php _e('Error Correction', 'bamboo-study'); ?></span>
            <span class="badge bg-light text-dark border">📚 <?php _e('Vocabulary Expansion', 'bamboo-study'); ?></span>
            <span class="badge bg-light text-dark border">📊 <?php _e('Grammar Proficiency', 'bamboo-study'); ?></span>
            <span class="badge bg-light text-dark border">🔠 <?php _e('Character Recognition', 'bamboo-study'); ?></span>
            <span class="badge bg-light text-dark border">💼 <?php _e('Business Communication', 'bamboo-study'); ?></span>
          </div>
        </div>

        <!-- Right -->
        <div class="col-lg-6 text-center position-relative">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="<?php _e('Panda Study', 'bamboo-study'); ?>" class="img-fluid panda">
          <div class="floating-box position-absolute top-0 start-0">📄 <?php _e('100+ File PDF', 'bamboo-study'); ?></div>
          <div class="floating-box position-absolute top-0 end-0">🔄 <?php _e('10 Record Online Courses', 'bamboo-study'); ?></div>
          <div class="floating-box position-absolute bottom-0 end-0">🎯 <?php _e('10000+ Questions', 'bamboo-study'); ?></div>
        </div>
      </div>
    </div>
  </section>

  <!-- IELTS Section -->
  <section id="ielts" class="py-5 section-bg">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-6">
          <h2 class="fw-bold"><?php _e('IELTS', 'bamboo-study'); ?></h2>
          <p><?php _e('Học IELTS cùng', 'bamboo-study'); ?> <span class="text-success"><?php _e('Tài Liệu Bamboo', 'bamboo-study'); ?></span> 
             <span class="text-warning"><?php _e('Không Áp Lực', 'bamboo-study'); ?></span>, <?php _e('Vẫn Lên Band.', 'bamboo-study'); ?></p>
          <ul class="list-unstyled">
            <li>🗣️ <?php _e('Speaking – Giao tiếp trực tiếp với giám khảo', 'bamboo-study'); ?></li>
            <li>🎧 <?php _e('Listening – Nghe hội thoại, bài giảng', 'bamboo-study'); ?></li>
            <li>📖 <?php _e('Reading – Đọc hiểu văn bản học thuật', 'bamboo-study'); ?></li>
            <li>✍ <?php _e('Writing – Viết báo cáo, bài luận', 'bamboo-study'); ?></li>
          </ul>
          <a href="#" class="btn btn-success rounded-pill"><?php _e('Khám phá ngay →', 'bamboo-study'); ?></a>
        </div>
        <div class="col-md-6 text-center">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/ielts.png" alt="<?php _e('IELTS', 'bamboo-study'); ?>" class="img-fluid rounded shadow">
        </div>
      </div>
    </div>
  </section>

  <!-- Business English Section -->
  <section id="business" class="py-5">
    <div class="container">
      <div class="row align-items-center flex-md-row-reverse">
        <div class="col-md-6">
          <h2 class="fw-bold"><?php _e('Business English', 'bamboo-study'); ?></h2>
          <p><span class="text-warning"><?php _e('Giao Tiếp, Viết Mail, Họp Quốc Tế', 'bamboo-study'); ?></span> – <?php _e('Chuẩn Chỉ, Tự Tin.', 'bamboo-study'); ?></p>
          <ul class="list-unstyled">
            <li>💼 <?php _e('Giao tiếp công sở & thuyết trình chuyên nghiệp', 'bamboo-study'); ?></li>
            <li>📧 <?php _e('Viết email, báo cáo & CV chuẩn quốc tế', 'bamboo-study'); ?></li>
            <li>🎧 <?php _e('Nghe – hội thoại, họp online', 'bamboo-study'); ?></li>
            <li>📊 <?php _e('Thuyết trình số liệu, biểu đồ', 'bamboo-study'); ?></li>
            <li>🌍 <?php _e('Giao tiếp đa văn hoá', 'bamboo-study'); ?></li>
          </ul>
          <a href="#" class="btn btn-success rounded-pill"><?php _e('Khám phá ngay →', 'bamboo-study'); ?></a>
        </div>
        <div class="col-md-6 text-center">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/business.png" alt="<?php _e('Business English', 'bamboo-study'); ?>" class="img-fluid rounded shadow">
        </div>
      </div>
    </div>
  </section>

  <!-- JLPT Section -->
  <section id="jlpt" class="py-5 section-bg">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-6">
          <h2 class="fw-bold"><?php _e('JLPT N5-N1', 'bamboo-study'); ?></h2>
          <p><span class="text-warning"><?php _e('JLPT Không Khó', 'bamboo-study'); ?></span> – <?php _e('Có BambooStudy Ở Đó.', 'bamboo-study'); ?></p>
          <ul class="list-unstyled">
            <li>📖 <?php _e('Từ vựng N5 → N1 (nghĩa, cách dùng, ví dụ)', 'bamboo-study'); ?></li>
            <li>✍ <?php _e('Ngữ pháp trọng tâm & mẫu câu thi', 'bamboo-study'); ?></li>
            <li>📚 <?php _e('Đọc hiểu đoạn văn thực tế', 'bamboo-study'); ?></li>
            <li>🎧 <?php _e('Luyện nghe tình huống đời sống', 'bamboo-study'); ?></li>
            <li>🈶 <?php _e('Kanji & cách ghi nhớ hiệu quả', 'bamboo-study'); ?></li>
          </ul>
          <a href="#" class="btn btn-success rounded-pill"><?php _e('Khám phá ngay →', 'bamboo-study'); ?></a>
        </div>
        <div class="col-md-6 text-center">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/jlpt.png" alt="<?php _e('JLPT', 'bamboo-study'); ?>" class="img-fluid rounded shadow">
        </div>
      </div>
    </div>
  </section>

  <!-- Why Choose Section -->
  <section id="why" class="py-5">
    <div class="container">
      <h2 class="why-title text-center fw-bold mb-4"><?php _e('Tại sao nên chọn tài liệu tại BambooStudy', 'bamboo-study'); ?></h2>

      <div class="row g-4">
        <div class="col-md-6 col-lg-4">
          <div class="why-card h-100">
            <div class="why-num">01</div>
            <h5 class="mb-2">🐼 <?php _e('Chọn lọc nội dung', 'bamboo-study'); ?></h5>
            <p class="mb-0"><?php _e('Tài liệu được tổng hợp từ nguồn uy tín, luyện thi sát đề, không lan man…', 'bamboo-study'); ?></p>
          </div>
        </div>
        <div class="col-md-6 col-lg-4">
          <div class="why-card h-100">
            <div class="why-num">02</div>
            <h5 class="mb-2">🧾 <?php _e('Có file ghi chú đầy đủ', 'bamboo-study'); ?></h5>
            <p class="mb-0"><?php _e('Từng bài học đi kèm chú thích, gạch chân trọng tâm, dễ nhớ – dễ ôn.', 'bamboo-study'); ?></p>
          </div>
        </div>
        <div class="col-md-6 col-lg-4">
          <div class="why-card h-100">
            <div class="why-num">03</div>
            <h5 class="mb-2">🎥 <?php _e('Video học rõ ràng', 'bamboo-study'); ?></h5>
            <p class="mb-0"><?php _e('Hình ảnh sắc nét, giọng đọc truyền cảm, không ồn – học là thích.', 'bamboo-study'); ?></p>
          </div>
        </div>

        <div class="col-md-6 col-lg-4">
          <div class="why-card h-100">
            <div class="why-num">04</div>
            <h5 class="mb-2">💰 <?php _e('Giá cả sinh viên', 'bamboo-study'); ?></h5>
            <p class="mb-0"><?php _e('Tối ưu chi phí cho học sinh, sinh viên và người tự học.', 'bamboo-study'); ?></p>
          </div>
        </div>
        <div class="col-md-6 col-lg-4">
          <div class="why-card h-100">
            <div class="why-num">05</div>
            <h5 class="mb-2">🌐 <?php _e('Đủ bộ IELTS, JLPT, HSK, Business English', 'bamboo-study'); ?></h5>
            <p class="mb-0"><?php _e('Học nhiều ngôn ngữ, phát triển toàn diện kỹ năng học thuật & giao tiếp.', 'bamboo-study'); ?></p>
          </div>
        </div>
        <div class="col-md-6 col-lg-4">
          <div class="why-card h-100">
            <div class="why-num">06</div>
            <h5 class="mb-2">🎁 <?php _e('Tải 1 lần – học trọn đời', 'bamboo-study'); ?></h5>
            <p class="mb-0"><?php _e('Mua xong là của bạn – không giới hạn thời gian, học lại lúc nào cũng được.', 'bamboo-study'); ?></p>
          </div>
        </div>
      </div>

      <div class="why-dots mt-4 text-center">
        <span class="dot active"></span>
        <span class="dot"></span>
        <span class="dot"></span>
      </div>
    </div>
  </section>

<?php get_footer(); ?>
