<!-- <?php 

    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    require_once __DIR__ . '/../app/Core/Controller.php';
    require_once __DIR__ . '/../app/Core/Router.php';
    require_once __DIR__ . '/../app/Controller/WelcomeController.php';

    $router = new Router();

    // Load applicateion web route definitions | ផ្ទុកអែកសារកំណត់​ Web Routes
    // require_once __DIR__ . '/../routes/web.php';
    require_once __DIR__ . '/../PHP_MVC/routes/web.php';

    // 4. Dispatch Request | ដំណើរការ​ Request
    // Match incoming HTTP request against routes and dispatch | ផ្ទៀងផ្ទាត់ផ្លូវ HTTP និងដំណើរការ​ Controller


     $router->dispatch();


?> -->

<?php 

ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/../app/Core/Controller.php';
require_once __DIR__ . '/../app/Core/Router.php';
require_once __DIR__ . '/../app/Controller/WelcomeController.php';

$router = new Router();


require_once __DIR__ . '/../routes/web.php';

// ដំណើរការ Request
$router->dispatch();

?>

