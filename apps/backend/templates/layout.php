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
    <ul>
      <li><a href="<?php echo url_for('site') ?>">Site</a></li>
      <li><a href="<?php echo url_for('evaluation') ?>">Evaluation</a></li>
      <li><a href="<?php echo url_for('question') ?>">Question</a></li>
      <li><a href="<?php echo url_for('answer') ?>">Reponse</a></li>
      <li><a href="<?php echo url_for('question_type') ?>">Question type</a></li>
      <li><a href="<?php echo url_for('question_category') ?>">Question category</a></li>
    </ul>
    <?php echo $sf_content ?>
  </body>
</html>
