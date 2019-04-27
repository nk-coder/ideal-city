<?php session_start(); ?>
<?php include_once 'template/header.php' ?>
    <?php include_once 'template/nav.php' ?>

    <?php include_once 'template/slider.php' ?>


    <div class="about-portfolio">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="about-left">
                        <div class="about-title">
                            <h3>Image title here</h3>
                        </div>


                        <div class="about-img image-fulwidth"><img src="images/AnisulHaque9.jpg">
                        </div>
                    </div>
                </div>


                <div class="col-md-6">
                    <div class="about-description">
                        <h3>From Mayor!</h3>


                        <p>Nullam volutpat, mauris scelerisque iaculis semper, justo odio rutrum urna, at cursus urna nisl et ipsum. Donec dapibus lacus nec sapien faucibus eget suscipit lorem mattis.Donec non mauris ac nulla consectetur pretium sit amet rhoncus neque. Maecenas aliquet, diam sed rhoncus vestibulum, sem lacus ultrices est, eu hendrerit tortor nulla in dui. Suspendisse enim purus, euismod interdum viverra eget, ultricies eu est.</p>


                        <p>Nullam volutpat, mauris scelerisque iaculis semper, justo odio rutrum urna, at cursus urna nisl et ipsum. Donec dapibus lacus nec sapien faucibus eget suscipit lorem mattis.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php echo $_SESSION['username']; 
?>
    <?php include_once 'template/footer.php'?>
