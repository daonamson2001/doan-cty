<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use PhpParser\Node\Stmt\TryCatch;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = User::where('id_dpms', '=', 2)->where('status', '=', 1)->get();
        return view('user.index', ["data" => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('users.create');
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $item = User::where('id', $id)->firstOrFail();
        return view('user.show', ["item" => $item]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        // dd($request->all());
        $validated = $request->validated();

        $name_user = $request->get('name_users');
        $sex_user = $request->get('sex_users');
        $created_at = $request->get('created_at_time_users');
        $address_user = $request->get('address_users');
        $phone_user = $request->get('phone_users');
        try {
            User::where('id', '=', $id)->update([
                "name_users" => $name_user,
                "sex_users" => $sex_user,
                "created_at_time_users" => $created_at,
                "address_users" => $address_user,
                "phone_users" => $phone_user,
            ]);
            return redirect()->back()->with('success', 'Cập nhập thành công !');
        } catch (\Exception $e) {
            var_dump($e);
            die();
            return redirect()->back()->with('alert', 'Cập nhập thất bại! Hãy kiếm tra lại');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
    }
    public function hidden($id)
    {
        $data = User::where('id_dpms', '=', 2)->where('id', $id)->update(['status' => 0]);
        return redirect()->back()->with('success', 'Ẩn người dùng thành công !');
    }
    public function delete($id)
    {
        $user = User::where('id', $id);
        $user->delete();
        return redirect()->back()->with('success', 'Xóa thành công !');
    }
}