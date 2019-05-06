var cols, rows;
var scl = 20;
var w = 800;
var h = 1000;
var terrain;
var flying = 0;
var test1;
var test2;

function setup() {
  createCanvas(w,h,WEBGL);
  cols = w / scl*1.8;
  rows = h / scl;
  //frameRate(60);
  textSize(30);

  //determine array size
  let arraySize = Math.round(max(rows,cols)) + 1;

  //pre-fill array with dummy data
  terrain = [...Array(arraySize)].map(e => Array(arraySize).fill(1));
}

function draw() {
  //text(frameCount, width / 2, height / 2);
  background(50);
  noFill();
  rotateX(PI/3);
  translate(-w/1.2, -h/3);

  flying -= 0.1;
  let yoff = flying;
  let valley = -150;
  let hill = 200;

  //map array
  for (let y = 0; y < rows; y++){
    let xoff = 0;
    for (let x = 0; x < cols; x++){
      terrain[x][y] = map(noise(xoff, yoff), 0, 1, valley, hill);
      //test1 = terrain[x][y];
      xoff += 0.1;
    }
    yoff += 0.1;
  }

  for (let y = 0; y < rows; y++){
    for (let x = 0; x < cols; x++){
      beginShape();
      stroke(map(terrain[x][y], valley, hill, 0, 255));
      vertex(x*scl, (y+1)*scl, terrain[x][y+1]);
      vertex((x+1)*scl, (y+1)*scl, terrain[x+1][y+1]);
      vertex((x+1)*scl, y*scl, terrain[x+1][y]);
      //vertex(x*scl, (y+1)*scl, terrain[x][y+1]);
      endShape(CLOSE);

    }
  }
}
