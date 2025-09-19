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
});
