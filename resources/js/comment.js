// $(function() {
//   get_data();
// });

// function get_data() {
// // $(function() {
// //   $('.chat-btn').on('click', function() {
//   $.ajax({
//       url: "result/ajax/",
//       dataType: "json",
//       success: data => {
//         // console.log(data);
//         $("#comment-data")
//             .find(".comment-visible")
//             .remove();
    
//         for (var i = 0; i < data.comments.length; i++) {
//             var html = `
//                         <div class="media comment-visible">
//                             <div class="media-body comment-body">
//                                 <div class="row">
//                                     <span class="comment-body-user" id="name">${data.comments[i].name}</span>
//                                     <span class="comment-body-time" id="created_at">${data.comments[i].created_at}</span>
//                                 </div>
//                                 <span class="comment-body-content" id="comment">${data.comments[i].comment}</span>
//                             </div>
//                         </div>
//                     `;
    
//               $("#comment-data").append(html);
//           }
//       },
//       error: () => {
//           alert("ajax Error");
//       }
//   });
//   setTimeout("get_data()", 5000);
// };
  // setTimeout("get_data()", 5000);
//   });
// });
$(function() {
  const buildHTML = (data)=> {
    const html = `
    <div class="media comment-visible">
        <div class="media-body comment-body">
            <span class="comment-body-content" id="comment">${data}</span>
        </div>
    </div>`;
    return html;
  }
  $('.chat-btn').on('click', function() {
    var data = $('.form-control').val();
    $.ajax({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      url: '/add',
      type: 'POST',
      data: {'comment' : data,},
    })
    .done(function(data) {
        console.log(data);
        // var data = $('.form-control').val();
        var html = buildHTML(data);
        $("#comment-data").append(html);
        $('.form-control').val("");
    })
    .fail(function(data) {
      alert(data);
    });
    // $.ajax({
    //     url: "/add",
        // dataType: "json",
    //     success: data => {
          
    //             $("#comment-data").append(html);
    //         }
    //     },
    //     error: () => {
    //         alert("ajax Error");
    //     }
    // });
      
    // setTimeout("get_data()", 5000);
  });
});