<br>
<div class="panel panel-info">
  <div class="panel-heading">
    <h3 class="panel-title">Data User</h3>
  </div>
  <div class="panel-body">
      <button type="button" class="btn btn-success btn-sm" onclick="add()"><i class="fa fa-plus"></i> Tambah User</button>
      <p></p>
      <div class="row">
      	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">		
      		<table class="table table-bordered table-hover" id="example">
      			<thead>
      				<tr class="active">
      					<th width="1%">No</th>
                <th>Login User</th>
      					<th>Level</th>
      		      <th>Aksi</th>			
      				</tr>
      			</thead>
      			<tbody>
                <?php $no=1; foreach ($row as $data) { ?> 
                  <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $data->user ?></td>
                    <td><?php echo ($data->level == '1') ? 'ADMIN' : 'KASIR'; ?></td>
                    <td>
                      <button type="button" class="btn btn-primary btn-xs" onclick="edit('<?php echo $data->idUsers ?>')"><i class="fa fa-edit"></i></button>
                      <a href="<?php echo base_url('user/hapus/'.$data->idUsers) ?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin Hapus Data ?')"><span class="glyphicon glyphicon-trash"></span></a>
                    </td>

                  </tr>
               <?php } ?>
      			</tbody>
      		</table>
      	</div>
      </div>
 </div>
</div>

<!-- Modal -->

<div class="modal fade" id="modal_form" role="dialog">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h3 class="modal-title">Tambah Data User</h3>
          </div>
          <div class="modal-body form">
            <form action="#" id="form" class="form-horizontal">
                <div class="form-body">                                  
                  <div class="form-group">
                      <label class="control-label col-md-3">Nama User</label>
                      <div class="col-md-9">
                      <input name="user" placeholder="Nama User" class="form-control" type="text">
                      </div>
                  </div>            
                  <div class="form-group">
                      <label class="control-label col-md-3">Password</label>
                      <div class="col-md-9">
                      <input name="password" placeholder="Password" class="form-control" type="password">
                      </div>
                  </div>            
                  <div class="form-group">
                      <label class="control-label col-md-3">Level</label>
                      <div class="col-md-9">
                        <select name="level" class="form-control">
                          <option value="1">ADMIN</option>
                          <option value="2">KASIR</option>
                        </select>
                      </div>
                  </div>            
                </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

<script>
	var save_method; //for save method string
  var table;
  var gid;
 
	function add()
    {
      save_method = 'add';
      $('.modal-title').text('Tambah User'); // Set title to Bootstrap modal title      
      $('#form')[0].reset(); // reset form on modals
      $('#modal_form').modal('show'); // show bootstrap modal      
    //$('.modal-title').text('Add Person'); // Set Title to Bootstrap modal title
    }

     function edit(id)
    {
      save_method = 'update';
      gid = id;
      $('#form')[0].reset(); // reset form on modals
      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('index.php/user/get')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {            
            $('[name="user"]').val(data.user);            
            $('[name="level"]').val(data.level);            
            $('[name="level"]').trigger('change');            
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit User'); // Set title to Bootstrap modal title
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
    }

   	function save(){
      var url;      
      // var x = document.forms["form"]["kodejenis"].value;
      if(save_method == 'add'){
          url = "<?php echo site_url('index.php/user/simpan')?>";          
      }else{          
          url = "<?php echo site_url('index.php/user/edit/')?>" + gid;         
      }    
       // ajax adding data to database
          $.ajax({
            url : url,
            type: "POST",
            data: $('#form').serialize(),
            dataType: "JSON",
            success: function(data)
            {
               //if success close modal and reload ajax table
               $('#modal_form').modal('hide');
              location.reload();// for reload a page
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
      }
    
</script>