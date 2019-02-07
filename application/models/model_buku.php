<?php

defined('BASEPATH') or exit('No direct script access allowed');

class model_buku extends CI_Model
{

    public function cekBuku($idbuku)
    {
        $this->db->where("b_idbuku", $idbuku);
        return $this->db->get('tbl_buku');
    }

    public function insertBuku($tabel, $data)
    {
        $insert = $this->db->insert($tabel, $data);
        return $insert;
    }

    public function getAll()
    {
        $this->db->order_by('tbl_buku.b_idbuku desc');
        return $this->db->get('tbl_buku');
    }

    public function getGambar($idbuku)
    {
        $this->db->select('b_idbuku');
        $this->db->from('tbl_buku');
        $this->db->where('b_idbuku', $idbuku);
        return $this->db->get();
    }

    public function updateBuku($idbuku, $data)
    {
        $this->db->where('b_idbuku', $idbuku);
        $this->db->update('tbl_buku', $data);
    }

    public function deleteBuku($idbuku)
    {
        $this->db->where('b_idbuku', $idbuku);
        $this->db->delete('tbl_buku');

    }

    public function getjudul()
    {
        $this->db->where('b_statusdokumen', '0');
        $this->db->order_by('tbl_buku.b_judul asc');
        return $this->db->get('tbl_buku');
    }

    // public function getdok2()
    // {
    //     $this->db->where('b_statusdokumen', '1');
    //     $this->db->order_by('tbl_buku.b_judul asc');
    //     return $this->db->get('tbl_buku');
    // }

    public function getdok()
    {
        $query = $this->db->query("SELECT * FROM tbl_buku, tbl_dokumen WHERE tbl_buku.b_idbuku = tbl_dokumen.d_idbuku");
        return $query;
    }

    public function bukuDokumen($idBuku)
    {
        $query = $this->db->query("SELECT * FROM tbl_dokumen WHERE d_idbuku = " . $idBuku);
        return $query;
    }

    public function hitungMfcm()
    {
        return $this->db->count_all("tbl_buku");
    }

