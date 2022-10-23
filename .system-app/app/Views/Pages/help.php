                    <?php $this->extend('template'); ?>

                    <?php $this->section('konten'); ?>
                    <div class="row justify-content-center">
                        <div class="col-xl-6 col-lg-8 col-md-10">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Bantuan</h5>
                                    <p>Silahkan hubungi kami melalui kontak berikut, atau kirim pesan melalui form dibawah</p>
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
                                    <div class="row mb-5 mt-5">
                                        <div class="col-md-6 text-center">
                                            <i data-feather="mail"></i>
                                            <h6 class="mt-3">Email</h6>
                                            <p><?= $help['email']; ?></p>
                                        </div>
                                        <div class="col-md-6 text-center">
                                            <i data-feather="phone-call"></i>
                                            <h6 class="mt-3">Telpon</h6>
                                            <p><?= $help['telpon']; ?></p>
                                        </div>
                                    </div>
                                    <form action="" method="POST">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="mb-1">Nama Lengkap</label>
                                                    <input type="text" class="form-control" autocomplete="off" name="name">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="mb-1">Email</label>
                                                    <input type="email" class="form-control" autocomplete="off" name="email">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="mb-1">Pesan</label>
                                            <textarea cols="30" rows="4" class="form-control" name="pesan"></textarea>
                                        </div>
                                        <div class="text-end">
                                            <button class="btn btn-default" type="reset">Batal</button>
                                            <button class="btn btn-primary" type="submit" name="tombol" value="submit">Kirim</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php $this->endSection(); ?>

                    <?php $this->section('js'); ?>
                    <?php $this->endSection(); ?>