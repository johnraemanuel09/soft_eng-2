<!--
=========================================================
* Material Dashboard 2 - v3.0.4
=========================================================

* Product Page: https://www.creative-tim.com/product/material-dashboard
* Copyright 2022 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<?php
include '../../includes/session.php';
// End Session
include '../../includes/head.php';
?>

<title>
  Teacher Lists
</title>

<body class="g-sidenav-show  bg-gray-200">

  <!-- sidebar -->
  <?php include "../../includes/sidebar.php"?>
  <!-- End sidebar -->

  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <?php include "../../includes/navbar.php"?>
    <!-- End Navbar -->
    <div class="container-fluid py-4">

      <div class="row mt-4">
        <div class="col-12">
          <div class="card px-4 pb-4">

            <h5 class="mb-0 pt-4">Teacher List</h5>

            <div class="table-responsive">
              <table class="table table-flush" id="datatable-search">
                
                <thead class="thead-light">
                  <tr>
                    <th>Image</th>
                    <th>Fullname</th>
                    <th>Username</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
$listteacher = mysqli_query($db, "SELECT *, CONCAT(tbl_teacher.firstname, ' ', tbl_teacher.lastname) AS fullname FROM tbl_teacher
                  ");
while ($row = mysqli_fetch_array($listteacher)) {
    $id = $row['teacher_id'];
    ?>
                    <tr>
                      <td>
                        <?php if (empty($row['img'])) {
        echo '<img class="border-radius-lg shadow-sm zoom" style="height:80px; width:80px;" src="../../assets/img/image.png"/>';
    } else {
        echo ' <img class=" border-radius-lg shadow-sm zoom" style="height:80px; width:80px;" src="data:image/jpeg;base64,' . base64_encode($row['img']) . '" "/>';
    }?>
                      </td>
                      <!-- <td class="text-sm font-weight-normal"><?php echo $row['stud_no']; ?></td> -->
                      <td class="text-sm font-weight-normal"><?php echo $row['fullname']; ?></td>
                      <td class="text-sm font-weight-normal"><?php echo $row['username']; ?></td>
                      <?php if ($_SESSION['role'] == "Super Administrator" || $_SESSION['role'] == "Admin") {?>
                      <td class="text-sm font-weight-normal">
                        <a class="btn btn-link text-danger text-gradient px-3 mb-0" href="javascript:;" data-bs-toggle="modal" data-bs-target="#deleteTeacher<?php echo $id; ?>"><i class="material-icons text-sm me-2"  >delete</i>Delete</a>
                      </td>
                      <?php }?>
                    </tr>
                    <div class="modal fade" id="deleteTeacher<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                          <div class="modal-header">

                            <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <div class="py-3 text-center">
                              <i class="fas fa-trash-alt text-9xl"></i>
                              <h4 class="text-gradient text-danger mt-4">
                                Delete Account!</h4>
                              <p>Are you sure you want to delete
                                <br>
                                <i><b><?php echo $row['firstname']; ?></b></i>?
                              </p>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                            <a href="teacher-del.php?teacher_id=<?php echo $id; ?>"><button type="button" class="btn bg-gradient-danger" >Delete</button></a>
                          </div>
                        </div>
                      </div>
                    </div>
                  <?php }?>
                </tbody>

              </table>
            </div>
          </div>
        </div>

      </div>
      <?php include "../../includes/footer.php"?>
  </main>
  <?php include "../../includes/fixed-plugin.php"?>
  <!--   Core JS Files   -->
  <?php include "../../includes/script.php"?>
</body>

</html>