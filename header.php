<?php wp_template(__FILE__, true);

////////////////////////////////////////////////////////////
// header.php - displays header

?><!DOCTYPE html>
<html lang="en-US" class="no-js">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico" />
    <?php wp_indent("wp_head"); ?>
</head>
<body <?php body_class(); ?>>

    <header>

    </header>
