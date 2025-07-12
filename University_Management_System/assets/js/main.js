// main.js
$(document).ready(function () {
  var s = $("#sticker");
  var pos = s.position();
  $(window).scroll(function () {
    var windowpos = $(window).scrollTop();
    if (windowpos >= pos.top) {
      s.addClass("stick");
    } else {
      s.removeClass("stick");
    }
  });

  var s2 = $("#stickerside");
  var pos2 = s2.position();
  $(window).scroll(function () {
    var windowpos2 = $(window).scrollTop();
    if (windowpos2 >= pos2.top) {
      s2.addClass("stickside");
    } else {
      s2.removeClass("stickside");
    }
  });
});
