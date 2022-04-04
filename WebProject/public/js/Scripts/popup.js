$(document).ready(function($) {
  $('.popup-open').click(function() {
    $('.popup-fade').fadeIn();
    return false;
  });

  $('.popup-close1').click(function() {
    $(this).parents('.popup-fade').fadeOut();
    return false;
  });

  $('.popup-close2').click(function() {
    $(this).parents('.popup-fade').fadeOut();
    return false;
  });

  $(document).keydown(function(e) {
    if (e.keyCode === 27) {
      e.stopPropagation();
      $('.popup-fade').fadeOut();
    }
  });

  $('.popup-fade').click(function(e) {
    if ($(e.target).closest('.popup').length == 0) {
      $(this).fadeOut();
    }
  });
});


$('#left-arrow').click(function() {
  var currentId = parseInt($('#bigPhoto').attr('title')) - 1;
  var newSrc = $('#' + currentId).attr('src');
	if (newSrc == null) return;
  $('#bigPhoto').attr({
    src: newSrc,
    title: currentId
  });
});

$('#right-arrow').click(function() {
  var currentId = parseInt($('#bigPhoto').attr('title')) + 1;
  var newSrc = $('#' + currentId).attr('src');
	if (newSrc == null) return;
  $('#bigPhoto').attr({
    src: newSrc,
    title: currentId
  });
});
