<table>
  <tr>
    <th>Site</th><th>Owner</th><th>Creator</th><th>Actions</th>
  </tr>
  <?php foreach($sites as $site): ?>
    <tr>
      <td>
        <?php echo $site->getUrl(); ?>
      </td>
      <td>
        <?php echo $site->getOwner(); ?>
      </td>
      <td>
        <?php echo $site->getCreator(); ?>
      </td>
      <td>
        Actions
      </td>
    </tr>
  <?php endforeach; ?>
</table>
