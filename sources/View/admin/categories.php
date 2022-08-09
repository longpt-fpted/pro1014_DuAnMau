<?php 
    include('header.php');
    include('./topbar.php')
?>

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-0 text-gray-800">Categories</h1>  <br>  
        <div class="modal-overlay" id="modal-overlay"></div>
        <button id="btn-add" onclick="modal_add()">Thêm danh mục</button>
        <div class="modal-add" id="modal-add-form">
            <button id="btn-hidden" onclick="modal_hidden()">x</button>
            <form id="modal-add-cate">
                <p id="modal-add-title">Thêm danh mục</p>
                <span>Tên danh mục</span><br>
                <input type="text" id="name" name="name" onclick="removeErrorName()" placeholder="Tên danh mục"><br>   
                <div id="error-name" class="error-validate"></div>
                <input type="submit" id="category_submit" value="Cập Nhật">
            </form>
        </div>                   
        <div class="show-information">
            <?php
                foreach ($cates as $cate) {
            ?>
            <div class="product-information">
                <div class="detail">
                    <form id="cate-infor">
                        <table>
                            <tr>
                                <input type="text" id="id" name="id" value="<?php echo $cate->getID() ?>" hidden><br>
                            </tr>
                            <tr>
                                <td><span>Tên danh mục:</span></td>
                                <td><input type="text" id="name" name="name" value="<?php echo $cate->getName() ?>"><br>   </td>
                            </tr>
                        </table>
                        <input type="button" id="submit" value="Cập Nhật">
                    </form>
                </div>
            </div>
        <?php } ?>
    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<script src="js/validate-cate.js"></script>
<?php
    include './footer.php'; 
    // include '/XAMPP/htdocs/pro1014_duan/sources/View/admin/footer.php'; 
?>
<script>
    $('#category_submit').click((e) => {
        e.preventDefault();
        if(check()) {
            let data = $('#modal-add-cate').serialize()+"&method=add";
            $.ajax({
                url: 'https://dsgobruh.000webhostapp.com/Controller/AdminCategoryController.php',
                type: 'POST',
                data: data,
            }).done(res => {
                res = JSON.parse(res)
                switch(res.status) {
                    case 'success': 
                        displayNotify('success', "Thêm danh mục thành công!");
                        break;
                    case 'fail':
                        displayNotify('warning', "Thêm danh mục không thành công!");
                        break;
                }
            })
        }
    });
    $('#cate-infor > #submit').each((index, element) => {
        element.addEventListener('click', (event) => {
            let data = $($('form[id=cate-infor]')[index]).serialize()+"&method=update";
            $.ajax({
                url: 'https://dsgobruh.000webhostapp.com/Controller/AdminCategoryController.php',
                type: 'POST',
                data: data,
            }).done(res => {
                res = JSON.parse(res);
                switch(res.status) {
                    case 'success': 
                        displayNotify('success', "Thay đổi tên danh mục thành công!");
                        break;
                    case 'fail':
                        displayNotify('warning', "Thay đổi tên danh mục không thành công!");
                        break;
                }
            })
        })
    });
</script>