
/*##############################################################################*/
/*##############################################################################*/
/*[START] WRITE FEED*/
/*##############################################################################*/
/*##############################################################################*/
Vue.component('writefeed',{
  template: `<div>
      <article class="media">
        <div class="media-content">
          <div class="field">
            <p class="control">
            <div class="field">
              <div class="control">
                <input v-model="title"class="input" type="text" placeholder="หัวข้องาน">
              </div>
            </div>
              <textarea
                id="postTextarea"
                class="textarea"
                placeholder="โพสงานตรงนี้เลย..."
                v-model="desc"
                v-bind:rows="rows"
                type="text"
                style="overflow:hidden"
                @keyup="resize"
                ></textarea>
                <div class="field">
                  <div class="control">

                    <div class="dropdown column" v-bind:class="{ 'is-active' : isActiveTag}">
                      <div class="tags has-addons">
                        <span class="tag is-danger">Alex Smith</span>
                        <a class="tag is-delete"></a>
                      </div>
                      <div class="dropdown-trigger">

                      <div class="field has-addons">
                        <div class="control"  style="width: 100%;">

                        <input v-model="tag" class="input" @keyup="tagSelect" type="text" placeholder="ใส่ ชื่องาน ตำแหน่ง หรือ คำที่เกี่ยวข้อง">

                        <div class="dropdown-menu" id="dropdown-menu3" role="menu">
                          <div class="dropdown-content">
                            <a class="dropdown-item" v-for="tag in tagFound" v-html="tag.text" @click="tagClicked(tag.id,tag.text)">
                              {{tag.id}},{{tag.text}}
                            </a>
                          </div>
                        </div>

                        </div>

                        <div class="control">
                          <a class="button is-info">
                            แท็ก&nbsp<i class="fa fa-tag" aria-hidden="true"></i>
                          </a>
                        </div>

                      </div>

                      <p>
                        <span class="icon has-text-warning">
                          <i class="fa fa-warning"></i>
                        </span>
                        <strong> เคล็ดลับ</strong>: แท็กชื่องานเพื่อเข้าถึงกลุ่มเป้าหมายได้ง่าย เช่น ช่างเชื่อม, พนักงานเสริฟ, พนักงานขับรถ เป็นต้น
                      </p>
                      <hr>
                      </div>

                    </div>

                  </div>
                </div>
            </p>
          </div>
          <nav class="level">
            <div class="level-left">
              <div class="level-item">
                <a class="button is-info" @click="postList"> <i class="fa fa-th-list" aria-hidden="true"></i>&nbspโพสต์งานที่ฉันสร้าง</a>
              </div>
            </div>
            <div class="level-right">
              <div class="level-item">
                <a class="button is-info" @click="post">โพสต์</a>
              </div>
            </div>
          </nav>
        </div>
      </article>
      <div id="postList">
      <div v-for="post in mePost">
      <hr />
        <div class="box">
          <article class="media">
            <div class="media-content">
            <footer class="card-footer">
              <a href="#" @click="editPost" class="card-footer-item"><i class="fa fa-pencil" aria-hidden="true"></i> &nbspแก้ไข</a>
              <a href="#" class="card-footer-item"><i class="fa fa-eye" aria-hidden="true"></i> &nbspตัวอย่าง</a>
            </footer>
              <div class="content">
                <p>
                  <strong>{{ post.title }}</strong> <small>@johnsmith</small> <small>31m</small>
                  <br>
                  {{ post.desc }}
                </p>
              </div>
              <footer class="card-footer">
                <a href="#" class="card-footer-item"><i class="fa fa-hand-o-up" aria-hidden="true"></i> &nbspดันโพสต์</a>
                <div class="control" style="padding:5px;">
                  <div class="select">
                    <select>
                      <option>เผยแพร่</option>
                      <option>ปิดรับสมัคร</option>
                    </select>
                  </div>
                </div>
              </footer>
            </div>
          </article>
        </div>
      </div>
      </div>
  </div>`,
  data: function () {
    return {
      desc:"",
      title:"",
      rows:"5",
      tag:"",
      mePost:[],
      autocomplateTags:[{id:1,text:"bbs"},{id:2,text:"bbs"},{id:3,text:"ccb"},{id:4,text:"dda"},{id:5,text:"Ham"}],
      tagFound:[],
      isActiveTag: false,
      delay: (function(){
        var timer = 0;
        return function(callback, ms){
          clearTimeout (timer);
          timer = setTimeout(callback, ms);
        };
      })()
    }
  },
  methods:{
    post:function(){

      let vm = this
      axios.post('post', {
        desc: this.desc,
        title: this.title
      }).then(function (response) {

        if( response.data.status ){
          location.reload();
        }else{
          alert("Fail!");
        }

      }).catch(function (error) {

        console.log(error);

      });

    },
    tagSelect:function(){
      if( this.tag.replace(/\s/g, '') != "" ){
        let vm = this;
        this.delay(function(){
            vm.GetTags();
        }, 1000 );
      }

    },
    GetTags:function(){

      let vm = this;
      axios.post('tags', {
        typ: "get",
        tag: this.tag
      }).then(function (response) {

        if( response.data.length > 0 ){
          //found exists
          SetTagList();
        }else{
          //not found exists
        }

      }).catch(function (error) {

        console.log(error);

      });

    },
    SetTagList:function(){

      let autocomplateTags = this.autocomplateTags;
      this.tagFound = [];//always clear data



        for( var index in autocomplateTags ){

          let Found = autocomplateTags[index].text.match(new RegExp(this.tag, "gi"));
          if( Found != null ){//Found tag

              let id   = autocomplateTags[index].id;
              let text = autocomplateTags[index].text;
              this.tagFound.push( {id:id,text:text.replace( Found,"<b>"+Found+"</b>" )} );//Push tag found

          }

        }



      if( this.tagFound.length === 0 ){

        this.isActiveTag = false;//Hide Tag list

      }else{

        this.isActiveTag = true;//Show Tag list

      }

    },
    tagClicked:function(id,tag){

      console.log("id: ",id)
      console.log("tag: ",tag)

    },
    postList:function(){

      let vm = this
      axios.post('postList', {
        typ:"get"
      }).then( function ( response ) {

        console.log(response.data);
        vm.mePost = response.data;

      }).catch( function ( error ) {

        console.log( error );

      });

    },
    editPost:function(){

      swal({
        title: '<i class="fa fa-pencil" aria-hidden="true"></i> แก้ไขโพสต์',
        html:
          '<input id="swal-input1" class="swal2-input" placeholder="หัวข้องาน">' +
          '<textarea class="swal2-input" style="height: 500px;" placeholder="โพสงานตรงนี้เลย..."></textarea>',
          showCancelButton: true,
          cancelButtonText:'<i class="fa fa-times" aria-hidden="true"></i> ยกเลิก',
          confirmButtonText:'<i class="fa fa-check" aria-hidden="true"></i> ยืนยัน',
          focusConfirm: false
      });

    },
    resize:function(){
      let postTextarea = document.getElementById("postTextarea");
      var rows = this.desc.split("\n").length;
      if( rows <= 5  ){

        this.rows = 5;

      }else{

        this.rows = rows+1;

      }

    }
  }
});

