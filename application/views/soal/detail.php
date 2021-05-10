<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="row mt-3 mb-3">
                    <div class="col-md-12">
                        <a class="btn btn-secondary btn-sm" href="<?php echo site_url('soal'); ?>" role="button"><i class="fas fa-arrow-left"></i> Kembali</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                            Detail Soal
                            </div>
                            <div class="card-body">
                                <h3 class="card-title"><?= $dataSoal->soal; ?></h3>
                                <div class="d-inline text-dark">#<?= $dataSoal->katname; ?></div>
                                <div class="d-inline text-dark">#<?= $dataSoal->skatname; ?></div>
                                <div class="d-inline text-dark">#<?= $dataSoal->type_soal; ?></div>
                                <hr>
                                <h5>Jawaban</h5>
                                <div class="d-inline text-dark">#</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
