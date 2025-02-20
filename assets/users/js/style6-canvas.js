
(function () {
      var canvas = document.getElementById("binaryCross"),
            ctx = canvas.getContext("2d"),
            width = 0,
            height = 0,
            iBubbles = 150,
            aBubblesX = [],
            aBubblesY = [],
            aBubblesSize = [],
            aBubblesSpeed = [],
            aZeroOrOne = [];

      function fnRandom(min, max) {
            return Math.floor(Math.random() * (max - min) + min);
      }

      function fnDraw() {
            width = canvas.width = innerWidth;
            height = canvas.height = innerHeight;
            fnBubbles();
            fnControll();
            requestAnimationFrame(fnDraw);
      }
      fnDraw();

      function fnBubbles() {
            iBubbles === 0 ? iBubbles = 0 : iBubbles++;
            aBubblesSize[iBubbles] = fnRandom(15, 70);
            speed = fnRandom(-0.5, 5);
            aBubblesSpeed[iBubbles] = speed === 0 || speed == 0.5 || speed == -0.5 ? speed += 1 : speed;
            aZeroOrOne[iBubbles] = fnRandom(0, 2);
            number = fnRandom(1, 10);
            if (aBubblesSpeed[iBubbles] < 0) {
                  if (number == 1) {
                        aBubblesX[iBubbles] = width + aBubblesSize[iBubbles];
                        aBubblesY[iBubbles] = fnRandom(0, height);
                  }
                  else {
                        aBubblesX[iBubbles] = fnRandom(0, width);
                        aBubblesY[iBubbles] = height + aBubblesSize[iBubbles];
                  }
            }
            else {
                  if (number == 1) {
                        aBubblesX[iBubbles] = 0 - aBubblesSize[iBubbles];
                        aBubblesY[iBubbles] = fnRandom(0, height);
                  }
                  else {
                        aBubblesX[iBubbles] = fnRandom(0, width);
                        aBubblesY[iBubbles] = 0 - aBubblesSize[iBubbles];
                  }
            }
            ctx.beginPath();
            // ctx.fillStyle = "rgba(255, 255, 255, 0.25)";
            ctx.fillStyle = "limegreen";
            for (i = 0; i < iBubbles; i++) {
                  //ctx.arc(aBubblesX[i], aBubblesY[i], aBubblesSize[i], 0, Math.PI * 2);
                  //ctx.rect(aBubblesX[i], aBubblesY[i], aBubblesSize[i], aBubblesSize[i]);
                  ctx.font = aBubblesSize[i] / 2 + "px futura";
                  ctx.textBaseline = 'bottom';
                  ctx.textAlign = "left";
                  ctx.fillText(aZeroOrOne[i], aBubblesX[i] + aBubblesSize[i] / 4, aBubblesY[i] + aBubblesSize[i]);
            }
            ctx.fillStyle = "rgba(0, 0, 0, 0.07)";
            ctx.fill();
            ctx.lineWidth = 1;
            ctx.strokeStyle = "rgba(0, 0, 0, 0.0)";
            ctx.stroke();
      }

      function fnControll() {
            for (i = 0; i < iBubbles; i++) {
                  aBubblesX[i] += aBubblesSpeed[i];
                  aBubblesY[i] += aBubblesSpeed[i];
                  if (aBubblesX[i] > width - aBubblesSize[i] - 1 &&
                        aBubblesY[i] > height - aBubblesSize[i] - 1) {
                        aBubblesX[i] += 50;
                  }
            }
      }
})();