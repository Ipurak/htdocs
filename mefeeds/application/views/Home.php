<!DOCTYPE html>
<html>
<head>
<meta Content-type: "application/json"; charset="utf-8" >
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Me Jobs Phuket</title>
<link rel="stylesheet" href="<?=site_url("public/mui-0.9.20/css/mui.css");?>" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="<?=site_url("public/font-awesome-4.7.0/css/font-awesome.min.css");?>" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="<?=site_url("public/pure-release-1.0.0/pure-min.css");?>" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="<?=site_url("public/mewebcss/meweb.css");?>" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="<?=site_url("public/animate/animate.css");?>" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="<?=site_url("public/iziModal/css/iziModal.css");?>" rel="stylesheet" type="text/css">

<style>
.infinite{
-webkit-animation-duration: 1s;
-webkit-animation-delay: 1s;
-webkit-animation-iteration-count: infinite;
}
</style>

</head>
<body>

	<div class="mui-appbar"><!-- menu -->
		<div class="mui-container">
	  <table width="100%">
	    <tr class="mui--appbar-height">
	      <td class="mui--text-title">Me Jobs Phuket </td>
	      <td align="right">
	        <ul class="mui-list--inline mui--text-body2">
						<li><a href="#" id="menu-feed">ฟีดงาน</a></li>
						<li><a href="#" id="menu-post">ประกาศงาน</a></li>
						<li><a href="#" id="menu-resume">ฝากประวัติ</a></li>
	        </ul>
	      </td>
	    </tr>
	  </table>
	</div>
</div>