var writefeed = new Vue({
  el:"#writefeed"
});
/*##############################################################################*/
/*##############################################################################*/
/*[END] WRITE FEED*/
/*##############################################################################*/
/*##############################################################################*/

/*##############################################################################*/
/*##############################################################################*/
/*[START] FEED*/
/*##############################################################################*/
/*##############################################################################*/

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

/*##############################################################################*/
/*##############################################################################*/
/*[END] FEED*/
/*##############################################################################*/
/*##############################################################################*/

/*##############################################################################*/
/*##############################################################################*/
/*[START] LOGIN*/
/*##############################################################################*/
/*##############################################################################*/

Vue.component('login',{
  template: `
    <div class="dropdown is-hoverable">
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
      email:"hihigolgol@hotmail.com",
      pass:"1234"
    }
  },
  methods:{
    login: function(){

      let vm = this
      axios.post('signin', {
        email: btoa( this.email ),
        pass:  btoa( this.pass )
      }).then(function (response) {

        if( response.data.status ){
          location.reload();
        }else{
          alert("Fail!");
        }

      }).catch(function (error) {

        console.log(error);

      });

    }
  }
});

var login = new Vue({
  el:"#login"
});

/*##############################################################################*/
/*##############################################################################*/
/*[END] LOGIN*/
/*##############################################################################*/
/*##############################################################################*/

/*##############################################################################*/
/*##############################################################################*/
/*[START] LOGOUT*/
/*##############################################################################*/
/*##############################################################################*/

Vue.component('logout',{
  template: `<nav class="level">
  <figure class="media-left">
    <p class="image is-64x64">
      <img src="http://bulma.io/images/placeholders/128x128.png">
    </p>
  </figure>
  <div class="dropdown is-hoverable">
    <div class="dropdown-trigger">
      <button class="button" aria-haspopup="true" aria-controls="logout">
        <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
      </button>
    </div>
    <div class="dropdown-menu" id="logout" role="menu">
      <div class="dropdown-content">
        <a href="#" class="dropdown-item">
          <i class="fa fa-user"></i> แก้ไขข้อมูลทั่วไป
        </a>
        <hr class="dropdown-divider">
        <a href="./logout" class="dropdown-item">
          <i class="fa fa-sign-out"></i> ออกจากระบบ
        </a>
      </div>
    </div>
  </div>
  </nav>`,
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
        pass:  btoa( this.pass )
      }).then(function (response) {

        if( response.data.status ){
          location.reload();
        }else{
          alert("Fail!");
        }

      }).catch(function (error) {

        console.log(error);

      });

    }
  }
});

var logout = new Vue({
  el:"#logout"
});

/*##############################################################################*/
/*##############################################################################*/
/*[END] LOGOUT*/
/*##############################################################################*/
/*##############################################################################*/
