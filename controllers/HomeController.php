<?php
class HomeController
{
    public function __construct()
    {
        // KHÔNG CÓ THAM SỐ
    }

    public function index()
    {
        include 'views/home/index.php';
    }
}
