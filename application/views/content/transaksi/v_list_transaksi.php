<div class="card">
	<div class="card-header">
		<h4>Daftar Barang</h4>
	</div>
	<div class="card-body">
		<table class="table">
			<thead>
			<tr>
				<th>#</th>
				<th>No Transaksi</th>
				<th>Tanggal</th>
				<th>Action</th>
			</tr>
			</thead>
			<tbody>
			<?php
			$no = 1;
			foreach ($transaksi as $row) {
				?>
				<tr>
					<td><?= $no++ ?></td>
					<td><?= $row->no_transaksi ?></td>
					<td><?= $row->tanggal_transaksi ?></td>
					<td>
						<a href="#" data-id="<?= $row->id_transaksi ?>"
						   class="btn btn-sm btn-info"><i
								class="fas fa-eye"></i></a>
					</td>
				</tr>
				<?php
			}
			?>
			</tbody>
		</table>
	</div>
</div>
