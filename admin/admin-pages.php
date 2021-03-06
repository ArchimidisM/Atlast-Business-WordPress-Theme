<?php
/*
* About page in the admin Area.
* @package Atlast Business
* @since version 1.5.6
*/

function atlast_business_theme_var_boot() {
	$theme_info = array();

	$theme_data    = wp_get_theme();
	$theme_name    = trim( $theme_data->get( 'Name' ) );
	$theme_slug    = trim( strtolower( $theme_data->get( 'Name' ) ) );
	$theme_version = $theme_data->get( 'Version' );

	$theme_info['version'] = $theme_version;
	$theme_info['name']    = $theme_name;
	$theme_info['slug']    = $theme_slug;

	return $theme_info;
}

function atlast_business_set_promo_div() {
	$promo              = array();
	$promo['heading']   = esc_html__( 'PRO VERSION? DON\'T THINK SO..', 'atlast-business' );
	$promo['content']   = esc_html__( 'Atlast Business is a theme that has *PRO* features and gets updated very often.
    So there is no need at all for a "Pro" version of this theme. We only get better based on your feedback. Please rate us. ', 'atlast-business' );
	$promo['link_text'] = esc_html__( 'Rate our Theme', 'atlast-business' );
	$promo['link_url']  = esc_url( 'https://wordpress.org/support/theme/atlast-business/reviews/' );

	return $promo;
}

function atlast_business_register_tabs() {
	$tabs            = array();
	$getting_started = array(
		'tab_key'  => 'getting_started',
		'tab_name' => esc_html__( 'Getting Started', 'atlast-business' )
	);
	$documentation   = array(
		'tab_key'  => 'documentation',
		'tab_name' => esc_html__( 'Documentation / Support', 'atlast-business' )
	);
	$more_info       = array(
		'tab_key'  => 'more_info',
		'tab_name' => esc_html__( 'Extra Info', 'atlast-business' )
	);

	$tabs[] = $getting_started;
	$tabs[] = $documentation;
	$tabs[] = $more_info;

	return $tabs;
}

function atlast_business_register_about_page() {
	$theme_data    = wp_get_theme();
	$theme_name    = trim( $theme_data->get( 'Name' ) );
	$theme_slug    = trim( strtolower( $theme_data->get( 'Name' ) ) );
	$theme_version = $theme_data->get( 'Version' );

	add_theme_page(
		sprintf( __( 'Welcome to %1$s', 'atlast-business' ), ucfirst( $theme_name ) ),
		sprintf( __( 'About  %1$s', 'atlast-business' ), ucfirst( $theme_name ) ),
		'edit_theme_options',
		'atlast-business-hello',
		'atlast_business_render_about_page'
	);

	function atlast_business_render_about_page() {
		$themeVars = atlast_business_theme_var_boot();

		echo '<div class="wrap">
<div id="icon-tools" class="icon32"></div>'; ?>
        <div class="akisthemes-about-wrapper">
            <div class="akis-section akis-group d-flex center-flex">
                <div class="akis-col span_2_of_3">
                    <h2>
						<?php echo sprintf( __( 'Welcome to %1$s ', 'atlast-business' ), ucfirst( $themeVars['name'] ) ); ?><?php echo $themeVars['version']; ?>
                    </h2>
                    <h3>
						<?php
						echo esc_html__( 'You are minutes away for creating something smashing good 
                        for any kind of business. Atlast Business Theme is a fully responsive theme that gets updated really often with great features. Check the tabs below to get you started in no time.', 'atlast-business' ); ?>
                    </h3>
                </div>
				<?php
				$promo = atlast_business_set_promo_div();
				if ( ! empty( $promo ) ):
					?>
                    <div class="akis-col span_1_of_3">
                        <div class="promo-div">
                            <h3><?php echo esc_html( $promo['heading'] ); ?></h3>
                            <p>
								<?php echo esc_html( $promo['content'] ); ?>
                            </p>
                            <a target="_blank" href="<?php echo esc_url( $promo['link_url'] ); ?>"
                               class="promo-btn button button-primary button-hero">
								<?php echo esc_attr( $promo['link_text'] ); ?>
                            </a>
                        </div>
                    </div>
				<?php endif; ?>
            </div>
        </div>

		<?php
		$tabs = atlast_business_register_tabs();
		if ( ! empty( $tabs ) ):
			$active_tab = isset( $_GET['tab'] ) ? wp_unslash( $_GET['tab'] ) : 'getting_started';
			?>
            <h2 class="nav-tab-wrapper wp-clearfix akisthemes-tabs">
				<?php foreach ( $tabs as $tab ): ?>

                    <a href="<?php echo esc_url( admin_url( 'themes.php?page=atlast-business-hello' ) ); ?>&amp;tab=<?php echo esc_attr( $tab['tab_key'] ); ?>"
                       class="nav-tab <?php echo( $active_tab == $tab['tab_key'] ? 'nav-tab-active' : '' ); ?>"
                       role="tab"
                       data-toggle="tab"><?php echo esc_html( $tab['tab_name'] ); ?></a>
				<?php endforeach; ?>
            </h2>
		<?php endif; ?>

        <!-- Tab Content -->

        <div class="about-tab-content <?php echo( $active_tab == 'getting_started' ? ' show-tab-content ' : ' hide-tab-content' ); ?>">
            <div class="akis-group akis-section">
                <div class="akis-col span_1_of_2">
                    <h4><?php
						echo esc_html__( '1. Install The Recommended Plugins', 'atlast-business' ); ?></h4>
                    <p>
						<?php echo esc_html__( 'This theme comes with some recommended plugins. You can use it without them installed, however
                        if you install them you
                        use this theme with its max features. The recommended plugins appear at the top of the screen when in a notice box.', 'atlast-business' ); ?>
                    </p>
                    <p><?php echo esc_html__( 'If you haven\'t already done so, please install and activate these plugins.', 'atlast-business' ); ?> </p>
                </div>
                <div class="akis-col span_1_of_2">
                    <h4>
						<?php echo esc_html__( '2. Install the demo content.', 'atlast-business' ); ?>
                    </h4>
                    <p>
						<?php echo esc_html__( 'All our our themes comes with Predefined demo content. If you want to replicate the demo in a
                        single click just browse to "Appearance > Import Demo Data" and hit the "Import Demo Data"
                        Button.', 'atlast-business' ); ?>
                    </p>


                </div>

            </div>
        </div>
        <!-- Documentation -->
        <div class="about-tab-content <?php echo( $active_tab == 'documentation' ? ' show-tab-content ' : ' hide-tab-content' ); ?>">
            <div class="akis-group akis-section">
                <div class="akis-col span_1_of_2">
                    <h4><?php
						echo esc_html__( '1. Documentation', 'atlast-business' ); ?></h4>
                    <p>
						<?php echo esc_html__( 'This theme comes with extensive documentation. 
						You can find it by clicking the button below.', 'atlast-business' ); ?>
                    </p>
                    <a target="_blank"
                       href="<?php echo esc_url( 'https://akisthemes.com/docs/atlast-business-documentation/' ); ?>"
                       class="promo-btn button button-primary">
						<?php echo esc_html__( 'Read the Docs', 'atlast-business' ); ?>
                    </a>
                </div>
                <div class="akis-col span_1_of_2">
                    <h4>
						<?php echo esc_html__( '2. Support', 'atlast-business' ); ?>
                    </h4>
                    <p>
						<?php echo esc_html__( 'We provide awesome support through the WordPress.org forums. If you need any help just click the button below. We really respect our users. You can check our response times just by visiting the forums', 'atlast-business' ); ?>
                    </p>

                    <a target="_blank"
                       href="<?php echo esc_url( 'https://wordpress.org/support/theme/atlast-business' ); ?>"
                       class="promo-btn button button-primary">
						<?php echo esc_html__( 'I need support', 'atlast-business' ); ?>
                    </a>
                </div>

            </div>
        </div>

        <!-- Extra info -->
        <div class="about-tab-content <?php echo( $active_tab == 'more_info' ? ' show-tab-content ' : ' hide-tab-content' ); ?>">
            <div class="akis-group akis-section">
                <div class="akis-col span_1_of_2">
                    <h4><?php
						echo esc_html__( '1. Changelog', 'atlast-business' ); ?></h4>
                    <p>
						<?php echo esc_html__( 'Click the button below to learn more about the changelog of this theme. You can view all the changes that happen with any new update.', 'atlast-business' ); ?>
                    </p>
                    <a target="_blank"
                       href="<?php echo esc_url( 'https://akisthemes.com/changelog/atlast-business-theme-changelog/' ); ?>"
                       class="promo-btn button button-primary">
						<?php echo esc_html__( 'View Changelog', 'atlast-business' ); ?>
                    </a>
                </div>

            </div>
        </div>
		<?php
		echo '</div>';


	}
}

add_action( 'admin_menu', 'atlast_business_register_about_page' );

