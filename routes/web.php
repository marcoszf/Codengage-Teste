<?php
use Carbon\Carbon;

Route::get('/', function () {
    return view('app.home');
});

Route::resource('people', 'PeopleController');
Route::get('people-delete/{id}', 'PeopleController@delete');
Route::post('people-create/', 'PeopleController@create');

Route::resource('product', 'ProductController');
Route::get('product-delete/{id}', 'ProductController@delete');
Route::post('product-create/', 'ProductController@create');

Route::resource('order', 'OrderController');

Route::get('test-add', function () {
    $task = new App\Entities\People(3, 'marcos colombelli ', Carbon::createFromDate('1987', '08', '19' ));

    \EntityManager::persist($task);
    \EntityManager::flush();

    return 'added!';
});

Route::get('test-add-prod', function () {
    $task = new App\Entities\Product(5, '123', 'Marcos Colombelli', 32.12);

    \EntityManager::persist($task);
    \EntityManager::flush();

    return 'added!';
});

Route::get('test-find', function (\Doctrine\ORM\EntityManagerInterface $em) {
    /* @var App\Entities\People $task */
    $task = $em->find(App\Entities\People::class, 'abcas-123321');
    return $task->getName() . ' - ' . $task->getId();
});

