<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function check()
    {
        $uid = request('uid');      // 입력한 아이디와 암호
        $pwd = request('pwd');

        // 입력한 아이디, 암호의 직원정보 조사
        $row = Member::where('uid', '=', $uid)
            ->where('pwd', '=', $pwd)
            ->first();
        if ($row) {
            session()->put('uid', $row->uid);    // 세션으로 저장
            session()->put('rank', $row->rank);
        }
        return view('main');
    }

    public function logout()
    {
        session()->forget('uid');
        session()->forget('rank');

        return view('main');
    }
}
