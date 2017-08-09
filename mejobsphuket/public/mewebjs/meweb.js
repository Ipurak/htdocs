
// ##### [START] init #####
var base_url;
var mewebjs = (function(){

  return {
            init:function( options ){

              base_url = options.base_url;

              menu.init();//Menu
              main.init();//Main

              //init seeker
              $( '.btn-seeker' ).click(function(){

                seeker.init();

              });

              //jobsfeed
              jobsfeed.init();//Job posts

              //Close model by X button
              $( document ).on({
                click:function(){
                   mui.overlay('off');
                }
              },'.closemodel');

          }
        };

})();
// ##### [END] init #####

//##### [START] Menu #####
var menu = (function(){

  var init = function(){

    $('#menu-feed').click(function(){
      $('.content').hide();
      $('#jobs').show();
    });
    $('#menu-jobs').click(function(){
      $('.content').hide();
      $('#jobs').show();
    });
    $('#menu-post').click(function(){
      $('.content').hide();
      $('#post').show();
      postJob.init();
    });
  }

  return {init:init}

})();
// ##### [END] Menu #####

// ##### [START] Main
var main = (function(){

  var init = function(){

    $('input[maxlength]').keyup(function(){
      var maxlength = $(this).attr("maxlength");
      var str     	= $(this).val();
      var parent		= $(this).parent();
      $('span',parent).remove("span");
      parent.append("<span>"+str.length+"/"+maxlength+"</span>");
    });
  }

  return {init:init}

})();
// ##### [END] Main #####

// ##### [START] Post Job App
var postJob = (function(){

  var data = {icon:"",title:"",desc:"",email:"",name:"",pass:"",pass2:""};
  var init = function(){

    $('#icon > li').click(function(){

      $('#preview-icon').html('<i class="fa '+$(this).attr("value")+'" style="font-size:50px;"></i>');
      data.icon = $(this).attr("idicon");

    });
    $('#submit-job').click(function(){

      data["title"] = $('input[name=title]').val() ;
      data["desc"]  = $('textarea[name=desc]').val() ;
      data["email"] = $('input[name=email]').val() ;
      data["name"]  = $('input[name=name]').val() ;
      data["pass"]  = btoa($('input[name=pass]').val()) ;
      data["pass2"] = btoa($('input[name=pass2]').val()) ;

      var GetAjax = ajax(data);
          GetAjax.always(function(data){
            console.log(data);
          }).fail(function(data){
            console.log("error")
          });
    });
  };
  var ajax = function(data){

    return $.ajax({
      url : '<?=site_url("postjob");?>',
      type: 'POST',
      data: data
    })

  };
  return {init:init};

})()
// ##### [END] Post Job App

// ##### [START] jobsfeed app
var jobsfeed = (function(){

  var data = {
    typ:"get"
  }

  var init = function(){
    var GetAjax = ajax();
  };

  var ajax = function(){
    var data = {"Test":"AAAA"};
    return $.ajax({
      url : base_url+'jobsfeed',
      type: 'POST',
      data: data
    })

  }

  return {init:init};

})();
// ##### [END] jobsfeed app

