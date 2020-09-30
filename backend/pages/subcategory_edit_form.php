<?php 
    session_start();

    if (isset($_SESSION['user']) && $_SESSION['user']['User_approval']==1 && ($_SESSION['user']['Role']=="ADMIN" || $_SESSION['user']['Role']=="MANAGER" || $_SESSION['user']['Role']=="SELLER")) {

	include 'dbconnection/dbconnect.php';

    $id = $_GET['subcategoryid'];

    $sql = "SELECT * FROM subcategories WHERE Subcategory_id=:id";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $subcategory = $stmt->fetch(PDO::FETCH_ASSOC);

    include 'include/header.php';
?>

	<!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            	<div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">Subcategory Edit</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item active">Subcategory Edit
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">

                <!-- Form start -->
                <div class="row match-height">
                    <div class="col-md-6 col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Subcategory Form</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <form method="POST" action="subcategory_edit.php" enctype="multipart/form-data" class="form form-horizontal">
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <span>Code Number</span>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="text" name="Subcategory_id" value="<?= $subcategory['Subcategory_id'] ?>" class="form-control" required data-validation-required-message="This Code name field is required" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <span>Subcategory Image</span>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <label class="btn btn-icon btn-icon rounded-circle btn-warning mr-1 mb-1 waves-effect waves-light cursor-pointer" for="image-upload"><i class="feather icon-image"></i></label>
                                                            <input type="file" id="image-upload" name="Subcategory_image" hidden>
                                                            <p class="text-muted ml-75 mt-50"><small>Allowed JPG, GIF or PNG. Max
                                                                size of
                                                                800kB</small></p>
                                                            <img src="<?= $subcategory['Subcategory_image'] ?>" height="100" width="120" class="img-thumbnail mt-3">
                                                            <input type="hidden" name="Subcategory_old_image" value="<?= $subcategory['Subcategory_image'] ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <span>Subcategory Name</span>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="text" name="Subcategory_name" value="<?= $subcategory['Subcategory_name'] ?>" class="form-control" placeholder="Type the subcategory's name" required data-validation-required-message="This name field is required">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <span>Choose Category</span>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="form-group">
                                                                <select name="Category_id" class="select2 form-control" required>
                                                                    <?php 

                                                                        $sql = "SELECT * FROM categories";
                                                                        $stmt = $pdo->prepare($sql);
                                                                        $stmt->execute();
                                                                        $categories=$stmt->fetchALL();
                                                                        foreach ($categories as $category) {
                                                                    ?>

                                                                    <option value="<?= $category['Category_id'] ?>" <?php if ($subcategory['Category_id']==$category['Category_id']) { echo "selected"; } ?> ><?= $category['Category_name'] ?></option>

                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-8 offset-md-4">
                                                    <button type="submit" class="btn btn-round btn-primary mr-1 mb-1">Update</button>
                                                    <button type="reset" class="btn btn-round btn-outline-warning mr-1 mb-1">Reset</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Form end -->

            </div>
        </div>
    </div>
    <!-- END: Content-->

<?php 
    include 'include/footer.php';

    } else {

        header("location:page_not_authorized.php");
    }
?>