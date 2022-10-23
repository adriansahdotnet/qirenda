<?php

namespace App\Controllers;

class Buy extends BaseController {

    public function games($slug) {
        
    	$data_games = $this->M_Base->data_where('games', 'slug', $slug);

    	if (count($data_games) === 1) {

            if ($this->request->getPost('tombol')) {
                $data_post = [
                    'product' => htmlspecialchars(trim(addslashes($this->request->getPost('product')))),
                    'method' => htmlspecialchars(trim(addslashes($this->request->getPost('method')))),
                    'email' => htmlspecialchars(trim(addslashes($this->request->getPost('email')))),
                    'wa' => htmlspecialchars(trim(addslashes($this->request->getPost('wa')))),
                    'target' => htmlspecialchars(trim(addslashes(implode('', $this->request->getPost('target'))))),
                ];

                if (empty($data_post['product']) OR empty($data_post['method']) OR empty($data_post['target'])) {
                    $this->session->setFlashdata('error', 'Masih ada data yang kosong');
                    return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                } else {
                    if (!is_numeric($data_post['product'])) {
                        $this->session->setFlashdata('error', 'Produk tidak ditemukan');
                        return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                    } else if (!is_numeric($data_post['method'])) {
                        $this->session->setFlashdata('error', 'Metode tidak ditemukan');
                        return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                    } else {
                        if (empty($data_post['email'])) {
                            $data_post['email'] = 'default@email.io';
                        } else {
                            if (!filter_var($data_post['email'], FILTER_VALIDATE_EMAIL)) {
                                $this->session->setFlashdata('error', 'Email tidak sesuai');
                                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                            }
                        }
                        
                        if (!empty($data_post['wa'])) {
                            if (!is_numeric($data_post['wa'])) {
                                $this->session->setFlashdata('error', 'No. Whatsapp tidak sesuai');
                                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                            } else if (strlen($data_post['wa']) < 10 OR strlen($data_post['wa']) > 14) {
                                $this->session->setFlashdata('error', 'No. Whatsapp tidak sesuai');
                                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                            } else if (substr($data_post['wa'], 0, 2) !== '08') {
                                $this->session->setFlashdata('error', 'No. Whatsapp harus diawali dengan 08');
                                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                            }
                        }

                        $data_product = $this->M_Base->data_where('product', 'id', $data_post['product']);

                        if (count($data_product) === 1) {
                            
                            if ($data_post['method'] == 123) {
                                $data_method = [
                                    'sistem' => 'Saldo',
                                ];
                            } else {
                                $data_method = $this->M_Base->data_where('method', 'id', $data_post['method']);
                            }

                            if (count($data_method) === 1) {
                                if (strlen($data_post['target']) < 5 OR strlen($data_post['target']) > 24) {
                                    $this->session->setFlashdata('error', 'Target tidak sesuai');
                                    return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                                } else {

                                    $query_price = $this->M_Base->data_where_array('price', [
                                        'method_id' => $data_post['method'],
                                        'product_id' => $data_post['product'],
                                    ]);

                                    if (count($query_price) === 1) {
                                        $price = $query_price[0]['price'];
                                    } else {
                                        $price = $data_product[0]['price'];
                                    }

                                    $order_id = $this->M_Base->random_string(8, 'num');

                                    $apiKey       = $this->M_Base->u_get('tripay_api');
                                    $privateKey   = $this->M_Base->u_get('tripay_private');
                                    $merchantCode = $this->M_Base->u_get('tripay_merchant');

                                    if ($this->base_data['users'] === false) {
                                        $email = [
                                            'account' => $data_post['email'],
                                            'invoice' => $data_post['email'],
                                        ];
                                        $customer = [
                                            'name' => 'Pengguna',
                                            'email' => $data_post['email'],
                                        ];
                                    } else {
                                        $email = [
                                            'account' => $this->base_data['users']['email'],
                                            'invoice' => $data_post['email'],
                                        ];
                                        $customer = [
                                            'name' => $this->base_data['users']['name'],
                                            'email' => $this->base_data['users']['email'],
                                        ];
                                    }

                                    $status = 'Pending';
                                    $note = 'Menunggu Pembayaran';
                                    
                                    if (count($this->request->getPost('target')) == 0) {
                                        $data_no = $this->request->getPost('target')[0];
                                        $data_zone = '';
                                    } else {
                                        $data_no = $this->request->getPost('target')[0];
                                        $data_zone = $this->request->getPost('target')[0];
                                    }

                                    if ($data_post['method'] == 123) {
                                        if ($this->base_data['users'] == false) {
                                            $this->session->setFlashdata('error', 'Silahkan login dahulu untuk menggunakan metode saldo');
                                            return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                                        } else {
                                            if ($this->base_data['users']['balance'] < $price) {
                                                $this->session->setFlashdata('error', 'Saldo kamu tidak mencukupi');
                                                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                                            } else {

                                                $status = 'Processing';

                                                $this->M_Base->data_update('users', [
                                                    'balance' => $this->base_data['users']['balance'] - $price,
                                                ], $this->base_data['users']['id']);

                                                $result = [
                                                    'success' => true,
                                                    'data' => [
                                                        'pay_code' => '',
                                                        'checkout_url' => base_url() . '/status/?order_id=' . $order_id,
                                                    ],
                                                ];

                                                if ($data_product[0]['provider'] == 'DF') {

                                                    $post_data = json_encode([
                                                        'username' => $this->M_Base->u_get('digi_user'),
                                                        'buyer_sku_code' => $data_product[0]['sku'],
                                                        'customer_no' => $data_post['target'],
                                                        'ref_id' => $order_id,
                                                        'sign' => md5($this->M_Base->u_get('digi_user').$this->M_Base->u_get('digi_key').$order_id),
                                                    ]);

                                                    $ch = curl_init();
                                                    curl_setopt($ch, CURLOPT_URL, 'https://api.digiflazz.com/v1/transaction');
                                                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                                                    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
                                                    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
                                                    curl_setopt($ch, CURLOPT_POST, 1);
                                                    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
                                                    $response = curl_exec($ch);
                                                    $response = json_decode($response, true);
                                                    
                                                    if (isset($response['data'])) {
                                                        if ($response['data']['status'] == 'Gagal') {
                                                            $note = $response['data']['message'];
                                                        } else {
                                                            $note = $response['data']['sn'] !== '' ? $response['data']['sn'] : $response['data']['message'];
                                                        }
                                                    } else {
                                                        $note = 'Failed Order';
                                                    }
                                                } else if ($data_product[0]['provider'] == 'AG') {
                                                    
                                                    $curl = curl_init();
                                                    curl_setopt_array($curl, array(
                                                        CURLOPT_URL => 'https://v1.apigames.id/v2/transaksi?merchant_id='.$this->M_Base->u_get('api_merchant').'&signature='.md5($this->M_Base->u_get('api_merchant') . ':' . $this->M_Base->u_get('api_secret') . ':' . $order_id).'&produk='.$data_product[0]['sku'].'&tujuan='.$data_no.'&server_id='.$data_zone.'&ref_id=' . $order_id,
                                                        CURLOPT_RETURNTRANSFER => true,
                                                        CURLOPT_ENCODING => '',
                                                        CURLOPT_MAXREDIRS => 10,
                                                        CURLOPT_TIMEOUT => 0,
                                                        CURLOPT_FOLLOWLOCATION => true,
                                                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                                        CURLOPT_CUSTOMREQUEST => 'GET',
                                                        CURLOPT_POSTFIELDS => '',
                                                        CURLOPT_HTTPHEADER => array(
                                                            'Content-Type: application/x-www-form-urlencoded'
                                                        ),
                                                    ));
    
                                                    $response = curl_exec($curl);
                                                    $response = json_decode($response, true);
                                                    
                                                    file_put_contents('result-apigames.txt', json_encode($response));
    
                                                    if ($response['status'] == 0) {
                                                        $note = $response['error_msg'];
                                                    } else {
                                                        
                                                        if ($response['data']['status'] == 'Sukses') {
                                                            $status = 'Completed';
                                                        }
    
                                                        $note = $response['data']['sn'];
                                                    }
                                                    
                                                } else if ($data_product[0]['provider'] == 'Manual') {
                                                    $note = 'Pesanan siap diproses';
                                                } else {
                                                    $note = 'Provider tidak ditemukan';
                                                }
                                            }
                                        }
                                    } else if ($data_method[0]['provider'] == 'Manual') {
                                        $result = [
                                            'success' => true,
                                            'data' => [
                                                'pay_code' => $data_method[0]['code'],
                                                'checkout_url' => base_url() . '/status/?order_id=' . $order_id,
                                            ],
                                        ];
                                    } else if ($data_method[0]['provider'] == 'Tripay') {
                                        $data = [
                                            'method'         => $data_method[0]['code'],
                                            'merchant_ref'   => $order_id,
                                            'amount'         => $price,
                                            'customer_name'  => $customer['name'],
                                            'customer_email' => $customer['email'],
                                            'customer_phone' => $data_post['wa'],
                                            'order_items'    => [
                                                [
                                                    'sku'         => 'GAME',
                                                    'name'        => $data_product[0]['product'],
                                                    'price'       => $price,
                                                    'quantity'    => 1,
                                                    'product_url' => base_url() . '/buy/games/' . $slug,
                                                    'image_url'   => $data_games[0]['images'],
                                                ]
                                            ],
                                            'return_url'   => base_url(),
                                            'expired_time' => (time() + (24 * 60 * 60)),
                                            'signature'    => hash_hmac('sha256', $merchantCode.$order_id.$price, $privateKey)
                                        ];

                                        $curl = curl_init();

                                        curl_setopt_array($curl, [
                                            CURLOPT_FRESH_CONNECT  => true,
                                            CURLOPT_URL            => 'https://tripay.co.id/api/transaction/create',
                                            CURLOPT_RETURNTRANSFER => true,
                                            CURLOPT_HEADER         => false,
                                            CURLOPT_HTTPHEADER     => ['Authorization: Bearer '.$apiKey],
                                            CURLOPT_FAILONERROR    => false,
                                            CURLOPT_POST           => true,
                                            CURLOPT_POSTFIELDS     => http_build_query($data)
                                        ]);

                                        $result = curl_exec($curl);
                                        $result = json_decode($result, true);

                                    } else {
                                        $this->session->setFlashdata('error', 'System Payment Maintenance');
                                        return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                                    }

                                    if ($result['success'] === true) {

                                        if (empty($result['data']['pay_code'])) {
                                            $result['data']['pay_code'] = '';
                                        }

                                        $this->M_Base->data_insert('orders', [
                                            'order_id' => $order_id,
                                            'wa' => $data_post['wa'],
                                            'email_account' => $email['account'],
                                            'email_invoice' => $email['invoice'],
                                            'games' => $data_games[0]['name'],
                                            'games_id' => $data_product[0]['games_id'],
                                            'games_img' => $data_games[0]['images'],
                                            'product' => $data_product[0]['product'],
                                            'sku' => $data_product[0]['sku'],
                                            'note' => $note,
                                            'price' => $price,
                                            'target' => $data_post['target'],
                                            'data_no' => $data_no,
                                            'data_zone' => $data_zone,
                                            'method_id' => $data_post['method'],
                                            'payment_code' => $result['data']['pay_code'],
                                            'payment_url' => $result['data']['checkout_url'],
                                            'status' => $status,
                                            'ip' => $this->ip,
                                            'provider' => $data_product[0]['provider'],
                                            'date_create' => date('Y-m-d G:i:s'),
                                            'date_update' => date('Y-m-d G:i:s'),
                                        ]);
                                        
                                        if (!empty($data_post['wa'])) {
                                            
                                            if ($this->M_Base->u_get('wa_order_status') == 'On') {
                                                
                                                $this->M_Base->wa($data_post['wa'], str_replace([
                                                    '#order_id#',
                                                    '#product#',
                                                    '#method#',
                                                    '#games#',
                                                    '#price#',
                                                    '#target#',
                                                    '#note#',
                                                ], [
                                                    $order_id,
                                                    $data_product[0]['product'],
                                                    $data_method[0]['name'],
                                                    $data_games[0]['name'],
                                                    number_format($price,0,',','.'),
                                                    $data_post['target'],
                                                    $note,
                                                ], $this->M_Base->u_get('wa_order_msg')));
                                            }
                                            
                                            if ($status == 'Processing') {
                                                if ($this->M_Base->u_get('wa_pay_status') == 'On') {
                                                
                                                    $this->M_Base->wa($data_post['wa'], str_replace([
                                                        '#order_id#',
                                                        '#product#',
                                                        '#method#',
                                                        '#games#',
                                                        '#price#',
                                                        '#target#',
                                                        '#note#',
                                                    ], [
                                                        $order_id,
                                                        $data_product[0]['product'],
                                                        $data_method[0]['name'],
                                                        $data_games[0]['name'],
                                                        number_format($price,0,',','.'),
                                                        $data_post['target'],
                                                        $note,
                                                    ], $this->M_Base->u_get('wa_pay_msg')));
                                                }
                                            }
                                            
                                            if ($status == 'Completed') {
                                                if ($this->M_Base->u_get('wa_success_status') == 'On') {
                                                
                                                    $this->M_Base->wa($data_post['wa'], str_replace([
                                                        '#order_id#',
                                                        '#product#',
                                                        '#method#',
                                                        '#games#',
                                                        '#price#',
                                                        '#target#',
                                                        '#note#',
                                                    ], [
                                                        $order_id,
                                                        $data_product[0]['product'],
                                                        $data_method[0]['name'],
                                                        $data_games[0]['name'],
                                                        number_format($price,0,',','.'),
                                                        $data_post['target'],
                                                        $note,
                                                    ], $this->M_Base->u_get('wa_success_msg')));
                                                }
                                            }
                                        }

                                        if (empty($result['data']['checkout_url'])) {
                                            return redirect()->to(base_url() . '/status/?order_id=' . $order_id);
                                        } else {
                                            return redirect()->to($result['data']['checkout_url']);
                                        }
                                    } else {
                                        $this->session->setFlashdata('error', $result['message']);
                                        return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                                    }
                                }
                            } else {
                                $this->session->setFlashdata('error', 'Metode tidak ditemukan');
                                return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                            }
                        } else {
                            $this->session->setFlashdata('error', 'Produk tidak ditemukan');
                            return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                        }
                    }
                }
            }

	    	$data = array_merge($this->base_data, [
	    		'title' => $data_games[0]['name'],
	    		'games' => $data_games[0],
                'pay_saldo' => $this->M_Base->u_get('pay-saldo'),
	    		'methods' => $this->M_Base->all_data('method'),
	    		'products' => array_reverse($this->M_Base->data_where('product', 'games_id', $data_games[0]['id'], 'price')),
	    	]);

	        return view('Buy/index', $data);
    	} else {
    		throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    	}
    }

