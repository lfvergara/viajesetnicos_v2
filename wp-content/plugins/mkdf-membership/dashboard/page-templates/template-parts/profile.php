<div class="mkdf-membership-dashboard-page">
	<div class="mkdf-membership-dashboard-page-content">
		<div class="mkdf-profile-image">
            <?php echo mkdf_membership_kses_img( $profile_image ); ?>
        </div>
		<p>
			<span><?php esc_html_e( 'First Name', 'mkdf-membership' ); ?>:</span>
			<?php print $first_name; ?>
		</p>
		<p>
			<span><?php esc_html_e( 'Last Name', 'mkdf-membership' ); ?>:</span>
			<?php print $last_name; ?>
		</p>
		<p>
			<span><?php esc_html_e( 'Email', 'mkdf-membership' ); ?>:</span>
			<?php print $email; ?>
		</p>
		<p>
			<span><?php esc_html_e( 'Description', 'mkdf-membership' ); ?>:</span>
			<?php print $description; ?>
		</p>
		<p>
			<span><?php esc_html_e( 'Website', 'mkdf-membership' ); ?>:</span>
			<a href="<?php echo esc_url( $website ); ?>" target="_blank"><?php print $website; ?></a>
		</p>
	</div>
</div>
