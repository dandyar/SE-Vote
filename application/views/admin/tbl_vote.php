
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
					<li>
						<a href="<?php echo site_url('dashboard'); ?>">
							<div class="nav-ico text-center hidden-xs">
								<span class="fui fui-home"></span>
							</div>
							Beranda
						</a>
					</li>
					<li class="active">
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
							<?php echo $user->first_name . ' ' . $user->last_name ?> <span class="caret"></span>
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
                <div class="col-md-12">
                    <div id="myContent" class="panel panel-default">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table id="suara" class="table table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nama</th>
                                            <th>Kelas</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($members->result() as $member): ?>
                                        <tr>
                                            <td><?php echo $member->id; ?></td>
                                            <td><?php echo $member->fullname; ?></td>
                                            <td><?php echo $member->class; ?></td>
                                            <td><?php echo str_replace(0, "Berhasil", $member->active); ?></td>
                                            
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nama</th>
                                            <th>Kelas</th>
                                            <th>Status</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
	</div>
	
    <script src="<?php echo base_url('assets/js/jquery-3.2.1.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/fui/js/flat-ui.min.js'); ?>"></script>
	<script>
        $(document).ready(function(){
            $('#suara').dataTable();
        });
    </script>
	