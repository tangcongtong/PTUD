<div class="panel-header panel-header-sm">
</div>
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">Sửa tài khoản</h5>
                </div>
                <i style="color:red;">
                    <?php echo $message??""; ?>
                </i>
                <div class="card-body">
                    <form method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6 pr-1">
                                <div class="form-group">
                                    <label>Tên tài khoản</label>
                                    <input type="text" class="form-control" placeholder="Tên tài khoản" value="<?php echo $userName??""; ?>" name="userName">
                                </div>
                            </div>
                            <div class="col-md-6 pl-1">
                                <div class="form-group">
                                    <label>Họ tên</label>
                                    <input type="text" class="form-control" placeholder="Họ và tên" name="name" value="<?php echo $name??""; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label>Mật khẩu</label>
                                    <input type="password" class="form-control" placeholder="Mật khẩu (Nếu không thay đổi thì để trống)" name="password" value="">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Chức vụ</label>
                                    <select class="form-control" id="exampleFormControlSelect1" name="IDRole">
                                        <?php foreach($allRoles as $key => $value){ 
                                            if($userRole != 1 && $key==0 || $userRole != 2 && $key == 1 && $userRole != 1){
                                                continue;
                                            }    
                                        ?>
                                            <option <?php echo ($IDRole??"")==$value['ID']?"selected='selected'":""; ?> value="<?php echo $value['ID']; ?>"><?php echo $value['RoleName']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                <label>Chi nhánh</label>
                                        <select class="form-control" id="exampleFormControlSelect1" name="IDStore">
                                            <?php foreach($allStore as $value){ ?>
                                                <option <?php echo ($IDStore??"")==$value['ID']?"selected='selected'":""; ?> value="<?php echo $value['ID']; ?>"><?php echo "{$value['StoreName']} ({$value['Address']})"; ?></option>
                                            <?php } ?>
                                        </select>
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