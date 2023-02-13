<div class="page-header">
    <h1>Nilai Bobot Alternatif</h1>
    <form class="form-inline" action="" method="get">
        <?php
        $periodes = $db->get_results("SELECT * FROM tb_periode ORDER BY tahun");
        ?>
        <input type="hidden" name="m" value="<?= get('m') ?>">
        <div class="form-group">
            <select class="form-control" name="periode">
                <?php foreach ($periodes as $periode) { ?>
                    <option value="<?= $periode->tahun ?>" <?= $periode->tahun == get('periode') ? 'selected' : '' ?>><?= $periode->nama ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-list-alt"></span> Set Peride</button>
        </div>
    </form>
</div>
<div class="panel panel-default">
    <div class="panel-heading">
        <form class="form-inline">
            <input type="hidden" name="m" value="rel_alternatif" />
            <input type="hidden" name="periode" value="<?= get('periode') ?>" />
            <div class="form-group">
                <input class="form-control" type="text" name="q" value="<?= get('q') ?>" placeholder="Pencarian" />
            </div>
            <div class="form-group">
                <button class="btn btn-success"><span class="glyphicon glyphicon-refresh"></span> Refresh</button>
            </div>
        </form>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>Kode</th>
                    <th>Nama Kandidat</th>
                    <?php
                    $heads = $db->get_var("SELECT COUNT(*) FROM tb_kriteria where tahun = $PERIODE");
                    if ($heads > 0) :
                        for ($a = 1; $a <= $heads; $a++) {
                            echo "<th>C$a</th>";
                        }
                    endif;
                    ?>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php

                $q = is_null(get('q')) ? '' :  get('q');

                $rows = $db->get_results("SELECT * FROM tb_alternatif WHERE nama_alternatif LIKE '%$q%' and tahun = $PERIODE ORDER BY kode_alternatif");
                $data = TOPSIS_get_hasil_analisa();

                $no = 0;

                foreach ($rows as $row) : ?>
                    <tr>
                        <td><?= $row->kode_alternatif ?></td>
                        <td><?= $row->nama_alternatif ?></td>
                        <?php foreach ($data[$row->kode_alternatif] as $key => $val) : ?>
                            <td><?= $val ?></td>
                        <?php endforeach ?>
                        <td>
                            <a class="btn btn-xs btn-warning" href="?m=rel_alternatif_ubah&ID=<?= $row->kode_alternatif ?>&periode=<?= get('periode') ?>"><span class="glyphicon glyphicon-edit"></span> Ubah</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>