 
$(document).ready(function() {

  $("#gallery").lightGallery(); 

  
//button active mode
$('.button').click(function(){ 
  $('.button').removeClass('is-checked');
  $(this).addClass('is-checked');
  });
  
  
  //CSS Gram Filters on Mouse enter
  $("#gallery a .nak-gallery-poster").addClass("inkwell");
  
  $("#gallery a").on({
  mouseenter : function() {
    $(this).find(".nak-gallery-poster").removeClass("inkwell").addClass("walden");
  },
  mouseleave : function() {
    $(this).find(".nak-gallery-poster").removeClass("walden").addClass("inkwell");
  }
  }); 
  


  var $gallery = $('#gallery');
  var $boxes = $('.revGallery-anchor');
  $boxes.hide(); 

  $gallery.imagesLoaded( {background: true}, function() {
    $boxes.fadeIn();

    $gallery.isotope({
      // options
      sortBy : 'original-order',
      layoutMode: 'fitRows',
      itemSelector: '.revGallery-anchor',
      stagger: 30,
    });
  });	

   $('button').on( 'click', function() { 
     var filterValue = $(this).attr('data-filter');
      $('#gallery').isotope({ filter: filterValue });
      $gallery.data('lightGallery').destroy(true);
      $gallery.lightGallery({
          selector: filterValue.replace('*','')
      });
  });
});
 



function visible(partial) {
  var $t = partial,
      $w = jQuery(window),
      viewTop = $w.scrollTop(),
      viewBottom = viewTop + $w.height(),
      _top = $t.offset().top,
      _bottom = _top + $t.height(),
      compareTop = partial === true ? _bottom : _top,
      compareBottom = partial === true ? _top : _bottom;

  return ((compareBottom <= viewBottom) && (compareTop >= viewTop) && $t.is(':visible'));

}

$(window).scroll(function(){

if(visible($('.count-digit')))
  {
    if($('.count-digit').hasClass('counter-loaded')) return;
    $('.count-digit').addClass('counter-loaded');
    
$('.count-digit').each(function () {
var $this = $(this);
jQuery({ Counter: 0 }).animate({ Counter: $this.text() }, {
  duration: 5000,
  easing: 'swing',
  step: function () {
    $this.text(Math.ceil(this.Counter));
  }
});
});
  }
})