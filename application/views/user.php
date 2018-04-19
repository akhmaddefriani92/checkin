
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="panel panel-primary0 ">
                            <div class="panel-body">
                               <button class="btn btn-success" onclick="add_user()"><i class="glyphicon glyphicon-plus"></i> Add User</button>   
                               <button class="btn btn-default" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i> Reload</button>
                            
                                <br><br>
                                <table class="table table-stripped table-bordered" id="dataTables" >
                                    <thead style="background-color:#00183f;color:#fff;">
                                        <th>No.</th>
                                        <th>UserName</th>
                                       <!--  <th>Password</th> -->
                                        <th>FullName</th>
                                        <th>Tipe</th>
                                        <th>Action</th>
                                    </thead>    
                                    <tbody style='text-align: center;'>
                                    <?php
                                    $no = 1;
                                    foreach ($view_data as $key => $value) {
                                      # code...
#ID UserName  FullName  Password  AirlinesINX Deletef Level rowguid name                                  
                                    $aksi = '<a class="btn btn-sm btn-primary" href="javascript:void()" title="Edit" onclick="edit_user('."'".$value["id"]."'".')"><i class="glyphicon glyphicon-pencil"></i></a>
                      <a class="btn btn-sm btn-danger" href="javascript:void()" title="Hapus" onclick="delete_user('."'".$value["id"]."'".')"><i class="glyphicon glyphicon-trash"></i></a>'; 
                        if($value["tipe"]==1){
                            $admin="Admin";
                        }else{
                          $admin="No Admin";
                        }
                                     echo "<tr>" ;
                                      echo "<td>$no</td>";
                                      echo "<td>$value[username]</td>";
                                      // echo "<td>$value[password]</td>";
                                      echo "<td>$value[fullname]</td>";
                                      echo "<td>$admin</td>";
                                      echo "<td>$aksi</td>";
                                     echo "</tr>" ;
                                     $no++;

                                    }

                                    ?>


                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    
                </div>
                <!-- /. ROW  -->    
                


  <!-- Bootstrap modal -->
  <div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">Form Users</h3>
      </div>
      <div class="modal-body form">
        <form action="#" id="form" class="form-horizontal">
          <input type="hidden" value="" name="id"/> 
          <div class="form-body">
            <div class="form-group">
              <label class="control-label col-md-3">UserName</label>
              <div class="col-md-9">
                <input name="username" placeholder="Username" class="form-control" type="text">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">FullName</label>
              <div class="col-md-9">
                <input name="fullname" placeholder="FullName" class="form-control" type="text">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Password</label>
              <div class="col-md-9">
                <input name="password" placeholder="****" class="form-control" type="password">
              </div>
            </div>
             
             
            <div class="form-group">
              <label class="control-label col-md-3">Tipe</label>
              <div class="col-md-9">
              <select name="tipe" class="form-control">
                <option value="1">Admin</option>
                <option value="2">No Admin</option>
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
  <!-- End Bootstrap modal -->


    <script>

    var save_method; //for save method string
    var table;
    $(document).ready(function() {
      table = $('#dataTables').DataTable({ 
        /*
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('Users/ajax_list')?>",
            "type": "POST"
        },
         "columns": [
          
                       { "data": "no"},
                        { "data": "UserName" },
                        { "data": "Password" },
                        { "data": "FullName" },
                        { "data": "AirlinesINX" },
                        { "data": "Deletef" },
                        { "data": "aksi" }
                        
                    ],*/
        responsive: true   
        
      });
    });

    
    function add_user()
    {
      save_method = 'add';
      //alert('test');
      
      $('#form')[0].reset(); // reset form on modals
      $('#myModal').modal('show'); // show bootstrap modal
      $('.modal-title').text('Add User'); // Set Title to Bootstrap modal title
      
    }

    function edit_user(id)
    {
      save_method = 'update';
      $('#form')[0].reset(); // reset form on modals
      // alert(id);
      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('Users/ajax_edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            $('[name="id"]').val(data.id);
            $('[name="username"]').val(data.username);
            $('[name="fullname"]').val(data.fullname);
            $('[name="password"]').val(data.password);
            $("#tipe").val(data.tipe);
            
            //var text1 = data.AirlinesINX;
            //alert(text1);
            /*
            $('[name="AirlinesINX"]').filter(function() {
                //may want to use $.trim in here
                return $(this).text() == text1; 
            }).prop('selected', true);
            */
            
            $('#myModal').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Users'); // Set title to Bootstrap modal title
            
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
    }

    function reload_table()
    {
      // table.ajax.reload(null,false); //reload datatable ajax 
      window.location.reload(true);
    }

    function save()
    {
      var url;
      if(save_method == 'add') 
      {
          url = "<?php echo site_url('Users/ajax_add')?>";
      }
      else
      {
        url = "<?php echo site_url('Users/ajax_update')?>";
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
             
               $('#myModal').modal('hide');
               reload_table();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
    }

    function delete_user(id)
    {
      if(confirm('Are you sure delete this data?'))
      {
        // ajax delete data to database
          $.ajax({
            url : "<?php echo site_url('Users/ajax_delete')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
               //if success reload ajax table
               $('#modal_form').modal('hide');
               reload_table();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
         
      }
    }

    </script>
