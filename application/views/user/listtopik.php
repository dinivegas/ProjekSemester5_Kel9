<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url()?>user/assets/images/polije.png">
    <title>E-konseling</title>
    <!-- Custom CSS -->
    <link href="<?php echo base_url()?>user/dist/css/style.min.css" rel="stylesheet">

</head>

<body>

    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>

    <div id="main-wrapper">
        <?php include('component/header.php') ?>
        
        <?php include('component/sidebar.php') ?>
        <div class="page-wrapper">

            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">List Topik</h4>
                    </div>
                </div>
                <?php 
                if(isset($this->session->userdata('userdata')['id_mhs'])){
                ?>
                <a href= "<?= base_url('user/konsultasi/topik')?>"><button type="button" class="btn btn-link">+ Topik</button></a>
                <?php } ?>
            </div>
            
            <div class="container-fluid">

                <div class="row">
                   
                <div class="col-md-12">
                
                        <div class="card">
                            <div class="card-body">
                                <?php
                                foreach ($chat as $c) {
                                    ?>
                                <div class="d-flex flex-row comment-row m-t-0 mt-2">
                                    <div class="comment-text w-100">
                                        <h6 class="font-medium"><?= $c['nama_mhs'] ?></h6>
                                        <a href="<?= (isset($this->session->userdata('userdata')['id_mhs']) ? base_url('user/konsultasi/index/'.$c['id_chat']) : (isset($this->session->userdata('userdata')['id_doswal']) ? base_url('user/chatdosen') : base_url('user/chatkaprodi')))?>">
                                        <span class="m-b-15 d-block"><?= $c['topik_chat']?> </span>
                                        <div class="comment-footer">
                                            <button class="btn btn-primary">
                                                <?php
                                                    $data = ['', 'Dosen Wali', 'Kaprodi', '', '', 'Selesai'];
                                                    echo $data[$c['status_chat']];
                                                ?>
                                            </button>
                                            <span class="text-muted float-right"><?= $c['tgl_chat']?></span> 
                                        </div>
                                        </a>
                                    </div>
                                </div>
                                <?php } ?>
                            
                        </div>
                    </div>

            </div>

        </div>
        
    </div>
    <?php include('component/footer.php') ?>
    <script src="<?php echo base_url()?>user/assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="<?php echo base_url()?>user/assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="<?php echo base_url()?>user/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url()?>user/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="<?php echo base_url()?>user/assets/extra-libs/sparkline/sparkline.js"></script>
    <script src="<?php echo base_url()?>user/dist/js/waves.js"></script>
    <script src="<?php echo base_url()?>user/dist/js/sidebarmenu.js"></script>
    <script src="<?php echo base_url()?>user/dist/js/custom.min.js"></script>
</body>

</html>