      <div class="panel-header panel-header-lg">
        <canvas id="bigDashboardChart"></canvas>
      </div>
      <div class="content">
        <div class="row">         
          <div class="col-lg-12 col-md-12">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-category">2021</h5>
                <h4 class="card-title">Doanh thu tại quán theo ngày</h4>
                <input type="date" id="txtDateRevenue" name="birthdaytime" onchange="txtDateRevenueChange(event);">
                <div class="dropdown">
                  <button type="button" class="btn btn-round btn-outline-default dropdown-toggle btn-simple btn-icon no-caret" data-toggle="dropdown">
                    <i class="now-ui-icons loader_gear"></i>
                  </button>
                  <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                    <a class="dropdown-item text-danger" href="#">Remove Data</a>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div class="chart-area">
                  <canvas id="lineChartExampleWithNumbersAndGrid"></canvas>
                </div>
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i class="now-ui-icons arrows-1_refresh-69"></i> Just Updated
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-category">Doanh thu</h5>
                <h4 class="card-title"> Doanh thu theo loại trong ngày</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                    <th>
                      STT
                    </th>
                      <th>
                        Tên sản phẩm
                      </th>
                      <th>
                        Doanh thu
                      </th>
                    </thead>
                    <tbody>
                      <?php 
                        $sumMoney = 0;
                        foreach($venenueCurentCategory as $key => $value){    
                          $sumMoney = $sumMoney + (int)$value['Sum'];                 
                      ?>
                        <tr>
                          <td>
                            <?php echo $key+1; ?>
                          </td>
                          <td>
                            <?php echo $value['Name']; ?>
                          </td>
                          <td>
                            <?php echo (int)$value['Sum']; ?>
                          </td>
                        </tr> 
                      <?php } ?>   
                      <tr>
                        <td></td>
                        <td style="text-align: right;">Tổng:</td>
                        <td><?php echo $sumMoney; ?></td>
                      </tr>                                                                                
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
<script>
  let date = new Date();
  document.querySelector('#txtDateRevenue').value = date.getFullYear() + "-" + ((date.getMonth() > 8) ? (date.getMonth() + 1) : ('0' + (date.getMonth() + 1))) + "-" + ((date.getDate() > 9) ? date.getDate() : ('0' + date.getDate()));
  function txtDateRevenueChange(e){
    let inputDatetime = e.target.value.toString().replace(/-/g, "");
    let venenueData = [];
    let venenueTime = [];
    $.ajax({
        url: './getVenenue',
        type: 'POST',
        dataType: 'json',
        data: {
          inputDate: inputDatetime,
        }
    }).done(function(result) {
        console.log(result);
        result.forEach(function(entry) {
          venenueData.push(entry.Sum);
          venenueTime.push(entry.Hour);
        });  
        chartVenenue.myChart.data.datasets[0].data = venenueData;
        chartVenenue.myChart.data.datasets[0].labels = venenueTime;
        chartVenenue.myChart.update();
    });

  }
</script>