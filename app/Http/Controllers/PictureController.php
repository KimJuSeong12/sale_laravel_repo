<?php

namespace App\Http\Controllers;

use App\Models\Product; // Eloquent ORM 위한 선언
use Illuminate\Support\Facades\DB;

class PictureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $text1 = request('text1');
        $data['text1'] = $text1;
        $data['list'] = $this->getlist($text1); // 자료 읽기
        return view('picture.index', $data);
    }

    public function getlist($text1)
    {
        $result = Product::where('name', 'like', '%', $text1, '%')
            ->orderby('name', 'asc')
            ->paginate(5)->appends(['text1' => $text1]);

        return $result;
    }
}
