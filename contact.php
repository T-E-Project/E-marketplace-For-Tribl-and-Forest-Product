<?php
    include 'includes/navigation_bar.php';
    if(!isset($_SESSION['USER_LOGIN'])){
        header('Location:login.php?type=msg&page=Contact');
    }
?>

<!-- Contact Page -->
    <div class="container contact">
        <div class="row heading">
            <div class="col-xl-12">
                <h2>Get in Touch</h2>
                <p>CONTACT INFORMATION</p>
            </div>
        </div>
        <div class="row form-body">
            <div class="col-xl-6">
                <div class="contact-body">
                    <div class="contact-icon">
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                    </div>
                    <div class="contact-info">
                        <p>155 Main Street, 17B, Brooklyn, NY</p>
                    </div>
                </div>
                <div class="contact-body">
                    <div class="contact-icon">
                        <i class="fa fa-phone" aria-hidden="true"></i>
                    </div>
                    <div class="contact-info">
                        <p>800-123-4567</p>
                    </div>
                </div>
                <div class="contact-body">
                    <div class="contact-icon">
                        <i class="fa fa-envelope-o" aria-hidden="true"></i>
                    </div>
                    <div class="contact-info">
                        <p>example@sitename.com</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <form method="post" action="">
                    <div class="form-input">
                        <input type="text" name="name" placeholder="Enter Your Name" required>
                    </div>
                    <div class="form-input">
                        <input type="email" name="email" placeholder="Enter Your Email" required>
                    </div>
                    <div class="form-input">
                        <input type="text" name="subject" placeholder="Enter Your Subject" required>
                    </div>
                    <div class="form-input">
                        <textarea name="message" id="" cols="30" rows="10" placeholder="Enter your message"></textarea>
                    </div>
                    <div class="form-input">
                        <button type="submit" name="submit">Send Message</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<!--X- Contact Page -X-->

<?php
    include 'includes/footer.php';
?>