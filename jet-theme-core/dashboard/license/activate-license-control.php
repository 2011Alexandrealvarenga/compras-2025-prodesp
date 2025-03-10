<?php
/**
 * Activate license control
 */
?>
<div class="jet-core-license">
	<p><?php
		esc_html_e( 'Enter your Order ID here, to activate Prodesp, and get feature updates, premium support and unlimited access to the template library.', 'Prodesp' );
	?></p>

	<ol>
		<li><?php esc_html_e( 'Log in to your account to get your license key.', 'Prodesp' ); ?></li>
		<li><?php esc_html_e( 'Copy the license key from your account and paste it below.', 'Prodesp' ); ?></li>
	</ol>

	<label for="jet_core_license"><?php esc_html_e( 'Your License Key', 'Prodesp' ); ?></label>
	<div class="jet-core-license__form">
		<input id="jet_core_license" class="jet-core-license__input cx-ui-text" placeholder="<?php esc_html_e( 'Please enter your license key here', 'Prodesp' ); ?>">
		<button type="button" class="cx-button cx-button-primary-style" id="jet_activate_license"><?php
			esc_html_e( 'Activate', 'Prodesp' );
		?></button>
	</div>
	<div class="jet-core-license__errors"><?php echo $error_message; ?></div>

</div>