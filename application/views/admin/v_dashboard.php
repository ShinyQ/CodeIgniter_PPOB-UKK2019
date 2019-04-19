<?php
  if($this->session->flashdata('pesan_sukses') !=''){
?>
      <script>
      $(document).ready(function(){
          $("#pesan").modal();
      });
      </script>
<?php
  }
?>

    <div class="row">
    <div class="col-md-6">
      <div class="panel panel-headline">
        <div class="panel-heading">
          <h3 class="panel-title">Halo Selamat Datang, <?= $this->session->userdata('nama_admin') ?></h3>
          <p class="panel-subtitle">Total Pembayaran Bulan Ini</p>
        </div>

        <div class="panel-body">
          <div class="row">
            <div class="col-md-12">
              <div class="metric">
                <span class="icon"><i class="fa fa-calendar"></i></span>
                <p>
                  <span class="number">
                      <?= $DataPembayaran ?>
                  </span>
                  <span class="title">Total Pembayaran Bulan Ini</span>
                </p>
              </div>
            </div>

            <div class="col-md-12">
              <div class="metric">
                <span class="icon"><i class="fa fa-check"></i></span>
                <p>
                  <span class="number"><?= $DataPembayaranLunas ?></span>
                  <span class="title">Jumlah Pembayaran Lunas</span>
                </p>
              </div>
            </div>

            <div class="col-md-12">
              <div class="metric">
                <span class="icon"><i class="fa fa-exchange"></i></span>
                <p>
                  <span class="number"><?= $DataPembayaranBelumLunas ?></span>
                  <span class="title">Jumlah Pembayaran Belum Lunas</span>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="col-md-6">
      <div class="panel panel-headline">
        <div class="panel-heading">
          <h3 class="panel-title">Total Seluruh Pembayaran</h3>
          <p class="panel-subtitle">Data Seluruh Pembayaran</p>
        </div>
        <div class="panel-body">
          <div class="row">
            <div class="col-md-12">
              <div class="metric">
                <span class="icon"><i class="lnr lnr-inbox"></i></span>
                <p>
                  <span class="number"><?= $DataSemuaPembayaran ?></span>
                  <span class="title">Total Pembayaran</span>
                </p>
              </div>
            </div>

            <div class="col-md-12">
              <div class="metric">
                <span class="icon"><i class="fa fa-check"></i></span>
                <p>
                  <span class="number"><?= $DataSemuaPembayaranLunas ?></span>
                  <span class="title">Jumlah Total Pembayaran Lunas</span>
                </p>
              </div>
            </div>

            <div class="col-md-12">
              <div class="metric">
                <span class="icon"><i class="fa fa-exchange"></i></span>
                <p>
                  <span class="number"><?= $DataSemuaPembayaranBelumLunas ?></span>
                  <span class="title">Jumlah Total Pembayaran Belum Lunas</span>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
    <!-- END OVERVIEW -->

    <!-- Modal Pesan -->
    <div class="modal fade" id="pesan" role="dialog">
       <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal">&times;</button>
                 <h4 class="modal-title">
                   <center>
                      <font color="green" size="4px"><b><?= $this->session->flashdata('pesan_sukses'); ?></b></font>
                   </center>
                 </h4>
             </div>
         </div>
       </div>
    </div>
