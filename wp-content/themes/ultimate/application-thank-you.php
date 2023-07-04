<?php
/*
Template Name: Application Thank You
*/

$job_id = $_POST['job_id'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];

 // Check if a file was uploaded
 if (!empty($_FILES['cv']['tmp_name'])) {
  $cv_path = $_FILES['cv']['tmp_name'];
  $cv_mime_type = $_FILES['cv']['type'];
  $cv_filename = $_FILES['cv']['name'];

  // Read the contents of the CV file
  $cv_contents = file_get_contents($cv_path);

  // Create the CV file data
  $cv_data = array(
    'type' => $cv_mime_type,
    'name' => $cv_filename,
    'file' => base64_encode($cv_contents),
  );
}

$current_user_id = get_current_user_id();
$user_meta = get_user_meta($current_user_id);

$data = array(
  'data' => array(
    'type' => 'job-applications',
    'attributes' => array(
      'sourced' => true,
      'send-user-notifications' => true,
      'cover-letter' => "Hi, I'm a driven developer looking for new opportunities…"
    ),
    'relationships' => array(
      'job' => array(
        'data' => array(
          'type' => 'jobs',
          'id' => (int) $job_id
        )
      ),
      'candidate' => array(
        'data' => array(
          'type' => 'candidates',
          'id' => (int) $current_user->teamtailor_user_id,
        ),
        'attributes' => array(
          'first-name' => $firstname,
          'last-name' => $lastname,
          'email' => $email,
          'phone' => $phone,
          'message' => $message
        )
      )
    )
  )
);

$url = 'https://api.teamtailor.com/v1/job-applications';
$api_key = 'dnG0iLcG6GApSmAZ6IfrK0riKKh6emVDWVKEaWBv';

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt(
  $ch,
  CURLOPT_HTTPHEADER,
  array(
    'Authorization: Bearer ' . $api_key,
    'Content-Type: application/vnd.api+json',
    'X-Api-Version: 20210218'
  )
);

$start_time = microtime(true);

curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
$end_time = microtime(true);
$response_time = $end_time - $start_time;

if (curl_errno($ch)) {
  $error_msg = curl_error($ch);
  curl_close($ch);
  error_log("Curl error: " . $error_msg);

  $log_file = get_template_directory() . "/includes/api/log.txt";

  file_put_contents($log_file, date('Y-m-d H:i:s') . " Unsuccessful response: " . $error_msg . " HTTP CODE " ."$httpCode" . "\n", FILE_APPEND);
} else {
  curl_close($ch);
  $log_file = get_template_directory() . "/includes/api/log.txt";
  file_put_contents($log_file, date('Y-m-d H:i:s') . " Response: " . $result . " HTTP CODE " ."$httpCode" .  "\n", FILE_APPEND);
}

// log response and time taken
$log_message = date('Y-m-d H:i:s') . " Response: " . $result . " Time Taken: " . $response_time . " seconds\n";
file_put_contents(get_template_directory() . "/includes/api/log.txt", $log_message, FILE_APPEND);

?>

<?php get_header(); ?>

<main>
    <?php get_template_part( 'template-parts/global/flexible-blocks' ) ?>
</main>

<?php get_footer(); ?>