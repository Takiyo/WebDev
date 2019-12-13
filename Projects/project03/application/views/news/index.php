<section class="bg-text-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="bg-text" style="background-image: url(<?php echo base_url(); ?>img/bg-iamges.jpg)">
                            <h3>Classic BLOG Design</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        



        <section class="blog-post-area">
            <div class="container">
                <div class="row">
                    <div class="blog-post-area-style">
                    <?php foreach ($news as $news_item): ?>
                        <div class="col-md-12">
                                    <div class="single-post">
                                        <div class="big-image">
                                            <img src="<?php echo base_url(); ?>img/post-image1.jpg" alt="">
                                        </div>
                                        <div class="big-text">
                                            <h3><a href="#"><?php echo $news_item['title']; ?></a></h3>
                                            <p><?php echo $news_item['text'];?></p>
                                            <!-- TODO date column in db and php format date-->
                                            <h4><span class="date"><?php echo date("l j, F Y", strtotime($news_item['date']));?></span>
                                            <span class="category">Category: <strong>Test</strong></span>
                                            </h4>
                                            <p><a href="<?php echo site_url('news/'.$news_item['slug']); ?>">View article</a></p>
                                        </div>
                                    </div>
                        </div>                     
                    <?php endforeach; ?>       
                    </div>
                </div>
            </div>
            <div class="pegination">


                <div class="nav-links">
                    <span class="page-numbers current">1</span>
                    <a class="page-numbers" href="#">2</a>
                    <a class="page-numbers" href="#">3</a>
                    <a class="page-numbers" href="#">4</a>
                    <a class="page-numbers" href="#">5</a>
                    <a class="page-numbers" href="#"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
                </div>
            </div>
        </section>
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="footer-bg">
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="footer-menu">
                                        <ul>
                                            <li class="active"><a href="#">Home</a></li>
                                            <li><a href="#">lifestyle</a></li>
                                            <li><a href="#">Food</a></li>
                                            <li><a href="#">Nature</a></li>
                                            <li><a href="#">photography</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="footer-icon">
                                        <p><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a><a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a></p>
                                    </div>
                                </div>
                            </div> .
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>


