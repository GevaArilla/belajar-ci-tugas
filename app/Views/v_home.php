<?= $this->extend('layout') ?> 
<?= $this->section('content') ?>

<?php
if (session()->getFlashData('success')) {
?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= session()->getFlashData('success') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php
}
?>
<div class="row">
    <?php if (!empty($product) && is_array($product)) : ?>
        <?php foreach ($product as $key => $item) : ?>        
            <div class="col-lg-6 mb-4">
                <?= form_open('keranjang') ?>
                
                <?= form_hidden([
                    'id'    => $item['id'],
                    'nama'  => $item['nama'],
                    'harga' => $item['harga'],
                    'foto'  => $item['foto']
                ]) ?>
                
                <div class="card h-100 shadow-sm border">
                    <div class="card-body text-center p-3">
                        <div class="d-flex align-items-center justify-content-center" style="height: 250px; overflow: hidden; background-color: #f8f9fa; border-radius: 8px;">
                            <?php if (!empty($item['foto'])) : ?>
                                <img src="<?= base_url() . "img/" . $item['foto'] ?>" alt="Foto Laptop" class="img-fluid" style="max-height: 100%; object-fit: contain;">
                            <?php else : ?>
                                <span class="text-muted">Tidak ada gambar</span>
                            <?php endif; ?>
                        </div>
                        
                        <div class="text-start mt-3">
                            <h5 class="fw-bold text-dark mb-1" style="font-size: 16px;"><?= esc($item['nama']) ?></h5>
                            <p class="text-primary fw-bold mb-3">IDR <?= number_format($item['harga'], 0, '.', ',') ?></p>
                            
                            <button type="submit" class="btn btn-info text-white rounded-pill px-4 btn-sm fw-bold">Beli</button>
                        </div>
                    </div>
                </div>
                
                <?= form_close() ?>
            </div> 
        <?php endforeach; ?>
    <?php else : ?>
        <div class="col-12 text-center py-5 text-muted">
            <p>Belum ada produk yang tersedia di database.</p>
        </div>
    <?php endif; ?>
</div>

<?= $this->endSection() ?>