<div class="mui-container">

	<div class="content"><!-- รูปหน้าปก -->
		<div class="mui-row">
			<div class="mui-col-md-12">
				<div class="mui-panel" id="cover">

				</div>
			</div>
		</div>
	</div>

		<div class="content">

			<div class="mui-row">

				<div class="mui-col-md-3">
					<div class="mui-panel"></div>
					<div class="mui-panel"></div>
					<div class="mui-panel"></div>
					<div class="mui-panel"></div>
					<div class="mui-panel"></div>
				</div>

				<div class="mui-col-md-5">

					<!-- ADS -->
					<div class="mui-panel">
						<button class="mui-btn mui-btn--small mui-btn--primary btn-seeker"> <i class="fa fa-university" aria-hidden="true"></i> อยากได้คน </button>
						<button class="mui-btn mui-btn--small mui-btn--primary"> <i class="fa fa-user" aria-hidden="true"></i> อยากได้งาน </button>
					</div>
					<div class="mui-panel"></div>
					<div class="mui-panel"></div>
					<div class="mui-panel"></div>
					<div class="mui-panel"></div>

					<!-- Feed -->
					<div id="feed">

						<div class="mui-panel" v-for="job in jobs">
							<div class="mui-row"><!-- Ref -->
								<div class="mui-col-md-8">
									<span class="small-text">หมายเลขอ้างอิง: {{job.ref}}</span>
								</div>
								<div class="mui-col-md-4">
									<span class="small-text"><i class="fa fa-clock-o" aria-hidden="true"></i> {{job.dateauto}}</span>
								</div>
							</div>
							<div class="mui-row"><!-- สถานะ และ บันทึกลงในเฟสบุ๊ค -->
								<div class="mui-col-md-3">
									<div v-if="job.urgent === '1'">
										<button class="mui-btn mui-btn--small mui-btn--danger left"><i class="fa fa-bell-o animated swing infinite" aria-hidden="true"></i> ด่วนมาก!</button>
									</div>
								</div>
								<div class="mui-col-md-9">
									<button class="mui-btn mui-btn--small mui-btn--primary right"><i class="fa fa-bookmark" aria-hidden="true"></i> บันทึกลงใน Facebook</button>
								</div>
							</div>

							<div class="mui-row"><!-- หัวข้องาน -->
								<div class="mui-col-md-12">
									<a href="#company"><b>{{job.company}}</b></a> ได้ประกาศ <b>{{job.title}}</b>
								</div>
							</div>

							<div class="mui-row"><!-- รายละเอียด -->
								<div class="mui-col-md-12">
									<div style="word-break: break-all;">
										{{job.description}}
										<a href="#view" v-on:click="view">ดูเพิ่มเติม</a>
									</div>
								</div>
							</div>

							<div class="mui-row"><!-- รูปประกอบ -->
								<div class="mui-col-md-12">
									<img src="<?=site_url("public/images/j1.jpg");?>" style="width:100%;height:auto;">
								</div>
							</div>

							<div class="mui-row"><!-- ปุ่มโซเชียล -->
								<div class="mui-col-md-12">
									<div class="pure-button-group" role="group" aria-label="...">
										<div class="right">
											<button class="pure-button" v-on:click="view"><i class="fa fa-eye" aria-hidden="true"></i> ดูเพิ่มเติม</button>
											<button class="pure-button"><i class="fa fa-facebook-square" aria-hidden="true"></i> ถูกใจ</button>
									    <button class="pure-button"><i class="fa fa-twitter-square" aria-hidden="true"></i> แชร์</button>
											<button class="pure-button"><i class="fa fa-facebook-square" aria-hidden="true"></i> แชร์</button>
										</div>
									</div>
								</div>
							</div>

						</div>

					</div>

				</div>

    		<div class="mui-col-md-4">

					<div id="ads">
						<div class="mui-panel">
							<img src="<?=site_url("public/images/unnamed.png");?>">
						</div>
						<div class="mui-panel"></div>
						<div class="mui-panel"></div>
						<div class="mui-panel"></div>
						<div class="mui-panel"></div>
						<div class="mui-panel"></div>
						<div class="mui-panel"></div>
						<div class="mui-panel"></div>
						<div class="mui-panel"></div>
						<div class="mui-panel"></div>
						<div class="mui-panel"></div>
						<div class="mui-panel"></div>
						<div class="mui-panel"></div>
						<div class="mui-panel"></div>
						<div class="mui-panel"></div>
						<div class="mui-panel"></div>
						<div class="mui-panel"></div>
						<div class="mui-panel"></div>
						<div class="mui-panel"></div>
						<div class="mui-panel"></div>
						<div class="mui-panel"></div>
						<div class="mui-panel"></div>
						<div class="mui-panel"></div>
						<div class="mui-panel"></div>
						<div class="mui-panel"></div>
					</div>

				</div>

			</div>

		</div>
	<!-- End Feed jobs -->

	<!-- Start Me post -->
		<div id="mepost-modal">
			<div class="content" id="mepost">
				<div class="mui-panel">
					<div class="mui-row">
						<div class="mui-col-md-12">
							<button class="mui-btn mui-btn--fab mui-btn--danger closemodel" id="closemodel">X</button>
						</div>
					</div>
					<div class="mui-row">
						<div class="mui-col-md-8 mui-col-md-offset-2">
							<form class="pure-form">
								<fieldset>
				 					<legend><i class="fa fa-arrow-circle-up" aria-hidden="true"></i> ดันโพสต์</legend>
										<div class="mui-row">
											<div class="mui-col-md-12">
												<button type="button" class="mui-btn mui-btn--raised mui-btn--primary pumppost" name="status" style="max-width: 89%;">
													<i class="fa fa-arrow-circle-up" aria-hidden="true"></i> ดันโพสต์
												</button>
											</div>
										</div>
								</fieldset>
								<fieldset>
				 					<legend><i class="fa fa-user-circle-o" aria-hidden="true"></i> หัวข้องาน / ข้อมูลทั่วไป</legend>
										<div class="mui-row">
											<div class="mui-col-md-12">
												<input type="text" name="title" placeholder="หัวข้องาน" style="width: 100%;" />
											</div>
										</div>
										<!-- <input type="text" name="dateauto" /></br> -->
										<div class="mui-row">
											<div class="mui-col-md-12">
													<input type="text" name="company" placeholder="ชื่อบริษัท" style="width: 100%;" />
											</div>
										</div>
										<div class="mui-row">
											<div class="mui-col-md-12">
													<input type="text" name="name" placeholder="ชื่อจริง" style="width: 100%;" />
											</div>
										</div>
										<div class="mui-row">
											<div class="mui-col-md-12">
													<input type="email" name="email" placeholder="อีเมล" style="width: 100%;" />
											</div>
										</div>
										<div class="mui-row">
											<div class="mui-col-md-12">
												<button type="button" class="mui-btn mui-btn--raised mui-btn--primary" id="updateinfo">
													<i class="fa fa-refresh" aria-hidden="true"></i> อัพเดทข้อมูลทั่วไป
												</button>
											</div>
										</div>
								</fieldset>
								<fieldset>
				 					<legend><i class="fa fa-comments" aria-hidden="true"></i> สถานะโพสต์</legend>
									<div id="status">
										<div class="mui-dropdown">
										  <button class="mui-btn mui-btn--primary" data-mui-toggle="dropdown">
										    <i class="fa fa-stop-circle-o" aria-hidden="true"></i> ยังไม่เผยแพร</a>
										    <span class="mui-caret"></span>
										  </button>
										  <ul class="mui-dropdown__menu" id="list-status-view">
										    <li value="0"><a href="#stop"><i class="fa fa-stop-circle-o" aria-hidden="true"></i> ยังไม่เผยแพร</a></li>
										    <li value="1"><a href="#available"><i class="fa fa-search-plus" aria-hidden="true"></i> เปิดรับสมัคร</a></li>
										    <li value="2"><a href="#close"><i class="fa fa-check-circle" aria-hidden="true"></i> ปิดรับสมัคร</a></li>
										    <li value="-1"><a href="#delete"><i class="fa fa-trash" aria-hidden="true"></i> ลบโพสต์</a></li>
										  </ul>
										</div>
									</div>
								</fieldset>
								<fieldset>
					 				<legend>รายละเอียดของงาน</legend>
									<button type="button" class="mui-btn mui-btn--raised mui-btn--primary" id="btn-update-desc"><i class="fa fa-refresh" aria-hidden="true"></i> อัพเดทรายละเอียด</button>
									<textarea name="description" rows="42" style="width:100%;"></textarea><br /><br />
								</fieldset>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	<!-- End Me post -->
	</div>


	<div id="login">

		<div style="word-wrap: break-word;">
			<p>
				<form class="pure-form">
					<legend>มีบัญชีแล้ว - เข้าสู่ระบบ</legend>
			    <fieldset class="pure-group" style="text-align: -webkit-center;">
						<input type="email"     class="pure-input-1" placeholder="อีเมล"   value="hihigolgol@hotmail.com">
						<input type="password"  class="pure-input-1" placeholder="รหัสผ่าน" value="1234">
						<div class="pure-controls">
							<button type="button" class="pure-button pure-input-1-2 pure-button-primary"><i class="fa fa-sign-in" aria-hidden="true"></i> เข้าสู่ระบบ</button>
							<button type="button" class="pure-button pure-input-1-2 pure-button-primary"><i class="fa fa-facebook-official" aria-hidden="true"></i> เข้าระบบผ่านเฟสบุ๊ค</button>
						</div>
			    </fieldset>
				</form>
			</p>
			<p>
				<form class="pure-form">
					<legend>ประกาศงาน - สมัครสมาชิก</legend>
			    <fieldset class="pure-group" style="text-align: -webkit-center;">
							<input type="text"  class="pure-input-1" placeholder="ชื่อ-นามสกุล">
			        <input type="text"  class="pure-input-1" placeholder="รหัสผ่าน">
							<input type="text"  class="pure-input-1" placeholder="อีเมล">
			        <input type="email" class="pure-input-1" placeholder="ยืนยันอีเมล">
							<input type="text"  class="pure-input-1" placeholder="ชื่อห้างร้าน-บริษัท">
							<div class="pure-controls">
								<button type="button" class="pure-button pure-input-1-2 pure-button-primary"><i class="fa fa-facebook-official" aria-hidden="true"></i> สมัครผ่านเฟสบุ๊ค</button>
						    <button type="button" class="pure-button pure-input-1-2 pure-button-primary">ขั้นตอนต่อไป <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></button>
							</div>
			    </fieldset>

				</form>
			</p>
		</div>

	</div><!-- Login -->

	<div id="panel">

		<div style="word-wrap: break-word;">
			<p>
				<form class="pure-form">
					<legend>ประกาศงานของท่าน</legend>
			    <fieldset class="pure-group" style="text-align: -webkit-center;">
						<div id="simple" class="pure-button-group" role="group" aria-label="...">
							<button type="button" class="pure-button">
								<i class="fa fa-envira" aria-hidden="true"></i>
								เรียบง่าย
							</button>
							<button type="button" class="pure-button">
								<i class="fa fa-list-ol" aria-hidden="true"></i>
								หลายตำแหน่ง
							</button>
							<button type="button" class="pure-button">
								<i class="fa fa-building" aria-hidden="true"></i>
								เป็นทางการ
							</button>
						</div>
							<input type="text" class="pure-input-1" placeholder="หัวข้อสมัครงาน">
							<textarea class="pure-input-1" rows="10" placeholder="รายละเอียดงาน"></textarea>
							<input type="text" class="pure-input-1" placeholder="ใส่งานชื่อประเภทงานที่เกี่ยวข้อง">
			    </fieldset>
				</form>
			</p>
			<p>
				<form class="pure-form">
					<legend>ประกาศงานของท่าน {{ post.company }}</legend>
			    <fieldset class="pure-group" style="text-align: -webkit-center;">
						<input type="text"     class="pure-input-1" placeholder="ชื่อห้างร้าน-บริษัท" v-bind="post.company">
						<input type="text"     class="pure-input-1" placeholder="ชื่อ-นามสกุล">
						<input type="email"    class="pure-input-1" placeholder="อีเมล">
						<input type="password" class="pure-input-1" placeholder="รหัสผ่านใหม่">
						<input type="password" class="pure-input-1" placeholder="ยืนยันรหัสผ่านใหม่">
						<div class="pure-controls">
							<button type="button" class="pure-button pure-input-1-2 pure-button-primary"><i class="fa fa-sign-in" aria-hidden="true"></i> เข้าสู่ระบบ</button>
							<button type="button" class="pure-button pure-input-1-2 pure-button-primary"><i class="fa fa-facebook-official" aria-hidden="true"></i> เข้าระบบผ่านเฟสบุ๊ค</button>
						</div>
			    </fieldset>
				</form>
			</p>
		</div>

	</div><!-- Panel -->

	<sweet-modal icon="success" ref="modal" title="New Modal">
    Success!
    <sweet-button slot="button">That's fine!</sweet-button>
	</sweet-modal>
	<button class="btn btn-primary" @click="open">Open sesame!</button>

</body>

<script src="<?=site_url("public/jquery/dist/jquery.min.js");?>"></script>
<script src="<?=site_url("public/vue/dist/vue.min.js");?>"></script>
<script src="<?=site_url("public/axios/dist/axios.min.js");?>"></script>
<script src="<?=site_url("public/mui-0.9.20/js/mui.js");?>"></script>
<script src="<?=site_url("public/countdownjs/countdown.min.js");?>"></script>
<script src="<?=site_url("public/mewebjs/meweb.js");?>"></script>
<script src="<?=site_url("public/iziModal/js/iziModal.js");?>"></script>
<script src="<?=site_url("public/sweet-modal-vue/dist/sweet-modal.js");?>"></script>

<script src="<?=site_url("/service-worker.js");?>"></script>

<script>
	$( document ).ready(function(){
		mewebjs.init({
			base_url: '<?=base_url();?>'
		});
	});
</script>
</html>
