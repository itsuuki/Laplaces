$(function(){
  const buildFileField = (index)=> {
    const html = `
    <div id="input_plural" class="input_plural[${index}]">
    <div class="com-oya">
      <label for="com-name">
        商品
      </label>
      <input
      id="name"
      name="name[${index}]"
      class="name {{ $errors->has('name[${index}]') ? 'is-invalid' : '' }}"
      value=""
      type="text"
      >

      <label for="com-price">
        金額
      </label>
      <input
      id="price"
      name="price[${index}]"
      class="price {{ $errors->has('price[${index}]') ? 'is-invalid' : '' }}"
      value=""
      type="text"
      >

      <label for="description">
          商品紹介
      </label>
      <textarea
          id="description"
          name="description[${index}]"
          class="com-description"
          rows="4"
      ></textarea>

      <input type="hidden" name="num[]">
      <input type="file" name="image[]">
      
      <div class="plus_min">
      <input type="button" value="＋" class="add pluralBtn[]">
      <input type="button" value="－" class="del pluralBtn[]">
      </div>
    </div>
    </div>`;
    return html;
  }
  const buildFile = (sindex)=> {
    const html = `
    <div class="shop-img">
      <input type="file" name="img[${sindex}]" id="myfile">
      <div name="img-rem[${sindex}]" id="img-rem" class="img-rem">
        画像削除
      </div>
      <input type="hidden" name="nums[${sindex}]">
    </div>`;
    return html;
  }
  const buildFiles = (sindex)=> {
    const html = `
    <div class="shop-img">
      <input type="file" name="img[${sindex}]" id="myfile">
      <div name="img-rem[${sindex}]" id="img-rem" class="shop-img-rem">
        画像削除
      </div>
      <input type="hidden" name="nums[${sindex}]">
    </div>`;
    return html;
  }
  const buildImg = (ind, url)=> {
    const html = `<img data-index="${ind}" src="${url}" width="100px" height="100px">`;
    return html;
  }
  var count_value = 0;
  var count_values = 1;
  var count_img = 1;
  $(document).on("click", ".add", function() {
    count_value++;
    count_values++;
    document.getElementById("press-button").innerHTML = count_values;
    var hoge = document.getElementById('input_pluralBox').dataset.index;
    var hoga = hoge.innerHTML = count_value;
    $('#input_pluralBox').append(buildFileField(hoga));
    $('input[name^=name]').filter(function(index){
      $(this).attr('name','name['+index+']') 
    });
    $('input[name^=price]').filter(function(index){ 
      $(this).attr('name','price['+index+']') 
    });
    $('testarea[name^=description]').filter(function(index){ 
      $(this).attr('name','description['+index+']') 
    });
    $('input[name^=num]').filter(function(index){ 
      $(this).attr('name','num['+index+']') 
    });
    $('input[name^=image]').filter(function(index){ 
      $(this).attr('name','image['+index+']') 
    });
  });
  $(document).on("click", ".del", function() {
      if (count_values > 1) {
        count_values--;
        document.getElementById("press-button").innerHTML = count_values;
        var plus_btn = $(this).parent()
        plus_btn.parent().remove();
        $('input[name^=name]').filter(function(index){
          $(this).attr('name','name['+index+']') 
        });
        $('input[name^=price]').filter(function(index){ 
          $(this).attr('name','price['+index+']') 
        });
        $('textarea[name^=description]').filter(function(index){ 
          $(this).attr('name','description['+index+']') 
        });
        $('input[name^=num]').filter(function(index){ 
          $(this).attr('name','num['+index+']') 
        });
        $('input[name^=image]').filter(function(index){ 
          $(this).attr('name','image['+index+']') 
        });
      }
  });
  $(document).on("click", ".img-add", function() {
    if (count_img < 4) {
    count_img++
    var img_data = document.getElementById('img-box').dataset.ind;
    var imgc = img_data.innerHTML = count_img;
    $('#img-box').append(buildFile(imgc));
    
    $('input[name^=nums]').filter(function(sindex){ 
      $(this).attr('name','nums['+sindex+']') 
    });
    $('input[name^=img]').filter(function(sindex){ 
      $(this).attr('name','img['+sindex+']') 
    });
    }
  });
  $(document).on("click", ".img-rem", function() {
    console.log("ok");
    if (count_img > 1) {
      count_img--;
      $(this).parent().remove();
      $('input[name^=nums]').filter(function(sindex){ 
        $(this).attr('name','nums['+sindex+']') 
      });
      $('input[name^=img]').filter(function(sindex){ 
        $(this).attr('name','img['+sindex+']') 
      });
    }
  });
  $(document).on("click", ".shop-img-add", function() {
    if (count_img < 4) {
    count_img++
    var img_data = document.getElementById('img-box').dataset.ind;
    var imgc = img_data.innerHTML = count_img;
    $('#img-box').append(buildFiles(imgc));
    
    $('input[name^=nums]').filter(function(sindex){ 
      $(this).attr('name','nums['+sindex+']') 
    });
    $('input[name^=img]').filter(function(sindex){ 
      $(this).attr('name','img['+sindex+']') 
    });
    }
  });
  $(document).on("click", ".shop-img-rem", function() {
    console.log("ok");
    if (count_img > 1) {
      count_img--;
      $(this).parent().remove();
      $('input[name^=nums]').filter(function(sindex){ 
        $(this).attr('name','nums['+sindex+']') 
      });
      $('input[name^=img]').filter(function(sindex){ 
        $(this).attr('name','img['+sindex+']') 
      });
    }
  });
  $(document).on("click", ".a", function() {
    $('input[name^=nums]').filter(function(sindex){ 
      $(this).attr('name','nums['+sindex+']') 
    });
    $('input[name^=img]').filter(function(sindex){ 
      $(this).attr('name','img['+sindex+']') 
    });
  });
  $('input[name^=img]').change(function(e){
    var file = e.target.files[0];
    var reader = new FileReader();
 
    if(file.type.indexOf("image") < 0){
      alert("画像ファイルを指定してください。");
      return false;
    }
 
    reader.onload = (function(file){
      console.log(`#img[${count_img}]`)
      return function(e){
        $(`#img[${count_img}]`).attr("src", e.target.result);
        $(`#img[${count_img}]`).attr("title", file.name);
      };
    })(file);
    reader.readAsDataURL(file);
 
  });
  $(".select").on("click" , function() {
    
    $(this).parent(".select-box").toggleClass("open");
  });
  
  $(document).mouseup(function (e)
  {
      var container = $(".select-box");
      if (container.has(e.target).length === 0)
      {
          container.removeClass("open");
      }
  });
  
  
  $(".select").on("change" , function() {
    
    var selection = $(this).find("option:selected").text(),
        labelFor = $(this).attr("id"),
        label = $("[for='" + labelFor + "']");
      
    label.find(".label-desc").html(selection);
      
  });
});