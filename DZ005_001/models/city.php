<?php
  class City {

    public $ID;
    public $Name;
    public $Countrycode;
    public $District;
    public $Population;

    public function __construct($ID, $Name, $Countrycode, $District, $Population) {
      $this->ID = $ID;
      $this->Name  = $Name;
      $this->Countrycode = $Countrycode;
      $this->District = $District;
      $this->Population = $Population;
    }

    public static function all() {
      $list = [];
      $db = Db::getInstance();
      $req = $db->query('SELECT * FROM city');

      foreach($req->fetchAll() as $post) {
        $list[] = new City($post['ID'], $post['Name'], $post['CountryCode'], $post['District'], $post['Population']);
      }

      return $list;
    }

    public static function find($id) {
      $db = Db::getInstance();

      $id = intval($id);
      $req = $db->prepare('SELECT * FROM city WHERE ID = :id');

      $req->execute(array('id' => $id));
      $post = $req->fetch();

      return new City($post['ID'], $post['Name'], $post['CountryCode'], $post['District'], $post['Population']);
    }
  }
?>