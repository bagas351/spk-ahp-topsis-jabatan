<?php
$row = $db->get_row("SELECT * FROM tb_kriteria WHERE kode_kriteria='" . get('ID') . "' and tahun = '$PERIODE'");
?>
<div class="page-header">
    <h1>Ubah kriteria</h1>
    <small>Periode <?= get('periode') ?></small>
</div>
<div class="row">
    <div class="col-sm-6">
        <?php if ($_POST) include 'aksi.php' ?>
        <form method="post">
            <div class="form-group">
                <label>Kode <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="kode" readonly="readonly" value="<?= $row->kode_kriteria ?>" />
            </div>
            <div class="form-group">
                <label>Nama kriteria <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="nama" value="<?= $row->nama_kriteria ?>" />
            </div>
            <div class="form-group">
                <label>Atribut <span class="text-danger">*</span></label>
                <select class="form-control" name="atribut">
                    <option></option>
                    <?= get_atribut_option($row->atribut) ?>
                </select>
            </div>
            <div class="form-group">
                <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
                <a class="btn btn-danger" href="?m=kriteria&periode=<?= get('periode') ?>"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
            </div>
        </form>
    </div>
</div>