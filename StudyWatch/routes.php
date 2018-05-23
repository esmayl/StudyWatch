<?php
function call($controller, $action) 
{
    // require the file that matches the controller name
    $includeFile = sprintf('%s/controllers/%s.php', APP_PATH, $controller);
    require_once($includeFile);
    // call the function that matches the action name
    call_user_func($action);
}

$controller = "home";
$action = "login";

// check if the controller and action are set, otherwise fall back to default controller and action
if (isset($_POST['controller']) && isset($_POST['action'])) {
    $controller = $_POST['controller'];
    $action = $_POST['action'];
}
// a list of the controllers we have and their actions we consider "allowed" values
$allowedControllers = array(
	'home' => array ('welcome','login'),
	'user' => array ('login','forgotPassword'),
	'course' => array('getStudents')
);
//find a way to add 'docentPage' to the allowedControllers only when logged in.
// check that the requested controller and action are both allowed
// if someone tries to access something else (s)he will be redirected to the error action of the pages controller
if (!array_key_exists($controller, $allowedControllers))
{
    call('home', 'error');
}
else if (!in_array($action, $allowedControllers[$controller]))
{
    call('home', 'error');
}
else
{
    call($controller, $action);
}

?>