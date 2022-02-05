/*===== show2 NAVBAR  =====*/ 
const show2Navbar = (toggleId, navId, bodyId, headerId) =>{
    const toggle = document.getElementById(toggleId),
    nav = document.getElementById(navId),
    bodypd = document.getElementById(bodyId),
    headerpd = document.getElementById(headerId)

    // Validate that all variables exist
    if(toggle && nav && bodypd && headerpd){
        toggle.addEventListener('click', ()=>{
            // show2 navbar
            nav.classList.toggle('show2')
            // change icon
            toggle.classList.toggle('bx-x')
            // add padding to body
            bodypd.classList.toggle('body-pd')
            // add padding to header
            headerpd.classList.toggle('body-pd')
        })
    }
}

show2Navbar('header-toggle','nav-bar','body-pd','header')

/*===== LINK ACTIVE  =====*/ 
const linkColor = document.querySelectorAll('.nav__link')

function colorLink(){
    if(linkColor){
        linkColor.forEach(l=> l.classList.remove('active'))
        this.classList.add('active')
    }
}
linkColor.forEach(l=> l.addEventListener('click', colorLink))


function openMenu(){
    var botonMenu = document.getElementById("nav-bar");
    var openMenu = document.getElementById("openMenu");
    var body = document.getElementById("body-pd");
    if (botonMenu.classList.contains("show2")) {
        botonMenu.classList.remove("show2");
        body.classList.remove("nav-open");
        openMenu.style.transform = "rotate(0deg)";
        openMenu.style.left = "56px";
    } else{
        botonMenu.classList.add("show2");
        body.classList.add("nav-open");
        openMenu.style.transform = "rotate(-180deg)";
        openMenu.style.left = "196px";
    }
}

// Inicio de cuadro estadistico

// chart 1

const labels = ['8AM', '', '10AM', '', '12PM', '', '2PM', '', '4PM', '', '6PM', '', '8PM', '', '10PM'];
const datapoints = [370, 292, 448, 1, 260, 9, 28, 97, 182, 478, 272, 357, 137, 185, 360];
const data = {
  labels: labels,
  datasets: [
    {
      label: 'Número de acercamientos',
      data: datapoints,
      borderColor: 'rgba(0, 169, 224, 1)',
      fill: false,
      cubicInterpolationMode: 'monotone',
      tension: 0.4
    }
  ],
};

const config = {
  type: 'line',
  data: data,
  options: {
    plugins: {
      legend: {
        display: false,
      }
    },
    responsive: true,
    interaction: {
      intersect: false,
    },
    scales: {
      x: {
        display: true,
        title: {
          display: true
        }
      },
      y: {
        display: true,
        min: 0,
        max: 500,
        ticks: {
          stepSize: 100
        }
      }
    }
  },
};

const myChart = new Chart(
    document.getElementById('myChart'),
    config
  );

  // Chat 2

  const labels_2 = ['8AM', '', '10AM', '', '12PM', '', '2PM', '', '4PM', '', '6PM', '', '8PM', '', '10PM'];
  const datapoints_2 = [370, 292, 448, 1, 260, 9, 28, 97, 182, 478, 272, 357, 137, 185, 360];
  const data_2 = {
    labels: labels_2,
    datasets: [
      {
        label: 'Número de acercamientos',
        data: datapoints_2,
        borderColor: 'rgba(0, 169, 224, 1)',
        fill: false,
        cubicInterpolationMode: 'monotone',
        tension: 0.4
      }
    ],
  };
  
  const config_2 = {
    type: 'line',
    data: data_2,
    options: {
      plugins: {
        legend: {
          display: false,
        }
      },
      responsive: true,
      interaction: {
        intersect: false,
      },
      scales: {
        x: {
          display: true,
          title: {
            display: true
          }
        },
        y: {
          display: true,
          min: 0,
          max: 500,
          ticks: {
            stepSize: 100
          }
        }
      }
    },
  };
  
  const myChart_2 = new Chart(
      document.getElementById('myChart_2'),
      config
    );

//Chart 3

