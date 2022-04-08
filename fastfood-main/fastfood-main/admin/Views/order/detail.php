<div class="panel-header panel-header-sm">
</div>
<div class="content">
    <div class="card">
        <div class="card-header">
            <h5 class="card-category">Chi tiết hóa đơn</h5>
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
                                Tên món
                            </th>
                            <th>
                                Số lượng
                            </th>                       
                            <th>
                                Giá
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sumMoney = 0;
                        foreach ($detailBill as $key => $value) {
                            $money = $value['Price']- $value['Price']*($value['Percent']/100);
                            $money = $money *$value['Number'];
                            $sumMoney = $sumMoney + $money;
                        ?>
                            <tr>
                                <td>
                                    <?php echo $key + 1; ?>
                                </td>
                                <td>
                                    <?php echo $value['Name']; ?>
                                </td>
                                <td>
                                    <?php echo $value['Number']; ?>
                                </td>
                                <td>
                                    <?php echo $money; ?> (Giảm giá: <?php echo $value['Percent']; ?>%)
                                </td>
                            </tr>
                        <?php } ?>
                        <tr>
                            <td></td>
                            <td></td>
                            <td style=" text-align: right; ">Tổng cộng:</td>
                            <td><?php echo $sumMoney; ?></td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>