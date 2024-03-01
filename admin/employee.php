<?php
include('../database.php');
include("check_session.php");

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>HR | Dashboard</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!---delete  sweetealert ---->
    <link rel="stylesheet" href="plugins/sweetalert2/sweetalert2.min.css">
    <?php
    include("header.php");
    ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <!---------- delete query in user table --------------->
    <?php
    if (isset($_GET['id'])) {

        if ($_GET['action'] == 'delete') {

            $emp_id = $_GET['id'];

            $sql = "DELETE FROM `user` WHERE id = '$emp_id'";
            $result = mysqli_query($data, $sql);
        }
    } else {
        echo " fdf ";
    }
    ?>
    <!------------------update query user table ----------->
    <?php
    if (isset($_POST['update_user'])) {

        $name = $_POST['emp_name'];
      
        $email = $_POST['emp_email'];
        $contact = $_POST['emp_contact'];
        $is_admin = $_POST['is_admin'];
        $user_id = $_POST['user_id'];

        $sql = "UPDATE user SET name = '$name' ,email ='$email' ,mobile_number ='$contact', is_admin ='$is_admin' 
        WHERE id = '$user_id'";
        $result = mysqli_query($data, $sql);

        echo '<script>
             setTimeout(function() {
                 Swal.fire({
                     title: "Success !",
                     text: "updated Employee!",
                     type: "success"
                   }).then(function() {
                       window.location = "employee.php";
                   });
             }, 30);
         </script>';
    } else {
        echo "update note success";
    }


    ?>
