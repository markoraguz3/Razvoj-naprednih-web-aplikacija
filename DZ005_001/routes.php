<?php
  function call($controller, $action) {
    require_once('controllers/' . $controller . '_controller.php');

    switch($controller) {
      case 'pages':
        $controller = new PagesController();
      break;
      case 'cities':
        require_once('models/city.php');
        $controller = new CityController();
        break;
      case 'countries':
        require_once('models/country.php');
        $controller = new CountryController();
        break;
      case 'countrylanguages':
        // we need the model to query the database later in the controller
        require_once('models/countrylanguage.php');
        $controller = new CountryLanguageController();
      break;
    }

    $controller->{ $action }();
  }

  // we're adding an entry for the new controller and its actions
  $controllers = array('pages' 		=> ['home', 'error'],
                       'cities' 		=> ['index', 'show'],
					   'countries' => ['index', 'show'],
					   'countrylanguages' 	=> ['index', 'show']);

  if (array_key_exists($controller, $controllers)) {
    if (in_array($action, $controllers[$controller])) {
      call($controller, $action);
    } else {
      call('pages', 'error');
    }
  } else {
    call('pages', 'error');
  }
?>