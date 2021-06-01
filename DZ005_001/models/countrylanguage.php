<?php
  class CountryLanguage {

    public $Countrycode;
    public $Language;
    public $IsOfficial;
    public $Percentage;


    public function __construct($Countrycode,$Language,$IsOfficial,$Percentage) {
      $this->$Countrycode = $Countrycode;
      $this->$Language = $Language;
      $this->$IsOfficial = $IsOfficial;
      $this->$Percentage = $Percentage;
    }

    public static function all() {
      $list = [];
      $db = Db::getInstance();
      $req = $db->query('SELECT * FROM countrylanguage');

      foreach($req->fetchAll() as $post) {
        $list[] = new CountryLanguage($post['CountryCode'], $post['Language'], $post['IsOfficial'], $post['Percentage']);
      }

      return $list;
    }

    public static function find($id) {
      $db = Db::getInstance();

      $id = intval($id);
      $req = $db->prepare('SELECT * FROM countrylanguage WHERE country = :id');

      $req->execute(array('id' => $id));
      $post = $req->fetch();

      return new CountryLanguage($post['CountryCode'], $post['Language'], $post['IsOfficial'], $post['Percentage']);
    }
  }
?>