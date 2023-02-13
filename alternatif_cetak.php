<h1>Alternatif</h1>
<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Kode</th>
            <th>Nama Alternatif</th>
            <th>Jabatan</th>
        </tr>
    </thead>
    <?php
    $q = esc_field(get('q'));
    $rows = $db->get_results("SELECT * FROM tb_alternatif WHERE nama_alternatif LIKE '%$q%' and tahun=$PERIODE ORDER BY kode_alternatif");
    $no = 0;

    foreach ($rows as $row) : ?>
        <tr>
            <td><?= ++$no ?></td>
            <td><?= $row->kode_alternatif ?></td>
            <td><?= $row->nama_alternatif ?></td>
            <td><?= $row->jabatan ?></td>
        </tr>
    <?php endforeach; ?>
</table>