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
                    <div class="col-md-6">

                        <form action="<?php echo site_url('soal/update/'.$soal->id) ?>" method="post" enctype="multipart/form-data" >
						<input type="hidden" name="id" value="<?php echo $soal->id?>" />
                            <div class="form-group row">
                                <label for="kategori_id" class="col-sm-3 col-form-label col-form-label-sm">Kategori<span class="text-danger">*</span> : </label>
                                <div class="col-sm-9">
                                    <select name="kategori_id" id="kategori_id" class="form-control form-control-sm <?php echo form_error('kategori_id') ? 'is-invalid':'' ?>">
                                        <?php foreach ($list_kategori as $key_kat => $rec_kat): ?>
											<option <?php if($soal->kategori_id == $key_kat){ echo 'selected="selected"'; } ?> value="<?php echo $key_kat; ?>"><?php echo $rec_kat; ?> </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?php echo form_error('kategori_id') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="sub_kategori_id" class="col-sm-3 col-form-label col-form-label-sm">Sub-Kategori<span class="text-danger">*</span> : </label>
                                <div class="col-sm-9">
                                    <select name="sub_kategori_id" id="sub_kategori_id" class="form-control form-control-sm <?php echo form_error('sub_kategori_id') ? 'is-invalid':'' ?>">
                                        <?php foreach ($list_subkategori as $key_subkat => $rec_subkat): ?>
											<option <?php if($soal->sub_kategori_id == $key_subkat){ echo 'selected="selected"'; } ?> value="<?php echo $key_subkat; ?>"><?php echo $rec_subkat; ?> </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?php echo form_error('sub_kategori_id') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="type_soal" class="col-sm-3 col-form-label col-form-label-sm">Tipe<span class="text-danger">*</span> : </label>
                                <div class="col-sm-9">
                                    <select name="type_soal" id="type_soal" class="form-control form-control-sm <?php echo form_error('type_soal') ? 'is-invalid':'' ?>">
										<option value="" selected disabled>&#8212;</option>
                                        <option <?php if($soal->type_soal == 'essay'){ echo 'selected="selected"'; } ?> value="essay">Essay</option>
                                        <option <?php if($soal->type_soal == 'pilihan ganda'){ echo 'selected="selected"'; } ?> value="pilihan ganda">Pilihan Ganda</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?php echo form_error('type_soal') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="soal" class="col-sm-3 col-form-label col-form-label-sm">Soal<span class="text-danger">*</span> : </label>
                                <div class="col-sm-9">
                                    <textarea class="form-control form-control-sm <?php echo form_error('soal') ? 'is-invalid':'' ?>"
                                    name="soal" rows="5" placeholder="Tulis Soal..."><?php echo $soal->soal ?></textarea>
                                    <div class="invalid-feedback">
                                        <?php echo form_error('soal') ?>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="gambar" class="col-sm-3 col-form-label col-form-label-sm">Gambar<span class="text-danger">*</span> : </label>
                                <div class="col-sm-9">
									<input class="form-control-file <?php echo form_error('gambar') ? 'is-invalid':'' ?>"
									type="file" name="gambar" />
									<input type="hidden" name="old_gambar" value="<?php echo $soal->gambar ?>" />
									<div class="invalid-feedback">
										<?php echo form_error('gambar') ?>
									</div>
                                </div>
                            </div>                            

                            <div class="form-group row">
                                <label for="is_active" class="col-sm-3 col-form-label col-form-label-sm">Is Active<span class="text-danger">*</span> : </label>
                                <div class="col-sm-9">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="is_active" id="is_active1" value="0" <?php if($soal->is_active == 0){ echo 'checked="checked"'; } ?>>
                                    <label class="form-check-label" for="is_active1">Tidak</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="is_active" id="is_active2" value="1" <?php if($soal->is_active == 1){ echo 'checked="checked"'; } ?>>
                                    <label class="form-check-label" for="is_active2">ya</label>
                                </div>
                                </div>
                            </div>

                            <input class="btn btn-primary btn-sm float-right" type="submit" name="btn" value="Simpan Soal" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
