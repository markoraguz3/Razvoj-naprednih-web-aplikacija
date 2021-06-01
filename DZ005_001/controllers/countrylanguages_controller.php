<?php
  class CountryLanguageController {
    public function index() {

      $posts = CountryLanguage::all();
      require_once('views/country_language/index.php');
    }

    public function show() {

      if (!isset($_GET['id']))
        return call('pages', 'error');

      $post = CountryLanguage::find($_GET['id']);
      require_once('views/country_language/show.php');
    }
  }
?>