$( document ).ready(function() {
  $(".mobile_menu").click(function() {
    $('.mobile').toggleClass('active');
    $(this).toggleClass("open");
    $('nav.menu').toggleClass("open");
  });

  $('.site-menu').click(function() {
    $('ul.sites').toggleClass('active');
    $(this).toggleClass("open");
  });
  
  $(".primary .search_icon").click(function() {
    $('.primary .search_form').fadeToggle();
    $(this).toggleClass("open");
    $('#menu-main').fadeToggle();
  });
  
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
  
  var $components = $('section, footer, header, .step');

  var componentsWaypoints = $components.waypoint({
    handler: function() {
      $(this.element).addClass("visible");
    },
    offset: '70%'
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
