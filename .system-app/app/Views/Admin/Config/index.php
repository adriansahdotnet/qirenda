                    <?php $this->extend('template'); ?>

                    <?php $this->section('konten'); ?>
                    <div class="row justify-content-center">
                        <div class="col-xl-8">
                			<h5 class="card-title">Konfigurasi</h5>
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
                            <ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="umum-tab" data-bs-toggle="tab" data-bs-target="#umum" type="button" role="tab" aria-controls="umum" aria-selected="true">Umum</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="konten-tab" data-bs-toggle="tab" data-bs-target="#konten" type="button" role="tab" aria-controls="konten" aria-selected="false">Konten</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="s-tab" data-bs-toggle="tab" data-bs-target="#s" type="button" role="tab" aria-controls="s" aria-selected="false">SMTP</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="tripay-tab" data-bs-toggle="tab" data-bs-target="#tripay" type="button" role="tab" aria-controls="tripay" aria-selected="false">Tripay</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="digiflazz-tab" data-bs-toggle="tab" data-bs-target="#digiflazz" type="button" role="tab" aria-controls="digiflazz" aria-selected="false">DigiFlazz</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="api-tab" data-bs-toggle="tab" data-bs-target="#api" type="button" role="tab" aria-controls="api" aria-selected="false">Api Games</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="fonnte-tab" data-bs-toggle="tab" data-bs-target="#fonnte" type="button" role="tab" aria-controls="fonnte" aria-selected="false">Fonnte</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="wa-tab" data-bs-toggle="tab" data-bs-target="#wa" type="button" role="tab" aria-controls="wa" aria-selected="false">Whatsapp</button>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="umum" role="tabpanel" aria-labelledby="umum-tab">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Umum</h5>
                                            <form action="" method="POST">
                                                <div class="mb-3 row">
                                                    <label class="col-form-label col-md-4">Nama Website</label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control" autocomplete="off" name="title" value="<?= $web['title']; ?>">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-form-label col-md-4">Icon Website</label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control" autocomplete="off" name="icon" value="<?= $web['icon']; ?>">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-form-label col-md-4">Logo Website</label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control" autocomplete="off" name="logo" value="<?= $web['logo']; ?>">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-form-label col-md-4">Author</label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control" autocomplete="off" name="author" value="<?= $web['author']; ?>">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-form-label col-md-4">Keywords</label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control" autocomplete="off" name="keywords" value="<?= $web['keywords']; ?>">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-form-label col-md-4">Deskripsi</label>
                                                    <div class="col-md-8">
                                                        <textarea cols="30" rows="5" class="form-control" name="description"><?= $web['description']; ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-form-label col-md-4">Pembayaran Saldo</label>
                                                    <div class="col-md-8">
                                                        <select name="pay_saldo" class="form-control">
                                                            <option value="On" <?= $pay_saldo == 'On' ? 'selected' : ''; ?>>On</option>
                                                            <option value="Off" <?= $pay_saldo == 'Off' ? 'selected' : ''; ?>>Off</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-form-label col-md-4">Lisensi Validasi Games</label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control" autocomplete="off" name="games_token" value="<?= $games_token; ?>">
                                                        <small>Hubungi Developer di <a href="wa.me/6285654008642">+62 856 5400 8642</a> untuk mendapatkan lisensi</small>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-form-label col-md-4">Chat ID Telegram</label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control" autocomplete="off" name="chat_id" value="<?= $chat_id; ?>">
                                                        <small>Silahkan start bot <a href="//t.me/nusasupport_bot" target="_blank">@nusasupport_bot</a> untuk mendapatkan notifikasi</small>
                                                    </div>
                                                </div>
                                                <div class="text-end">
                                                    <button class="btn btn-secondary" type="reset">Batal</button>
                                                    <button class="btn btn-primary" type="submit" name="tombol" value="submit">Simpan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="konten" role="tabpanel" aria-labelledby="konten-tab">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Konten</h5>
                                            <form action="" method="POST">
                                                <div class="mb-3 row">
                                                    <label class="col-form-label col-md-4">Gambar Slide 1</label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control" autocomplete="off" name="slide_1" value="<?= $slide['1']; ?>">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-form-label col-md-4">Gambar Slide 2</label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control" autocomplete="off" name="slide_2" value="<?= $slide['2']; ?>">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-form-label col-md-4">Gambar Slide 3</label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control" autocomplete="off" name="slide_3" value="<?= $slide['3']; ?>">
                                                    </div>
                                                </div>
                                                <div class="text-end">
                                                    <button class="btn btn-secondary" type="reset">Batal</button>
                                                    <button class="btn btn-primary" type="submit" name="tombol_konten" value="submit">Simpan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="s" role="tabpanel" aria-labelledby="s-tab">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">SMTP</h5>
                                            <form action="" method="POST">
                                                <div class="mb-3 row">
                                                    <label class="col-form-label col-md-4">SMTP Host</label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control" autocomplete="off" name="s_host" value="<?= $s['host']; ?>">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-form-label col-md-4">SMTP Username</label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control" autocomplete="off" name="s_user" value="<?= $s['user']; ?>">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-form-label col-md-4">SMTP Password</label>
                                                    <div class="col-md-8">
                                                        <input type="password" class="form-control" autocomplete="off" name="s_pass" value="<?= $s['pass']; ?>">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-form-label col-md-4">SMTP Port</label>
                                                    <div class="col-md-8">
                                                        <input type="number" class="form-control" autocomplete="off" name="s_port" value="<?= $s['port']; ?>">
                                                    </div>
                                                </div>
                                                <div class="text-end">
                                                    <button class="btn btn-secondary" type="reset">Batal</button>
                                                    <button class="btn btn-primary" type="submit" name="tombol_s" value="submit">Simpan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tripay" role="tabpanel" aria-labelledby="tripay-tab">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Tripay</h5>
                                            <h6 class="mb-3">Callback : <code><?= base_url(); ?>/sistem/tripay/callback</code></h6>
                                            <form action="" method="POST">
                                                <div class="mb-3 row">
                                                    <label class="col-form-label col-md-4">Api Key</label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control" autocomplete="off" name="tripay_api" value="<?= $tripay['api']; ?>">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-form-label col-md-4">Private Key</label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control" autocomplete="off" name="tripay_private" value="<?= $tripay['private']; ?>">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-form-label col-md-4">Kode Merchant</label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control" autocomplete="off" name="tripay_merchant" value="<?= $tripay['merchant']; ?>">
                                                    </div>
                                                </div>
                                                <div class="text-end">
                                                    <button class="btn btn-secondary" type="reset">Batal</button>
                                                    <button class="btn btn-primary" type="submit" name="tombol_tripay" value="submit">Simpan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="digiflazz" role="tabpanel" aria-labelledby="digiflazz-tab">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">DigiFlazz</h5>
                                            <form action="" method="POST">
                                                <div class="mb-3 row">
                                                    <label class="col-form-label col-md-4">Username</label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control" autocomplete="off" name="digi_user" value="<?= $digi['user']; ?>">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-form-label col-md-4">Production Key</label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control" autocomplete="off" name="digi_key" value="<?= $digi['key']; ?>">
                                                    </div>
                                                </div>
                                                <div class="text-end">
                                                    <button class="btn btn-secondary" type="reset">Batal</button>
                                                    <button class="btn btn-primary" type="submit" name="tombol_digi" value="submit">Simpan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="api" role="tabpanel" aria-labelledby="api-tab">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Api Games</h5>
                                            <form action="" method="POST">
                                                <div class="mb-3 row">
                                                    <label class="col-form-label col-md-4">Secret Key</label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control" autocomplete="off" name="api_secret" value="<?= $api['secret']; ?>">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-form-label col-md-4">Merchant ID</label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control" autocomplete="off" name="api_merchant" value="<?= $api['merchant']; ?>">
                                                    </div>
                                                </div>
                                                <div class="text-end">
                                                    <button class="btn btn-secondary" type="reset">Batal</button>
                                                    <button class="btn btn-primary" type="submit" name="tombol_api" value="submit">Simpan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="fonnte" role="tabpanel" aria-labelledby="fonnte-tab">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Fonnte</h5>
                                            <form action="" method="POST">
                                                <div class="mb-3 row">
                                                    <label class="col-form-label col-md-4">Api Key</label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control" autocomplete="off" name="fonnte_key" value="<?= $fonnte_key; ?>">
                                                    </div>
                                                </div>
                                                <div class="text-end">
                                                    <button class="btn btn-secondary" type="reset">Batal</button>
                                                    <button class="btn btn-primary" type="submit" name="tombol_fonnte" value="submit">Simpan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="wa" role="tabpanel" aria-labelledby="wa-tab">
                                    <div class="card">
                                        <div class="card-body">
                                            <form action="" method="POST">
                                                <h5 class="card-title">Ketika Pesanan Baru</h5>
                                                <div class="mb-3 row">
                                                    <label class="col-form-label col-md-4">Status</label>
                                                    <div class="col-md-8">
                                                        <select class="form-control" name="wa_order_status">
                                                            <option value="On" <?= $wa['order']['status'] == 'On' ? 'selected' : '' ?>>On</option>
                                                            <option value="Off" <?= $wa['order']['status'] == 'Off' ? 'selected' : '' ?>>Off</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-form-label col-md-4">Isi Pesan</label>
                                                    <div class="col-md-8">
                                                        <textarea class="form-control" name="wa_order_msg" rows="4"><?= $wa['order']['msg']; ?></textarea>
                                                    </div>
                                                </div>
                                                <h5 class="card-title">Ketika Pesanan Dibayar</h5>
                                                <div class="mb-3 row">
                                                    <label class="col-form-label col-md-4">Status</label>
                                                    <div class="col-md-8">
                                                        <select class="form-control" name="wa_pay_status">
                                                            <option value="On" <?= $wa['pay']['status'] == 'On' ? 'selected' : '' ?>>On</option>
                                                            <option value="Off" <?= $wa['pay']['status'] == 'Off' ? 'selected' : '' ?>>Off</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-form-label col-md-4">Isi Pesan</label>
                                                    <div class="col-md-8">
                                                        <textarea class="form-control" name="wa_pay_msg" rows="4"><?= $wa['pay']['msg']; ?></textarea>
                                                    </div>
                                                </div>
                                                <h5 class="card-title">Ketika Pesanan Berhasil</h5>
                                                <div class="mb-3 row">
                                                    <label class="col-form-label col-md-4">Status</label>
                                                    <div class="col-md-8">
                                                        <select class="form-control" name="wa_success_status">
                                                            <option value="On" <?= $wa['success']['status'] == 'On' ? 'selected' : '' ?>>On</option>
                                                            <option value="Off" <?= $wa['success']['status'] == 'Off' ? 'selected' : '' ?>>Off</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-form-label col-md-4">Isi Pesan</label>
                                                    <div class="col-md-8">
                                                        <textarea class="form-control" name="wa_success_msg" rows="4"><?= $wa['success']['msg']; ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="text-end">
                                                    <button class="btn btn-secondary" type="reset">Batal</button>
                                                    <button class="btn btn-primary" type="submit" name="tombol_wa" value="submit">Simpan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php $this->endSection(); ?>

                    <?php $this->section('js'); ?>
                    <?php $this->endSection(); ?>