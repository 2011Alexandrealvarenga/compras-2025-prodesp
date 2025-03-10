<?php

  /* ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
   *
   * [ITSM - PRODUÇÃO] - POST para pegar o token de acesso
   * @since 1.0.0
   * Author: Gabriel Gouveia
   *
   * ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
   **/

  add_shortcode( 'form_logistica', 'form_logistica_shortcode' );

  function form_logistica_shortcode() {
    ob_start();

    $args = array(
      'post_type'      => 'logistica', 
      'posts_per_page' =>  10,           
      'orderby'        => 'date',
      'order'          => 'DESC',      
  );
  
  $query = new WP_Query($args);
  ;?>
   <div class="content-pilulas">
      <div class="glide">
        <div class="glide__track" data-glide-el="track">
          <ul class="glide__slides">
            <?php             
             if ($query->have_posts()) :
              while ($query->have_posts()) : $query->the_post();
            ;?>
            <li class="glide__slide">
            <?php
            $video_url = get_post_meta(get_the_ID(), '_video_logistica', true);
            if ($video_url) :
                preg_match('/(?:https?:\/\/)?(?:www\.)?(?:youtube\.com\/(?:[^\/\n\s]+\/\S+\/|\S+\/?\S*)|youtu\.be\/)([\w\-]+)(?:[^\w\-]|$)/', $video_url, $matches);
                $video_id = isset($matches[1]) ? $matches[1] : '';
                if ($video_id) :
            ?>
              <div class="video-logistica">
                  <div class="date-format">
                    <?php echo get_the_date('d/m/Y'); ?>
                  </div>                        
                  <iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo esc_attr($video_id); ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                  <div class="content-page">
                    <?php the_content() ;?>
                  </div>
                  <a href="<?php echo esc_attr($video_url); ?>" class="btn-saiba-mais" target="_blank">Saiba Mais</a>
              </div>
            <?php
                endif;
            endif;
            ?>
            
            </li>
           <?php 
              endwhile;
              wp_reset_postdata();
              else :
                  echo '<p>Nenhuma pilula encontrada.</p>';
              endif;
           ;?>
          </ul>
        </div>  
        <div class="glide__arrows" data-glide-el="controls">
          <button class="glide__arrow glide__arrow--left" data-glide-dir="<">
            <img class="img-arrow" src="https://compras.sp.gov.br/wp-content/uploads/2024/12/seta-esquerda.png">
          </button>
          <button class="glide__arrow glide__arrow--right" data-glide-dir=">">
            <img class="img-arrow" src="https://compras.sp.gov.br/wp-content/uploads/2024/12/seta-direita.png">
          </button>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@glidejs/glide"></script>
  <script>
    const config = {
      type: "carousel",
      perView: 3,
      breakpoints:{
        800:{
          perView: 2
        }
      }
    };
    new Glide('.glide', config).mount();
  </script>
<style>
	 .content-pilulas .date-format {
    color: #fff;
    background: #243e63;
    padding: 8px;
    width: 105px;
    display: flex;
    justify-content: center;
    position: relative;
    top: 46px;
    left: 5px;
    border-radius: 4px;
  }
  .content-pilulas .content-page {
    padding: 8px 0;
  }
  .content-pilulas .content-page p {
    font-size: 14px;
    color: #334155;
    font-weight: 500;
  }
  .content-pilulas .btn-saiba-mais {
    color: #334155;
    padding: 8px;
    border: 1px solid black;
    border-radius: 4px;
  }
  .content-pilulas button.glide__arrow.glide__arrow--right, 
  .content-pilulas button.glide__arrow.glide__arrow--left{
    background: none;
  }
  .content-pilulas ul.glide__slides{
    height: 370px;
  }
  .content-pilulas iframe { 
    height: 200px;
  }
  .content-pilulas .glide__arrow .img-arrow{
    width: 10px;
  }
  .content-pilulas .glide__arrow {
    background: white !important;
    border-radius: 50%;
    border: 1px solid black;
    display: flex;
    justify-content: center;
}

  .glide{position:relative;width:100%;box-sizing:border-box}.glide *{box-sizing:inherit}.glide__track{overflow:hidden}.glide__slides{position:relative;width:100%;list-style:none;backface-visibility:hidden;transform-style:preserve-3d;touch-action:pan-Y;overflow:hidden;padding:0;white-space:nowrap;display:flex;flex-wrap:nowrap;will-change:transform}.glide__slides--dragging{user-select:none}.glide__slide{width:100%;height:200px;flex-shrink:0;white-space:normal;user-select:none;-webkit-touch-callout:none;-webkit-tap-highlight-color:transparent}.glide__slide a{user-select:none;-webkit-user-drag:none;-moz-user-select:none;-ms-user-select:none}.glide__arrows{-webkit-touch-callout:none;user-select:none}.glide__bullets{-webkit-touch-callout:none;user-select:none}.glide--rtl{direction:rtl}
  .glide__arrow{position:absolute;display:block;top:50%;z-index:2;color:white;text-transform:uppercase;padding:9px 12px;background-color:transparent;border-radius:4px;text-shadow:0 0.25em 0.5em rgba(0,0,0,0.1);opacity:1;cursor:pointer;transition:opacity 150ms ease, border 300ms ease-in-out;transform:translateY(-50%);line-height:1}.glide__arrow:focus{outline:none}.glide__arrow:hover{border-color:white}.glide__arrow--left{left:2em}.glide__arrow--right{right:2em}.glide__arrow--disabled{opacity:0.33}.glide__bullets{position:absolute;z-index:2;bottom:2em;left:50%;display:inline-flex;list-style:none;transform:translateX(-50%)}.glide__bullet{background-color:rgba(255,255,255,0.5);width:9px;height:9px;padding:0;border-radius:50%;border:2px solid transparent;transition:all 300ms ease-in-out;cursor:pointer;line-height:0;box-shadow:0 0.25em 0.5em 0 rgba(0,0,0,0.1);margin:0 0.25em}.glide__bullet:focus{outline:none}.glide__bullet:hover,.glide__bullet:focus{border:2px solid white;background-color:rgba(255,255,255,0.5)}.glide__bullet--active{background-color:white}.glide--swipeable{cursor:grab;cursor:-moz-grab;cursor:-webkit-grab}.glide--dragging{cursor:grabbing;cursor:-moz-grabbing;cursor:-webkit-grabbing}

</style>
  <?php 
return ob_get_clean();
}