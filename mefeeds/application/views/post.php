<?php $logged = $this->session->has_userdata('logged_in'); ?>

<?php $this->load->view('layout/start-html'); ?>

<?php $this->load->view('layout/start-head'); ?>

  <meta property="og:url" content="<?=base_url(uri_string())?>" />
  <meta property="og:type" content="website" />
  <meta property="og:title" content="<?=$post[0]->title?>" />
  <meta property="og:description" content="<?=$post[0]->desc?>" />
  <meta property="og:image" content="http://bulma.io/images/placeholders/1280x960.png" />

  <style type="text/css">
      
    #feeds{
      margin-top: 60px;
    }

    .cover-company{
      background-image: url("https://i.ytimg.com/vi/Ukqyf1jWNLo/maxresdefault.jpg");
    }

    .company-name{
      color: #fff;
    }

    .title-post-nav{
      background-color: #fff;
      opacity: 0.85;
    }

    .title-post-nav ul li a{
      color: #3273dc;
    }

  </style>

<?php $this->load->view('layout/end-head'); ?>

<body>

<?php $this->load->view('layout/nav-menu'); ?>

  <section class="hero cover-company is-medium" id="top-banner">
    <div class="hero-body">
      <div class="container">
        <div class="columns is-vcentered">
        <div class="column">
          <p class="title company-name">
            <?=$post[0]->company?>
          </p>
        </div>
      </div>
      </div>
    </div>
    <div class="hero-foot">
    <div class="container">
      <nav class="tabs is-boxed title-post-nav">
        <ul>
          <li>
            <a><strong>แม่บ้าน</strong></a>
          </li>
          <li>
            <a><strong>นักบัญชี</strong></a>
          </li>
          <li>
            <a><strong>โปรแกรมเมอร์</strong></a>
          </li>
          <li>
            <a><strong>พนักงานขับรถ</strong></a>
          </li>
          <li>
            <a><strong>ช่าง้ชื่อม</strong></a>
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

  <div class="container">
    <div class="tile is-ancestor">
      <div class="tile is-3">

        <div class="tile">

          <!-- <div class="tile is-parent is-vertical">

            <div class="tile is-child box">
              <article class="tile is-child notification is-warning">
                <p class="title">...tiles</p>
                <p class="subtitle">Bottom tile</p>
              </article>
              <article class="tile is-child notification is-warning">
                <p class="title">...tiles</p>
                <p class="subtitle">Bottom tile</p>
              </article>
              <article class="tile is-child notification is-warning">
                <p class="title">...tiles</p>
                <p class="subtitle">Bottom tile</p>
              </article>
              <article class="tile is-child notification is-warning">
                <p class="title">...tiles</p>
                <p class="subtitle">Bottom tile</p>
              </article>
            </div>

          </div> -->

        </div>

      </div>
      <div class="tile is-5">
        <div class="tile">
          <div class="tile is-parent is-vertical">

            <div id="feeds">
              <div class="tile is-child box" v-for="feed in feeds">

                <div class="card">
                  
                  <?php

                    if( $post[0]->image != "" ){
                      echo '<div class="card-image">'.
                        '<figure class="image">'.
                          '<img src="'.site_url("public/images/").$post[0]->image.'.png"  alt="Image">'.
                        '</figure>'.
                      '</div>';
                    }
                  ?>

                  <div class="card-content">
                    <div class="media">
                      <div class="media-left">
                        <figure class="image is-48x48">
                          <img src="<?=$post[0]->company?>" alt="Image">
                        </figure>
                      </div>
                      <div class="media-content">
                        <div class="media-content">
                          <p class="title is-6"><a href="#"><?=$post[0]->title?></a></p>
                          <p class="subtitle is-6">@<?=$post[0]->company?></p>
                        </div>
                      </div>
                    </div>

                    <div class="content me-white-space-pre">
                      <?=$post[0]->desc?>
                      <br>
                      <small class="dateformat"><?=$post[0]->dateauto ?></small>
                    </div>
                  </div>

                  <!--##### [START] Facebook Shere Button #####-->

                  <div id="fb-root"></div>
                  <script>(function(d, s, id) {

                    var js, fjs = d.getElementsByTagName(s)[0];
                    if (d.getElementById(id)) return;
                    js = d.createElement(s); js.id = id;
                    js.src = 'https://connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v2.11';
                    fjs.parentNode.insertBefore(js, fjs);

                    }(document, 'script', 'facebook-jssdk'));

                  </script>

                  <div class="fb-share-button" data-href="<?=base_url(uri_string())?>" data-layout="button_count" data-size="small" data-mobile-iframe="true">
                    <a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse">แชร์</a>
                  </div>

                <!-- ##### [END] Facebook Shere Button ##### -->

                  <div class="line-it-button" data-lang="en" data-type="share-a" data-url="<?=base_url(uri_string())?>" style="display: none;"></div>
                  <script src="https://d.line-scdn.net/r/web/social-plugin/js/thirdparty/loader.min.js" async="async" defer="defer"></script>

                <!-- ##### [START] LINE Shere Button ##### -->



                <!-- ##### [END] LINE Shere Button ##### -->

                <!-- ##### [START] Facebook Comment ##### -->
                <div id="fb-root"></div>
                <script>
                  (function(d, s, id) {
                    var js, fjs = d.getElementsByTagName(s)[0];
                    if (d.getElementById(id)) return;
                    js = d.createElement(s); js.id = id;
                    js.src = 'https://connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v2.11';
                    fjs.parentNode.insertBefore(js, fjs);
                  }(document, 'script', 'facebook-jssdk'));
                </script>
                <div class="fb-comments" data-href="https://developers.facebook.com/docs/plugins/comments#configurator" data-numposts="5"></div>
                <!-- ##### [END] Facebook Comment ##### -->

                </div>

              </div>

            </div><!-- Feeds -->

          </div>
        </div>
      </div>
      <div class="tile is-3">

        <!-- <div class="tiles is-parent is-vertical">

          <div class="tile is-child box">
            <article class="tile is-child notification is-info">
              <p class="title">...tiles</p>
              <p class="subtitle">Bottom tile</p>
            </article>
            <article class="tile is-child notification is-info">
              <p class="title">...tiles</p>
              <p class="subtitle">Bottom tile</p>
            </article>
            <article class="tile is-child notification is-info">
              <p class="title">...tiles</p>
              <p class="subtitle">Bottom tile</p>
            </article>
            <article class="tile is-child notification is-info">
              <p class="title">...tiles</p>
              <p class="subtitle">Bottom tile</p>
            </article>
            <article class="tile is-child notification is-info">
              <p class="title">...tiles</p>
              <p class="subtitle">Bottom tile</p>
            </article>
          </div>

        </div> -->

      </div>
    </div>
 </div>
 <footer class="footer">
  <div class="container">
    <div class="content has-text-centered">
      <p>
        สงวนลิขสิทธิ์
      </p>
    </div>
  </div>
</footer>
</body>
</html>
