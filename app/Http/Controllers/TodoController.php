<?php

namespace App\Http\Controllers;

use App\Todo;
use App\Repositories\Repository;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    // space that we can use the repository from
   protected $model;

   public function __construct(Todo $todo)
   {
       // set the model
      
       $this->model = new Repository($todo);
   }

   public function index()
   {
       return $this->model->all();
   }

   public function store(Request $request)
   {
       $this->validate($request, [
           'body' => 'required|max:500'
       ]);
       $data = $request->all();
       $data['user_id'] = \Auth::user()->id;
       // create record and pass in only fields that are fillable
       return $this->model->create($data);
   }

   public function show($id)
   {
       return $this->model->show($id);
   }

   public function update(Request $request, $id)
   {
       // update model and only pass in the fillable fields
       $this->model->update($request->only($this->model->getModel()->fillable), $id);

       return $this->model->find($id);
   }

   public function update_todo(Request $request, $id)
   {
       // update model and only pass in the fillable fields
       $this->model->update($request->only($this->model->getModel()->fillable), $id);
   }

   

   public function destroy($id)
   {
       return $this->model->delete($id);
   }
}
