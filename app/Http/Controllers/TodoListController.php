<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TodoList;

class TodoListController extends Controller
{
    public function saveItem(Request $request){
        $listItem = new TodoList;
        $listItem->name = $request->listItem;
        $listItem->is_complete = $request=0;
        $listItem->save();

        return redirect('/');
    }

    public function display(){
        
        return view('welcome', ['listItems' => todoList::where('is_complete',0)->get()]);
    }

    public function doneItem($id){
        $listItem = todoList::find($id);
        $listItem->is_complete=1;
        $listItem->save();

        return redirect('/');
    }
}
