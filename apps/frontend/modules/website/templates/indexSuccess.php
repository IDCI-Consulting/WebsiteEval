<table class="homepage">
  <tr class="head">
    <th class="url">Adresse du site</th><th class="owner">Commercant</th><th class="creator">Designer</th>
  </tr>
  <?php foreach($sites as $site): ?>
    <tr>
      <td class="site">
        <a href="<?php echo $site->getUrl(); ?>" target="_blank"> <?php echo $site->getUrl(); ?> </a>
      </td>
      <td class="owner">
        <?php echo $site->getOwner(); ?>
      </td>
      <td class="creator">
        <?php echo $site->getCreator(); ?>
      </td>
      <td class="eval">
        <a href="<?php echo url_for('init_evaluation', array('site_id' => $site->getId())) ?>" class="new">Nouvelle Evaluation</a>
        <ul class="old">
          <?php foreach($site->getEvaluation() as $eval): ?>
            <li>
              <a href="<?php echo url_for('edit_evaluation', array('evaluation_id' => $eval->getId())) ?>">
                <?php echo $eval ?>
              </a>
              <?php if ($eval->isOver()): ?>
                | 
                <a href="<?php echo url_for('end_evaluation', array('evaluation_id' => $eval->getId())) ?>">
                  Resultat
                </a>
              <?php endif; ?>
            </li>
          <?php endforeach; ?>
        </ul>
      </td>
    </tr>
  <?php endforeach; ?>
</table>
