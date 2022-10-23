<?php

namespace App\Controllers;

class Sistem extends BaseController {

    public function scrape($action = null) {
    	if ($action) {
    		if ($action === 'product') {

    			$digi_user = $this->M_Base->u_get('digi_user');
    			$digi_key = $this->M_Base->u_get('digi_key');

    			$post_data = json_encode([
			        'cmd' => 'prepaid',
			        'username' => $digi_user,
			        'sign' => md5($digi_user.$digi_key."pricelist"),
			    ]);

			    $ch = curl_init();
			    curl_setopt($ch, CURLOPT_URL, 'https://api.digiflazz.com/v1/price-list');
			    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
			    curl_setopt($ch, CURLOPT_POST, 1);
			    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
			    $result = curl_exec($ch);
			    $result = json_decode($result, true);

			    if (array_key_exists('data', $result)) {

			    	$game_failed = [];

			    	$this->M_Base->data_truncate('product');

			    	foreach ($result['data'] as $data) {
			    		if ($data['category'] === 'Games') {
			    			if ($data['buyer_product_status'] === true && $data['seller_product_status'] === true) {
			    				$games = str_replace(':', '', $data['brand']);

				    			$product = $data['product_name'];
				    			$price = $data['price'];
				    			$sku = $data['buyer_sku_code'];

				    			$data_games = $this->M_Base->data_where('games', 'name', $games);

				    			if (count($data_games) === 1) {
				    				$this->M_Base->data_insert('product', [
				    					'games_id' => $data_games[0]['id'],
				    					'product' => $product,
				    					'price' => $price,
				    					'sku' => $sku,
				    					'provider' => 'DF'
				    				]);
				    			} else {
				    				$game_failed[] = $games;
				    			}
			    			}
			    		}
			    	}
			    	echo "<pre>";
			    	print_r(array_unique($game_failed));
			    	echo "</pre>";
			    }
			    
    		} else {
    			throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    		}
    	} else {
    		throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    	}
    }

