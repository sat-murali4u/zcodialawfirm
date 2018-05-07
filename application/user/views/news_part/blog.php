
<!-- BreadCrumb Part Start -->
<div class="bc-style2">
    <div class="bc-title">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>OUR <span>blog</span> PAGE</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="bc-list">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="breadcrumb-link">
                        <ul class="flat-list">
                            <li><a href="#">Home</a></li>
                            <li>ATTORNEYS</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- BreadCrumb Part End -->
<!-- Blog page content start -->
<section class="blog-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-xl-8">
                <div class="blog-area-wrapper">
                    <div class="row">
                        <?php
                        $thread = '';
                        if (isset($news_feed) && !empty($news_feed)) {
                            $l1 = 0;
                            foreach ($news_feed as $key_nf => $value_nf) {
                                $nf_id = $value_nf['nf_id'];
                                $thread = json_decode($value_nf['thread'], true);
                                $text = $value_nf['text'];
                                if (isset($thread) && !empty($thread)) {
                                    $published_date = substr($thread['published'], 0, -6);
                                    $timezone = substr($thread['published'], -6);
                                    $date = new DateTime($published_date, new DateTimeZone('UTC'));
                                    $date->setTimezone(new DateTimeZone($timezone));
                                    $updated_published_date = $date->format('M j, Y');
                                    ?>
                                    <div class="col-xl-6">
                                        <!--  Single blog start -->
                                        <div class="sin-blog left1" nf_id="<?php echo $nf_id; ?>">
                                            <div class="blog-img" style="background: url(<?php echo ($thread['main_image'] == '' ? 'themes/backend/assets/dist/img/noimage.png' : $thread['main_image']); ?>) no-repeat;background-size: contain;    height: 270px;background-position: center;">
                                                <!--img src="images/blog/1.jpg" alt=""-->
                                            </div>
                                            <div class="blog-content-wrap">
                                                <div class="blog-con-two"> 
                                                    <h2><?php echo anchor("news/single_page/?id=" . $this->encrypt->encode($nf_id, 'Jfmamjjas0nd'), $thread['title'], array('class' => 'brm')); ?></h2>
                                                    <span><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo $updated_published_date; ?> | <i class="fa fa-thumbs-up" aria-hidden="true"></i> <?php echo $thread['social']['facebook']['likes']; ?> | <a href="#"><i class="fa fa-tag" aria-hidden="true"></i>Tech
                                                        </a>

                                                    </span>
                                                    <p><?php echo character_limiter($text, 200); ?> </p>
                                                </div>
                                                <div class="blog-bottom">
                                                    <?php echo anchor("news/single_page/?id=" . $this->encrypt->encode($nf_id, 'Jfmamjjas0nd'), 'Read More', array('class' => 'brm')); ?>

                                                    <ul class = "blog-tag">
                                                        <li><a href = "#">photo </a></li>
                                                        <li><a href = "#">beautiful</a></li>
                                                    </ul>
                                                    <span><i class = "fa fa-tags" aria-hidden = "true"></i></span>

                                                </div>
                                            </div>
                                        </div>
                                        <!--Single blog end -->
                                    </div>
                                    <?php
                                }
                            }
                        }
                        ?>



                        <div class="col-12">
                            <div class="blog-pagination d-flex">
                                <?php echo $pagination; ?>
                               </div>
                        </div>
                    </div>
                </div>


            </div>

            <div class="col-md-12 col-lg-4 col-xl-3 ">
                <div class="widget style-two">
                    <!-- Single Widget-->
                    <div class="widget-subscribe style-two">
                        <h4>Join our Newsletter</h4>
                        <form>
                            <input type="email" placeholder="Email address">
                            <button class="btn-2">Subscribe</button>
                        </form>
                    </div>
                    <!-- Single Widget-->
                    <div class="widget-subscribe style-two">
                        <h4>Popular Posts</h4>
                        <div class="widget-blog">
                            <?php
                            $thread = '';
                            $index = 0;
                            if (isset($news_feed) && !empty($news_feed)) {
                                foreach ($news_feed as $key_nf => $value_nf) {
                                    $nf_id = $value_nf['nf_id'];
                                    $thread = json_decode($value_nf['thread'], true);
                                    $text = $value_nf['text'];
                                    if (isset($thread) && !empty($thread)) {
                                        $published_date = substr($thread['published'], 0, -6);
                                        $timezone = substr($thread['published'], -6);
                                        $date = new DateTime($published_date, new DateTimeZone('UTC'));
                                        $date->setTimezone(new DateTimeZone($timezone));
                                        $updated_published_date = $date->format('M j, Y');
                                        ?>
                                        <div class="widget-blog-item d-flex">
                                            <div class="widget-blog-img"><img src="<?php echo ($thread['main_image'] == '' ? 'themes/backend/assets/dist/img/noimage.png' : $thread['main_image']); ?>" alt=""></div>
                                            <div class="widget-blog-des">
                                                <?php echo anchor("news/single_page/?id=" . $this->encrypt->encode($nf_id, 'Jfmamjjas0nd'), word_limiter($thread['title'], 10)); ?>
                                                <span><?php echo $updated_published_date; ?></span>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                    $index += 1;
                                    if ($index == 3) {
                                        break;
                                    }
                                }
                            }
                            ?>

                        </div>
                    </div>
                    <!-- Single Widget-->
                    <div class="widget-subscribe widget-author style-two hide">
                        <h4>About Author</h4>
                        <p>Posuere lacinia bibendum nulla sed consectetur. Aenean consect.</p>
                        <div class="author-img">
                            <img src="themes/frontend/images/blog/bauthor.jpg" alt="">
                        </div>
                        <div class="author-detail">
                            <h5>MD. SAJAL MIA</h5>
                            <p>Web Developer</p>
                            <ul class="flat-list">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Single Widget-->
                    <div class="widget-subscribe style-two hide">
                        <h4>Categories Posts</h4>
                        <ul class="blog-catogory">
                            <li><a href="#">Exchange Bitcoin <span>{23}</span></a></li>
                            <li><a href="#">Bitcoin Investments <span>{15}</span></a></li>
                            <li><a href="#">Insingts Bitcoin <span>{09}</span></a></li>
                            <li><a href="#">Bitcoin analytics <span>{25}</span></a></li>
                        </ul>
                    </div>
                    <!-- Single Widget-->
                    <div class="widget-subscribe style-two hide">
                        <h4>Social Area</h4>
                        <div class="widget-social-media">
                            <a href="#" class="widget-soical-link media-twitter d-flex">
                                <i class="fa fa-twitter"></i>
                                <span>38 followers</span>
                                <span class="ml-auto">Follow</span>
                            </a>
                            <a href="#" class="widget-soical-link media-pinterest d-flex">
                                <i class="fa fa-pinterest"></i>
                                <span>38 followers</span>
                                <span class="ml-auto">Follow</span>
                            </a>
                            <a href="#" class="widget-soical-link media-youtube d-flex">
                                <i class="fa fa-youtube"></i>
                                <span>38 followers</span>
                                <span class="ml-auto">Follow</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Blog page content end -->