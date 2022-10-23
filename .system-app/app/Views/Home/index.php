                    <?php $this->extend('template'); ?>

                    <?php $this->section('konten'); ?>
                    <div style="max-width: 920px;margin: auto;">
                        <div id="carouselExampleIndicators" class="carousel slide mb-5" data-bs-ride="carousel">
                            <div class="carousel-inner" style="border-radius: 16px;">
                                <?php for ($i = 1; $i <= 3; $i++): ?>
                                <div class="carousel-item <?= $i == 1 ? 'active' : ''; ?>">
                                    <img style="max-height: 350px;" src="<?= $slide[$i]; ?>" class="d-block w-100">
                                </div>
                                <?php endfor; ?>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                        <?php foreach ($games as $game): ?>
                        <h4 class="mb-2 mt-3 text-dark"><?= $game['name']; ?></h4>
                        <div class="text-center">
                            <?php foreach ($game['games'] as $data_loop): ?>
                            <a class="of-game" href="<?= base_url(); ?>/buy/games/<?= $data_loop['slug']; ?>">
                                <?php if (filter_var($data_loop['images'], FILTER_VALIDATE_URL)): ?>
                                <img src="<?= $data_loop['images']; ?>" alt="" class="w-100">
                                <?php else: ?>
                                <img src="<?= base_url(); ?>/assets/images/games/<?= $data_loop['images']; ?>" alt="" class="w-100">
                                <?php endif ?>

                                <p class="mb-0 mt-2 text-center"><?= $data_loop['name']; ?></p>
                            </a>
                            <?php endforeach; ?>
                        </div>
                        <?php endforeach ?>
                    </div>
                    <?php $this->endSection(); ?>

                    <?php $this->section('js'); ?>
                    <?php $this->endSection(); ?>