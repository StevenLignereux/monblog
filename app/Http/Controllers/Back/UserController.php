<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\Back\UserRequest;

class UserController extends ResourceController
{
    /**
     * Update the specified resource in storage.
     *
     * @param App\Http\Requests\Back\UserRequest  $request
     * @param  integer $id
     * @return \Illuminate\Http\Response
    */
    public function update($id)
    {
        $request = app()->make(UserRequest::class);

        $request->merge([
            'valid' => $request->has('valid'),
        ]);

        User::findOrFail($id)->update($request->all());

        return back()->with('ok', __('The user has been successfully updated'));
    }

    /**
     * @param User $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function valid(User $user)
    {
        $user->valid = true;
        $user->save();

        return response()->json();
    }

    /**
     * @param User $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function unvalid(User $user)
    {
        $user->valid = false;
        $user->save();

        return response()->json();
    }
}
