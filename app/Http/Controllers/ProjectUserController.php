<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project_user;
use Illuminate\Support\Facades\DB;

class ProjectUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $assingments = DB::table('project_user')
        //     ->join('projects', 'project_user.project_id', '=', 'projects.id')
        //     ->join('users', 'project_user.user_id', '=', 'users.id')
        //     ->select(
        //         'project_user.id',
        //         'project_id',
        //         'projects.name as project_name',
        //         'projects.deadline as deadline',
        //         'projects.active as is_active',
        //         'users.name as user_name',
        //         'users.active as is_currentlyAssigned',
        //         'project_user.created_at as created_at',
        //         'project_user.updated_at as updated_at'
        //     )
        //     ->get();
        //dump($projects);
        $assingments = Project_user::sortable('id')->paginate(10);
        return view('projectUser.index', compact('assingments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('projectUser.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate(
            [

                'name' => 'required|string',
                'email' => 'required|string|email|unique:users',
                'password' => 'required|string|min:6|confirmed',
            ]
        );

        $user = new User(
            [
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'active' => true
            ]
        );

        try {
            $user->save();
        } catch (\Exception $e) {
            return response()->json($e->getMessage, 500);
        }

        return redirect('/users')->with('success', 'User saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
