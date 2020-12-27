<!doctype html>
<html class="no-js" lang=""> 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin E-konseling</title>
    <meta name="description" content="Admin E-konseling">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="shortcut icon" href="<?php echo base_url()?>user/assets/images/polije.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>admin/assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="<?php echo base_url()?>admin/assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body>
    <?php include('component/sidebar1.php')?>

    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">

        <?php include('component/header1.php')?>

        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Data Psikolog</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content-wrapper">
            <section class="content">
                <!-- Main row -->
                <div class="row">
                    <div class="col-xs-12">
                    <div class="box-header">
                                <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal" ><i class="fa fa-plus"> </i> Tambah Data</a>
                            <table class="table">
                            </div>


                            <br>
                            
                            <!-- /.box-header -->
                            <div class="box-body">
                                <table id="datatb" class="table table-striped table-sm">
                                    <div class="table-responsive">
                                        <thead class="table-dark">
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama</th>
                                            <th>No. HP</th>
                                            <th>E-mail</th>
                                            <th>Alamat</th>
                                            <th>Bidang</th>
                                            <th>Foto</th>
                                            <th colspan="2"> Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        //$nomor=1;
                                        foreach ($psikolog as $pkg) :
                                        ?>
                                        <tr>
                                            <td><?php echo $pkg->id_psikolog ?></td>
                                            <td><?php echo $pkg->nama_psikolog ?></td>
                                            <td><?php echo $pkg->nohp_psikolog ?></td>
                                            <td><?php echo $pkg->email_psikolog ?></td> 
                                            <td><?php echo $pkg->alamat_psikolog ?></td>
                                            <td><?php echo $pkg->bidang_psikolog ?></td>
                                            <td><?php echo $pkg->foto_psikolog ?></td>
                                            <td onclick="javascript: return confirm('Anda yakin hapus?')">
                                                <?php echo anchor('admin/data_doswal/hapus/'. $pkg->id_psikolog, '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>') ?></td>
                                                <td></div class="btn btn-primary btn-sm"><button data-toggle="modal" data-target="#exampleModal<?= $pkg->id_psikolog ?>"><i class="fa fa-edit"></i></button></div></td>
                                                <div class="modal fade" id="exampleModal<?= $pkg->id_psikolog ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="exampleModalLabel">FORM INPUT DATA PSIKOLOG</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form method="post" action="<?php echo base_url().'admin/data_psikolog/update_aksi/'. $pkg->id_psikolog ?>">

                                                                    <div class="form-group">
                                                                        <label>NAMA</label>
                                                                        <input type="text" name="nama" class="form-control" value="<?= $pkg->id_psikolog ?>">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label>NOMOR TELEPON</label>
                                                                        <input type="text" name="no_hp" class="form-control" value="<?= $pkg->id_psikolog?>">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label>EMAIL</label>
                                                                        <input type="text" name="email" class="form-control" value="<?= $pkg->id_psikolog?>">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label>ALAMAT</label>
                                                                        <input type="text" name="alamat" class="form-control" value="<?= $pkg->id_psikolog?>">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label>BIDANG</label>
                                                                        <input type="text" name="bidang" class="form-control" value="<?= $pkg->id_psikolog?>">
                                                                    </div>
                                                                    

                                                                    <div class="form-group">
                                                                        <label>FOTO</label>
                                                                        <input type="file" name="foto" class="form-control" value="<?= $pkg->id_psikolog?>">
                                                                    </div>

                                                                     <div class="form-group">
                                                                        <button type="submit" class="btn btn-primary">Save</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </tr>
                                            <?php endforeach; ?>    
                                        </tbody>
                                    </div>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </section>
        </div>
    </div>
        
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">FORM INPUT DATA PSIKOLOG</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="<?php echo base_url().'admin/data_psikolog/tambah_aksi'; ?>">

        <div class="form-group">
            <label>NAMA</label>
            <input type="text" name="nama" class="form-control" value="<?= $pkg->id_psikolog ?>">
        </div>

        <div class="form-group">
            <label>NOMOR TELEPON</label>
            <input type="text" name="no_hp" class="form-control" value="<?= $pkg->id_psikolog?>">
        </div>

        <div class="form-group">
            <label>EMAIL</label>
            <input type="text" name="email" class="form-control" value="<?= $pkg->id_psikolog?>">
        </div>

        <div class="form-group">
            <label>ALAMAT</label>
            <input type="text" name="alamat" class="form-control" value="<?= $pkg->id_psikolog?>">
        </div>

        <div class="form-group">
            <label>BIDANG</label>
            <input type="text" name="bidang" class="form-control" value="<?= $pkg->id_psikolog?>">
        </div>
                                                                    

        <div class="form-group">
            <label>FOTO</label>
            <input type="file" name="foto" class="form-control" value="<?= $pkg->id_psikolog?>">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>

        
        
        
      </div>
    </div>
  </div>
</div>
            
</div>

    <div class="clearfix"></div>

    <?php include('component/footer1.php')?>

    </div><!-- /#right-panel -->

<!-- Right Panel -->

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
<script src="<?php echo base_url()?>admin/assets/js/main.js"></script>

<script>
    jQuery(function($) {

var base ='<?= base_url() ?>';
$("#pesan").hide();
$("#nip").keyup(function(){
  var val = $(this).val();
//   console.log(val);
  $.get(base+"/admin/data_doswal/cekNip/"+val, function(data, status){
    // alert("Data: " + data + "\nStatus: " + status);
    // console.log(data);
    if(data > 0){
        // alert();
        $("#pesan").show();
        // $("#pesan").html("Nim Sudah Terpakai");
    }else{
        $("#pesan").hide();
    }
});
})  
})
</script>
</body>
</html>