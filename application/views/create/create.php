<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A layout example that shows off a responsive product landing page.">
    <title>Landing Page &ndash; Layout Examples &ndash; Pure</title>
    
    <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/pure-min.css" integrity="sha384-" crossorigin="anonymous">
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>application/css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>application/js/javascript.js" ></script>

</head>
<body>

<div class="header">
    <div class="home-menu pure-menu pure-menu-horizontal pure-menu-fixed">
        <a class="pure-menu-heading" href="<?php echo base_url();?>">Diet URL</a>
    </div>
</div>

<div class="splash-container">
    <div class="splash">
      <?php if (validation_errors()) : ?>
        <?php echo validation_errors(); ?>
      <?php endif ; ?>

      <?php if ($success_fail == 'fail') : ?>
        <div class="alert alert-danger">
          <strong><?php echo $this->lang->line('common_form_elements_error_notifty'); ?> </strong> <?php echo $this->lang->line('encode_encode_now_error'); ?> 
        </div>
      <?php endif ; ?>

      <?php echo form_open('create', 'name="derp" class="pure-form pure-form-stacked"') ; ?>
        <div class="row">
          <div class="col-lg-12">
            <div class="input-group">
              <?php if ($encoded_url == true) : ?>
                <h1><input type="text" name="url_address" class="splash-head" value="<?php echo $encoded_url; ?>"></h1>
              <?php elseif ($encoded_url == false) : ?>
                <h1><input type="text" name="url_address" class="splash-head" onclick="select()" value="<?php echo $this->lang->line('no_url_splash'); ?>"></h1>
              <?php endif ; ?>
            </div><!-- /input-group -->
          </div><!-- /.col-lg-6 -->
        </div><!-- /.row -->
      <?php echo form_close() ; ?>


        <p class="splash-subhead">  
          <?php if ($encoded_url == true) : ?>
            <?php echo $this->lang->line('new_url'); ?>
          <?php elseif ($encoded_url == false) : ?>
            <?php echo $this->lang->line('enter_url'); ?>
          <?php endif ; ?>
        </p>
        
        <p>
            <a href="#" onclick="document.derp.submit();" class="pure-button pure-button-primary">Shrink Me!</a>
        </p>
        <div class="container theme-showcase" role="main">

      <br />

      <?php if (!empty($this->session->userdata('url_array'))) { ?>
        <div class="alert alert-info">
          <strong><?php echo $this->lang->line('previous_submissions'); ?> </strong> 
          <br />
          <?php
          $url_array = $this->session->userdata('url_array');
            foreach ($url_array as $key => $long_url) {
              echo anchor(base_url().$key, base_url().$key)."<br>";
              echo $long_url."<br><br>"; 
           }
          ?>
        </div>
      <?php } ?>
    </div>
</div>


</body>
</html>

