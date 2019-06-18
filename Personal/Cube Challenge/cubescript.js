let angle = 0;
let r = 0;
let g = 0;
let b = 0;

let w = 20;
let ma;
let maxD;

let xlightcounter = 0;
let ylightcounter = 0;
let incrementer = 0;

function setup(){
  createCanvas(400, 400, WEBGL);
  ma = atan(sqrt(1/sqrt(2)));
  maxD = dist(0,0,200,200);
}

function draw(){
  background(20);
  ortho(-300, 300, 300, -300, -500, 700);

  /* directionalLight(100, 0, 255, 2, -1, 0);
  directionalLight(255, 255, 0, incrementer, -1, 0); */

  incrementer += 0.1;
  if (incrementer >= 5){
    incrementer = 0;
  }

  rotateX(QUARTER_PI);
  rotateY(ma);

for (let z = 0; z < height; z += w){
  for (let x = 0; x < width; x += w){
    push();

    let d = dist(x,z,width/2,height/2);
    let offset = map(d,0,maxD, -2, 2);
    let a = angle + offset;
    let h = map(sin(a), -1, 1, 0, 200);
    translate(x - width / 2, 0, z - height / 2);
    normalMaterial(255, 255, 255);
    box(w-2, h, w); // width, height, depth
    //rect((x - width / 2) + (w / 2), 0, w - 2.5, h); // (x, y, width, height);
    pop();
  }
}
  angle += 0.1;
}
