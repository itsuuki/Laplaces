$(function() {
  $('.getTarget-fav').on('click', function() {
    var getConfirm = confirm('いいねしてよろしいでしょうか？');
    if(getConfirm == true) {
      var clickEle = $(this)
      var favID = clickEle.attr('data-fav-id');
      // console.log(clickEle);
      // console.log(favID);
    $.ajax({
      // headers: {
      //   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      // },
      url: '/Favorite/' + favID,
      type: 'POST',
      data: {
        'shop_id': favID,
        '_method': 'POST'}
    })
    .done(function() {
        // clickEle.parent().remove();
      })
    .fail(function() {
        alert('エラー');
      });
    } else {
      (function(e) {
        e.preventDefault()
      });
    };
  });
});
$(function() {
  $('.deleteTarget-fav').on('click', function() {
    var deleteConfirm = confirm('いいね削除してよろしいでしょうか？');
    if(deleteConfirm == true) {
      var clickEle = $(this)
      var favID = clickEle.attr('data-fav-id');
    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      url: '/UnFavorite/' + favID,
      type: 'POST',
      data: {'id': favID,
            '_method': 'DELETE'}
    })
    .done(function() {
        // clickEle.parent().remove();
      })
    .fail(function() {
        alert('エラー');
      });
    } else {
      (function(e) {
        e.preventDefault()
      });
    };
  });
});
$(document).ready(function() {
  var scrollTop = $(".scrollTop");
  $(window).scroll(function() {
    var topPos = $(this).scrollTop();
    if (topPos > 100) {
      $(scrollTop).css("opacity", "1");
    } else {
      $(scrollTop).css("opacity", "0");
    }
  });
  $(scrollTop).click(function() {
    $('html, body').animate({
      scrollTop: 0
    }, 800);
    return false;
  });
});

$(function(){
  $("main img").click(function() {
    $("#graydisplay").html($(this).prop('outerHTML'));
    $("#graydisplay").fadeIn(200);
  });
  $("#graydisplay, #graydisplay img").click(function() {
    $("#graydisplay").fadeOut(200);
  });
});

$(function() {
  $('.tab_btn').on('click', function() {
    $('.tab_item').removeClass("is-active-item");
    $($(this).attr("href")).addClass("is-active-item");
  });
});