    public function status() {
        foreach($this->M_Base->data_where('orders', 'status', 'Processing') as $order) {
            
            $df_user = $this->M_Base->u_get('digi_user');
            $df_key = $this->M_Base->u_get('digi_key');
            
            $post_data = json_encode([
                'username' => $df_user,
                'buyer_sku_code' => $order['sku'],
                'customer_no' => $order['target'],
                'ref_id' => $order['order_id'],
                'sign' => md5($df_user.$df_key.$order['order_id']),
            ]);

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, 'https://api.digiflazz.com/v1/transaction');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
            $result = curl_exec($ch);
            $result = json_decode($result, true);
            
            if (isset($result['data'])) {
                
                if ($result['data']['status'] == 'Gagal') {
                	$this->M_Base->data_update('orders', [
						'note' => $result['data']['message'],
						'status' => 'Canceled',
					], $order['id']);

                	$users = $this->M_Base->data_where('users', 'email', $order['email_account']);
					
					if (count($users) == 1) {
					   $this->M_Base->data_update('users', [
					       'balance' => $users[0]['balance'] + $order['price']
					   ], $users[0]['id']);
					}

                } else {
                    
                    if ($result['data']['status'] == 'Sukses') {
                        
                        $note = $result['data']['sn'] !== '' ? $result['data']['sn'] : $result['data']['message'];
    
                        $this->M_Base->data_update('orders', [
    						'status' => 'Completed',
    						'note' => $note,
    					], $order['id']);

    					$this->M_Base->email_invoice($order['email_invoice'], $order['order_id'], $order['product'], $order['target'], 'Rp ' . number_format($order['price'],0,',','.'));
    					
    					if (!empty($data_order[0]['wa'])) {
                            if ($this->M_Base->u_get('wa_success_status') == 'On') {
                                        
                                $this->M_Base->wa($data_order[0]['wa'], str_replace([
                                    '#order_id#',
                                    '#product#',
                                    '#method#',
                                    '#games#',
                                    '#price#',
                                    '#target#',
                                    '#note#',
                                ], [
                                    $order['order_id'],
                                    $order['product'],
                                    $order['method'],
                                    $order['games'],
                                    number_format($order['price'],0,',','.'),
                                    $order['target'],
                                    $note,
                                ], $this->M_Base->u_get('wa_success_msg')));
                            }
                        }
                    }
                }
            }
        }
    }

    public function tripay($action = null) {
    	if ($action) {
    		if ($action === 'callback') {

    			$json = file_get_contents('php://input');

				$callbackSignature = isset($_SERVER['HTTP_X_CALLBACK_SIGNATURE']) ? $_SERVER['HTTP_X_CALLBACK_SIGNATURE'] : '';

				if ($callbackSignature !== hash_hmac('sha256', $json, $this->M_Base->u_get('tripay_private'))) {
				    throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
				} else {
					if ('payment_status' !== $_SERVER['HTTP_X_CALLBACK_EVENT']) {
					    throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
					} else {
						$data = json_decode($json, true);

						if ($data['status'] === 'PAID') {

							$data_order = $this->M_Base->data_where_array('orders', [
								'status' => 'Pending',
								'order_id' => $data['merchant_ref'],
							]);

							if (count($data_order) === 1) {
							    
							    if (!empty($data_order[0]['wa'])) {
		                            if ($this->M_Base->u_get('wa_pay_status') == 'On') {
                                                
                                        $this->M_Base->wa($data_order[0]['wa'], str_replace([
                                            '#order_id#',
                                            '#product#',
                                            '#method#',
                                            '#games#',
                                            '#price#',
                                            '#target#',
                                            '#note#',
                                        ], [
                                            $data_order[0]['order_id'],
                                            $data_order[0]['product'],
                                            $data_order[0]['method'],
                                            $data_order[0]['games'],
                                            number_format($data_order[0]['price'],0,',','.'),
                                            $data_order[0]['target'],
                                            'Pembayaran Berhasil',
                                        ], $this->M_Base->u_get('wa_pay_msg')));
                                    }
		                        }
							    
							    if ($data_order[0]['provider'] == 'DF') {
							        
							        $df_user = $this->M_Base->u_get('digi_user');
    								$df_key = $this->M_Base->u_get('digi_key');
    
    								$post_data = json_encode([
    		                            'username' => $df_user,
    		                            'buyer_sku_code' => $data_order[0]['sku'],
    		                            'customer_no' => $data_order[0]['target'],
    		                            'ref_id' => $data_order[0]['order_id'],
    		                            'sign' => md5($df_user.$df_key.$data_order[0]['order_id']),
    		                        ]);
    		        
    		                        $ch = curl_init();
    		                        curl_setopt($ch, CURLOPT_URL, 'https://api.digiflazz.com/v1/transaction');
    		                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    		                        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    		                        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
    		                        curl_setopt($ch, CURLOPT_POST, 1);
    		                        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
    		                        $result = curl_exec($ch);
    		                        $result = json_decode($result, true);
    		                        
    		                        if (isset($result['data'])) {
    		                            if ($result['data']['status'] == 'Gagal') {
    		                            	$this->M_Base->data_update('orders', [
    											'note' => $result['data']['message'],
    										], $data_order[0]['id']);
    		                            } else {
    
    		                                $note = $result['data']['sn'] !== '' ? $result['data']['sn'] : $result['data']['message'];
    
    		                                $this->M_Base->data_update('orders', [
    											'status' => 'Processing',
    											'note' => $note,
    										], $data_order[0]['id']);
    
    										echo json_encode(['success' => true]);
    		                            }
    		                        } else {
    		                            $this->M_Base->data_update('orders', [
    										'note' => 'Failed Order',
    									], $data_order[0]['id']);
    		                        }
							        
							    } else if ($data_order[0]['provider'] == 'AG') {
							        
							        $curl = curl_init();
                                    curl_setopt_array($curl, array(
                                        CURLOPT_URL => 'https://v1.apigames.id/v2/transaksi?merchant_id='.$this->M_Base->u_get('api_merchant').'&signature='.md5($this->M_Base->u_get('api_merchant') . ':' . $this->M_Base->u_get('api_secret') . ':' . $data_order[0]['order_id']).'&produk='.$data_order[0]['sku'].'&tujuan='.$data_order[0]['data_no'].'&server_id='.$data_order[0]['data_zone'].'&ref_id=' . $data_order[0]['order_id'],
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
                                        
                                        $this->M_Base->data_update('orders', [
    										'note' => $response['error_msg'],
    									], $data_order[0]['id']);
    									
                                    } else {
                                        
                                        $status = 'Processing';
                                        
                                        if ($response['data']['status'] == 'Sukses') {
                                            
                                            $status = 'Completed';
                                            
                                            if (!empty($data_order[0]['wa'])) {
            		                            if ($this->M_Base->u_get('wa_success_status') == 'On') {
                                                            
                                                    $this->M_Base->wa($data_order[0]['wa'], str_replace([
                                                        '#order_id#',
                                                        '#product#',
                                                        '#method#',
                                                        '#games#',
                                                        '#price#',
                                                        '#target#',
                                                        '#note#',
                                                    ], [
                                                        $data_order[0]['order_id'],
                                                        $data_order[0]['product'],
                                                        $data_order[0]['method'],
                                                        $data_order[0]['games'],
                                                        number_format($data_order[0]['price'],0,',','.'),
                                                        $data_order[0]['target'],
                                                        $response['data']['sn'],
                                                    ], $this->M_Base->u_get('wa_success_msg')));
                                                }
            		                        }
                                        }
    
		                                $this->M_Base->data_update('orders', [
											'status' => $status,
											'note' => $response['data']['sn'],
										], $data_order[0]['id']);

										echo json_encode(['success' => true]);
                                    }
							    }
							} else {

							    $topup = $this->M_Base->data_where_array('topup', [
							        'topup_id' => $data['merchant_ref'],
							        'status' => 'Pending',
							    ]);
							    
							    if (count($topup) == 1) {
							        $this->M_Base->data_update('topup', [
							            'status' => 'Success',
							        ], $topup[0]['id']);
							        
							        $users = $this->M_Base->data_where('users', 'email', $topup[0]['email']);
							        
							        if (count($users) == 1) {
							            $this->M_Base->data_update('users', [
							                'balance' => $users[0]['balance'] + $topup[0]['balance'],
							            ], $users[0]['id']);
							        }
							    }
							}
						}
					}
				}
    		} else {
    			throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    		}
    	} else {
    		throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    	}
    }
}