    public function getMfcm($valueMFCM)
    {
        $mysqli = new mysqli("localhost", "root", "", "db_perpus");
        $query2 = $mysqli->query("SELECT * FROM tbl_rating ORDER BY r_iduser ASC");
        $_R = 0;
        $temp = -1;
        $ListMember = array();
        $ListTotalR = array();
        $ListBuku = array();
        $ListRating = array();
        $NilaiRatingBuku = array();
        $jumlahRating = array();
        $ListBukuRating = array();
        $Centroid = array();
        $MatriksRating;
        $c = 0;
        while ($data = $query2->fetch_assoc()) {
            $idMember = $data['r_iduser'];
            if ($idMember != $temp) {
                array_push($ListMember, $idMember);
                if (sizeof($ListMember) > 1) {
                    array_push($ListTotalR, $_R);
                }

                $temp = $idMember;
                $_R = $data['r_rating'];
                $ListBukuRating[$c] = array('buku' => array(), 'rating' => array());
                $c++;
            } else {
                $_R = $_R + $data['r_rating'];
            }
            $b = array_search($data['r_idbuku'], $ListBuku);
            if ($b === false) {
                array_push($ListBuku, $data['r_idbuku']);
                array_push($NilaiRatingBuku, 0);
                array_push($jumlahRating, 0);
            }

            array_push($ListBukuRating[array_search($data['r_iduser'], $ListMember)]['buku'], $data['r_idbuku']);
            array_push($ListBukuRating[array_search($data['r_iduser'], $ListMember)]['rating'], $data['r_rating']);

            $tmpRating = array("user" => $data['r_iduser'], "buku" => $data['r_idbuku'], "rating" => $data['r_rating']);
            array_push($ListRating, $tmpRating);
        }
        //end of init ListMember, ListBuku, ListRating
        array_push($ListTotalR, $_R);
        //Inisialisasi Matriks
        for ($i = 0; $i < sizeof($ListMember); $i++) {
            for ($j = 0; $j < sizeof($ListBuku); $j++) {
                $temu = array_search($ListBuku[$j], $ListBukuRating[$i]['buku']);
                if (!($temu === false)) {
                    $MatriksRating[$i][$j] = $ListBukuRating[$i]['rating'][$temu];
                } else {
                    $MatriksRating[$i][$j] = 0;
                }

                $NilaiRatingBuku[$j] = $NilaiRatingBuku[$j] + $MatriksRating[$i][$j];
                $jumlahRating[$j] = $jumlahRating[$j] + 1;
            }
        }
        //end of matriks fill
        $Cluster = array();
        $clusterLength = (int) sqrt(sizeof($ListMember));
        $clusterMaxItem = (int) (sizeof($ListMember) / $clusterLength);
        $indeksPakai = array();
        if (sizeof($ListMember) % $clusterMaxItem > 0) {
            $clusterLength++;
        }
        //Clustering
        for ($c = 0, $i = 0; $c < sizeof($MatriksRating) && $i < $clusterLength; $c++) {
            if ($c == $clusterMaxItem * ($i + 1)) {
                $i++;}
            if ($c % $clusterMaxItem == 0) {
                $Cluster[$i] = array();
            }
            $Cluster[$i][$c % $clusterMaxItem] = $MatriksRating[$c];
        }
        $ListD = array();
        $msg = "";
        for ($c = 0; $c < sizeof($Cluster); $c++) {
            $ClusterTmp = $Cluster[$c];
            $ListD[$c] = array();
            $msg = $msg . "Cluster-" . ($c + 1) . "| ";
            for ($i = 0; $i < sizeof($ClusterTmp); $i++) {
                $d = 0;
                $userI = $ClusterTmp[$i];
                for ($j = 0; $j < sizeof($ClusterTmp); $j++) {
                    $userJ = $ClusterTmp[$j];
                    if ($i != $j) {
                        for ($k = 0; $k < sizeof($ListBuku); $k++) {
                            if (abs($userI[$k] - $userJ[$k]) <= 5 && $userI[$k] > 0) {
                                $d++;
                            }

                        }
                    }

                }
                $ListD[$c][$i] = $d;
                $msg = $msg . $d . " | ";
            }
        }

        for ($c = 0; $c < sizeof($Cluster); $c++) {
            $maks = 0;
            $maksI = 0;
            $Dtmp = $ListD[$c];
            for ($i = 0; $i < sizeof($Dtmp); $i++) {
                if ($Dtmp[$i] > $maks) {
                    $maks = $Dtmp[$i];
                    $maksI = $i;
                }
            }
            array_push($Centroid, $Cluster[$c][$maksI]);
        }
        $SkorBuku = array();
        $aduh = 0;
        for ($i = 0; $i < sizeof($ListBuku); $i++) {
            $SkorBuku[$i] = 0;
        }
        for ($i = 0; $i < sizeof($Centroid); $i++) {
            for ($j = 0; $j < sizeof($ListBuku); $j++) {
                if ($Centroid[$i][$j] > 0) {
                    $SkorBuku[$j] += 1;
                }

            }
        }
        $ListBuku2 = array();

        $msg2 = "";
        for ($i = 0; $i < sizeof($ListBuku); $i++) {
            $ListBuku2[$i]['id'] = $ListBuku[$i];
            $ListBuku2[$i]['score'] = $NilaiRatingBuku[$i];
            $ListBuku2[$i]['mean'] = ((float) $NilaiRatingBuku[$i] / (float) $jumlahRating[$i]) / 2;
            $ListBuku2[$i]['count'] = $SkorBuku[$i];
            //$msg2 = $msg2."R-".($i+1).":".$NilaiRatingBuku[$i]." | ";
            $msg2 = $msg2 . "R-" . ($i + 1) . ":" . $ListBuku2[$i]['id'] . "|" . $ListBuku2[$i]['score'] . "|" . $ListBuku2[$i]['count'] . "| ";
        }
        $msg3 = "id : ";
        $msg4 = "score : ";
        $msg5 = "count : ";

        for ($i = 0; $i < sizeof($ListBuku2) - 1; $i++) {
            for ($j = $i + 1; $j < sizeof($ListBuku2); $j++) {
                $skorI = (int) $ListBuku2[$i]['score'];
                $skorJ = (int) $ListBuku2[$j]['score'];
                $countI = (int) $ListBuku2[$i]['count'];
                $countJ = (int) $ListBuku2[$j]['count'];
                if ($countJ >= $countI && $skorJ > $skorI) {
                    $temp = $ListBuku2[$i];
                    $ListBuku2[$i] = $ListBuku2[$j];
                    $ListBuku2[$j] = $temp;
                }
            }
        }
        $MFCM = array();
        $BukuMFCM = array();
        for ($i = 0; $i < sizeof($ListBuku); $i++) {
            $id = $ListBuku2[$i]['id'];
            $mean = $ListBuku2[$i]['mean'];
            $quer3 = $mysqli->query("UPDATE tbl_buku SET b_rating = " . $mean . " where b_idbuku = " . $id);
            $quer3 = $mysqli->query("SELECT * FROM `tbl_buku` WHERE b_idbuku = " . $id);
            $msg3 = $msg3 . $ListBuku2[$i]['id'] . " | ";
            $msg4 = $msg4 . $ListBuku2[$i]['score'] . " | ";
            $msg5 = $msg5 . $ListBuku2[$i]['count'] . " | ";
            $buku = $quer3->fetch_assoc();
            array_push($MFCM, $buku);
            array_push($BukuMFCM, $id);
        }
        //echo "<script type='text/javascript'> alert('".$msg3.$msg4.$msg5."')</script>";

        if ($valueMFCM == 0) { // Jika User belum pernah melakukan rating
            return $MFCM;
        } else { // Jika user pernah melakukan rating
            // =============================== H P R S =================================

            $idUserAktif = $valueMFCM;
            $indeksAktif = array_search($idUserAktif, $ListMember);
            $_K = array();
            $_sim = array();
            $msgK = "";
            $U1 = array('matriks' => $MatriksRating[$indeksAktif], 'id' => $ListMember[$indeksAktif]);
            //Menghitung Kesamaan User
            for ($i = 0; $i < sizeof($Centroid); $i++) {
                $c = 0;
                $c2 = 0;
                for ($j = 0; $j < sizeof($ListBuku); $j++) {
                    if ($U1['matriks'][$j] > 0 && $Centroid[$i][$j] > 0) {
                        $c++;
                        $c2++;
                    } elseif ($U1['matriks'][$j] > 0 || $Centroid[$i][$j] > 0) {
                        $c2++;}
                }
                array_push($_K, (float) ($c / $c2));
            }

            for ($i = 0; $i < sizeof($Centroid); $i++) {
                $_U1Bar = 0;
                $_CUBar = 0;
                $_U1Bar2 = 0;
                $_CUBar2 = 0;
                for ($j = 0; $j < sizeof($ListBuku); $j++) {
                    $_U1Bar += $U1['matriks'][$j];
                    $_CUBar += $Centroid[$i][$j];
                    $_U1Bar2 += (float) pow($U1['matriks'][$j], 2);
                    $_CUBar2 += (float) pow($Centroid[$i][$j], 2);
                }
                $_U1Bar = (float) $_U1Bar / sizeof($ListBuku);
                $_CUBar = (float) $_CUBar / sizeof($ListBuku);
                $_U1Bar2 = (float) pow($_U1Bar2, 0.5);
                $_CUBar2 = (float) pow($_CUBar2, 0.5);
                $simTmp = (float) (($_U1Bar * $_CUBar) / ($_U1Bar2 * $_CUBar2)) * $_K[$i];
                $_sim[$i] = $simTmp;
            }

            $TopIndeks = 0;
            $simK = array();
            $sigmaSim = (float) 0;
            for ($i = 0; $i < sizeof($_K); $i++) {
                $simK[$i] = $_sim[$i] * $_K[$i];
                $sigmaSim += (float) $_sim[$i];
            }

            //Tentuan user lain dengan kemiripan tertinggi
            for ($i = 0; $i < sizeof($_K); $i++) {
                if ($simK[$i] > $simK[$TopIndeks]) {
                    $TopIndeks = $i;
                }
            }
            $msgPU = "";
            // Hitung nilai Predikasi
            $_PU = array();
            $ListBuku3 = array();

            for ($i = 0; $i < sizeof($ListBuku); $i++) {
                $_PU[$i] = $_U1Bar + ($_sim[$TopIndeks] * ($ListBuku2[$i]['mean'] * 2 - $U1['matriks'][$i])) / $sigmaSim;
                $msgPU = $msgPU . " | PU-" . ($i + 1) . ":" . $_PU[$i];
                $ListBuku3[$i]['PU'] = $_PU[$i];
                $ListBuku3[$i]['id'] = $ListBuku[$i];
            }

            for ($i = 0; $i < sizeof($ListBuku) - 1; $i++) {
                for ($j = $i + 1; $j < sizeof($ListBuku); $j++) {
                    $PUI = $ListBuku3[$i]['PU'];
                    $PUJ = $ListBuku3[$j]['PU'];
                    if ($PUJ > $PUI) {
                        $tmp = $ListBuku3[$i];
                        $ListBuku3[$i] = $ListBuku3[$j];
                        $ListBuku3[$j] = $tmp;
                    }
                }
            }
            $BukuHPRS = array();
            for ($i = 0; $i < sizeof($ListBuku); $i++) {
                $id = $ListBuku3[$i]['id'];
                array_push($BukuHPRS, $id);
            }

            //========================= Hybrid ========================================
            $range = sizeof($Centroid);
            $ListBuku4 = array();
            $msgMFCM = "";
            for ($i = 0; $i < sizeof($ListBuku); $i++) {
                $indeksMFCM = array_search($BukuHPRS[$i], $BukuMFCM);
                if (abs($i - $indeksMFCM) < $range) { //Masukkan buku teratas MFCM dan HPRS dengan jarak urutan < jumlah cluster atau "range"
                    array_push($ListBuku4, $BukuHPRS[$i]);
                    $msgMFCM = $msgMFCM . "| hyb : " . $BukuHPRS[$i];
                }
            }
            //Masukkan sisah buku dengan jarak urutan berbeda jauh kedalam Listbuku4
            for ($i = 0; $i < sizeof($ListBuku); $i++) {
                $tmp = array_search($BukuMFCM[$i], $ListBuku4);
                if ($tmp === false) {
                    array_push($ListBuku4, $BukuMFCM[$i]);
                }
            }

            //===================== MFCMHPRS ===========================

            $MFCMHPRS = array();
            for ($i = 0; $i < sizeof($ListBuku); $i++) {
                $id = $ListBuku4[$i];
                $quer3 = $mysqli->query("SELECT * FROM `tbl_buku` WHERE b_idbuku = " . $id);
                $buku = $quer3->fetch_assoc();
                array_push($MFCMHPRS, $buku);
            }
            return $MFCMHPRS;
        }
        //return $this->db->get('tbl_buku');
    }