<!-------------insert employees in user table ----------------->
    <?php
    if (isset($_POST['add_employee'])) {
        // $id = $_POST['emp_id'];
        $name = $_POST['emp_name'];
        $pass = md5($_POST['emp_password']);
        $email = $_POST['emp_email'];
        $contact = $_POST['emp_contact'];
        $is_admin = $_POST['is_admin'];

        $query = "INSERT INTO user(name, email, password, mobile_number, is_admin) VALUES ('$name','$email','$pass','$contact', $is_admin)";
        $resquery = mysqli_query($data, $query);

        echo '<script>
             setTimeout(function() {
                 Swal.fire({
                     title: "Success !",
                     text: "New Employee has been Added!",
                     type: "success"
                   }).then(function() {
                       window.location = "employee.php";
                   });
             }, 30);
         </script>';
    }

    ?>
    <div class="wrapper">

        <nav class="main-header navbar navbar-expand navbar-white navbar-light">

            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <form class="form-inline ml-3">
                <div class="input-group input-group-sm">

                </div>
            </form>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="fas fa-user"></i>
                        <span class="hidden-xs"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                      

                        <form method="POST">
                            <a href="index.php"> <button type="button" name="logout" class="dropdown-item dropdown-footer">Logout</button></a>
                        </form>
                    </div>
                </li>
            </ul>
        </nav>



        <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background: #222d32;">

            <a href="home.php" class="brand-link">
                <img src="dist\css\js\img\685933.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3">
                <span class="brand-text font-weight-light">Employ Attendance</span>
            </a>


            <div class="sidebar">
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column text-sm nav-flat nav-legacy nav-compact" data-widget="treeview" role="menu" data-accordion="false">

                        <li class="nav-item">
                            <a href="home.php" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="employee_attendance.php" class="nav-link">
                                <i class="nav-icon far fa-calendar-alt"></i>
                                <p>
                                    Attendance
                                </p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="employee.php" class="nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    Employees
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>

                        </li>

                        <li class="nav-item">
                            <a href="leave.php" class="nav-link">
                                <i class="nav-icon fas fa-briefcase"></i>
                                <p>
                                    Leave Type
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="department.php" class="nav-link">
                                <i class="nav-icon fas fa-briefcase"></i>
                                <p>
                                    department
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="leave_list.php" class="nav-link">
                                <i class="nav-icon fas fa-briefcase"></i>
                                <p>
                                    Leave
                                </p>
                            </a>
                        </li>

                    </ul>
                </nav>

            </div>

        </aside>


        <div class="content-wrapper">
            <div class="content-header">
                <div style="padding-top: 10px;">
                </div>
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Employee List</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                                <li class="breadcrumb-item active">Employee List</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <section class="content">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div align="right">
                                    <button class="btn btn-primary btn-flat" data-toggle="modal" data-target="#modal-default"><i class="fas fa-plus"></i>Add</button>
                                </div><br>
                                <table id="emp_id" class="table table-bordered dataTable no-footer" role="grid" aria-describedby="example1_info">
                                    <thead>
                        <!-------employee add and all data display page-------->                
                                        <tr>
                                            <th>S.No</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>contact</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        $sql = " SELECT * FROM user ";
                                        $result1 = mysqli_query($data, $sql);
                                        $i=1;
                                        while ($row = mysqli_fetch_array($result1)) {

                                        ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                              
                                                <td><?php echo $row['name']; ?></td>
                                                <td><?php echo $row['email']; ?></td>
                                                <td><?php echo $row['mobile_number']; ?></td>
                                                <td>
                                                    <button class="btn btn-success btn-flat emp_edit" data-id="<?php echo $row['id']; ?>"  id=""><i class="fas fa-edit"></i></button>
                                                    <button class="btn btn-danger btn-flat emp_delete"  onclick="delete_leave(<?php echo $row['id']; ?>)"><i class="fas fa-trash"></i></button>
                                                </td>




                                            </tr>
                                        <?php
                                        $i++;
                                        }
                                        ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


        </div>

    </div>

    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Employee</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form method="POST" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label class="col-sm-1 col-form-label"></label>
                            <label class="col-sm-3 col-form-label">Name</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="emp_name" placeholder="Enter First Name" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-1 col-form-label"></label>
                            <label class="col-sm-3 col-form-label">Password</label>
                            <div class="col-sm-7">
                                <input type="password" class="form-control" name="emp_password" placeholder="Enter Password" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-1 col-form-label"></label>
                            <label class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-7">
                                <input type="email" class="form-control" name="emp_email" placeholder="Enter Password" required>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-sm-1 col-form-label"></label>
                            <label class="col-sm-3 col-form-label">Contact</label>
                            <div class="col-sm-7">
                                <input type="number" class="form-control" name="emp_contact" placeholder="Enter Contact Number" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-1 col-form-label"></label>
                            <label class="col-sm-3 col-form-label">Department</label>
                            <div class="col-sm-7">
                                <select name="department" class="form-control" required>
                                    <option hidden> - Select -</option>
                                    <?php
                                    $sql = "SELECT * FROM department";
                                    $result = mysqli_query($data, $sql);
                                    while ($row = mysqli_fetch_array($result)) {

                                    ?>
                                        <option value="<?php echo $row['id'];  ?>"><?php echo $row['department']; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-1 col-form-label"></label>
                            <label class="col-sm-3 col-form-label">Admin</label>
                            <div class="col-sm-7">
                                <select name="is_admin" class="form-control" required>
                                    <option value="1"> yes</option>

                                    <option value="0"> no</option>

                                </select>
                            </div>
                        </div>
                </div>

                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-primary btn-flat" data-dismiss="modal"><i class=""></i> Close</button>
                    <button type="submit" class="btn btn-primary btn-flat" name="add_employee"><i class=""></i>Save</button>
                    </form>
                </div>
            </div>


            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <!------------- update user form ---------------------------------->

    <div class="modal fade" id="modal-default-update">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Update User</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form method="POST" id="userForm" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label class="col-sm-1 col-form-label"></label>
                            <label class="col-sm-3 col-form-label">Name</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="emp_name" name="emp_name" placeholder="Enter First Name" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-1 col-form-label"></label>
                            <label class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-7">
                                <input type="email" class="form-control" id="emp_email" name="emp_email" placeholder="Enter Password" required>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-sm-1 col-form-label"></label>
                            <label class="col-sm-3 col-form-label">Contact</label>
                            <div class="col-sm-7">
                                <input type="number" class="form-control" id="emp_contact" name="emp_contact" placeholder="Enter Contact Number" required>
                            </div>
                        </div>
                    
                        <div class="form-group row">
                            <label class="col-sm-1 col-form-label"></label>
                            <label class="col-sm-3 col-form-label">Admin</label>
                            <div class="col-sm-7">
                                <select id="is_admin" name="is_admin" class="form-control" required>
                                    <option value="1"> yes</option>

                                    <option value="0"> no</option>

                                </select>
                            </div>
                        </div>

                        <input type="hidden" name="user_id" id="user_id" />
                </div>

                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default btn-flat" data-dismiss="modal"><i class=""></i> Close</button>
                    <button type="submit" class="btn btn-primary btn-flat" name="update_user"><i class=""></i>Update</button>
                    </form>
                </div>
            </div>

            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    </div>




    </div>


    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="plugins/datatables/jquery.dataTables.js"></script>
    <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>

    <!--- delete -->
    <script src="plugins/sweetalert2/sweetalert2.min.js"></script>
  <!--------- delete confirm  concept -------------------------->
    <script>
        function delete_leave(id) { 
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                console.log(result)
                if (result.value) {
                    window.location.href = 'employee.php?id=' + id + '&action=delete';
                }
            });
            
        }
    
    </script>
    <script>
//<------- update user table condition ---------->    

    $('.emp_edit').click(function() {
        var id = $(this).data("id");
        $.ajax({
            url:'get_employee.php',
            method:"POST",
            data:{id:id},
            dataType:"json",
            success:function(data){  
                var result = data;   
                console.log(result);  
                var item = result.record;      
                $("#modal-default-update").on("shown.bs.modal", function () { 
                    $('#userForm')[0].reset();
                    
                    $('#emp_name').val(item['name']);
                    $('#emp_email').val(item['email']);
                    $('#emp_contact').val(item['mobile_number']);
                  
                    $('#is_admin').val(item['is_admin']);    
                    $('#user_id').val(item['id']);    
                    

                    $('.modal-title').html("<i ></i> Update User");
                  
                    $('#save').val('Save');

                }).modal({
                    backdrop: 'static',
                    keyboard: false
                });         
            }
        });
    });
    
    </script>

    <script>
            $(function() {
                $("#emp_id").DataTable();
                /* $('#example2').DataTable({
                    "paging": true,
                    "lengthChange": false,
                    "searching": false,
                    "ordering": true,
                    "info": true,
                    "autoWidth": false,
                }); */
            });
        </script>

    <?php
    // include("footer.php");
    ?>
</body>

</html>