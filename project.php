<script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/0.5.16/p5.min.js" type="text/javascript"></script>
        
<script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/0.5.16/addons/p5.sound.js" type="text/javascript"></script>     

<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.3/TweenLite.min.js" type="text/javascript"></script>     

<style>
	
	#thecanvas {
		height: 100vh;
	}
	
</style>

<div id="thecanvas"></div>

<script>
	
var simplesin;
var b;
var d;
var a;

var black;
var white;

var yellow;

var red;

var fade;

var fadenegative;

var crackleduration;

var offset;

var tweakspeed;

var drawcrackles;

var drawrattern;

var drawrattern2;

var drawrattern3;

var drawrattern4;

var showwebsite;

var showtext;

var drawknistern;

var showsecondtext;

var theFrameCount;

var numberofelements;

var deleteallelements;

var wavespeed1 = {wert:2};

var wavespeed2 = {wert:2.8};

var wavespeed3 = {wert:3};

var zoommin;

var zoommax;

var zoomspeed;

var shallizoom;

var zoom = {wert:0.4};

var motion;

var points = [];

var fadevalue = {wert:1};

var wa;

var wb;

var wc;

var x;

var y;

var wormx;

var wormy;

var cirlce;

var drawcircle;

var qqq;

var countup;

var wormposition;

var easing;

var aa;
var am;
var an;  
var ab;


var parallax1x;
var parallax1y;


// Crackles-Array

var cuepoints = [18.05, 18.50, 26.70, 28.00, 31.09, 33.40, 38.06, 42.30, 
53.05, 59.05, 70.57, 83.00, 89.05, 100.50, 110.00, 128.80, 
134.00, 134.40, 137.00, 137.35, 144.80, 146.00, 147.17];



var wavespeedarray = [];



function preload() {
  mySound = loadSound('the-wave.mp3');
}



/* ///////// SETUP ///////// */

