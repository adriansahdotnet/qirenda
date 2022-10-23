                    <?php $this->extend('template'); ?>

                    <?php $this->section('konten'); ?>
                    <div class="row justify-content-center">
                        <div class="col-xl-12">
                        	<div class="card">
                        		<div class="card-body">
                        			<h5 class="card-title">Kelola Pembelian</h5>
                                    <?php if (session('success')): ?>
                                    <div class="alert alert-success">
                                        <b>Berhasil</b> <?= session('success'); ?>
                                    </div>
                                    <?php endif ?>
                                    <?php if (session('error')): ?>
                                    <div class="alert alert-danger">
                                        <b>Gagal</b> <?= session('error'); ?>
                                    </div>
                                    <?php endif ?>
                        			<div class="table-responsive">
                        				<table id="my-datatables" class="table border table-striped">
                        					<thead>
                        						<tr>
                        							<th width="10">No</th>
                        							<th>Order&nbsp;ID</th>
                        							<th>Email</th>
                                                    <th>Games</th>
                                                    <th>Produk</th>
                                                    <th>Harga</th>
                                                    <th>Target</th>
                                                    <th>Status</th>
                        							<th width="10">Action</th>
                        						</tr>
                        					</thead>
                        					<tbody>
                                                <?php $no = 1; foreach ($orders as $order): ?>
                        						<tr>
                        							<td><?= $no++; ?></td>
                        							<td>
                                                        <a href="<?= base_url(); ?>/admin/orders/detail/<?= $order['id']; ?>" class="btn btn-outline-primary"><?= $order['order_id']; ?></a>                     
                                                    </td>
                                                    <td><a href="mailto:<?= $order['email_account']; ?>"><?= $order['email_account']; ?></a></td>
                                                    <td>
                                                        <?php if (filter_var($order['games_img'], FILTER_VALIDATE_URL)): ?>    
                                                        <img src="<?= $order['games_img']; ?>" width="50" class="rounded-3" alt="">
                                                        <?php else: ?>
                                                        <img src="<?= base_url(); ?>/assets/images/games/<?= $order['games_img']; ?>" width="50" class="rounded-3" alt="">
                                                        <?php endif ?>
                                                    </td>
                                                    <td><?= $order['product']; ?></td>
                                                    <td>Rp&nbsp;<?= number_format($order['price'],0,',','.'); ?></td>
                                                    <td>
                                                        <input type="text" class="form-control" value="<?= $order['target']; ?>" readonly>
                                                    </td>
                                                    <td>
                                                        <?php 
                                                        if ($order['status'] == 'Pending') {
                                                            echo '<span class="badge bg-warning p-2" style="font-size: 12px;">'.$order['status'].'</span>';
                                                        } else if ($order['status'] == 'Processing') {
                                                            echo '<span class="badge bg-info p-2" style="font-size: 12px;">'.$order['status'].'</span>';
                                                        } else if ($order['status'] == 'Completed') {
                                                            echo '<span class="badge bg-success p-2" style="font-size: 12px;">'.$order['status'].'</span>';
                                                        } else {
                                                            echo '<span class="badge bg-danger p-2" style="font-size: 12px;">'.$order['status'].'</span>';
                                                        }
                                                        ?>
                                                    </td>
                        							<td style="width: 10;white-space: nowrap;">
                                                        <a href="<?= base_url(); ?>/admin/orders/edit/<?= $order['id']; ?>" class="btn btn-sm btn-primary">Edit</a>
                        								<button onclick="hapus('<?= base_url(); ?>/admin/orders/delete/<?= $order['id']; ?>');" class="btn btn-sm btn-danger">Hapus</button>
                        							</td>
                        						</tr>
                                                <?php endforeach ?>
                        					</tbody>
                        				</table>
                        			</div>
                        		</div>
                        	</div>
                        </div>
                    </div>
                    <?php $this->endSection(); ?>

                    <?php $this->section('js'); ?>
                    <script>
                    	$("#my-datatables").DataTable({
                    		ordering: false,
                    	});
                    </script>
                    <?php $this->endSection(); ?>