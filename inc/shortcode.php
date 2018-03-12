<?php

//add a shortcode which calls the above function
add_shortcode('loggedin', 'bcloggedin_check_user' );

function bcloggedin_check_user ($params, $content = null){
  //check tha the user is logged in
  if ( is_user_logged_in() ){
      global $wp_roles;
      $rc_roles = $wp_roles->roles;
      
      $rc_atts = shortcode_atts( $rc_roles, $params );
      print_r($rc_roles);
      global $current_user;
      wp_get_current_user();
      $user_now = new WP_User();

      $user_now_role = $user_now->roles;
      foreach ($user_now_role as $role) {
        echo $role;
      }
      //user is logged in so show the content
      return $content;
    }
  else {
    //user is not logged in so hide the content
    return;
  }
}

//add a shortcode which calls the above function
add_shortcode('loggedout', 'bcloggedout_check_user' );

function bcloggedout_check_user ($params, $content = null){
  //check tha the user is logged in
  if ( !is_user_logged_in() ){

    //user is not logged in so show the content
    return $content;

  }

  else{

    //user is not logged in so hide the content
    return;

  }

}

?>
