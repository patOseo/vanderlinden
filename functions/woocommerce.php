<?php

/**
 * Remove related products output
 */
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );


// Redirect non-logged-in users
function vanderlinden_non_client_redirect() {
    if (
        ! is_user_logged_in()
        && (is_woocommerce() || is_cart() || is_checkout())
    ) {
        // feel free to customize the following line to suit your needs
        wp_redirect(home_url());
        exit;
    }
}
add_action('template_redirect', 'vanderlinden_non_client_redirect');