<div class="panel-header panel-header-sm">
</div>
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">Sửa cửa hàng</h5>
                    <i style="color:red;">
                        <?php echo $message??""; ?>
                    </i>
                </div>
                <i style="color:red;">
                </i>
                <div class="card-body">
                    <form method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6 pr-1">
                                <div class="form-group">
                                    <label>Tên cửa hàng</label>
                                    <input type="text" class="form-control" placeholder="Tên cửa hàng" value="<?php echo $nameStore??""; ?>" name="nameStore">
                                </div>
                            </div>
                            <div class="col-md-6 pl-1">
                                <div class="form-group">
                                    <label>Địa chỉ</label>
                                    <input type="text" class="form-control" placeholder="Địa chỉ" name="address" value="<?php echo $address??""; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label>Tài khoản quản lý</label>
                                    <input type="text" class="form-control" placeholder="Tài khoản quản lý" name="userName" value="<?php echo $userName??""; ?>">
                                </div>
                            </div>

                        </div>
                        <button class="btn btn-danger">Sửa</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>