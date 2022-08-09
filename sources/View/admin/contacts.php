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
                                            <th id="th-ct-type">Loại</th>
                                            <th id="th-ct-time">Tiêu đề</th>
                                            <th id="th-ct-qt">Câu hỏi/ Góp ý</th>
                                            <th id="th-ct-opt">Tùy chọn</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <?php
                                            $contactCount = 0;
                                            foreach($contacts as $contact){
                                        ?>
                                        <tr>
                                        <div class="modal-add" id="modal-add-form">
                                            <button id="btn-hidden" onclick="modal_hidden()">x</button>
                                            <form action="http://dsgobruh.000webhostapp.com/Controller/ReplyContactController.php" id="modal-add-product" method="post">
                                            <form>
                                                <p id="modal-add-title">Phản hồi</p>
                                                <input type="hidden" id="id" name="id" value="<?php echo $contact->getID() ?>">
                                                <textarea name="message" id="message" cols="30" rows="5" placeholder="Message"></textarea>
                                                <input type="submit" id="submit" value="Chấp nhận">
                                            </form>
                                        </div>       
                                            <td><?php echo $contact->getID() ?></td>
                                            <td><?php echo $contact->getFullname() ?></td>
                                            <td><?php echo $contact->getEmail() ?></td>
                                            <td><?php echo $contact->getType() == 0 ? 'Đăng ký thông báo' : 'Hỏi đáp/Góp ý' ?></td>
                                            <td><?php echo $contact->getSubject() ?></td>
                                            <td><?php echo $contact->getMessage() ?></td>
                                            <td>
                                                <?php if($contact->getType() == 1) { ?>
                                                <a href="#">
                                                    <button onclick="modal_contact_add(<?php echo $contactCount; ?>)" id="btn-contact-reply">Trả lời</button>
                                                </a>
                                                <?php } ?>
                                                <a href="http://dsgobruh.000webhostapp.com/Controller/RemoveContact.php?id=<?php echo $contact->getID() ?>">
                                                    <button id="btn-contact-delete">Xóa</button>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php
                                            $contactCount++;
                                            }
                                        ?>
                                    </tbody>
                                    
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="modal-overlay" id="modal-overlay"></div>
                    
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
<?php include 'footer.php'; ?>
