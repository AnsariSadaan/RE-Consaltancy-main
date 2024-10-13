<?php
require('./config.php');

?>

<!-- modal.php -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div style="background-color: rgba(0, 0, 0, 0.850);" class="modal-content">
            <div class="modal-header">
                <h5 style="color:salmon;" class="modal-title" id="exampleModalLabel">Contact Us</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="enquiry.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label style="color:white;" for="name">Your Name:</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="form-group">
                        <label style="color:white;" for="exampleFormControlInput1">Your Email address</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" name="email">
                    </div>
                    <div class="form-group">
                        <label style="color:white;" for="exampleFormControlTextarea1">How Can we help you(description): </label>
                        <textarea type="textarea" class="form-control" id="exampleFormControlTextarea1" rows="3" name="desc" required></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
