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

    <div class="navbar-end">
      <div class="navbar-item">
        <div class="field is-grouped">
          <p class="control">
            <a class="bd-tw-button button" data-social-network="Twitter" data-social-action="tweet" data-social-target="http://localhost:4000" target="_blank" href="https://twitter.com/intent/tweet?text=Bulma: a modern CSS framework based on Flexbox&amp;hashtags=bulmaio&amp;url=http://localhost:4000&amp;via=jgthms">
              <span class="icon">
                <svg class="svg-inline--fa fa-twitter fa-w-16" aria-hidden="true" data-fa-processed="" data-prefix="fab" data-icon="twitter" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z"></path></svg><!-- <i class="fab fa-twitter"></i> -->
              </span>
              <span>
                Tweet
              </span>
            </a>
          </p>
          <p class="control">
            <a class="button is-primary" href="https://github.com/jgthms/bulma/archive/0.5.1.zip">
              <span class="icon">
                <svg class="svg-inline--fa fa-download fa-w-16" aria-hidden="true" data-fa-processed="" data-prefix="fas" data-icon="download" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M216 0h80c13.3 0 24 10.7 24 24v168h87.7c17.8 0 26.7 21.5 14.1 34.1L269.7 378.3c-7.5 7.5-19.8 7.5-27.3 0L90.1 226.1c-12.6-12.6-3.7-34.1 14.1-34.1H192V24c0-13.3 10.7-24 24-24zm296 376v112c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24V376c0-13.3 10.7-24 24-24h146.7l49 49c20.1 20.1 52.5 20.1 72.6 0l49-49H488c13.3 0 24 10.7 24 24zm-124 88c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20zm64 0c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20z"></path></svg><!-- <i class="fas fa-download"></i> -->
              </span>
              <span>Download</span>
            </a>
          </p>
        </div>
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
            #MeJobPhuket 
          </p>
          <p class="subtitle">
            มีงานภูเก็ต
          </p>
        </div>

        <div class="column is-narrow">
          <div class="box">
            aaaaaaa
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
              
              <div class="field has-addons search-post">
                <div class="control">
                  <input class="input" v-model="searchValue" type="text" placeholder="ค้นหาแท็กที่ท่านสนใจ">
                </div>
                <div class="control">
                  <a class="button is-link" @click="search">
                    <i class="fa fa-search"></i>
                  </a>
                </div>
              </div>

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

                  <div class="card-image" v-if="feed.image !== ''&& feed.image !== null">
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
