<div class="card">
	<div class="card-header">
		<h4>Daftar Barang</h4>
	</div>
	<div class="card-body">
		<table class="table">
			<thead>
			<tr>
				<th>#</th>
				<th>Kode</th>
				<th>Nama</th>
				<th>Harga</th>
				<th>Stock</th>
				<th>Gambar</th>
				<th>Action</th>
			</tr>
			</thead>
			<tbody>
			<?php
			$no = 1;
			foreach ($barangs as $barang) {
				?>
				<tr>
					<td><?= $no++ ?></td>
					<td><?= $barang->kode_barang ?></td>
					<td><?= $barang->nama_barang ?></td>
					<td><?= $barang->harga_barang ?></td>
					<td><?= $barang->stock_barang ?></td>
					<td>
						<img height="70"
							 onerror="this.onerror=null;this.src='<?= base_url() . 'assets/images/no-image.png' ?>';"
							 src="<?= base_url()."upload/images/".$barang->gambar_barang ?>" alt="Gambar_Barang"/>

					</td>
					<td>
						<a href="<?= site_url("barang/update/$barang->id_barang") ?>" class="btn btn-sm btn-warning">
							<i class="fas fa-edit"></i>
						</a>
						<a href="#" data-id="<?= $barang->id_barang ?>" class="btn btn-sm btn-danger btn-delete-barang"><i
								class="fas fa-trash"></i></a>
					</td>
				</tr>
				<?php
			}
			?>
			</tbody>
		</table>
	</div>
	<div class="card-footer">
		<a href="<?= site_url("barang/tambah") ?>" class="btn btn-primary">
			<i class="fas fa-plus"></i> Tambah Barang
		</a>
		<a href="<?= site_url("report/barang") ?>" target="_blank" class="btn btn-success">
			<i class="fas fa-file-excel"></i> Report Barang
		</a>
	</div>
</div>

<div class="modal fade" id="modal-confirm-delete">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body">
				<h4>Anda Yakin Hapus data ini?</h4>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-info" data-dismiss="modal">Tidak</button>
				<button type="button" class="btn btn-danger" id="btn-delete">Hapus</button>
			</div>
		</div>
	</div>
</div>
<form id="form-delete" method="post" action="<?= site_url('barang/proses_hapus') ?>">

</form>
<script>
    $(function () {
        let idBarang = 0;
        $(".btn-delete-barang").on("click", function () {
            idBarang = $(this).data("id");
            console.log(idBarang);
            $("#modal-confirm-delete").modal("show");
        });
        $("#btn-delete").on("click", function () {
//panggil url untuk hapus data
            let inputId = $("<input>")
                .attr("type", "hidden")
                .attr("name", "id")
                .val(idBarang);
            let formDelete = $("#form-delete");
            formDelete.empty().append(inputId);
            formDelete.submit();
            $("#modal-confirm-delete").modal("hide");
        });
    });
</script>
