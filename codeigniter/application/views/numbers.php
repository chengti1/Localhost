<?php $countries = array('USA', 'Kanada', 'Mexico'); ?>

<select name="country">
  <?php foreach ($countries as $c): ?>
    <option<?php $countri == $c ? ' selected="selected"' : ''; ?>>$c</option>
  <?php endforeach; ?>
</select>