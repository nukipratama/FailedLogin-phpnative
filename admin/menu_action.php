<?php
include 'header.php';
function item($id)
{
    try {
        require 'script/db.php';
        $dbQuery = $dbConn->prepare("SELECT * FROM `item` WHERE id=?");
        $dbQuery->bind_param("i", $id);
        $dbQuery->execute();
        $result = $dbQuery->get_result();
        $dbQuery->close();
        // $array = [];
        $key = 0;
        if ($result->num_rows === 1) {
            $dbGet = $result->fetch_assoc();
        } else {
            return 'no data';
        }
        return $dbGet;
    } catch (Exception $e) {
        return 'Database Error';
    }
}
if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    ?>
<script>
var check = prompt("Please enter Menu ID number below");
if (check != '') {
    window.location = "menu_action.php?id=" + check;
} else {
    alert('Wrong ID!');
    window.location = "index.php";
}
</script>
<?php
}

?>
<section id="main-content">
    <section class="wrapper">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card p-3">
                    <h1 class="text-center"><i class="fas fa-cogs"></i></h1>
                    <h4 class="text-center">Edit Menu (Item ID = <?=$id?>)</h4>
                    <div class="form-group row justify-content-center">
                        <div class="col-sm-4">
                            <img src="<?=item($id)['image']?>" alt="" class="card-img">
                        </div>
                    </div>
                    <form action="script/update.php?id=<?=$id?>" method="post" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input name="name" type="text" class="form-control" id="inputEmail3"
                                    value="<?=item($id)['name']?>" placeholder="Item Name" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">Price</label>
                            <div class="col-sm-10">
                                <input name="price" type="number" class="form-control" id="inputPassword3"
                                    value="<?=item($id)['price']?>" placeholder="Item Price / Qty" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">Quantity</label>
                            <div class="col-sm-10">
                                <input name="qty" type="number" class="form-control" id="inputPassword3"
                                    value="<?=item($id)['qty']?>" placeholder="Item Quantity" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Category</label>
                            <div class="col-sm-10">
                                <input name="category" type="text" class="form-control" id="inputEmail3"
                                    value="<?=item($id)['category']?>" placeholder="Item Category" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Image</label>
                            <div class="col-sm-10">
                                <input type="file" class="btn btn-info w-100" name="image" id="Filegambar"
                                    placeholder="Browse.." required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <a href="script/delete.php?id=<?=item($id)['id']?>"
                                    class="btn btn-danger text-center w-100">Delete Item</a>
                            </div>
                            <div class="col-sm-6">
                                <button type="submit" class="btn btn-success text-center w-100">Update Item</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</section>
<?php
include 'footer.php';