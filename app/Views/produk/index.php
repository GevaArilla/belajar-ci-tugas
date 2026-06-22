<?= $this->extend('layout') ?>
<?= $this->section('content') ?> 

<div class="container-fluid">

    <?php if (session()->getFlashData('failed')) : ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= session()->getFlashData('failed') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashData('success')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= session()->getFlashData('success') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <div class="d-flex justify-content-between align-items-center flex-wrap mb-3 gap-2">
        <div class="d-flex gap-2">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
                <i class="bi bi-plus-circle"></i> Tambah Data
            </button>
            <a class="btn btn-success" target="_blank" href="<?= base_url('produk/download') ?>">
                <i class="bi bi-download"></i> Download Data
            </a>
        </div>
        <div>
            </div>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-bordered datatable">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Aksi</th> 
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($products) && is_array($products)) : ?>
                    <?php foreach ($products as $index => $produk) : ?>
                        <tr>
                            <th scope="row"><?= $index + 1 ?></th>
                            <td><?= esc($produk['nama']) ?></td>
                            <td>Rp <?= number_format($produk['harga'], 0, ',', '.') ?></td>
                            <td><?= esc($produk['jumlah']) ?></td>
                            <td>
                                <?php if (!empty($produk['foto']) && file_exists("img/" . $produk['foto'])) : ?>
                                    <img src="<?= base_url("img/" . $produk['foto']) ?>" class="img-thumbnail" style="max-height: 50px; width: auto;">
                                <?php else: ?>
                                    <span class="text-muted" style="font-size: 12px;">No Image</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#editModal-<?= $produk['id'] ?>">
                                    <i class="bi bi-pencil-square"></i> Ubah
                                </button>

                                <a href="<?= base_url('produk/delete/' . $produk['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus data ini ?')">
                                    <i class="bi bi-trash"></i> Hapus
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="6" class="text-center text-muted">Belum ada data produk.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php if (!empty($products) && is_array($products)) : ?>
    <?php foreach ($products as $produk) : ?>    
        <div class="modal fade" id="editModal-<?= $produk['id'] ?>" tabindex="-1" aria-hidden="true" style="z-index: 1060;">
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

<?= $this->include('produk/modal_add') ?>

<?= $this->endSection() ?>