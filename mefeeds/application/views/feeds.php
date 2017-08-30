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
</head>
<body>

  <nav class="navbar is-transparent main-menu">

    <div class="columns is-mobile is-desktop" style="width: 100%;">
      <div class="column is-one-third" style="text-align: left;">
        <a class="navbar-item is-left" href="#" style="white-space: nowrap;">
            <span class="bd-emoji">👨‍👩‍👧‍👦 &nbsp&nbsp</span>
            <span style="font-size: smaller;">หาคน</span>
        </a>
      </div>
      <div class="column">
        <a class="navbar-item" href="#" style="white-space: nowrap;">
          <!-- <img src="http://bulma.io/images/bulma-logo.png" alt="Bulma: a modern CSS framework based on Flexbox" width="112" height="28"> -->
          <b style="margin: 0 auto;">PhuketFeed</b>
        </a>
      </div>
      <div class="column">
        <a class="navbar-item is-right" href="#" style="white-space: nowrap;">
          <span style="font-size: smaller;">หางาน</span>
          <span class="bd-emoji">💼&nbsp&nbsp</span>
        </a>
      </div>
    </div>

  </nav>
  <!-- Nav -->
  <nav class="navbar is-transparent other-menu">
      <div class="navbar-brand">

            <a class="navbar-item" href="#" target="_blank">
              <span class="icon" style="color: #333;">
                🛒
              </span>
              ตลาดภูเก็ต
            </a>
            <a class="navbar-item" href="#" target="_blank">
              <span class="icon" style="color: #55acee;">
                🛏️
              </span>
              หอพักภูเก็ต
            </a>
            <a class="navbar-item" href="#" target="_blank">
              <span class="icon" style="color: #55acee;">
                🏡
              </span>
              อสังหา ภูเก็ต
            </a>
            <a class="navbar-item" href="#" target="_blank">
              <span class="icon" style="color: #55acee;">
                🚗
              </span>
              รถมือสอง ภูเก็ต
            </a>
            <a class="navbar-item" href="#" target="_blank">
              <span class="icon" style="color: #55acee;">
                🚘
              </span>
              รถเช่า ภูเก็ต
            </a>
            <a class="navbar-item" href="#" target="_blank">
              <span class="icon" style="color: #55acee;">
                🍜
              </span>
              ของกิน ภูเก็ต
            </a>
            <a class="navbar-item" href="#" target="_blank">
              <span class="icon" style="color: #55acee;">
                🗿
              </span>
              พระเครื่อง ภูเก็ต
            </a>
            <a class="navbar-item" href="#" target="_blank">
              <span class="icon" style="color: #55acee;">
                🗝️
              </span>
              ของเก่า ภูเก็ต
            </a>

      </div>
  </nav>
  <!-- Nav -->

  <section class="hero is-primary is-medium" style="margin-bottom: 20px;" id="top-banner">
    <div class="hero-body">
      <div class="container">
        <div class="columns is-vcentered">
        <div class="column">
          <p class="title">
            Documentation
          </p>
          <p class="subtitle">
            Everything you need to <strong>create a website</strong> with Bulma
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
  </section>
  <!-- Section -->

  <div class="container">
    <div class="tile is-ancestor">
      <div class="tile is-3">

        <div class="tile">

          <div class="tile is-parent is-vertical">

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

          </div>

        </div>

      </div>
      <div class="tile is-5">
        <div class="tile">
          <div class="tile is-parent is-vertical">

            <div class="box">

              <span id="login">
                <login></login>
                <!-- Login -->
              </span>

            </div>

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
                          <p class="title is-6"><a href="#">{{feed.title}}</a></p>
                          <p class="subtitle is-6">@{{feed.company}}</p>
                        </div>
                      </div>
                    </div>

                    <div class="content">
                      {{feed.desc}}
                      <br>
                      <small class="dateformat">{{ feed.postdateauto | moment }}</small>
                    </div>
                  </div>
                </div>

              </div>

            </div><!-- Feeds -->

          </div>
        </div>
      </div>
      <div class="tile is-3">

        <div class="tile is-parent is-vertical">

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

        </div>

      </div>
    </div>
 </div>

 <div class="modal" >
   <div class="modal-background"></div>
   <div class="modal-card">
     <header class="modal-card-head">
       <p class="modal-card-title">Modal title</p>
       <button class="delete" aria-label="close"></button>
     </header>
     <section class="modal-card-body">
       aaaaaaaaaaaaaaaaaaaaaaaaaaaaa<br>
       aaaaaaaaaaaaaaaaaaaaaaaaaaaaa<br>
       aaaaaaaaaaaaaaaaaaaaaaaaaaaaa<br>
       aaaaaaaaaaaaaaaaaaaaaaaaaaaaa<br>
       aaaaaaaaaaaaaaaaaaaaaaaaaaaaa<br>
       aaaaaaaaaaaaaaaaaaaaaaaaaaaaa<br>
       aaaaaaaaaaaaaaaaaaaaaaaaaaaaa<br>
       aaaaaaaaaaaaaaaaaaaaaaaaaaaaa<br>
       aaaaaaaaaaaaaaaaaaaaaaaaaaaaa<br>
       aaaaaaaaaaaaaaaaaaaaaaaaaaaaa<br>
       aaaaaaaaaaaaaaaaaaaaaaaaaaaaa<br>
       aaaaaaaaaaaaaaaaaaaaaaaaaaaaa<br>
       aaaaaaaaaaaaaaaaaaaaaaaaaaaaa<br>
       aaaaaaaaaaaaaaaaaaaaaaaaaaaaa<br>
       aaaaaaaaaaaaaaaaaaaaaaaaaaaaa<br>
       aaaaaaaaaaaaaaaaaaaaaaaaaaaaa<br>
       aaaaaaaaaaaaaaaaaaaaaaaaaaaaa<br>
       aaaaaaaaaaaaaaaaaaaaaaaaaaaaa<br>
       aaaaaaaaaaaaaaaaaaaaaaaaaaaaa<br>
       aaaaaaaaaaaaaaaaaaaaaaaaaaaaa<br>
       aaaaaaaaaaaaaaaaaaaaaaaaaaaaa<br>
       aaaaaaaaaaaaaaaaaaaaaaaaaaaaa<br>
       aaaaaaaaaaaaaaaaaaaaaaaaaaaaa<br>
       aaaaaaaaaaaaaaaaaaaaaaaaaaaaa<br>
       aaaaaaaaaaaaaaaaaaaaaaaaaaaaa<br>
       aaaaaaaaaaaaaaaaaaaaaaaaaaaaa<br>
       aaaaaaaaaaaaaaaaaaaaaaaaaaaaa<br>
       aaaaaaaaaaaaaaaaaaaaaaaaaaaaa<br>
       aaaaaaaaaaaaaaaaaaaaaaaaaaaaa<br>
       aaaaaaaaaaaaaaaaaaaaaaaaaaaaa<br>
       aaaaaaaaaaaaaaaaaaaaaaaaaaaaa<br>
       aaaaaaaaaaaaaaaaaaaaaaaaaaaaa<br>
       aaaaaaaaaaaaaaaaaaaaaaaaaaaaa<br>
       aaaaaaaaaaaaaaaaaaaaaaaaaaaaa<br>
       aaaaaaaaaaaaaaaaaaaaaaaaaaaaa<br>
       aaaaaaaaaaaaaaaaaaaaaaaaaaaaa<br>
       aaaaaaaaaaaaaaaaaaaaaaaaaaaaa<br>
       aaaaaaaaaaaaaaaaaaaaaaaaaaaaa<br>
       aaaaaaaaaaaaaaaaaaaaaaaaaaaaa<br>
       aaaaaaaaaaaaaaaaaaaaaaaaaaaaa<br>
       aaaaaaaaaaaaaaaaaaaaaaaaaaaaa<br>
       aaaaaaaaaaaaaaaaaaaaaaaaaaaaa<br>
       aaaaaaaaaaaaaaaaaaaaaaaaaaaaa<br>
       aaaaaaaaaaaaaaaaaaaaaaaaaaaaa<br>
       aaaaaaaaaaaaaaaaaaaaaaaaaaaaa<br>
       aaaaaaaaaaaaaaaaaaaaaaaaaaaaa<br>
       aaaaaaaaaaaaaaaaaaaaaaaaaaaaa<br>
       aaaaaaaaaaaaaaaaaaaaaaaaaaaaa<br>
       aaaaaaaaaaaaaaaaaaaaaaaaaaaaa<br>
       aaaaaaaaaaaaaaaaaaaaaaaaaaaaa<br>
       aaaaaaaaaaaaaaaaaaaaaaaaaaaaa<br>
       aaaaaaaaaaaaaaaaaaaaaaaaaaaaa<br>
       aaaaaaaaaaaaaaaaaaaaaaaaaaaaa<br>
       aaaaaaaaaaaaaaaaaaaaaaaaaaaaa<br>
       aaaaaaaaaaaaaaaaaaaaaaaaaaaaa<br>
       aaaaaaaaaaaaaaaaaaaaaaaaaaaaa<br>
     </section>
     <footer class="modal-card-foot">
       <button class="button is-success">Save changes</button>
       <button class="button">Cancel</button>
     </footer>
   </div>
 </div><!-- Signin -->

