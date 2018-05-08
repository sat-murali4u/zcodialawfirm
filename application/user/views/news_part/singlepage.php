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
<div id="infinite-container">
    <div class="infinite-content" data-last-post-id="410" data-post-url="http://ninamag.dexterthemes.com/2017/10/06/t-cont-15/">

        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 col-lg-12 no-padding">
                    <article class="post head-title">
                        <figure class="post-item post-detail-header-fixed" style="background-image:url(<?php echo ($main_image == '' ? 'themes/backend/assets/dist/img/noimage.png' : $main_image); ?>); min-height:380px; background-position: center; background-size:cover; ">

                        </figure>
                    </article>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-12 justify-content">

                    <article class="post-detail post-408 post type-post status-publish format-quote has-post-thumbnail hentry category-travel tag-fruity tag-overreact tag-trouble tag-twice post_format-post-format-quote">

                        <div class="social ">
                            <div class="title">+ SHARE </br><span>THIS POST</span></div>
                            <ul>
                                <li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo 'http://localhost:8080' . $_SERVER['REQUEST_URI']; ?>" target="_blank" class="facebook"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="https://twitter.com/intent/tweet?text=Finland%20in%20the%20Summer%20Quirky,%20Isolated,%20and%20Pretty&amp;url=http://ninamag.dexterthemes.com/2017/10/06/t-cont-15/&amp;" target="_blank" class="twitter"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="../../../../../pinterest.com/pin/create/button/index4165.html?url=http://ninamag.dexterthemes.com/2017/10/06/t-cont-15/&amp;media=http://ninamag.dexterthemes.com/wp-content/uploads/2017/10/post_banner_black.jpg" target="_blank" class="pinterest"><i class="fa fa-pinterest"></i></a></li>
                                <li><a href="https://plus.google.com/share?url=http://ninamag.dexterthemes.com/2017/10/06/t-cont-15/" target="_blank" class="google"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div>

                        <header class="post-head">
                            <h1 class="post-title"><?php echo $title; ?></a></h1>
                            <aside class="post-meta">
                                <strong rel="author" class="author hide"> 
                                    <a class="url fn n" href="../../../../author/buhara/index.html"><span>by </span>Buhara</a></strong>
                                <a href="index.html" rel="bookmark">
                                    <time class="time" datetime="<?php echo $published_date; ?>"><?php echo $published_date; ?></time>

                                </a> <a href="../../../../category/travel/index.html" class="post-category category-link-bg-5" title="View all posts in TRAVEL">TRAVEL</a>
                            </aside>
                        </header>

                        <div class="entry-content post-detail-content">
                            <p><?php echo $text; ?></p>
                        </div>
                        <!-- .entry-footer -->
                    </article>
                    <!-- #post-## -->








                </div>

            </div>
        </div>
    </div>
</div>