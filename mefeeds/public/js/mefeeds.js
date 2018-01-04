
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
                <div v-if="!image">

                  <div class="field">
                    <div class="file is-small">
                      <label class="file-label button is-rounded me-upload-img" title="เลือกไฟล์ที่จะอัพโหลด">
                        <input class="file-input" type="file" @change="selectFile" name="resume">
                        <span class="">
                            <i class="fa fa-picture-o"></i>
                            รูปภาพ
                        </span>
                      </label>
                    </div>
                  </div>
                </div>
                <div v-else>
                  <a class="button is-danger me-position-absolute me-z-index-9999 me-delete-img" @click="removeImage">
                    <i class="fa fa-times-circle"></i>
                  </a>
                  <div class="card-image">
                    <figure class="image is-4by3 is-hidden">
                      <img :src="image" id="image" ref="image" class="image is-1280x960 me-border-radius-5" />
                    </figure>
                  </div>
                  <canvas :src="canvas" ref="canvas" id="canvas"></canvas>
                  <button type="button" @click="rotageLeft">หมุนซ้าย</button><button type="button" @click="rotageRight">หมุนขวา</button>
                </div>
              </div>
          <div class="field">

            <p class="control">
              <div class="field">
                <div class="control has-icons-right">
                  <input 
                    v-model="title" 
                    class="input" 
                    v-bind:class="{'is-success': validateTitleInputSuccess, 'is-danger': validateTitleInputfail}" 
                    @change="validate('title')" 
                    type="text" 
                    placeholder="หัวข้องาน">
                  <p class="help is-danger" v-bind:class="{'is-hidden': validateTitle}">กรุณากรอกหัวข้อโพสต์หรือตำแหน่งงาน</p>
                </div>
              </div>

              <div class="showHashtag" v-html="showHashtag"></div>

              <textarea
                contenteditable="true"
                id="postTextarea"
                class="textarea"
                v-bind:class="{'is-success': validateDescInputSuccess, 'is-danger': validateDescInputfail}"
                placeholder="โพสงานตรงนี้เลย..."
                v-model="desc"
                v-bind:rows="rows"
                type="text"
                style="overflow:hidden"
                @keyup="textareaFn"
                @change="validate('desc')"
                >
              </textarea>
              <p class="help is-danger" v-bind:class="{ 'is-hidden': validateDesc }">กรุณากรอกข้อมูลรายละเอียดของงาน</p>

              
            </p>

          </div>

          <nav class="level">
            <div class="level-left"></div>

            <div class="level-right">

              <div class="level-item">
                <a class="button is-info" v-bind:class="{ 'is-loading': postLoadedBtn }" @click="post"><b>โพสต์</b></a>
              </div>

            </div>
          </nav>

            <footer class="card-footer">
              <p class="card-footer-item">
                <span>
                  <a class="" @click="postList"> <i class="fa fa-th-list" aria-hidden="true"></i>&nbspโพสต์ของฉัน&nbsp<i class="fa fa-angle-up" v-bind:class="{'fa-angle-down':isActivePostList}" aria-hidden="true"></i></a>
                </span>
              </p>
            </footer>

        </div>
      </article>
      <div id="postList" v-bind:class="{'is-hidden':isActivePostList}">
      <div v-for="(post, index) in mePost">
        <hr />
        <div class="box" v-bind:class="{ 'me-post-content-public' : mePost[index].status == 1, 'me-post-content-closed' : mePost[index].status == 0 }" >
          <article class="media">
            <div class="media-content">
            <span class="tag is-light">{{ index+1 }}</span>
            <footer class="card-footer">
              <a class="card-footer-item" @click="openEditPost( index )"><i class="fa fa-pencil" aria-hidden="true"></i> &nbspแก้ไข</a>
              <a v-bind:href="'viewpost/post/' + mePost[index].idpost" target="_blank" class="card-footer-item"><i class="fa fa-eye" aria-hidden="true"></i> &nbspมุมมอง</a>
            </footer>

              <div class="content" v-show="mePost[index].opened">
                <p>
                  <strong>{{ post.title }}</strong> <small>@johnsmith</small> <small>31m</small>
                  <br>

                  <div class="me-post-desc me-white-space-pre" v-bind:class="{ 'limit-text' : mePost[index].readmore }">
                    {{ post.desc }}
                  </div>

                  <span v-bind:class="{ 'me-hide' : mePost[index].readmore == 0 }">
                    ... <a @click="readmore( $event, index )">ดูเพิ่มเติม</a>
                  </span>

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

                <a v-if="mePost[index].datepush.status === 1" class="card-footer-item button is-primary" @click="pumppost( index )"><i class="fa fa-hand-o-up"></i> &nbspดันโพสต์</a>

                <a v-else class="card-footer-item"><i class="fa fa-circle-o-notch fa-spin"></i> &nbspดันได้อีก{{ mePost[index].datepush.nexttime | moment }}</a>

                <div class="control">
                  <div class="select">
                    <select v-model="mePost[index].status" @change="updateStatus( index )">
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
      rows:"2",
      tag:"",
      mePost:[],
      autocomplateTags:[],
      tagFound:[],
      isActiveTag: false,
      isLoading: false,
      isActivePostList: true,
      image: '',
      canvas:'',
      ctx:'',
      refsForimage:'',
      imageDegrees:0,
      hashtag:[],
      showHashtag:'',
      validateTitle:true,
      validateDesc:true,
      validateTitleInputSuccess:false,
      validateTitleInputfail:false,
      validateDescInputSuccess:false,
      validateDescInputfail:false,
      postLoadedBtn:false,
      status:{
        options: [
          { text: 'เผยแพร่', value: 1 },
          { text: 'ปิดรับสมัคร', value: 0 },
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
  mounted: function () {
    this.$nextTick(function () {

    })
  },
  filters: {

    moment: function ( dateauto ) {

      return moment( dateauto ).lang( "th" ).calendar()

    }

  },
  methods:{
    validate:function( type ){
      if( type === "title" ){
        ( this.title.length > 0 ) ? this.validateTitleInputSuccess = true : this.validateTitleInputSuccess = false
      }else if( type === "desc" ){
        ( this.desc.length > 0 ) ? this.validateDescInputSuccess = true : this.validateDescInputSuccess = false
      }
    },
    validatePost:function(){//Check Before send post
      let title = ( this.title != "" && this.title.length > 0 ) ? true : false
      let desc  = ( this.desc != "" && this.desc.length > 0 ) ? true : false
      
      this.validateTitleInputSuccess = title  
      this.validateTitleInputfail = !title
      this.validateTitle = title 
      
      this.validateDescInputSuccess = desc
      this.validateDescInputfail = !desc  
      this.validateDesc = desc 

      return ( desc && title )
    },
    post:function(){

      let status = this.validatePost()
      if( status ){
        this.postLoadedBtn = true
        let vm = this
        axios.post('post', {
          desc: this.desc,
          title: this.title,
          hashtag: this.hashtag,
          image: this.image
        }).then(function (response) {

          if( response.data.status ){
            location.reload();
          }else{
            console.log( "Fail!" );
          }

        }).catch(function (error) {

          console.log(error);

        });
      }else{
        alert("กรอกข้อมูลยังไม่ครบ")
      }

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
    textareaFn:function(  ){

      this.resizePost()
      this.hashtagFilters()

    },
    resizePost:function( event ){

      var rows = this.desc.split("\n").length;

      if( rows <= 5  ){

        this.rows = 5;

      }else{

        this.rows = rows+1;

      }

    },
    hashtagFilters:function(){

      this.hashtag = []
      this.showHashtag = ""
      this.hashtag = this.desc.match( /(^|\s)#([~^a-z0-9_ก-๙\d]+)/ig, "$1<span class='hash_tag'>$2</span>")
      
      if( this.hashtag != null ){

        let arr = this.hashtag
        for (var i = 0; i < arr.length ; i++) {

          this.showHashtag = this.showHashtag + '<a href="#">' +this.hashtag[i]+'</a>'
   
        }

      }

    },
    clearInput:function(){
      
      this.tag = "";
      this.isActiveTag = false;

    },
    selectFile:function( e ){
       var files = e.target.files || e.dataTransfer.files
       console.log("name: ", files[0].name)
       console.log("type: ", files[0].type)
       console.log("size: ", files[0].size)
       console.log("file: ", files[0])
       let name = files[0].name
       let type = files[0].type
       let size = files[0].size
       if( (type === "image/png" || type === "image/jpeg" || type === "image/jpg") ){
          if (!files.length)
          return
          this.createImage(files[0])  
       }else{
        alert("Wrong file!!")
       }
      
    },
    createImage:function(file) {
      var image  = new Image()
      var reader = new FileReader()
      var vm     = this

      imageLoaded = reader.onload = (e) => {
        vm.image = e.target.result
        
        this.convertImageToCanvas()
      }
      reader.readAsDataURL(file)
      
    },
    convertImageToCanvas:function() {
      // parent.$refs
      element = this.$refs
      
      vm = this
      setTimeout(function(){
        vm.refsForimage = element

        var MAX_WIDTH = 400;
        var MAX_HEIGHT = 400;
        var width = element.image.width;
        var height = element.image.height;
         if (width > height) {
                if (width > MAX_WIDTH) {
                    height *= MAX_WIDTH / width;
                    width = MAX_WIDTH;
                }
            } else {
                if (height > MAX_HEIGHT) {
                    width *= MAX_HEIGHT / height;
                    height = MAX_HEIGHT;
                }
            }

        var canvas               = element.canvas
            canvas.height        = height
            canvas.width         = width
            // canvas.style.display = "none"
            element.image.style.display = "none"
        var ctx = canvas.getContext('2d')
        var img = new Image()
            img.src = element.image.src

        var cancan = ctx.canvas
        var hRatio = cancan.width  / img.width
        var vRatio =  cancan.height / img.height
        var ratio  = Math.min ( hRatio, vRatio )

        var centerShift_x = ( cancan.width - img.width*ratio ) / 2
        var centerShift_y = ( cancan.height - img.height*ratio ) / 2
        ctx.clearRect(0,0,cancan.width, cancan.height);
        ctx.drawImage(img, 0,0, img.width, img.height,centerShift_x,centerShift_y,img.width*ratio, img.height*ratio);

        el = element.canvas.toDataURL()
        vm.image = el
        vm.ctx = ctx
        vm.canvas = canvas

      }, 500);
      

      
    },
    rotageLeft:function(){
      console.log("rotageLeft")
      console.log("aa:",Math.PI/2)
      var cancan        = this.refsForimage.canvas
      var imgwidth      = this.refsForimage.image.width
      var imgheight     = this.refsForimage.image.height
          cancan.width  = imgwidth
          cancan.height = imgheight
          this.ctx.save()
          this.ctx.translate(imgwidth/2, imgheight/2)
          this.imageDegrees -= 90
          this.ctx.rotate(this.imageDegrees*Math.PI/180)
          this.ctx.drawImage(this.refsForimage.image, -(imgwidth/2), -(imgheight/2))
          this.ctx.restore()

          // el = cancan.toDataURL()
          // this.image = el
      // this.imageDegrees = this.imageDegrees-90
      // this.drawRotated(this.imageDegrees)
    },
    rotageRight:function(){
      console.log("rotageRight")
      // this.imageDegrees = this.imageDegrees+90
      // this.drawRotated(this.imageDegrees)
    },
    drawRotated:function(degrees){
      console.log("this.$refs: ",this.$refs)
      element = this.$refs
      let canvas  = element.canvas
      let elImage = element.image

      var cancan = this.ctx.canvas
      var hRatio = cancan.width  / elImage.width    ;
      var vRatio =  cancan.height / elImage.height  ;
      var ratio  = Math.min ( hRatio, vRatio );

      var centerShift_x = ( cancan.width - elImage.width*ratio ) / 2;
      var centerShift_y = ( cancan.height - elImage.height*ratio ) / 2;  

      this.ctx.clearRect(0,0,cancan.width, cancan.height);
      this.ctx.save();
      this.ctx.translate(canvas.width/2,canvas.height/2);
      this.ctx.rotate(degrees*Math.PI/180);
      // this.ctx.drawImage(image,-image.width/2,-image.width/2);
      this.ctx.drawImage(elImage, 0,0, elImage.width, elImage.height,centerShift_x,centerShift_y,elImage.width*ratio, elImage.height*ratio);
      this.ctx.restore();

      el = element.canvas.toDataURL()
      vm.image = el
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
      ( post.opened == 1 ) ? post.opened = false : post.opened = true;
      ( post.closed == 1 ) ? post.closed = false : post.closed = true;

    },
    updateStatus:function ( index ){

      let vm = this
      axios.post('post/status', {

        typ:"status",
        data:{
          value:vm.mePost[index].status,
          idpost:vm.mePost[index].idpost
        }

      }).then( function ( response ) {
        if( response.status === 200 ){
          // vm.mePost = response.data;  
        }
      }).catch( function ( error ) {

        console.log( error );

      });

    },
    pumppost:function ( index ){

      let vm = this
      axios.post('pumppost', {

        data:{
          typ:"pump",
          idpost:vm.mePost[index].idpost
        }

      }).then( function ( response ) {
        if( response.status === 200 ){

          let data = response.data
          vm.mePost[index].datepush.status = data.datepush.status //update pust status

        }
      }).catch( function ( error ) {

        console.log( error );

      });

    },
    readmore:function( event, index ){

      let meReadmore = this.mePost[index].readmore
      if( meReadmore === 1 || meReadmore === "1" ){

        this.mePost[index].readmore = 0

      }else{

        this.mePost[index].readmore = 1

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
    "feeds":{},
    "type":"all",
    "hashtag":""
  },
  created:function(){
    this.type = "all"
    this.get()
  },
  filters: {
    moment: function (dateauto) {
      return moment(dateauto).lang("th").subtract(0, 'days').calendar();
    }
  },
  methods: {
    get: function(){
      let vm = this
      axios.post('feeds/get', {
        data: {
          type:vm.type,
          hashtag:this.hashtag
        }
      }).then(function (response) {

        console.log(response);
        vm.feeds = response.data.feeds;

      }).catch(function (error) {

        console.log(error);

      });
    },
    getByHashTag: function( hashtag ){
      this.type = "hashtag"
      this.hashtag = hashtag
      this.get()
    },
    hastag: function ( desc ){

      let descHasHastag = desc.replace( /(^|\s)#([~^a-z0-9_ก-๙\d]+)/ig, "$1<a onclick='feeds.getByHashTag(\"$2\")'>#$2</a>")
      return descHasHastag

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
            <signin></signin>
            <a class="button is-info">สร้างบัญชีใหม่</a>

            
            <signin ref="signin"></signin>

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
          <i class="fa fa-cog"></i> แก้ไขข้อมูลทั่วไป
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

/*##############################################################################*/
/*##############################################################################*/
/*[START] SIGNIN*/
/*##############################################################################*/
/*##############################################################################*/
// Vue.component('signin',{
//   template: `<div id="modal" class="modal" v-bind:class="{ 'is-active': isActive }">
//               <div class="modal-background"></div>
//               <div class="modal-content">
//                 <div class="box">
//                   <article class="media">
//                     <div class="media-content">
//                       <div class="content">
                        
//                         <div class="field">
//                           <label class="label">ชื่อ-สกุล</label>
//                           <div class="control has-icons-left has-icons-right">
//                             <input class="input is-danger" type="email" placeholder="มานี มีนา">
//                             <span class="icon is-small is-left">
//                               <i class="fa fa-user"></i>
//                             </span>
//                             <span class="icon is-small is-right">
//                               <i class="fa fa-warning"></i>
//                             </span>
//                           </div>
//                           <p class="help is-danger">กรุณากรอกชื่อ</p>
//                         </div>

//                         <div class="field">
//                           <label class="label">อีเมล</label>
//                           <div class="control has-icons-left has-icons-right">
//                             <input class="input is-danger" type="email" placeholder="example@example.com">
//                             <span class="icon is-small is-left">
//                               <i class="fa fa-envelope"></i>
//                             </span>
//                             <span class="icon is-small is-right">
//                               <i class="fa fa-warning"></i>
//                             </span>
//                           </div>
//                           <p class="help is-danger">This email is invalid</p>
//                         </div>

//                         <div class="field">
//                           <label class="label">ชื่อบริษัทห้างร้าน</label>
//                           <div class="control has-icons-left has-icons-right">
//                             <input class="input is-danger" type="email" placeholder="Mavel Hotel, ไพบูล การยาง, ร้านช่างสี">
//                             <span class="icon is-small is-left">
//                               <i class="fa fa-building" ></i>
//                             </span>
//                             <span class="icon is-small is-right">
//                               <i class="fa fa-warning"></i>
//                             </span>
//                           </div>
//                           <p class="help is-danger">This email is invalid</p>
//                         </div>

//                         <footer class="card-footer">
//                           <p class="card-footer-item" @click="close">
//                             <span>
//                               <a href="#">ยกเลิก</a>
//                             </span>
//                           </p>
//                           <p class="card-footer-item">
//                             <span>
//                               <a href="#">สมัครใช้งาน</a>
//                             </span>
//                           </p>
//                         </footer>

//                       </div>
//                     </div>
//                   </article>
//                 </div>
//               </div>
//               <button class="modal-close is-large"></button>
//             </div>`,
//   data: function () {
//     return {
//       isActive:true
//     }
//   },
//   methods:{
//     open: function () {
//       if(this.isActive){
//         this.isActive = false;
//       }else{
//         this.isActive = true;
//       }
//     },
//     close: function(){

//       this.isActive = false;

//     }
//   }
// });

// var signin = new Vue({
//   el:"#signin"
// });

/*##############################################################################*/
/*##############################################################################*/
/*[END] SIGNIN*/
/*##############################################################################*/
/*##############################################################################*/
