<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori_model extends CI_Model
{

    public function get_kategori()
    {
        return $this->db->get('kategori')->result_array();
    }

    public function get_kategori_by_id($id_kategori)
    {
        return $this->db->get_where('kategori', array('id_kategori' => $id_kategori))->row_array();
    }
    public function getAllKategori()
    {
        return $this->db->get('kategori')->result_array();
    }

    public function tambah_kategori($data)
    {
        return $this->db->insert('kategori', $data);
    }

    public function update_kategori($id_kategori, $data)
    {
        $this->db->where('id_kategori', $id_kategori);
        return $this->db->update('kategori', $data);
    }

    public function hapus_kategori($id_kategori)
    {
        return $this->db->delete('kategori', array('id_kategori' => $id_kategori));
    }
    public function getIdKategoriByNama($kategori)
    {
        $this->db->select('id_kategori');
        $this->db->where('kategori', $kategori);
        $result = $this->db->get('kategori')->row();

        if ($result) {
            return $result->id_kategori;
        } else {
            return null; // atau sesuaikan dengan penanganan error yang Anda inginkan jika kategori tidak ditemukan.
        }
    }
}
