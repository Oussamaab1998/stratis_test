<?php

add_shortcode('stratis_plugin','show_stratis_plugin_form');

add_action('rest_api_init', 'create_rest_endpoint');


add_action('init', 'create_messages_page');





function create_messages_page()
{
    $args = [
        'public' => true,
        'has_archive' => true,
        'labels' => [
            'name' => 'Messages',
            'singular_name' => 'Message'
        ],
        'supports' => ['custom-fields']
        // 'capabilities' => ['create_posts' => 'do_not_allow']
    ];


    register_post_type('message',$args);
}

function show_stratis_plugin_form()
{
    include MY_PLUGIN_PATH . '/includes/templates/stratis-plugin.php';
}


function create_rest_endpoint()
{
    register_rest_route('v1/stratis-plugin','submit',array(
        'methods' => 'POST',
        'callback' => 'handle_enquiry'
    ));
}




function handle_enquiry($data)
{
    $params = $data->get_params();

    $args = array(
        'post_type' => 'message',
        'post_status' => 'draft',
        'posts_per_page' => -1,
    );
    $ajaxposts = get_posts( $args );
    
    // $query = new WP_Query($args);
    
    if (count($ajaxposts) > 0) {


        foreach($ajaxposts as $post => $post_value) {
            if($post_value->titre === $params['titre']){
                // alert("il y a un autre article avec ce titre");
                return new WP_Rest_Response('Il y a un autre article avec ce titre', 422);
            }
        }


        // while ($query->have_posts()) {
        //     $query->the_post();
        //     $post_title = get_the_title(); // Retrieve the title of the current post
        //     // Compare the post title with user input
        //     if ($post_title === $params['titre']) {
        //         // Perform actions if the title matches user input
        //         alert("il y a un autre article avec ce titre");
        //         return new WP_Rest_Response('Message non envoyé', 422);
        //     }
        // }
    }

  

    if ( !wp_verify_nonce($params['_wpnonce'], 'wp_rest'))
    {
        return new WP_Rest_Response('Message non envoyé', 422);
    }

    unset($params['_wpnonce']);
    unset($params['_wp_http_referer']);

    // HERE The code of sent the message
    $admin_email = get_bloginfo('admin_email');
    $admin_name = get_bloginfo('name');

    $headers = [];
    $headers[] = "From: {$admin_name} <{$admin_email}>";
    $headers[] = "Reply-to:  Oussama Abdallah";
    $headers[] = "Content-Type: text/html";
    $subject = "Nouveau message :  {$params['titre']}";

    $message = '';
    $message .= "<h1>Le titre de message est : {$params['titre']}</h1>";

    
    $postarr = [
        'post_title' => $params['titre'],
        'post_type' => 'message'
    ];

    $post_id = wp_insert_post($postarr);

    foreach($params as $label => $value)
    {
        $message .='<strong>' . ucfirst($label) . '</strong> :' . $value . '<br />';
        add_post_meta($post_id,$label,$value);
    }



 

    wp_mail($admin_email, $subject, $message, $headers);

    return new WP_Rest_Response('Le message a été envoyé avec succès', 200);
}