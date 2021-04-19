import 'owl.carousel/dist/assets/owl.carousel.css';
 require( './styles/app.css');


const $ = require('jquery');

require('bootstrap');

import 'owl.carousel';


window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 15 || document.documentElement.scrollTop > 15) {

   
    $('.navbar').addClass("fixed-top");
   


    
    $('.bg-emp-transparent').addClass('bg-emp-blue').removeClass('bg-emp-transparent');
    $('.navbar-brand').addClass("oval-emp").removeClass('oval-empTransparent');;

  }else {
    
   
    $('.navbar ').removeClass("fixed-top");
   
 
    $('.navbar').addClass('bg-emp-transparent').removeClass('bg-emp-blue');
    $('.navbar-brand').addClass("oval-empTransparent").removeClass('oval-emp');;

  }

  
}

window.onload = (event) => {
  if(document.documentElement.scrollTop > 25){

    //$('.navbar').addClass("fixed-top");
    $('.navbar').addClass('bg-emp-blue');
    
  }
  
};



//Hamburger menu change on click
$(document).ready(function(){
  $('#ham-icon').click(function(){
    $('.icon-ham').toggleClass('active');
    console.log("icon clicked");
    // if ($('navbar-collapse').hasClass('show')){

    //   $('body').css('overflow-y','hidden !important');
    // };
  })
})


$(document).ready(function() {
  $('.carousel').carousel();
});


// calling owl carousel-------------------------------------------------------------------------------------------------


$('.owl-carousel').owlCarousel({
  loop: true,
  margin: 10,
  nav: true,
  navText: [
    "<i class='fa fa-caret-left'></i>",
    "<i class='fa fa-caret-right'></i>"
  ],
  autoplay: true,
  autoplayHoverPause: true,
  responsive: {
    0: {
      items: 1
    },
    600: {
      items: 2
    },
    1000: {
      items: 4
    }
  }
})

//------------------------------------------------------------------------------------------------------------------=-----
//$( "#cap_one" ).append( "<p>Test</p>" );
$(document).delegate("cap_one", "click", function() {
  window.location = $(this).find("a").attr("href");
  console.log("botton is clicked");
});


$('#carousel-home').on('slide.bs.carousel', function () {

  

  console.log('item-changed');
  $('.carousel-caption').hide();
}).on('slid.bs.carousel', function(e) {
  $('.active .carousel-caption').fadeIn('slow');
});
  

if($(window).width() <= 767){

  console.log('mobile device')
}

$(window).resize(function(){     

  if ($('#service-icon-container').width() <= 767){
         // is mobile device
      console.log('mobile device')
  }



});



var $item = $('.service-img-class'), //Cache your DOM selector
visible = 2, //Set the number of items that will be visible
index = 0, //Starting index
endIndex = ( $item.length / visible ) - 1; //End index

$('#arrow-img-right').click(function(){
if(index < endIndex ){
  index++;
  $item.animate({'left':'-=200px'});
}
});

$('#arrow-img-left').click(function(){
if(index > 0){
  index--;            
  $item.animate({'left':'+=200px'});
}
});


// Enable Carousel Controls
$(".left").click(function(){
  $("#carousel-properties").carousel("prev");
});

//-------------------------------------------Animate on scroll------------------------------------------------------------
var $animation_elements = $('.animation-element');
var $window = $(window);

function check_if_in_view() {
	var window_height = $window.height();
	var window_top_position = $window.scrollTop();
	var window_bottom_position = (window_top_position + window_height);

	$.each($animation_elements, function() {
		var $element = $(this);
		var element_height = $element.outerHeight();
		var element_top_position = $element.offset().top;
		var element_bottom_position = (element_top_position + element_height);

		//check to see if this current container is within viewport
		if ((element_bottom_position >= window_top_position) &&
			(element_top_position <= window_bottom_position)) {
		  $element.addClass('in-view');
		} else {
		  $element.removeClass('in-view');
		}
	});
}

$window.on('scroll resize', check_if_in_view);
$window.trigger('scroll', check_if_in_view);


//-------------------------------------------Animate on scroll------------------------------------------------------------


//-------------------------------------------Number animation------------------------------------------------------------

var section = document.querySelector('.numbers');
var hasEntered = false;

window.addEventListener('scroll', (e) => {
	var shouldAnimate = (window.scrollY + window.innerHeight) >= section.offsetTop;

	if (shouldAnimate && !hasEntered) {
  	hasEntered = true;
    
    $('.value').each(function () {
    	$(this).prop('Counter',0).animate({
        Counter: $(this).text()
    	}, {
        duration: 4000,
        easing: 'swing',
        step: function (now) {
            $(this).text(Math.ceil(now));
        }
   		});
    });

  }
});


// mortgage calculater
function calculateMortgage(p, r, n) {
  r = percentToDecimal(r);
  n = yearsToMonths(n);
  var pmt = (r * p) / (1 - (Math.pow((1 + r), (-n))));
  return parseFloat(pmt.toFixed(2));
}

function percentToDecimal(percent) {
  return (percent / 12) / 100;
}

function yearsToMonths(year) {
  return year * 12;
}
var htmlEl = document.getElementById("outMonthly");

function postPayments(pmt) {
  htmlEl.innerText = "£" + pmt;
}
var btn = document.getElementById("btnCalculate");
btn.onclick = function() {
  var cost = document.getElementById("inCost").value.replace('£', '');
  var downPayment = document.getElementById("inDown").value.replace('£', '');
  var interest = document.getElementById("inInterest").value.replace('%', '');
  var term = document.getElementById("inTerm").value.replace(' years', '');
  
  if (cost == "" && downPayment == "" && interest == "" && term == "") {
    htmlEl.innerText = "Please fill out all fields.";
    return false;
  }
  if (cost < 0 || cost == "" || isNaN(cost)) {
    htmlEl.innerText = "Please enter a valid loan amount.";
    return false;
  }
  if (downPayment < 0 || downPayment == "" || isNaN(downPayment)) {
    htmlEl.innerText = "Please enter a valid down payment.";
    return false;
  }
  if (interest < 0 || interest == "" || isNaN(interest)) {
    htmlEl.innerText = "Please enter a valid interest rate.";
    return false;
  }
  if (term < 0 || term == "" || isNaN(term)) {
    htmlEl.innerText = "Please enter a valid length of loan.";
    return false;
  }
  var amountBorrowed = cost - downPayment;
  var pmt = calculateMortgage(amountBorrowed, interest, term);
  postPayments(pmt);
};

console.log('Hello Webpack Encore! Edit me in assets/app.js');



