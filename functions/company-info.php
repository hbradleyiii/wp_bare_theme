<?php wp_theme_debug(__FILE__, $output_to_header = true);

/**
 * Functions for displaying company info
 */


/**
 * Returns the string for the company address
 *
 * See also corresponding the_address() function for displaying the company
 * address.
 *
 * @return string
 */
function get_address() {
    $address = get_option('co_address');
    $city = get_option('co_city');
    $state = get_option('co_state');
    $zipcode = get_option('co_zipcode');
    if ( $address != '' ) {
        $address = '
            <address itemscope itemtype="http://schema.org/PostalAddress">
                <a target="_blank" href="https://www.google.com/maps/place/' . str_replace(" ", "+", $address.'+'.$city.'+'.$state.'+'.$zipcode) . '">
                    <span itemprop="streetAddress"> ' . $address . ' </span>
                    <span itemprop="addressLocality"> ' . $city . ', </span>
                    <span itemprop="addressRegion"> ' . $state . ' </span>
                    <span itemprop="postalCode"> ' . $zipcode . ' </span>
                </a>
            </address>
            ';
    }
    return $address;
}
function the_address() { echo get_address(); }


/**
 * Returns the string for the company phone number
 *
 * See also corresponding the_phone_number() function for displaying the
 * company address.
 *
 * @return string
 */
function get_phone_number($full = false) {
    $phone_number = get_option('co_phone');
    if ( $phone_number != '' ) { $phone_number = '<a href="tel:+1' . $phone_number . '">' . $phone_number . '</a>'; }
    if ( $full ) { $phone_number = '<span class="phone_number" itemprop="telephone">Phone: ' . $phone_number .  '</span>'; }
    return $phone_number;
}
function the_phone_number($full = false) { echo get_phone_number($full); }


/**
 * Returns the string for the company info (address, phone number, fax number)
 *
 * See also corresponding the_company_info() function for displaying the
 * company info.
 *
 * @return string
 */
function get_company_info() {
    return '
        <div class="company_info" itemscope itemtype="http://schema.org/LocalBusiness">
            <span style="display: none;" itemprop="name">' .
                get_bloginfo('name') .
            '</span> ' .
            '<span style="display: none;" itemprop="description">' .
                get_bloginfo('description') .
            '</span> ' .
            get_address() .
            get_phone_number(true) .
            get_fax_number(true) .
            '
        </div>';
}
function the_company_info() { echo get_company_info(); }


/**
 * Returns the string for the company logo
 *
 * See also corresponding the_logo() function for displaying the logo.
 *
 * @return string
 */
function get_the_logo($image) {
    return '<a href="' . get_site_url() . '" class="logo"><img src="' . get_template_directory_uri() . $image . '" alt="' . get_bloginfo('description') . '"></a>';
}
function the_logo($image) { echo get_the_logo($image); }
