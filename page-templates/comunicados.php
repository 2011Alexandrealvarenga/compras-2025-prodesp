<?php
/**
 * Template Name: Comunicados
 * Template Post Type: post, page, event
 *
 * @link https://developer.wordpress.org/themes/template-files-section/page-template-files/
 *
 * @package Prodesp
 */

get_header();

?>

<style>
    #lists .backimg{
        background-image: url(http://compras.sp.gov.br/wp-content/uploads/2023/07/agente-publico-banner.jpg);
        background-position: center center;
        background-repeat: no-repeat;
        background-size: cover;
        text-align: center;
        padding: 30px;
        margin-bottom: 80px;
        height: 258px;
    }
    hr.line-year {
        margin: 0;
        border: 2px solid black;
    }
    p.year {
        margin: 0!important;
        font-size: 24px!important;
        text-align: center!important;
    }
    #lists .backimg .overlay{
        height: 294px!important;
    }
</style>
<?php
$args = array( 
    'posts_per_page' => -1, 
    'category' => 26,
    'year'      => 2025 
);
$myposts2025 = get_posts( $args );

$args = array( 
    'posts_per_page' => -1, 
    'category' => 26,
    'year'      => 2024 
);
$myposts2024 = get_posts( $args );

$args = array( 
    'posts_per_page' => -1, 
    'category' => 26,
    'year'      => 2023 
);
$myposts2023 = get_posts( $args );
;?>
<section id="lists">
    <div class="backimg">
        <div class="overlay"></div>
		<h3>Comunicados</h3> 
	</div>
    <div id="post" class="container">
        <div class="row">
                <div class="col-sm-12">
                    <p class="year">2025</p>
                    <hr class="line-year">
                </div>
                <?php 
                foreach ( $myposts2025 as $post ) : setup_postdata( $post ); 
                $novo = get_post_custom_values('novo'); 
                ?>

                <div class="col-sm-12">
                    <p class="title">
                        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php echo get_the_title(); ?></a>
                        <?php if($novo[0] == 'sim'){ ?>
                            <span class="new">Novo!</span>
                        <?php } ?>
                    </p>
                    <?php echo the_excerpt(); ?>
                    <a class="bt" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">Ver mais</a>
                    <hr>
                </div>
                <?php endforeach; 
                wp_reset_postdata();
                // 
                ;?>
                <div class="col-sm-12">
                    <p class="year">2024</p>
                    <hr class="line-year">
                </div>
                <?php 
                foreach ( $myposts2024 as $post ) : setup_postdata( $post ); 
                $novo = get_post_custom_values('novo'); 
                ?>

                <div class="col-sm-12">
                    <p class="title">
                        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php echo get_the_title(); ?></a>
                        <?php if($novo[0] == 'sim'){ ?>
                            <span class="new">Novo!</span>
                        <?php } ?>
                    </p>
                    <?php echo the_excerpt(); ?>
                    <a class="bt" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">Ver mais</a>
                    <hr>
                </div>
                <?php endforeach; 
                wp_reset_postdata();
                // 
                ;?>
                <div class="col-sm-12">
                    <p class="year">2023</p>
                    <hr class="line-year">
                </div>
                <?php 

                foreach ( $myposts2023 as $post ) : setup_postdata( $post ); 

                    $novo = get_post_custom_values('novo'); 

                    ?>

                    <div class="col-sm-12">
                        <p class="title">
                            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php echo get_the_title(); ?></a>
                            <?php if($novo[0] == 'sim'){ ?>
                                <span class="new">Novo!</span>
                            <?php } ?>
                        </p>
                        <?php echo the_excerpt(); ?>
                        <a class="bt" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">Ver mais</a>
                        <hr>
                    </div>

                <?php endforeach; 
                wp_reset_postdata();
            ?>
        </div>
    </div>
</section>
<?php get_footer();