                    <?php $this->extend('template'); ?>

                    <?php $this->section('konten'); ?>
                    <div class="row justify-content-center">
                        <div class="col-xl-10">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <i class="text-primary float-end" data-feather="users"></i>
                                            <p class="text-muted mb-1">Total Pengguna</p>
                                            <h4 class="text-primary mb-0"><?= number_format($total['users'],0,',','.'); ?></h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <i class="text-primary float-end" data-feather="award"></i>
                                            <p class="text-muted mb-1">Total Games</p>
                                            <h4 class="text-primary mb-0"><?= number_format($total['games'],0,',','.'); ?></h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <i class="text-primary float-end" data-feather="shopping-cart"></i>
                                            <p class="text-muted mb-1">Total Transaksi</p>
                                            <h4 class="text-primary mb-0"><?= number_format($total['orders'],0,',','.'); ?></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Grafik Pembelian 7 Hari Terakhir</h5>
                                    <div id="myfirstchart" style="height: 350px;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php $this->endSection(); ?>

                    <?php $this->section('js'); ?>
                    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
                    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
                    <script>
                        new Morris.Line({
                            element: 'myfirstchart',
                            data: [
                                <?php foreach (array_reverse($grafik) as $loop): ?>
                                { tanggal: '<?= $loop['tanggal']; ?>', transaksi: <?= $loop['transaksi']; ?> },
                                <?php endforeach ?>
                            ],
                            xkey: 'tanggal',
                            ykeys: ['transaksi'],
                            labels: ['Transaksi '],
                            lineColors: ['#7888fc'],
                            resize: true,
                            parseTime: false
                        });
                    </script>
                    <?php $this->endSection(); ?>