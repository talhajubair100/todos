<?php

namespace App\Http\Controllers;


use App\Models\Category;
use App\Models\todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$data['todos'] = todo::with('categories')->orderByDesc('created_at')->get();

        $data['todos'] = todo::with('categories')->where('user_id', Auth::user()->id)->orderByDesc('created_at')->get();

        return view('todo.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$data['categories'] = Category::pluck('name', 'id');
        $data['categories'] = Category::all()->where('user_id', Auth::user()->id);

        return view('todo.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate(
            [
                'title' =>'required',
                'description' =>'nullable',
                'status' => 'required',
                'category_id' =>'required',
                'image' => 'nullable|mimes:jpg,png,gif',
                

            ]
        );

        $storeTodo = [
            'title' => $request->get('title'),
            'description' => $request->description,
            'status' => $request->status,
            'category_id' => $request->category_id,
            'user_id' => Auth::user()->id,
            
        ];

        if ($request->hasFile('image')) {
            $todoFileName = hexdec(uniqid()) . '.' . $request->file('image')->getClientOriginalExtension();
            $storeTodo['image'] = Storage::putFileAs('images/todo',$request->file('image'),$todoFileName);

        }

        $todo = todo::create($storeTodo);
        if(!empty($todo)){
            return redirect()->route('todos.index');
        }
        else{
            return redirect()->back();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show(todo $todo)
    {
        $data['todo'] = $todo;

        return view('todo.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function edit(todo $todo)
    {
        $data['todo'] = $todo;
        $data['categories'] = Category::pluck('name', 'id');

        return view('todo.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, todo $todo)
    {
        
       

        $request->validate(
            [
                'title' =>'required',
                'description' =>'nullable',
                'status' => 'required',
                'category_id' =>'required',
                'image' => 'nullable|mimes:jpg,png,gif',
                'user_id' => 'required'

            ]
        );

        $storeTodo = [
            'title' => $request->get('title'),
            'description' => $request->description,
            'status' => $request->status,
            'category_id' => $request->category_id,
            'user_id' => Auth::user()->id,
            
        ];

        if ($request->hasFile('image')) {
            $todoFileName = hexdec(uniqid()) . '.' . $request->file('image')->getClientOriginalExtension();
            $storeTodo['image'] = Storage::putFileAs('images/todo',$request->file('image'),$todoFileName);

        }

        if($todo->update($storeTodo)){
            return redirect()->route('todos.index');
        }
        else{
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy(todo $todo)
    {
        $todo->delete();
        return redirect()->route('todos.index');
        
    }
}
