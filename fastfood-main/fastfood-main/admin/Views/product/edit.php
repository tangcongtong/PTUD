<div class="panel-header panel-header-sm">
</div>
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">Sửa sản phẩm</h5>
                </div>
                <i style="color:red;">
                    <?php
                        echo $message??"";
                    ?>
                </i>
                <div class="card-body">
                    <form method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6 pr-1">
                                <div class="form-group">
                                    <label>Tên sản phẩm</label>
                                    <input type="text" class="form-control" placeholder="Tên sản phẩm" value="<?php echo $productName??"";?>" name="name">
                                </div>
                            </div>
                            <div class="col-md-6 pl-1">
                                <div class="form-group">
                                    <label>Giá</label>
                                    <input type="number" class="form-control" placeholder="Giá" name="price" value="<?php echo $price??"";?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Danh mục</label>
                                    <select class="form-control" id="exampleFormControlSelect1" name="category">
                                        <?php foreach($allCategory as $value){ ?>
                                        <option <?php echo ($IDCategory??"")==$value['ID']?"selected='selected'":""; ?> value="<?php echo $value['ID']; ?>"><?php echo $value['Name']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="exampleFormControlSelect1">Chọn hình ảnh</label>
                                <div class="custom-file" id="customFile" lang="es">
                                        <input type="file" name="fileUpload" class="custom-file-input" id="exampleInputFile" aria-describedby="fileHelp" value="">
                                        <label class="custom-file-label" for="exampleInputFile">
                                        Select file...
                                        </label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <img id="imageEdit" width="100px" src="<?php echo $Image??""; ?>" />
                                <input name="image" type="hidden" value="<?php echo $Image??""; ?>" />
                            </div>
                        </div>
                        <button class="btn btn-danger">Sửa</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.querySelector('.custom-file-input').addEventListener('change',function(e){
        var fileName = document.getElementById("exampleInputFile").files[0].name;
        var nextSibling = e.target.nextElementSibling;
        nextSibling.innerText = fileName;
        document.querySelector("#imageEdit").src = URL.createObjectURL(document.querySelector("#exampleInputFile").files[0]);
    });
</script>