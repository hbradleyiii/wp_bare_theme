<?php wp_template(__FILE__, true);

////////////////////////////////////////////////////////////
// functions/company-info.php - functions for displaying company info


// get_address()
//    returns the string for the company address
function get_address() { 
    $address = get_option('co_address');
    $city = get_option('co_city');
    $state = get_option('co_state');
    $zipcode = get_option('co_zipcode');
    if ( $address != '' ) { 
        $address = '
            <address itemscope itemtype="http://schema.org/PostalAddress">
                <span itemprop="address">
                    <span itemprop="streetAddress"> ' . $address . ' </span>
                    <span itemprop="addressLocality"> ' . $city . ', </span>
                    <span itemprop="addressRegion"> ' . $state . ' </span>
                    <span itemprop="postalCode"> ' . $zipcode . ' </span>
                </span>
            </address>
            ';
    }
    return $address;
}
function the_address() { echo get_address(); }


// get_phone_number()
//    returns the string for the phone number
function get_phone_number($full = false) { 
    $phone_number = get_option('co_phone');
    if ( $phone_number != '' ) { $phone_number = '<a href="tel:+1' . $phone_number . '">' . $phone_number . '</a>'; }
    if ( $full ) { $phone_number = '<span class="phone_number" itemprop="telephone">Phone: ' . $phone_number .  '</span>'; }
    return $phone_number;
}
function the_phone_number($full = false) { echo get_phone_number($full); }


// get_company_info()
//    returns the string with the formatted company info
function get_company_info() {
    return '
        <span class="company_info" itemscope itemtype="http://schema.org/LocalBusiness">
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
        </span>';
}
function the_company_info() { echo get_company_info(); }


// get_the_logo()
//    returns the string with a formatted logo using $image
function get_the_logo($image) {
    return '<a href="' . get_site_url() . '" class="logo"><img src="' . get_template_directory_uri() . $image . '" alt="' . get_bloginfo('description') . '"></a>';
}
function the_logo($image) { echo get_the_logo($image); }

?>
