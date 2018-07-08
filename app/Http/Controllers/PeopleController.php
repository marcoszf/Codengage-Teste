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
        $task = new People(1, $request->name, Carbon::createFromDate('1987', '08', '19' ));

        \EntityManager::persist($task);
        \EntityManager::flush();

        return redirect('people')->with('success_message', 'Registro inserido com sucesso.');
    }

    public function show($id)
    {

    }

    public function edit($id, EntityManagerInterface $em)
    {
        $people = $em->getRepository(People::class)->find($id);

        return view('app.people.edit-people', [
            'people' => $people
        ]);
    }

    public function update(Request $request, $id, EntityManagerInterface $em)
    {
        $person = $em->getRepository(People::class)->find($id);
        $person->setName($request->name);

        $em->flush();

        return redirect('people')->with('success_message', 'Registro atualizado com sucesso.');
    }

    public function destroy(EntityManagerInterface $em, $id)
    {
        $person = $em->getRepository(People::class)->find($id);

        $em->remove($person);
        $em->flush();

        return redirect('people')->with('success_message', 'Registro removido com sucesso.');
    }

}
