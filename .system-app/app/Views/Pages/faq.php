                    <?php $this->extend('template'); ?>

                    <?php $this->section('konten'); ?>
                    <div class="row justify-content-center">
                        <div class="col-xl-6 col-lg-8 col-md-10">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Pertanyaan Umum</h5>
                                    <div class="accordion" id="accordionExample">
                                        <?php $no = 1; foreach ($faqs as $faq): ?>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="heading<?= $no; ?>">
                                                <button class="accordion-button <?= $no !== 1 ? 'collapsed' : ''; ?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?= $no; ?>" aria-expanded="true" aria-controls="collapse<?= $no; ?>">
                                                    <?= $faq['title']; ?>
                                                </button>
                                            </h2>
                                            <div id="collapse<?= $no; ?>" class="accordion-collapse collapse <?= $no == 1 ? 'show' : ''; ?>" aria-labelledby="heading<?= $no; ?>" data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    <?= $faq['content']; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <?php $no++; endforeach ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php $this->endSection(); ?>

                    <?php $this->section('js'); ?>
                    <?php $this->endSection(); ?>