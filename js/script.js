// Add the page onload option functionality
let loader = document.getElementById('loading');
function myloader(){ 
	 loader.style.display ='none';
}

// End page load functionality
   const toggle = document.querySelector('nav .responsive_icon');
   const nav = document.querySelectorAll('nav .nav_menu');
   toggle.addEventListener('click',function(){
      nav.forEach(col=>col.classList.toggle('nav_show'))
   })
// =========X==Responsive Nav Bar==X========

// ============Story Slider=============
   $('.our_slider').slick({
      dots: false,
      infinite: true,
      speed: 300,
      autoplay: true,
      autoplaySpeed: 2000,
      slidesToShow: 3,
      slidesToScroll: 3,
      responsive: [
         {
           breakpoint: 1024,
           settings: {
             slidesToShow: 2,
             slidesToScroll: 2,
             infinite: true,
             dots: true,
             arrows:false
           }
         },
         {
           breakpoint: 600,
           settings: {
             slidesToShow: 1,
             slidesToScroll: 1,
             arrows:false
           }
         }
         // You can unslick at a given breakpoint now by adding:
         // settings: "unslick"
         // instead of a settings object
       ]
   });
 // =========X===Story Slider==X=========

 // ============Product Detailes Slider=============
    $('.product_de_slider').slick({
      dots: false,
      infinite: true,
      speed: 300,
      autoplay: true,
      autoplaySpeed: 2000,
      slidesToShow: 4,
      slidesToScroll: 4,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 3,
            infinite: true,
            dots: true,
            arrows:false
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 2,
            dots: true,
            arrows:false
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            dots: true,
          }
        }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
      ]
    });
// =========X==Product Detailes Slider Slider==X=========

// ============Home Slider=============
  $('.home_slider').slick({
    infinite: true,
    dots: true,
    arrows:false,
    speed: 300,
    autoplay: true,
    autoplaySpeed: 2000,
    slidesToShow: 1,
    slidesToScroll: 1,
  });
// =========X==Home Slider==X=========

// ============Product Detailes Slider=============
    $('#recent_home').slick({
      dots: false,
      infinite: true,
      speed: 300,
      autoplay: true,
      autoplaySpeed: 2000,
      slidesToShow: 4,
      slidesToScroll: 4,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 4,
            slidesToScroll: 4,
            infinite: true,
            dots: false,
            arrows:false
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 3,
            dots: false,
            arrows:false
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows:false,
            dots: false,
          }
        }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
      ]
    });
     
// =========X==Product Detailes Slider Slider==X=========

// ===========Category filter========
    var cat_open = document.querySelector('.shopping .open_filter #open_filter');
    var cat_close = document.querySelector('.shopping .open_filter #close_filter');
    var left_side =document.querySelector('.left_side');
    var right_side= document.querySelector('.right_side');

    // Open filter script Script
      cat_open.addEventListener('click',()=>{
        cat_open.style.display="none";
        right_side.style.display="none";
        left_side.style.display="initial";
        cat_close.style.display="initial";
      });

    //Closed filter Script
      cat_close.addEventListener('click',()=>{
          cat_close.style.display="none";
          left_side.style.display="none";
          right_side.style.display="initial";
          cat_open.style.display="initial";
      });
// ===========Category filter========

// ==========Image On hover========
  function myfunction(smallImg){
    var fullImg = document.getElementById("big_img");
    fullImg.src = smallImg.src;
  }
// ========X==Image On hover==X======
