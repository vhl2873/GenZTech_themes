  <!-- Footer -->
  <footer class="site-footer">
    <?php if (is_active_sidebar('footer-1')) : ?>
      <div class="footer-widgets py-5">
        <div class="container">
          <div class="row">
            <?php dynamic_sidebar('footer-1'); ?>
          </div>
        </div>
      </div>
    <?php endif; ?>
    
    <!-- Footer slim bar -->
    <div class="footer-bottom text-center small py-3">
      <div class="container">
        <p class="mb-0">
          <?php
          printf(
            __('Copyright %s %s | Design & Developed by %s', 'bamboo-study'),
            '&copy;',
            date('Y'),
            get_bloginfo('name')
          );
          ?>
        </p>
      </div>
    </div>
  </footer>

  <?php wp_footer(); ?>
</body>
</html>


