                    <?php $this->extend('template'); ?>

                    <?php $this->section('konten'); ?>
                    <div class="row justify-content-center">
                        <div class="col-xl-10">
                        	<div class="card">
                        		<div class="card-body">
                        			<h5 class="card-title">Kelola Pembayaran</h5>
                                    <div class="mb-3">
                                        <a href="<?= base_url(); ?>/admin/payment/add" class="btn btn-primary">Tambah Metode</a>
                                    </div>
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
                        							<th>Gambar</th>
                        							<th>Metode</th>
                                                    <th>Provider</th>
                                                    <th>Kode</th>
                        							<th width="10">Action</th>
                        						</tr>
                        					</thead>
                        					<tbody>
                                                <?php $no = 1; foreach ($methods as $method): ?>
                        						<tr>
                        							<td align="center"><?= $no++; ?></td>
                        							<td><img src="<?= $method['images']; ?>" width="100" alt=""></td>
                        							<td><?= $method['name']; ?></td>
                                                    <td><?= $method['provider']; ?></td>
                                                    <td><code><?= $method['code']; ?></code></td>
                        							<td style="width: 10;white-space: nowrap;">
                        								<a href="<?= base_url(); ?>/admin/payment/edit/<?= $method['id']; ?>" class="btn btn-sm btn-primary">Edit</a>
                        								<button onclick="hapus('<?= base_url(); ?>/admin/payment/delete/<?= $method['id']; ?>');" class="btn btn-sm btn-danger">Hapus</button>
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