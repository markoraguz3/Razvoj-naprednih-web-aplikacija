<h1>Here is a list of all cities:</h1>

<?php foreach($posts as $city) { ?>
  <p class="text">
    <?php echo $city->Name ." , Population: ".$city->Population  ?>
    <a href='?controller=djelatnici&action=show&id=<?php echo $city->ID; ?>'>Vidi detalje</a>
  </p>
<?php } ?>