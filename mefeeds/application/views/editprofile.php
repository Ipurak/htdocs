<?php
  $logged = $this->session->has_userdata('logged_in');
?>
<!DOCTYPE html>
<html>
<head>
<meta Content-type: "application/json"; charset="utf-8" >
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Me Feeds</title>
  <link rel="stylesheet" href="<?=site_url("public/font-awesome-4.7.0/css/font-awesome.min.css");?>" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="<?=site_url("public/bulma/css/bulma.css");?>" rel="stylesheet" type="text/css">
</head>
<body>
  <div class="container">
    <div class="tile is-ancestor">

      <div class="tile is-3">
        <div class="tile">
          Left
        </div>
      </div>

      <div class="tile is-5">
        <div class="tile">
          <div class="tile is-parent is-vertical">

            <div class="box" id="editprofile">

              <!-- <article class="tile is-child notification is-primary"> -->
                <p class="subtitle">การตั้งค่าบัญชีผู้ใช้ทั่วไป</p>
              <!-- </article> -->

              <div class="field">
                <label class="label">ชื่อสถานประกอบการ</label>
                <div class="control">
                  <input class="input" type="company" name="company">
                </div>
              </div>

              <div class="field">
                <label class="label">ชื่อ - นามสกุล</label>
                <div class="control">
                  <input class="input" type="name" name="name">
                </div>
              </div>

              <div class="field">
                <label class="label">อีเมล</label>
                <div class="control">
                  <input class="input" type="email" email="email">
                </div>
              </div>

              <nav class="level">
                <div class="level-left">
                  <div class="level-item">
                    <a class="button is-info">
                      <i class="fa fa-lock" aria-hidden="true"></i>&nbsp;แก้ไขรหัสผ่าน&nbsp;
                    </a>
                  </div>
                </div> 
                <div class="level-right">
                  <div class="level-item">
                    <a class="button is-info"><i class="fa fa-check-circle"></i>&nbsp;ยืนยันการแก้ไข</a>
                  </div>
                </div>
              </nav>

            </div>

          </div>
        </div>
      </div>

      <div class="tile is-3">
        <div class="tile is-parent is-vertical">
          Right
        </div>
      </div>

    </div>
 </div>
</body>

<script src="<?=site_url("public/vue/dist/vue.js");?>"></script>
<script src="<?=site_url("public/axios/dist/axios.min.js");?>"></script>
<script type="text/javascript">
  var app = new Vue({
    el: '#editprofile',
    data: {
      message: 'Hello Vue!'
    },
    created: function(){

      

    },
    methods: {

      save:function(){


      }
      
    }
  })
</script>
</html>
