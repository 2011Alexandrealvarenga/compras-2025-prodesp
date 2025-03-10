	<!-- inicio brusca -->
		<style>
		/* inicio - busca header */

		.site-header__wrap .menu-sem-espaco.space-between-content{
			justify-content: center;
		}
		.content-form{display: flex;}
		.field-search-menu {
				margin: 10px 25px 0 25px;
				border:1px solid #f2f2f2!important;
		}
		.entry-footer .btn,
		.search-submit{
			background: #334155;
		}
		.entry-footer .btn:hover,
		.search-submit:hover{
			background: white;
			border: 1px solid #334155;
			color: #334155;
		}

		.search-field{
			border: 1px solid #334155!important;
			border-radius: none;
		}
		.outside_content{
			border: 1px solid red;
				}
			#content_teste {
				opacity: 0;
				transition: opacity 0.7s ease-in-out; 
			}

			#content_teste.visible_content {
					opacity: 1;
			}

			.hidden_content {
					display: none;
			}
		/* fim - busca header */
	</style>
<div class="container">	
    <form id="content_teste" role="search" method="get" class="hidden_content search-form field-search-menu " action="<?php echo esc_url(home_url('/')); ?>">
        <label>
            <span class="screen-reader-text"><?php echo _x('Search for:', 'label', 'your-textdomain'); ?></span>
            <input type="search" class="search-field" placeholder="<?php echo esc_attr_x('Digite o que procura', 'placeholder', 'your-textdomain'); ?>" value="<?php echo get_search_query(); ?>" name="s" />
        </label>
        <button type="submit" class="search-submit "><?php echo esc_html_x('Buscar', 'submit button', 'your-textdomain'); ?></button>
    </form>
  </div>
<script>
		document.querySelector('.search-icon-menu').addEventListener('click', function() {
    const content = document.getElementById('content_teste');    
    if (content.classList.contains('visible_content')) {
        content.classList.remove('visible_content');
        setTimeout(() => {
            content.classList.add('hidden_content');
        }, 300); 
    } else {
        content.classList.remove('hidden_content');
        setTimeout(() => {
            content.classList.add('visible_content');
        }, 300); 
    	}
		});
</script>	