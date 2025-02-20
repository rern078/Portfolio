const canvas = document.getElementById("binaryCanvasStyle");
const ctx = canvas.getContext("2d");

canvas.width = window.innerWidth;
canvas.height = window.innerHeight;

const binaryParticles = [];

// Create floating binary objects
class BinaryParticle {
      constructor() {
            this.x = Math.random() * canvas.width;
            this.y = Math.random() * canvas.height;
            this.speedY = Math.random() * 1 + 0.2; // Floating speed
            this.value = Math.random() > 0.5 ? "0" : "1"; // Random 0 or 1
            this.size = Math.random() * 20 + 10; // Random size
            this.opacity = Math.random() * 0.7 + 0.3; // Opacity variation
      }

      update() {
            this.y += this.speedY;
            if (this.y > canvas.height) {
                  this.y = 0; // Reset to top
                  this.x = Math.random() * canvas.width; // Change x position
            }
      }

      draw() {
            ctx.fillStyle = `rgba(0, 255, 0, ${this.opacity})`;
            ctx.font = `${this.size}px monospace`;
            ctx.fillText(this.value, this.x, this.y);
      }
}

// Generate 50 floating binary numbers
for (let i = 0; i < 50; i++) {
      binaryParticles.push(new BinaryParticle());
}

function animate() {
      ctx.clearRect(0, 0, canvas.width, canvas.height);

      binaryParticles.forEach(particle => {
            particle.update();
            particle.draw();
      });

      requestAnimationFrame(animate);
}

animate();

window.addEventListener("resize", () => {
      canvas.width = window.innerWidth;
      canvas.height = window.innerHeight;
      binaryParticles.length = 0;
      for (let i = 0; i < 50; i++) {
            binaryParticles.push(new BinaryParticle());
      }
});