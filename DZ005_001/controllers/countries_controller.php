<?php
  class CountryController {
    public function index() {
      $countries = Country::all();
      require_once('views/country/index.php');
    }

    public function show() {
      if (!isset($_GET['id']))
        return call('pages', 'error');

      $country = Country::find($_GET['id']);
      require_once('views/country/show.php');
    }
  }
?>