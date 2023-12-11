<?php



defined('BASEPATH') or exit('No direct script access allowed');

class Pengaduan_model extends CI_Model
{

    private $_table = "pengaduan";

    public function addPengaduan()
    {
        $user = $this->mahasiswa();

        $namaPengadu = $this->input->post('nama_pengadu');
        $nimPengadu = $user['nim'];

        $identitas_anonim = false;

        if ($namaPengadu !== 'nama_asli') {
            $identitas_anonim = true;
        }


        $file_names = $this->_uploadImg();

        $data = [
            'tgl_pengaduan' => date('Y-m-d H:i:s'),
            'nim' => $nimPengadu,
            'id_kategori' => $this->input->post('kategori'),
            'judul_pengaduan' => $this->input->post('judul'),
            'isi_pengaduan' => $this->input->post('isi'),
            'foto' => implode(',', $file_names),
            'status_verifikasi' => 'Belum Verifikasi',
            'identitas_anonim' => $identitas_anonim,
        ];

        return $this->db->insert($this->_table, $data);
    }


    public function mahasiswa()
    {
        return $this->db->get_where('mahasiswa', ['username' => $this->session->userdata('username')])->row_array();
    }

    public function kategoriPetugas()
    {
        return $this->db->get_where('petugas', ['username' => $this->session->userdata('username')])->row_array();
    }

    public function joinKategoriPengaduan()
    {
        $petugas = $this->kategoriPetugas();
        $id = $petugas['id_kategori'];
        $query = "SELECT `pengaduan`.*, `kategori` 
                FROM `pengaduan` JOIN `kategori` 
                ON `pengaduan`.`id_kategori` = `kategori`.`id_kategori`
                WHERE `pengaduan`.`id_kategori` = $id; 
                ";
        return $this->db->query($query)->result_array();
    }

    public function joinKategoriPengaduanForAdm()
    {
        //tampilkan semua pengaduan yang statusnya pending or proses
        $query = "SELECT `pengaduan`.*, `kategori` 
            FROM `pengaduan` JOIN `kategori` 
            ON `pengaduan`.`id_kategori` = `kategori`.`id_kategori`
            WHERE `status_verifikasi` = 'Belum Verifikasi'
            ";
        return $this->db->query($query)->result_array();
    }

    public function joinKategoriPengaduanOnly()
    {
        //tampilkan semua pengaduan yang statusnya pending or proses
        $query = "SELECT `pengaduan`.*, `kategori` 
                FROM `pengaduan` JOIN `kategori` 
                ON `pengaduan`.`id_kategori` = `kategori`.`id_kategori`
                ";
        return $this->db->query($query)->result_array();
    }

    public function joinKategoriPengaduanProses()
    {
        $petugas = $this->kategoriPetugas();
        $id = $petugas['id_kategori'];
        $query = "SELECT `pengaduan`.*, `kategori` 
                FROM `pengaduan` JOIN `kategori` 
                ON `pengaduan`.`id_kategori` = `kategori`.`id_kategori`
                WHERE `status` LIKE 'p%' AND `pengaduan`.`id_kategori` = $id AND `pengaduan`.`status` = 'proses';
                ";
        return $this->db->query($query)->result_array();
    }


    public function joinPengaduanProsesSelesai()
    {

        $petugas = $this->kategoriPetugas();
        $id = $petugas['id_kategori'];

        $query = "SELECT * 
                FROM `pengaduan` JOIN `kategori` 
                ON `pengaduan`.`id_kategori` = `kategori`.`id_kategori`
                JOIN `tanggapan` ON `pengaduan`.`id_pengaduan` = `tanggapan`.`id_pengaduan`
                WHERE `status` LIKE 'p%' AND `kategori`.`id_kategori` = $id;
                ";
        return $this->db->query($query)->result_array();
    }

    public function joinKategoriPengaduanSelesai() //join kategori - pengaduan yang statusnya selesai
    {
        $petugas = $this->kategoriPetugas();
        $id = $petugas['id_kategori'];
        $query = "SELECT `pengaduan`.*, `kategori` 
                FROM `pengaduan` JOIN `kategori` 
                ON `pengaduan`.`id_kategori` = `kategori`.`id_kategori`
                WHERE `status` LIKE 'selesai' AND `pengaduan`.`id_kategori` = $id;
                ";
        return $this->db->query($query)->result_array();
    }

    public function viewPengaduan() //for masyrakatat
    {
        $user = $this->mahasiswa();
        $nim = $user['nim'];
        $query = "SELECT `pengaduan`.*, `kategori`
                FROM `pengaduan` JOIN `kategori`
                ON `pengaduan`.`id_kategori` = `kategori`.`id_kategori`
                WHERE `nim` = $nim
        ";
        return $this->db->query($query)->result_array();
        // $this->db->select('*');
        // $this->db->from($this->_table);
        // $this->db->like('nim', $user['nim']);
        // return $this->db->get()->result_array();
    }