function setup() {
  canvas = createCanvas($("#thecanvas").width(), $("#thecanvas").height());
  canvas.parent('thecanvas');
  colorMode(HSB,100);

  noSmooth();

  b = 0;
  d = 1;
  qqq =1;
  countup = 1;
  a = 0;
  yellow = color(15, 90,90);
  red = "#E24D47";

  motion =1;

  rectMode(CENTER);

  crackleduration = 0.05;

  drawcircle = false;

  drawcrackles = false;

  showsecondtext = false;

  showwebsite = false;

  showtext = false;

  drawrattern = 0;

  drawknistern = false;  

  theFrameCount = 1;

  easing  = 0.05;

  tweakspeed = 4;

  wormx = 0;

  wormy =0;

  parallax1x = width/2-(mouseX/4);
  parallax1y = height/2-(mouseY/4);    

  zoomspeed = 1;

  zoommin = 0.5;

  zoommax = 1.5;

  shallizoom = false;

  numberofelements = 10;

  deleteallelements = false;

  mySound.setVolume(0.1);

  circle = 100;

  wa = 1;

  wb = 2;

  wc = 1;

  x = 1;

  y = 2;

mySound.play();
// mySound.jump(127);



var arraymax = 50;
var min = 0.6;
var max = 2;

// Wavespeedarray
for (var i = 0; i < arraymax; i++) {
  wavespeedarray.push(random(min,max));
}



wavespeed1.wert = wavespeedarray[1];

wavespeed2.wert = wavespeedarray[2];

wavespeed3.wert = wavespeedarray[3];




// Crackles – Cuepoints setzen 

for (var i = 0; i < cuepoints.length; i++) {

  mySound.addCue(cuepoints[i], function() {
    drawcrackles = true;
  });
  mySound.addCue(cuepoints[i]+crackleduration, function() {
    drawcrackles = false;
  });
}

/* 

D R A M A T U R G I E

*/

mySound.addCue(2, function() {
  showtext = true;
  countup=1;
});

mySound.addCue(6, function() {
  showtext = false;
});


mySound.addCue(7, function() {
  showsecondtext = true;
});

mySound.addCue(11, function() {
  showsecondtext = false;
});


mySound.addCue(16, function() {
  numberofelements = 330;

});

// 1 rattern1: on

mySound.addCue(32, function() {
  countup = 1;
  qqq= 1;
  d=1;
  drawrattern = 2;
  shallizoom = !shallizoom;
  var tween = TweenLite.to(wavespeed1, tweakspeed, {wert:wavespeedarray[Math.floor(random(arraymax))]});
  var tween = TweenLite.to(wavespeed2, tweakspeed, {wert:wavespeedarray[Math.floor(random(arraymax))]});
  var tween = TweenLite.to(wavespeed3, tweakspeed, {wert:wavespeedarray[Math.floor(random(arraymax))]});      
});

// 1 rattern: off / subbass: on

mySound.addCue(48, function() {
  shallizoom = !shallizoom;
  countup = 1;
  qqq= 1;
  d=1;
  drawcircle = true;
  drawrattern = 0;
  var tween = TweenLite.to(wavespeed1, tweakspeed, {wert:wavespeedarray[Math.floor(random(arraymax))]});
  var tween = TweenLite.to(wavespeed2, tweakspeed, {wert:wavespeedarray[Math.floor(random(arraymax))]});
  var tween = TweenLite.to(wavespeed3, tweakspeed, {wert:wavespeedarray[Math.floor(random(arraymax))]});      
  circle = true;
});



// 2 rattern2: on  
mySound.addCue(64, function() {
  shallizoom = !shallizoom;
  countup = 1;
  qqq= 1;
  d=1;
  drawcircle = false;
  drawrattern = 3;
  var tween = TweenLite.to(wavespeed1, tweakspeed, {wert:wavespeedarray[Math.floor(random(arraymax))]}); 
  var tween = TweenLite.to(wavespeed2, tweakspeed, {wert:wavespeedarray[Math.floor(random(arraymax))]});
  var tween = TweenLite.to(wavespeed3, tweakspeed, {wert:wavespeedarray[Math.floor(random(arraymax))]});         
});

// 2 schnelles Knistern
mySound.addCue(78, function() {
  drawknistern = true;

});

// 2 rattern: off / subbass: on   

mySound.addCue(80, function() {
  shallizoom = !shallizoom;
  countup = 1;
  qqq= 1;
  d=1;
  drawcircle = true;
  drawknistern = false;
  drawrattern = 0;
  var tween = TweenLite.to(wavespeed1, tweakspeed, {wert:wavespeedarray[Math.floor(random(arraymax))]});
  var tween = TweenLite.to(wavespeed2, tweakspeed, {wert:wavespeedarray[Math.floor(random(arraymax))]});
  var tween = TweenLite.to(wavespeed3, tweakspeed, {wert:wavespeedarray[Math.floor(random(arraymax))]});
});

// 3 rattern1: on   

mySound.addCue(96, function() {
  shallizoom = !shallizoom;
  countup = 1;
  qqq= 1;
  d=1;
  drawcircle = false;
  drawrattern = 2;
  var tween = TweenLite.to(wavespeed1, tweakspeed, {wert:wavespeedarray[Math.floor(random(arraymax))]}); 
  var tween = TweenLite.to(wavespeed2, tweakspeed, {wert:wavespeedarray[Math.floor(random(arraymax))]});
  var tween = TweenLite.to(wavespeed3, tweakspeed, {wert:wavespeedarray[Math.floor(random(arraymax))]});      
});

// 3 rattern: off / subbass: on   

mySound.addCue(112, function() {
  shallizoom = !shallizoom;
  countup = 1;
  qqq= 1;
  d=1;
  drawcircle = true;
  drawrattern = 0;
  var tween = TweenLite.to(wavespeed1, tweakspeed, {wert:wavespeedarray[Math.floor(random(arraymax))]});
  var tween = TweenLite.to(wavespeed2, tweakspeed, {wert:wavespeedarray[Math.floor(random(arraymax))]});   
  var tween = TweenLite.to(wavespeed3, tweakspeed, {wert:wavespeedarray[Math.floor(random(arraymax))]});      
});

// 4 rattern4: on   

mySound.addCue(128, function() {
  shallizoom = !shallizoom;
  countup = 1;
  qqq= 1;
  d=1;
  drawcircle = false;
  drawrattern = 4;
  var tween = TweenLite.to(wavespeed1, tweakspeed, {wert:wavespeedarray[Math.floor(random(arraymax))]});
  var tween = TweenLite.to(wavespeed2, tweakspeed, {wert:wavespeedarray[Math.floor(random(arraymax))]});
  var tween = TweenLite.to(wavespeed3, tweakspeed, {wert:wavespeedarray[Math.floor(random(arraymax))]});                   
});


// 4 rattern: off / subbass: on 

mySound.addCue(144, function() {
  circle = false;
  shallizoom = !shallizoom;
  countup = 1;
  qqq= 1;
  d=1;
  drawrattern = 0;  
  var tween = TweenLite.to(wavespeed1, tweakspeed, {wert:wavespeedarray[Math.floor(random(arraymax))]});  
  var tween = TweenLite.to(wavespeed2, tweakspeed, {wert:wavespeedarray[Math.floor(random(arraymax))]}); 
  var tween = TweenLite.to(wavespeed3, tweakspeed, {wert:wavespeedarray[Math.floor(random(arraymax))]});
});

// Elemente auf 0 setzen

mySound.addCue(147, function() {
  shallizoom = !shallizoom;
  deleteallelements = true;
  showwebsite = true;
  var tween = TweenLite.to(zoom, zoomspeed, {wert:zoommin});   
});






} 

