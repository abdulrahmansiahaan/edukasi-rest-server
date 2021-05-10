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
                        <a class="btn btn-primary btn-sm" href="<?php echo site_url('soal/insert') ?>" role="button"><i class="fas fa-plus"></i> Tambah Soal</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-hover table-sm" id="dataTable" width="100%" cellspacing="0">
                                <thead class="bg-secondary">
                                    <tr class="text-white">
                                        <th style="width:10px;">No</th>
                                        <th style="width:250px;">Soal</th>
                                        <th class="text-center">Tipe Soal</th>
                                        <th class="text-center">Kategori</th>
                                        <th class="text-center">Sub-Kategori</th>
                                        <th class="text-center">Is Active</th>
                                        <th>Gambar</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php if ( ! empty($dataSoal)) {?>
                                    <?php 
                                        $no = 1;
                                        foreach ($dataSoal as $recSoal): ?>
                                    <tr>
                                        <td>
                                            <?php echo $no++; ?>
                                        </td>
                                        <td>
                                            <?php echo $recSoal->soal ?>
                                        </td>
                                        <?php if ($recSoal->type_soal == 'essay') {?>
                                        <td class="text-center">
                                            Essay
                                        </td>
                                        <?php } else {?>
                                        <td class="text-center">
                                            <a href="<?php echo site_url('pilihan_pertanyaan/show/'.$recSoal->id) ?>"
                                                class=""><i class="fas fa-eye"></i> Lihat
                                            </a>
                                            <div>Pilihan Ganda</div>
                                        </td>
                                        <?php } ?>                                        
                                        <td class="text-center">
                                            <?php echo $recSoal->katname ?>
                                        </td>
                                        <td class="text-center">
                                            <?php echo $recSoal->skatname ?>
                                        </td>
                                        <td class="text-center">
                                            <?php echo $recSoal->is_active ?>
                                        </td>
                                        <td>
                                            <img src="<?php echo base_url('assets/images/'.$recSoal->gambar) ?>" width="64" />
                                        </td>
                                        <td width="250">
                                            <a href="<?php echo site_url('soal/detail/'.$recSoal->id) ?>"
                                                class="btn btn-sm text-success"><i class="fas fa-list"></i> Detail
                                            </a>
                                            <a href="<?php echo site_url('soal/update/'.$recSoal->id) ?>"
                                                class="btn btn-sm"><i class="fas fa-edit"></i> Edit
                                            </a>
                                            <a
                                                href="<?php echo site_url('soal/delete/'.$recSoal->id) ?>" class="btn btn-sm text-danger tombol-hapus"><i class="fas fa-trash"></i> Hapus
                                            </a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                    <?php } ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>