<?php 
    include('header.php');
    include('./topbar.php')
?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Feedbacks</h1>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Customer's feedbacks</h6>
                        </div>
                        
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    
                                    <thead>
                                        <tr>
                                            <th id="th-fb-id">ID</th>
                                            <th id="th-fb-name">Họ và tên</th>
                                            <th id="th-fb-mail">Email</th>
                                            <th id="th-fb-game">Game</th>
                                            <th id="th-fb-rate">Đánh giá</th>
                                            <th id="th-fb-text">Nội dung</th>
                                            <th id="th-fb-opt">Tùy chọn</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>                                                                             
                                    <?php                                    
                                        foreach ($feedbacks as $feedback) {
                                            $fbUser = $userDAO->getUserByID($feedback->getUserID());
                                            $fbProduct = $productDAO->getProductByID($feedback->getProductID());
                                        ?>
                                            <td><?php echo $feedback->getUserID() ?></td>
                                            <td><?php echo $fbUser->getFullname() ?></td>
                                            <td><?php echo $fbUser->getEmail() ?></td>
                                            <td><?php echo $fbProduct->getName() ?></td>
                                            <td><?php echo $feedback->getRating() ?></td>
                                            <td><?php echo $feedback->getText() ?></td>
                                            <td><a href="https://dsgobruh.000webhostapp.com/Controller/RemoveFeedback.php?uid=<?php echo $feedback->getUserID() ?>&pid=<?php echo $fbProduct->getID() ?>"><button id="btn-contact-delete">Xóa</button></a></td>                                           
                                        </tr>      
                                    <?php 
                                        } 
                                    ?>                                 
                                    </tbody>

                                </table>
                            </div>
                        </div>
                        
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>