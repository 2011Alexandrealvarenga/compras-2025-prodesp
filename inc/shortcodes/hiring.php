<?php

  /**
   * Hiring shortcode function
   *
   * @package Prodesp
   * @param [type] $atts
   * @return void
   */

  add_shortcode( 'hiring', 'hiring_teste_shortcode_init' );

  function hiring_teste_shortcode_init( $atts ) {

    /**
     * @param $order
     * @param $per_page
     */
    function get_single_steps( $order, $per_page ) {
      $args = [
        'post_type'      => 'hiring',
        'posts_per_page' => $per_page,
        'order'          => $order,
        'tax_query'      => [
          [
            'taxonomy' => 'exibition',
            'field'    => 'slug',
            'terms'    => ['catalogo'],
            'operator' => 'NOT IN',
          ],
        ],
      ];

      $hirings = get_posts( $args );

      if ( $hirings ):

        foreach ( $hirings as $hiring ):
          $id    = $hiring->ID;
          $title = $hiring->post_title;
          $title = explode( ' ', $title );

          $name = $hiring->post_name;
          $name = explode( '-', $name );

          $count = count( $title );

          switch ( $count ) {
          case 1:
            $title = $title[0];
            $name  = $name[0];
            break;

          case 2:
            $title = $title[0] . ' ' . end( $title );
            $name  = end( $name );
            break;

          case 3:
            $title = $title[0] . ' ' . $title[1] . '<br/>' . end( $title );
            $name  = end( $name );
            break;

          default:
            $title[0];
            break;
          }

          $term  = get_the_terms( $id, 'exibition' );
          $terms = wp_get_post_terms( $id, 'exibition' );

          if ( $term[0]->name !== 'Conjunto' ):
            $hiring_slug = $terms[1]->name === 'Grupo' ? 'group' : "$name-$id";

            $html = "<button class='step'hiring-data='hiring-$hiring_slug'>";
            $html .= "<p class='step-title'>$title</p>";
            if ( $per_page !== 6 ):
              $html .= '<p class="step-arrow"></p>';
            endif;
            $html .= '</button>';

            echo $html;
          endif;

        endforeach;

      endif;
    }

    function get_set_steps() {
      $args = [
        'post_type'      => 'hiring',
        'posts_per_page' => -1,
        'order'          => 'ASC',
      ];

      $hirings = get_posts( $args );

      if ( $hirings ):

        $html = '<div class="set">';

        foreach ( $hirings as $hiring ):
          $id    = $hiring->ID;
          $title = $hiring->post_title;
          $title = explode( ' ', $title );

          $name = $hiring->post_name;
          $name = explode( '-', $name );

          $count = count( $title );

          switch ( $count ) {
          case 1:
            $title = $title[0];
            $name  = $name[0];
            break;

          case 2:
            $title = $title[0] . ' ' . end( $title );
            $name  = end( $name );
            break;

          case 3:
            $title = $title[0] . ' ' . $title[1] . '<br/>' . end( $title );
            $name  = end( $name );
            break;

          case 7:
            $title = $title[0] . '<br/>' . $title[1];
            $title = str_replace( ':', '', $title );
            $name  = $name[0];
            break;

          default:
            $title = '';
            break;
          }

          $term  = get_the_terms( $id, 'exibition' );
          $terms = wp_get_post_terms( $id, 'exibition' );

          if ( $term[0]->name === 'Conjunto' ):
            $class              = $term[0]->name === 'Conjunto' && $term[1]->name !== 'Multiplo' ? 'conect' : '';
            $hiring_slug        = $terms[1]->name === 'Grupo' ? 'group' : "$name-$id";
            $hiring_class_group = $terms[1]->name === 'Grupo' ? 'group' : '';

            $html .= "<button class='step $class $hiring_class_group' hiring-data='hiring-$hiring_slug'>";
            $html .= "<p class='step-title'>$title</p>";

            if ( $term[1]->name === 'Multiplo' || $term[2]->name === 'Multiplo' ):
              $html .= '<div class="ligature">';
              $html .= '<span></span>';
              $html .= '<span></span>';
              $html .= '</div>';
            else:

              $html .= '<p class="step-big-arrow"></p>';
              $html .= '<p class="step-arrow"></p>';
            endif;
            $html .= '</button>';

          endif;

        endforeach;

        $html .= '</div>';

        echo $html;

      endif;
    }

    function get_last_step() {
      $args = [
        'post_type'      => 'hiring',
        'posts_per_page' => -1,
        'order'          => 'ASC',
        'tax_query'      => [
          [
            'taxonomy' => 'exibition',
            'field'    => 'slug',
            'terms'    => ['catalogo'],
            'operator' => 'IN',
          ],
        ],
      ];

      $hirings = get_posts( $args );

      if ( $hirings ):

        foreach ( $hirings as $hiring ):
          $id    = $hiring->ID;
          $title = $hiring->post_title;
          
		 $name = $hiring->post_name;
          $name = explode( '-', $name );

          $count_title = explode( ' ', $title );

          $count = count( $count_title );

          switch ( $count ) {
          case 1:
            $name = $name[0];
            break;

          case 2:
            $name = end( $name );
            break;

          case 3:
            $name = end( $name );
            break;

          case 4:
            $name = $name[0];
            break;

          default:
            $name = '';
            break;
          }


          $html = "<button class='step' hiring-data='hiring-$name-$id'>";
          $html .= "<p class='step-title'>$title</p>";
          $html .= '</button>';

          echo $html;

        endforeach;

      endif;
    }

    function get_panels() {
      $args = [
        'post_type'      => 'hiring',
        'posts_per_page' => -1,
        'order'          => 'ASC',
      ];

      $hirings = get_posts( $args );

		
      if ( $hirings ):

        $html = '';

        foreach ( $hirings as $hiring ):
          $id      = $hiring->ID;
          $title   = $hiring->post_title;
          $content = $hiring->post_content;
		
		

          $name = $hiring->post_name;
          $name = explode( '-', $name );

          $count_title = explode( ' ', $title );

          $count = count( $count_title );

          switch ( $count ) {
          case 1:
            $name = $name[0];
            break;

          case 2:
            $name = end( $name );
            break;

          case 3:
            $name = end( $name );
            break;

          case 4:
            $name = $name[0];
            break;

          default:
            $name = '';
            break;
          }

          $term  = get_the_terms( $id, 'exibition' );
          $terms = wp_get_post_terms( $id, 'exibition' );

          // $hiring_slug = $terms[1]->name === 'Grupo' ? 'group' : "$name-$id";
          $hiring_slug = isset($terms[1]) && $terms[1]->name === 'Grupo' ? 'group' : "$name-$id";
 
          $html .= "<div class='panel' id='hiring-$hiring_slug'>";
          $html .= '<h2 class="panel-title">';
          $html .= $title;
          $html .= '</h2>';
          $html .= '<div class="panel-content">';
          $html .= $content;
          $html .= '</div>';
          $html .= '</div>';

        endforeach;

        echo $html;

      endif;
    }

  ?>

<div class="hiring">
  <div class="hiring-content">
    <div class="new-steps">
      <div class="first-steps">
        <?php echo get_single_steps( 'ASC', 4 ); ?>
      </div>
      <div class="second-steps">
        <?php echo get_set_steps(); ?>
      </div>
      <div class="third-steps">
        <?php echo get_single_steps( 'DESC', 6 ); ?>
      </div>
    </div>

    <div class="separeted-step">
    	<p class="transversal-content">Conteúdos Transversais:</p>
		<div class="first-steps">
			<?php echo get_last_step(); ?>
		</div>
      
    </div>
  </div>
  <div class="panels">
    <?php echo get_panels(); ?>
  </div>
</div>

<?php }