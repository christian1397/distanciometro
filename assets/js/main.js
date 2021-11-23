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

const labels = ['8AM', '', '10AM', '', '12PM', '', '2PM', '', '4PM', '', '6PM', '', '8PM', '', '10PM'];
const datapoints = [370, 292, 448, 1, 260, 9, 28, 97, 182, 478, 272, 357, 137, 185, 360];
const data = {
  labels: labels,
  datasets: [
    {
      label: 'Cubic interpolation (monotone)',
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

// Fin de cuadro estadistico