/* ///////// Knistern ///////// */

function knistern(){
  if (Math.floor(theFrameCount) % 3 == 0){
    fill(fade);
    ellipse(width-wormx,height/2,height/2+height/6,height/2+height/6);
  }

  for (var i = 0; i <1000; i++) {
    rect(random(width),random(height),random(0,5),random(0,5));
  }
}


/* ///////// Rattern ///////// */



function rattern() {


  rectMode(CENTER);


  

  for (var i = 0; i < countup/100; i = i +2) { 
    fill(fadenegative);
    noStroke();
    push();
    translate(i*10, 0);
    rect(0, 0, i/6, height*2);
    pop();
 /*
        stroke(fade);
  noFill();
  strokeWeight(10);
      ellipse(0,0,i*100,i*10);
      */
      countup++;

    }




    if (countup % 50 == 0) {
      d = d*-1;
    }
    qqq = qqq + d;
    countup++;
  }

  function rattern2() {

    push();
    fill(fadenegative);
    noStroke();
    translate(width-wormx, height/2);
    for (var bmx = 0; bmx < qqq; bmx++) {
      for (var bmy = 0; bmy < qqq; bmy++) {
        rotate(radians(qqq/6));
        ellipse(0, qqq*bmx, 10, 10);
      }
    }
    pop();

    if (countup % 85 == 0) {
      d = d*-1;
    }
    qqq = qqq + d;
    countup++;

 // console.log(qqq);
}


function rattern3() {
  push();
  translate(width-wormx,height/2);
  rotate(radians(motion));
  for (var i = 0; i < countup; i=i+2) {
    noFill();
      // Here's where the magic happens
      rotate(radians(360/countup));
      stroke(fadenegative);
      line(countup+a, countup, 3*i, 2*i);
      line(-countup+a, -countup, 2*a, -2*i);
      rotate(radians(180));
      line(countup+a*2, -a, 0, 0);
    }
    pop();

    if (countup % 120 == 0) {
      d = d*-1;
    }
    qqq = qqq + d;
    countup++;
  }


  function rattern4() {


    fill(fadenegative);

    am = cos(aa);

    an = sin(aa);
    push();
    scale(map(countup,0,900,1,1.5));

    for (var ax = 0; ax < countup; ax=ax+1.5) {


      rect(ax*15,height/2,ax/10,height);  

      rect(width-ax*15+motion,height/2,ax/30,height/2);  





    }

    pop();

    aa = aa + 0.06;

    ab = ab + 0.02;

    countup++;


// rect(width/2,height/2, width/2,height/2);
}


function crackles(){
  fill(fadenegative);
  noStroke();
  rect(random(width),random(height),random(20,600),random(50,600));
}


function mouseReleased() {
  if (shallizoom == false){
    shallizoom = true
  } else {
    shallizoom = false;
  }
}

function showthattext(){
  push();
  translate(width/2,height/2+height/20);
  textAlign(CENTER);
  fill(fadenegative);
  textSize(height/6);
//   text("The Wave", 0, 0);
  pop();

}