    public function insertPeminjaman($tbl, $data)
    {
        $this->db->insert($tbl, $data);
        $idBuku = $data['t_idbuku'];
        $mysqli = new mysqli("localhost", "root", "", "db_perpus");
        $query2 = $mysqli->query("UPDATE `tbl_buku` SET b_jumlah = b_jumlah-1 where b_idbuku = " . $idBuku);
    }

    public function bukuTerpinjam($id)
    {
        $query = $this->db->query("SELECT * FROM tbl_pengguna LEFT JOIN tbl_transaksi ON tbl_pengguna.p_id = tbl_transaksi.t_idpengguna LEFT JOIN tbl_buku ON tbl_buku.b_idbuku = tbl_transaksi.t_idbuku where tbl_pengguna.p_id = '$id' AND tbl_transaksi.t_status = 'Y' ORDER BY t_tanggalpinjam DESC");
        return $query;
    }

    public function detailBuku($idbuku)
    {
        $q = $this->db->query("SELECT * FROM tbl_buku where b_idbuku = '$idbuku'");
        return $q;
    }

    public function insertRating($type, $data)
    {
        $iduser = $data['r_iduser'];
        $idbuku = $data['r_idbuku'];
        $rating = $data['r_rating'];
        $ulasan = $data['r_ulasan'];
        if ($type == "INSERT") {
            $que = $this->db->query("INSERT INTO tbl_rating(r_iduser, r_idbuku, r_rating, r_ulasan) VALUES (" . $iduser . "," . $idbuku . "," . $rating . ",'" . $ulasan . "')");
        } else {
            $que = $this->db->query("UPDATE tbl_rating SET r_rating= " . $rating . " , r_ulasan='" . $ulasan . "' WHERE r_iduser = " . $iduser . " AND r_idbuku = " . $idbuku);
        }
    }

