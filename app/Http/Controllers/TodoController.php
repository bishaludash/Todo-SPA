<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todos = Todo::all();
        return view('welcome', compact('todos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('todo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validation
        $rules = [
            'name'=>'required',
            'description'=>'required',
        ];
        $input =  $request->all();
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            return [
                'status'=>'fail',
                'errors'=>$validator->getMessageBag()->toArray(),
            ];
        }
    
        // create
        Todo::create($input);

        // return success response
        session()->flash('message', 'Todo has been created.');
        return [
            'status'=>'success',
            'return_url'=>route('todo.index'),
            'message'=>'Successfully created'
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function edit(Todo $todo)
    {
        return view('todo.edit', compact('todo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Todo $todo)
    {
        // validation
        $rules = [
            'name'=>'required',
            'description'=>'required',
        ];

        $input =  $request->all();
       $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            return [
                'status'=>'fail',
                'errors'=>$validator->getMessageBag()->toArray()
            ];
        }

        // create
        $todo->update($input);

        // return success response
        session()->flash('message', 'Todo has been updated.');
        return [
            'status'=>'success',
            'return_url'=>route('todo.index'),
            'message'=>'Successfully updated'
        ];

    }

    public function delete(Todo $todo)
    {
        return view('todo.delete', compact('todo'));
    }

    public function destroy(Todo $todo)
    {
        $todo->delete();
        return [
            'status'=>'success',
            'message'=>'Successfully deleted'
        ];
    }
}
