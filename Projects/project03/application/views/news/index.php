<section class="bg-text-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="bg-text" style="background-image: url(<?php echo base_url(); ?>img/bg-iamges.jpg)">
                            <h3>Welcome to BLOGGIE</h3>
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
                    <?php foreach (array_reverse($news) as $news_item): ?>
                        <div class="col-md-12">
                                    <div class="single-post">
                                        <div class="big-image">
                                            <img src="<?php echo base_url(); ?>img/post-image1.jpg" alt="">
                                        </div>
                                        <div class="big-text">
                                            <h3><a href="#"><?php echo $news_item['title']; ?></a></h3>
                                            <p><?php 
                                            $string = $news_item['text'];

                                            $string = trim($string);
                                            $length = 100;
                                            $append = '...';
                                            if(strlen($string) > $length) {
                                                $string = wordwrap($string, $length);
                                                $string = explode("\n", $string, 2);
                                                $string = $string[0] . $append;
                                            }
                                            
                                            echo $string;?>
                                            </p>

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

        </section>

    </div>


