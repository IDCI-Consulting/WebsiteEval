<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
  </head>
  <body>
    <div class="header">
      <h1>Lyon Shop Webdesign : Evaluations</h1>
      <a href="<?php echo url_for('homepage') ?>" class="home">Accueil</a>
      <a href="<?php echo url_for('show_result') ?>" class="result"> Resultats </a>
    </div>
    <div class="content">
      <?php echo $sf_content ?>
    </div>
  </body>
</html>
