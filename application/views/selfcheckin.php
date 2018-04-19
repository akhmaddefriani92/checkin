 <section class="content-header">
      <h1>
        Chart SelfCheckin
        <small><?php echo $kota;?></small>
      </h1>

    </section>

    
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-default">
            <div class="box-header with-border">
              <form method="POST" action="#">
                <div class="row">
                  <div class="col-md-4 col-xs-6">
                    <label>Date</label>
                    <input type="hidden" name="kota" id="kota" value="<?php echo $kota;?>">
                    <input type="text" class="form-control" name="tanggal" id="datepicker" value="<?php echo $tanggal;?>">
                  </div> 
                  <div class="col-md-2 col-xs-6">
                    <input type="button" class="btn btn-success" id="submit" value="submit" style='margin-top: 27px;'/>
                  </div> 
                </div>  
              </form>
            </div>
            <div class="box-body"></div>
          </div>
        </div>
      </div>
      
       <div id="wait" style="display: none;">
                    <center><img src="<?php echo base_url('assets/img/332.GIF');?>"/><br><br><br></center>
        </div>
        <div id="proses" style="display: none;">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-success">
                        <div class="box-body chart-responsive">
                            
                            <h3 class='page-header'>Detail</h3>
                            <table id='detail_tbl' class='table table-stripped table-condensed' style='font-size:small;'>
                                <thead>
                                    <tbody>
                                    </tbody>
                                </thead>
                            </table>
                            <div id="chart_container"></div> 

                          <div id="chart_detail" style="margin:10px;"></div>
                        </div>  
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>    
                <!-- <div class="col-md-4">
                    <div class="box box-info">
                        <div class="box-body chart-responsive">
                          <div class="chart" id="chart_donut" style="height: 300px;"></div>
                    </div>
                </div>    
            </div> -->  
         </div>   


    </section>
    <script type="text/javascript">
      $(function(){
        $('#datepicker').datepicker({
        // autoclose: true
        format: 'yyyy-mm-dd',
        endDate: '-1d'
        });

        
        $('#submit').click(function () {
            $("#wait").css("display", "block");
            var tanggal = $("#datepicker").val();
            var kota = $("#kota").val();
            // alert(tanggal);
            $.ajax({
            type : 'POST',
            url : "<?php echo site_url('SelfCheckin/ajax_chart');?>", //Here you will fetch records 
            data :  'kota='+kota+'&tanggal='+tanggal, //Pass $id
            success : function(data){
              $("#proses").css("display", "block");
              
                var data = $.parseJSON(data);
                
                var y = data.datay;
                var x = data.datax;
                var th = data.th;
                var tr = data.tr;
                /*// var detail= data.detail;
                // var donut= data.donut;
                alert(th);*/
                
                // alert(test);
                
                Highcharts.chart('chart_container', {
                        chart: {
                            type: 'column'
                        },
                        title: {
                            text: 'Stacked column chart '+kota+' '
                        },
                        xAxis: {
                            categories: data.datay
                             },
                        yAxis: {
                            min: 0,
                            title: {
                                text: 'Total Penggunaan KIOSK'
                            },
                            stackLabels: {
                                enabled: true,
                                style: {
                                    fontWeight: 'bold',
                                    color: (Highcharts.theme && Highcharts.theme.textColor) || 'gray'
                                }
                            }
                        },
                        legend: {
                            align: 'right',
                            x: -30,
                            verticalAlign: 'top',
                            y: 25,
                            floating: true,
                            backgroundColor: (Highcharts.theme && Highcharts.theme.background2) || 'white',
                            borderColor: '#CCC',
                            borderWidth: 1,
                            shadow: false
                        },
                        tooltip: {
                            headerFormat: '<b>{point.x}</b><br/>',
                            pointFormat: '{series.name}: {point.y}<br/>Total: {point.stackTotal}'
                        },
                        plotOptions: {
                            column: {
                                stacking: 'normal',
                                dataLabels: {
                                    enabled: false,
                                    color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white'
                                }
                            }
                        },
                        series:x
                        ,
                        exporting: {
                           // filename: 'chart_'+kota+'_'+tanggal+''
                           filename: 'chart'
                        }
                    });

                    
                             
                    $("#detail_tbl thead").append(th).delay(100);
                    $("#detail_tbl tbody").append(tr).delay(100);

                    // hightchart donut
                    /*Highcharts.chart('chart_donut', {
                        chart: {
                            type: 'pie',
                            options3d: {
                                enabled: true,
                                alpha: 45
                            }
                        },
                        title: {
                            text: 'Donut charts pax '+kota
                        },
                        subtitle: {
                            text: ''
                        },
                        plotOptions: {
                            pie: {
                                innerSize: 100,
                                depth: 45
                            }
                        },
                        series: 
                        donut
                    });*/

                 $("#wait").css("display", "none");
                 $("#detail_tbl").DataTable();

  
                }
              });
           

        });
        
    });
    </script>