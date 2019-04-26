<?php
include 'header.php';
?>
<section id="main-content">
    <section class="wrapper">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card p-3">
                    <h1 class="text-center"><i class="fas fa-plus-circle"></i></h1>
                    <h4 class="text-center">Add Menu</h4>
                    <form action="script/insert.php" method="post" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input name="name" type="text" class="form-control" id="inputEmail3"
                                    placeholder="Item Name" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">Price</label>
                            <div class="col-sm-10">
                                <input name="price" type="number" class="form-control" id="inputPassword3"
                                    placeholder="Item Price / Qty" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">Quantity</label>
                            <div class="col-sm-10">
                                <input name="qty" type="number" class="form-control" id="inputPassword3"
                                    placeholder="Item Quantity" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Category</label>
                            <div class="col-sm-10">
                                <input name="category" type="text" class="form-control" id="inputEmail3"
                                    placeholder="Item Category" required>
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
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-success text-center w-100">Submit Menu</button>
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