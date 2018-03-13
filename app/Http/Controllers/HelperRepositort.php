<?php
/**
 * Created by PhpStorm.
 * User: Pedja
 * Date: 12-Mar-18
 * Time: 22:35
 */

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;

class HelperRepositort
{
    public static function search($table,$search,$limit,$offset){

        if(!empty($search)) {
            $res = DB::table($table)
                ->where("name", "like", '%' . $search . '%')
                ->orWhere('phone', "like", '%' . $search . '%')
                ->orWhere('email', "like", '%' . $search . '%')
                ->orderBy('id', 'desc')
                ->take($limit)
                ->skip($offset)
                ->get();
        }else{
            $res = DB::table($table)
                ->orderBy('id', 'desc')
                ->take($limit)
                ->skip($offset)
                ->get();
        }
        return $res;
    }

    public static function updateUser(Request $request, User $user){

        $req = $request;
        $reqall = $req->all();
        if ($req->hasFile('avatar')) {
            if (file_exists('avatar/' . $user->avatar)) {
                unlink('avatar/' . $user->avatar);
            }
            $ext = '.' . $req->file('avatar')->extension();
            $newfilename = time() . '_avatar' . $ext;
            $req->file('avatar')->move('avatar', $newfilename);
            $reqall['avatar'] = $newfilename;

        }
        if (isset($reqall['password'])) {

            $reqall['password'] = bcrypt($req->input('password'));
        }

        return $reqall;
    }

}