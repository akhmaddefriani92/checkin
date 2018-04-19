  <style>
   .modal-dialog {
      width: 55%;
      height: 100%;
      
    }

    .modal-content {
     
      min-height: 100%;
      border-radius: 0;
    }
</style>

<h3 class="page-header">List Checkin Citilink</h3>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="panel panel-primary0 ">
                            <div class="panel-body">
                              <div class="row">
                                <div class="form-group">
                                  <label class="col-md-offset-2 col-md-3"style="font-size: 14px;">Tampilkan data sebanyak : </label>
                                
                                <div class="col-md-2">
                                    
                                  <select id="tampilper" class="form-control input-sm">

                                <?php
                                // $total = count($view_data);
                                $totalz =$total;
                                  for($i=1; $i<=$totalz ;$i++){
                                    if ($i%200==0 ){
                                     echo "<option value='$i'>$i baris</option>";
                                     // echo $i." \r\n";
                                   }
                                  }
                                ?>
                              </select>
                                </div>
                                </div>  
                              </div>    

                                <table class="table table-stripped table-bordered" id="dataTables" style="font-size: 11px;">
                                    <thead style="background-color:#00183f;color:#fff;">
                                        <tr id="view_table_header">
                                           <th>No</th>
                                           <th>LogID</th>
                                           <th>KiosAddress</th>
                                           <th>Airline</th>
                                           <th>QueryRequest</th>
                                           <th>QueryResponse</th>
                                           <th>TglRequest</th>
                                           <th>Status</th>
                                           <th>Finish</th>
                                           <!-- <th>Flag</th> -->
                                           <th>LastName</th>
                                        </tr>
                                    </thead>    
                                    <tbody style='text-align: center;'>
                                    <div id="load_data"></div>
                                     <div id="wait" style="display: none;">
                            <center><img src="<?php echo base_url('assets/img/332.GIF');?>"/><br><br><br></center>
        </div>

                                    
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    
                </div>
                <!-- /. ROW  -->    
                
            

  <!-- Bootstrap modal -->
  <div class="modal fade" id="myModal" role="dialog" style="">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">Form Flight Citilink</h3>
      </div>
          <div class="modal-body form">
           <table id="paxtemp" width='80%' class='table table-hover table-bordered' style='font-size:smaller;border:1px solid #b0b0b0;'>
            <thead>
                <tr>
                  <th>FlightNo</th>
                  <!-- <th>kios</th> -->
                  <th width='5%'>paxid</th>
                  <th>Nama</th>
                  <th>DepCity</th>
                  <th>DepDate</th>
                  <th>DepTime</th>
                  <th>ArrCity</th>
                  <th>ArrDate</th>
                  <th>ArrTime</th>
                  <th width='5%'>Seat</th>
                </tr>
              </thead> 
              <tbody id="tbodyid">

              </tbody>
            </table>
        
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
              responsive: true   
            }); 
    

        var baris = 200;         
        load_ajax(baris);
        

        $('#tampilper').on('change', function() {

          var baris=this.value ;
            // alert(baris);
          load_ajax(baris);
          
        });

        function load_ajax(baris){
            // table.destroy();
            // $('#dataTables').find('tbody').empty(); 
            table .clear().draw();
            $("#wait").css("display", "block");

          var no=1;
            $.ajax({
              type : 'POST',
              url : '<?php echo site_url('Citilink/ajax_list')?>', 
              data :  'baris='+baris,
              dataType : "json",
              success : function(data){
            
                $.each(data, function( index, value ) {
                  
                    table.row.add( [
                          no,
                          value.LogID,
                          value.KiosAddress,
                          value.Airline,
                          value.QueryRequest,
                          value.QueryResponse,
                          value.TanggalRequest,
                          value.Status,
                          value.Finish,
                          value.LastName

                        ] ).draw( false );
                    no++;
                });
              // $("#wait").css("display", "none");
                  $("#wait").css("display", "none");
              }
          });
        }

    
    });


    function detail(id)
    {
      save_method = 'update';
      
$("#paxtemp tbody").empty();

      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('Citilink/detail/')?>",
        type: "POST",
        data :  'id='+id,
        dataType: "JSON",
        success: function(data)
        {
      // $('#paxtemp tbody').reset(); // reset form on modals
      
          $.each(data, function(index, value) {
           
            var row = '<tr>';
                row +='<td>'+value.FlightNo+'</td>';
                // row +='<td>'+value.KiosAddress+'</td>';
                row +='<td>'+value.PaxID+'</td>';
                row +='<td>'+value.Nama+'</td>';
                row +='<td>'+value.DepartureCity+'</td>';
                row +='<td>'+value.DepartureDate+'</td>';
                row +='<td>'+value.DepartureTime+'</td>';
                row +='<td>'+value.ArriveCity+'</td>';
                row +='<td>'+value.ArriveDate+'</td>';
                row +='<td>'+value.ArriveTime+'</td>';
                row +='<td>'+value.Seat+'</td>';
                row+='</tr>';

                $('#paxtemp tbody').append(row);
   
          });
   
             $('#myModal').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Detail Paxtemp'); // Set title to Bootstrap modal title
            
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
    }

    </script>
