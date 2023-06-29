<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action('after_setup_theme', 'load_carbon_fields');
add_action('carbon_fields_register_fields', 'create_options_page');

function load_carbon_fields()
{
    \Carbon_Fields\Carbon_Fields::boot();
}


function create_options_page()
{
    Container::make( 'theme_options', 'Stratis Plugin Test' )
    ->set_icon('dashicons-media-text')
    ->add_fields( array(

        Field::make( 'checkbox', 'test_plugin_active', __('Active') )
        ->set_option_value( 'yes' ),

        Field::make( 'text', 'test_plugin_recipients', __('Recipient Emails'))
        ->set_attribute( 'placeholder', 'eg. your@email.com' )
        ->set_help_text('The email that the form is submitted to'),

        Field::make( 'text', 'test_plugin_message', __('Confirmation Message'))
        ->set_attribute( 'placeholder', 'Type Your Message Here' )
        ->set_help_text('Type the message that you want the submitter to receive'),
    ) );
}

?>