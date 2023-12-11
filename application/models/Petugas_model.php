<?php
class Petugas_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    // Fungsi untuk menambahkan user petugas baru
    public function tambahUserPetugas($data)
    {
        $this->db->insert('petugas', $data);
    }

    // Fungsi untuk mengambil semua data user petugas
    public function getAllUserPetugas()
    {
        return $this->db->get('petugas')->result_array();
    }

    // Fungsi untuk mengambil data user petugas berdasarkan ID
    public function getUserPetugasById($nip)
    {
        return $this->db->get_where('petugas', ['nip' => $nip])->row_array();
    }

    // Fungsi untuk mengupdate data user petugas
    public function updateUserPetugas($nip, $data)
    {
        $this->db->where('nip', $nip);
        $this->db->update('petugas', $data);
    }

    // Fungsi untuk menghapus user petugas berdasarkan ID
    public function deleteUserPetugas($nip)
    {
        $this->db->delete('petugas', ['nip' => $nip]);
    }
}
