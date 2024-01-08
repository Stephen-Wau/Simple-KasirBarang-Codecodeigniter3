<div class="card">
	<div class="card-header">
		<h4>Tambah Barang</h4>
	</div>
	<div class="card-body">
		<form id="form-tambah-barang" enctype="multipart/form-data" method="post"
			  action="<?= site_url("barang/proses_simpan") ?>">
			<div class="form-group">
				<label for="kode-barang">Kode Barang</label>
				<input required type="text" maxlength="20" name="kode" id="kode-barang" class="form-control"/>
			</div>
			<div class="form-group">
				<label for="nama-barang">Nama Barang</label>
				<input required type="text" name="nama" id="nama-barang" class="form-control"/>
			</div>
			<div class="form-group">
				<label for="harga-barang">Harga Barang</label>
				<input required type="text" name="harga" id="harga-barang" class="form-control"/>
			</div>
			<div class="form-group">
				<label for="stock-barang">Stock Barang</label>
				<input required type="text" name="stock" id="stock-barang" class="form-control"/>
			</div>
			<div class="form-group">
				<label for="gambar-barang">Gambar Barang</label>
				<div class="input-group">
					<div class="custom-file">
						<input type="file" name="gambar_barang" class="custom-file-input" id="gambar-barang">
						<label class="custom-file-label" for="gambar-barang">Choose file</label>
					</div>
				</div>
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
            let validate = $("#form-tambah-barang").valid();
            if(validate){
                $("#form-tambah-barang").submit();
			}
        });
        $("#form-tambah-barang").validate({
            rules: {
                kode: {
                    alphanumeric: true
                },
                harga: {
                    digits: true
                },
                stock: {
                    digits: true
                }
            },
            messages: {
                kode: {
                    alphanumeric: "Hanya Boleh Angka, Huruf dan Undescore"
                }
            },
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
