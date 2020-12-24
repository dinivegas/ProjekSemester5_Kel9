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
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <?php include('component/header.php') ?>
        
        <?php include('component/sidebar.php') ?>
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Chat Dosen Wali</h4>
                        
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                
               <div class="row">
               <div class="col-md-12">
                    <table class="table">
                        <tr>
                            <td style="width:180px"><b>Nama</b></td><td><span class="form-control"><?= $this->session->userdata('userdata')['nama_doswal']?></span></td>
                        </tr>
                        <tr>
                            <td style="width:180px"><b>Ketua Program Studi</b></td><td><span class="form-control"><?= (isset($data['nama_kaprodi']) ? $data['nama_kaprodi'] : '-')?></span></td>
                        </tr>
                        <tr>
                            <td style="width:180px"><b>Pusat Karir</b></td><td><span class="form-control"><?= (isset($data['nama_pusatkarir']) ? $data['nama_pusatkarir'] : '-')?></span></td>
                        </tr>
                        <tr>
                            <td style="width:180px"><b>Mahasiswa</b></td><td><span class="form-control"><?= (isset($data['nama_mhs']) ? $data['nama_mhs'] : '-')?></span></td>
                        </tr>
                        <tr>
                            <td style="width:180px"><b>Tanggal Chat</b></td><td><span class="form-control"><?= (isset($data['tgl_chat']) ? $data['tgl_chat'] : '-')?></span></td>
                        </tr>
                        <!--  -->
                        
                        <tr>
                            <td style="width:180px"><b>Topik</b></td><td>
                                <?php
                                if(isset($data['status_chat'])){
                                    if($data['status_chat'] == 5){
                                ?>
                                <div class="input-group">
                                    <input type="text" placeholder="Masukkan Topik Pembicaraan Anda" class="form-control">
                                    <input class="btn btn-outline-primary" type="button" id="inputGroupFileAddon04" value="YA"></input>
                                </div>
                                <?php }else{ ?>
                                    <?php 
                                        if(isset($data['status_chat'])){
                                            if($data['status_chat'] == 1){
                                    ?>
                                    <?= $data['topik_chat']?>
                                    <?php }} ?>
                                <?php }
                                    } ?>
                            </td>
                        </tr>
                    </table>
                    <?php 
                    if(isset($data['status_chat'])){
                    ?>
                    <a href="<?= base_url('user/chatdosen/selesai/'.$data['id_chat']) ?>"><button class="btn btn-success">Selesai</button></a>
                    <a href="<?= base_url('user/chatdosen/lanjutkan/'.$data['id_chat']) ?>"><button class="btn btn-warning">Lanjutkan</button></a>
                    <?php } ?>
                </div>
                   <div class="col-md-12">
                        <div id="pesan">
                        
                        </div>
                        <div class="form-group">
                        <?php 
                        if(isset($data['status_chat'])){
                        ?>
                            <input type="hidden" name="id_chat" id="id_chat" class="form-control"  readonly style="font-weight:bold" placeholder="yourname" value="<?= $data['id_chat']?>">
                            <?php } ?>
                            </div>   
                            
                            <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Chat Option</h4>
                                <div class="chat-box scrollable" style="height:475px;">
                                    <!--chat Row -->
                                    <ul class="chat-list">
                                        <!--chat Row -->
                                        <?php foreach($chat as $list){
                                            
                                        ?> 
                                        <!--chat Row -->
                                        <!-- diubah -->
                                        <li class="<?= ($list->level == 2 && $list->id_doswal == $this->session->userdata('userdata')['id_doswal']  ? 'odd' : '') ?> chat-item">
                                            <div class="chat-content">
                                                <div class="box bg-light-inverse"><?= $list->isi_chat ?></div>
                                                <br>
                                            </div>
                                            <div class="chat-time"><?= $list->tanggal_chat ?></div>
                                        </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body border-top">
                                <div class="row">
                                    <div class="col-9">
                                        <div class="input-field m-t-0 m-b-0">
                                            <textarea id="message" name="message" placeholder="Type and enter" class="form-control border-0"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <a class="btn-circle btn-lg btn-cyan float-right text-white" onclick="store();"><i class="fas fa-paper-plane"></i></a>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>     
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <?php include('component/footer.php') ?>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="<?php echo base_url()?>user/assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo base_url()?>user/assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="<?php echo base_url()?>user/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?php echo base_url()?>user/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="<?php echo base_url()?>user/assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="<?php echo base_url()?>user/dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="<?php echo base_url()?>user/dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="<?php echo base_url()?>user/dist/js/custom.min.js"></script>
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>

  <script>

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('a07f7d661e8689f142b8', {
      cluster: 'ap1',
      encrypted: true
    });

    var channel = pusher.subscribe('my-channel');
    channel.bind('my-event', function(data) {
     //alert(data.message);
     console.log(data);
     AddData(data);
    });

    function AddData(data) {
        
        console.log(data);
        data.reverse();
        result(data)
    }
    function result(data){
        console.log(data);
        var str = '';
        for(var z in data){
        
            str += '<li class="'+ (data[z].level == 2 ? 'odd' : '') +' chat-item">'
                    +'<div class="chat-content">'
                    +'<div class="box bg-light-inverse">'+ data[ z ].isi_chat  +'</div>'
                    +'<br>'
                    +'</div>'
                    +'<div class="chat-time">10:59 am</div>'
                    +'</li>';
        }
        $('.chat-list').html(str);
    }

  </script>

    <script>
        function store() {
            var value = {
                id_chat: $('#id_chat').val(),
                message: $('#message').val()
            }
            // console.log(value);
            $.ajax({
                url: '<?=site_url();?>/user/konsultasi/store',
                type: 'POST',
                data: value,
                dataType: 'JSON',
                success: function(data){ 
                // console.log(data); 
                window.location.reload();

            },
            error: function(data){ 
                console.log(data); 
                window.location.reload();
            },
            });
        }
    </script>
</body>

</html>