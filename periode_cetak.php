<h1>Periode</h1>
<table>
    <thead>
        <tr>
            <th>Tahun</th>
            <th>Nama Periode</th>
            <th>Keterangan</th>
        </tr>
    </thead>
    <?php
    $q = esc_field(get('q'));
    $rows = $db->get_results("SELECT * FROM tb_periode WHERE (nama LIKE '%$q%' or tahun LIKE '%$q%' ) ORDER BY tahun");
    $no = 0;
    foreach ($rows as $row) : ?>
        <tr>
            <td><?= $row->tahun ?></td>
            <td><?= $row->nama ?></td>
            <td><?= $row->keterangan ?></td>
        </tr>
    <?php endforeach; ?>
</table>