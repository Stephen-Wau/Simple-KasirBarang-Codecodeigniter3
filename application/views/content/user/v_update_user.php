<div class="card">
	<div class="card-header">
		<h4>Update Barang</h4>
	</div>
	<div class="card-body">
		<form id="form-update-barang" enctype="multipart/form-data" method="post"
			  action="<?= site_url("barang/proses_update") ?>">
			<div class="form-group">
				<label for="kode-barang">Kode Barang</label>
				<input value="<?= $barang->kode_barang ?>" required type="text" maxlength="20" name="kode" id="kode-barang" class="form-control"/>
			</div>
			<div class="form-group">
				<label for="nama-barang">Nama Barang</label>
				<input value="<?= $barang->nama_barang ?>" required type="text" name="nama" id="nama-barang" class="form-control"/>
			</div>
			<div class="form-group">
				<label for="harga-barang">Harga Barang</label>
				<input value="<?= $barang->harga_barang ?>" required type="text" name="harga" id="harga-barang" class="form-control"/>
			</div>
			<div class="form-group">
				<label for="stock-barang">Stock Barang</label>
				<input value="<?= $barang->stock_barang ?>" required type="text" name="stock" id="stock-barang" class="form-control"/>
			</div>
			<div class="form-group">
				<label for="gambar-barang">Gambar Barang</label>
				<div class="input-group">
					<div class="custom-file">
						<input type="file" name="gambar-barang" class="custom-file-input" id="gambar-barang">
						<label class="custom-file-label" for="gambar-barang">Choose file</label>
					</div>
				</div>
			</div>
			<input type="hidden" name="id"  value="<?= $barang->id_barang ?>" />
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
            let validate = $("#form-update-barang").valid();
            if(validate){
                $("#form-update-barang").submit();
			}
        });
        $("#form-update-barang").validate({
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
