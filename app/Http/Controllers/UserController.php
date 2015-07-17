<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use DB;
use Auth;


class UserController extends Controller
{   
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    public function getLocations()
    {     
        $userslocations = DB::select(DB::raw("SELECT name, x(location) AS x_location,y(location) AS y_location FROM users"));        
        return response()->json($userslocations);
    }

    public function profile()
    {
        $user = Auth::user();

        $data['name'] = $user->name;
        $data['email'] = $user->email;
        $data['comments_count'] = $user->comments->count();
        $data['posts_count'] = $user->posts->count();
        $data['posts_active_count'] = $user->posts->where('active', 1)->count();
        $data['posts_inactive_count'] = $user->posts->where('active', 0)->count();

        return view('users.profile', $data);
    }
}
