<?php do_action('scnb_before_notification'); ?>

<div id="scnb-cookie-bar">
		<div class="wrap">
			
			<div class="scnb-text"><?php echo  $options['message'] ; ?></div>
			<div class="scnb-buttons">

					<?php if( $options['more-info-label'] != '' ){ ?>
							<a href="<?php echo esc_url( $options['more-info-url'] ) ?> " target="_blank" id="scnb-cookie-info"><?php echo esc_attr( $options['more-info-label'] ) ?></a>
					<?php } ?>
					<a href="javascript:void(0);" id="scnb-cookie-accept"><b><?php echo esc_attr( $options['ok-label'] ) ?></b></a>
			</div>
			
		</div>
</div>

<?php do_action('scnb_after_notification'); ?>