const labels_3 = ['8AM', '', '10AM', '', '12PM', '', '2PM', '', '4PM', '', '6PM', '', '8PM', '', '10PM'];
  const datapoints_3 = [370, 292, 448, 1, 260, 9, 28, 97, 182, 478, 272, 357, 137, 185, 360];
  const data_3 = {
    labels: labels_3,
    datasets: [
      {
        label: 'Número de acercamientos',
        data: datapoints_3,
        borderColor: 'rgba(0, 169, 224, 1)',
        fill: false,
        cubicInterpolationMode: 'monotone',
        tension: 0.4
      }
    ],
  };
  
  const config_3 = {
    type: 'line',
    data: data_3,
    options: {
      plugins: {
        legend: {
          display: false,
        }
      },
      responsive: true,
      interaction: {
        intersect: false,
      },
      scales: {
        x: {
          display: true,
          title: {
            display: true
          }
        },
        y: {
          display: true,
          min: 0,
          max: 500,
          ticks: {
            stepSize: 100
          }
        }
      }
    },
  };
  
  const myChart_3 = new Chart(
      document.getElementById('myChart_3'),
      config
    );

// Fin de cuadro estadistico

var datosG = document.getElementById("datosGenerales");
var notificaciones = document.getElementById("notificaciones")

function datos() {
  notificaciones.style.display = "none";
  datosG.style.display = "block"
}

function notif() {
  notificaciones.style.display = "block";
  datosG.style.display = "none"
}

//Efecto Zoom

var zoom_in_1 = document.getElementById("zoom_in_1");
var zoom_out_1 = document.getElementById("zoom_out_1");
var img_zoom_1 = document.getElementById("img_1_zoom_1"); 
var zoom_1 = 1;

zoom_in_1.onclick = function(){
  zoom_1 += 0.1;
  img_zoom_1.style.transform = "scale(" + zoom_1 +")";
}

zoom_out_1.onclick = function(){
  if (zoom_1 > 0.6) {
    zoom_1 = zoom_1 - 0.1;
    img_zoom_1.style.transform = "scale(" + zoom_1 +")";
  }
}



var zoom_in_2 = document.getElementById("zoom_in_2");
var zoom_out_2 = document.getElementById("zoom_out_2");
var img_zoom_2 = document.getElementById("img_2_zoom_2"); 
var zoom_2 = 1;

zoom_in_2.onclick = function(){
  zoom_2 += 0.1;
  img_zoom_2.style.transform = "scale(" + zoom_2 +")";
}

zoom_out_2.onclick = function(){
  if (zoom_2 > 0.6) {
    zoom_2 = zoom_2 - 0.1;
    img_zoom_2.style.transform = "scale(" + zoom_2 +")";
  }
}



var zoom_in_3 = document.getElementById("zoom_in_3");
var zoom_out_3 = document.getElementById("zoom_out_3");
var img_zoom_3 = document.getElementById("img_3_zoom_3"); 
var zoom_3 = 1;

zoom_in_3.onclick = function(){
  zoom_3 += 0.1;
  img_zoom_3.style.transform = "scale(" + zoom_3 +")";
}

zoom_out_3.onclick = function(){
  if (zoom_3 > 0.6) {
    zoom_3 = zoom_3 - 0.1;
    img_zoom_3.style.transform = "scale(" + zoom_3 +")";
  }
}
//Fin efecto Zoom

// Efecto mover mapa

dragElement(document.getElementById("img_1_zoom"));

function dragElement(elmnt) {
  var pos1 = 0, pos2 = 0, pos3 = 0, pos4 = 0;
  if (document.getElementById(elmnt.id + "_1")) {
    /* if present, the header is where you move the DIV from:*/
    document.getElementById(elmnt.id + "_1").onmousedown = dragMouseDown;
  } else {
    /* otherwise, move the DIV from anywhere inside the DIV:*/
    elmnt.onmousedown = dragMouseDown;
  }

  function dragMouseDown(e) {
    e = e || window.event;
    e.preventDefault();
    // get the mouse cursor position at startup:
    pos3 = e.clientX;
    pos4 = e.clientY;
    document.onmouseup = closeDragElement;
    // call a function whenever the cursor moves:
    document.onmousemove = elementDrag;
  }

  function elementDrag(e) {
    e = e || window.event;
    e.preventDefault();
    // calculate the new cursor position:
    pos1 = pos3 - e.clientX;
    pos2 = pos4 - e.clientY;
    pos3 = e.clientX;
    pos4 = e.clientY;
    // set the element's new position:
    elmnt.style.top = (elmnt.offsetTop - pos2) + "px";
    elmnt.style.left = (elmnt.offsetLeft - pos1) + "px";
  }

  function closeDragElement() {
    /* stop moving when mouse button is released:*/
    document.onmouseup = null;
    document.onmousemove = null;
  }
}



