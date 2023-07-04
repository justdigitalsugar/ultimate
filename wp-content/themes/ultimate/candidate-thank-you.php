<?php
/*
Template Name: Candidate Thank You
*/

if (isset($_POST['firstname'])) {

  $firstname = sanitize($_POST['firstname']);
  $lastname = sanitize($_POST['lastname']);
  $email = sanitize($_POST['email']);
  $phone = sanitize( $_POST['phone']);
  $username = sanitize($_POST['username']);
  $password = sanitize($_POST['password']);

  // Set the candidate data
  $data = array(
    'data' => array(
      'type' => 'candidates',
      'attributes' => array(
        'first-name' => $firstname,
        'last-name' => $lastname,
        'email' => $email,
        'phone' => $phone,
      )
    )
  );

  // Set the API endpoint URL
  $url = 'https://api.teamtailor.com/v1/candidates';
  $api_key = 'dnG0iLcG6GApSmAZ6IfrK0riKKh6emVDWVKEaWBv';

  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt(
    $ch,
    CURLOPT_HTTPHEADER,
    array(
      'Authorization: Token token=' . $api_key,
      'Content-Type: application/vnd.api+json',
      'X-Api-Version: 20210218'
    )
  );
  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

  $response = curl_exec($ch);

  curl_close($ch);

if ($response === false) {
    // Handle the error
} else {
    // Get the ID of the newly created user in Teamtailor
    $result = json_decode($response);

    

    $teamtailor_user_id = $result->data->id;
#
    // Create the user in WordPress and store the Teamtailor user ID as a user meta field
    $user_id = wp_create_user($username, $password, $email);
    if (!is_wp_error($user_id)) {
        update_user_meta($user_id, 'teamtailor_user_id', $teamtailor_user_id);
        update_user_meta( $user_id, 'first_name', $firstname );
        update_user_meta( $user_id, 'last_name', $lastname );
    } else {
        // Handle the error
    }
}
}

?>

<?php get_header(); ?>

<div id="content" class="lg:h-screen lg:flex w-full">
    <div class="w-full lg:w-1/3 h-full bg-gray-100 flex items-center justify-center pt-44 pb-20">
        <div class="w-4/5 mx-auto lg:w-2/3">
            <div class="max-w-3xl mx-auto login-form w-full">

            <div class="text-center">
            <h1 class="text-3xl">Thanks for applying, <span class="capitalize"><?php echo $firstname; ?></span></h1>
            </div>

            <form name="loginform" id="loginform" action="<?php echo wp_login_url(); ?>" method="post">
                <p class="login-username w-full">
                    <label for="user_login"><?php _e( 'Username or Email Address', 'custom-login-form' ); ?></label>
                    <input type="text" name="log" id="user_login" class="input" value="" size="20"
                        autocapitalize="off" />
                </p>
                <div class="login-password">
                    <label for="user_pass"><?php _e( 'Password', 'custom-login-form' ); ?></label>
                    <input type="password" name="pwd" id="user_pass" class="input" value="" size="20" />
                </div>
                <div class="login-submit">
                    <input type="submit" name="wp-submit" id="wp-submit" class="button button-primary hover:text-black"
                        value="<?php esc_attr_e( 'Log In', 'custom-login-form' ); ?>" />
                    <input type="hidden" name="redirect_to" value="<?php echo esc_attr( home_url() ); ?>" />
                </div>
            </form>

        </div>
        </div>
    </div>
    <div class="w-full lg:w-2/3 h-full flex items-center justify-center relative min-h-[300px]">
    <img class="absolute left-0 top-0 h-full w-full object-cover" src="/wp-content/uploads/2023/04/team.jpg" title="team" srcset="/wp-content/uploads/2023/04/team.jpg 800w, /wp-content/uploads/2023/04/team-300x300.jpg 300w, /wp-content/uploads/2023/04/team-150x150.jpg 150w, /wp-content/uploads/2023/04/team-768x768.jpg 768w" sizes="(max-width: 800px) 100vw, 800px" alt="" height="700" width="1000">
    </div>
</div>

<?php get_footer(); ?>