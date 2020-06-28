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
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/shop.js":
/*!******************************!*\
  !*** ./resources/js/shop.js ***!
  \******************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(function () {
  var buildFileField = function buildFileField(index) {
    var html = "\n    <div id=\"input_plural\" class=\"input_plural[".concat(index, "]\">\n      <label for=\"com-name\">\n        \u5546\u54C1\n      </label>\n      <input\n      id=\"name\"\n      name=\"name[").concat(index, "]\"\n      class=\"name {{ $errors->has('name[").concat(index, "]') ? 'is-invalid' : '' }}\"\n      value=\"\"\n      type=\"text\"\n      >\n\n      <label for=\"com-price\">\n        \u91D1\u984D\n      </label>\n      <input\n      id=\"price\"\n      name=\"price[").concat(index, "]\"\n      class=\"price {{ $errors->has('price[").concat(index, "]') ? 'is-invalid' : '' }}\"\n      value=\"\"\n      type=\"text\"\n      >\n\n      <label for=\"description\">\n          \u5546\u54C1\u7D39\u4ECB\n      </label>\n      <textarea\n          id=\"description\"\n          name=\"description[").concat(index, "]\"\n          class=\"com-description\"\n          rows=\"4\"\n      ></textarea>\n\n      <input type=\"hidden\" name=\"num[]\">\n      <input type=\"file\" name=\"image[]\">\n      <div class=\"plus_min\">\n      <input type=\"button\" value=\"\uFF0B\" class=\"add pluralBtn[]\">\n      <input type=\"button\" value=\"\uFF0D\" class=\"del pluralBtn[]\">\n      </div>\n    </div>");
    return html;
  };

  var buildFile = function buildFile(sindex) {
    var html = "\n    <div class=\"shop-img\">\n      <input type=\"file\" name=\"img[".concat(sindex, "]\" id=\"myfile\">\n      <div name=\"img-rem[").concat(sindex, "]\" id=\"img-rem\" class=\"img-rem\">\n        \u753B\u50CF\u524A\u9664\n      </div>\n      <input type=\"hidden\" name=\"nums[").concat(sindex, "]\">\n    </div>");
    return html;
  };

  var buildImg = function buildImg(ind, url) {
    var html = "<img data-index=\"".concat(ind, "\" src=\"").concat(url, "\" width=\"100px\" height=\"100px\">");
    return html;
  };

  var count_value = 0;
  var count_values = 1;
  var count_img = 1;
  $(document).on("click", ".add", function () {
    count_value++;
    count_values++;
    document.getElementById("press-button").innerHTML = count_values;
    var hoge = document.getElementById('input_pluralBox').dataset.index;
    var hoga = hoge.innerHTML = count_value;
    $('#input_pluralBox').append(buildFileField(hoga));
    $('input[name^=name]').filter(function (index) {
      $(this).attr('name', 'name[' + index + ']');
    });
    $('input[name^=price]').filter(function (index) {
      $(this).attr('name', 'price[' + index + ']');
    });
    $('testarea[name^=description]').filter(function (index) {
      $(this).attr('name', 'description[' + index + ']');
    });
    $('input[name^=num]').filter(function (index) {
      $(this).attr('name', 'num[' + index + ']');
    });
    $('input[name^=image]').filter(function (index) {
      $(this).attr('name', 'image[' + index + ']');
    });
  });
  $(document).on("click", ".del", function () {
    if (count_values > 1) {
      count_values--;
      document.getElementById("press-button").innerHTML = count_values;
      var plus_btn = $(this).parent();
      plus_btn.parent().remove();
      $('input[name^=name]').filter(function (index) {
        $(this).attr('name', 'name[' + index + ']');
      });
      $('input[name^=price]').filter(function (index) {
        $(this).attr('name', 'price[' + index + ']');
      });
      $('textarea[name^=description]').filter(function (index) {
        $(this).attr('name', 'description[' + index + ']');
      });
      $('input[name^=num]').filter(function (index) {
        $(this).attr('name', 'num[' + index + ']');
      });
      $('input[name^=image]').filter(function (index) {
        $(this).attr('name', 'image[' + index + ']');
      });
    }
  });
  $(document).on("click", ".img-add", function () {
    if (count_img < 4) {
      count_img++;
      var img_data = document.getElementById('img-box').dataset.ind;
      var imgc = img_data.innerHTML = count_img;
      $('#img-box').append(buildFile(imgc));
      $('input[name^=nums]').filter(function (sindex) {
        $(this).attr('name', 'nums[' + sindex + ']');
      });
      $('input[name^=img]').filter(function (sindex) {
        $(this).attr('name', 'img[' + sindex + ']');
      });
    }
  });
  $(document).on("click", ".img-rem", function () {
    console.log("ok");

    if (count_img > 1) {
      count_img--;
      $(this).parent().remove();
      $('input[name^=nums]').filter(function (sindex) {
        $(this).attr('name', 'nums[' + sindex + ']');
      });
      $('input[name^=img]').filter(function (sindex) {
        $(this).attr('name', 'img[' + sindex + ']');
      });
    }
  });
  $(document).on("click", ".a", function () {
    $('input[name^=nums]').filter(function (sindex) {
      $(this).attr('name', 'nums[' + sindex + ']');
    });
    $('input[name^=img]').filter(function (sindex) {
      $(this).attr('name', 'img[' + sindex + ']');
    });
  });
  $('input[name^=img]').change(function (e) {
    var file = e.target.files[0];
    var reader = new FileReader();

    if (file.type.indexOf("image") < 0) {
      alert("画像ファイルを指定してください。");
      return false;
    }

    reader.onload = function (file) {
      console.log("#img[".concat(count_img, "]"));
      return function (e) {
        $("#img[".concat(count_img, "]")).attr("src", e.target.result);
        $("#img[".concat(count_img, "]")).attr("title", file.name);
      };
    }(file);

    reader.readAsDataURL(file);
  });
});

/***/ }),

/***/ 1:
/*!************************************!*\
  !*** multi ./resources/js/shop.js ***!
  \************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /work/resources/js/shop.js */"./resources/js/shop.js");


/***/ })

/******/ });