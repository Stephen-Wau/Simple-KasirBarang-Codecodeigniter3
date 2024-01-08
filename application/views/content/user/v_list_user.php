<div class="card">
	<div class="card-header">
		<h4>Daftar User</h4>
	</div>
	<div class="card-body">
		<table class="table">
			<thead>
			<tr>
				<th>#</th>
				<th>Nama</th>
				<th>Email</th>
				<th>Role</th>
				<th>Status</th>
				<th>Action</th>
			</tr>
			</thead>
			<tbody>
			<?php
			$no = 1;
			foreach ($users as $row) {
				?>
				<tr>
					<td><?= $no++ ?></td>
					<td><?= $row->nama_user ?></td>
					<td><?= $row->email_user ?></td>
					<td><?= $row->role_user ?></td>
					<td><?= $row->is_active == "1" ? "Aktif" : "Tidak Aktif" ?></td>

					<td>
						<button data-id="<?= $row->id_user ?>" class="btn btn-info btn-xs btn-reset-password">
							<i class="fas fa-key"></i>
						</button>
						<a href="<?= site_url("user/update/$row->id_user") ?>"
						   class="btn btn-xs btn-warning">
							<i class="fas fa-edit"></i>
						</a>
					</td>
				</tr>
				<?php
			}
			?>
			</tbody>
		</table>
	</div>
	<div class="card-footer">
		<a href="<?= site_url("user/tambah") ?>" class="btn btn-primary">
			<i class="fas fa-plus"></i> Tambah User
		</a>
	</div>
</div>
<script>
    $(function () {
        $(".btn-reset-password").on("click", function () {
            let idUser = $(this).data("id");
            $.confirm({
                theme: "material",
                type: "dark",
                title: "Konfirmasi",
                content: "Anda yakin akan mereset password user ini?<br> Password akan dikirim ke email user",
                buttons: {
                    buttonOke: {
                        text: "Reset Password",
                        btnClass: "btn-dark",
                        action: function () {
                            prosesReset(idUser);
                        }
                    },
                    buttonBatal: {
                        text: "Batal",
                        btnClass: "btn-info",
                        action: function () {

                        }
                    }
                }
            });
        });

        function prosesReset(idUser) {
            $.LoadingOverlay("show");
            $.ajax({
                url: window.base_url + "user/reset_password",
                type: "post",
                data: {
                    id_user: idUser
                },
				success:function (result) {
                    $.LoadingOverlay("hide");
					if(result == "1"){
					    $.alert({
							title:"Sukses",
							content:"Password Berhasil di reset"
						});
					}

                }
            })
        }
    });
</script>
