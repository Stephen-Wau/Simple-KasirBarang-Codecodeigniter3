<?php


class App extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model(array("ModelBarang", "ModelTransaksi", "ModelItemTransaksi"));
		isLogin();
	}

	public function index() {
		$listBarang = $this->ModelBarang->getAll();
		$data = array(
			"header" => "Barang",
			"page" => "content/app/v_app",
			"barangs" => $listBarang
		);
		$this->load->view("layout/main", $data);
	}

	public function proses_transaksi() {
		$str_item_transaksi = $this->input->post("item_transaksi");
		$itemTransaksi = json_decode($str_item_transaksi);
		//1.cari dulu nilai terbesar dari id yang terakhir
		$queryMaxId = "select ifnull(max(nomor),0) as max from transaksi "
			. "WHERE MONTH(tanggal_transaksi) = MONTH(NOW()) AND YEAR(tanggal_transaksi)=YEAR(NOW())";
		$max = $this->db->query($queryMaxId)->row()->max;
		$max = (int) $max;
		// "TRX/2020/04/0120"
		$strPad = str_pad($max + 1, 4, "0", STR_PAD_LEFT);
		$noTransaksi = "TRX/" . date("Y/m") . "/" . $strPad;
		$dataTransaksi = array(
			"no_transaksi" => $noTransaksi,
			"tanggal_transaksi" => date("Y-m-d H:i:s"),
			"nomor" => ($max + 1)
		);
		$idTransaksi = $this->ModelTransaksi->insertGetId($dataTransaksi);
		//inputkan item transaksi
		$index = 0;
		foreach ($itemTransaksi as $item) {
			$itemTransaksi[$index++]->id_transaksi = $idTransaksi;
		}
		$result = $this->ModelItemTransaksi->insertBatch($itemTransaksi);
		echo $result;
	}
}
