                    <?php $this->extend('template'); ?>

                    <?php $this->section('konten'); ?>
                    <div class="row justify-content-center">
                        <div class="col-xl-10 col-lg-10 col-md-10">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="list-group" id="list-tab" role="tablist">
                                        <a class="list-group-item list-group-item-action active" id="list-profile-list" data-bs-toggle="list" href="#list-profile" role="tab">Profile</a>
                                        <a class="list-group-item list-group-item-action" id="list-isi-list" data-bs-toggle="list" href="#list-isi" role="tab">Isi Saldo</a>
                                        <a class="list-group-item list-group-item-action" id="list-home-list" data-bs-toggle="list" href="#list-home" role="tab">Pesanan</a>
                                        <a class="list-group-item list-group-item-action" id="list-messages-list" data-bs-toggle="list" href="#list-messages" role="tab">Pengaturan</a>
                                    </div>
                                    <a href="<?= base_url(); ?>/logout" class="btn btn-danger w-100 mt-3 mb-4">Logout</a>
                                </div>
                                <div class="col-md-8">
                                    <?php if (session('error')): ?>
                                    <div class="alert alert-danger">
                                        <b>Gagal</b> <?= session('error'); ?>
                                    </div>
                                    <?php endif ?>
                                    <?php if (session('success')): ?>
                                    <div class="alert alert-success">
                                        <b>Berhasil</b> <?= session('success'); ?>
                                    </div>
                                    <?php endif ?>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <i class="text-primary float-end" data-feather="dollar-sign"></i>
                                                    <p class="text-muted mb-1">Sisa Saldo</p>
                                                    <h4 class="text-primary mb-0">Rp <?= number_format($users['balance'],0,',','.'); ?></h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <i class="text-primary float-end" data-feather="shopping-cart"></i>
                                                    <p class="text-muted mb-1">Total Pembelian</p>
                                                    <h4 class="text-primary mb-0"><?= number_format(count($orders),0,',','.'); ?></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="tab-content" id="nav-tabContent">
                                                <div class="tab-pane fade show active" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
                                                    <h3 class="card-title">Profile</h3>
                                                    <form action="" method="POST">
                                                        <div class="mb-3 row">
                                                            <label class="col-form-label col-md-4">Nama Lengkap</label>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control" autocomplete="off" autocomplete="off" value="<?= $users['name']; ?>" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 row">
                                                            <label class="col-form-label col-md-4">Email</label>
                                                            <div class="col-md-8">
                                                                <input type="email" class="form-control" autocomplete="off" autocomplete="off" value="<?= $users['email']; ?>" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 row">
                                                            <label class="col-form-label col-md-4">Terdaftar</label>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control" autocomplete="off" autocomplete="off" value="<?= $users['date_create']; ?>" readonly>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="tab-pane fade" id="list-isi" role="tabpanel" aria-labelledby="list-isi-list">
                                                    <h3 class="card-title">Isi Saldo</h3>
                                                    <form action="" method="POST">
                                                        <div class="mb-3 row">
                                                            <label class="col-form-label col-md-4">Jumlah Isi</label>
                                                            <div class="col-md-8">
                                                                <input type="hidden" name="method" id="input-method">
                                                                <input type="number" class="form-control" autocomplete="off" autocomplete="off" name="quantity">
                                                            </div>
                                                        </div>
                                                        <?php foreach ($methods as $method): ?>
                                                        <div id="method-<?= $method['id']; ?>" class="border p-3 metode-list mb-3 cursor-pointer" onclick="method('<?= $method['id']; ?>');">
                                                            <div class="row">
                                                                <div class="col-7 ps-2">
                                                                    <div style="margin: 5px 0;">
                                                                        <img src="<?= $method['images']; ?>" alt="" width="120" class="mt-1">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php endforeach; ?>
                                                        <div class="text-end">
                                                            <button class="btn btn-default" type="reset">Batal</button>
                                                            <button class="btn btn-primary" type="submit" name="isi_saldo" value="submit">Isi Saldo</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="tab-pane fade" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
                                                    <h3 class="card-title">Pesanan</h3>
                                                    <ul class="list-group">
                                                        <?php foreach ($orders as $order): ?>
                                                        <li class="list-group-item d-flex align-items-center"> 
                                                            <?php if (filter_var($order['games_img'], FILTER_VALIDATE_URL)): ?>
                                                            <img src="<?= $order['games_img']; ?>" alt="" width="50" class="rounded">
                                                            <?php else: ?>
                                                            <img src="<?= base_url(); ?>/assets/images/games/<?= $order['games_img']; ?>" alt="" width="50" class="rounded">
                                                            <?php endif; ?>
                                                            <div class="ms-3 pt-2">
                                                                <h6><a href="<?= base_url(); ?>/status/?order_id=<?= $order['order_id']; ?>">ID #<?= $order['order_id']; ?></a></h6>
                                                                <p><?= $order['product']; ?></p>
                                                            </div>
                                                            <h6 style="position: absolute;right: 20px;">Rp <?= number_format($order['price'],0,',','.'); ?></h6>
                                                        </li>
                                                        <?php endforeach; ?>
                                                        <?php if (count($orders) == 0): ?>
                                                        <li class="list-group-item d-flex align-items-center justify-content-center">
                                                            Tidak ada pesanan
                                                        </li>
                                                        <?php endif ?>
                                                    </ul>
                                                </div>
                                                <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">
                                                    <h3 class="card-title">Pengaturan</h3>
                                                    <form action="" method="POST">
                                                        <div class="mb-3 row">
                                                            <label class="col-form-label col-md-4">Password Lama</label>
                                                            <div class="col-md-8">
                                                                <input type="password" class="form-control" autocomplete="off" autocomplete="off" name="passwordl">
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 row">
                                                            <label class="col-form-label col-md-4">Password Baru</label>
                                                            <div class="col-md-8">
                                                                <input type="password" class="form-control" autocomplete="off" autocomplete="off" name="passwordb">
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 row">
                                                            <label class="col-form-label col-md-4">Ulangi Password Baru</label>
                                                            <div class="col-md-8">
                                                                <input type="password" class="form-control" autocomplete="off" autocomplete="off" name="passwordbb">
                                                            </div>
                                                        </div>
                                                        <div class="text-end">
                                                            <button class="btn btn-default" type="reset">Batal</button>
                                                            <button class="btn btn-primary" type="submit" name="tombol" value="reset">Simpan</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php $this->endSection(); ?>

                    <?php $this->section('js'); ?>
                    <script>
                        function method(id) {
                            
                            $("#input-method").val(id);

                            $("#method-select").remove();
                            $(".method-list").removeClass('active');

                            $("#method-" + id).addClass('active');
                            $("#method-" + id).prepend('<span id="method-select" class="bg-primary"></span>');
                        }
                    </script>
                    <?php $this->endSection(); ?>