    public function price() { 
        if ($this->request->getPost('product')) {
            if (is_numeric($this->request->getPost('product'))) {

                $id = $this->request->getPost('product');
                
                $price = [];

                $data_product = $this->M_Base->data_where('product', 'id', $id);
                if (count($data_product) === 1) {
                    
                    $data_methods = $this->M_Base->all_data('method');

                    if (count($data_methods) == 0) {
                        if ($this->M_Base->u_get('pay-saldo') == 'On') {
                            $price[] = [
                                'method' => 123,
                                'price' => number_format($data_product[0]['price'],0,',','.'),
                            ];
                        }
                    } else {
                        foreach ($data_methods as $data_loop) {
                            $custome = $this->M_Base->data_where_array('price', [
                                'method_id' => $data_loop['id'],
                                'product_id' => $id,
                            ]);

                            if (count($custome) === 1) {
                                $custome_price = $custome[0]['price'];
                            } else {
                                $custome_price = $data_product[0]['price'];
                            }

                            $price[] = [
                                'method' => $data_loop['id'],
                                'price' => number_format($custome_price,0,',','.'),
                            ];
                        }
                        
                        if ($this->M_Base->u_get('pay-saldo') == 'On') {
                            $price[] = [
                                'method' => 123,
                                'price' => number_format($data_product[0]['price'],0,',','.'),
                            ];
                        }
                    }
                    
                    echo json_encode([
                        'status' => true,
                        'price' => $price,
                    ]);
                } else {
                    throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
                }
            } else {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function get($page = null, $games = null) {
        if ($page === 'user-detail') {
            if ($games) {
                if ($this->request->getPost('id') AND $this->request->getPost('server')) {
                    $result = $this->M_Base->post('https://api.enivay.com/games/api/' . $games, [
                        'token' => $this->M_Base->u_get('games_token'),
                        'id' => addslashes(trim(htmlspecialchars($this->request->getPost('id')))),
                        'server' => addslashes(trim(htmlspecialchars($this->request->getPost('server')))),
                    ]);

                    if ($result) {
                        echo json_encode($result);
                    } else {
                        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
                    }
                } else {
                    throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
                }
            } else {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }
}
