<div class="panel-header panel-header-sm">
</div>
<div class="card">
    <div class="card-header">
        <h5 class="card-category">Quản lý</h5>
        <h4 class="card-title">Cửa hàng</h4>
        <a href="./cuahang/them">
            <i class="now-ui-icons ui-1_simple-add"></i> Thêm cửa hàng
        </a><br/>
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
                            Cửa hàng
                        </th>
                        <th>
                            Địa chỉ chi nhánh
                        </th>
                        <th>
                            Quản lý
                        </th>
                        <th>
                            Chức năng
                        </th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($allStores as $key => $value){ ?>
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
                            <?php echo $value['UserName']; ?>
                        </td>
                        <td>
                            <div class="btn-group dropleft" style="">
                                <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Chức năng
                                </button>
                                <div class="dropdown-menu" style="">
                                    <!-- Dropdown menu links -->
                                    <a href="./cuahang/sua/<?php echo $value['ID']; ?>" style="color: black;"><button class="dropdown-item" type="button">Sửa</button></a>
                                    <a href="./cuahang/xoa/<?php echo $value['ID']; ?>" style="color: black;"><button class="dropdown-item" href="#" type="button">Xóa</button></a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>