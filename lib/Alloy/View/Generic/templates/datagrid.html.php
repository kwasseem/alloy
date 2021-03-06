<?php
$i = 0;
$ci = 0;
?>

<?php if($this->heading): ?>
<h1>
  <span>Clients</span>
  <div class="buttons">
    <?php foreach($this->actions as $actionTitle => $action): ?>
      <?php echo $action['callback']($this, $actionTitle); ?>
    <?php endforeach; ?>
  </div>
</h1>
<?php endif; ?>

<table cellpadding=="0" cellspacing="0" border="0" class="app_datagrid">
  <thead>
    <tr>
      <?php foreach($this->columns as $colName => $colOpts): $ci++; ?>
      <th><?php echo $colName; ?></th>
      <?php endforeach; ?>
    </tr>
  </thead>
  <tbody>
  <?php foreach($this->data as $data => $item): $i++; ?>
    <tr class="app_datagrid_row <?php echo ($i % 2) ? 'even' : 'odd'; ?>">
    <?php foreach($this->columns as $colName => $colOpts):
        $colLabel = isset($fieldOpts['title']) ? $fieldOpts['title'] : ucwords(str_replace('_', ' ', $colName));
    ?>
      <td class="app_datagrid_cell"><?php echo $colOpts['callback']($this, $item); ?></td>
    <?php endforeach; ?>
    </tr>
  <?php endforeach; ?>
  <?php
  // No data was displayed, counter still at '0', and there is a 'noData' callback
  if(0 === $i && $this->noDataCallback):
  ?>
    <tr>
      <td colspan="<?php echo $ci; ?>" class="app_datagrid_nodata">
        <?php
          $cb = $this->noDataCallback;
          echo $cb($this);
        ?>
      </td>
    </tr>
  <?php endif; ?>
  </tbody>
</table>