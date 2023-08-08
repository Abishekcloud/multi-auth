<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Profession;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function dashboard(){
        // dd('dashboard');
        $posts = Post::all();
        return view('admin.dashboard',compact('posts'));
    }


    public function index()
    {
        $users = User::all();
        return view('admin.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // dd('Creating a new resource');
        $professions = Profession::all();
        return view('admin.posts.index',compact('professions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    try {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'profession_id' => 'required',
            'publication' => 'nullable|sometimes',
            'duration' => 'required',
            'message' => 'required',
            'image' => 'required|max:2048',
        ]);
        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
            }



        Post::create($input);
        // dd($input);
        return redirect()->route('dashboard')
            ->with('success', 'Post created successfully.');

    } catch (\Throwable $th) {
        // Return an error response if any exception occurs
        return response()->json([
            'status' => false,
            'message' => $th->getMessage()
        ]);
    }

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }


}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
