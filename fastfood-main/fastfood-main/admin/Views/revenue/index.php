<div class="panel-header panel-header-sm">
</div>
<div class="card">
    <div class="card-header">
        <h5 class="card-category">Doanh thu</h5>
        <h4 class="card-title"> Doanh thu theo cửa hàng</h4>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table">
                <thead class=" text-primary">
                    <tr>
                        <th>
                            STT
                        </th>
                        <th>
                            Cửa hàng
                        </th>
                        <th>
                            Địa chỉ chi nhánh
                        </th>
                        <th>
                            Doanh thu
                        </th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                $sumMoneyAll = 0; 
                foreach($revenue as $key => $value){ 
                       $sumMoneyAll = $sumMoneyAll + (int)$value['Sum'];
                ?>
                    <tr>
                        <td>
                            <?php echo $key+1; ?>
                        </td>
                        <td>
                           <?php echo $value['StoreName']; ?>
                        </td>
                        <td>
                            <?php echo $value['Address']; ?>
                        </td>
                        <td>
                            <?php echo number_format($value['Sum']); ?>
                        </td>
                    </tr>
                <?php } ?>
                <tr>
                    <td></td>
                    <td></td>
                    <td>Tổng cộng:</td>
                    <td><?php echo number_format($sumMoneyAll); ?></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>