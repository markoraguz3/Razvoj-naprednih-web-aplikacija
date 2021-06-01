<p>Here is a list of all cities:</p>

<?php foreach($posts as $cl) { ?>
  <p>
    <?php echo $cl->Language ." , Country: ".$cl->IsOfficial  ?>
    <a href='?controller=djelatnici&action=show&id=<?php echo $cl->Language; ?>'>Vidi detalje</a>
  </p>
<?php } ?>