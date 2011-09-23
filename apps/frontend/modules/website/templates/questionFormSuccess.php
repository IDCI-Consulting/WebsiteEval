<div class="top_page">
  <h1><?php echo $form->getQuestionCategory()->getName() ?></h1>
</div>

<form action="<?php echo url_for('question_form_process', array('evaluation_id' => $form->getEvaluation()->getId(), 'category_id' => $form->getQuestionCategory()->getId())) ?>" method="post">
  <table class="questions">
    <thead>
      <tr>
        <th class="question_head">Questions</th>
        <th>
          <ul class="answer_head">
            <li class="onepoint"><p>Pas du tout d'accord</p></li>
            <li class="twopoint"><p>Pas d'accord</p></li>
            <li class="threepoint"><p>D'accord</p></li>
            <li class="fourpoint"><p>Tout à fait d'accord</p></li>
          </ul>
        </th>
      </tr>
    </thead>
    <tbody>
      <?php echo $form ?>
    </tbody>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php if ($previous_id = $sf_user->getPreviousQuestion($form->getQuestionCategory()->getId())): ?>
            <input type="submit" name="target" value="previous" class="previous"/>
          <?php endif; ?>
          
          <?php if ($next_id = $sf_user->getNextQuestion($form->getQuestionCategory()->getId())): ?>
            <input type="submit" name="target" value="next" class="next"/>
          <?php else: ?>
            <input type="submit" name="target" value="end" class="next"/>
          <?php endif; ?>
        </td>
      </tr>
    </tfoot>
  </table>
</form>
