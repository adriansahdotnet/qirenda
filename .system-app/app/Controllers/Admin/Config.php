<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Config extends BaseController {

    public function index() {

    	if ($this->base_data['users'] == false) {
    		throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    	}

    	if ($this->base_data['users']['level'] !== 'Admin') {
    		throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    	}

        if ($this->request->getPost('tombol')) {
            $this->M_Base->u_update('web-title', $this->request->getPost('title'));
            $this->M_Base->u_update('web-icon', $this->request->getPost('icon'));
            $this->M_Base->u_update('web-logo', $this->request->getPost('logo'));
            $this->M_Base->u_update('web-author', $this->request->getPost('author'));
            $this->M_Base->u_update('web-keywords', $this->request->getPost('keywords'));
            $this->M_Base->u_update('web-description', $this->request->getPost('description'));
            $this->M_Base->u_update('pay-saldo', $this->request->getPost('pay_saldo'));
            $this->M_Base->u_update('games_token', $this->request->getPost('games_token'));

            $this->M_Base->u_update('chat_id', $this->request->getPost('chat_id'));

            $this->session->setFlashdata('success', 'Data konfigurasi diupdate');
            return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
        }

        if ($this->request->getPost('tombol_konten')) {
            $this->M_Base->u_update('slide-1', $this->request->getPost('slide_1'));
            $this->M_Base->u_update('slide-2', $this->request->getPost('slide_2'));
            $this->M_Base->u_update('slide-3', $this->request->getPost('slide_3'));

            $this->session->setFlashdata('success', 'Data konfigurasi diupdate');
            return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
        }

        if ($this->request->getPost('tombol_tripay')) {
            $this->M_Base->u_update('tripay_api', $this->request->getPost('tripay_api'));
            $this->M_Base->u_update('tripay_private', $this->request->getPost('tripay_private'));
            $this->M_Base->u_update('tripay_merchant', $this->request->getPost('tripay_merchant'));

            $this->session->setFlashdata('success', 'Data konfigurasi diupdate');
            return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
        }

        if ($this->request->getPost('tombol_digi')) {
            $this->M_Base->u_update('digi_user', $this->request->getPost('digi_user'));
            $this->M_Base->u_update('digi_key', $this->request->getPost('digi_key'));

            $this->session->setFlashdata('success', 'Data konfigurasi diupdate');
            return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
        }
        
        if ($this->request->getPost('tombol_api')) {
            $this->M_Base->u_update('api_secret', $this->request->getPost('api_secret'));
            $this->M_Base->u_update('api_merchant', $this->request->getPost('api_merchant'));

            $this->session->setFlashdata('success', 'Data konfigurasi diupdate');
            return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
        }
        
        if ($this->request->getPost('tombol_fonnte')) {
            $this->M_Base->u_update('fonnte_key', $this->request->getPost('fonnte_key'));

            $this->session->setFlashdata('success', 'Data konfigurasi diupdate');
            return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
        }
        
        if ($this->request->getPost('tombol_wa')) {
            
            $this->M_Base->u_update('wa_order_status', $this->request->getPost('wa_order_status'));
            $this->M_Base->u_update('wa_order_msg', $this->request->getPost('wa_order_msg'));
            
            $this->M_Base->u_update('wa_pay_status', $this->request->getPost('wa_pay_status'));
            $this->M_Base->u_update('wa_pay_msg', $this->request->getPost('wa_pay_msg'));
            
            $this->M_Base->u_update('wa_success_status', $this->request->getPost('wa_success_status'));
            $this->M_Base->u_update('wa_success_msg', $this->request->getPost('wa_success_msg'));

            $this->session->setFlashdata('success', 'Data konfigurasi diupdate');
            return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
        }

        if ($this->request->getPost('tombol_s')) {
            $this->M_Base->u_update('s_host', $this->request->getPost('s_host'));
            $this->M_Base->u_update('s_user', $this->request->getPost('s_user'));
            $this->M_Base->u_update('s_pass', $this->request->getPost('s_pass'));
            $this->M_Base->u_update('s_port', $this->request->getPost('s_port'));

            $this->session->setFlashdata('success', 'Data konfigurasi diupdate');
            return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
        }


    	$data = array_merge($this->base_data, [
    		'title' => 'Konfigurasi',
            'tripay' => [
                'api' => $this->M_Base->u_get('tripay_api'),
                'private' => $this->M_Base->u_get('tripay_private'),
                'merchant' => $this->M_Base->u_get('tripay_merchant'),
            ],
            'slide' => [
                '1' => $this->M_Base->u_get('slide-1'),
                '2' => $this->M_Base->u_get('slide-2'),
                '3' => $this->M_Base->u_get('slide-3'),
            ],
            'digi' => [
                'user' => $this->M_Base->u_get('digi_user'),
                'key' => $this->M_Base->u_get('digi_key'),
            ],
            'pay_saldo' => $this->M_Base->u_get('pay-saldo'),
            'games_token' => $this->M_Base->u_get('games_token'),
            'fonnte_key' => $this->M_Base->u_get('fonnte_key'),
            's' => [
                'host' => $this->M_Base->u_get('s_host'),
                'user' => $this->M_Base->u_get('s_user'),
                'pass' => $this->M_Base->u_get('s_pass'),
                'port' => $this->M_Base->u_get('s_port'),
            ],
            'chat_id' => $this->M_Base->u_get('chat_id'),
            'api' => [
                'secret' => $this->M_Base->u_get('api_secret'),
                'merchant' => $this->M_Base->u_get('api_merchant'),
            ],
            'wa' => [
                'order' => [
                    'status' => $this->M_Base->u_get('wa_order_status'),
                    'msg' => $this->M_Base->u_get('wa_order_msg'),
                ],
                'pay' => [
                    'status' => $this->M_Base->u_get('wa_pay_status'),
                    'msg' => $this->M_Base->u_get('wa_pay_msg'),
                ],
                'success' => [
                    'status' => $this->M_Base->u_get('wa_success_status'),
                    'msg' => $this->M_Base->u_get('wa_success_msg'),
                ],
            ],
    	]);

        return view('Admin/Config/index', $data);
    }
}
