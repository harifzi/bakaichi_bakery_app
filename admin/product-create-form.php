<?php

include_once '../config/database.php';
include_once '../objects/jenis-kue.php';

$database = new Database();
$db = $database->getConnection();

$jenis_kue = new JenisKue($db);

?>

<form id='create-product-form' action='#' method='post' border='0'>
    <table class='table table-hover table-responsive table-bordered'>
        <tr>
            <td>Nama Kue</td>
            <td><input type='text' name='nama' class='form-control' required /></td>
        </tr>
        <tr>
            <td>Harga</td>
            <td><input type='number' min='1' name='harga' class='form-control' required /></td>
        </tr>
        <tr>
            <td>Jenis Kue</td>
            <td>
            <?php
            $stmt = $jenis_kue->read();

            echo "<select class='form-control' name='category_id'>";
                echo "<option>Jenis Kue...</option>";

                while ($row_jenis_kue = $stmt->fetch(PDO::FETCH_ASSOC)){
                    extract($row_jenis_kue);
                    echo "<option value='{$jenis_kue_id}'>{$jenis_kue}</option>";
                }

            echo "</select>";
            ?>
            </td>
        </tr>
        <tr>
            <td>Photo</td>
            <td><input type="file" name="image" /></td>
        </tr>
        <tr>
            <td>Deskripsi Kue</td>
            <td><textarea name='deskripsi' class='form-control' required></textarea></td>
        </tr>
        <tr>
            <td></td>
            <td>                
                <button type='submit' class='btn btn-primary'>
            <span class='glyphicon glyphicon-plus'></span> Create Product
        </button>
            </td>
        </tr>
    </table>
</form>