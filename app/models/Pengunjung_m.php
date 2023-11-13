<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengunjung_m extends CI_Model {
    public function getKasMasjid()
	{
		$this->db->select('(SUM(pemasukan) - SUM(pengeluaran)) AS saldo');
		return $this->db->get('tb_kas_masjid')->row();
	}

	public function getZakatFitrahUang()
	{
		$this->db->select('
			((SELECT SUM(jumlah_zakat) FROM tb_zakat_fitrah WHERE status = "masuk" AND bentuk_zakat = "uang tunai") -
			(SELECT SUM(jumlah_zakat) FROM tb_zakat_fitrah WHERE status = "keluar" AND bentuk_zakat = "uang tunai")) AS sisa_zakat_fitrah');
		return $this->db->get('tb_zakat_fitrah')->row();
	}

	public function getZakatMalUang()
	{
		$this->db->select('
			((SELECT SUM(jumlah_zakat) FROM tb_zakat_mal WHERE status = "masuk" AND satuan_zakat = "RUPIAH") -
			(SELECT SUM(jumlah_zakat) FROM tb_zakat_mal WHERE status = "keluar" AND satuan_zakat = "RUPIAH")) AS sisa_zakat_mal');
		return $this->db->get('tb_zakat_mal')->row();
	}
}