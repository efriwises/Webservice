<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Content
 *
 * @author windows8.1
 */
class Content extends CI_Controller{
    //put your code here
    function kategori(){
        $response = array();
        $data['data'] = array();

        $result = $this->Crud_m->select('kategori');

        if (sizeof($result) > 0) {
            foreach ($result as $row) {

                $response['id_kategori'] = $row->id_kategori;
                $response['kategori'] = $row->kategori;
                $response['ket_kategori'] = $row->ket_kategori;

                array_push($data['data'], $response);
            }

            $data['status'] = 0;
            $data['response'] = 'Data Ditemukan';

            die(json_encode($data));
        } else {
            $response['status'] = 1;
            $response['response'] = 'Tidak data yang ditampilkan';

            die(json_encode($response));
        }
    }
    function subkategori(){
        $id = $this->input->post('id_kategori');
        
        $response = array();
        $data['data'] = array();

        $result = $this->Crud_m->select_where('subkategori', "id_kategori='$id'");

        if (sizeof($result) > 0) {
            foreach ($result as $row) {

                $response['id_subkategori'] = $row->id_subkategori;
                $response['id_kategori'] = $row-id_>kategori;
                $response['subkategori'] = $row->subkategori;
                $response['ket_subkategori'] = $row->ket_subkategori;

                array_push($data['data'], $response);
            }

            $data['status'] = 0;
            $data['response'] = 'Data Ditemukan';

            die(json_encode($data));
        } else {
            $response['status'] = 1;
            $response['response'] = 'Tidak data yang ditampilkan';

            die(json_encode($response));
        }
    }
}
