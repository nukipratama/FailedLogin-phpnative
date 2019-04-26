<?php
include 'header.php';
$id = $_SESSION['id'];
function profile($id)
{
    try {
        require 'script/db.php';
        $dbQuery = $dbConn->prepare("SELECT * FROM `user` WHERE id=?");
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

?>
<section id="main-content">
    <section class="wrapper">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card p-3">
                    <h1 class="text-center"><i class="fas fa-cogs"></i></h1>
                    <h4 class="text-center">Edit Profile (Username = <?=profile($id)['uname']?>)</h4>

                    <form action="script/update_profile.php" method="post">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input name="name" type="text" class="form-control" id="inputEmail3"
                                    value="<?=profile($id)['name']?>" placeholder="Change Profile Name" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input name="email" type="email" class="form-control" id="inputPassword3"
                                    value="<?=profile($id)['email']?>" placeholder="Change Email Address" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <input name="pword" type="password" class="form-control" id="inputPassword3"
                                    value="<?=profile($id)['pword']?>" placeholder="Change Password" required>
                            </div>
                        </div>

                        <div class="form-group row">

                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-success text-center w-100">Update profile</button>
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