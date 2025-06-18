$( document ).ready(function() {
  // Mobile Menu Toggle
  $(".mobile_menu").click(function() {
    $('nav.mobile').fadeToggle();
    $('header').toggleClass("open");
    $(this).toggleClass("open");
  });
  
});

$(".services .slider").slick({
  dots: true,
  arrows: true,
  infinite: true,
  speed: 400,
  autoplaySpeed: 4000,
  slidesToShow: 2,
  slidesToScroll:2,
  fade: false,
  autoplay: false,
  cssEase: "linear",
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        dots: true,
        arrows: false,
        slidesToShow: 1,
        slidesToScroll:1,
      }
    }
  ]
});

$(".home .slider").slick({
  dots: false,
  arrows: true,
  infinite: true,
  speed: 400,
  autoplaySpeed: 4000,
  slidesToShow: 1,
  slidesToScroll:1,
  fade: true,
  autoplay: false,
  cssEase: "linear",
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        dots: true,
        arrows: false,
        slidesToShow: 1
      }
    }
  ]
});

$(".swiper-wrapper").slick({
  dots: false,
  arrows: true,
  infinite: true,
  speed: 400,
  autoplaySpeed: 4000,
  slidesToShow: 1,
  slidesToScroll:1,
  fade: true,
  autoplay: false,
  cssEase: "linear",
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        dots: true,
        arrows: false,
        slidesToShow: 1
      }
    }
  ]
});


// SVG as Images
$(function(){
  activate('img[src*=".svg"]');
  function activate(string){
    jQuery(string).each(function(){
      var $img = jQuery(this);
      var imgID = $img.attr('id');
      var imgClass = $img.attr('class');
      var imgURL = $img.attr('src');
        jQuery.get(imgURL, function(data) {
        // Get the SVG tag, ignore the rest
        var $svg = jQuery(data).find('svg');
        
        // Add replaced image's ID to the new SVG
        if(typeof imgID !== 'undefined') {
          $svg = $svg.attr('id', imgID);
        }
        // Add replaced image's classes to the new SVG
        if(typeof imgClass !== 'undefined') {
          $svg = $svg.attr('class', imgClass+' replaced-svg');
        }
        // Remove any invalid XML tags as per http://validator.w3.org
        $svg = $svg.removeAttr('xmlns:a');

        // Replace image with new SVG
        $img.replaceWith($svg);

      }, 'xml');
    });
  }
});

// ------------------------------------------------------------
// Animation Javascript
// ------------------------------------------------------------

var componentVisible = (function ($) {
  
  var $components = $('section, footer, header, article, .service');

  var componentsWaypoints = $components.waypoint({
    handler: function() {
      $(this.element).addClass("visible");
    },
    offset: '90%'
  });

})(jQuery);

// Mobile Menu 
$("li.menu-item-has-children > a").after("<div class='sub-toggle'></div>");

$(".sub-toggle").click(function() {
  $(this).siblings('ul').toggle();
  $(this).toggleClass("open");
});

// ------------------------------------------------------------
// Accordian
// ------------------------------------------------------------

function accordion_ajax() {
  var accItem = document.getElementsByClassName('accordionItem');
  var accHD = document.getElementsByClassName('accordionItemHeading');
  for (i = 0; i < accHD.length; i++) {
      accHD[i].addEventListener('click', toggleItem, false);
  }
  function toggleItem() {
      var itemClass = this.parentNode.className;
      for (i = 0; i < accItem.length; i++) {
        // accItem[i].className = 'accordionItem close';
        this.parentNode.className = 'accordionItem close';
      }
      if (itemClass == 'accordionItem close') {
        this.parentNode.className = 'accordionItem open';
      }
  }
}
accordion_ajax();

document.addEventListener('DOMContentLoaded', function () {
    const workItems = document.querySelectorAll('.work-item');
    const displayedImage = document.getElementById('displayed-image');

    workItems.forEach(item => {
        // Hover functionality to update image and set active class
        item.addEventListener('mouseenter', function () {
            const imageUrl = this.getAttribute('data-image');
            displayedImage.src = imageUrl;

            // Update active class
            workItems.forEach(el => el.classList.remove('active'));
            this.classList.add('active');
        });

        // Click functionality to navigate to the link
        item.addEventListener('click', function () {
            const link = this.getAttribute('data-link');
            if (link) {
                window.location.href = link;
            }
        });
    });
});

jQuery(document).ready(function($) {
  $('.learn-more').on('click', function() {
    var $this = $(this);
    var $content = $this.siblings('.profile-content');

    $content.slideToggle(300, function() {
      // Toggle an active class based on content visibility
      if ($content.is(':visible')) {
        $this.text('View Less');
      } else {
        $this.text('Learn More');
      }
    });
  });
});


document.querySelectorAll('h3.toggle').forEach(function(header) {
  header.addEventListener('click', function() {
    const list = this.nextElementSibling;
    // Toggle active class on the clicked header
    this.classList.toggle('active');
    
    if (list.classList.contains('collapsed')) {
      list.classList.remove('collapsed');
      list.classList.add('show');
    } else {
      list.classList.remove('show');
      list.classList.add('collapsed');
    }
  });
});

document.addEventListener("DOMContentLoaded", function() {
  var container = document.querySelector(".filter-container");
  if (!container) return;
  
  var activeLink = container.querySelector("a.current");
  if (activeLink) {
    var offsetLeft = activeLink.offsetLeft;
    var elementWidth = activeLink.offsetWidth;
    var containerWidth = container.offsetWidth;
    var currentScrollLeft = container.scrollLeft;
    
    // Check if the active element is fully visible.
    // If its left edge is before the current scroll or its right edge is after the visible area, adjust scroll.
    if (offsetLeft < currentScrollLeft || (offsetLeft + elementWidth) > (currentScrollLeft + containerWidth)) {
      container.scrollLeft = offsetLeft - (containerWidth / 2) + (elementWidth / 2);
    }
  }
});