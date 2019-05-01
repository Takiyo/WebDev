var cols, rows;
var scl = 20;
var w = 600;
var h = 600;


function setup() {
  createCanvas(w,h,WEBGL);
  cols = w / scl;
  rows = h / scl;
  frameRate(30);
}

function draw() {
  background(20);
  stroke(255);
  noFill();

  translate(w/2,h/2);
  rotateX(PI/3);
  translate(-w/2, -h/2);

  for (var y = -30; y < rows; y++){
    beginShape(TRIANGLE_STRIP);
    for (var x = -30; x < cols; x++){
      //vertex(x*scl, y*scl);
      //vertex((x+1)*scl, y*scl);
      //vertex(x*scl, (y+1)*scl);
      //vertex((x+1)*scl, (y+1)*scl);

      vertex(x*scl, (y+1)*scl, random(-10, 10));
      vertex((x+1)*scl, (y+1)*scl, random(-10, 10));
      vertex((x+1)*scl, y*scl, random(-10, 10));
      vertex(x*scl, (y+1)*scl, random(-10, 10));
    }
    endShape();
  }
}
