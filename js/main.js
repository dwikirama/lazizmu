(function($) {

	"use strict";

	var fullHeight = function() {

		$('.js-fullheight').css('height', $(window).height());
		$(window).resize(function(){
			$('.js-fullheight').css('height', $(window).height());
		});

	};
	fullHeight();

	$('#sidebarCollapse').on('click', function () {
      $('#sidebar').toggleClass('active');
  });

})(jQuery);

const backToTopBtn = document.getElementById('backToTopBtn');

window.onscroll = debounce(() => {
  scrollFunction();
}, 100);

function scrollFunction() {
  if(window.scrollY > 300){
    backToTopBtn.style.display = 'block';
  } else {
    backToTopBtn.style.display = 'none'; 
  }
}

backToTopBtn.addEventListener('click', smoothScroll);

function smoothScroll() {
  window.scrollTo({
    top: 0, 
    behavior: 'smooth'
  });
}

// Debounce function
function debounce(fn, ms) {
  let timer;
  return () => {
    clearTimeout(timer);
    timer = setTimeout(() => {
      fn.apply(this, arguments);
    }, ms);
  };
}
