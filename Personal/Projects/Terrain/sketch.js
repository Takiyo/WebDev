//TODOs
//implement buttons for different modes like flying, editing, flat?, etc.
//check if less possible RGB values makes it more efficient


var cols, rows;
var scl = 20;
var w = 600;
var h = 600;
var terrain;
var flying = 0;
var isLooping = true;
var testButton;
var test;

function setup() {
  createCanvas(w,h,WEBGL);
  cols = w / scl*1.5;
  rows = h / scl;
  button = createButton('toggle loop');
  button.position(19, 19);
  button.mousePressed(loopToggle);

  //frameRate(60);
  //textSize(30);

  //determine array size
  let arraySize = Math.round(max(rows,cols)) + 1;

  //create and pre-fill array
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
      xoff += 0.1;
    }
    yoff += 0.1;
  }

  for (let y = 0; y < rows; y++){
    for (let x = 0; x < cols; x++){
      beginShape();

    //  testval2 = map(terrain[x][y], valley, hill, 0, 255);
      //if (testval2 < 64){
    //    stroke(0);
    //  } else if (testval2 < 128){
    //    stroke(64);
    //  } else if (testval2 < 192){
    //    stroke(128);
    //  } else {
    //    stroke(192);
    //  }

      stroke(map(terrain[x][y], valley, hill, 0, 255));
      vertex(x*scl, (y+1)*scl, terrain[x][y+1]);
      vertex((x+1)*scl, (y+1)*scl, terrain[x+1][y+1]);
      vertex((x+1)*scl, y*scl, terrain[x+1][y]);

      //using (CLOSE) instead of drawing last connecting vertex
      //not sure if more/less efficient
      //vertex(x*scl, (y+1)*scl, terrain[x][y+1]);
      endShape(CLOSE);

    }
  }
}

function loopToggle() {
  if (isLooping){
    noLoop();
    isLooping = false;
  } else{
    loop();
    isLooping = true;
  }
}
