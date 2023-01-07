
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
					<li>
						<a href="<?php echo site_url('votes'); ?>">
							<div class="nav-ico text-center hidden-xs">
								<span class="fui fui-check-circle"></span>
							</div>
							Suara
						</a>
					</li>
					<li class="active">
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
                                <table id="daftar-peserta" class="table table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Username</th>
                                            <th>Kelas</th>
                                            <th>Status</th>
                                            <th width="40">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($members as $member):?>
                                            <tr>
                                                <td><?php echo $member->fullname;  ?></td>
                                                <td><?php echo $member->username;  ?></td>
                                                <td><?php echo $member->class;  ?></td>
                                                <td><?php echo $member->active;  ?></td>
                                                <td>
                                                    <button type="button" onclick="edit(<?php echo $member->id; ?>)" class="btn btn-warning btn-xs" >
                                                        Edit
                                                    </button>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Username</th>
                                            <th>Kelas</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
		                </div>
		            </div>
		        </div>
		    </div>
		</div>
    
    <div class="modal fade" id="myModal"> 
        <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                   <h5 class="modal-title"><span class="glyphicon glyphicon-user"></span> Update data</h5>
               </div>
                <div class="modal-body">
                    <?php echo form_open('', array('id' => 'form1', 'class' => 'form-horizontal')); ?>
                        <input type="hidden" name="id"/>
                        <div class="form-group">
                            <label for="namaDepan" class="col-md-4">Nama Depan</label>
                            <div class="col-md-8">
                                <input type="text" id="namaDepan" name="first_name" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="namaBelakang" class="col-md-4">Nama Belakang</label>
                            <div class="col-md-8">
                                <input type="text" id="namaBelakang" name="last_name" class="form-control">
                            </div>
                            
                        </div>
                        <div class="form-group">
                            <label for="namaPengguna" class="col-md-4">Username</label>
                            <div class="col-md-8">
                                <input type="text" id="namaPengguna" name="username" class="form-control">
                            </div>
                            
                        </div>
                        <div class="form-group">
                            <label for="kelas" class="col-md-4">Kelas</label>
                            <div class="col-md-8">
                                <input type="text" id="kelas" name="class" class="form-control">
                            </div>
                            
                        </div>
                        <div class="form-group">
                            <label for="kataSandi" class="col-md-4">Kata Sandi</label>
                            <div class="col-md-8">
                                <input type="password" id="kataSandi" name="password" class="form-control">
                            </div>
                            
                        </div>

                    <?php echo form_close(); ?>
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="update()" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
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
            $('#daftar-peserta').dataTable();
        });
        
        function edit(id)
        {
            $.ajax({
                url : "<?php echo site_url('admincontroller/edit/'); ?>" + id,
                type : "GET",
                dataType: "JSON",
                success: function(data){
                    $('#form1 [name = "id"]').val(data.id);
                    $('#form1 [name = "first_name"]').val(data.first_name);
                    $('#form1 [name = "last_name"]').val(data.last_name);
                    $('#form1 [name = "username"]').val(data.username);
                    $('#form1 [name = "class"]').val(data.class);
                
                    $('#myModal').modal('show');
                },
                error: function(jqXHR, textStatus, errorThrown){
                    alert('Tidak dapat memuat data dari AJAX');
                }
            });
        }
        
        function update()
        {
            $.ajax({
                url: "<?php echo site_url('admincontroller/update_user') ?>",
                type: "POST",
                data: $('#form1').serialize(),
                dataType: "JSON",
                success: function(data)
                {
                    $('#myModal').modal('hide');
                    location.reload();
                    alert("Berhasil");
                },
                error: function(jqXHR, textStatus, errorThrown)
                {
                    alert("Terjadi kesalahan ketika menyimpan data");
                }
            });
        }
    </script>
	