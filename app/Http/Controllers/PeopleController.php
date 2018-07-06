<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entities\People;
use \Doctrine\ORM\EntityManagerInterface;
use Carbon\Carbon;
class PeopleController extends Controller
{

    public function index(EntityManagerInterface $em)
    {
        $people = $em->getRepository(People::class)->findAll();

        return view('app.people.main-people', [
            'people' => $people
        ]);
    }

    public function store(Request $request)
    {
        $task = new People(3, $request->name, Carbon::createFromDate('1987', '08', '19' ));

        \EntityManager::persist($task);
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
        $person = $em->getRepository(People::class)->find($id);

        $em->remove($person);
        $em->flush();

        return redirect('people')->with('success_message', 'Registro removido com sucesso.');
    }

}
