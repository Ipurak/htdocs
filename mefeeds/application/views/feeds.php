<?php
  $logged = $this->session->has_userdata('logged_in');
?>
<!DOCTYPE html>
<html>
<head>
<meta Content-type: "application/json"; charset="utf-8" >
<meta name="description" content="Vue.js - The Progressive JavaScript Framework">
<!-- <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"> -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Me Feeds</title>
<script src="https://unpkg.com/babel-standalone@6/babel.min.js"></script>
  <link rel="stylesheet" href="<?=site_url("public/font-awesome-4.7.0/css/font-awesome.min.css");?>" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="<?=site_url("public/animate/animate.css");?>" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="<?=site_url("public/bulma/css/bulma.css");?>" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="<?=site_url("public/css/mefeeds.css");?>" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="<?=site_url("public/sweetalert2/dist/sweetalert2.min.css");?>" rel="stylesheet" type="text/css">
</head>
<body>
  <nav class="navbar is-transparent main-menu">

    <div class="tabs is-fullwidth me-width-100-per">
      <ul>
        <li>
          <a>
            <span class="icon"><i class="fa fa-briefcase"></i></span>
            <span>งาน</span>
          </a>
        </li>
        <li>
          <a>
            <strong>Me Feed Phuket</strong>
          </a>
        </li>
        <li>
          <a>
            <span>พนักงาน</span>
            <span class="icon"><i class="fa fa-user"></i></span>
          </a>
        </li>
      </ul>
    </div>

  </nav><!-- Menu -->

  <section class="hero me-section is-medium" id="top-banner">
    <div class="hero-body">
      <div class="container">
        <div class="columns is-vcentered">
        <div class="column">
          <p class="title">
            #MeJobPhuket 
          </p>
          <p class="subtitle">
            มีงานภูเก็ต
          </p>
        </div>

        <div class="column is-narrow">
          <div class="box">
            <div class="field has-addons">
              <div class="control">
                <input class="input" type="text" placeholder="ค้นหาแท็กที่ท่านสนใจ">
              </div>
              <div class="control">
                <a class="button is-info">
                  <i class="fa fa-search"></i>
                </a>
              </div>
            </div>
          </div>
        </div>

      </div>
      </div>
    </div>
    <div class="hero-foot">
    <div class="container">
      <nav class="tabs is-boxed">
        <ul>
          <li  class="is-active">
            <a><strong>#ภูเก็ตพัฒนาเมือง</strong></a>
          </li>
          <li>
            <a><strong>#เซงโห้ว</strong></a>
          </li>
          <li>
            <a><strong>#CentalPhuket</strong></a>
          </li>
          <li>
            <a><strong>#BakkokHospital</strong></a>
          </li>
          <li>
            <a><strong>#Sednasystem</strong></a>
          </li>
          <li>
            <a><strong>#Connection</strong></a>
          </li>
          <li>
            <a><strong>#Sipanva</strong></a>
          </li>
        </ul>
      </nav></div>
    </div>
  </section>

  <nav class="navbar has-shadow" style="margin-bottom: 20px;">
  <div class="container">
    <div class="navbar-tabs">
      <a class="navbar-item is-tab ">
        <strong>#เมืองภูเก็ต</strong>
      </a>
      <a class="navbar-item is-tab ">
        <strong>#พนักงานบัญชี</strong>
      </a>
      <a class="navbar-item is-tab ">
        <strong>#ถลาง</strong>
      </a>
      <a class="navbar-item is-tab ">
        <strong>#กระทู้</strong>
      </a>
      <a class="navbar-item is-tab ">
        <strong>#กุ๊กชาย</strong>
      </a>
      <a class="navbar-item is-tab is-active">
        <strong>#เงินเดือน15000</strong>
      </a>
      <a class="navbar-item is-tab ">
        <strong>#แคชเชียร์</strong>
      </a>
    </div>
  </div>
