                    <?php $this->extend('template'); ?>

                    <?php $this->section('konten'); ?>
                    <div class="row justify-content-center">
                        <div class="col-xl-12 col-md-12">
                            <form action="" method="POST" id="form-place">
                                <div class="row">
                                    <div class="col-xl-3 col-lg-3 col-md-3" id="rincian-game">
                                        <div class="card">
                                            <div class="card-body">
                                                <?php if (filter_var($games['images'], FILTER_VALIDATE_URL)): ?>
                                                <img src="<?= $games['images']; ?>" alt="" class="w-100 rounded mb-3">
                                                <?php else: ?>
                                                <img src="<?= base_url(); ?>/assets/images/games/<?= $games['images']; ?>" alt="" class="w-100 rounded mb-3">
                                                <?php endif; ?>
                                                <?= $games['content']; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-9 col-lg-9 col-md-9">
                                        <?php if (session('error')): ?>
                                        <div class="alert alert-danger mb-5">
                                            <b>Gagal</b> <?= session('error'); ?>
                                        </div>
                                        <?php endif ?>
                                        <div class="card mt-4">
                                            <div class="card-body">
                                                <div class="card-number bg-primary text-white">1</div>
                                                <h5 class="card-name">Masukan ID Akun</h5>
                                                <div class="row">
                                                    <?= $this->include('Buy/template-target/' . $games['target']); ?>
                                                </div>
                                                <div id="result-detail"></div>
                                            </div>
                                        </div>
                                        <div class="card mt-5">
                                            <div class="card-body">
                                                <div class="card-number bg-primary text-white">2</div>
                                                <h5 class="card-name">Pilih Nominal Top Up</h5>
                                                <?php if (count($products) == 0): ?>
                                                <div class="alert alert-warning">
                                                    <b>Informasi</b> Produk games ini belum tersedia
                                                </div>
                                                <?php else : ?>
                                                <div class="row">
                                                    <?php foreach ($products as $product): ?>
                                                    <div class="col-md-4 col-6 mb-3 margin-none-m">
                                                        <div id="produk-<?= $product['id']; ?>" class="border produk-list text-center cursor-pointer" onclick="select('<?= $product['id']; ?>');">
                                                            <?= $product['product']; ?>
                                                        </div>
                                                    </div>
                                                    <?php endforeach; ?>
                                                </div>
                                                <?php endif ?>
                                            </div>
                                        </div>
                                        <div class="card mt-5">
                                            <div class="card-body">
                                                <div class="card-number bg-primary text-white">3</div>
                                                <h5 class="card-name">Pilih Pembayaran</h5>
                                                <?php foreach ($methods as $method): ?>
                                                <div id="method-<?= $method['id']; ?>" class="border p-3 metode-list mb-3 cursor-pointer" onclick="method('<?= $method['id']; ?>');">
                                                    <div class="row">
                                                        <div class="col-7 ps-2">
                                                            <div style="margin: 5px 0;">
                                                                <img src="<?= $method['images']; ?>" alt="" width="120" class="mt-1">
                                                            </div>
                                                        </div>
                                                        <div id="price-<?= $method['id']; ?>" class="col-5">
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php endforeach; ?>

                                                <?php if ($pay_saldo == 'On'): ?>    
                                                <div id="method-123" class="border p-3 metode-list mb-3 cursor-pointer" onclick="method('123');">
                                                    <div class="row">
                                                        <div class="col-7 ps-2">
                                                            <div style="margin: 5px 0;">
                                                                <img src="<?= base_url(); ?>/assets/images/wallet.png" alt="" width="35" class="mt-1"> 
                                                                <h5 class="d-inline-block ms-2">Saldo</h5>
                                                            </div>
                                                        </div>
                                                        <div id="price-123" class="col-5">
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php endif ?>
                                            </div>
                                        </div>
                                        <div class="card mt-5">
                                            <div class="card-body">
                                                <div class="card-number bg-primary text-white">4</div>
                                                <h5 class="card-name">Bukti Pembelian</h5>
                                                <p>Optional: Jika anda ingin mendapatkan bukti pembayaran atas pembelian anda</p>
                                                <div class="mb-3">
                                                    <input type="email" class="form-control py-3" placeholder="Alamat Email" autocomplete="off" name="email">
                                                </div>
                                                <div class="mb-3">
                                                    <input type="number" class="form-control py-3" placeholder="No. Whatsapp (Ex: 08xxxx)" autocomplete="off" name="wa">
                                                </div>
                                                <div class="text-end">
                                                    <button class="btn btn-primary py-3 px-5" type="submit" name="tombol" value="submit">Beli Sekarang</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <?php $this->endSection(); ?>

                    <?php $this->section('js'); ?>
                    <script>

                        <?php if ($games['validasi_status'] == 'Y'): ?>
                        function cek_target() {

                            var id = $("#id").val();
                            var server = $("#server").val();

                            $.ajax({
                                url: '<?= base_url(); ?>/buy/get/user-detail/<?= $games['validasi_kode'] ?>',
                                data: 'id=' + id + '&server=' + server,
                                type: 'POST',
                                dataType: 'JSON',
                                error: function() {
                                    $("#btn-cek").html('Cek').removeAttr('disabled');
                                    $("#result-detail").html('<div class="alert mt-3 alert-danger">ID Playar harus diisi</div>');
                                }, beforeSend: function() {
                                    $("#btn-cek").html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>').attr('disabled', 'disabled');
                                }, success: function(result) {

                                    $("#btn-cek").html('Cek').removeAttr('disabled');

                                    if (result.ok == true) {
                                        $("#result-detail").html('<div class="alert mt-3 alert-primary">ID Player : '+result.name+'</div>');
                                    } else {
                                        $("#result-detail").html('<div class="alert mt-3 alert-danger">'+result.msg+'</div>');
                                    }
                                }
                            });
                        }
                        <?php endif; ?>

                        function select(id) {
                            $(".produk-list").removeClass('bg-primary text-white');
                            $("#produk-" + id).addClass('bg-primary text-white');

                            $.ajax({
                                url: '<?= base_url(); ?>/buy/price',
                                data: 'product=' + id,
                                type: 'POST',
                                dataType: 'JSON',
                                success: function(result) {
                                    if (result.status == true) {

                                        $("#input-product").val(id);

                                        result.price.forEach(function(item) {
                                            $("#price-" + item.method).html('<p class="text-muted mb-1" style="font-size: 11px;">Harga</p><h6 class="m-0">Rp '+item.price+'</h6>');
                                        });
                                    } else {
                                        location.reload();
                                    }
                                }
                            })
                        }
                        function method(id) {

                            if ($("#input-product").val() == '') {
                                swal("Gagal!", "Silahkan pilih nominal Top Up", "info");
                            } else {

                                <?php if ($users == false): ?>    
                                if (id == 123) {
                                    swal("Gagal!", "Silahkan login dahulu untuk menggunakan metode ini", "info");

                                    return false;
                                }
                                <?php endif ?>

                                $("#input-method").val(id);

                                $("#method-select").remove();
                                $(".method-list").removeClass('active');

                                $("#method-" + id).addClass('active');
                                $("#method-" + id).prepend('<span id="method-select" class="bg-primary"></span>');
                            }
                        }

                        $("#form-place").prepend('<input type="hidden" id="input-product" name="product"><input type="hidden" id="input-method" name="method">');
                    </script>
                    <?php $this->endSection(); ?>