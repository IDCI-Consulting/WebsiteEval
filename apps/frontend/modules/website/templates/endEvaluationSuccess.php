<div class="top_page">
  <h1>Resultats</h1>
  <h2><?php echo $evaluation->getSite() ?></h2>
</div>

<table class="results">
  <tbody>
    <thead>
    </thead>
   <?php foreach ($resultsCategories as $category_name => $score): ?>
    <tr>
      <td class="category">
        <label><?php echo $category_name ?></label>
      </td>
      <td class="score">
        <?php echo $score ?>
      </td>
    </tr>
    <?php endforeach; ?>
    <tr class="total">
      <td>
       TOTAL :
      </td>
      <td class="total_score">
       <?php echo $evaluation->getResult() ?>
      </td>
    </tr>
  </tbody>
</table>

