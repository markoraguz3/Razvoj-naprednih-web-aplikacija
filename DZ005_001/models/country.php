<?php
  class Country {

    public $Code;
    public $Name;
    public $Continent;
    public $Region;
    public $SurfaceArea;
    public $IndepYear;
    public $Population;
    public $LifeExpectancy;
    public $GNP;
    public $GNPOld;
    public $LocalName;
    public $GovernmentForm;
    public $HeadOfState;
    public $Capital;
    public $Code2;

    public function __construct($Code,$Name,$Continent,$Region,$SurfaceArea,$IndepYear,$Population,
     $LifeExpectancy,$GNP,$GNPOld,$LocalName,$GovernmentForm,$HeadOfState,$Capital,$Code2) {
      $this->$Code = $Code;
      $this->$Name = $Name;
      $this->$Continent = $Continent;
      $this->$Region = $Region;
      $this->$SurfaceArea = $SurfaceArea;
      $this->$IndepYear = $IndepYear;
      $this->$Population = $Population;
      $this->$LifeExpectancy = $LifeExpectancy;
      $this->$GNP = $GNP;
      $this->$GNPOld = $GNPOld;
      $this->$LocalName = $LocalName;
      $this->$GovernmentForm = $GovernmentForm;
      $this->$HeadOfState = $HeadOfState;
      $this->$Capital = $Capital;
      $this->$Code2 = $Code2;
  
    }

    public static function all() {
      $list = [];
      $db = Db::getInstance();
      $req = $db->query('SELECT * FROM country');

      foreach($req->fetchAll() as $post) {
        $list[] = new Country($post['Code'], $post['Name'], $post['Continent'], $post['Region'], $post['SurfaceArea'], $post['IndepYear'], 
  $post['Population'], $post['LifeExpectancy'], $post['GNP'], $post['GNPOld'], $post['LocalName'], $post['GovernmentForm'],
  $post['HeadOfState'], $post['Capital'], $post['Code2']);
   
      }

      return $list;
    }

    public static function find($id) {
      $db = Db::getInstance();

      $id = intval($id);
      $req = $db->prepare('SELECT * FROM country WHERE Code = :id');

      $req->execute(array('id' => $id));
      $post = $req->fetch();

      return new Country($post['Code'],$post['Name'],$post['Continent'],$post['Region'],$post['SurfaceArea'],$post['IndepYear'],$post['Population'],$post['LifeExpectancy'],
      $post['GNP'],$post['GNPOld'],$post['LocalName'],$post['GovernmentForm'],$post['HeadOfState'],$post['Capital'],$post['Code2']);
    }
  }
?>