function showthatsecondtext(){
  push();
  translate(width/2,height/2-35);
  textAlign(CENTER);
  fill(fadenegative);
  textSize(32);
//   text("an interactive music visualization by Tim Rodenbröker", 0,35);
  pop();
}

function showthatwebsite(){
  push();
  translate(width/2,height/2-35);
  textAlign(CENTER);
  fill(fadenegative);
  textSize(32);
//   text("www.timrodenbroeker.de", 0,35);
  pop();
}


function windowResized() {
    resizeCanvas(windowWidth, windowHeight);
}





/* ///////// DRAW ///////// */

function draw() {

parallax1x = width/2-(mouseX/4);
parallax1y = height/2;
parallax2x = width/2+(mouseX/4);
parallax2y = height/2;  



/* Black and Yellow
fade = color(15, map(fadevalue.wert,0,100,0,100), map(fadevalue.wert,0,100,10,90));
fadenegative = color(15, map(fadevalue.wert,0,100,100,0), map(fadevalue.wert,0,100,90,10));
*/

fade = color(0, 0, map(fadevalue.wert,0,100,5,95));

fadenegative = color(0, 0, map(fadevalue.wert,0,100,95,5));


if (shallizoom == true) {
  var tween = TweenLite.to(zoom, zoomspeed, {wert:zoommax}); 

  var tween = TweenLite.to(fadevalue, zoomspeed, {wert:95});         
} else  {
  var tween = TweenLite.to(zoom, zoomspeed, {wert:zoommin}); 

  var tween = TweenLite.to(fadevalue, zoomspeed, {wert:5});
}

  black = color(0,0,25);
  white = color(0,0,95);



background(fade);


if (drawrattern == 1) {
  rattern();
}

if (drawrattern == 2) {
  rattern2();
}

if (drawrattern == 3) {
  rattern3();
}

if (drawrattern == 4) {
  rattern4();
}


if (drawknistern == true) {
  knistern();
}  



// Wellenbewegungen

wa = wa + wavespeed1.wert;
wb = wb + wavespeed2.wert;
wc = wc + wavespeed3.wert;  

x = sin(radians(wa)) * cos(radians(wb)) * width/3;
y = cos(radians(wc * map(mouseY,0,height,1,1.01)))* height/3;
simplesin = map(cos(radians(a*0.7)),-1,1,0.9,1.1);



// DRWA CIRCLE 
if (drawcircle == true){
  fill(fadenegative);
  circle++;
  ellipse(width-wormx,height/2,circle,circle);
} else {
  circle=100;
}


stroke("#262626");
strokeWeight(2);
fill(white);


var targetX = parallax1x;
var dx = targetX - wormx;
wormx += dx * easing;

/* Funktioniert nicht !!
var targetY = parallax1y;
var dy = targetY - wormy;
wormy += dy * easing;
*/


  // Draw that thing!
  push();
  translate(wormx, height/2);
  scale(zoom.wert*simplesin);

  rotate(radians(motion/2));
  points.push(createVector(x, y));

  beginShape(QUAD_STRIP);
  for (var i = 0; i < points.length; i++) {
    var curVertex = points[i];
    vertex(curVertex.x, curVertex.y);
    vertex(curVertex.x + 50, curVertex.y);
  }
  endShape();
  pop();


// Elemente löschen

if (deleteallelements == false) {
  if (points.length > numberofelements) {
    points.splice(0, 1);
  }
}
else if (deleteallelements == true) {
  for (var i = 0; i < 8; i++) {
    points.splice(0, 1);
  }
}

motion = motion + 0.5;

if (drawcrackles == true) {
  crackles();
}

noStroke();
fill(fadenegative);


  rect(random(width),random(height),random(0,3),random(0,3));


theFrameCount++;


if (showtext == true) {
  showthattext();
} 

if (showsecondtext == true) {
  showthatsecondtext();
} 

if (showwebsite == true) {
  showthatwebsite();
} 



// Zeitstrahl

fill(fadenegative);
rectMode(CORNER);
  rect(0,0,map(mySound.currentTime(),0,mySound.duration(),0,width),10);
rectMode(CENTER);

} // End DRAW

</script>

<script>
	// This is important fpr the navbar behaviour
	var isInteractive = true;
</script>