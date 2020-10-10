<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

use App\Group;

class GroupController extends Controller
{
    public function index()
    {
        $groups = Group::all();

        return view('groups.index', compact('groups'));
    }

    public function create()
    {
        return view('groups.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|max:255'
        ];

        $request->validate($rules);

        Group::create($request->all());

        $message = ['type' => 'success', 'text' => 'Grupo creado correctamente'];
        Session::flash('message', $message);

        return redirect()->back();
    }

    public function show($id)
    {
        //
    }

    public function edit(Group $group)
    {
        return view('groups.edit', compact('group'));
    }

    public function update(Request $request, Group $group)
    {
        $rules = [
            'name' => 'required|max:255'
        ];

        $request->validate($rules);

        $group->update($request->all());

        $message = ['type' => 'success', 'text' => 'Grupo actualizado correctamente'];
        Session::flash('message', $message);

        return redirect()->back();
    }

    public function destroy($id)
    {
        //
    }
}