    public function pengaduanSelesai()
    {
        $mahasiswa = $this->mahasiswa();
        $nim = $mahasiswa['nim'];

        $query = "SELECT * 
                  FROM `pengaduan` JOIN `kategori` 
                  ON `pengaduan`.`id_kategori` = `kategori`.`id_kategori`
                  JOIN `tanggapan` ON `pengaduan`.`id_pengaduan` = `tanggapan`.`id_pengaduan`
                  WHERE `status` LIKE 'selesai' AND `nim` = $nim";
        return $this->db->query($query)->result_array();
    }


    public function viewPengaduanAll() //for admin
    {
        $this->db->select('*');
        $this->db->from($this->_table);
        return $this->db->get()->result_array();
    }

    public function pendingPengaduan() //for masyrakat
    {
        $user = $this->mahasiswa();

        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->like('nim', $user['nim']); //tampilkan berdasarkan nim yang input data
        $this->db->like('status', 'pending'); //untuk PENDING
        return $this->db->get()->result_array();

        // Produces SQL:
        // SELECT * FROM Books WHERE status LIKE '%pending%';

    }

    public function prosesPengaduan() //for masyarakat
    {
        $user = $this->mahasiswa();
        $nim = $user['nim'];

        $query = "SELECT `pengaduan`.*, `kategori`
                FROM `pengaduan` JOIN `kategori`
                ON `pengaduan`.`id_kategori` = `kategori`.`id_kategori`
                WHERE `status` LIKE 'proses' AND `nim` = $nim;
        ";
        return $this->db->query($query)->result_array();
    }

    public function prosesPengaduanAll()
    {
        $query = "SELECT `pengaduan`.*, `kategori` 
                FROM `pengaduan` JOIN `kategori` 
                ON `pengaduan`.`id_kategori` = `kategori`.`id_kategori`
                WHERE `status` LIKE 'p%'
                ";
        return $this->db->query($query)->result_array();
    }

    public function selesaiPengaduan()
    {
        $user = $this->mahasiswa();

        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->like('nim', $user['nim']);
        $this->db->like('status', 'selesai'); //untuk SELESAI
        return $this->db->get()->result_array();
    }

    public function selesaiPengaduanAll() //for admin
    {
        $query = "SELECT `pengaduan`.*, `kategori` 
                FROM `pengaduan` JOIN `kategori` 
                ON `pengaduan`.`id_kategori` = `kategori`.`id_kategori`
                WHERE `status` LIKE 'selesai'
                ";
        return $this->db->query($query)->result_array();
    }

    private function _uploadImg()
    {
        $imgUpload = $_FILES['gambar'];
        $file_names = array();

        if ($imgUpload) {
            $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf';
            $config['upload_path'] = './assets/img/pengaduan/';
            $config['max_size'] = 2048;
            $config['overwrite'] = true;

            $this->load->library('upload', $config);

            // Loop untuk mengunggah setiap file
            foreach ($imgUpload['name'] as $key => $value) {
                $_FILES['gambar']['name'] = $imgUpload['name'][$key];
                $_FILES['gambar']['type'] = $imgUpload['type'][$key];
                $_FILES['gambar']['tmp_name'] = $imgUpload['tmp_name'][$key];
                $_FILES['gambar']['error'] = $imgUpload['error'][$key];
                $_FILES['gambar']['size'] = $imgUpload['size'][$key];

                if ($this->upload->do_upload('gambar')) {
                    $file_names[] = $this->upload->data('file_name');
                } else {
                    echo $this->upload->display_errors();
                }
            }

            return $file_names; // Pastikan mengembalikan array dengan nama file yang benar
        }
    }

    public function joinKategoriPengaduanSemua()
    {
        $petugas = $this->kategoriPetugas();
        $id = $petugas['id_kategori'];
        $query = "SELECT `pengaduan`.*, `kategori` 
          FROM `pengaduan` JOIN `kategori` 
          ON `pengaduan`.`id_kategori` = `kategori`.`id_kategori`
          WHERE `pengaduan`.`id_kategori` = $id AND `status_verifikasi` = 'Sudah Verifikasi'; 
                ";
        return $this->db->query($query)->result_array();
    }

    //TANGGAPAN get_pengaduan()
    public function get_pengaduan($id_pengaduan)
    {
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->where('id_pengaduan', $id_pengaduan);
        return $this->db->get()->row_array();
    }
    public function getPengaduanById($id_pengaduan)
    {
        $query = $this->db->get_where('pengaduan', array('id_pengaduan' => $id_pengaduan));
        return $query->row_array();
    }
    public function getKategoriById($id_kategori)
    {
        $this->db->select('kategori'); // Mengambil kolom 'nama_kategori' dari tabel 'kategori'
        $this->db->where('id_kategori', $id_kategori);
        $query = $this->db->get('kategori');
        return $query->row('kategori');
    }
    public function getUnverifiedPengaduan()
    {
        // Ambil pengaduan dengan status "Belum Verifikasi"
        $this->db->where('status', 'Belum Verifikasi');
        return $this->db->get('pengaduan')->result_array();
    }
    public function verifikasiPengaduan($id_pengaduan)
    {
        $data = array(
            'status_verifikasi' => 'Sudah Verifikasi',
            'status' => 'Proses',
        );

        $this->db->where('id_pengaduan', $id_pengaduan);
        $this->db->update('pengaduan', $data);
    }
}
