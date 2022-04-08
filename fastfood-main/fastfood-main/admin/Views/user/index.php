<div class="panel-header panel-header-sm">
      </div>
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Danh sách tài khoản</h4>
                    <?php if($_SESSION['user']['Role']==1){ ?>
                    <a href="./user/them">
                        <i class="now-ui-icons ui-1_simple-add"></i> Thêm tài khoản
                    </a><br/>
                    <?php } ?>
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
                                        Tên
                                    </th>
                                    <th>
                                        Tên tài khoản
                                    </th>
                                    <th>
                                        Chức vụ
                                    </th>
                                    <th>
                                       Chức năng
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($allUser as $key=>$value) {?>
                                <tr>
                                    <td>
                                        <?php echo $key+1; ?>
                                    </td>
                                    <td>
                                        <?php echo $value['Name']; ?>
                                    </td>
                                    <td>
                                        <?php echo $value['UserName']; ?>
                                    </td>
                                    <td>
                                        <?php echo $value['RoleName']; ?>
                                    </td>
                                    <td>
                                        <div class="btn-group dropleft" style="">
                                            <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Chức năng
                                            </button>
                                            <div class="dropdown-menu">
                                                <!-- Dropdown menu links -->
                                                <?php if($_SESSION['user']['Role']==1){ ?>
                                                <a href="./user/sua/<?php echo $value['ID']; ?>" style="color: black;"><button class="dropdown-item"type="button">Sửa</button></a>

                                                <a href="./user/xoa/<?php echo $value['ID']; ?>" style="color: black;"><button class="dropdown-item" href="#" type="button">Xóa</button></a>
                                                <?php } ?>
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
        </div>
    </div>
</div>