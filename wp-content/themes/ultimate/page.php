<?php get_header();?>

<div id="app" class="py-40"></div>

<script>
    jQuery('#registerUser').on('click',function(e){
  e.preventDefault();
  var newUserName = jQuery('#username').val();
  var newUserEmail = jQuery('#useremail').val();
  var newUserPassword = jQuery('#password').val();
  jQuery.ajax({
    type:"POST",
    url:"<?php echo admin_url('admin-ajax.php'); ?>",
    data: {
      action: "register_user_front_end",
      new_user_name : newUserName,
      new_user_email : newUserEmail,
      new_user_password : newUserPassword
    },
    success: function(results){
      console.log(results);
      jQuery('.register-message').text(results).show();
    },
    error: function(results) {

    }
  });
});
</script>
<main>
    <?php get_template_part( 'template-parts/global/flexible-blocks' ) ?>
</main>
<!--/Flexible blocks -->

<?php get_footer();?>