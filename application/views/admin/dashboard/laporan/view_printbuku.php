<html>
<head>
  <title>Cetak PDF</title>
  <style>
    table {
      border-collapse:collapse;
      table-layout:fixed;width: 630px;
    }
    table td {
      word-wrap:break-word;
      width: 20%;
    }
  </style>
</head>
<body>
    <b><?php echo $ket; ?></b><br /><br />
    
  <table border="1" cellpadding="8">
  <tr>
    <th>No</th>
    <th>Tanggal Simpan</th>
    <th>Judul</th>
    <th>Pengarang</th>
    <th>Tahun Terbit</th>
    <th>Penerbit</th>

  </tr>
    <?php
    if( ! empty($transaksi)){
      $no = 1;
      foreach($transaksi as $data){
            $tgl = date('d-m-Y', strtotime($data->b_tanggalsimpan));
        echo "<tr>";
        echo "<td>".$no."</td>";
        echo "<td>".$tgl."</td>";
        echo "<td>".$data->b_judul."</td>";
        echo "<td>".$data->b_pengarang."</td>";
        echo "<td>".$data->b_tahunterbit."</td>";
        echo "<td>".$data->b_penerbit."</td>";
        echo "</tr>";
        $no++;
      }
    }
    ?>
  </table>
</body>
</html>