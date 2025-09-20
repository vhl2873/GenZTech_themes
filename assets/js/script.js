// Hiệu ứng nổi cho các box quanh Panda
document.addEventListener("DOMContentLoaded", () => {
  const boxes = document.querySelectorAll(".floating-box");

  boxes.forEach((box, i) => {
    let offset = Math.random() * 2 * Math.PI; // lệch pha ngẫu nhiên
    function animate() {
      let y = Math.sin(Date.now() / 1000 + offset + i) * 12; // độ cao dao động
      box.style.transform = `translateY(${y}px)`;
      requestAnimationFrame(animate); // mượt hơn setInterval
    }
    animate();
  });

  // Course Detail Page Functionality
  const playButton = document.querySelector('.play-button');
  const videoPlayer = document.querySelector('.video-player');
  
  if (playButton && videoPlayer) {
    playButton.addEventListener('click', function() {
      // Tạo video element thực tế khi click
      const videoHTML = `
        <video width="100%" height="100%" controls autoplay style="border-radius: 12px;">
          <source src="https://sample-videos.com/zip/10/mp4/SampleVideo_1280x720_1mb.mp4" type="video/mp4">
          Your browser does not support the video tag.
        </video>
      `;
      
      videoPlayer.innerHTML = videoHTML;
    });
  }

  // Smooth scroll for anchor links
  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
      e.preventDefault();
      const target = document.querySelector(this.getAttribute('href'));
      if (target) {
        target.scrollIntoView({
          behavior: 'smooth',
          block: 'start'
        });
      }
    });
  });

  // Add loading animation to purchase button
  const purchaseBtn = document.querySelector('.purchase-section .btn');
  if (purchaseBtn) {
    purchaseBtn.addEventListener('click', function(e) {
      e.preventDefault();
      
      // Add loading state
      const originalText = this.textContent;
      this.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Đang xử lý...';
      this.disabled = true;
      
      // Simulate processing
      setTimeout(() => {
        this.innerHTML = originalText;
        this.disabled = false;
        
        // Show payment instructions
        const paymentSection = document.querySelector('.payment-instructions');
        if (paymentSection) {
          paymentSection.scrollIntoView({ behavior: 'smooth' });
          paymentSection.classList.add('border-success', 'bg-success', 'bg-opacity-10');
          
          setTimeout(() => {
            paymentSection.classList.remove('border-success', 'bg-success', 'bg-opacity-10');
          }, 3000);
        }
      }, 2000);
    });
  }
});
