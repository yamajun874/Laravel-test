<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Table;

class TodoController extends Controller
{
    public function index()
    {
        $item = Table::all();
        return view('index', ['items' => $items]);
    }

    public function create(Request $request)
    {
        $this->validate($request, Table::$rules);
        $form = $request->content;
        Table::create($form);
        return redirect('/');
    }
    //
}
