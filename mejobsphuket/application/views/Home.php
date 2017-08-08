<!DOCTYPE html>
<html>
<head>
<meta Content-type: "application/json"; charset="utf-8" >
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Me Jobs Phuket</title>
<link href="<?=site_url("public/mui-0.9.20/css/mui.min.css");?>" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="<?=site_url("public/font-awesome-4.7.0/css/font-awesome.min.css");?>">
<link rel="stylesheet" href="<?=site_url("public/pure-release-1.0.0/pure-min.css");?>">
<link rel="stylesheet" href="<?=site_url("public/mewebcss/meweb.css");?>">
</head>
<body>
	<div class="mui-appbar">
		<div class="mui-container">
	  <table width="100%">
	    <tr class="mui--appbar-height">
	      <td class="mui--text-title">Me Jobs Phuket </td>
				<td align="center">
					<form class="mui-form--inline">
					  <div class="mui-textfield">
					    <input type="text">
					  </div>
					  <button class="mui-btn">submit</button>
					</form>
				</td>
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

	<div class="content">
		<div class="mui-row">
			<div class="mui-col-md-12">
				<div class="mui-panel" id="cover">

				</div>
			</div>
		</div>
	</div>

	<!-- Start Feed jobs -->
		<div class="content" id="jobs">

			<div class="mui-row">

				<div class="mui-col-md-1">
					<div class="mui-panel"></div>
					<div class="mui-panel"></div>
					<div class="mui-panel"></div>
					<div class="mui-panel"></div>
					<div class="mui-panel"></div>
				</div>

				<div class="mui-col-md-7">
					<div class="mui-panel">
						<button class="mui-btn mui-btn--small mui-btn--primary btn-seeker"> <i class="fa fa-university" aria-hidden="true"></i> อยากได้คน </button>
						<button class="mui-btn mui-btn--small mui-btn--primary"> <i class="fa fa-user" aria-hidden="true"></i> อยากได้งาน </button>
					</div>

					<div id="jobsarea">

						<div class="mui-panel"></div>
						<div class="mui-panel"></div>
						<div class="mui-panel"></div>
						<div class="mui-panel"></div>
						<div class="mui-panel"></div>

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
</body>
<script src="<?=site_url("public/jquery/dist/jquery.min.js");?>"></script>
<script src="<?=site_url("public/mui-0.9.20/js/mui.js");?>"></script>
<script src="<?=site_url("public/countdownjs/countdown.min.js");?>"></script>
<script src="<?=site_url("public/mewebjs/meweb.js");?>"></script>
<script src="<?=site_url("/service-worker.js");?>"></script>
<script>
	$( document ).ready(function(){
		mewebjs.init({
			base_url: '<?=base_url();?>'
		});
	});
</script>
</html>
