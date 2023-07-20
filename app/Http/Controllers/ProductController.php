<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; // Eloquent ORM 위한 선언
use App\Models\Gubun;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['tmp'] = $this->qstring();

        $text1 = request('text1');
        $data['text1'] = $text1;
        $data['list'] = $this->getlist($text1); // 자료 읽기
        return view('product.index', $data);
    }

    public function getlist($text1)
    {
        $result = Product::leftjoin('gubuns', 'products.gubuns_id', '=', 'gubuns.id')
            ->select('products.*', 'gubuns.name as gubun_name')
            ->where('products.name', 'like', '%' . $text1 . '%')
            ->orderby('products.name', 'asc')
            ->paginate(5)->appends(['text1' => $text1]);
        return $result;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['list'] = $this->getlist_gubun();

        $data['tmp'] = $this->qstring();
        return view('product.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $row = new Product;
        $this->save_row($request, $row);

        $tmp = $this->qstring();
        return redirect('product' . $tmp);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data['tmp'] = $this->qstring();

        $data['row'] = Product::leftjoin('gubuns', 'products.gubuns_id', '=', 'gubuns.id')->select('products.*', 'gubuns.name as gubun_name')->where('products.id', '=', $id)->first();

        return view('product.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data['list'] = $this->getlist_gubun();

        $data['tmp'] = $this->qstring();
        $data['row'] = Product::find($id);
        return view('product.edit', $data);
    }

    public function getlist_gubun()
    {
        $result = Gubun::orderby('name')->get();
        return $result;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $row = Product::find($id); // 자료 찾기
        $this->save_row($request, $row);

        $tmp = $this->qstring();
        return redirect('product' . $tmp);
    }

    public function save_row(Request $request, $row)
    {
        $request->validate([
            'gubuns_id' => 'required|numeric',
            'name' => 'required|max:50',
            'price' => 'required|numeric'
        ], [
            'gubuns_id.required' => '구분명은 필수입력입니다.',
            'name.required' => '이름은 필수입력입니다.',
            'price.required' => '단가는 필수입력입니다.',
            'name.max' => '50자 이내입니다.'
        ]);

        // 자료 수정
        $row->gubuns_id = $request->input('gubuns_id');
        $row->name = $request->input('name');
        $row->price = $request->input('price');
        $row->jaego = $request->input('jaego');

        if ($request->hasFile('pic')) {         //upload할 파일이 있는 경우
            $pic = $request->file('pic');
            $pic_name = $pic->getClientOriginalName();      // 파일이름
            $pic->storeAs('public/product_img', $pic_name);  // 파일 저장

            $row->pic = $pic_name;
        }

        $row->save(); // 수정 모드
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Product::find($id)->delete();

        $tmp = $this->qstring();
        return redirect('product' . $tmp);
    }

    public function jaego()
    {
        DB::statement('drop table if exists temps;');
        DB::statement('create table temps (
            id int not null auto_increment,
            products_id int,
            jaego int default 0,
            primary key(id) );');
        DB::statement('update products set jaego=0;');
        DB::statement('insert into temps (products_id, jaego) select products_id, sum(numi)-sum(numo) from jangbus group by products_id;');
        DB::statement('update products join temps on products.id=temps.products_id set products.jaego=temps.jaego;');

        return redirect('product');
    }

    public function qstring()
    {
        $text1 = request("text1") ? request('text1') : "";
        $page = request('page') ? request('page') : "1";

        $tmp = $text1 ? "?text1=$text1&page=$page" : "?page=$page";

        return $tmp;
    }
}
