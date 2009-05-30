<?php echo '<?xml version="1.0" encoding="UTF-8"?>'."\n"; ?>
<fas_header>
	<?php
		
		if($images->num_rows()>0) {
			
			foreach($images->result() as $image) {
				
				echo '<item bgImage="'.$image->src.'"/>'."\n";
				
			}
			
		}
		
	?>
</fas_header>