//TODOs
//implement buttons for different modes like flying, editing, flat?, etc.


var cols, rows;
var scl = 20;
var w = 600;
var h = 600;
var bgColor = 50;

var terrain;
var flying = 0;
let valley = -175;
let hill = 175;
let mouseXOffset = 200;
let mouseYOffset = -150;

let raisedZ = 0;
var isLooping = true;
var toFlatten = false;
var flattened = false;
var loopBtn;
var flattenBtn;

var test;

function setup() {
  var cnv = createCanvas(w,h,WEBGL);
  cols = w / scl*1.5;
  rows = h / scl;

  loopBtn = createButton('pause');
  loopBtn.position(19, 19);
  loopBtn.mousePressed(loopToggle);

  flattenBtn = createButton('flatten');
  flattenBtn.position(19, 49);
  flattenBtn.mousePressed(flatten);


  //frameRate(60);
  //textSize(30);

  //determine array size
  let arraySize = Math.round(max(rows,cols)) + 1;

  //create and pre-fill array
  terrain = [...Array(arraySize)].map(e => Array(arraySize).fill(1));

  //attach listener for clicking
  cnv.mouseClicked(raise);
}

function draw() {
  //text(frameCount, width / 2, height / 2);
  background(bgColor);
  noFill();
  rotateX(PI/3);
  translate(-w/1.2, -h/3);



  //if (!toFlatten){
    drawTerrain();
  //}

  ellipse(mouseX+mouseXOffset, mouseY + mouseYOffset, 20, 20);
}

function drawTerrain(){
  flying -= 0.1;
  let yoff = flying;

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
    ////testing if less colors optimizes loop
    //  test = map(terrain[x][y], valley, hill, 0, 255);
    //  if (test < 64){
    //    stroke(0);
    //  } else if (test < 128){
    //    stroke(64);
    //  } else if (test < 192){
    //    stroke(128);
    //  } else {
    //    stroke(192);
    //  }
      if (!toFlatten){
        stroke(map(terrain[x][y], valley, hill, 0, 255));
        ertex(x*scl, (y+1)*scl, terrain[x][y+1]);
        vertex((x+1)*scl, (y+1)*scl, terrain[x+1][y+1]);
        vertex((x+1)*scl, y*scl, terrain[x+1][y]);
      } else if (!flattened){
        //stroke(map(terrain[x][y], valley, hill, 0, 255));
        stroke(map(0, valley, hill, 0, 255));
        vertex(x*scl, (y+1)*scl);
        vertex((x+1)*scl, (y+1)*scl);
        vertex((x+1)*scl, y*scl);
        //flattened = true;
      }

      //using (CLOSE) instead of drawing last connecting vertex
      //not sure if more/less efficient
      //vertex(x*scl, (y+1)*scl, terrain[x][y+1]);
      endShape(CLOSE);
    }
  }
}

function loopToggle() {
  if (isLooping){
    noLoop(); isLooping = false;
  } else{
    loop(); isLooping = true;
  }
}

function flatten(){
  toFlatten = true;
}

function raise(){
  console.log("hit");
}
