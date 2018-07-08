<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entities\SellOrder;
use \Doctrine\ORM\EntityManagerInterface;
use Carbon\Carbon;

class OrderController extends Controller
{
    public function index(EntityManagerInterface $em)
    {
        $sellOrders = $em->getRepository(SellOrder::class)->findAll();

        return view('app.order.main-order', [
            'sellOrders' => $sellOrders
        ]);
    }

    public function create()
    {

    }

    public function store(Request $request)
    {

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

    public function destroy($id)
    {

    }
}
