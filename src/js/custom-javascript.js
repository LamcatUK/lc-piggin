// Add your custom JS here.
// var e,t=["scroll","wheel","touchstart","touchmove","touchenter","touchend","touchleave","mouseout","mouseleave","mouseup","mousedown","mousemove","mouseenter","mousewheel","mouseover"];if(function(){var e=!1;try{var t=Object.defineProperty({},"passive",{get:function(){e=!0}});window.addEventListener("test",null,t),window.removeEventListener("test",null,t)}catch(e){}return e}()){var o=EventTarget.prototype.addEventListener;e=o,EventTarget.prototype.addEventListener=function(o,r,n){var s,a="object"==typeof n&&null!==n,i=a?n.capture:n;(n=a?function(e){var t=Object.getOwnPropertyDescriptor(e,"passive");return t&&!0!==t.writable&&void 0===t.set?Object.assign({},e):e}(n):{}).passive=void 0!==(s=n.passive)?s:-1!==t.indexOf(o)&&!0,n.capture=void 0!==i&&i,e.call(this,o,r,n)},EventTarget.prototype.addEventListener._original=e}
(function(){

    var doc = document.documentElement;
    var w = window;
  
    var prevScroll = w.scrollY || doc.scrollTop;
    var curScroll;
    var direction = 0;
    var prevDirection = 0;
  
    var header = document.getElementById('main-nav');
  
    var checkScroll = function() {
  
      /*
      ** Find the direction of scroll
      ** 0 - initial, 1 - up, 2 - down
      */
  
      curScroll = w.scrollY || doc.scrollTop;
      if (curScroll > prevScroll) { 
        //scrolled up
        direction = 2;
      }
      else if (curScroll < prevScroll) { 
        //scrolled down
        direction = 1;
      }
  
      if (direction !== prevDirection) {
        toggleHeader(direction, curScroll);
      }
  
      prevScroll = curScroll;
    };
  
    var toggleHeader = function(direction, curScroll) {
      if (direction === 2 && curScroll > 52) { 
  
        //replace 52 with the height of your header in px
  
        header.classList.add('hide');
        prevDirection = direction;
      }
      else if (direction === 1) {
        header.classList.remove('hide');
        prevDirection = direction;
      }
    };
  
    window.addEventListener('scroll', checkScroll);

  
  })();

(function($){
  $(window).scroll( function( e ){ 
    if( $(this).scrollTop() > 75){ //$('#main-nav').offset().top ){
        $("#main-nav").addClass("bg-white");
    } else {
        $("#main-nav").removeClass("bg-white");
    }
});
})(jQuery);

(function ($) {

  var gallery_id = '426067170422';
  var title = $('h2'),
      viewer = $('#viewer'),
      thumbs = $('#thumbs');
  
  // album info
  $.getJSON('//graph.facebook.com/' + gallery_id + '?callback=?', function(json, status, xhr) {
    title.html('<a href="' + json.link + '">' + json.name + '</a> from ' + json.from.name);
  });

  // images
  $.getJSON('//graph.facebook.com/' + gallery_id + '/photos?callback=?', function(json, status, xhr) {
    var imgs = json.data;

    viewer.attr('src', imgs[0].images[0].source)

    for (var i = 0, l = imgs.length - 1; i < l; i++) {
      $('<img src="' + imgs[i].images[3].source + '" data-fullsize="' + imgs[i].images[0].source + '">').appendTo(thumbs);
    }

    $('img', thumbs).bind('click', function(e) {
      e.preventDefault();
      viewer.attr('src', $(this).attr('data-fullsize'));
    });
  });
})(jQuery);