dragElement_2(document.getElementById("img_2_zoom"));

function dragElement_2(elmnt) {
  var pos1 = 0, pos2 = 0, pos3 = 0, pos4 = 0;
  if (document.getElementById(elmnt.id + "_2")) {
    /* if present, the header is where you move the DIV from:*/
    document.getElementById(elmnt.id + "_2").onmousedown = dragMouseDown;
  } else {
    /* otherwise, move the DIV from anywhere inside the DIV:*/
    elmnt.onmousedown = dragMouseDown;
  }

  function dragMouseDown(e) {
    e = e || window.event;
    e.preventDefault();
    // get the mouse cursor position at startup:
    pos3 = e.clientX;
    pos4 = e.clientY;
    document.onmouseup = closeDragElement;
    // call a function whenever the cursor moves:
    document.onmousemove = elementDrag;
  }

  function elementDrag(e) {
    e = e || window.event;
    e.preventDefault();
    // calculate the new cursor position:
    pos1 = pos3 - e.clientX;
    pos2 = pos4 - e.clientY;
    pos3 = e.clientX;
    pos4 = e.clientY;
    // set the element's new position:
    elmnt.style.top = (elmnt.offsetTop - pos2) + "px";
    elmnt.style.left = (elmnt.offsetLeft - pos1) + "px";
  }

  function closeDragElement() {
    /* stop moving when mouse button is released:*/
    document.onmouseup = null;
    document.onmousemove = null;
  }
}



dragElement_3(document.getElementById("img_3_zoom"));

function dragElement_3(elmnt) {
  var pos1 = 0, pos2 = 0, pos3 = 0, pos4 = 0;
  if (document.getElementById(elmnt.id + "_3")) {
    /* if present, the header is where you move the DIV from:*/
    document.getElementById(elmnt.id + "_3").onmousedown = dragMouseDown;
  } else {
    /* otherwise, move the DIV from anywhere inside the DIV:*/
    elmnt.onmousedown = dragMouseDown;
  }

  function dragMouseDown(e) {
    e = e || window.event;
    e.preventDefault();
    // get the mouse cursor position at startup:
    pos3 = e.clientX;
    pos4 = e.clientY;
    document.onmouseup = closeDragElement;
    // call a function whenever the cursor moves:
    document.onmousemove = elementDrag;
  }

  function elementDrag(e) {
    e = e || window.event;
    e.preventDefault();
    // calculate the new cursor position:
    pos1 = pos3 - e.clientX;
    pos2 = pos4 - e.clientY;
    pos3 = e.clientX;
    pos4 = e.clientY;
    // set the element's new position:
    elmnt.style.top = (elmnt.offsetTop - pos2) + "px";
    elmnt.style.left = (elmnt.offsetLeft - pos1) + "px";
  }

  function closeDragElement() {
    /* stop moving when mouse button is released:*/
    document.onmouseup = null;
    document.onmousemove = null;
  }
}

//Fin efecto mover mapa

//Menu Hamburguesa

var menu = document.getElementById("menu");

function openMenu2(){
  var botonMenu = document.getElementById("nav-bar");
  var openMenu = document.getElementById("openMenu2");
  if (botonMenu.classList.contains("show2")) {
      botonMenu.classList.remove("show2");
      openMenu.style.transform = "rotate(0deg)";
      openMenu.style.left = "56px";
      botonMenu.style.left = "-90px";
  } else{
      botonMenu.classList.add("show2");
      openMenu.style.transform = "rotate(-180deg)";
      openMenu.style.left = "196px";
      botonMenu.style.left = "0px";
  }
}