</nav>
  <!-- Section -->

  <div class="container">
    <div class="columns is-centered">
      <!-- <div class="column is-two-fifths"> -->
      <div class="me-post-card">
            <div class="box">

              
                <?php
                  if ( $logged ){
                    echo '<div id="logout"><logout></logout></div>';
                  }
                  // $this->session->sess_destroy();
                ?>
                <!-- Logout -->
              

              
                <?php
                  if ( $logged ){
                    echo '<div class="field" id="writefeed"><writefeed></writefeed></div>';
                  }
                ?>
                <!-- Write Feed -->
              

              
                <?php
                  if ( $logged != 1 ){
                    echo '<div id="login"><login></login></div>';
                  }
                 ?>
                <!-- Login -->
              

            </div>

            <div id="feeds">
              <div class="box" v-for="feed in feeds">

                <!-- <div class="card">   -->

                  <header class="card-header">
                    <p class="card-header-title">
                        <span class="tag is-danger">
                          <span class="icon"><i class="fa fa-bell-o"></i></span>
                          ด่วนมาก
                        </span>
                    </p>
                    <a class="button card-header-icon me-margin-top-5px me-margin-right-5px">
                      รายงาน
                       <span class="icon is-clearfix">
                        <i class="fa fa-exclamation"></i>
                      </span>
                    </a>
                  </header>

                  <div class="card-image" v-if="feed.image !== ''">
                    <figure class="image">
                      <!-- <img src="http://bulma.io/images/placeholders/1280x960.png" alt="Image"> -->
                      <img v-bind:src="'./public/images/'+feed.image" @click="openPostImage" alt="Image">
                    </figure>
                  </div>
                  <div class="card-content">
                    <div class="media">
                      <div class="media-left">
                        <figure class="image is-48x48">
                          <img src="http://bulma.io/images/placeholders/96x96.png" alt="Image">
                        </figure>
                      </div>
                      <div class="media-content">
                        <div class="media-content">
                          <p class="title is-6"><a v-bind:href="'./viewpost/post/'+feed.idpost" target="_blank">{{feed.title}}...คลิกดูเพิ่มเติม</a></p>
                          <p class="subtitle is-6">@{{feed.company}}</p>
                        </div>
                      </div>
                    </div>

                    <div class="content me-white-space-pre">
                      <p v-html="hastag(feed.desc)"></p>
                      <br>
                      <small class="dateformat">{{ feed.postdateauto | moment }}</small>
                    </div>
                  </div>
              </div>

              <!-- <div class="modal" v-bind:class="{'is-active': imageModalActive}"  @click="closePostImage">
                <div class="modal-background"></div>
                <div class="modal-content">
                  <p class="image is-1by1">
                    <img ref="image" src="https://bulma.io/images/placeholders/1280x960.png" alt="">
                  </p>
                </div>
                <button class="modal-close is-large" aria-label="close"></button>
              </div> -->

              <div class="modal me-z-index-9999" v-bind:class="{'is-active': imageModalActive}"  @click="closePostImage">
                <div class="modal-background me-gray-background"></div>
                <div class="modal-content">
                  <div>
                    <div class="image">
                      <img ref="image" src="https://bulma.io/images/placeholders/1280x960.png" alt="">
                    </div>
                  </div>
                </di>
                <button class="modal-close is-large me-gray2-background" aria-label="close"></button>
              </div>



            </div><!-- Feeds -->

          <!-- </div> -->
      </div>
    </div>
  </div><!-- Main -->


  <div class="me-footerButtons">
    <div id="gotop">
        <i class="fa fa-chevron-up"></i>
    </div>
     <br>
  </div>

</body>
<script>
  
</script>

<script src="<?=site_url("public/jquery/dist/jquery.min.js");?>"></script>
<script src="<?=site_url("public/vue/dist/vue.js");?>"></script>
<script src="<?=site_url("public/axios/dist/axios.min.js");?>"></script>
<script src="<?=site_url("public/moment/moment-with-locales.js");?>"></script>
<script src="<?=site_url("public/js/mefeeds.js");?>"></script>
<script src="<?=site_url("public/sweetalert2/dist/sweetalert2.min.js");?>"></script>
<script src="<?=site_url("public/dropzone/dropzone.js");?>"></script>
<script src="<?=site_url("public/exif/exif.js");?>"></script>

<script src="<?=site_url("public/JavaScript-Load-Image-master/js/load-image.js");?>"></script>
<script src="<?=site_url("public/JavaScript-Load-Image-master/js/load-image-orientation.js");?>"></script>
<script src="<?=site_url("public/JavaScript-Load-Image-master/js/load-image-meta.js");?>"></script>
<script src="<?=site_url("public/JavaScript-Load-Image-master/js/load-image-exif.js");?>"></script>

<script type="text/javascript">
  var gotop = document.getElementById("gotop")
  gotop.style.display = "none"
  gotop.addEventListener('click', function(){
    var scrollDuration = 1000
    var scrollStep = -window.scrollY / (scrollDuration / 15),
        scrollInterval = setInterval(function(){
        if ( window.scrollY != 0 ) {
            window.scrollBy( 0, scrollStep );
        }
        else clearInterval(scrollInterval); 
    },15);
  })

  window.addEventListener('scroll', function(e) {
    var scrollY = window.scrollY
    if( scrollY > 1000 ){
      gotop.style.display = "block"
    }else{
      gotop.style.display = "none"
    }
  })

</script>

<script src="https://unpkg.com/vue-multiselect@2.0.0"></script>
<link rel="stylesheet" href="https://unpkg.com/vue-multiselect@2.0.0/dist/vue-multiselect.min.css">
</html>
