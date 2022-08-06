<?php 
    include('./header.php');
    $keyword = isset($_REQUEST['search-input']) ? $_REQUEST['search-input'] : '';
    $cateInput = isset($_REQUEST['cate']) ? $_REQUEST['cate'] : '';
    $sortMethod = isset($_REQUEST['sort']) ? $_REQUEST['sort'] : '';
    $productDAO = new ProductDAO();
    if($keyword == ""){
        $products = $productDAO->getAllProducts();
        $products = array_map(function($product) {
            return ['id' => $product->getID(), 'name' => $product->getName(), 'fullprice' => $product->getPrice(), 'price' => $product->getTotalPrice(), 'image' => $product->getImg(), 'sale' => $product->getSale()];
        }, $products);
    } else {
        $products = $productDAO->getProductsByName($keyword);
        $products = array_map(function($product) {
            return ['id' => $product->getID(), 'name' => $product->getName(), 'fullprice' => $product->getPrice(), 'price' => $product->getTotalPrice(), 'image' => $product->getImg(), 'sale' => $product->getSale()];
        }, $products);
    }
?>
<style>
    .paginationjs-pages {
        margin: 3em 0;
    }
    .paginationjs-pages ul {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 1.5em;
    }
</style>
<script src="https://pagination.js.org/dist/2.1.5/pagination.min.js"></script>
<script>
    const totalPros = <?php echo json_encode($products) ?>;
</script>
<section class="main-content">
    <form class="main-search" id="main-search">
        
        <h1>Tìm kiếm sản phẩm</h1><br>
        <div class="product-filter">
            <div class="information-filter">
                <h>Tên</h><br>
                <input value="<?php echo $keyword; ?>" name="keyword" id="keyword">
            </div>
            <div class="information-filter">
                <h>Thể loại</h><br>
                <select name="category" id="category">
                    <option value="-1">All</option>
                    <?php
                        $cates = $cateDAO->getAllCategories();
                        foreach ($cates as $cate) {
                    ?>
                    <option value="<?php echo $cate->getID();?>"><?php echo $cate->getName();?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="information-filter">
                <h>Mức giá</h><br>
                <input type="number" id="min" name="min"  step="10000" min="0" value="0" placeholder="Từ">
                <h>-</h>
                <input type="number" id="max" name="max"  step="10000" min="0" value="50000000" placeholder="Đến">
            </div>
            <div class="information-filter">
                <h>Sắp xếp</h><br>
                <select name="sort" id="sort">
                    <option value="default">Mặc định</option>
                    <option value="newest">Mới cập nhật</option>
                    <option value="hot">Bán chạy nhất</option>
                    <option value="sale">Giảm giá</option>
                    <option value="increase">Giá thấp đến cao</option>
                    <option value="decrease">Giá cao đến thấp</option>
                    <option value="atoz">Từ A - Z</option>
                    <option value="ztoa">Từ Z - A</option>
                </select>
            </div>
            <button type="button" id="btn-filter" onclick="searching(new Event('click'))">Lọc</button><br>
        </form>
        <button type="reset"id="btn-restore"><i>Khôi phục bộ lọc</i></button>
    </div>
    <article class="content-container">
        <?php if(isset($_REQUEST['keyword'])): ?>
            <section class="content-box" style="flex-wrap: wrap;" id="search-page">
                <article class="product-box">
                    <a class="product-box__thumbnail" href="./product.php?id=<?php echo $product->getID(); ?>">
                        <img src="<?php echo $product->getImg(); ?>" alt="product thumbnail">
                    </a>
                    <div class="product-box__detail">
                        <div class="product-box__desc">
                            <div class="product-box__title">
                                <a href="./product.php?id=<?php echo $product->getID(); ?>"><?php echo $product->getName(); ?></a>
                                <div class="tag sale-tag">
                                    -<?php echo $product->getSale(); ?>%
                                </div>
                            </div>
                            <div class="product-box__price">
                                <p class="product-box__totalprice"><?php echo $product->getTotalPrice(); ?></p>
                                <p class="product-box__fullprice"><?php echo $product->getPrice(); ?></p>
                            </div>
                        </div>
                        <a class="product-box__add" href="#">
                            <i class="fal fa-cart-arrow-down"></i>
                        </a>
                    </div>
                </article>
            </section>
        <?php else: ?>
            <section class="content-box" style="flex-wrap: wrap;" id="search-page">
            </section>
            <section class="paginition" id="paginition">
            </section>
        <?php endif; ?>
    </article>
</section>
<?php 
    include('./footer.php') 
?>
<script>
    <?php if($cateInput != '' && $sortMethod != '') { 
        echo "
            headerSearch('$cateInput', '$sortMethod');
        ";
    } else echo '$("#paginition").pagination({
        dataSource: totalPros,
        pageSize: 8,
        callback: function(data, pagination) {
            $("#search-page").empty();
            $.each(data, (index, element) => {
                $("#search-page").append(
                    `<article class="product-box">
                    <a class="product-box__thumbnail" href="./product.php?id=${element.id}">
                        <img src="${element.image}" alt="product thumbnail">
                    </a>
                    <div class="product-box__detail">
                        <div class="product-box__desc">
                            <div class="product-box__title">
                                <a title="" href="./product.php?id=${element.id}">${element.name}</a>
                                <div class="tag sale-tag">
                                    -${element.sale}%
                                </div>
                            </div>
                            <div class="product-box__price">
                                <p class="product-box__totalprice">${moneyFormat(element.price)}</p>
                                <p class="product-box__fullprice">${moneyFormat(element.fullprice)}</p>
                            </div>
                        </div>
                        <a class="product-box__add" onclick="addProductToCart(${element.id})">
                            <i class="fal fa-cart-arrow-down"></i>
                        </a>
                    </div>
                </article>`
                )
            })
        }
    })' ?>
    
</script>