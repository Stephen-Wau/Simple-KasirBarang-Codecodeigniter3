<div class="card">
	<div class="card-header">
		<h4>Tambah User</h4>
	</div>
	<div class="card-body">
		<form id="form-tambah" method="post" action="<?= site_url("user/proses_simpan") ?>">
			<div class="form-group">
				<label for="">Nama User</label>
				<input required type="text" maxlength="20" name="nama_user" class="form-control"/>
			</div>
			<div class="form-group">
				<label for="">Email User</label>
				<input required type="email" name="email_user"  class="form-control"/>
			</div>
			<div class="form-group">
				<label for="">Role User</label>
				<select name="role_user" id="" required class="form-control">
					<option value="" disabled selected>Pilih Role</option>
					<option value="admin">Admin</option>
					<option value="kasir">Kasir</option>
				</select>
			</div>
		</form>
	</div>
	<div class="card-footer">
		<button id="btn-save-barang" type="button" class="btn btn-success">
			<i class="fas fa-save"></i> Simpan
		</button>
	</div>
</div>
<script>
    $(function () {
        $("#btn-save-barang").on("click", function () {
            let validate = $("#form-tambah").valid();
            if(validate){
                $("#form-tambah").submit();
			}
        });
        $("#form-tambah-barang").validate({
            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
    });
</script>
