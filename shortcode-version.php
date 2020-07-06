<?php //<~ don't add me in - add the code below in functions.php


add_shortcode( 'wpb_bs_accordion_acf', 'wpb_bs_accordion_acf' );
/**
* Bootstrap Accordion Repeater Field 
*/
function wpb_bs_accordion_acf() {
ob_start();

// *Repeater
// bootstrap_accordion_repeater
// *Sub-Fields
// accordion_header
// accordion_content

?>


<?php

// check if the repeater field has rows of data
if( have_rows('accordion_repeater') ):
	$i = 1; // Set the increment variable
	
	echo '<div id="accordion">';
 	
 	// loop through the rows of data for the tab header
    while ( have_rows('accordion_repeater') ) : the_row();
		
		$header = get_sub_field('accordion_header');
		$content = get_sub_field('accordion_content');

	?>
		
		<div class="card">
		    <div class="card-header" id="heading-<?php echo $i;?>">
		      <h5 class="mb-0">
		        <button class="btn btn-link" data-toggle="collapse" data-target="#collapse-<?php echo $i;?>" aria-expanded="true" aria-controls="collapse-<?php echo $i;?>">
		          <?php echo $header; ?>
		        </button>
		      </h5>
		    </div>
		
		    <div id="collapse-<?php echo $i;?>" class="collapse" aria-labelledby="heading-<?php echo $i;?>" data-parent="#accordion">
		      <div class="card-body">
		        <?php echo $content; ?>
		      </div>
		    </div>
		 </div>    
		
		
	<?php $i++; // Increment the increment variable
		
	endwhile; //End the loop 
	
	echo '</div>';

else :

    // no rows found
    echo 'Come back tomorrow';

endif;
  
return ob_get_clean();
}
