<?php
require_once 'functions.php';

if ($act == 'login') {
    $user = esc_field($_POST['user']);
    $pass = esc_field($_POST['pass']);

    $row = $db->get_row("SELECT * FROM tb_user WHERE user='$user' AND pass='$pass'");
    if ($row) {
        $_SESSION['login'] = $row->user;
        $_SESSION['level'] = strtolower($row->level);
        redirect_js("index.php");
    } else {
        print_msg("Salah kombinasi username dan password.");
    }
} elseif ($mod == 'password') {
    $pass1 = $_POST['pass1'];
    $pass2 = $_POST['pass2'];
    $pass3 = $_POST['pass3'];

    $row = $db->get_row("SELECT * FROM tb_user WHERE user='$_SESSION[login]' AND pass='$pass1'");

    if ($pass1 == '' || $pass2 == '' || $pass3 == '')
        print_msg("Field bertanda * tidak boleh kosong!");
    elseif (!$row)
        print_msg('Password lama salah.');
    elseif ($pass2 != $pass3)
        print_msg('Password baru dan konfirmasi password baru tidak sama.');
    else {
        $db->query("UPDATE tb_user SET pass='$pass2' WHERE user='$_SESSION[login]'");
        print_msg('Password berhasil diubah.', 'success');
    }
} elseif ($act == 'logout') {
    unset($_SESSION['login']);
    header("location:login.php");
}

/** ALTERNATIF */
elseif ($mod == 'alternatif_tambah') {
    $kode = $_POST['kode'];
    $nama = $_POST['nama'];
    $Jabatan = $_POST['jabatan'];
    if ($kode == '' || $nama == '')
        print_msg("Field yang bertanda * tidak boleh kosong!");
    elseif ($db->get_results("SELECT * FROM tb_alternatif WHERE kode_alternatif='$kode'"))
        print_msg("Kode sudah ada!");
    else {
        $db->query("INSERT INTO tb_alternatif (kode_alternatif, nama_alternatif, Jabatan) VALUES ('$kode', '$nama', '$Jabatan')");

        $db->query("INSERT INTO tb_rel_alternatif(kode_alternatif, kode_kriteria, nilai) SELECT '$kode', kode_kriteria, 0 FROM tb_kriteria");
        redirect_js("index.php?m=alternatif");
    }
} else if ($mod == 'alternatif_ubah') {
    $kode = $_POST['kode'];
    $nama = $_POST['nama'];
    $Jabatan = $_POST['Jabatan'];
    if ($kode == '' || $nama == '')
        print_msg("Field yang bertanda * tidak boleh kosong!");
    else {
        $db->query("UPDATE tb_alternatif SET nama_alternatif='$nama', Jabatan='$Jabatan' WHERE kode_alternatif='" . get('ID') . "'");
        redirect_js("index.php?m=alternatif");
    }
} else if ($act == 'alternatif_hapus') {
    $db->query("DELETE FROM tb_alternatif WHERE kode_alternatif='" . get('ID') . "'");
    $db->query("DELETE FROM tb_rel_alternatif WHERE kode_alternatif='" . get('ID') . "'");
    header("location:index.php?m=alternatif");
}

/** KRITERIA */
elseif ($mod == 'kriteria_tambah') {
    $kode = $_POST['kode'];
    $nama = $_POST['nama'];
    $atribut = $_POST['atribut'];

    if ($kode == '' || $nama == '' || $atribut == '')
        print_msg("Field bertanda * tidak boleh kosong!");
    elseif ($db->get_results("SELECT * FROM tb_kriteria WHERE kode_kriteria='$kode'"))
        print_msg("Kode sudah ada!");
    else {
        $db->query("INSERT INTO tb_kriteria (kode_kriteria, nama_kriteria) VALUES ('$kode', '$nama')");
        $db->query("INSERT INTO tb_rel_kriteria(ID1, ID2, nilai) SELECT '$kode', kode_kriteria, 1 FROM tb_kriteria");
        $db->query("INSERT INTO tb_rel_kriteria(ID1, ID2, nilai) SELECT kode_kriteria, '$kode', 1 FROM tb_kriteria WHERE kode_kriteria<>'$kode'");

        $db->query("INSERT INTO tb_rel_alternatif(kode_alternatif, kode_kriteria, nilai) SELECT kode_alternatif, '$kode', -1  FROM tb_alternatif");

        redirect_js("index.php?m=kriteria");
    }
} else if ($mod == 'kriteria_ubah') {
    $kode = $_POST['kode'];
    $nama = $_POST['nama'];
    $atribut = $_POST['atribut'];

    if ($kode == '' || $nama == '' || $atribut == '')
        print_msg("Field bertanda * tidak boleh kosong!");
    elseif ($db->get_results("SELECT * FROM tb_kriteria WHERE kode_kriteria='$kode' AND kode_kriteria<>'" . get('ID') . "'"))
        print_msg("Kode sudah ada!");
    else {
        $db->query("UPDATE tb_kriteria SET kode_kriteria='$kode', nama_kriteria='$nama', atribut='$atribut' WHERE kode_kriteria='" . get('ID') . "'");
        redirect_js("index.php?m=kriteria");
    }
} else if ($act == 'kriteria_hapus') {
    $db->query("DELETE FROM tb_kriteria WHERE kode_kriteria='" . get('ID') . "'");
    $db->query("DELETE FROM tb_rel_kriteria WHERE ID1='" . get('ID') . "' OR ID2='" . get('ID') . "'");
    $db->query("DELETE FROM tb_rel_alternatif WHERE kode_kriteria='" . get('ID') . "'");
    header("location:index.php?m=kriteria");
}

