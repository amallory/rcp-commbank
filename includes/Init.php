<?php

namespace RCPCommbank;


class Init {

	/**
	 * @var
	 */
	protected static $_instance;

	/**
	 * Only make one instance of Init
	 *
	 * @return Init
	 */
	public static function get_instance() {
		if ( ! self::$_instance instanceof Init ) {
			self::$_instance = new self();
		}

		return self::$_instance;
	}

	/**
	 * Add Hooks and Actions
	 */
	protected function __construct() {
		add_filter( 'rcp_payment_gateways', array( $this, 'add_gateway' ) );
		add_action( 'rcp_payments_settings', array( $this, 'settings' ) );
	}

	/**
	 *
	 * @since  1.0.0
	 *
	 * @return mixed
	 */
	public function add_gateway( $gateways ) {
		$gateways['commbank'] = array(
			'label'       => 'Commbank',
			'admin_label' => 'Commbank',
			'class'       => 'Commbank\\Gateway'
		);

		return $gateways;
	}

	/**
	 * Add Commbank settings
	 *
	 * @param $rcp_options
	 *
	 * @since  1.0.0
	 */
	public function settings( $rcp_options ) {
		?>
		<table class="form-table">
			<tr valign="top">
				<th colspan=2>
					<h3><?php _e( 'Commbank Settings', rcpcommbank()->get_id() ); ?></h3>
				</th>
			</tr>
			<tr>
				<th>
					<label for="rcp_settings[rcpcommbank_profile_id]"><?php _e( 'Profile ID', rcpcommbank()->get_id() ); ?></label>
				</th>
				<td>
					<input class="regular-text" id="rcp_settings[rcpcommbank_profile_id]" style="width: 300px;" name="rcp_settings[rcpcommbank_profile_id]" value="<?php echo isset( $rcp_options['rcpcommbank_profile_id'] ) ? $rcp_options['rcpcommbank_profile_id'] : '' ; ?>" />
					<p class="description"><?php _e( 'Enter your profile id.', rcpcommbank()->get_id() ); ?></p>
				</td>
			</tr>
			<tr>
				<th>
					<label for="rcp_settings[rcpcommbank_access_key]"><?php _e( 'Access Key', rcpcommbank()->get_id() ); ?></label>
				</th>
				<td>
					<input class="regular-text" id="rcp_settings[rcpcommbank_access_key]" style="width: 300px;" name="rcp_settings[rcpcommbank_access_key]" value="<?php echo isset( $rcp_options['rcpcommbank_access_key'] ) ? $rcp_options['rcpcommbank_access_key'] : '' ; ?>" />
					<p class="description"><?php _e( 'Enter your access key.', rcpcommbank()->get_id() ); ?></p>
				</td>
			</tr>
			<tr>
				<th>
					<label for="rcp_settings[rcpcommbank_secret_key]"><?php _e( 'Secret Key', rcpcommbank()->get_id() ); ?></label>
				</th>
				<td>
					<textarea id="rcp_settings[rcpcommbank_secret_key]" style="width: 300px;" rows="3" name="rcp_settings[rcpcommbank_secret_key]"><?php echo isset( $rcp_options['rcpcommbank_secret_key'] ) ? esc_textarea( $rcp_options['rcpcommbank_secret_key'] ) : '' ; ?></textarea>
					<p class="description"><?php _e( 'Enter your secret key.', rcpcommbank()->get_id() ); ?></p>
				</td>
			</tr>
			<tr>
				<td colspan="2"><p><?php printf( __( '<strong>IMPORTANT</strong>: Update the CyberSource Transaction Response Page and Cancel Response Page to %s.', rcpcommbank()->get_id() ), add_query_arg( 'listener', 'rcpcommbank', get_home_url() ) ); ?></p></td>
			</tr>
		</table>

		<?php
	}
}