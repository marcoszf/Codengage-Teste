<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entities\Product;
use \Doctrine\ORM\EntityManagerInterface;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

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
        $rules = [
            "name" => "required|unique:App\Entities\Product,name",
            "code" => "required|unique:App\Entities\Product,code",
            "price" => "min:1|numeric",

        ];
        $messages = [
            "name.unique" => "Nome já cadastrado, favor inserir outro.",
            "code.unique" => "Código já cadastrado, favor inserir outro.",
            "price.min" => "O preço deve ter um valor maior que 0.",
            "price.numeric" => "Favor insira um número para o preço"
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect('product')->withErrors($validator);
        }

        $product = new Product(1, $request->code, $request->name, $request->price);

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
