<?php if (!empty($products) && is_array($products)) : ?>
    <?php foreach ($products as $produk) : ?>    
        <div class="modal fade" id="editModal-<?= $produk['id'] ?>" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" style="color: #333;">Edit Data - <?= esc($produk['nama']) ?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    
                    <?= form_open_multipart(base_url('produk/edit/' . $produk['id'])); ?>
                    <?= csrf_field(); ?>

                    <div class="modal-body text-start" style="color: #333;">
                        <div class="mb-3">
                            <?= form_label('Nama', 'nama-' . $produk['id'], ['class' => 'form-label']); ?>
                            <?= form_input([
                                'name'     => 'nama',
                                'id'       => 'nama-' . $produk['id'],
                                'class'    => 'form-control',
                                'value'    => $produk['nama'],
                                'required' => true
                            ]); ?>
                        </div>

                        <div class="mb-3">
                            <?= form_label('Harga', 'harga-' . $produk['id'], ['class' => 'form-label']); ?>
                            <?= form_input([
                                'name'     => 'harga',
                                'id'       => 'harga-' . $produk['id'],
                                'class'    => 'form-control',
                                'value'    => $produk['harga'],
                                'required' => true
                            ]); ?>
                        </div>

                        <div class="mb-3">
                            <?= form_label('Jumlah', 'jumlah-' . $produk['id'], ['class' => 'form-label']); ?>
                            <?= form_input([
                                'type'     => 'number', 
                                'name'     => 'jumlah',
                                'id'       => 'jumlah-' . $produk['id'],
                                'class'    => 'form-control',
                                'value'    => $produk['jumlah'],
                                'required' => true
                            ]); ?>
                        </div>

                        <div class="mb-3">
                            <label class="form-label d-block">Foto Saat Ini</label>
                            <?php if (!empty($produk['foto']) && file_exists("img/" . $produk['foto'])) : ?>
                                <img src="<?= base_url('img/' . $produk['foto']); ?>" width="100" class="img-thumbnail mb-2">
                            <?php else: ?>
                                <span class="text-muted d-block mb-2" style="font-size: 12px;">Tidak ada foto sebelumnya</span>
                            <?php endif; ?>
                        </div>

                        <div class="form-check mb-3">
                            <?= form_checkbox([
                                'name'    => 'check',
                                'id'      => 'check-' . $produk['id'],
                                'value'   => '1',
                                'class'   => 'form-check-input'
                            ]); ?>
                            <?= form_label('Ceklis jika ingin mengganti foto', 'check-' . $produk['id'], ['class' => 'form-check-label']); ?>
                        </div>

                        <div class="mb-3">
                            <?= form_label('Ganti Foto Baru', 'foto-' . $produk['id'], ['class' => 'form-label']); ?>
                            <?= form_upload([
                                'name'  => 'foto',
                                'id'    => 'foto-' . $produk['id'],
                                'class' => 'form-control'
                            ]); ?>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <?= form_submit('submit', 'Simpan Perubahan', ['class' => 'btn btn-primary']); ?>
                    </div>

                    <?= form_close(); ?>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
<?php endif; ?>