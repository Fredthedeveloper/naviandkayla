<?php
session_start();
include("config.php");

if (!isset($_SESSION["name"])) {
header("Location: adminlogin.php", "_SELF");
}
else{
$name=$_SESSION["name"];


$get_user="SELECT * FROM adminlogin WHERE name='$name'";
$run_user=mysqli_query($conn, $get_user);


$row_user=mysqli_fetch_array($run_user);

$name=$row_user["name"];





?>
<?php

include("config.php");

$errMsg="";
$succMsg="";




if (isset($_POST["submit"])) {

    $productimage=$_FILES["productimage"]["name"];




    


$imgFolderbanner="imgFolderbanner";


if (!file_exists($imgFolderbanner)) {
    mkdir($imgFolderbanner);
}

$temp_file=$_FILES["productimage"]["tmp_name"];

$allowed_format = array("jpg" ,"png", "jpeg","PNG");
$targetFilePath=($imgFolderbanner . basename($productimage));
$file_type=pathinfo($targetFilePath, PATHINFO_EXTENSION);



if (empty($productimage)) {
    echo "<script>alert('Field empty')</script>";
}
elseif (!in_array ($file_type, $allowed_format)) {
echo "<script>alert('invalid file format')</script>";
}

else{

move_uploaded_file($temp_file, "$imgFolderbanner/$productimage");


$insert_reg="INSERT INTO  banner ( productimage ) VALUES('$productimage')";
$run_reg=mysqli_query($conn,$insert_reg);

if ($run_reg) {
        $succMsg="your product has been added to Navi&Kayla";

        header("Location: editbanner.php");
        exit;
    }
   

    }
}


?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="naviicon.png">
    <title>NAVI&KAYLA ADMIN</title>
    <!-- Bootstrap Core CSS -->
    <link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="css/colors/red.css" id="theme" rel="stylesheet">
    <link href="css/style2.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header card-no-border">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-toggleable-sm navbar-light">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                 <div class="navbar-header">
                    <a class="navbar-brand" href="index.html">
                        <!-- Logo icon -->
                        <b>
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="titled-1.fw.png" alt="homepage" class="dark-logo" />
                            
                        </b>
                        <!--End Logo icon -->
                    
                    </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto mt-md-0 ">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                        <li class="nav-item hidden-sm-down">
                            <form class="app-search p-l-20">
                                <input type="text" class="form-control" placeholder="Search for..."> <a class="srh-btn"><i class="ti-search"></i></a>
                            </form>
                        </li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">
                        <li class="nav-item dropdown">
                              <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="navi2.png" alt="user" class="profile-pic m-r-5" /><?php echo "$name";?></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                       <li>
                            <a href="index.php" class="waves-effect"><i class="fa fa-clock-o m-r-10" aria-hidden="true"></i>Dashboard</a>
                        </li>
                        <li>
                            <a href="cart.php" class="waves-effect"><i class="fa fa-desktop m-r-10" aria-hidden="true"></i>Cart</a>
                        </li>
                        <li>
                            <a href="Edit.php" class="waves-effect"><i class="fa  fa-edit (alias) m-r-10" aria-hidden="true"></i>Edit plastic products</a>
                        </li>
                        <li>
                            <a href="order.php" class="waves-effect"><i class="fa  fa-paper-plane-o m-r-10" aria-hidden="true"></i>Orders</a>
                        </li>
                        <li>
                            <a href="editceramic.php" class="waves-effect"><i class="fa  fa-edit (alias) m-r-10" aria-hidden="true"></i>Edit Ceramic products</a>
                        </li>
                        <li>
                            <a href="Customers.php" class="waves-effect"><i class="fa  fa-users m-r-10" aria-hidden="true"></i>Customers</a>
                        </li>
                          <li>
                            <a href="editslide.php" class="waves-effect"><i class="fa  fa-edit (alias) m-r-10" aria-hidden="true"></i>Edit Slideshow</a>
                        </li>
                         <li>
                            <a href="editwooden.php" class="waves-effect"><i class="fa  fa-edit (alias) m-r-10" aria-hidden="true"></i>Edit Wooden</a>
                        </li>
                        <li>
                            <a href="editlatestproducts.php" class="waves-effect"><i class="fa  fa-edit (alias) m-r-10" aria-hidden="true"></i>Edit latest products </a>
                        </li>
                         <li>
                            <a href="edittopselling.php" class="waves-effect"><i class="fa  fa-edit (alias) m-r-10" aria-hidden="true"></i>Edit Top Selling </a>
                        </li>
                        <li>
                            <a href="editbanner.php" class="waves-effect"><i class="fa  fa-edit (alias) m-r-10" aria-hidden="true"></i>Edit Banner </a>
                        </li>
                        <li>
                            <a href="editother.php" class="waves-effect"><i class="fa  fa-edit (alias) m-r-10" aria-hidden="true"></i>Edit Other</a>
                        </li>
                         <li>
                            <a href="edittoday.php" class="waves-effect"><i class="fa  fa-edit (alias) m-r-10" aria-hidden="true"></i>Edit Today's Deal</a>
                        </li>
                                                 <li>
                            <a href="total.php" class="waves-effect"><i class="fa  fa-edit (alias) m-r-10" aria-hidden="true"></i>confirm total</a>
                        </li>
                      
                      
                    </ul>
                   
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-6 col-8 align-self-center">
                        <h3 class="text-themecolor m-b-0 m-t-0">Edit Banner</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Edit Banner on the home page,Quality images with colors that rhyme with Navi&Kayla website</li>
                        </ol>
                    </div>
                   
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- column -->
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-block">
                                <h4 class="card-title">Add new banner!,
                                Michael: You can only add one banner at a time so delete the previous one if you want a new banner</h4>
                               

                               <form class="form_admin" method="POST" enctype="multipart/form-data">
                                            <?php
            if ($errMsg=="") {
                echo "";
            }
            else{

                echo "<div class='alert alert-danger'>
                $errMsg
            </div>";
            }





            ?>

                        <?php
            if ($succMsg=="") {
                echo "";
            }
            else{

                echo "<div class='alert alert-success'>
                $succMsg
            </div>";


            }





            ?>






                                    <div class="form-row">
                                       

                                              <label >Product Photo</label>
                                            <input type="file" class="form-control-file" name="productimage">
                                     </div>

                                        <div class="form-group col-md-6">
                                      <button type="submit" class="btn btn-primary" name="submit" onclick="return mess();">Add to Navi&Kayla</button>
                                  </div>
                                 </form>
                                 <script type="text/javascript">
                                     function mess(){
                                    alert("your record is sucessfully saved");
                                    return true;
                                     }
                                 </script>


                                 

                                <div class="table-responsive">

                                  

                                   
                                      

                                    <table class='table'>
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Product Image</th>
                                            </tr>
                                            </thead>

                                            <?php

                                    include ("config.php");
                                    // Attempt select query execution
                                    $sql = "SELECT * FROM  banner";
                                    $result = mysqli_query( $conn, $sql);

                                    while($row = mysqli_fetch_array($result)){
                                                ?>

                                       
                                       <tbody>
                                        <tr>
                                          <td><?php echo $row['id']; ?> </td>

                                          <td><?php echo $row['productimage']; ?> </td>


                                            <td><a href="deletebanner.php?id=<?php echo $row['id'];?>">DELETE</a></td>
                                               



                                           </tr>
                                          
                                        </tbody>
                                        <?php
                                    }
                                        ?>

                                   
                                    </table>
                                
                                    
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center">
                © 2020 Navi Admin By FredtheDev{ALFRED}
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="../assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../assets/plugins/bootstrap/js/tether.min.js"></script>
    <script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="../assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.min.js"></script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="../assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
</body>

</html>


<?php } ?>