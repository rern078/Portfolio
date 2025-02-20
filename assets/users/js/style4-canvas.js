const canvas = document.getElementById("binaryCanvas");
const ctx = canvas.getContext("2d");

// Set canvas size
canvas.width = window.innerWidth;
canvas.height = window.innerHeight;

// Character set (0s and 1s)
const binaryChars = ["0", "1"];

// Array for column positions
const columns = Array(Math.floor(canvas.width / 15)).fill(0);

function draw() {
      // Set background with opacity for fading effect
      ctx.globalCompositeOperation = 'destination-out';
      ctx.fillStyle = "rgba(0, 0, 0, 0.1)";
      ctx.fillRect(0, 0, canvas.width, canvas.height);
      ctx.globalCompositeOperation = 'source-over';

      ctx.fillStyle = "limegreen";
      ctx.font = "15px monospace";

      columns.forEach((y, index) => {
            // Pick a random character
            const text = binaryChars[Math.floor(Math.random() * binaryChars.length)];

            // Calculate x position
            const x = index * 15;
            ctx.fillText(text, x, y);

            // Reset column when it reaches the bottom
            if (y > canvas.height || Math.random() > 0.98) {
                  columns[index] = 0;
            } else {
                  columns[index] = y + 15;
            }
      });
}

setInterval(draw, 50);

// Resize canvas when window resizes
window.addEventListener("resize", () => {
      canvas.width = window.innerWidth;
      canvas.height = window.innerHeight;
      columns.length = Math.floor(canvas.width / 15);
      columns.fill(0);
});