<?php 

if (isset($_POST['firstname'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
  
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
  
    var_dump(json_encode($data));
  
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
  
  // Check if the request was successful
  if ($response === false) {
      // Handle the error
  } else {
      // Get the ID of the newly created user in Teamtailor
      $teamtailor_user_id = json_decode($response)->id;
  
      // Create the user in WordPress and store the Teamtailor user ID as a user meta field
      $user_id = wp_create_user($username, $password, $email);
      if (!is_wp_error($user_id)) {
          update_user_meta($user_id, 'teamtailor_user_id', $teamtailor_user_id);
      } else {
          // Handle the error
      }
  }
  }