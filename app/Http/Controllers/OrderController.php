<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entities\SellOrder;
use App\Entities\ItemOrder;
use App\Entities\People;
use \Doctrine\ORM\EntityManagerInterface;
use Carbon\Carbon;

class OrderController extends Controller
{
    public function index(EntityManagerInterface $em)
    {
        $people = $em->getRepository(People::class)->findAll();
        $itemsOrder = $em->getRepository(ItemOrder::class)->findAll();
        $sellOrders = $em->getRepository(SellOrder::class)->findAll();

        return view('app.order.main-order', [
            'people'     => $people,
            'sellOrders' => $sellOrders,
            'itemsOrder' => $itemsOrder
        ]);
    }

    public function create()
    {

    }

    public function store(Request $request, EntityManagerInterface $em)
    {
        $person = $em->getRepository(People::class)->find($request->person_id);

        $sellOrder = new SellOrder('1', Carbon::createFromDate('1987', '08', '19' ), $request->total);
        $sellOrder->setCustomer($person);

        \EntityManager::persist($sellOrder);
        \EntityManager::flush();

        return redirect('sellOrder')->with('success_message', 'Registro inserido com sucesso.');
    }

    public function show($id)
    {

    }

    public function edit($id, EntityManagerInterface $em)
    {
        $people = $em->getRepository(People::class)->findAll();
        $itemsOrder = $em->getRepository(ItemOrder::class)->findAll();
        $sellOrder  = $em->getRepository(SellOrder::class)->find($id);

        return view('app.order.edit-sell-order', [
            'people'     => $people,
            'sellOrder'  => $sellOrder,
            'itemsOrder' => $itemsOrder
        ]);
    }

    public function update(Request $request, $id, EntityManagerInterface $em)
    {
        $person = $em->getRepository(People::class)->find($request->person_id);

        $sellOrder = $em->getRepository(SellOrder::class)->find($id);
        $sellOrder->setTotal($request->total);
        $sellOrder->setCustomer($person);

        $em->flush();

        return redirect('sellOrder')->with('success_message', 'Registro atualizado com sucesso.');
    }

    public function destroy(EntityManagerInterface $em, $id)
    {
        $sellOrder = $em->getRepository(SellOrder::class)->find($id);

        $em->remove($sellOrder);
        $em->flush();

        return redirect('sellOrder')->with('success_message', 'Registro removido com sucesso.');
    }
}
