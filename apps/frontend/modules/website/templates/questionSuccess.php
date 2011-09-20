<h1><?php echo $questionCategory->getName() ?></h1>

<ul>
<?php foreach ($questions as $question): ?>
  <li><?php echo $question->getText() ?></li>
<?php endforeach; ?>
</ul>

<?php if ($previous_id = $sf_user->getPreviousQuestion($category_id)): ?>
  <a href="<?php echo url_for('question', array('evaluation_id' => $evaluation_id, 'category_id' => $previous_id)) ?>">Previous</a>
<?php endif; ?>

<?php if ($next_id = $sf_user->getNextQuestion($category_id)): ?>
  <a href="<?php echo url_for('question', array('evaluation_id' => $evaluation_id, 'category_id' => $next_id)) ?>">Next</a>
<?php endif; ?>
