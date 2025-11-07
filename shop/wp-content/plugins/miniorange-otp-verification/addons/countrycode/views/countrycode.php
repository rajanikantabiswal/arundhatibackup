<?php
/**
 * View for Country restriction addon
 *
 * @package category.
 */

echo '	<div class="mo_registration_divided_layout w-full">';


echo '		   
					<form name="f" method="post" action="" id="selected_countries_settings">
						<input type="hidden" id="error_message" name="error_message" value="">
						<input type="hidden" name ="option" value="mo_selected_countrycode_value" />';

						wp_nonce_field( $nonce );

echo '			            <div class="mo-header">
								<p class="mo-heading flex-1">' . esc_html( mo_( 'Country Restriction Settings' ) ) . '</p>
								<a  href="' . esc_url( $guide_link ) . '" 
									target="_blank" 
									id="mo-addon-guide">
									<svg width="24" height="24" viewBox="0 0 24 24" fill="none">
										<g clip-path="url(#clip0_1_3)">
											<path d="M22.204 1.162C21.063 0.210003 19.57 -0.180996 18.106 0.0810035L14.284 0.776004C13.371 0.943004 12.578 1.41 12 2.065C11.422 1.41 10.629 0.942004 9.715 0.776004L5.894 0.0820035C4.433 -0.180996 2.938 0.210003 1.796 1.162C0.654 2.115 0 3.514 0 5.001V17.793C0 20.21 1.727 22.279 4.106 22.712L10.39 23.855C10.924 23.952 11.462 24.001 12 24.001C12.538 24.001 13.076 23.953 13.61 23.855L19.895 22.712C22.274 22.279 24 20.21 24 17.793V5.001C24 3.514 23.345 2.115 22.204 1.162ZM11 21.928C10.916 21.916 4.464 20.744 4.464 20.744C3.036 20.484 2 19.243 2 17.792V5.001C2 4.109 2.393 3.27 3.078 2.698C3.623 2.243 4.301 2.001 4.997 2.001C5.176 2.001 5.357 2.017 5.537 2.05L9.358 2.745C10.31 2.918 11.001 3.746 11.001 4.713V21.929L11 21.928ZM22 17.793C22 19.244 20.964 20.485 19.537 20.745C19.537 20.745 13.085 21.916 13 21.929V4.712C13 3.745 13.691 2.918 14.642 2.744L18.463 2.049C19.341 1.888 20.236 2.125 20.922 2.697C21.607 3.269 22 4.108 22 5V17.793ZM8.984 6.224C8.896 6.707 8.475 7.045 8.001 7.045C7.942 7.045 4.821 6.483 4.821 6.483C4.278 6.384 3.917 5.864 4.016 5.32C4.115 4.777 4.631 4.419 5.179 4.515L8.179 5.06C8.722 5.159 9.083 5.68 8.984 6.224ZM8.984 10.179C8.896 10.662 8.475 11 8.001 11C7.942 11 4.821 10.438 4.821 10.438C4.278 10.339 3.917 9.819 4.016 9.275C4.115 8.732 4.631 8.372 5.179 8.47L8.179 9.015C8.722 9.114 9.083 9.635 8.984 10.179ZM8.984 14.179C8.896 14.662 8.475 15 8.001 15C7.942 15 4.821 14.438 4.821 14.438C4.278 14.339 3.917 13.819 4.016 13.275C4.115 12.732 4.631 12.373 5.179 12.47L8.179 13.015C8.722 13.114 9.083 13.635 8.984 14.179ZM19.984 5.322C20.083 5.865 19.722 6.386 19.179 6.485C19.179 6.485 16.058 7.047 15.999 7.047C15.525 7.047 15.104 6.709 15.016 6.226C14.917 5.683 15.278 5.162 15.821 5.063L18.821 4.518C19.362 4.421 19.885 4.779 19.984 5.322ZM19.984 9.277C20.083 9.82 19.722 10.341 19.179 10.44C19.179 10.44 16.058 11.002 15.999 11.002C15.525 11.002 15.104 10.664 15.016 10.181C14.917 9.638 15.278 9.117 15.821 9.018L18.821 8.473C19.362 8.375 19.885 8.734 19.984 9.277ZM19.984 13.277C20.083 13.82 19.722 14.341 19.179 14.44C19.179 14.44 16.058 15.002 15.999 15.002C15.525 15.002 15.104 14.664 15.016 14.181C14.917 13.638 15.278 13.117 15.821 13.018L18.821 12.473C19.362 12.376 19.885 12.734 19.984 13.277ZM17.984 17.641C18.083 18.184 17.722 18.705 17.179 18.804C17.179 18.804 16.058 19.002 15.999 19.002C15.525 19.002 15.104 18.664 15.016 18.181C14.917 17.638 15.278 17.117 15.821 17.018L16.821 16.836C17.37 16.738 17.885 17.098 17.984 17.641ZM6.984 17.862C6.896 18.345 6.475 18.683 6.001 18.683C5.942 18.683 4.821 18.485 4.821 18.485C4.278 18.386 3.917 17.866 4.016 17.322C4.115 16.779 4.631 16.416 5.179 16.517L6.179 16.699C6.722 16.798 7.083 17.318 6.984 17.862Z" fill="black"/>
										</g>
										<defs>
											<clipPath id="clip0_1_3">
												<rect width="24" height="24" fill="white"/>
											</clipPath>
										</defs>
									</svg>
								</a>
								<a  href="' . esc_url( $addon ) . '" 
												id="goBack" 
												class="mo-button secondary">
												' . esc_html( mo_( 'Go Back' ) ) . '
											</a>
								<input type="submit" name="save" id="ov_settings_button" 
											class="mo-button inverted" ' . esc_attr( $disabled ) . ' value="' . esc_attr( mo_( 'Save Settings' ) ) . '">
							</div>


							<div class="border-b flex flex-col gap-mo-6 px-mo-4">
							<div class="w-full flex m-mo-4">
								<div class="flex-1">
									<h5 class="mo-title">Enable OTP on Selected countries</h5>
									<p class="mo-caption mt-mo-2">OTP will be only sent to the selected countries. OTP will be blocked for all other countries. Country code dropdown will be altered accordingly.</p>
								</div>
					
								<div class="flex-1">
									<input  type="checkbox" ' . esc_attr( $disabled ) . ' 
											id="selected_country_code" 
											value="' . esc_attr( $sc_enabled ) . '" ' . ( esc_attr( $sc_type ) === esc_attr( $sc_enabled ) ? 'checked' : '' ) . '
											data-toggle="blocked_country_settings" 
											class="mo_otp_box" 
											name="mo_customer_validation_sc_type" />
									<strong>
										' . esc_html( mo_( 'Enable this radio to send OTPs to mentioned countries below.' ) ) . '
									</strong>
									<div class="mo_registration_help_desc" style="border-left:none;" ' . ( esc_attr( $sc_type ) !== esc_attr( $sc_enabled ) ? 'hidden' : '' ) . '
									id="blocked_country_settings">';


											$_all_country_list = get_sc_option( 'allcountrywithcountrycode' );
										echo '
														 
												<select name="mo_country_dropdown" class="country_dropdown" id = "country_dropdown" >
													<option value="">---Select Your Country---</option> ';

