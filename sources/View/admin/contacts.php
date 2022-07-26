<?php 
    include('header.php');
    include('./topbar.php')
?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Contacts</h1>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Customer's Questions</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th id="th-ct-stt">STT</th>
                                            <th id="th-ct-name">Họ và tên</th>
                                            <th id="th-ct-email">Email</th>
                                            <th id="th-ct-time">Tiêu đề</th>
                                            <th id="th-ct-qt">Câu hỏi/ Góp ý</th>
                                            <th id="th-ct-opt">Tùy chọn</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <?php
                                            foreach($contacts as $contact){
                                        ?>
                                        <tr>
                                            <td><?php echo $contact->getID() ?></td>
                                            <td><?php echo $contact->getFullname() ?></td>
                                            <td><?php echo $contact->getEmail() ?></td>
                                            <td><?php echo $contact->getSubject() ?></td>
                                            <td><?php echo $contact->getMessage() ?></td>
                                            <td><a href="http://localhost/pro1014_duan/sources/controller/RemoveContact.php?id=<?php echo $contact->getID() ?>"><button id="btn-contact-delete">Xóa</button></a></td>
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
<?php include 'footer.php'; ?>
