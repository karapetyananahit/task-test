<?php

namespace App\Http\Controllers;

use App\Http\Requests\WorkspaceRequest;
use App\Models\Workspace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WorkspacesController extends Controller
{
    public function allSlugs (Request $request) {
        $slug = $request->slug;
        $workspaces =  Workspace::where('slug' , $slug)->first();
        echo $workspaces === null ? true : false;
    }
    public function index()
    {
        $userId = Auth::user()->id;

        $workspaces = Workspace::get()->where('user_id' , $userId);

        return view("pages.workspaces.index", compact("workspaces"));
    }

    public function create()
    {

        return view("pages.workspaces.create");

    }

    public function store (WorkspaceRequest $request) {

        $userId = Auth::user()->id;


        $workspace = new Workspace();

        $workspace->user_id = $userId;
        $workspace->name = $request->name;
        $workspace->slug = $request->slug;


        $workspace->save();

        return redirect("/workspaces");


    }

    public function edit($id)
    {
        $workspace = Workspace::find($id);

        return view("pages.workspaces.edit", compact(["workspace"]));
    }

    public function update($id,Request $request)
    {
        $workspace = Workspace::find($id);
        $workspace->name = $request->name;
        $workspace->slug = $request->slug;

        $workspace->save();

        return redirect()->route('workspaces.index');

    }

    public function delete($id)
    {
        Workspace::destroy($id);

        return redirect()->route('workspaces.index');
    }
}
