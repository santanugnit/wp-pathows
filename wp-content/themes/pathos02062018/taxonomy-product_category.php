<?php
get_header(); ?>

<?php 
	$termObj 	= get_queried_object();
	$termID		= $termObj->term_id;
	
	$termImg 	= get_field('pathos_category_image', $termObj);
	
	//echo "<pre>"; echo $termImg; print_r($termObj);  echo "</pre>";
	
	
	$taxonomy     = 'product_category';
	$orderby      = 'id';  	// name
	$show_count   = 0;      // 1 for yes, 0 for no
	$pad_counts   = 0;      // 1 for yes, 0 for no
	$hierarchical = 1;      // 1 for yes, 0 for no  
	$title        = '';  
	$empty        = 0;
	
	$args2 = array(
		'taxonomy'     => $taxonomy,
		'child_of'     => 0,
		'parent'       => $termObj->term_id,
		'orderby'      => $orderby,
		'show_count'   => 0,					/* $show_count */ 
		'pad_counts'   => $pad_counts,
		'hierarchical' => $hierarchical,
		'title_li'     => $title,
		'hide_empty'   => 0 , //$empty
	);
	$sub_cats = get_categories( $args2 );
	//echo "<pre>"; print_r($sub_cats);  echo "</pre>";

?>


<table width="940" cellspacing="0" cellpadding="0" border="0" align="center">
	<tbody>
		<tr>
			<td colspan="2" valign="top" bgcolor="#a3a611" align="left">&nbsp;</td>
		</tr>
		
		<tr>
			<td colspan="2" align="left" valign="top">
				<p class="heading"><strong><?php echo $termObj->name; ?></strong></p>
				
			</td>
		</tr>
		
		<tr>
<?php 
	if($sub_cats) 
	{
		$loop = 1; $colspan = 2; $width = 940;
		foreach($sub_cats as $sub_category) 
		{			
			if( $loop == 2 ) {
				$colspan = ''; $width = 470;
				echo '</tr><tr>';
			} else if ( $loop%2 == 0 && $loop > 2 ) {
				$colspan = ''; $width = 470;
				echo '</tr><tr>';
			}
			
			$cat_image = get_field('pathos_category_image', $sub_category);
			
			
?>	
			<td colspan="<?php echo $colspan; ?>" align="left" valign="top" width="<?php echo $width; ?>"> 
				<p class="heading"><strong><img style="float:left" src="<?php echo $cat_image; ?>" width="170" height="300" alt="<?php echo _e($sub_category->name); ?>"><?php echo _e($sub_category->name); ?></strong></p>
				<p><?php echo _e($sub_category->description); ?></p>
			</td>
	
<?php
			$loop++;
		}
	} else {
?>
		
			<td colspan="2" align="center" valign="top">
				<p class="heading"><strong>No data found.</strong></p>
				
			</td>
<?php 
		
	}
?>
		</tr>
		
		
	

		<tr>
			<td colspan="2" align="center" valign="top" class="bodyfont">
			<p><strong>Many other formats &amp; sizes are available on request; please enquire at:</strong></p>
			<p>+44(0) 208 640 9398 | <a href="mailto:enquiries@pathosolives.co.uk">enquiries@pathosolives.co.uk</a></p>
			<p><em><strong><span class="heading">To view our price list,</span></strong></em> <a href="list-signup.html" class="heading"><strong><em>please click here</em></strong></a></p></td>
        </tr>

		<tr>
			<td width="470" valign="top" align="left">&nbsp;</td>
			<td width="470" valign="top" align="left">&nbsp;</td>
		</tr>

	</tbody>
</table>



<?php get_footer();
