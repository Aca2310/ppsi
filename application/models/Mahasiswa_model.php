<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa_model extends CI_Model
{

    private $_table = "mahasiswa";

    public function getAll()
    {
        return $this->db->get($this->_table)->result_array(); //ambil semua data
    }

    public function add()
    {
        //untuk register
        $username = $this->input->post('email');
        $user = (explode("@", $username)); //memecah email untuk membuat username

        $data = array(
            'nim' => htmlspecialchars($this->input->post('nim', true)),
            'username' => $user[0], //ambil array ke 0
            'nama' => htmlspecialchars($this->input->post('nama', true)),
            'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            'telp' => htmlspecialchars($this->input->post('telp', true)),
            'image' => 'avatar.png',
            'email' => htmlspecialchars($this->input->post('email', true)),
        );

        return $this->db->insert($this->_table, $data, $user);
    }

    public function updateProfile()
    {
        $data = array(
            'nim' => htmlspecialchars($this->input->post('nim', true)),
            'username' => htmlspecialchars($this->input->post('username', true)),
            'nama' => htmlspecialchars($this->input->post('nama', true)),
            'telp' => htmlspecialchars($this->input->post('telp', true)),
            'image' => 'avatar.png',
            'email' => htmlspecialchars($this->input->post('email', true)),
        );

        $this->db->where('nim', $this->input->post('nim'));
        $this->db->update($this->_table, $data);
    }

    public function kategori()
    {
        //untuk form
        return $this->db->get('kategori')->result_array();
    }

    public function addMahasiswa()
    {
        $username = $this->input->post('email');
        $user = (explode("@", $username));

        $data = array(
            'nim' => htmlspecialchars($this->input->post('nim', true)),
            'username' => $user[0],
            'nama' => htmlspecialchars($this->input->post('nama', true)),
            'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            'telp' => htmlspecialchars($this->input->post('telp', true)),
            'prodi' => htmlspecialchars($this->input->post('prodi', true)),
            'email' => htmlspecialchars($this->input->post('email', true)),
        );

        return $this->db->insert($this->_table, $data);
    }
    public function deleteUserMahasiswa($nim)
    {
        $this->db->delete('mahasiswa', ['nim' => $nim]);
    }
}
