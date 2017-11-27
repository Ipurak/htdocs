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
  <link rel="stylesheet" href="<?=site_url("public/animate/animate.css");?>" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="<?=site_url("public/bulma/css/bulma.css");?>" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="<?=site_url("public/css/mefeeds.css");?>" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="<?=site_url("public/sweetalert2/dist/sweetalert2.min.css");?>" rel="stylesheet" type="text/css">

  <style type="text/css">
      
    #feeds{
      margin-top: 60px;
    }

  </style>

</head>
<body>

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
                  <div class="card-image">
                    <figure class="image is-4by3">
                      <img src="http://bulma.io/images/placeholders/1280x960.png" alt="Image">
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
