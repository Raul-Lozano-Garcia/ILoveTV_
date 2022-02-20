"use strict"

//MENU
const nav=document.querySelector(".navbar-index");
const logo=document.querySelector(".logo-index");

// screen.height= ALTURA PANTALLA (USAR SI ME HACE FALTA)

if(nav!==null){
    document.addEventListener("scroll",
    ()=>{
        let top=document.documentElement.scrollTop;
        if(top>80){
            nav.classList.remove("transparente");
            nav.classList.remove("navbar-dark");
            nav.classList.add("bg-light");
            nav.classList.add("navbar-light");
            logo.classList.add("escalar");
        }else{
            nav.classList.remove("bg-light");
            nav.classList.remove("navbar-light");
            nav.classList.add("transparente");
            nav.classList.add("navbar-dark");
            logo.classList.remove("escalar");
        }
    });
}



//CARRUSEL ÚLTIMOS 5 LANZAMIENTOS
if(document.querySelector('.owl-carousel')!==null){
    $('.owl-carousel').owlCarousel({
        loop:true,
        margin:10,
        responsiveClass:true,
        autoplay:true,
        autoplayTimeout:5000,
        autoplayHoverPause:true,
        responsive:{
            0:{
                items:1,
                nav:true
            },
            600:{
                items:3,
                nav:false
            },
            1000:{
                items:5,
                nav:true
            }
        }
    })
}




//FORMULARIO ACCESO
const form = document.querySelector('#requires-validation');

if(form!==null){
    form.addEventListener('submit', (event)=> {
        if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
        }
    
        form.classList.add('was-validated')
    }, false);
}

    

//MODAL COOKIES
const cookieModal = document.querySelector(".cookie-consent-modal")
const cancelCookieBtn = document.querySelector(".btn.cancel")
const acceptCookieBtn = document.querySelector(".btn.accept")

if(cancelCookieBtn!==null){
    cancelCookieBtn.addEventListener("click", ()=>{
        cookieModal.classList.remove("active")
    })
    acceptCookieBtn.addEventListener("click", ()=>{
        cookieModal.classList.remove("active")
        localStorage.setItem("cookieAccepted", "yes")
    })
    
    setTimeout(()=>{
        const cookieAccepted = localStorage.getItem("cookieAccepted")
        if (cookieAccepted != "yes"){
            cookieModal.classList.add("active")
        }
    }, 2000)
}