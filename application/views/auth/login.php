<!DOCTYPE html>
<html>
<head>
  <title>halaman login</title>

  <link rel="stylesheet" type="text/css" href="<?=site_url('assets/css/materialize.min.css')?>">
  <style type="text/css">
    .box{
      width: 50%;
      margin: auto;
      box-shadow: 0px 10px 50px 0px rgba(84,110,122,0.5);
      padding: 2% 5%;
      margin-top: 10%;
      background-color: #fff;
    }
    .button > input {
      width: 100%;
    }
  </style>
</head>
<body style="background-color: #F2F5F7;">
  <div class="container">
    <div class="box">
      <h1><?php echo lang('login_heading');?></h1>
      <p><?php echo lang('login_subheading');?></p>

      <div id="infoMessage"><?php echo $message;?></div>

      <?php echo form_open("auth/login");?>

        <p>
          <?php echo lang('login_identity_label', 'identity');?>
          <?php echo form_input($identity);?>
        </p>

        <p>
          <?php echo lang('login_password_label', 'password');?>
          <?php echo form_input($password);?>
        </p>

        <p>
          <?php echo lang('login_remember_label', 'remember');?>
          <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
        </p>


        <div class="button">
          <?php echo form_submit('submit', lang('login_submit_btn'), array('class' => 'btn'));?>
        </div>

      <?php echo form_close();?>

      <p><a href="forgot_password"><?php echo lang('login_forgot_password');?></a></p>
    </div>
  </div>
</body>
</html>