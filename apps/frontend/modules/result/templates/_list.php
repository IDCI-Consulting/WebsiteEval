<?php $categories = QuestionCategoryTable::getInstance()->findAll() ?>
<table>
  <thead>
    <tr>
      <th class="url">Adresse du site</th>
      <?php foreach($categories as $category): ?>
        <th class="category"><?php echo $category ?></th>
      <?php endforeach; ?>
      <th>Resultat</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($evaluations as $evaluation): ?>
      <?php $resultsCategories = EvaluationResult::run(sfOutputEscaper::unescape($evaluation), $total); ?>
      <tr>
        <td class="site">
          <a href="<?php echo $evaluation->getSite()->getUrl(); ?>" target="_blank"> <?php echo  $evaluation->getSite()->getUrl(); ?> </a>
        </td>

        <?php foreach($categories as $category): ?>
          <td class="category"><?php echo $resultsCategories[$category->getName()] ?></td>
        <?php endforeach; ?>

        <td class="result">
          <?php printf('%.2f/%d',
            $evaluation->getResult(),
            count($categories) * EvaluationResult::SCORE_SCALE
          ); ?>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
