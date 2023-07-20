<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jangbu;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $text1 = $request->input('text1');
        if (!$text1) {
            $text1 = date("Y-m-d", strtotime("-1 month"));       // 오늘기준 1달전 날짜
        }

        $text2 = $request->input('text2');
        if (!$text2) {
            $text2 = date("Y-m-d");       // 오늘 날짜
        }

        $data['text1'] = $text1;
        $data['text2'] = $text2;
        $list = $this->getlist($text1, $text2);
        $str_label = "";
        $str_data = "";
        foreach ($list as $row) {
            $str_label .= "'$row->gubun_name',";
            $str_data .= $row->cnumo . ',';
        }
        $data["str_label"] = $str_label;
        $data["str_data"] = $str_data;

        return view('chart.index', $data);
    }

    public function getlist($text1, $text2)
    {
        $result = Jangbu::leftjoin('products', 'jangbus.products_id', '=', 'products.id')
            ->leftjoin('gubuns', 'products.gubuns_id', '=', 'gubuns.id')
            ->select('products.name as products_name', DB::raw('count(jangbus.numo) as cnumo'))
            ->wherebetween('jangbus.writeday', array($text1, $text2))
            ->where('jangbus.io', '=', 1)
            ->orderby('cnumo', 'desc')
            ->groupby('products.name')
            ->limit(14)
            ->paginate(14)->appends(['text1' => $text1, 'text2' => $text2]);

        return $result;
    }
}
