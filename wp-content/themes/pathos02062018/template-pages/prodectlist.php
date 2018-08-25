<?php
/**
 * The template Name: Product Listing Page
 *
 */

get_header(); ?>

<?php 
	$taxonomy     = 'product_category';
	$orderby      = 'name';  
	$show_count   = 0;      // 1 for yes, 0 for no
	$pad_counts   = 0;      // 1 for yes, 0 for no
	$hierarchical = 1;      // 1 for yes, 0 for no  
	$title        = '';  
	$empty        = 1;

	$args = array(
		'taxonomy'     => $taxonomy,
		'orderby'      => $orderby,
		'show_count'   => $show_count,
		'pad_counts'   => $pad_counts,
		'hierarchical' => $hierarchical,
		'title_li'     => $title,
		'hide_empty'   => $empty
	);
	$all_categories = get_categories( $args );
	//echo "<pre>"; print_r($all_categories); echo "</pre>"; 

?>
<table width="940" cellspacing="0" cellpadding="0" border="0" align="center">
	<tbody>
		<tr>
			<td colspan="2" valign="top" bgcolor="#a3a611" align="left">&nbsp;</td>
		</tr>
		<tr>
          	<td colspan="2" valign="top" align="left">
			

<table width="100%" border="0" cellpadding="10" cellspacing="0" class="bodyarea">
	<tbody>
		<tr>
			<td colspan="3" class="heading">
				<p class="heading"><strong>PATHOS PRODUCT CATALOGUE</strong></p>
				<p class="bodyfont">Pathos Continental Foods is a leading supplier of continental foods &amp; ingredients supplying to all the trade sectors from the manufacturing sector to wholesaling sector, catering &amp; retail sectors, servicing from small independent businesses to some of the country’s largest companies. We always ensure that the products we offer are produced to the highest specification and that we offer a reliable service. We are consistently striving to make new innovative &amp; successful additions to our product range.</p>
				
				
			</td>
		</tr>
		

<?php 

	if( count($all_categories) )
	{
		foreach ($all_categories as $cat) 
		{
			if( $cat->category_parent == 0 ) 
			{

				$category_id = $cat->term_id;       
				//echo '<br /><a href="'. get_term_link($cat->slug, 'product_cat') .'">'. $cat->name .'</a><br />';
				$prod_catelogue = get_field('cat_product_images', $cat);
?>
				<tr> 
					<td colspan="3" class="heading">
						<hr>
						<p class="heading">
							<strong><a href="<?php echo $prod_catelogue; ?>"><img style="float: right; border: none;" src="<?php echo get_template_directory_uri(); ?>/assets/images/download-link.png" width="176" height="30" alt="download zip file containing product images"></a><?php echo $cat->name; ?></strong>
						</p>						
					</td>
				</tr>
			<?php 

				$args2 = array(
					'taxonomy'     => $taxonomy,
					'child_of'     => 0,
					'parent'       => $category_id,
					'orderby'      => $orderby,
					'show_count'   => 0,					/* $show_count */ 
					'pad_counts'   => $pad_counts,
					'hierarchical' => $hierarchical,
					'title_li'     => $title,
					'hide_empty'   => 1 , //$empty
				);
				$sub_cats = get_categories( $args2 );
				//echo "<pre>"; print_r($sub_cats); echo "</pre>"; 
				if($sub_cats) 
				{
					foreach($sub_cats as $sub_category) 
					{
		?>
				<tr> 
					<td colspan="3" class="heading">
						<p class="heading"><strong><?php echo $sub_category->name; ?></strong></p>
						<p class="bodyfont"> <?php echo _e($sub_category->category_description); ?> </p>
					</td>
				</tr>
		<?php
						$args3 = array(
							'post_type' => 'pathosproduct',
							'tax_query' => array(
								array(
									'taxonomy' => 'product_category',
									'field'    => 'term_id',
									'terms'    => $sub_category->term_id,
								),
							),
						);
						$the_query = new WP_Query( $args3 );
						if ( $the_query->have_posts() ) 
						{
							$i = 1;
							echo '<tr>';
							while ( $the_query->have_posts() ) 
							{
								$the_query->the_post();
								
								if( get_the_ID() == 26){ continue; }
		
								if( $i > 3 ){ echo '</tr><tr>';}
								$featured_img_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'single-post-thumbnail');
								$featured_img_thumb = get_the_post_thumbnail_url(get_the_ID(),'thumbnail');
				
					?>
					<td width="256" align="center" valign="top"><a href="<?php echo $featured_img_url[0]; ?>" title="<?php the_title(); ?>" class="bodyfont" rel="lightbox"><img src="<?php echo $featured_img_url[0]; ?>" alt="<?php the_title(); ?>" width="290" height="290" border="0"><br><?php the_title(); ?></a></td>
					
					<?php							
								$i++;
							}
							echo '</tr>';
							wp_reset_postdata();
						}
		
					
					}  

				}

			}
			
		}

	}
	

?>
	
						</tbody>
					</table>

				</td>
			</tr>

			<tr>
				<td colspan="2" class="bodyfont" valign="top" align="center"><p class="heading"><strong>Please enquire at&nbsp;<a href="mailto:enquiries@pathosolives.co.uk" class="heading"><strong>enquiries@pathosolives.co.uk</strong></a> or +44(0) 208 640 9398</strong></p></td>
			</tr>

			<tr>
				<td width="470" valign="top" align="left">&nbsp;</td>
				<td width="470" valign="top" align="left">&nbsp;</td>
			</tr>

		</tbody>
	</table>


	
		

<?php get_footer();
