<?php
require_once __DIR__.'/lib/Slim/Slim.php';
require_once __DIR__.'/lib/Savant3/Savant3.php';
require_once __DIR__.'/lib/RedBeanPHP/rb.php';
require_once __DIR__.'/mylib.php';

define(WD,basename(dirname(__FILE__)));
$app = new Slim();
R::setup('mysql:host=localhost;dbname=Tracker','root','root');

//Tracker Home
$app->get('/', function() use ($app){
    $user = $app->getCookie('userId');
    if(isset($user)){
        $app->redirect('/'.WD.'/dashboard/');
    }
    $options = array(
        'template_path' => 'templates/'
        );
    $tpl = new Savant3($options);
    $tpl->title = 'Tracker';
    $tpl->year = date('Y');
    $tpl->WD = WD;
    $tpl->pageName = 'Tracker';
    $tpl->tagline = "Comienza a rastrear tus equipos";
    $tpl->header = $tpl->fetch('header.tpl.php');
    $tpl->body = $tpl->fetch('index.tpl.php');
    $tpl->footer = $tpl->fetch('footer.tpl.php');
    return $tpl->display('main.tpl.php');
});

$app->post('/login/', function() use ($app){
    if(isset($_POST['nickname'],$_POST['password'])){
        $users = R::find('user', 'nickname = ?', array($_POST['nickname']));
        foreach($users as $user){
        }
        $exists = count($users);
        if($exists > 0 && $user->password == md5($_POST['password'])){
            $app->setCookie('userId', $user->id, '1 hour');
            $app->redirect('/'.WD.'/dashboard/');
        } else {
            $app->redirect('/'.WD.'/');
        }
    } else {
        $app->redirect('/'.WD.'/');
    }
});

//Sign in - POST
$app->post('/sign-in/', function() use ($app){
    if(isset($_POST['logNickname'],$_POST['logPassword'])){
        $users = R::find('user', 'nickname = ?', array($_POST['logNickname']));
        foreach($users as $user){
        }
        $exists = count($users);
        if($exists > 0 && $user->password == md5($_POST['logPassword'])){
            $app->setCookie('userId', $user->id, '1 hour');
            $app->redirect('/'.WD.'/dashboard/');
        } else {
            $app->redirect('/'.WD.'/');
        }
    } else {
        $app->redirect('/'.WD.'/');
    }
});

//Registration form
$app->get('/register/', function() use ($app){
    $id = $app->getCookie('userId');
    if(isset($id)){
        $app->redirect('/'.WD.'/dashboard/');
    }
    $options = array(
        'template_path' => 'templates/'
        );
    $tpl = new Savant3($options);
    $tpl->title = 'Tracker';
    $tpl->year = date('Y');
    $tpl->WD = WD;
    $tpl->pageName = 'Registro';
    $tpl->tagline = "";
    $tpl->header = $tpl->fetch('header.tpl.php');
    $tpl->body = $tpl->fetch('register.tpl.php');
    $tpl->footer = $tpl->fetch('footer.tpl.php');
    return $tpl->display('main.tpl.php');
});

//Registration form - POST
$app->post('/register/', function() use ($app){
    $user = R::dispense('user');
    $user->firstName = $_POST['firstName'];
    $user->lastName = $_POST['lastName'];
    $user->email = $_POST['email'];
    $user->nickname = $_POST['nickname'];
    $user->password = md5($_POST['password']);
    $user->isLogged = false;
    $user->createdOn = time();
    $id = R::store($user);
    $app->redirect('/'.WD.'/');
    $msg = array('type' => 'success',
                 'msg' => 'El usuario ha sido creado con éxito.');
    $app->flashNow("message",$msg);
});

//User profile
$app->get('/dashboard/', function() use ($app){
    $id = $app->getCookie('userId');
    if(!isset($id)){
        $app->redirect('/'.WD.'/');
    }
    $user = R::load('user', $id);
    $user->isLogged = true;
    R::store($user);
    $options = array(
        'template_path' => 'templates/'
        );
    $tpl = new Savant3($options);
    $tpl->title = 'Tracker';
    $tpl->year = date('Y');
    $tpl->WD = WD;
    $tpl->pageName = 'Dashboard';
    $tpl->tagline = $user->username;
    $tpl->user = $user;
    $tpl->header = $tpl->fetch('header.tpl.php');
    $devices = R::find('device', 'owner_id = ?', array($user->id));
    $exists = count($devices);
    if($exists != 0){
        $tpl->rows = "";
        $i = 1;
        foreach($devices as $device){
            $tpl->device = $device;
            $tpl->num = $i;
            $tpl->rows .= $tpl->fetch('device-row.tpl.php');
            $i++;
        }
    } else {
        $tpl->rows = '<tr><td colspan="5">No hay dispositivos asociados</td></tr>';
    }
    $tpl->body = $tpl->fetch('dashboard.tpl.php');
    $tpl->sidebar = $tpl->fetch('sidebar.tpl.php');
    $tpl->footer = $tpl->fetch('footer.tpl.php');
    return $tpl->display('main.tpl.php');
});

