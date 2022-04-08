<div class="panel-header panel-header-sm">
</div>
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Danh sách hóa đơn</h3>
                    <a href="./user/them">
                        <i ></i>  
                    </a><br/>
                    <p>Hiện tại đang có <?php echo count($allOrder); ?> hóa đơn chưa hoàn thành</p>
                    <i style="color: red;">
                        <?php echo $message??""; ?>
                    </i>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" style="overflow: hidden;">
                            <thead class=" text-primary">
                                <tr>
                                    <th>
                                        STT
                                    </th>
                                    <th>
                                        Tên khách hàng
                                    </th>
                                    <th>
                                        Địa chỉ
                                    </th>
                                    <th>
                                        Số điện thoại
                                    </th>
                                    <th>
                                        Trạng thái
                                    </th>
                                    <th>
                                        Chức năng
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $permission = array();
                                $permission["1"] = [1,2,4];
                                $permission["2"] = [1,2,4,3];
                                $permission["3"] = [1,2,4];
                                $permission["4"] = [1,2,5,3];
                                $permission["5"] = [1,2,5];
                                $permission["6"] = [1,2,3];
                                $permission["7"] = [1,2,4];
                            ?>
                            <?php foreach($allOrder as $key=>$value){ ?>
                                <tr style="">
                                    <td>
                                        <?php echo $key+1; ?>
                                    </td>
                                    <td>
                                        <?php echo $value['Name']; ?>
                                    </td>
                                    <td>
                                        <?php echo $value['Address']; ?>
                                    </td>
                                    <td>
                                        <?php echo $value['NumberPhone']; ?>
                                    </td>
                                    <td>
                                        <?php echo $value['Status']; ?>
                                    </td>
                                    <td>
                                        <div class="btn-group dropleft" style="position: static;">
                                            <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Chức năng
                                            </button>
                                            <div class="dropdown-menu">
                                                <!-- Dropdown menu links -->
                                                <a style="color: black;" href="./chitiethoadon/<?php echo $value["ID"]; ?>"><button class="dropdown-item" type="button">Chi tiết</button></a>
                                                <?php foreach($allStatus as $valuestatus){ 
                                                    if(($valuestatus['ID']== 7 && !in_array($_SESSION['user']['Role'],[1,2])))
                                                        continue;
                                                    if(in_array($_SESSION['user']['Role'],$permission[$valuestatus['ID']])){
                                                        if($value['orID'] >= $valuestatus['ID']){
                                                    ?>
                                                        <a href="./hoadon/trangthai/<?php echo $value['ID']."/".$valuestatus['ID']; ?>" style="color: black;display:none;"><button class="dropdown-item" href="#" type="button"><?php echo $valuestatus['Name']; ?></button></a>
                                                    <?php 
                                                        }else{
                                                    ?>
                                                        <a href="./hoadon/trangthai/<?php echo $value['ID']."/".$valuestatus['ID']; ?>" style="color: black;"><button class="dropdown-item" href="#" type="button"><?php echo $valuestatus['Name']; ?></button></a>
                                                    <?php
                                                        }
                                                    }
                                                } ?>
                                            </div>
                                        </div>
                                    </td>
                                </tr>                               
                                <?php } ?>
                                <?php if(count($allOrder)<4){ ?>
                                <tr><td style="border: 0px;"></td></tr>
                                <tr><td style="border: 0px;"></td></tr>
                                <tr><td style="border: 0px;"></td></tr>
                                <tr><td style="border: 0px;"></td></tr>
                                <tr><td style="border: 0px;"></td></tr>
                                <tr><td style="border: 0px;"></td></tr>
                                <tr><td style="border: 0px;"></td></tr>
                                <tr><td style="border: 0px;"></td></tr>
                                <tr><td style="border: 0px;"></td></tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>