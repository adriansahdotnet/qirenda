<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Admin extends BaseController {

    public function index() {

    	if ($this->base_data['users'] == false) {
    		throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    	}

    	if ($this->base_data['users']['level'] !== 'Admin') {
    		throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    	}

        $grafik = [];
        for ($i=0; $i < 7; $i++) { 
            $grafik[] = [
                'tanggal' => date('Y-m-d', time()-60*60*24*$i),
                'transaksi' => count($this->M_Base->data_like('orders', 'date_create', date('Y-m-d', time()-60*60*24*$i))),
            ];
        }

    	$data = array_merge($this->base_data, [
    		'title' => 'Dashboard',
            'total' => [
                'users' => $this->M_Base->data_count('users'),
                'orders' => $this->M_Base->data_count('orders'),
                'games' => $this->M_Base->data_count('games'),
            ],
            'grafik' => $grafik,
    	]);

        return view('Admin/Admin/index', $data);
    }
}
