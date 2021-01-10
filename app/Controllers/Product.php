<?php namespace App\Controllers;
 
use App\Models\Product_model;
 
class Product extends BaseController
{
 
    public function __construct() {
     
        $this->product = new Product_model;
     
    }
 
    public function index()
    {
        // membuat variabel untuk menampung session cart
        $session = session('cart');
        // membuat variabel total yang isinya mengecek ada atau tidak
        // variabel session dan memasukannya ke dalam array values
        // jika session cart tidak ada, tampilkan array() / kosong
        $data['total'] = is_array($session)? array_values($session): array();
        // menampilkan semua data product yang ada di dalam database
        $data['items'] = $this->product->findAll();
        // menampilkan halaman view product dan membawa variabel data
        return view('product/index', $data);
    }
 
}