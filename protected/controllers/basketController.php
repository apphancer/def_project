<?php


use Controller\Controller;

class basketController extends Controller
{

    public function index()
    {
        // @todo[m]:  check if user is logged in
        $user_id = $this->getUserId();

        if (isset($_GET['add']))
        {
            $product_id = $_GET['add'];
            $this->addToBasket($user_id, $product_id, 1);
        }


        $statement = $this->getDb()->prepare('SELECT * from basket LEFT JOIN product ON product.id = basket.product_id WHERE basket.user_id = :user_id');
        $statement->execute([':user_id' => $user_id]);
        $basket_items = $statement->fetchAll();

        $data = [
            'basket_items' => $basket_items,
        ];

        return $this->render('basket', $data);
    }

    /**
     * @param $user_id
     * @param $product_id
     */
    public function addToBasket($user_id, $product_id, $quantity)
    {

        $sql = 'INSERT INTO basket (user_id, product_id, quantity) VALUES (?, ?, ?)';

        if ($this->getDb()->prepare($sql)->execute([$user_id, $product_id, $quantity]))
            return true;
    }

    /**
     * @return bool
     */
    public function getUserId()
    {
        return isset($_SESSION['user_login']) ? $_SESSION['user_login'] : false;
    }
}