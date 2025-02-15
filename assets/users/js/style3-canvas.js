(function () {
      const canvas = document.getElementById("particles");
      const ctx = canvas.getContext("2d");

      canvas.width = window.innerWidth;
      canvas.height = window.innerHeight;

      const particles = [];
      const numParticles = 100;
      const maxDistance = 100;
      const gravityStrength = 0.2;
      const maxVelocity = 2;
      const entropyFactor = 0;

      const mouse = {
            x: null,
            y: null,
            radius: 0,
            gravity: 0,
            growing: false,
            maxRadius: 150,
            maxGravity: 2
      };

      window.addEventListener("mousemove", (event) => {
            mouse.x = event.clientX;
            mouse.y = event.clientY;
      });

      window.addEventListener("mousedown", () => {
            mouse.growing = true;
      });

      window.addEventListener("mouseup", () => {
            mouse.growing = false;
      });

      window.addEventListener("mouseleave", () => {
            mouse.growing = false;
      });

      for (let i = 0; i < numParticles; i++) {
            particles.push({
                  x: Math.random() * canvas.width,
                  y: Math.random() * canvas.height,
                  radius: Math.random() * 5 + 1,
                  dx: (Math.random() - 0.5) * maxVelocity,
                  dy: (Math.random() - 0.5) * maxVelocity,
                  mass: Math.random() * 5 + 1
            });
      }

      function drawParticles() {
            particles.forEach((p) => {
                  ctx.beginPath();
                  ctx.arc(p.x, p.y, p.radius, 0, Math.PI * 2);
                  ctx.fillStyle = "#06BBCC";
                  ctx.fill();
            });
      }

      function applyGravity(p1, p2, distance) {
            const G = gravityStrength;
            const force = G * ((p1.mass * p2.mass) / (distance * distance));

            const angle = Math.atan2(p2.y - p1.y, p2.x - p1.x);

            // Verifica a velocidade das partículas
            const speedP1 = Math.sqrt(p1.dx * p1.dx + p1.dy * p1.dy);
            const speedP2 = Math.sqrt(p2.dx * p2.dx + p2.dy * p2.dy);

            const halfMaxVelocity = maxVelocity / 2;

            // Aplica a gravidade somente se a velocidade das partículas estiver abaixo de metade da máxima
            if (speedP1 <= halfMaxVelocity && speedP2 <= halfMaxVelocity) {
                  // Partícula p1 é puxada na direção de p2
                  p1.dx += Math.cos(angle) * force;
                  p1.dy += Math.sin(angle) * force;

                  // Partícula p2 é puxada na direção de p1
                  p2.dx -= Math.cos(angle) * force;
                  p2.dy -= Math.sin(angle) * force;
            } else {
                  // Se a partícula já estiver com velocidade maior que a metade da máxima, muda seu percurso levemente
                  p1.dx += Math.cos(angle) * (force * 0.1); // Muda o percurso levemente
                  p1.dy += Math.sin(angle) * (force * 0.1); // Muda o percurso levemente
            }

            // Diminui a velocidade da partícula em movimento proporcionalmente à força gravitacional
            if (speedP1 > 0) {
                  p1.dx -= Math.cos(angle) * (force * 0.05); // Reduz a velocidade de p1
                  p1.dy -= Math.sin(angle) * (force * 0.05); // Reduz a velocidade de p1
            }

            if (speedP2 > 0) {
                  p2.dx -= Math.cos(angle) * (force * 0.05); // Reduz a velocidade de p2
                  p2.dy -= Math.sin(angle) * (force * 0.05); // Reduz a velocidade de p2
            }
      }

      function limitVelocity(p) {
            const speed = Math.sqrt(p.dx * p.dx + p.dy * p.dy);
            if (speed > maxVelocity) {
                  p.dx = (p.dx / speed) * maxVelocity;
                  p.dy = (p.dy / speed) * maxVelocity;
            }
      }

      function applyEntropy(p) {
            // Aplica um pequeno fator aleatório à direção da partícula
            p.dx += (Math.random() - 0.5) * entropyFactor;
            p.dy += (Math.random() - 0.5) * entropyFactor;
      }

      function drawLinesAndAffectMovement() {
            particles.forEach((p1, index) => {
                  for (let i = index + 1; i < particles.length; i++) {
                        const p2 = particles[i];
                        const dist = Math.hypot(p2.x - p1.x, p2.y - p1.y);

                        if (dist < maxDistance && dist > p1.radius + p2.radius) {
                              // Desenha linha entre partículas próximas
                              ctx.beginPath();
                              ctx.moveTo(p1.x, p1.y);
                              ctx.lineTo(p2.x, p2.y);
                              ctx.strokeStyle = `rgba(255, 255, 255, ${1 - dist / maxDistance})`;
                              ctx.lineWidth = 0.5;
                              ctx.stroke();

                              // Aplica a gravidade entre as partículas
                              applyGravity(p1, p2, dist);
                        }
                  }

                  // Aplica desaceleração dentro do círculo do mouse
                  if (mouse.x && mouse.y) {
                        const distToMouse = Math.hypot(mouse.x - p1.x, mouse.y - p1.y);
                        if (distToMouse < mouse.radius) {
                              const slowdown = 0.95; // Desaceleração mais forte
                              p1.dx *= slowdown;
                              p1.dy *= slowdown;

                              // Aplica atração do mouse
                              const angle = Math.atan2(mouse.y - p1.y, mouse.x - p1.x);
                              const attraction = mouse.gravity * (1 - distToMouse / mouse.radius);
                              p1.dx += Math.cos(angle) * attraction;
                              p1.dy += Math.sin(angle) * attraction;
                        }
                  }

                  // Limita a velocidade da partícula
                  limitVelocity(p1);

                  // Aplica entropia
                  applyEntropy(p1);
            });
      }

      function drawMouseEffect() {
            if (mouse.x && mouse.y && mouse.radius > 0) {
                  ctx.beginPath();
                  ctx.arc(mouse.x, mouse.y, mouse.radius, 0, Math.PI * 2);
                  ctx.strokeStyle = "rgba(0, 242, 255, 1)";
                  ctx.lineWidth = 2;
                  ctx.stroke();
            }

            if (mouse.growing && mouse.radius < mouse.maxRadius) {
                  mouse.radius += 2;
                  if (mouse.gravity < mouse.maxGravity) {
                        mouse.gravity += 0.05;
                  }
            } else if (!mouse.growing && mouse.radius > 0) {
                  mouse.radius -= 2;
                  if (mouse.gravity > 0) {
                        mouse.gravity -= 0.05;
                  }
            }
      }

      function animate() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);

            particles.forEach((p) => {
                  // Atualiza a posição das partículas
                  p.x += p.dx;
                  p.y += p.dy;

                  // Reposiciona se sair da tela
                  if (p.x < 0 || p.x > canvas.width) p.dx *= -1;
                  if (p.y < 0 || p.y > canvas.height) p.dy *= -1;
            });

            drawParticles();
            drawLinesAndAffectMovement();
            drawMouseEffect();

            requestAnimationFrame(animate);
      }

      animate();
})();