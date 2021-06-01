<p>Here is a list of all cities:</p>

<?php foreach($countries as $country) { ?>
  <p>
    <?php echo $country->Code ." , Population: ".$country->Population  ?>
    <a href='?controller=djelatnici&action=show&id=<?php echo $country->Code; ?>'>Vidi detalje</a>
  </p>
<?php } ?>