foreach ( $_all_country_list as $key => $value ) {
		echo '<option value=' . esc_attr( $value['countryCode'] ) . '>' . esc_attr( $value['name'] ) . '</option>';
}
										echo '	</select> 
										<div id="selected_country_settings" class="w-[95%] py-mo-4 pr-mo-4">
											<div class="mo-input-wrapper">
												<label class="mo-input-label">' . esc_attr( mo_( 'Allowed Countries' ) ) . '</label>
													<textarea   name="mo_selected_country_numbers" id="mo_selected_country_numbers" class="mo-textarea"
														rows="5" 
														placeholder="' . esc_attr( mo_( 'Select countries you want to show.' ) ) . '">' .
														esc_attr( $otp_selected_countries_list ) .
													'</textarea>
											</div>
										</div>
										</div>
									</div>
								</div>
								</div>

								<div class="border-b flex flex-col gap-mo-6 px-mo-4">
							<div class="w-full flex m-mo-4">
								<div class="flex-1">
									<h5 class="mo-title">Disable OTP on Selected countries</h5>
									<p class="mo-caption mt-mo-2">OTP will be blocked for the selected countries. OTP will be enabled for all other countries. Country code dropdown will be altered accordingly.</p>
								</div>
					
								<div class="flex-1">

										<input  type="checkbox" ' . esc_attr( $disabled ) . ' 
												id="block_selected_country_code" 
													value="' . esc_attr( $sc_block ) . '" ' . ( esc_attr( $sc_type ) === esc_attr( $sc_block ) ? 'checked' : '' ) . '
												data-toggle="block_blocked_country_settings" 
												class="mo_otp_box"  
												name="mo_customer_validation_sc_type" />
										<strong>' . esc_html( mo_( 'Enable this radio to block OTPs to mentioned countries below.' ) ) . '</strong>
											<div class="mo_registration_help_desc" style="border-left:none;" ' . ( esc_attr( $sc_type ) !== esc_attr( $sc_block ) ? 'hidden' : '' ) . ' 
												id="block_blocked_country_settings">';


													$_all_country_list = get_sc_option( 'allcountrywithcountrycode' );
													echo '
														 
														<select name="mo_country_block_dropdown" class="country_block_dropdown" id = "country_block_dropdown" >
															<option value="">---Select Your Country---</option> ';

foreach ( $_all_country_list as $key => $value ) {
		echo '<option value=' . esc_attr( $value['countryCode'] ) . '>' . esc_attr( $value['name'] ) . '</option>';
}
												echo '  </select>
												<div id="disabled_country_settings" class="w-[95%] py-mo-4 pr-mo-4"> 
													<div class="mo-input-wrapper">
														<label class="mo-input-label">' . esc_attr( mo_( 'Blocked Countries' ) ) . '</label>
															<textarea   name="mo_block_selected_country_numbers" class="mo-textarea"
																id="mo_block_selected_country_numbers"
																rows="5" 
																placeholder="' . esc_attr( mo_( 'Select countries you want to block.' ) ) . '">' . esc_attr( $otp_block_selected_countries_list ) .
															'</textarea>  
													</div>
												</div>
											</div>
								</div>
						</form> 
								
			</div>

';

