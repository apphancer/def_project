<?php


use App\App;

class basketControllerTest extends \PHPUnit\Framework\TestCase
{
    private $config;

    // $ php vendor/bin/phpunit --colors
    public function setUp()
    {
        // @todo[m]: all o this code should be in it's own bootstrap file
        $_SERVER["REQUEST_URI"] = '/'; // horrible hack to get tests running with this quick project
        define('BASE_PATH', '/def/web/');

        $config = dirname(__FILE__) . '/../protected/config.php';
        $framework = dirname(__FILE__) . '/../framework/app.php';
        require_once($config);
        require_once($framework);

        $app = new App($config);
        $app->createWebApp($config);
        include(dirname(__FILE__) . '/../protected/controllers/basketController.php');

        $this->config = $config;
    }

    public function testIsEmpty()
    {
        // setup
        $basket_controller = new basketController($this->config);

        // assertion
        $this->assertTrue($basket_controller->addToBasket(1, 1, 1));
    }
}