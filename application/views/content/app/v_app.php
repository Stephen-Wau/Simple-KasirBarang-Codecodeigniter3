<div class="row">
	<div class="col-md-4">
		<div class="card">
			<div class="card-header"><h5>Pilih Barang</h5></div>
			<div class="card-body">
				<div class="form-group">
					<label for="">Pilih Barang</label>
					<select name="" class="form-control" id="select-barang">
						<option value="" disabled selected>Pilih Barang</option>
						<?php
						foreach ($barangs as $b) {
							echo "<option data-nama='$b->nama_barang' "
								. "data-harga='$b->harga_barang' "
								. "data-stock='$b->stock_barang' "
								. "data-kode='$b->kode_barang' "
								. "value='$b->id_barang'> "
								. "$b->kode_barang / $b->nama_barang"
								. "</option>";
						}
						?>
					</select>
				</div>
				<div class="form-group">
					<label for="">Kode Barang</label>
					<input readonly type="text" id="kode-barang" class="form-control"/>
				</div>
				<div class="form-group">
					<label for="">Nama Barang</label>
					<input readonly type="text" id="nama-barang" class="form-control"/>
				</div>
				<div class="form-group">
					<label for="">Harga Barang</label>
					<input readonly type="text" id="harga-barang" class="form-control"/>
				</div>
				<div class="form-group">
					<label for="">Jumlah Barang</label>
					<input type="text" id="jumlah-barang" class="form-control"/>
				</div>

			</div>
			<div class="card-footer">
				<button type="button" class="btn btn-primary float-right" id="btn-add-item"><i class="fas fa-plus"></i>
				</button>
			</div>
		</div>
	</div>
	<div class="col-md-8">
		<div class="card">
			<div class="card-header"><h5>Item Transaksi</h5></div>
			<div class="card-body">
				<table id="table-item" class="table">
					<thead>
					<tr>
						<th>Kode</th>
						<th>Nama</th>
						<th>Harga</th>
						<th>Jumlah</th>
						<th>Sub Total</th>
						<th>Action</th>
					</tr>
					</thead>
					<tbody>

					</tbody>
				</table>
			</div>
			<div class="card-footer">
				<button type="button" id="btn-save-transaksi" class="btn btn-primary float-right">
					<i class="fas fa-save"></i> Simpan
				</button>
			</div>
		</div>
	</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script>
<script>
    $(function () {
        let barang;
        $("#select-barang")
            .select2()
            .on("change", function () {
                var optionSelected = $(this).children("option:selected");
                $("#kode-barang").val(optionSelected.data("kode"));
                $("#nama-barang").val(optionSelected.data("nama"));
                $("#harga-barang").val(optionSelected.data("harga"));
                $("#jumlah-barang").val(1);
            });

        $("#btn-add-item").on("click", function () {
            let id = $("#select-barang").val();
            let kodeBarang = $("#kode-barang").val();
            let namaBarang = $("#nama-barang").val();
            let hargaBarang = $("#harga-barang").val();
            let jumlahBarang = $("#jumlah-barang").val();
            let subTotal = parseInt(hargaBarang) * parseInt(jumlahBarang);
            if (kodeBarang != "") {
                let tr = `<tr data-id="${id}">`;
                tr += `<td>${kodeBarang}</td>`;
                tr += `<td>${namaBarang}</td>`;
                tr += `<td>${hargaBarang}</td>`;
                tr += `<td>${jumlahBarang}</td>`;
                tr += `<td>${subTotal}</td>`;
                tr += `<td>`;
                tr += `<button class="btn btn-xs btn-del-item btn-danger"> <i class="fas fa-trash"></i></button>`;
                tr += `</td>`;
                tr += `</tr>`;
                $("#table-item tbody").append(tr);
                $("#select-barang").val("").trigger("change");
                $("#kode-barang").val();
                $("#nama-barang").val();
                $("#harga-barang").val();
                $("#jumlah-barang").val(1);
                $(".btn-del-item").on("click", function () {
                    $(this).parent().parent().remove();
                });
            }
        });
        $("#btn-save-transaksi").on("click", function () {
            $.LoadingOverlay("show");
            let rows = $("#table-item tbody tr");
            let itemTransaksi = [];
            rows.each(function () {
                let row = $(this);
                let item = {
                    id_barang: row.data("id"),
                    harga_item_transaksi: row.children().eq(2).text(),
                    qty_item_transaksi: row.children().eq(3).text(),
                    total_item_transaksi: row.children().eq(4).text(),
                };
                itemTransaksi.push(item);
            });
            let dataKirim = JSON.stringify(itemTransaksi);
            $.ajax({
                url: window.base_url + "app/proses_transaksi",
                type: "POST",
                data: {
                    item_transaksi: dataKirim
                },
                success: function (result) {
					if(parseInt(result) > 0){
					    //success
						window.location.replace(window.base_url+"app");
					}else{
					    //error
					}
                    $.LoadingOverlay("hide");
                }
            });
        });
    });
</script>
