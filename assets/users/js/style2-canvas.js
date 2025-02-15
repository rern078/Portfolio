(function () {
      const canvas = document.getElementById('constellationCanvas');
      const ctx = canvas.getContext('2d');

      canvas.width = window.innerWidth;
      canvas.height = window.innerHeight;

      let mouseX = canvas.width / 2;
      let mouseY = canvas.height / 2;

      class Particle {
            constructor() {
                  this.x = Math.random() * canvas.width;
                  this.y = Math.random() * canvas.height;
                  this.size = Math.random() * 2 + 1;
                  this.speedX = Math.random() * 2 - 1;
                  this.speedY = Math.random() * 2 - 1;
                  this.color = `hsl(${Math.random() * 60 + 200}, 70%, 70%)`;
            }

            update() {
                  this.x += this.speedX;
                  this.y += this.speedY;

                  // Bounce off edges
                  if (this.x > canvas.width || this.x < 0) this.speedX *= -1;
                  if (this.y > canvas.height || this.y < 0) this.speedY *= -1;

                  // Particle attraction to mouse
                  const dx = mouseX - this.x;
                  const dy = mouseY - this.y;
                  const distance = Math.sqrt(dx * dx + dy * dy);

                  if (distance < 150) {
                        this.x -= dx * 0.01;
                        this.y -= dy * 0.01;
                  }
            }

            draw() {
                  ctx.beginPath();
                  ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
                  ctx.fillStyle = this.color;
                  ctx.fill();
            }
      }

      const particles = [];
      const particleCount = 150;

      // Create particles
      for (let i = 0; i < particleCount; i++) {
            particles.push(new Particle());
      }

      function drawLines() {
            for (let i = 0; i < particles.length; i++) {
                  for (let j = i + 1; j < particles.length; j++) {
                        const dx = particles[i].x - particles[j].x;
                        const dy = particles[i].y - particles[j].y;
                        const distance = Math.sqrt(dx * dx + dy * dy);

                        if (distance < 100) {
                              ctx.beginPath();
                              ctx.strokeStyle = `rgba(255, 255, 255, ${0.1 * (1 - distance / 100)})`;
                              ctx.lineWidth = 0.5;
                              ctx.moveTo(particles[i].x, particles[i].y);
                              ctx.lineTo(particles[j].x, particles[j].y);
                              ctx.stroke();
                        }
                  }
            }
      }
      function animate() {
            ctx.globalCompositeOperation = 'destination-out';
            ctx.fillStyle = 'rgba(10, 10, 42, 0.1)';
            ctx.fillRect(0, 0, canvas.width, canvas.height);
            ctx.globalCompositeOperation = 'source-over';
            particles.forEach(particle => {
                  particle.update();
                  particle.draw();
            });

            drawLines();
            requestAnimationFrame(animate);
      }

      // Mouse movement handler
      canvas.addEventListener('mousemove', (e) => {
            mouseX = e.clientX;
            mouseY = e.clientY;
      });

      // Touch handler for mobile
      canvas.addEventListener('touchmove', (e) => {
            e.preventDefault();
            mouseX = e.touches[0].clientX;
            mouseY = e.touches[0].clientY;
      });

      // Window resize handler
      window.addEventListener('resize', () => {
            canvas.width = window.innerWidth;
            canvas.height = window.innerHeight;
      });

      animate();
})();