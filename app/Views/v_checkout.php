<?= $this->extend('layout') ?> 
<?= $this->section('content') ?> 

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<style>
    /* Merapikan tampilan Select2 agar serasi dengan Bootstrap */
    .select2-container .select2-selection--single {
        height: 38px !important;
        border: 1px solid #dee2e6 !important;
        border-radius: 0.375rem !important;
    }
    .select2-container--default .select2-selection--single .select2-selection__rendered {
        line-height: 38px !important;
        color: #212529 !important;
        padding-left: 12px !important;
    }
    .select2-container--default .select2-selection--single .select2-selection__arrow {
        height: 36px !important;
    }
</style>

<div class="row"> 
    <div class="col-lg-6"> 
        <?= form_open('buy', 'class="row g-3"') ?> 
        <?= form_hidden('username', session()->get('username')) ?> 
        <?= form_input(['type' => 'hidden', 'name' => 'total_harga', 'id' => 'total_harga', 'value' => '']) ?> 
        
        <div class="col-12"> 
            <label for="nama" class="form-label">Nama</label> 
            <input type="text" class="form-control" id="nama" value="<?php echo session()->get('username'); ?>"> 
        </div> 
        
        <div class="col-12"> 
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat"> 
        </div>  
        
        <div class="col-12"> 
            <label for="kelurahan" class="form-label">Kelurahan</label> 
            <select class="form-control" id="kelurahan" name="kelurahan" style="width: 100%;" required></select> 
        </div> 
        
        <div class="col-12"> 
            <label for="layanan" class="form-label">Layanan</label> 
            <select class="form-control" id="layanan" name="layanan" style="width: 100%;" required></select> 
        </div> 
        
        <div class="col-12"> 
            <label for="ongkir" class="form-label">Ongkir</label> 
            <input type="text" class="form-control" id="ongkir" name="ongkir" readonly> 
        </div>
    </div> 
    
    <div class="col-lg-6"> 
        <div class="col-12"> 
            <table class="table"> 
                <thead> 
                    <tr> 
                        <th scope="col">Nama</th> 
                        <th scope="col">Harga</th> 
                        <th scope="col">Jumlah</th> 
                        <th scope="col">Sub Total</th> 
                    </tr> 
                </thead> 
                <tbody> 
                    <?php 
                    if (!empty($items)) : 
                        foreach ($items as $index => $item) : 
                    ?> 
                            <tr> 
                                <td><?php echo $item['name'] ?></td> 
                                <td><?php echo number_to_currency($item['price'], 'IDR') ?></td> 
                                <td><?php echo $item['qty'] ?></td> 
                                <td><?php echo number_to_currency($item['price'] * $item['qty'], 'IDR') ?></td> 
                            </tr> 
                    <?php 
                        endforeach; 
                    endif; 
                    ?> 
                    <tr> 
                        <td colspan="2"></td> 
                        <td>Subtotal</td> 
                        <td><?php echo number_to_currency($total, 'IDR') ?></td> 
                    </tr> 
                    <tr> 
                        <td colspan="2"></td> 
                        <td>Total</td> 
                        <td><span id="total"><?php echo number_to_currency($total, 'IDR') ?></span></td> 
                    </tr> 
                </tbody> 
            </table> 
        </div> 
        
        <div class="text-end mt-4"> 
            <button type="submit" class="btn btn-primary" style="background-color: #e96b86; border-color: #e96b86; padding: 10px 35px; border-radius: 20px;">
                Buat Pesanan
            </button> 
        </div> 
        <?= form_close() ?>
    </div> 
</div> 

<script> 
// Menggunakan jQuery noConflict agar aman dari bentrokan sistem luar
jQuery(document).ready(function($) { 
    var ongkir = 0; 
    var total = 0;  
    hitungTotal(); 

    $('#kelurahan').select2({ 
        placeholder: 'Ketik nama kelurahan (min. 3 huruf)...', 
        allowClear: true,
        ajax: { 
            url: '<?= base_url('get-location') ?>', 
            dataType: 'json', 
            delay: 500, 
            data: function (params) { 
                return { search: params.term }; 
            }, 
            processResults: function (data) { 
                return { 
                    results: data.map(function(item) { 
                        return { 
                            id: item.id, 
                            text: item.subdistrict_name + ", " + item.district_name + ", " + item.city_name + ", " + item.province_name + ", " + item.zip_code 
                        }; 
                    }) 
                }; 
            }, 
            cache: true 
        }, 
        minimumInputLength: 3 
    }); 

    $("#kelurahan").on('change', function() { 
        var id_kelurahan = $(this).val();  
        $("#layanan").empty(); 
        ongkir = 0; 

        if(!id_kelurahan) return;

        $.ajax({ 
            url: "<?= base_url('get-cost') ?>", 
            type: 'GET', 
            data: { 'destination': id_kelurahan }, 
            dataType: 'json', 
            success: function(data) {  
                data.forEach(function(item) { 
                    var text = item["description"] + " (" + item["service"] + ") : estimasi " + item["etd"] + ""; 
                    $("#layanan").append($('<option>', { 
                        value: item["cost"], 
                        text: text  
                    })); 
                }); 
                hitungTotal();  
            }
        }); 
    }); 

    $("#layanan").on('change', function() { 
        ongkir = parseInt($(this).val()) || 0; 
        hitungTotal(); 
    });   

    function hitungTotal() { 
        total = ongkir + <?= $total ?>; 
        $("#ongkir").val(ongkir); 
        $("#total").html("IDR " + total.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')); 
        $("#total_harga").val(total); 
    } 
}); 
</script> 

<?= $this->endSection() ?>