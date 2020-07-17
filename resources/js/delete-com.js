$(function() {
  $('.deleteTarget').on('click', function() {
    var deleteConfirm = confirm('削除してよろしいでしょうか？');
    if(deleteConfirm == true) {
      var clickEle = $(this)
      var comID = clickEle.attr('data-com-id');
    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      url: '/Commodity/' + comID,
      type: 'POST',
      data: {'id': comID,
            '_method': 'DELETE'}
    })
    .done(function() {
      // console.log(clickEle)
        clickEle.parent().remove();
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
  $('.deleteTarget-ima').on('click', function() {
    var deleteConfirm = confirm('削除してよろしいでしょうか？');
    if(deleteConfirm == true) {
      var clickEle = $(this)
      var imaID = clickEle.attr('data-ima-id');
    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      url: '/Image/' + imaID,
      type: 'POST',
      data: {'id': imaID,
            '_method': 'DELETE'}
    })
    .done(function() {
        clickEle.parent().remove();
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
  $('.deleteTarget-img').on('click', function() {
    var deleteConfirm = confirm('削除してよろしいでしょうか？');
    if(deleteConfirm == true) {
      var clickEle = $(this)
      var imgID = clickEle.attr('data-img-id');
    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      url: '/Image/' + imgID,
      type: 'POST',
      data: {'id': imgID,
            '_method': 'DELETE'}
    })
    .done(function() {
        clickEle.parent().remove();
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
  $('.deleteTarget-post').on('click', function() {
    var deleteConfirm = confirm('削除してよろしいでしょうか？');
    if(deleteConfirm == true) {
      var clickEle = $(this)
      console.log(clickEle);
      var postID = clickEle.attr('data-post-id');
    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      url: '/Post/' + postID,
      type: 'POST',
      data: {'id': postID,
            '_method': 'DELETE'}
    })
    .done(function() {
        clickEle.parent().remove();
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
  $('.deleteTarget-shop').on('click', function() {
    var deleteConfirm = confirm('削除してよろしいでしょうか？');
    if(deleteConfirm == true) {
      var clickEle = $(this)
      var shopID = clickEle.attr('data-shop-id');
    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      url: '/Shop/' + shopID,
      type: 'POST',
      data: {'id': imaID,
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