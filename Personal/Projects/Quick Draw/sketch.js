var cols, rows;
var scl = 20;
var w = 600;
var h = 600;

function setup() {
  createCanvas(w,h,WEBGL);
  cols = w / scl;
  rows = h / scl;

  var terrain = [[]];

  var yoff = 0;
  for (var y = -30; y < rows-1; y++){
    var xoff = 0;
    for (var x = -30; x < cols; x++){
      //terrain[x][y] = map(noise(xoff, yoff), 0, 1, -100, 100);
      xoff += 0.01;
    }
    yoff += 0.01;
  }


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

function Create2DArray(rows) {
  var arr = [];

  for (var i=0;i<rows;i++) {
     arr[i] = [];
  }

  return arr;
}
