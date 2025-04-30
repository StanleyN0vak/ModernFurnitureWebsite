jQuery(function($){
  const $wrapper = $('.ms-wrapper-img');
  const $afterImg = $('.ms-img-after');
  const $scroller = $('.ms-scroller');
  let isDragging = false;

  function initSlider() {
    $afterImg.css('clip-path', 'inset(0 50% 0 0)');
    $scroller.css('left', '50%');
  }

  function moveSlider(clientX) {
    const wrapperRect = $wrapper[0].getBoundingClientRect();
    let pos = ((clientX - wrapperRect.left) / wrapperRect.width) * 100;
    pos = Math.max(0, Math.min(pos, 100));
    
    $afterImg.css('clip-path', `inset(0 ${100 - pos}% 0 0)`);
    $scroller.css('left', `${pos}%`);
  }

  $scroller.on('mousedown', function(e) {
    isDragging = true;
    $(this).addClass('scrolling');
    e.preventDefault();
  });

  $(document).on('mouseup', function() {
    isDragging = false;
    $scroller.removeClass('scrolling');
  });

  $(document).on('mousemove', function(e) {
    if (!isDragging) return;
    moveSlider(e.clientX);
  });

  $scroller.on('touchstart', function(e) {
    isDragging = true;
    $(this).addClass('scrolling');
    e.preventDefault();
  });

  $(document).on('touchend', function() {
    isDragging = false;
    $scroller.removeClass('scrolling');
  });

  $(document).on('touchmove', function(e) {
    if (!isDragging) return;
    moveSlider(e.originalEvent.touches[0].clientX);
  });

  initSlider();
  $(window).on('resize', initSlider);
});