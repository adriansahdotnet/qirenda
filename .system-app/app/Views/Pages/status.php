                    <?php $this->extend('template'); ?>

                    <?php $this->section('konten'); ?>
                    <div class="row justify-content-center">
                        <div class="col-xl-6 col-lg-8 col-md-10">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Status Pembelian</h5>
                                    <p>Silahkan masukan Order ID pesanan kamu pada kolom pencarian ya</p>
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
                                    <form action="" method="GET">
                                        <div class="input-group mb-3">
                                            <input type="number" class="form-control" placeholder="Order ID" name="order_id" autocomplete="off">
                                            <button class="btn btn-outline-secondary" type="submit" name="tombol" value="submit">Cari</button>
                                        </div>
                                    </form>
                                    <?php if (session('detail')): ?>
                                    <div class="mt-4">
                                        <h4>Detail #<?= session('detail')['order_id']; ?></h4>
                                        <p>Berikut ini adalah detail dari pembelian.</p>
                                        <div class="mb-2">
                                            <?php 
                                            if (session('detail')['status'] === 'Pending') {
                                                $bg = 'warning';
                                            } else if (session('detail')['status'] === 'Processing') {
                                                $bg = 'info';
                                            } else if (session('detail')['status'] === 'Completed') {
                                                $bg = 'success';
                                            } else {
                                                $bg = 'danger';
                                            }
                                            ?>
                                            <h6 class="bg-<?= $bg; ?> d-inline-block px-3 py-2 rounded-3 text-white"><?= session('detail')['status']; ?></h6>
                                        </div>
                                        <table>
                                            <tr>
                                                <th class="pb-2">Email</th>
                                                <td class="ps-5 pb-2 pe-2">:</td>
                                                <td class="pb-2"><?= session('detail')['email_account']; ?></td>
                                            </tr>
                                            <tr>
                                                <th class="pb-2">Produk</th>
                                                <td class="ps-5 pb-2 pe-2">:</td>
                                                <td class="pb-2"><?= session('detail')['product']; ?></td>
                                            </tr>
                                            <tr>
                                                <th class="pb-2">Harga</th>
                                                <td class="ps-5 pb-2 pe-2">:</td>
                                                <td class="pb-2">Rp&nbsp;<?= number_format(session('detail')['price'],0,',','.'); ?></td>
                                            </tr>
                                            <?php if (session('detail')['status'] == 'Completed'): ?>
                                            <tr>
                                                <th style="vertical-align: top;" class="pb-2">Keterangan / SN</th>
                                                <td style="vertical-align: top;" class="ps-2 pb-2 pe-2">:</td>
                                                <td class="pb-2">
                                                    <textarea class="form-control border-0 bg-white p-0" rows="4" readonly><?= session('detail')['note']; ?></textarea>
                                                </td>
                                            </tr>
                                            <?php endif; ?>
                                        </table>
                                        <?php if (session('detail')['status'] == 'Pending'): ?>
                                        <h4 class="mt-4">Pembayaran</h4>
                                        <?php if (empty(session('detail')['payment_code'])): ?>
                                        <a href="<?= session('detail')['payment_url'] ?>" target="_blank">Bayar Sekarang</a>
                                        <?php else: ?>
                                        <label>Kode Pembayaran</label><br>
                                        <div class="d-inline-block p-2 border rounded">
                                            <?= session('detail')['payment_code'] ?>
                                        </div>
                                        <?php endif; ?>
                                        <?php endif; ?>
                                        <p class="mt-3">Terimakasih telah melakukan pembelian kebutuhan game kamu di <?= $web['title']; ?> <br> Silahkan hubungi kami untuk mendapatkan informasi terbaru.</p>
                                    </div>
                                    <?php endif ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php $this->endSection(); ?>

                    <?php $this->section('js'); ?>
                    <?php $this->endSection(); ?>