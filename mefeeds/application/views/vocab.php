<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>WatSkills</title>
</head>
<body>
  original bookRef: <textarea><?=$bookRef?></textarea><br>
  original bookCategory: <textarea><?=$bookCategory?></textarea>
  <div id="app">
    <div>
      <select>
        <option v-for="Namecategory in bookCategorys">{{Namecategory.Category}}</option>
      </select>
    </div>

    <div v-for="book in bookRefs">
      <div><a v-bind:href="'vocab/test/'+book.idbookRef">{{book.bookName}}</a></div>
    </div>
  </div>
</body>
<script src="<?=site_url("public/vue.js");?>"></script>
<script>
  var app = new Vue({
    el: '#app',
    data: {
      bookRefs:<?=$bookRef?>,
      bookCategorys:<?=$bookCategory?>
    }
  })
</script>
</html>
