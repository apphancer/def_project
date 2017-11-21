<?php


use Controller\Controller;

class indexController extends Controller
{

    public function index()
    {
        $results = $this->getDb()->query('SELECT * from product');
        $products = $results->fetchAll();

        $data = [
            'products' => $products,
        ];

        return $this->render('index', $data);
    }

    public function basket()
    {

    }
}