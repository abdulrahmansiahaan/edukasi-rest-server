<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="row mt-3 mb-3">
                    <div class="col-md-12">
                        <a class="btn btn-secondary btn-sm" href="<?php echo site_url('pilihan_pertanyaan/show/'.$dataSoal->id); ?>" role="button"><i class="fas fa-arrow-left"></i> Kembali</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">

                    <form action="<?php echo site_url('pilihan_pertanyaan/insert/'.$dataSoal->id) ?>" method="post" enctype="multipart/form-data" >
                        <input type="hidden" name="soal_id" value="<?php echo $dataSoal->id?>" />
                                                
                        <div class="form-group row">
                            <label for="is_right" class="col-sm-3 col-form-label col-form-label-sm">Is Right<span class="text-danger">*</span> : </label>
                            <div class="col-sm-9">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="is_right" id="is_right1" value="1">
                                <label class="form-check-label" for="is_right1">Benar</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="is_right" id="is_right2" value="0" checked>
                                <label class="form-check-label" for="is_right2">Salah</label>
                            </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="pilihan" class="col-sm-3 col-form-label col-form-label-sm">Pilihan<span class="text-danger">*</span> : </label>
                            <div class="col-sm-9">
                                <input type="text" name="pilihan" class="form-control form-control-sm <?php echo form_error('pilihan') ? 'is-invalid':'' ?>" id="pilihan" placeholder="Tulis pilihan...">
                                <div class="invalid-feedback">
                                    <?php echo form_error('pilihan') ?>
                                </div>
                            </div>
                        </div>

                        <input class="btn btn-primary btn-sm float-right" type="submit" name="btn" value="Simpan Pilihan" />
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
