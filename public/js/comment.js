/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 9);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/comment.js":
/*!*********************************!*\
  !*** ./resources/js/comment.js ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports) {

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
$(function () {
  var buildHTML = function buildHTML(data) {
    var html = "\n    <div class=\"media comment-visible\">\n        <div class=\"media-body comment-body\">\n            <span class=\"comment-body-content\" id=\"comment\">".concat(data, "</span>\n        </div>\n    </div>");
    return html;
  };

  $('.chat-btn').on('click', function () {
    var data = $('.form-control').val();
    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      url: '/add',
      type: 'POST',
      data: {
        'comment': data
      }
    }).done(function (data) {
      console.log(data); // var data = $('.form-control').val();

      var html = buildHTML(data);
      $("#comment-data").append(html);
      $('.form-control').val("");
    }).fail(function (data) {
      alert(data);
    }); // $.ajax({
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

/***/ }),

/***/ 9:
/*!***************************************!*\
  !*** multi ./resources/js/comment.js ***!
  \***************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /work/resources/js/comment.js */"./resources/js/comment.js");


/***/ })

/******/ });