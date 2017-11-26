
/*##############################################################################*/
/*##############################################################################*/
/*[START] WRITE FEED*/
/*##############################################################################*/
/*##############################################################################*/
Vue.component('writefeed',{
  template: `
    <form>
    <div>
      <article class="media">
        <div class="media-content">
          <div class="field">
            <p class="control">
            <div class="field">
              <div class="control">
                <input v-model="title"class="input" type="text" placeholder="หัวข้องาน">
              </div>
            </div>

            <div class="field">
              <div v-if="!image">
                <div class="field">
                  <div class="file is-small is-info has-name">
                    <label class="file-label">
                      <input class="file-input" type="file" @change="selectFile" name="resume">
                      <span class="file-cta">
                        <span class="file-icon">
                          <i class="fa fa-upload"></i>
                        </span>
                        <span class="file-label">
                          Upload
                        </span>
                      </span>
                      <span class="file-name">
                        อัพโหลดภาพประกอบ...
                      </span>
                    </label>
                    &nbsp
                    <div class="tags has-addons">
                      <a class="tag icon is-warning">
                        <i class="fa fa-question-circle"></i> 
                      </a>
                    </div>

                  </div>
                </div>

              </div>
              <div v-else>
                <a class="button is-danger me-position-absolute me-z-index-9999" @click="removeImage">
                  <i class="fa fa-times-circle"></i>
                </a>
                <img :src="image" class="image is-1280x960 me-border-radius-5" />
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
                @keyup="resizePost"
                ></textarea>
                <div class="field">
                  <div class="control">

                    <div class="dropdown column" v-bind:class="{ 'is-active' : isActiveTag}">

                      <div class="field is-grouped is-grouped-multiline">

                        <div class="control" v-for="tag in tagAdded">
                          <div class="tags has-addons">
                            <span class="tag is-success">{{tag.name}}</span>
                            <a class="tag is-delete" @click="tagDeleted(tag.idtag)"></a>
                          </div>
                        </div>

                      </div>

                      <div class="dropdown-trigger">

                      <div class="field has-addons">
                        <div class="control" style="width: 100%;">

                        <input v-model="tag" class="input" @keyup="tagSelect" type="text" placeholder="ใส่ชื่อตำแหน่งงาน อำเภอ ตำบลของบริษัท">

                        <div class="dropdown-menu" id="dropdown-menu3" role="menu">
                          <div class="dropdown-content">
                            <a class="dropdown-item" v-for="tag in tagFound" v-html="tag.text" @click="tagClicked(tag.id,tag.text)">
                              {{tag.id}},{{tag.text}}
                            </a>
                          </div>
                        </div>

                        </div>

                        <div class="control">
                          <a class="button is-danger" @click="clearInput" v-bind:class="{ 'is-loading' : isLoading }">
                            <i class="fa fa-times-circle"></i>
                          </a>
                        </div>

                        <div class="control">
                          <a class="button is-info" @click="tagClicked()">
                            แท็ก&nbsp<i class="fa fa-tag"></i>
                          </a>
                        </div>

                      </div>
                      
                      </div>

                    </div>

                  </div>
                </div>
            </p>
          </div>
          <nav class="level">
            <div class="level-left">
              <div class="level-item">
                <a class="button is-info" @click="postList"> <i class="fa fa-th-list" aria-hidden="true"></i>&nbspโพสต์ของฉัน&nbsp<i class="fa fa-angle-up" v-bind:class="{'fa-angle-down':isActivePostList}" aria-hidden="true"></i></a>
              </div>
            </div>
            <div class="level-right">
              <div class="level-item">
                <a class="button is-info" @click="post">โพสต์&nbsp<i class="fa fa-paper-plane-o"></i></a>
              </div>
            </div>
          </nav>
        </div>
      </article>
      <div id="postList" v-bind:class="{'is-hidden':isActivePostList}">
      <div v-for="(post, index) in mePost">
        <hr />
        <div class="box">
          <article class="media">
            <div class="media-content">{{ index+1 }}
            <footer class="card-footer">
              <a class="card-footer-item" @click="openEditPost( index )"><i class="fa fa-pencil" aria-hidden="true"></i> &nbspแก้ไข</a>
              <a v-bind:href="'viewpost/index/' + mePost[index].idpost" target="_blank" class="card-footer-item"><i class="fa fa-eye" aria-hidden="true"></i> &nbspมุมมอง</a>
            </footer>

              <div class="content" v-show="mePost[index].opened">
                <p>
                  <strong>{{ post.title }}</strong> <small>@johnsmith</small> <small>31m</small>
                  <br>

                  <div class="limit-text me-post-desc me-white-space-pre">
                    {{ post.desc }}
                  </div>
                  <a>คลิกเพื่อดูเพิ่มเติม</a>

                </p>
              </div>

              <div class="animated" v-bind:class="{ 'me-hide' : mePost[index].closed }">

                <div class="content">
                  <div class="field">
                    <div class="control">
                      <input class="input" type="text" placeholder="หัวข้องาน" v-model="mePost[index].title">
                    </div>
                  </div>
                </div>


                <div class="field">
                  <div class="control">
                    <textarea class="textarea" @click="resizePostEdit( $event, index )" placeholder="รายละเอียดของงาน" v-model="mePost[index].desc" ></textarea>
                  </div>
                </div>

                <div class="field is-grouped is-grouped-right">
                  <div class="control">
                    <button type="button" @click="openEditPost( index )" class="button is-text">ยกเลิก</button>
                  </div>
                  <div class="control">
                    <button type="button" class="button is-link" @click="editPost( index )"><i class="fa fa-check-circle"></i>&nbspยืนยันการแก้ไข</button>
                  </div>
                </div>

              </div>
              
              <footer class="card-footer">
                <a href="#" class="card-footer-item"><i class="fa fa-hand-o-up" aria-hidden="true"></i> &nbspดันโพสต์</a>
                <div class="control" style="padding:5px;">
                  <div class="select" @change="updateStatus( index )">
                    <select>
                      <option v-for="option in status.options" v-bind:value="option.value">
                        {{ option.text }}
                      </option>
                    </select>
                  </div>
                </div>
              </footer>
            </div>
          </article>
        </div>
      </div>
      </div>
  </div>
  </form>`,
  data: function () {
    return {
      desc:"",
      title:"",
      rows:"5",
      tag:"",
      mePost:[],
      autocomplateTags:[],
      tagFound:[],
      tagAdded:[],
      isActiveTag: false,
      isLoading: false,
      isActivePostList: true,
      image: '',
      status:{
        options: [
          { text: 'เผยแพร่', value: 1 },
          { text: 'ปิดรีบสมัคร', value: 0 },
        ]
      },
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
          console.log( "Fail!" );
        }

      }).catch(function (error) {

        console.log(error);

      });

    },
    tagSelect:function(){

      let tagInput = this.tag.replace(/\s/g, '');

      if( tagInput != "" ){
        this.isLoading = true;
        let vm = this;
        this.delay(function(){
            vm.GetTags();
        }, 800 );
      }else{
        this.isLoading   = false;
        this.isActiveTag = false;
      }

    },
    GetTags:function(){

      let vm = this;
      axios.post('tags', {
        typ: "get",
        tag: this.tag
      }).then(function (response) {

        vm.isLoading = false;//set button to times icon
        let temp_Object = response.data.tags;
            vm.autocomplateTags   = temp_Object;
        
        if( vm.autocomplateTags.length > 0 ){
          //found exists
          vm.SetTagList();
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

          let Found = autocomplateTags[index].name.match(new RegExp(this.tag, "gi"));
          if( Found != null ){//Found tag

              let id   = autocomplateTags[index].idtag;
              let text = autocomplateTags[index].name;
              this.tagFound.push( {id:id,text:text.replace( Found,"<b>"+Found+"</b>" )} );//Push tag found

          }

        }

      if( this.tagFound.length === 0 ){

        this.isActiveTag = false;//Hide Tag list

      }else{

        this.isActiveTag = true;//Show Tag list

      }

    },
    tagClicked:function( id,tag ){

      console.log( "id: ",id," tag: ",tag );
      
      if( id !== undefined || tag !== undefined ){//tag in system

        let tags      = this.autocomplateTags;//Tags from server
        let tagsFound = tags.filter(function( ele ){
           return ( ele.idtag === id )//if found will return
        });
      
        this.tagAdded.push( tagsFound[0] );//Object stored tags selected

      }else{//new tag

        let tags    = this.tagAdded;

        let ThisTag = this.tag;
            ThisTag = ThisTag.replace(/ /g, "");
        let tagsFound = tags.filter(function( ele ){
           return ( ele.name === ThisTag )//if found will return
        });

        if( tagsFound.length === 0 && ThisTag ){

          this.tagAdded.push( {"idtag":"-1","name":ThisTag} );//Object stored tags selected

        }
        
        console.log( "Lenght: ",tagsFound.length );

      }
      
    },
    tagDeleted:function( idtag ){

      let tags      = this.tagAdded;//Tags from server
      let tagsFound = tags.filter(function( ele ){
        return ele.idtag !== idtag;//if found will return
      });
      this.tagAdded  = tagsFound;

    },
    postList:function(){

      if ( this.isActivePostList ) {

        this.isActivePostList = false;

      } else {

        this.isActivePostList = true;

      }

      let vm = this
      axios.post('postList', {

        typ:"get"

      }).then( function ( response ) {

        if( response.status === 200 ){

          vm.mePost = response.data;

        }

      }).catch( function ( error ) {

        console.log( error );

      });

    },
    resizePostEdit:function( event, index ){

      let element = event.target
      let rows    = element.value.split("\n").length

      if( rows <= 5  ){

        event.target.setAttribute("rows", 5)

      }else{

        event.target.setAttribute("rows", rows+1)

      }

    },
    resizePost:function( event ){

      var rows = this.desc.split("\n").length;

      if( rows <= 5  ){

        this.rows = 5;

      }else{

        this.rows = rows+1;

      }

    },
    clearInput:function(){
      
      this.tag = "";
      this.isActiveTag = false;

    },
    selectFile:function( e ){
       var files = e.target.files || e.dataTransfer.files;
      if (!files.length)
        return;
      this.createImage(files[0]);
    },
    createImage(file) {
      var image  = new Image();
      var reader = new FileReader();
      var vm     = this;

      reader.onload = (e) => {
        vm.image = e.target.result;
      };
      reader.readAsDataURL(file);
    },
    removeImage: function (e) {
      this.image = '';
    },
    editPost: function ( stage ) {
      
      this.updatePost( stage );
      
    },
    updatePost:function ( index ){

      let vm = this
      axios.post('post/update', {

        typ:"update",
        data:vm.mePost[index]

      }).then( function ( response ) {
        if( response.status === 200 ){
          // vm.mePost = response.data;  
        }
      }).catch( function ( error ) {

        console.log( error );

      });

    },
    openEditPost:function ( index ){

      let post = this.mePost[index];
      console.log( "open: ",post.opened );
      console.log( "close: ",post.closed );
      ( post.opened == 1 ) ? post.opened = false : post.opened = true;
      ( post.closed == 1 ) ? post.closed = false : post.closed = true;

    },
    updateStatus:function ( index ){

      let vm = this
      axios.post('post/update', {

        typ:"status",
        data:vm.mePost[index]

      }).then( function ( response ) {
        if( response.status === 200 ){
          // vm.mePost = response.data;  
        }
      }).catch( function ( error ) {

        console.log( error );

      });

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
        <a href="./editProfile" class="dropdown-item">
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
