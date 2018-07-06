<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entities\Product;
use \Doctrine\ORM\EntityManagerInterface;
use Carbon\Carbon;

class ProductController extends Controller
{

    public function index(EntityManagerInterface $em)
    {
        $products = $em->getRepository(Product::class)->findAll();

        return view('app.product.main-product', [
            'products' => $products
        ]);
    }

    public function store(Request $request)
    {
        $product = new Product(3, $request->code, $request->name, $request->price);

        \EntityManager::persist($product);
        \EntityManager::flush();

        return '1';
    }

    public function show($id)
    {

    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {

    }

    public function delete(EntityManagerInterface $em, $id){
        $product = $em->getRepository(Product::class)->find($id);

        $em->remove($product);
        $em->flush();

        return redirect('product')->with('success_message', 'Registro removido com sucesso.');
    }
}
