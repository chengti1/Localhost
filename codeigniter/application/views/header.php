
<nav class="navbar navbar-default navbar-fixed-top" role = "navigation" style="margin-bottom:0;padding-bottom:0;overflow:hidden;">
    <div class="container">
        <div class="col-md-12  col-sm-12  col-xs-12">
            <div class="row">
					<div class="col-md-6 col-sm-6 col-xs-6">
						<div class="navbar-text text-left nopadding">
							<img alt="Brand" src="images/header/logo.png" />
						</div>
					</div>
					<div class="col-md-6 col-sm-6 col-xs-6">
						<div class="navbar-text nopadding pull-right">
								<div class="firefly-nav-user">
									<div style="float:left;padding-top:5px;">
										<span>admin</span>
										<a href="login.php"><span>Logout</span></a>
									</div>
									<div class="hidden-xs" style="float:left;">
										<img class="right" src="images/header/tmp-user.png">
									</div>
									<div class="hidden-md" style="float:left;margin-left:10px;padding-right:0;margin-right:-20px">
									<button type="button" class="navbar-toggle btn btn-default" 
								 data-toggle = "collapse" data-target = "#example-navbar-collapse">
										 <span class = "sr-only">Toggle navigation</span>
										 <span class = "icon-bar"></span>
										 <span class = "icon-bar"></span>
										 <span class = "icon-bar"></span>
									  </button>
									</div>
								</div>

									
						</div>
					</div>

            </div>
            <div class="row">
                <div class="col-md-7 col-sm-7 col-xs-12">
					<div class="collapse navbar-collapse" id="example-navbar-collapse">
						<ul class="nav navbar-nav" style="margin-top:6px;overflow:hidden;">
							<li <?php if($_GET['show']=="main") echo 'class="active"'?>>
								<a href="index.php?show=main"><span class="glyphicon glyphicon-home"></span> 主頁</a>
							</li>
							<li class="divider-vertical"></li>
							<li <?php if($_GET['show']=="owner") echo 'class="active"'?>>
								<a href="index.php?show=owner"><span class="glyphicon glyphicon-user"></span> 船家</a>
							</li>
							<li class="divider-vertical"></li>
							<li <?php if($_GET['show']=="yacht") echo 'class="active"'?>>
								<a href="index.php?show=yacht"><span class="glyphicon glyphicon-cutlery"></span> 遊艇</a>
							</li>
							<li class="divider-vertical"></li>
							<li <?php if($_GET['show']=="place" OR $_GET['show']=="new-place") echo 'class="active"'?>>
								<a href="index.php?show=place"><span class="glyphicon glyphicon-map-marker"></span> 地點</a>
							</li>
							<li class="divider-vertical"></li>
							<li <?php if($_GET['show']=="calendar") echo 'class="active"'?>>
								<a href="index.php?show=calendar"><span class="glyphicon glyphicon-map-marker"></span> 日曆</a>
							</li>
						</ul>
					</div>
                </div>
                <div class="col-md-5 col-sm-5 col-xs-12 hidden-xs">
                    <div class="navbar-form firefly-nav-input pull-right">
						<div class="input-group">
							<input type="text" class="form-control">
							<div class="input-group-btn">
								<button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search"></span></button>
							</div>
						</div>
                    </div>
					
                </div>
            </div>
        </div>
    </div>
</nav>

<div class="hidden-xs" style="padding-top:96px;width:100%"></div>
<div class="hidden-md hidden-lg  hidden-sm" style="padding-top:43px;width:100%"></div>