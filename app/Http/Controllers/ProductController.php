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
        $product = new Product(6, $request->code, $request->name, $request->price);

        \EntityManager::persist($product);
        \EntityManager::flush();

        return redirect('product')->with('success_message', 'Registro inserido com sucesso.');
    }

    public function show($id)
    {

    }

    public function edit($id, EntityManagerInterface $em)
    {
        $product = $em->getRepository(Product::class)->find($id);

        return view('app.product.edit-product', [
            'product' => $product
        ]);
    }

    public function update(Request $request, $id, EntityManagerInterface $em)
    {
        $product = $em->getRepository(Product::class)->find($id);
        $product->setName($request->name);
        $product->setPrice($request->price);
        $product->setCode($request->code);

        $em->flush();

        return redirect('product')->with('success_message', 'Registro atualizado com sucesso.');
    }


    public function destroy(EntityManagerInterface $em, $id)
    {
        $product = $em->getRepository(Product::class)->find($id);

        $em->remove($product);
        $em->flush();

        return redirect('product')->with('success_message', 'Registro removido com sucesso.');
    }
}
