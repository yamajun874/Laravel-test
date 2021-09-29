<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Table;

class TodoController extends Controller
{
    public function index()
    {
        $items = Table::all();
        return view('index', ['items' => $items]);
    }

    public function create(Request $request)
    {
        $this->validate($request, Table::$rules);
        $form = $request->all();
        Table::create($form);
        return redirect('/');
    }

    public function update(Request $request)
    {
        $this->validate($request, Table::$rules);
        $form = $request->all();
        unset($form['_token']);
        Table::where('id', $request->id)->update($form);
        return redirect('/');
    }

    public function delete(Request $request)
    {
        Table::find($request->id)->delete();
        return redirect('/');
    }
    //
}
