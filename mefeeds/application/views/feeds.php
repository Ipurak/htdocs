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
</head>
<body>
  <nav class="navbar is-info main-menu">
  <div class="navbar-brand">
    <a class="navbar-item" href="https://bulma.io">
      
        <img src="https://bulma.io/images/bulma-logo-white.png" alt="Bulma: a modern CSS framework based on Flexbox" width="112" height="28">
      
    </a>
    <div class="navbar-burger burger" data-target="navMenuColorlink-example">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>

  <div id="navMenuColorlink-example" class="navbar-menu">
    <div class="navbar-start">
      <a class="navbar-item" href="#">
        ติดต่อโฆษณา&nbsp<strong>VIP&nbsp<i class="fa fa-diamond"></i></strong>
      </a>
      <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link" href="/documentation/overview/start/">
          <i class="fa fa-question-circle-o">&nbsp</i> การใช้งาน
        </a>
        <div class="navbar-dropdown">
          <a class="navbar-item" href="/documentation/overview/start/">
            Overview
          </a>
          <a class="navbar-item" href="https://bulma.io/documentation/modifiers/syntax/">
            Modifiers
          </a>
          <a class="navbar-item" href="https://bulma.io/documentation/columns/basics/">
            Columns
          </a>
          <a class="navbar-item" href="https://bulma.io/documentation/layout/container/">
            Layout
          </a>
          <a class="navbar-item" href="https://bulma.io/documentation/form/general/">
            Form
          </a>
          <hr class="navbar-divider">
          <a class="navbar-item" href="https://bulma.io/documentation/elements/box/">
            Elements
          </a>
          <a class="navbar-item is-active" href="https://bulma.io/documentation/components/breadcrumb/">
            Components
          </a>
        </div>
      </div>
    </div>

</nav><!-- Menu -->

  <section class="hero me-section is-medium" id="top-banner">
    <div class="hero-body">
      <div class="container">
        <div class="columns is-vcentered">
        <div class="column">
          <p class="title">
            MeJobPhuket
          </p>
          <p class="subtitle">
            <div class="tags">
              <div class="tag is-info">สถานที่:</div>&nbsp
              <a class="tag is-primary">#เมืองภูเก็ต</a>
              <a class="tag is-primary">#กระทู้</a>
              <a class="tag is-primary">#ถลาง</a>
              <div class="tag is-info">แท็กยอดนิยม:</div>&nbsp
              <a class="tag">#โปรแกรมเมอร์</a>
              <a class="tag is-white">#ช่างเชื่อม</a>
              <a class="tag is-white">#ถลาง</a>
              <a class="tag is-white">#พนักงานขับรถ</a>
              <a class="tag is-white">#แคชเชียร์</a>
              <a class="tag is-white">#ถลาง</a>
              <a class="tag is-white">#แม่บ้าน</a>
              <a class="tag is-white">#โปรแกรมเมอร์</a>
              <a class="tag is-white">#ช่างเสริมสวย</a>
            </div>
          </p>
        </div>

        <div class="column is-narrow">
          <div class="box">
            <div id="carbonads">
              <span>
                <span class="carbon-wrap">
                  <a href="http://footballtabl.es/" class="carbon-img" target="_blank" rel="noopener">
                    <img src="//fallbacks.carbonads.com/nosvn/fallbacks/ee60df160da9698be82293f861214209.png" alt="" border="0" height="100" width="130" style="max-width: 130px;">
                  </a>
                  <a href="http://footballtabl.es/" class="carbon-text" target="_blank" rel="noopener">
                    <!-- footballtabl.es is your free and mobile-friendly home for all football tables ⚽️ -->
                  </a>
                </span>
              </span>
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
                  }else{
                    echo '<div id="logout"></div>';
                  }
                  // $this->session->sess_destroy();
                ?>
                <!-- Logout -->
              

              
                <?php
                  if ( $logged ){
                    echo '<div class="field" id="writefeed"><writefeed></writefeed></div>';
                  }else{
                    echo '<div id="writefeed"></div>';
                  }
                ?>
                <!-- Write Feed -->
              

              
                <?php
                  if ( !$logged ){
                    echo '<div id="login"><login></login></div>';
                  }else{
                    echo '<div id="login"></div>';
                  }
                 ?>
                <!-- Login -->
              

            </div>

            <div id="feeds">
              
              <div class="field has-addons search-post">
                <div class="me-width-100-per">
                  <div class="control has-icons-right">
                    <input class="input" v-model="searchValue" @keyup.enter="search" @keyup="autoHastag" type="text" placeholder="ค้นหาแท็กที่ท่านสนใจ">
                    <span class="icon is-small is-right"  @click="clearSearch">
                      <i class="fa fa-times-circle-o me-pointer-events-all" v-bind:class="{' me-color-success': cancelActive}"></i>
                    </span>
                  </div>
                </div>
                <div class="control">
                  <a class="button is-link" @click="search">
                    <i class="fa fa-search"></i>
                  </a>
                </div>

                <div class="dropdown-menu autoHastag" v-bind:class="{'me-show':autoHastagActive}" role="menu">
                  <div class="dropdown-content">
                    <a class="dropdown-item" v-if="Object.keys(autoSearchList).length === 0">
                      <i class="fa fa-meh-o"></i> ยังไม่มีแท็กนี้ในระบบ
                    </a>
                    <a class="dropdown-item" v-for="tag in autoSearchList"  @click="search(tag.name)">
                      #{{ tag.name }}
                    </a>
                  </div>
                </div>

              </div>

              <div class="box" v-for="feed in feeds">

                <div class="me-post-status"
                     v-bind:class="{'is-hidden': feed.isNew = 0, 'me-post-new-with-other': feed.status != 0, '': feed.status == 0}">
                  <b><i class="fa fa-bullhorn"></i> มาใหม่</b>
                </div>

                <div class="me-post-status me-post-urgent"
                     v-bind:class="{'is-hidden': feed.status != 1}">
                  <b><i class="fa fa-bell-o"></i> ด่วนมาก!</b>
                </div>

                <div class="me-post-status me-post-closed"
                     v-bind:class="{'is-hidden': feed.status != -1}">
                  <b>ปิดรับสมัคร</b>
                </div>
                
                <div> 

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

                  <div class="card-image" v-bind:class="{'me-opacity-0-2': feed.status == -1 }" v-if="feed.image !== ''&& feed.image !== null">
                    <figure class="image">
                      <!-- <img src="http://bulma.io/images/placeholders/1280x960.png" alt="Image"> -->
                      <img v-bind:src="'./public/images/'+feed.image" @click="openPostImage" alt="Image">
                    </figure>
                  </div>
                  <div class="card-content" v-bind:class="{'me-opacity-0-2': feed.status == -1 }">
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
              </div>

              <div class="me-text-center" v-bind:class="{'is-active':isFeedLoading,'is-hidden':!isFeedLoading}">
                <i class="fa fa-circle-o-notch fa-spin fa-2x"></i>
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
<script src="<?=site_url("public/dropzone/dropzone.js");?>"></script>
<script src="<?=site_url("public/exif/exif.js");?>"></script>

<script src="<?=site_url("public/JavaScript-Load-Image-master/js/load-image.js");?>"></script>
<script src="<?=site_url("public/JavaScript-Load-Image-master/js/load-image-orientation.js");?>"></script>
<script src="<?=site_url("public/JavaScript-Load-Image-master/js/load-image-meta.js");?>"></script>
<script src="<?=site_url("public/JavaScript-Load-Image-master/js/load-image-exif.js");?>"></script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

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
