<?php wp_template(__FILE__, true);

////////////////////////////////////////////////////////////
// header.php - displays header

?><!DOCTYPE html>
<html lang="en-US" class="no-js">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
    <title><?php wp_title( ' | ', true, 'right' ); ?>Title</title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

    <header>

    </header>
