<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entities\ItemOrder;
use App\Entities\Product;
use \Doctrine\ORM\EntityManagerInterface;

class ItemOrderController extends Controller
{
    public function index(EntityManagerInterface $em)
    {
        $itemsOrder = $em->getRepository(ItemOrder::class)->findAll();
        $products = $em->getRepository(Product::class)->findAll();

        return view('app.order.main-itemorder', [
            'itemsOrder' => $itemsOrder,
            'products' => $products
        ]);
    }

    public function create()
    {

    }

    public function store(Request $request, EntityManagerInterface $em)
    {
        $product = $em->getRepository(Product::class)->find($request->product_id);

        $itemOrder = new ItemOrder('1', $request->quantity, $request->priceUnity, $request->total);
        $itemOrder->setItemOrder($product);

        \EntityManager::persist($itemOrder);
        \EntityManager::flush();

        return redirect('ItemOrder')->with('success_message', 'Registro inserido com sucesso.');
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

    public function destroy(EntityManagerInterface $em, $id)
    {
        $itemOrder = $em->getRepository(ItemOrder::class)->find($id);

        $em->remove($itemOrder);
        $em->flush();

        return redirect('ItemOrder')->with('success_message', 'Registro removido com sucesso.');
    }
}
