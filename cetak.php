<?php include 'functions.php'; ?>
<!doctype html>
<html>

<head>
    <title>Cetak Laporan</title>
    <style>
        body {
            font-family: Verdana;
            font-size: 13px;
        }

        h1 {
            font-size: 14px;
            border-bottom: 4px double #000;
            padding: 3px 0;
        }

        table {
            border-collapse: collapse;
            margin-bottom: 10px;
        }

        td,
        th {
            border: 1px solid #000;
            padding: 3px;
        }

        .wrapper {
            margin: 0 auto;
            width: 980px;
        }
    </style>
</head>

<body onload="window.print()">
    <div class="wrapper">
        <?php
        if (is_file($mod . '_cetak.php'))
            // cek periode
            if (is_null(get('periode'))) {
                $row = $db->get_row("SELECT * FROM tb_periode order by tahun desc limit 1");
                redirect_js("index.php?m=$mod&periode=$row->tahun");
                die;
            }

        $row = $db->get_row("SELECT * FROM tb_periode WHERE tahun='" . get('periode') . "'");
        if (is_null($row)) {
            echo <<<HTML
                <div class="page-header">
                    <h1>Periode Tidak Ditemukan</h1>
                </div>
            HTML;
            die;
        }

        $PERIODE = get('periode');
        include $mod . '_cetak.php';
        ?>
    </div>
</body>

</html>