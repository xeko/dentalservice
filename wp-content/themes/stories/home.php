<?php get_header(); ?>

<div id="section-top" class="clearfix">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="section-part">
                    <div class="zoom-effect">
                        <img src="<?php echo get_bloginfo('template_url') ?>/img/shutterstock_151234016.jpg" class="img-responsive" />
                    </div>
                    <h2 class="headline"><a href="#">コンセプト</a></h2>
                    <p class="desc-short">
                        芝二丁目歯科のコンセプトです。
                    </p>
                </div><!--End .section-part-->
            </div>
            <div class="col-md-4">
                <div class="section-part">
                    <div class="zoom-effect">
                        <img src="<?php echo get_bloginfo('template_url') ?>/img/shutterstock_167867885.jpg" class="img-responsive" />
                    </div>
                    <h2 class="headline"><a href="#">初診の患者さまへ</a></h2>
                    <p class="desc-short">
                        私たちは、検診と治療内容の説明を最重要視しています。また、予防医学の見地から、良い口内環境作りであるクリーニングがとても大切であると考えています。
                    </p>
                </div><!--End .section-part-->
            </div>            
            <div class="col-md-4">
                <div class="section-part">
                    <div class="zoom-effect">
                        <img src="<?php echo get_bloginfo('template_url') ?>/img/shutterstock_110804762.jpg" class="img-responsive" />
                    </div>
                    <h2 class="headline"><a href="#">芝二丁目歯科への道のり</a></h2>
                    <p class="desc-short">
                        当院は都営三田線「芝公園」駅から徒歩3分、都営大江戸線「赤羽橋」駅から徒歩5分で通院できます。
                    </p>
                </div><!--End .section-part-->
            </div>
        </div>
    </div>
</div><!--End #section-top-->
<div id="section-second" class="text-center">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <h2 class="headline icon-top">良い生活は、良い歯から。</h2>
                <p>
                    友人とお話しをしたり、仕事に熱中したり、美味しい食事を食べたり。 <br />
                    毎日を楽しむには良い歯を持つことが大切です。<br />
                    治療すること以上に、予防に気を使ってもらうことで常に良い歯を持ち続け、良い生活を送って欲しい。<br />
                    私たちは、毎日楽しむための<br />
                    良いパートナーであり続けたいと願っています。
                </p>                
            </div>
        </div>
    </div>
</div><!--End #section-second-->
<div id="section-five">    
    <div class="container">
        <div class="row">        
            <h2 class="icon-top headline">ニュース</h2>
            <div class="col-md-7 col-md-push-5">
            <?php
                $args = array(
                'post_type' => 'post',
                'post_status' => 'publish',
                'posts_per_page'  => 6,
                //'cat'   => 3
                );
                $query_news = new WP_Query($args);
                if ($query_news->have_posts()) :?>
                    <ul class="list-unstyled" id="list-news">
                    <?php while($query_news->have_posts()): $query_news->the_post();?>
                        <li><time class="block"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php the_time('d-m-Y')?></time>
                            <a href="<?php echo the_permalink()?>"><?php the_title();?></a></li>
                    <?php endwhile;?>
                    </ul><!--End #list-news-->
                <?php endif;?>                    
            </div>
            <div class="col-md-5 col-md-pull-7">
                <div class="fb-page" data-href="https://www.facebook.com/omorimachidental/?fref=ts" data-tabs="timeline" data-height="500" data-width="500" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/omorimachidental/?fref=ts" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/omorimachidental/?fref=ts">大森町駅前歯科</a></blockquote></div>                
            </div>            
        </div>
    </div>
