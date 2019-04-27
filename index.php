<?php
include 'header.php';
include 'access.php';
function totalItem()
{
    try {
        require 'script/db.php';
        $dbQuery = $dbConn->prepare("SELECT sum(qty) FROM item");
        $dbQuery->execute();
        $result = $dbQuery->get_result();
        $dbQuery->close();
        if ($result->num_rows === 1) {
            $dbGet = $result->fetch_assoc();
        } else {
            return 'no data';
        }
        return $dbGet['sum(qty)'];
    } catch (Exception $e) {
        return 'Database Error';
    }
}
function item()
{
    try {
        require 'script/db.php';
        $dbQuery = $dbConn->prepare("SELECT * FROM item");
        $dbQuery->execute();
        $result = $dbQuery->get_result();
        $dbQuery->close();
        // $array = [];
        $key = 0;
        if ($result->num_rows >= 1) {
            while ($dbGet = $result->fetch_array()) {
                $array['qty'][$key] = $dbGet['qty'];
                $array['id'][$key] = $dbGet['id'];
                $array['name'][$key] = $dbGet['name'];
                $array['category'][$key] = $dbGet['category'];
                $array['price'][$key] = $dbGet['price'];
                $array['image'][$key] = $dbGet['image'];
                $key++;
            }

        } else {
            return 'no data';
        }
        return $array;
    } catch (Exception $e) {
        return 'Database Error';
    }
}
function itemName($id)
{
    try {
        require 'script/db.php';
        $dbQuery = $dbConn->prepare("SELECT `name` FROM `item` WHERE id=?");
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
        return $dbGet['name'];
    } catch (Exception $e) {
        return 'Database Error';
    }
}
?>
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <div class="row justify-content-center">
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <div class="info-box blue-bg">
                    <i class="fa fa-cubes"></i>
                    <div class="count"><?=totalItem()?></div>
                    <div class="title">Item Left</div>
                </div>
            </div>

            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <div class="info-box dark-bg">
                    <i class="fas fa-list"></i>
                    <div class="count"><?=count(item()['id'])?></div>
                    <div class="title">Total Menu</div>
                </div>
            </div>

            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <div class="info-box green-bg">
                    <i class="fas fa-wifi"></i>
                    <div class="count"><?=ip()?></div>
                    <div class="title">Your Public IP</div>
                </div>
            </div>
        </div>
        <div class="alert alert-primary text-center" role="alert">

            <h4><i class="fas fa-info-circle"></i> Click on Image to do Actions!</h4>
        </div>
        <div class="row text-center">
            <?php
for ($key = 0; $key < count(item()['id']); $key++) {
    ?>
            <div class="col-sm-3 mt-2">
                <div class="card">
                    <a href="menu_action.php?id=<?=item()['id'][$key]?>"><img class="card-img-top"
                            src="<?=item()['image'][$key]?>" alt="Menu Image">
                    </a>
                    <div class="card-body">
                        <h4 class="font-weight-bold card-title"><?=item()['name'][$key]?> (<?=item()['id'][$key]?>)</h4>
                    </div>
                    <ul class="list-group list-group-flush ">

                        <li class="list-group-item">Price : <b>Rp<?=item()['price'][$key]?></b></li>
                        <li class="list-group-item">Quantity : <b><?=item()['qty'][$key]?> Item</b></li>
                        <li class="list-group-item">Category : <b><?=item()['category'][$key]?></b></li>
                    </ul>
                </div>
            </div>
            <?php
}
?>
        </div>



        </div>
        <!-- project team & activity end -->

    </section>

</section>
<!--main content end-->


<?php
include 'footer.php';