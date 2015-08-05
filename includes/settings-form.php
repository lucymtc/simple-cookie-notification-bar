<div class="wrap scnb">
	
	<h1><?php _e('Simple Cookie Notification Bar Settings', 'scnb_domain'); ?></h1>
	
	<div id="alert"></div>
	
	<form method="post" action="options.php">
				
	<?php settings_fields( 'scnb_settings_group' ); ?>

	<div class="row col2">

		<h2><?php _e('Strings', 'scnb_domain'); ?></h2>
		
		<div class="column left">		

			<div class="block XL">
				<label class="description" for="scnb_settings[message]"><?php _e('Message', 'scnb_domain'); ?></label><br/>
				<textarea id="scnb_settings[message]" 
						name="scnb_settings[message]" ><?php echo esc_textarea($options['message']); ?></textarea>
			</div>

		</div><!--column-->	

		<div class="column right">		

			<div class="block XL">
				<label class="description" for="scnb_settings[ok-label]"><?php _e('Label Accept button', 'scnb_domain'); ?></label><br/>
				<input id="scnb_settings[ok-label]" 
					name="scnb_settings[ok-label]" 
					type="text" 
					value="<?php echo esc_attr($options['ok-label']); ?>"/>
			</div>

			<div class="block XL">
				<label class="description" for="scnb_settings[more-info-label]"><?php _e('Label More info button', 'scnb_domain'); ?></label><br/>
				<input id="scnb_settings[more-info-label]" 
					name="scnb_settings[more-info-label]" 
					type="text" 
					value="<?php echo esc_attr($options['more-info-label']); ?>"/>
			</div>

			<div class="block XL">
				<label class="description" for="scnb_settings[more-info-url]"><?php _e('Link More info', 'scnb_domain'); ?></label><br/>
				<input id="scnb_settings[more-info-url]" 
					name="scnb_settings[more-info-url]" 
					type="text" 
					value="<?php echo esc_url($options['more-info-url']); ?>"/>
			</div>

		</div><!--column-->	
	</div><!--row-->

	<div class="row col4">

		<h2><?php _e('Style', 'scnb_domain'); ?></h2>

			<!--COLUMN 1 General style -->
			
			<div class="column left">

				
				<div class="block XS">
				 	<label for="scnb_settings[font-size]"><b><?php _e('Font Size', 'scnb_domain' ); ?></b></label><br/>
				    <input type="text" 
				        id="scnb_settings[font-size]" 
				        name="scnb_settings[font-size]" 
				        value="<?php echo esc_attr( $options['font-size'] ); ?>" /> px 
				</div>   
				
				<div class="block S">
				 	<label for="scnb_settings[text-align]"><b><?php _e('Text Align', 'scnb_domain' ); ?></b></label><br/>
			        <select name="scnb_settings[text-align]">
			  			<option value="center" <?php selected( $options['text-align'], 'center' ) ?>><?php _e('center', 'scnb_domain' ); ?></option>
			  			<option value="left" <?php  selected( $options['text-align'], 'left' ) ?>><?php _e('left', 'scnb_domain' ); ?></option>
			            <option value="right" <?php selected( $options['text-align'], 'right' ) ?>><?php _e('right', 'scnb_domain' ); ?></option>
			            <option value="justify" <?php selected( $options['text-align'], 'justify' ) ?>><?php _e('justify', 'scnb_domain' ); ?></option>
			        </select>		
				</div>   

				<div class="block">
				 	<input type="checkbox" 
					    id="scnb_settings[display-shadow]" 
					    name="scnb_settings[display-shadow]" 
					    value="1" <?php checked( 1, $options['display-shadow']) ?> />  

					<label for="scnb_settings[display-shadow]"><b><?php _e('Display Shadow', 'scnb_domain' ); ?></b></label>
				</div> 

			</div><!--column-->	

			<!--COLUMN 2 General Colors -->

			<div class="column">

				<div class="block color-picker">
				 	 <label for="scnb_settings[text-color]"><b><?php _e( 'Text color', 'scnb_domain' ); ?></b></label><br/>
			         <input class="scnb-text-color colorpicker" 
			            type="text" 
			            id="scnb_settings[text-color]" 
			            name="scnb_settings[text-color]" 
			            value="<?php echo esc_attr( $options['text-color'] ); ?>" />  
				</div>  


				<div class="block color-picker">
				 	<label for="scnb_settings[background-color]"><b><?php _e( 'Background color', 'scnb_domain' ); ?></b></label><br/>
				 	<input class="scnb-bg-color colorpicker" 
				        type="text" 
				        id="scnb_settings[background-color]" 
				        name="scnb_settings[background-color]" 
				        value="<?php echo esc_attr( $options['background-color'] ); ?>" />
				</div>   

				<div class="block color-picker">
				 	<label for="scnb_settings[border-color]"><b><?php _e('Top Border color', 'scnb_domain' ); ?></b></label><br/>
				    <input class="scnb-border-color colorpicker" 
				       	type="text" 
				        id="scnb_settings[border-color]" 
				        name="scnb_settings[border-color]" 
				        value="<?php echo esc_attr( $options['border-color'] ); ?>" />
				</div>   

			</div><!--column-->	

			<!--COLUMN 3 Button Colors -->

			<div class="column right">
				
				<div class="block color-picker">
				 	<label for="scnb_settings[ok-background-color]"><b><?php _e( 'Buttons background color', 'scnb_domain' ); ?></b></label><br/>
				    <input class="scnb-buttons-bg-color colorpicker" 
				        type="text" 
				        id="scnb_settings[ok-background-color]" 
				        name="scnb_settings[ok-background-color]" 
				        value="<?php echo esc_attr( $options['ok-background-color'] ); ?>" />
				</div>  

				<div class="block color-picker">
				 	<label for="scnb_settings[button-border-color]"><b><?php _e( 'Buttons border color', 'scnb_domain' ); ?></b></label><br/>
				    <input class="scnb-button-border-color colorpicker" 
				        type="text" 
				        id="scnb_settings[button-border-color]" 
				        name="scnb_settings[button-border-color]" 
				        value="<?php echo esc_attr( $options['button-border-color'] ); ?>" />
				</div>  

				<div class="block color-picker">
				 	<label for="scnb_settings[ok-text-color]"><b><?php _e( 'Buttons text color', 'scnb_domain' ); ?></b></label><br/>
				    <input class="scnb-buttons-text-color colorpicker" 
				        type="text" 
				        id="scnb_settings[ok-text-color]" 
				        name="scnb_settings[ok-text-color]" 
				        value="<?php echo esc_attr( $options['ok-text-color'] ); ?>" />
				</div>  

			</div><!--column-->	

	</div><!--row-->

	<div class="block">
		<input type="submit" class="button-primary" value="<?php _e('Save Options', 'digisds_domain'); ?>" />
	</div>	
					
	</form>	
	
</div>