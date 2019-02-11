<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12"><br>
                <ol class="breadcrumb">
                    <li>
                        <a href="<?php echo site_url('controller_dashboard/index/') ?>">Dashboard</a>
                    <li class="active">Laporan Member</li>
                    </li>
                </ol>
                <?php  echo $this->session->flashdata('msg'); 
                    //include "daftar_klasifikasi.php";
                ?>
            </div>

            <div class="col-md-12 col-xs-12 col-lg-12">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-xs-4">
                        <div class="card">
                            <div class="card-header card-header-icon" data-background-color="rose">
                                <i class="material-icons">filter_list</i>
                            </div>
                            <div class="card-content">
                                <h4 class="card-title">Info Visitor</h4>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped">
                                        <tr>
                                            <td><b>Nama Pengguna</b></td>
                                            <td><?php echo $nama; ?></td>
                                        </tr>
                                        <tr>
                                            <td><b>Online</b></td>
                                            <td><?php echo $online; ?></td>
                                        </tr>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-8 col-xs-8">
                        <div class="card">
                            <div class="card-content">
                                <h4 class="card-title">Info Visitor</h4>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped">

                                        <tr>
                                            <td><b>Nama Pengguna</b></td>
                                            <td><?php echo $nama; ?></td>
                                        </tr>
                                        <tr>
                                            <td><b>IP Address</b></td>
                                            <td><?php echo $ip; ?></td>
                                        </tr>
                                        <tr>
                                            <td><b>Operating System</b></td>
                                            <td><?php echo $os; ?></td>
                                        </tr>
                                        <tr>
                                            <td><b>Browser Details</b></td>
                                            <td><?php echo $browser . ' - ' . $browser_version; ?></td>
                                        </tr>
                                        <tr>
                                            <td><b>Info User Agent Detail</b></td>
                                            <td><?php echo $useragent; ?></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>