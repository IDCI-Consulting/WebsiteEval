<table class="homepage">
  <tr>
    <th>Adresse du site</th><th>Commercant</th><th>Designer</th><th>Actions</th>
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
            </li>
          <?php endforeach; ?>
        </ul>
      </td>
    </tr>
  <?php endforeach; ?>
</table>
