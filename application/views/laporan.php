<br>
<div class="panel panel-info">
  <div class="panel-heading">
    <h3 class="panel-title">Laporan</h3>
  </div>
  <div class="panel-body">  
    <ul class="nav nav-tabs" role="tablist">
      <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Penjualan</a></li>
      <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Pembelian</a></li>        
      <li role="presentation"><a href="#laporan" aria-controls="laporan" role="tab" data-toggle="tab">Service</a></li>        
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
      <div role="tabpanel" class="tab-pane fade in active" id="home">
        <hr><h4>Laporan Penjualan</h4>
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <?php echo form_open('laporan/penjualan', array('class' => 'form-inline')); ?>
              <div class="form-group">                    
                <input type="date" class="form-control" placeholder="Tanggal Awal" name="tgla">
              </div>
              <div class="form-group"> -s/d- </div>
              <div class="form-group">                    
                <input type="date" class="form-control" placeholder="Tanggal Akhir" name="tglb">
              </div>
              <button type="submit" class="btn btn-primary">Download</button>
            <?php echo form_close(); ?>
          </div>
        </div>        
      </div>
      <div role="tabpanel" class="tab-pane fade" id="profile">
        <hr><h4>Laporan Pembelian</h4>      	
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <?php echo form_open('laporan/pembelian', array('class' => 'form-inline')); ?>
              <div class="form-group">                    
                <input type="date" class="form-control" placeholder="Tanggal Awal" name="tglc">
              </div>
              <div class="form-group"> -s/d- </div>              
              <div class="form-group">                    
                <input type="date" class="form-control" placeholder="Tanggal Akhir" name="tgld">
              </div>
              <button type="submit" class="btn btn-primary">Download</button>
            <?php echo form_close(); ?>
          </div>
        </div>        
      </div> 
      <div role="tabpanel" class="tab-pane fade" id="laporan">
        <hr><h4>Laporan Jasa Service</h4>        
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <?php echo form_open('laporan/service', array('class' => 'form-inline')); ?>
              <div class="form-group">                    
                <input type="date" class="form-control" placeholder="Tanggal Awal" name="tgle">
              </div>
              <div class="form-group"> -s/d- </div>              
              <div class="form-group">                    
                <input type="date" class="form-control" placeholder="Tanggal Akhir" name="tglf">
              </div>
              <button type="submit" class="btn btn-primary">Download</button>
            <?php echo form_close(); ?>
          </div>
        </div>        
      </div>    
    </div>
  </div>
</div>

  <!-- Nav tabs -->

