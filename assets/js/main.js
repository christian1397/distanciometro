/*===== SHOW NAVBAR  =====*/ 
const showNavbar = (toggleId, navId, bodyId, headerId) =>{
    const toggle = document.getElementById(toggleId),
    nav = document.getElementById(navId),
    bodypd = document.getElementById(bodyId),
    headerpd = document.getElementById(headerId)

    // Validate that all variables exist
    if(toggle && nav && bodypd && headerpd){
        toggle.addEventListener('click', ()=>{
            // show navbar
            nav.classList.toggle('show')
            // change icon
            toggle.classList.toggle('bx-x')
            // add padding to body
            bodypd.classList.toggle('body-pd')
            // add padding to header
            headerpd.classList.toggle('body-pd')
        })
    }
}

showNavbar('header-toggle','nav-bar','body-pd','header')

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
    var botonMenu = document.getElementById("nav-bar")
    var openMenu = document.getElementById("openMenu")
    if (botonMenu.classList.contains("show")) {
        botonMenu.classList.remove("show")
        openMenu.classList.remove("fa-chevron-left")
        openMenu.classList.add("fa-chevron-right")
        openMenu.style.right = "20px"
    } else{
        botonMenu.classList.add("show")
        openMenu.classList.add("fa-chevron-left")
        openMenu.classList.remove("fa-chevron-right")
        openMenu.style.right = "-136px"
    }
}