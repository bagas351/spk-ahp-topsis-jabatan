<?php
$row = $db->get_row("SELECT * FROM tb_periode WHERE tahun='" . get('ID') . "'");
?>
<div class="page-header">
    <h1>Ubah periode</h1>
</div>
<div class="row">
    <div class="col-sm-6">
        <?php if ($_POST) include 'aksi.php' ?>
        <form method="post">
            <div class="form-group">
                <label>Kode <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="tahun" readonly="readonly" value="<?= $row->tahun ?>" />
            </div>
            <div class="form-group">
                <label>Nama periode <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="nama" value="<?= $row->nama ?>" />
            </div>
            <div class="form-group">
                <label>Keterangan <span class="text-danger">*</span></label>
                <textarea name="keterangan" id="keterangan" cols="3" class="form-control"><?= $row->keterangan ?></textarea>
            </div>
            <div class="form-group">
                <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
                <a class="btn btn-danger" href="?m=periode"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
            </div>
        </form>
    </div>
</div>