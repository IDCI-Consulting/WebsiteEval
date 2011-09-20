<table>
  <tr>
    <th>Site</th><th>Owner</th><th>Creator</th><th>Actions</th>
  </tr>
  <?php foreach($sites as $site): ?>
    <tr>
      <td>
        <a href="<?php echo $site->getUrl(); ?>" target="_blank"> <?php echo $site->getUrl(); ?> </a>
      </td>
      <td>
        <?php echo $site->getOwner(); ?>
      </td>
      <td>
        <?php echo $site->getCreator(); ?>
      </td>
      <td>
        <a href="<?php echo url_for('init_evaluation', array('site_id' => $site->getId())) ?>">Nouvelle Evaluation</a>
        <ul>
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
