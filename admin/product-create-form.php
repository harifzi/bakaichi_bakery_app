<?php

include_once '../config/database.php';
include_once '../objects/jenis-kue.php';

$database = new Database();
$db = $database->getConnection();

$jenis_kue = new JenisKue($db);

?>

<!-- Create: Product -->
<form id='create-product-form' action='#' method='post' border='0'>
    <div class="row">
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label>Nama Kue</label>
                        <input type="text" class="form-control" placeholder="Company" value="Creative Code Inc.">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Harga</label>
                        <input type="text" class="form-control" placeholder="Username" value="michael23">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Jenis Kue</label>
                       
                        <?php
                        // Jenis Kue
                        $stmt = $jenis_kue->read();

                        echo "<select class='form-control' name='category_id'>";
                            echo "<option>Jenis Kue...</option>";

                            while ($row_jenis_kue = $stmt->fetch(PDO::FETCH_ASSOC)){
                                extract($row_jenis_kue);
                                echo "<option value='{$jenis_kue_id}'>{$jenis_kue}</option>";
                            }

                        echo "</select>";
                        ?>
                    
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Deskripsi Kue</label>
                        <textarea rows="5" class="form-control" placeholder="Here can be your description">Ya itu rasanya enak sekaly</textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="row">
                <div class="col-md-12">
                    <label>Gambar Kue</label>
                    <img src="../assets/images/470x470.png" id="preview-frame" style="max-width:300px;max-height:300px;float:left;" />
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label class="btn btn-info btn-fill btn-file"> Browse <input type="file" id="picframe" name="image" value="media" style="display: none;"/> </label>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            
        </div>
        
    </div>
    <div class="row">
        <div class="col-md-offset-10 col-md-2">
            
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            <button type="button" class="btn btn-danger btn-fill btn-file" id="back-button">&lt;</button>
            <button type="button" class="btn btn-info btn-fill btn-file">Create</button>
        </div>
    </div>
</form>