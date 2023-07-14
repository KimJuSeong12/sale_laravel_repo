@extends('main')
@section('content')
    <br>
    <div class="alert mycolor1">매출</div>

    <form name="form1" action="" method="post">
        @csrf

        <table class="table table-sm table-bordered mymargin5">
            <tr>
                <td width="20%" class="mycolor2">날짜</td>
                <td width="80%" align="left">{{ $row->writeday }}</td>
            </tr>
            <tr>
                <td width="20%" class="mycolor2">
                    <font color="red">*</font> 제품명
                </td>
                <td width="80%" align="left">{{ $row->product_name }}</td>
            </tr>
            <tr>
                <td width="20%" class="mycolor2">단가</td>
                <td width="80%" align="left">{{ number_format($row->price) }}</td>
            </tr>
            <tr>
                <td width="20%" class="mycolor2">수량</td>
                <td width="80%" align="left">{{ number_format($row->numo) }}</td>
            </tr>
            <tr>
                <td width="20%" class="mycolor2">금액</td>
                <td width="80%" align="left">{{ number_format($row->prices) }}</td>
            </tr>
            <tr>
                <td width="20%" class="mycolor2">비고</td>
                <td width="80%" align="left">{{ $row->bigo }}</td>
            </tr>

        </table>
        <div align="center">
            <a href="{{ route('jangbuo.edit', $row->id) }}{{ $tmp }}" class="btn btn-sm mycolor1">수정</a>
            <form action="{{ route('jangbui.destroy', $row->id) }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm mycolor1" onclick="return confirm('삭제할까요 ?');">삭제</button> &nbsp;
            </form>
            <input type="button" value="이전화면" class="btn btn-sm mycolor1" onclick="history.back();">
        </div>
    </form>
    </div>
@endsection
