<?php

class Acc extends CI_Controller {

    function login_user() {
        $email = $this->input->post('email');
        $pass = md5($this->input->post('pass'));

        $response = array();
        $data['data'] = array();

        if (is_null($email) || is_null($pass)) {
            $response['status'] = 1;
            $response['response'] = 'Some index is missing';

            die(json_encode($response));
        } else {
            $result = $this->Crud_m->select_where('user', "email_user='$email' and pass_user='$pass'");

            if (sizeof($result) > 0) {
                foreach ($result as $value) {
                    $response['id_user'] = $value->id_user;
                    $response['nama_user'] = $value->nama_user;
                    $response['email_user'] = $value->email_user;

                    array_push($data['data'], $response);
                }

                $data['status'] = 0;
                $data['response'] = 'Data Ditemukan';

                die(json_encode($data));
            } else {
                $response['status'] = 1;
                $response['response'] = 'email dan password salah';

                die(json_encode($response));
            }
        }
    }
    function register_user(){
        $email = $this->input->post('email');
        $pass = md5($this->input->post('pass'));
        $nama = $this->input->post('nama');

        $response = array();

        if (is_null($pass) || is_null($nama) || is_null($email)) {
            $response['status'] = 1;
            $response['response'] = 'Some index is missing';

            die(json_encode($response));
        } else {
            $result = $this->Crud_m->select_where("user", "email_user='$email'");

            if (!empty(sizeof($result))) {
                $response['status'] = 1;
                $response['response'] = 'Email Sudah Digunakan';

                die(json_encode($response));
            } else {
                $objectData = array(
                    'nama_user' => $nama,
                    'email_user' => $email,
                    'pass_user' => $pass,
                );

                $affectedRows = $this->Crud_m->insert('user', $objectData);

                if ($affectedRows > 0) {
                    $response['status'] = 0;
                    $response['response'] = 'Registrasi Peserta Berhasil';

                    die(json_encode($response));
                } else {
                    $response['status'] = 1;
                    $response['response'] = 'Kesalahan dalam proses Registrasi Peserta';

                    die(json_encode($response));
                }
            }
        }
    }

}
