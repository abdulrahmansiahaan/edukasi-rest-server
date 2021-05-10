<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
                <?php if ($this->session->flashdata('flash')): 
                    unset($_SESSION['flash']); ?>
                <!-- <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?php echo $this->session->flashdata('flash'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div> -->
                <?php endif; ?>
                <div class="row mt-3 mb-3">
                    <div class="col-md-12">
                        <a class="btn btn-secondary btn-sm" href="<?php echo site_url('soal'); ?>" role="button"><i class="fas fa-arrow-left"></i> Kembali</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                            Pilihan Pertanyaan
                            </div>
                            <div class="card-body">
                                <h3 class="card-title"><?= $dataSoal->soal; ?></h3>
                                <div class="d-inline text-dark">#<?= $dataSoal->katname; ?></div>
                                <div class="d-inline text-dark">#<?= $dataSoal->skatname; ?></div>
                                <div class="d-inline text-dark">#<?= $dataSoal->type_soal; ?></div>
                                <hr>
                                <h5>Jawaban</h5>
                                <a href="<?php echo site_url('pilihan_pertanyaan/insert/'.$dataSoal->id); ?>" class="badge badge-primary"><i class="fas fa-plus"></i> Tambah Pilihan</a>
                                <table>
                                <?php foreach ($dataPP as $recPP): ?>
                                <tr>
                                    <td>#</td>
                                    <td>
                                        <div class="<?= $recPP->is_right == true ? 'text-success' : 'text-dark'; ?>"><?= $recPP->pilihan; ?>
                                        </div>
                                    </td>
                                    <td>&nbsp;</td>
                                    <td>
                                    <a href="#" class="badge badge-warning"><i class="fas fa-edit"></i> Edit</a>
                                    <a href="#" class="badge badge-danger"><i class="fas fa-trash"></i> Hapus</a>
                                    </td>
                                </tr>
                                <?php endforeach ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
