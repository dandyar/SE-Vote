
<body>
	<nav class="navbar navbar-inverse navbar-lg navbar-embossed">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#fui-navbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a href="" class="navbar-brand">SE - VOTE</a>
			</div>
			<div class="collapse navbar-collapse" id="fui-navbar">
				<ul class="nav navbar-nav">
					<li class="active">
						<a href="<?php echo site_url('dashboard'); ?>">
							<div class="nav-ico text-center hidden-xs">
								<span class="fui fui-home"></span>
							</div>
							Beranda
						</a>
					</li>
					<li>
						<a href="<?php echo site_url('votes'); ?>">
							<div class="nav-ico text-center hidden-xs">
								<span class="fui fui-check-circle"></span>
							</div>
							Suara
						</a>
					</li>
					<li>
						<a href="<?php echo site_url('users'); ?>">
							<div class="nav-ico text-center hidden-xs">
								<span class="fui fui-user"></span>
							</div>
							Peserta
						</a>
					</li>
				</ul>
				<ul id="profil" class="nav navbar-nav navbar-right">
					<li class="dropdown">
						<a class="dropdown-toggle" href="#" data-toggle="dropdown" >
							<?php echo $user->first_name . ' ' . $user->last_name ?><span class="caret"></span>
						</a>
						<ul class="dropdown-menu">
							<li>
								<a href="<?php echo site_url('auth/logout'); ?>"><span class="fa fa-sign-out "></span>&nbsp; Keluar</a>
							</li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-sm-4">
				<div class="panel panel-default mybox-info">
					<div class="panel-body">
						<div class="row">
							<div class="col-xs-5">
								<div class="box-icon blue text-center">
									<span class="fa fa-group fa-5x visible-lg"></span>
									<span class="fa fa-group fa-4x visible-md"></span>
									<span class="fa fa-group fa-2x visible-sm"></span>
									<span class="fa fa-group fa-3x visible-xs"></span>
								</div>
							</div>
							<div class="col-xs-7 box-info">
								<h2><?php echo $members; ?></h2>
								<p>Peserta</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4 col-sm-4">
				<div class="panel panel-default mybox-info">
					<div class="panel-body">
						<div class="row">
							<div class="col-xs-5">
								<div class="box-icon green text-center">
									<span class="fa fa-tasks fa-5x visible-lg"></span>
									<span class="fa fa-tasks fa-4x visible-md"></span>
									<span class="fa fa-tasks fa-2x visible-sm"></span>
									<span class="fa fa-tasks fa-3x visible-xs"></span>
								</div>
							</div>
							<div class="col-xs-7 box-info">
								<h2><?php echo $votes; ?></h2>
								<p>Total Suara</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4 col-sm-4">
				<div class="panel panel-default mybox-info">
					<div class="panel-body">
						<div class="row">
							<div class="col-xs-5">
								<div class="box-icon yellow text-center">
									<span class="fa fa-desktop fa-5x visible-lg"></span>
									<span class="fa fa-desktop fa-4x visible-md"></span>
									<span class="fa fa-desktop fa-2x visible-sm"></span>
									<span class="fa fa-desktop fa-3x visible-xs"></span>
								</div>
							</div>
							<div class="col-xs-7 box-info">
								<h2><?php echo $admin; ?></h2>
								<p>Admin</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-8">
                            <div id="quickCount" class="panel panel-success">
					<div class="panel-heading">
						<h4 class="panel-title">Quick Count</h4>
					</div>
                                        <div class="panel-body" style="padding: 10px 0;">
                                            <?php
                                                $totalSuara = $votes;
                                                foreach($a->result() as $votes) {
                                            ?>
                                                <div class="col-md-4" style="border-right: 1px solid #f4f4f4">
                                                    <div class="myChart text-center">
                                                        <input class="knob" data-width="120" data-height="120" data-fgColor="#3498db" data-thickness=".3" readonly value="<?php echo $votes->total / $totalSuara * 100 ;?>">
                                                        <p><?php echo $votes->name1;?></p>
                                                        <p><?php echo $votes->name2; ?></p>
                                                    </div>
                                                </div>
                                            <?php } ?>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="panel panel-danger">
					<div class="panel-heading">
						<h4 class="panel-title">Pemberitahuan</h4>
					</div>
					<div class="panel-body mypanel">
						<?php foreach ($notifications as $text) : ?>
        		<div class="media" style="border-bottom: 1px solid #f4f4f4;">
            	<a class="pull-left" href="javascript:void(0)">
              	<?php echo img($admin_img); ?>
            	</a>
            	<div class="media-body">
                	<h4 class="media-heading"><?php echo $text->updated_by; ?></h4>
                  <i>
									<?php
									 	$now = time();
										echo timespan($text->updated_on, $now) . ' ago';
									?>
									</i>
                <p><?php echo $text->description; echo $text->id; ?></p>
              </div>
            </div>
					<?php endforeach; ?>
					</div>
				</div>
			</div>
		</div>
	</div>

        <script src="<?php echo base_url('assets/js/jquery-3.2.1.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/jquery.knob.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/fui/js/flat-ui.min.js'); ?>"></script>
	<script>
        $(document).ready(function(){
            $('#daftar-peserta').dataTable();

            $(".knob").knob({
                format : function (value) {
                    return value + '%';
                }
            });



        });
    </script>