//Log out
$app->get('/log-out/',function() use ($app){
    $id = $app->getCookie('userId');
    $user = R::load('user', $id);
    $user->isLogged = false;
    R::store($user);
    if(isset($id)){
        $app->setCookie('userId',null);
    }
    $app->redirect('/'.WD.'/');
});

//List places
$app->get('/places/', function () use ($app) {
    $id = $app->getCookie('userId');
    if(!isset($id)){
        $app->redirect('/WIMC/');
    }
    $user = R::load('user', $id);
    $options = array(
        'template_path' => 'templates/'
        );
    $tpl = new Savant3($options);
    $tpl->title = 'WIMC';
    $tpl->year = date('Y');
    $tpl->pageName = 'Lugares';
    $tpl->tagline = "Mis Sitios";
    $tpl->user = $user;
    $tpl->header = $tpl->fetch('header.tpl.php');
    $places = R::find('place', 'creator_id = ?', array($user->id));
    $exists = count($places);
    $tpl->rows = "";
    $i = 1;
    foreach($places as $place){
        $tpl->place = $place;
        $tpl->num = $i;
        $tpl->rows .= $tpl->fetch('places-row.tpl.php');
        $i++;
    }
    $tpl->body = $tpl->fetch('places.tpl.php');
    $tpl->sidebar = "";
    $tpl->footer = $tpl->fetch('footer.tpl.php');

    // render main template
    $tpl->display('main.tpl.php');
});
//Place view
$app->get('/device/(:id)', function ($id) use ($app) {
    $device = R::load('device',$id);
    /*echo "<pre>";
    print_r($device);
    echo "</pre>";*/
    $id = $app->getCookie('userId');
    if(!isset($id)){
        $app->redirect('/'.WD.'/');
    }
    $user = R::load('user', $id);
    $options = array(
        'template_path' => 'templates/'
        );
    $tpl = new Savant3($options);
    $tpl->title = 'Tracker';
    $tpl->year = date('Y');
    $tpl->WD = WD;
    $tpl->pageName = 'Dispositivo';
    $tpl->tagline = "";
    $tpl->user = $user;
    $tpl->device = $device;
    $tpl->header = $tpl->fetch('header.tpl.php');
    $tpl->body = $tpl->fetch('device.tpl.php');
    $tpl->sidebar = $tpl->fetch('sidebar.tpl.php');
    $tpl->footer = $tpl->fetch('footer.tpl.php');
    return $tpl->display('main.tpl.php');
});
//Device add
$app->get('/add-device/', function () use ($app) {
    $id = $app->getCookie('userId');
    if(!isset($id)){
        $app->redirect('/'.WD.'/');
    }
    $user = R::load('user', $id);
    $user->isLogged = true;
    R::store($user);
    $options = array(
        'template_path' => 'templates/'
        );
    $tpl = new Savant3($options);
    $tpl->title = 'Tracker';
    $tpl->year = date('Y');
    $tpl->WD = WD;
    $tpl->pageName = 'Asociar Dispositivo';
    $tpl->tagline = "";
    $tpl->user = $user;
    $tpl->header = $tpl->fetch('header.tpl.php');
    $tpl->body = $tpl->fetch('add-device.tpl.php');
    $tpl->sidebar = $tpl->fetch('sidebar.tpl.php');
    $tpl->footer = $tpl->fetch('footer.tpl.php');
    return $tpl->display('main.tpl.php');
});
//Device add - POST
$app->post('/add-device/', function () use ($app) {
    $id = $app->getCookie('userId');
    $user = R::load('user',$id);
    $devices = R::find('device', 'owner_id = ? AND mac = ?', array($user->id,$_POST['mac']));
    $exists = count($devices);
    if($exists != 0){
        $msg = array('type' => 'error',
                 'msg' => '<strong>Error:</strong> Ya existe un dispositivo registrado con esa MAC.');
        $app->flash("message",$msg);
    } else {
        $place = R::dispense('device');
        $place->model = $_POST['model'];
        $place->user = $_POST['user'];
        $place->mac = $_POST['mac'];
        $place->owner = $user;
        $place->createdOn = time();
        $place->lastUpdated = time();
        $place_id = R::store($place);
        $msg = array('type' => 'info',
                 'msg' => 'El dispositivo ha sido asociado exitosamente.');
        $app->flashNow("message",$msg);
    }
    $app->redirect('/'.WD.'/dashboard/');
});
//Device edit
$app->get('/edit-device/(:id)', function ($id) use ($app) {
});
//Device edit - POST
$app->post('/edit-device/(:id)', function ($id) use ($app) {
});
//Device delete
$app->get('/delete-device/(:id)', function ($id) use ($app) {
});

$app->run();