/** CRIPS */
elseif ($mod == 'crips_tambah') {
    $nilai = $_POST['nilai'];
    $Jabatan = $_POST['Jabatan'];

    if ($nilai == '' || $Jabatan == '')
        print_msg("Nilai dan nama tidak boleh kosong!");
    else {
        $db->query("INSERT INTO tb_crips (kode_kriteria, nilai, Jabatan) VALUES ('$_POST[kode_kriteria]', '$nilai', '$Jabatan')");
        redirect_js("index.php?m=crips&kode_kriteria=" . get('kode_kriteria'));
    }
} else if ($mod == 'crips_ubah') {
    $nilai = $_POST['nilai'];
    $Jabatan = $_POST['Jabatan'];

    if ($nilai == '' || $Jabatan == '')
        print_msg("Nilai dan nama tidak boleh kosong!");
    else {
        $db->query("UPDATE tb_crips SET nilai='$nilai', Jabatan='$Jabatan' WHERE kode_crips='" . get('ID') . "'");
        redirect_js("index.php?m=crips&kode_kriteria=" . get('kode_kriteria'));
    }
} else if ($act == 'crips_hapus') {
    $db->query("DELETE FROM tb_crips WHERE kode_crips='" . get('ID') . "'");
    header("location:index.php?m=crips&kode_kriteria=" . get('kode_kriteria'));
}

/** RELASI ALTERNATIF */
else if ($mod == 'rel_alternatif_ubah') {
    foreach ($_POST as $key => $value) {
        $ID = str_replace('ID-', '', $key);
        $db->query("UPDATE tb_rel_alternatif SET nilai='$value' WHERE ID='$ID'");
    }
    redirect_js("index.php?m=rel_alternatif");
}

/** RELASI KRITERIA */
else if ($mod == 'rel_kriteria') {
    $ID1 = $_POST['ID1'];
    $ID2 = $_POST['ID2'];
    $nilai = abs($_POST['nilai']);

    if ($ID1 == $ID2 && $nilai <> 1)
        print_msg("Kriteria yang sama harus bernilai 1.");
    else {
        $db->query("UPDATE tb_rel_kriteria SET nilai=$nilai WHERE ID1='$ID1' AND ID2='$ID2'");
        $db->query("UPDATE tb_rel_kriteria SET nilai=1/$nilai WHERE ID2='$ID1' AND ID1='$ID2'");
        print_msg("Nilai kriteria berhasil diubah.", 'success');
    }
}

/** PERIODE */
elseif ($mod == 'periode_tambah') {
    $tahun = $_POST['tahun'];
    $nama = $_POST['nama'];
    $keterangan = $_POST['keterangan'];

    if ($tahun == '' || $nama == '')
        print_msg("Field bertanda * tidak boleh kosong!");
    elseif ($db->get_results("SELECT * FROM tb_periode WHERE tahun='$tahun'"))
        print_msg("Tahun sudah ada!");
    else {
        $db->query("INSERT INTO tb_periode (tahun, nama, keterangan) VALUES ('$tahun', '$nama', '$keterangan')");
        redirect_js("index.php?m=periode");
    }
} else if ($mod == 'periode_ubah') {
    $tahun = $_POST['tahun'];
    $nama = $_POST['nama'];
    $keterangan = $_POST['keterangan'];

    if ($tahun == '' || $nama == '')
        print_msg("Field bertanda * tidak boleh kosong!");
    elseif ($db->get_results("SELECT * FROM tb_periode WHERE tahun='$tahun' AND tahun<>'" . get('ID') . "'"))
        print_msg("Tahun sudah ada!");
    else {
        $db->query("UPDATE tb_periode SET tahun='$tahun', nama='$nama', keterangan='$keterangan' WHERE tahun='" . get('ID') . "'");
        redirect_js("index.php?m=periode");
    }
} else if ($act == 'periode_hapus') {
    $db->query("DELETE FROM tb_periode WHERE tahun='" . get('ID') . "'");
    header("location:index.php?m=periode");
}
