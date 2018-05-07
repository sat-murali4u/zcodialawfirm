<?php
$array = '';
$main_image = $published_date = $text = $title = '';
if (isset($single_page) && !empty($single_page)) {
    //$array = json_decode($single_page, true);
    //echo '<pre>';print_r($array);echo '</pre>';die;
    $main_image = $single_page['main_image'];
    $published_date = $single_page['published_date'];
    $title = $single_page['title'];
    $text = $single_page['text'];
}
?>
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
                            <li><a href="./">Home</a></li>
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
            <div class="col-lg-8 col-xl-8 sin-page">

                <div class="blog-single-box">
                    <div class="blog-single-img">
                        <img src="<?php echo ($main_image == '' ? 'themes/backend/assets/dist/img/noimage.png' : $main_image); ?>" alt="">
                    </div>
                    <div class="blog-single-details d-md-flex">

                        <div class="single-blog-detail">
                            <h4 class="blog-title"><?php echo $title; ?></h4>
                            <span><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo $published_date; ?> | <i class="fa fa-user" aria-hidden="true"></i> by 
                                <a href="#">admin</a>
                            </span>
                            <p><?php echo $text; ?></p>

                        </div>
                    </div>
                </div>
            </div>



            <div class="col-lg-4 col-xl-4">
                <div class="widget">
                    <!-- Single Widget-->
                    <div class="widget-subscribe">
                        <h4>Join our Newsletter</h4>
                        <form>
                            <input type="email" placeholder="Email address">
                            <button class="btn-2">Subscribe</button>
                        </form>
                    </div>
                    <!-- Single Widget-->
                    <div class="widget-subscribe">
                        <h4>Popular Posts</h4>
                        <div class="widget-blog">
                            <?php
                            $thread = '';
                            $index = 0;
                            if (isset($news_feed) && !empty($news_feed)) {
                                foreach ($news_feed as $key_nf => $value_nf) {
                                    // print_r($value_nf);die;
                                    $thread = json_decode($value_nf['thread'], true);
                                    $text = $value_nf['text'];
                                    if (isset($thread) && !empty($thread)) {
                                        $nf_id = $value_nf['nf_id'];
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

                    <!-- Single Widget-->
                    <div class="widget-subscribe">
                        <h4>Categories Posts</h4>
                        <ul class="blog-catogory">
                            <li><a href="#">Exchange Bitcoin <span>{23}</span></a></li>
                            <li><a href="#">Bitcoin Investments <span>{15}</span></a></li>
                            <li><a href="#">Insingts Bitcoin <span>{09}</span></a></li>
                            <li><a href="#">Bitcoin analytics <span>{25}</span></a></li>
                        </ul>
                    </div>
                    <!-- Single Widget-->
                    <div class="widget-subscribe hide">
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