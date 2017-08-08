<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- load MUI -->
<link href="//cdn.muicss.com/mui-0.9.20/css/mui.min.css" rel="stylesheet" type="text/css" />
<script src="//cdn.muicss.com/mui-0.9.20/js/mui.min.js"></script>
<title>Game Test</title>
</head>
<body>
    <div class="mui-container">
      <div class="mui-appbar"></div>
      <div class="mui-panel" id="game">
        <table width="100%">
    <tr class="mui--appbar-height">
      <td class="mui--text-title">Book's name</td>
      <td align="right">
        <ul class="mui-list--inline mui--text-body2">
          <li><a href="#">Life {{life}}</a></li>
          <li><a href="#">Score {{score}}</a></li>
          <li><a href="#">Options</a></li>
        </ul>
      </td>
    </tr>
  </table>
      <h1 style="text-align: center;">{{question}}</h1>
      <div>
        Battel area!
      </div>
      <div style="text-align: center;">
        <input type="button" class="mui-btn mui-btn--primary mui-btn--raised"  v-model="answer0" @click="check">
        <input type="button" class="mui-btn mui-btn--primary mui-btn--raised"  v-model="answer1" @click="check">
      </div>
      </div>
    </div>
</body>
<script src="<?=site_url("public/vue.js");?>"></script>
<script>
  var app =  new Vue({
      el:"#game",
      data:{
        all:[{"th":"แดง","eng":"red"},{"th":"เขียว","eng":"green"},{"th":"เหลือง","eng":"yelow"},{"th":"ฟ้า","eng":"blue"},{"th":"ดำ","eng":"Black"}],
        answer0:'พร้อม',
        answer1:'ยังไม่พร้อม',
        matched:'พร้อม',
        question:'Ready',
        score:0,
        life:3,
        status:0//0=Game start,1 Game started
      },
      methods:{
        check( event ){
          if( event.target.value == this.matched ){//correct
            console.log("ture");
            this.status = 1;//Game started
            this.countScore();
            this.next();
          }else{//incorrect
            console.log("false");
            console.log("this.life: ",this.life);
            console.log("this.status: ",this.status);
            if( this.life === 1 || this.status === 0){
              this.answer0  = 'พร้อม';
              this.answer1  = 'ยังไม่พร้อม';
              this.matched  = 'พร้อม';
              this.question = 'Ready';
              this.score    = 0;
              this.life     = 3;
              this.status   = 0;//Game start
            }else{
              this.die();
              this.next();
            }
          }
        },
        next(){
          //Get question
          var question_index     = Math.floor(Math.random()*this.all.length)
          var question           = this.all[question_index];//random question

          //Get wrong question
          var random_index       = Math.floor(Math.random()*this.all.length);
          if(random_index == question_index){random_index = Math.floor(Math.random()*this.all.length);}//re-random if get same index
          var randomAnswer_wrong = this.all[random_index];//random wrong answer

          //Random buttons
          var matched_index = Math.floor(Math.random()*2);//Get index correct answer
          var wrong_index   = (matched_index == 0 ? 1 : 0);//Get index wrong answer

          //Setting
          this['answer'+matched_index]  = question.th;//Set matched answer
          this['answer'+wrong_index]    = randomAnswer_wrong.th;//Set wrong answer
          this.matched  = question.th;//Set matched
          this.question = question.eng;//Set question
        },
        countScore(){
          this.score++;
        },
        die(){
          this.life--;
        }
      }
  });
</script>
</html>
