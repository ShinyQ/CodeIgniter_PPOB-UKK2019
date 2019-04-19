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
    <?php if($DataTagihan != NULL): ?>
      <?php foreach ($StatusTagihan as $data): ?>
    <div class="row">
    <div class="col-md-6">
      <div class="panel panel-headline">
        <div class="panel-heading">
          <h3 class="panel-title">Halo Selamat Datang, <?= $this->session->userdata('nama_pelanggan') ?></h3>
          <p class="panel-subtitle">PPOB Listrik Pasca Prabayar @2019</p>
        </div>

        <div class="panel-body">
          <div class="row">
            <div class="col-md-12">
              <div class="metric">
                <span class="icon"><i class="fa fa-calendar"></i></span>
                <p>
                  <span class="number">
                    <?php if($data->status == 'Lunas'): ?>
                    <font color="green"><strong><?= $data->status ?></strong></font>
                    <?php else: ?>
                    <font color="red"><?= $data->status ?></font>
                    <?php endif?>
                  </span>
                  <span class="title">Status Tagihan Bulan Ini</span>
                </p>
              </div>
            </div>

            <div class="col-md-12">
              <div class="metric">
                <span class="icon"><i class="fa fa-check"></i></span>
                <p>
                  <span class="number"><?= $JumlahTagihanLunas ?></span>
                  <span class="title">Jumlah Tagihan Lunas</span>
                </p>
              </div>
            </div>

            <div class="col-md-12">
              <div class="metric">
                <span class="icon"><i class="fa fa-exchange"></i></span>
                <p>
                  <span class="number"><?= $JumlahTagihanBelumLunas ?></span>
                  <span class="title">Jumlah Tagihan Belum Lunas</span>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  <?php endforeach ?>
<?php endif ?>

    <?php if($DataTagihan == NULL): ?>
    <div class="row">
    <div class="col-md-6">
      <div class="panel panel-headline">
        <div class="panel-heading">
          <h3 class="panel-title">Halo Selamat Datang, <?= $this->session->userdata('nama_pelanggan') ?></h3>
          <p class="panel-subtitle">PPOB Listrik Pasca Prabayar @2019</p>
        </div>

        <div class="panel-body">
          <div class="row">
            <div class="col-md-12">
              <div class="metric">
                <span class="icon"><i class="fa fa-arrow-down"></i></span>
                <p>
                  <span class="number">
                      <font color="red">Belum Dibayarkan</font>
                  </span>
                  <span class="title">Status Tagihan Bulan Ini</span>
                </p>
              </div>
            </div>

            <div class="col-md-12">
              <div class="metric">
                <span class="icon"><i class="fa fa-random"></i></span>
                <p>
                  <span class="number">0</span>
                  <span class="title">Jumlah Tagihan Lunas</span>
                </p>
              </div>
            </div>

            <div class="col-md-12">
              <div class="metric">
                <span class="icon"><i class="fa fa-dollar"></i></span>
                <p>
                  <span class="number">0</span>
                  <span class="title">Jumlah Tagihan Belum Lunas</span>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php endif ?>

    <?php if($DataTagihan == NULL): ?>
        <div class="col-md-6">
          <div class="panel panel-headline">
            <div class="panel-heading">
              <h3 class="panel-title">Data Penggunaan Listrik Anda</h3>
              <p class="panel-subtitle">Periode Bulan Ini</p>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="metric">
                    <span class="icon"><i class="fa fa-random"></i></span>
                    <p>
                      <span class="number">0 kWh</span>
                      <span class="title">Total Meter</span>
                    </p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="metric">
                    <span class="icon"><i class="fa fa-arrow-down"></i></span>
                    <p>
                      <span class="number">0 kWh</span>
                      <span class="title">Meter Awal</span>
                    </p>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="metric">
                    <span class="icon"><i class="fa fa-arrow-up"></i></span>
                    <p>
                      <span class="number">0 kWh</span>
                      <span class="title">Meter Akhir</span>
                    </p>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="metric">
                    <p>
                      <span class="icon"><i class="fa fa-dollar"></i></span>
                      <span class="number">
                          Rp0,00
                      </span>
                      <span class="title">Total Bayar</span>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php endif ?>

    <?php if($DataTagihan != NULL): ?>
    <?php foreach ($DataTagihan as $data): ?>
    <div class="col-md-6">
      <div class="panel panel-headline">
        <div class="panel-heading">
          <h3 class="panel-title">Data Penggunaan Listrik Anda</h3>
          <p class="panel-subtitle">Bulan <?= $data->bulan ?> <?= $data->tahun ?></p>
        </div>
        <div class="panel-body">
          <div class="row">
            <div class="col-md-6">
              <div class="metric">
                <span class="icon"><i class="fa fa-arrow-down"></i></span>
                <p>
                  <span class="number"><?= $data->meter_awal ?></span>
                  <span class="title">Meter Awal (kWh)</span>
                </p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="metric">
                <span class="icon"><i class="fa fa-arrow-up"></i></span>
                <p>
                  <span class="number"><?= $data->meter_akhir ?></span>
                  <span class="title">Meter Akhir (kWh)</span>
                </p>
              </div>
            </div>

            <div class="col-md-12">
              <div class="metric">
                <span class="icon"><i class="fa fa-random"></i></span>
                <p>
                  <span class="number"><?= $data->jumlah_meter ?> kWh</span>
                  <span class="title">Total Meter</span>
                </p>
              </div>
            </div>

            <div class="col-md-12">
              <div class="metric">
                <span class="icon"><i class="fa fa-dollar"></i></span>
                <p>
                  <span class="number">
                    <?php $bayar = ($data->jumlah_meter * $data->terperkwh + 2500) ?>
                    Rp<?=number_format($bayar,2,',','.') ?>
                  </span>
                  <span class="title">Total Bayar</span>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
    <!-- END OVERVIEW -->
  <?php endforeach ?>
  <?php endif ?>

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