// ##### [START] Seeker App
var seeker = (function() {

  var _temp = {};

  var init = function(){

  var str = '<div style="text-align: center;display: inline-flex;">'+
                '<div>'+
                  '<button class="mui-btn mui-btn--large mui-btn--primary mui-btn--fab" onclick="seeker.signin()">'+
                    '<i class="fa fa-sign-in"></i>'+
                  '</button>'+
                  '<div>มีประกาศแล้ว</div>'+
                '</div>'+
                '<div>'+
                '<span style="padding:5px;line-height:90px;"> หรือ </span>'+
                '</div>'+
                '<div>'+
                  '<button class="mui-btn mui-btn--large mui-btn--primary mui-btn--fab">'+
                  '<i class="fa fa-user-plus"></i>'+
                  '</button>'+
                  '<div>ยังไม่มีประกาศ</div>'+
                '</div>'+
              '</div>';

  var div = $('<div>')
            .append(str)
            .css({"width":"195px","height":"auto","margin":"50px auto","backgroundColor":"#fff","padding":"10px"});
   // show modal
   mui.overlay('on', div[0]);

 }

 var signin = function(){

   var submit_btn = $('<button type="button">เข้าสู่ระบบ</button>').click(dosignin);
   var str = 'เข้าสู่การประกาศของคุณ  </br>'+
             'Email: <input type="email" value="hihigolgol@hotmail.com"></br>'+
             'Password: <input type="password" value="MTIzNA=="></br>'+
             '</br>';
   var div = $('<div id="signin-form">')
              .append(str,submit_btn)
              .css({"width":"195px","height":"auto","margin":"50px auto","backgroundColor":"#fff","padding":"10px"});
   mui.overlay('on', div[0]);

 };

 var mepost = function(data){

   //$('.content').hide();
   var template = $('#mepost-modal').clone();
   var el = $('#mepost',template);
    $.each(data,function(name,value){
      $('input[name='+name+']',el).val(value);
      $('textarea[name='+name+']',el).val(value);
    });

    $('button[name=status]',el);
    if(!data.status){
      $('button[name=status]',el).attr("disabled","").html('<i class="fa fa-repeat fa-spin" aria-hidden="true"></i> ปั้มโพสได้อีก '+(data.nexttime).split(" ")[1]).attr("disabled","");
    }

    var div = $('<div>').append(el).css({"width":"80%","height":"auto","margin":"50px auto","backgroundColor":"#fff","padding":"10px"});
        mui.overlay('on', div[0]);
    pumppost(el);
    updateinfo(el);
    updateview(el);
    updatedesc(el);

 };

 var pumppost = function(el){

   var el = $('.pumppost',el).click(function(){
     var request = $.ajax({
        url: base_url+"pumppost",
        type: "POST",
        dataType:"json",
        data:{"id":_temp.job_id},
        success:function(data){
          $(el).html('<i class="fa fa-repeat fa-spin" aria-hidden="true"></i> ปั้มโพสได้อีก '+(data.nexttime).split(" ")[1]).attr("disabled","");
        },
        error:function(data){
          alert("Error!");
        }
      });
   });
 };

 var updateinfo = function(el){

   var btn = $('#updateinfo',el).click(function(){

     var data = {
       "title":$('input[name=title]',el).val(),
       "company":$('input[name=company]',el).val(),
       "name":$('input[name=name]',el).val(),
       "email":$('input[name=email]',el).val(),
       "id":_temp.job_id
     };

     var request = $.ajax({

        url: base_url+"jobinfo/updateinfo",
        type: "POST",
        dataType:"json",
        data:data,
        success:function(data){

          $(btn).after($('<span>').html(" แก้ไขสำเร็จ").fadeOut(2000));

        },
        error:function(data){

          $(btn).after($('<span>').html(" การแก้ไขมีปัญหา").fadeOut(2000));

        }

      });
   });

 };

 var updateview = function(el){

   var btn = $('#list-status-view > li',el).click(function(){

     var data = {
       "status":$(this).val(),
       "id":_temp.job_id
     };

     var request = $.ajax({

        url: base_url+"jobinfo/updateview",
        type: "POST",
        dataType:"json",
        data:data,
        success:function(data){

          //$(btn).after($('<span>').html(" แก้ไขสำเร็จ").fadeOut(2000));

        },
        error:function(data){

          //$(btn).after($('<span>').html(" การแก้ไขมีปัญหา").fadeOut(2000));

        }
      });

    });
 };

 var updatedesc = function(el){

   var btn = $('#btn-update-desc',el).click(function(){

     var data = {
       "desc":$('textarea[name="description"]',el).val(),
       "id":_temp.job_id
     };

     var request = $.ajax({

        url: base_url+"jobinfo/updatedesc",
        type: "POST",
        dataType:"json",
        data:data,
        success:function(data){

          //$(btn).after($('<span>').html(" แก้ไขสำเร็จ").fadeOut(2000));

        },
        error:function(data){

          //$(btn).after($('<span>').html(" การแก้ไขมีปัญหา").fadeOut(2000));

        }
      });

   });
 };

 var dosignin = function(){

   var request = $.ajax({

      url: base_url+"signin",
      type: "POST",
      dataType:"json",
      data: {
       'email':$('input[type=email]','#signin-form').val(),
       'pass':$('input[type=password]','#signin-form').val()
      },
      success:function(data){

        if(data != null){
          _temp = data
          var div = $('<div>')
                    .append("Success!!!")
                    .css({"width":"195px","height":"auto","margin":"50px auto","backgroundColor":"#fff","padding":"10px"});
            mui.overlay('on', div[0]);
            mepost(data);
        }else{
          var div = $('<div>')
                    .append("Null!!!")
                    .css({"width":"195px","height":"auto","margin":"50px auto","backgroundColor":"#fff","padding":"10px"});
            mui.overlay('on', div[0]);
        }

      },
      error:function(data){

          var div = $('<div>')
                    .append("Error!!!")
                    .css({"width":"195px","height":"auto","margin":"50px auto","backgroundColor":"#fff","padding":"10px"});
            mui.overlay('on', div[0]);

      }
    });

 };

// var model_Default = function(){
//   // var template =
//
// };

return {init:init,signin:signin}

})();
// ##### [END] Seeker App