    public function cekUlas($idbuku, $iduser)
    {
        $que = $this->db->query("SELECT * FROM tbl_rating WHERE r_iduser = '$iduser' AND r_idbuku = '$idbuku' ");
        return $que;
    }

    public function cekUlasanmember($idbuku, $iduser)
    {
        $que = $this->db->query("SELECT * FROM tbl_rating WHERE r_iduser = '$iduser' AND r_idbuku = '$idbuku' ");
        return $que;
    }

    public function updateRating($idrating, $data)
    {
        $this->db->where('r_id', $idrating);
        $this->db->update('tbl_rating', $data);
    }

    public function updateTransaksi($idtransaksi, $data)
    {
        $this->db->where('t_idtransaksi', $idtransaksi);
        $this->db->update('tbl_transaksi', $data);
        }

    public function riwayat($id)
    {
        $query = $this->db->query("SELECT * FROM tbl_pengguna LEFT JOIN tbl_transaksi ON tbl_pengguna.p_id = tbl_transaksi.t_idpengguna LEFT JOIN tbl_buku ON tbl_buku.b_idbuku = tbl_transaksi.t_idbuku where tbl_pengguna.p_id = '$id' AND tbl_transaksi.t_status = 'N' ORDER BY t_tanggalpinjam DESC");
        return $query;
    }