</body>

<script src="<?=site_url("public/jquery/dist/jquery.min.js");?>"></script>
<script src="<?=site_url("public/vue/dist/vue.js");?>"></script>
<script src="<?=site_url("public/axios/dist/axios.min.js");?>"></script>
<script src="<?=site_url("public/moment/moment-with-locales.js");?>"></script>
<script src="<?=site_url("public/js/mefeeds.js");?>"></script>
<script>
  var feeds = new Vue({
    el:"#feeds",
    data:{
      "feeds":{}
    },
    created:function(){

      let vm = this
      axios.get('feeds/get', {
        params: {}
      }).then(function (response) {
        console.log(response);
        vm.feeds = response.data.feeds;
      }).catch(function (error) {
        console.log(error);
      });

    },
    filters: {
      moment: function (dateauto) {
        return moment(dateauto).lang("th").subtract(0, 'days').calendar();
      }
    }
  });

  Vue.component('login',{
    template: `
      <div class="dropdown" v-bind:class="{ 'is-active': isActive }">
        <div class="dropdown-trigger">
          <button class="button is-info" aria-haspopup="true" aria-controls="dropdown-login" @click="active">
            <span><i class="fa fa-bullhorn" aria-hidden="true"></i> ประกาศตำแหน่งงาน</span>
            <span class="icon is-small">
              <i class="fa fa-angle-down" aria-hidden="true"></i>
            </span>
          </button>
        </div>
        <div class="dropdown-menu" id="dropdown-login" role="menu">
          <div class="dropdown-content">
            <div class="dropdown-item">

              <p>เข้าสู่ระบบ - มีบัญชีแล้ว</p>
              <div class="field">
                <p class="control has-icons-left has-icons-right">
                  <input class="input" type="email" placeholder="Email" v-model="email">
                  <span class="icon is-small is-left">
                    <i class="fa fa-envelope"></i>
                  </span>
                  <span class="icon is-small is-right">
                    <i class="fa fa-check"></i>
                  </span>
                </p>
              </div>
              <div class="field">
                <p class="control has-icons-left">
                  <input class="input" type="password" placeholder="Password" v-model="pass">
                  <span class="icon is-small is-left">
                    <i class="fa fa-lock"></i>
                  </span>
                </p>
              </div>
              <div class="field">
                <p class="control">
                  <button class="button is-primary" @click="login">
                    เข้าสู่ระบบ
                  </button>
                </p>
              </div>

            </div>
            <hr class="dropdown-divider">
            <div class="dropdown-item">

              <p>สมัครสมาชิก - ยังไม่มีบัญชี</p>
              <a class="button is-info">สร้างบัญชีใหม่</a>

            </div>
          </div>
        </div>
      </div>
    `,
    data: function () {
      return {
        isActive:false,
        email:"",
        pass:""
      }
    },
    methods:{
      active: function () {
        if(this.isActive){
          this.isActive = false;
        }else{
          this.isActive = true;
        }
      },
      login: function(){

        let vm = this
        axios.post('signin', {
          email: btoa( this.email ),
          pass: btoa( this.pass )
        }).then(function (response) {

          alert("Login!!");

        }).catch(function (error) {

          console.log(error);

        });

      }
    }
  });

  var login = new Vue({
    el:"#login"
  });
</script>
</html>
