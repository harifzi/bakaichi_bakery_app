<?php
if(isset($_GET['product_id']))
{
    $product_id = $_GET['product_id'];
}

else
{
    die('ERROR: Product ID not found.');
}

include_once '../config/database.php';
include_once '../objects/jenis-kue.php';
include_once '../objects/kue.php';

$database = new Database();
$db = $database->getConnection();

$jenis_kue = new JenisKue($db);
$kue = new Kue($db);

$kue->kue_id = $product_id;
$kue->readOne();
?>

<form id="update-product" method="post" enctype="multipart/form-data" border='0'>
    <div class="row">
        <div class="col-md-8">
            <input type="hidden" name="kue_id" value="<?php echo $product_id;?>" />
            <input type="hidden" name="oldpic" value="<?php echo htmlspecialchars($kue->gambar_kue, ENT_QUOTES); ?>"/>
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label>Nama Kue</label>
                        <input type="text" class="form-control" placeholder="Nama Kue" name="nama_kue" value="<?php echo htmlspecialchars($kue->nama_kue, ENT_QUOTES); ?>"/>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Harga</label>
                        <input type="text" class="form-control" placeholder="Harga Kue" name="harga" value="<?php echo htmlspecialchars($kue->harga_kue, ENT_QUOTES); ?>"/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="jeniskue">Jenis Kue</label>
                       
                        <?php
                        // Jenis Kue
                        $stmt = $jenis_kue->read();

                        echo '<select class="form-control" name="jenis" id="jenis">';
                            echo '<option value="null">Jenis Kue...</option>';

                            while ($row_jenis_kue = $stmt->fetch(PDO::FETCH_ASSOC)){
                                extract($row_jenis_kue);
                                echo '<option value="'."{$jenis_kue_id}".'">'."{$jenis_kue}".'</option>';
                            }

                        echo '</select>';
                        ?>
                    
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Deskripsi Kue</label>
                        <textarea rows="5" class="form-control" placeholder="Deskripsi Kue" name="deskripsi"><?php echo htmlspecialchars($kue->deskripsi_kue, ENT_QUOTES); ?></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="row">
                <div class="col-md-12">
                    <label>Gambar Kue</label>
                    <img src="../<?php echo htmlspecialchars($kue->gambar_kue, ENT_QUOTES); ?>" id="preview-frame" style="max-width:300px;max-height:300px;float:left;" />
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label class="btn btn-info btn-fill btn-file"> Browse <input type="file" id="picframe" name="gambar" style="display: none;"/> </label>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            <button type="button" class="btn btn-danger btn-fill" id="back-button">&lt;</button>
            <input type="submit" class="btn btn-info btn-fill" value="Update" />
        </div>
    </div>
</form>

<script type="text/javascript">

    function readURL(input){
        if (input.files && input.files[0]){
            var reader = new FileReader();

            reader.onload = function (e){
                $('#preview-frame').attr('src',e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    };

    $("#picframe").change(function(){
        $('#preview-frame').attr('src','../assets/images/470x470.png');    
        readURL(this);
    });

    $(document).ready(function(){

        $jenis_value = <?php echo htmlspecialchars($kue->jenis_kue_id, ENT_QUOTES); ?>;
        $('#jenis option[value='+$jenis_value+']').attr('selected',true);
        $('#jenis option[value="null"]').remove();
    });
</script>