    public function filedek3()
    {
        echo "<script type='text/javascript'>alert('testing');</script>";
    }
    public function filedek2($id)
    {

        $mysqli = new mysqli("localhost", "root", "", "db_perpus");
        $query2 = $mysqli->query("SELECT * FROM tbl_dokumen WHERE d_idbuku=" . $id);

        $data = $query2->fetch_assoc();
        //$data['optjudul'] = $this->model_buku->getdok()->result();
        $password = $data['d_key'];
        $namefile = $data['d_namaenkrip'];
        $iduser = $_SESSION['ses_id'];
        $idbuku = $id;
        echo "<script type='text/javascript'> alert('Check =".$id.")</script>";
        $uploadURL = $_SERVER['DOCUMENT_ROOT'] . "/TAPerpus/uploads/";
        //$password = "sio";
        $jlh = mysqli_num_rows($query2);
        $namaDekrip = $data['d_namadekrip'];
        $query3 = $mysqli->query("SELECT * FROM tbl_transaksi WHERE t_idbuku=" . $idbuku . " AND t_idpengguna=" . $iduser. " ORDER BY t_idtransaksi DESC LIMIT 1");
        
        $data2 = $query3->fetch_assoc();
        $tglAkhir = $data2['t_tanggalkembali'];

        $found = file_exists($_SERVER['DOCUMENT_ROOT'] . "/TAPerpus/uploads/tempFile.tmp");
        if($found){
            unlink($namefile) or die("Couldn't delete file");
        }

        $dateNow = array(date('Y'), date('n'), date('j'), date('H'), date('i'), date('s'));
        $thn = (int) substr($tglAkhir, 0, 4);
        $bln = (int) substr($tglAkhir, 5, 2);
        $tgl = (int) substr($tglAkhir, 8, 2);
        $jam = (int) substr($tglAkhir, 11, 2);
        $min = (int) substr($tglAkhir, 14, 2);
        $det = (int) substr($tglAkhir, 17, 2);
        $dateLim = array($thn, $bln, $tgl, $jam, $min, $det);
        $check = 0;
        $aktif = 0;
        while ($check < 6) {
            if ($dateNow[$check] <= $dateLim[$check] || $aktif == 1) {
                $check++;
                if ($dateNow[$check] < $dateLim[$check]) {
                    $aktif = 1;
                    break;
                }
            } else { $aktif = 0;
                break;}
        }

        // echo "<script type='text/javascript'> alert('Check =".$check."|aktif = ".$aktif."')</script>";
        if ($aktif == 0) { //masa peminjaman berakhir=============================
            
            $fileDekrip = $_SERVER['DOCUMENT_ROOT'] . "/TAPerpus/decrypt/" . $namaDekrip;
            
            $found = file_exists($fileDekrip);
            if($found){
                unlink($fileDekrip) or die("Couldn't delete file");
            }
            $mysqli->query("UPDATE `tbl_buku` SET b_jumlah = b_jumlah+1 WHERE b_idbuku =".$idbuku);
            $mysqli->query("UPDATE tbl_transaksi SET t_status='N' WHERE t_idbuku=" . $idbuku. " AND t_idpengguna = ".$iduser." AND t_status = 'Y' ");
            echo "<script type='text/javascript'> alert('Waktu Peminjaman Buku telah Berakhir !')</script>";
        } elseif (strlen($namaDekrip) < 1) { // jika file belum di dekrip, lakukan dekripsi

            $writedir = $_SERVER['DOCUMENT_ROOT'] . "/TAPerpus/uploads";
            //$passhash = hash("SHA256", $password, true);
            $passhash = $password;
            $aesinitv = $this->aesinitvector;

            if (true) {
                //$namefile = $_FILES['file']['tmp_name'];

                //$namefile = "";
                $allowed = array('encrypted');
                //$filename = $_FILES['file']['name'];
                //$filename = $dokumen['d_namaenkrip'];
                $filename = $namefile;
                $ext = pathinfo($filename, PATHINFO_EXTENSION); // value="encrypted"

                /*if(!in_array($ext,$allowed) ) {
                $alert2 = "Decrypt File Gagal, File yang di Input Bukan File Enkripsi";
                } else {*/

                $tmpFile = tmpfile();
                copy($uploadURL . $filename, $uploadURL . "tmpFile.tmp");
                $namefile = $uploadURL . "tmpFile.tmp";
                //tempnam($uploadURL,"TMP0");
                //$namefile = $_FILES['file']['tmp_name'];
                $sourcesize = filesize($namefile);
                //$filesource = fopen($namefile, "rb");
                $filesource = fopen($namefile, "rb");

                //$namefile = $tmpFile;

                if ($filesource !== false) {
                    $filename = "";
                    $filechar = "";
                    while ($filechar != "\1") {$filename .= $filechar;
                        $filechar = fread($filesource, 1);
                        $stream_meta_data = stream_get_meta_data($filesource);
                        if ($stream_meta_data['unread_bytes'] <= 0) {
                            break;
                        }
                    }
                    $filesize = "";
                    $filechar = "";
                    while ($filechar != "\1") {$filesize .= $filechar;
                        $filechar = fread($filesource, 1);
                        $stream_meta_data = stream_get_meta_data($filesource);
                        if ($stream_meta_data['unread_bytes'] <= 0) {
                            break;
                        }
                    }
                    $filesize = intval($filesize);
                    $fileket = "";
                    $filechar = "";
                    while ($filechar != "\1") {$fileket .= $filechar;
                        $filechar = fread($filesource, 1);
                        $stream_meta_data = stream_get_meta_data($filesource);if ($stream_meta_data['unread_bytes'] <= 0) {
                            break;
                        }
                    }

                    // sementara $fileket == "enkrip"
                    //$fileket = "enkrip";
                    //$filename= "receipt.pdf";
                    //
                    if ($fileket == "enkrip") {

                        $magicode = fread($filesource, 16);

                        $aesinitv = fread($filesource, 16);
                        $dmessage = mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $passhash, $magicode, MCRYPT_MODE_CBC, $aesinitv);

                        if (rtrim($dmessage) == "magicstring") {
                            // header('Content-Type: application/octet-stream');
                            // header('Content-Disposition: attachment; filename="' . $filename . '"');
                            // header('Content-Length: ' . $filesize);

                            $filesourcedata = fread($filesource, filesize($namefile));
                            $decodedata = base64_decode($filesourcedata);
                            $aes = new AesCtr();
                            $dmessage = $aes->decrypt($decodedata, $passhash, 128);
                            $tujuan = $_SERVER['DOCUMENT_ROOT'] . "/TAPerpus/decrypt/" . $filename;
                            $hasilDekrip = file_put_contents($tujuan, $dmessage);
                            //update lokasi Dekripsi
                            $query2 = $mysqli->query("UPDATE tbl_dokumen SET d_namadekrip = '" . $filename . "' WHERE d_idbuku=" . $id);
                            //print($dmessage);
                            //hapus file tempFile.tmp
                            
                            
                            //fclose($fsrcobjc);
                            //exit(0);
                            $data["succes"] = "Dekripsi File Berhasil";
                        } else {
                            $data["alert"] = "Password Salah";}
                    } else {
                        $data["alert"] = "bukan file enkrip";}
                } else {
                    $data["alert"] = "error";}
            }
            //}
        }
        // $data['view'] = ('admin/dashboard/_partials/part_dekripsi.php');
        // $this->load->view('layouts/layout_dashboard/template_dashboard', $data);
    }

}

/* End of file model_buku.php */