</div><!--End #section-five-->
<div id="section-seven">    
    <div class="container">
        <div class="row">
            <h2 class="icon-top headline">ブログ</h2>
            <ul class="list-unstyled hidden" id="blog">
                <li class="clearfix">
                    <a href="#" class="zoom-effect pull-left"><img src="<?php echo get_bloginfo('template_url') ?>/img/Fotolia_56159139_XS.jpg" /></a>
                    <h3 class="title"><a href="#">歯のホワイトニングを行うことで得られる4つの効果</a></h3>
                    <p class="blog-content">皆さんは人前で思いっきり笑えますか？
                        歯が汚れているのを気にしたことはありませんか？
                        黄色く汚い歯を見せて笑うより、白く輝く歯で思いっきり笑いたいですよね！
                        今回は、歯に着色があることでどのようなマイナス面があるか3つに絞って説明したいと思います。
                    </p>
                    <ul id="post-meta" class="list-inline">
                        <li><i class="fa fa-clock-o" aria-hidden="true"></i> 2017年1月19日</li>
                        <li><i class="fa fa-eye" aria-hidden="true"></i> 1970</li>
                    </ul>
                </li>
                <li class="clearfix">
                    <a href="#" class="zoom-effect pull-left"><img src="<?php echo get_bloginfo('template_url') ?>/img/Fotolia_109030654_XS.jpg" /></a>
                    <h3 class="title"><a href="#">歯科医院における自費診療と保険診療の違い</a></h3>
                    <p class="blog-content">歯医者だけに限らず、内科や耳鼻科や皮膚科などに行くと、まず最初に「保険証のご提示をおねがいします」といわれますよね。
                        しかし、保険の効かない自費診療もあるということはご存知でしょうか？
                    </p>
                    <ul id="post-meta" class="list-inline">
                        <li><i class="fa fa-clock-o" aria-hidden="true"></i> 2017年1月19日</li>
                        <li><i class="fa fa-eye" aria-hidden="true"></i> 1970</li>
                    </ul>
                </li>
                <li class="clearfix">
                    <a href="#" class="zoom-effect pull-left"><img src="<?php echo get_bloginfo('template_url') ?>/img/Fotolia_110287853_XS.jpg" /></a>
                    <h3 class="title"><a href="#">ドライマウスの対策</a></h3>
                    <p class="blog-content">唾液を分泌させるために、食事の際はよく噛むようにしましょう。
                        普段柔らかい食べ物ばかり食べている人は、なるべく歯ごたえのあるものを食べるように心がけてみましょう。
                    </p>
                    <ul id="post-meta" class="list-inline">
                        <li><i class="fa fa-clock-o" aria-hidden="true"></i> 2016年2月10日</li>
                        <li><i class="fa fa-eye" aria-hidden="true"></i> 34210</li>
                    </ul>
                </li>
            </ul><!--End #blog-->
        </div>
    </div>
</div><!--End #section-seven-->
<div id="section-six">
    <h2 class="icon-top headline">挨拶</h2>
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-push-8">
                <img src="<?php echo get_bloginfo('template_url') ?>/img/shutterstock_81834304.jpg" class="center-block" />
            </div>
            <div class="col-sm-8 col-sm-pull-4">
                <p>
                    この度は当院のホームページにお越しいただき、ありがとうございます。<br />

                    最近では、このホームページと言われるものも世の中に無数にある時代となり、歯科医院のホームページと言えば、どんな業種よりも多く感じるの私だけでしょうか。<br />

                    そんな、数多くある歯科医院のホームページを見て、今後かかりつけになるかもしれない歯科医院を探しているということを来院いただいた患者様からお聞きしたことがございました。<br />

                    そこで、『この歯医者にいってみよう、この歯医者だったら良くしてくれるだろう』というけ眼手になるところは、ホームページでどこを見て決めているんですか？と尋ねてみたところ、『結局は先生じゃないんですか』と言われました。

                </p>
            </div>            
        </div>
    </div>
</div><!--End #section-six-->
<div id="section-third" class="text-center">
    <div class="container">
        <div class="row">
            <h2 class="headline icon-top">診療のご案内</h2>
            <?php
                $args = array(
                'post_type' => 'page',
                'post_status' => 'publish',
                'hierarchical'  => 1,
                'meta_key'  => 'is_homepage',
                'meta_value'  => 1,
                'posts_per_page'  => 6
                );
              $query_toppage = new WP_Query($args);
              if ($query_toppage->have_posts()) :?>
              <ul id="cat-list" class="list-unstyled">
                <?php while ($query_toppage->have_posts()): $query_toppage->the_post();?>
                    <?php
                    $title_via_img = get_post_meta( get_the_ID(), 'title_via_img', true );                    
                    ?>
                    <li class="col-md-4">
                        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                            <div class="shinryo-box items">
                                <h3>
                                <?php if(empty($title_via_img)):?>
                                <?php the_title()?>
                                <?php else:?>
                                    <img src="<?php echo $title_via_img?>" title="<?php the_title()?>" alt="<?php the_title()?>" />
                                <?php endif;?>
                                </h3>
                                <div class="post-image">
                                    <figure>
                                        <?php the_post_thumbnail( 'large', array('class' => 'img-responsive') );?>
                                    </figure>
                                    <p>Read More</p>
                                </div>
                            </div><!--End .shinryo-box-->
                        </a>
                    </li>
                    <?php endwhile;?>
                </ul>
            <?php endif;?>
            <?php wp_reset_postdata(); ?>                            
            </ul><!--End #cat-list-->
        </div>
    </div>
</div><!--End #section-third-->
<div id="section-eight">
    <div class="container">
        
    </div>
</div><!--End #section-eight-->


<?php // get_template_part('loop'); ?>

<?php // get_template_part('pagination'); ?>            

<?php get_footer(); ?>

