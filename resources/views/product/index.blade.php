@extends('main')
@section('content')
    <br>
    <div class="alert mycolor1" role="alert">구분</div>

    <script>
        function find_text() {
            form1.action = "{{ route('product.index') }}";
            form1.submit();
        }
    </script>
    <form name="form1" action="" method="get">
        <div class="row">
            <div class="col-3" align="left">
                <div class="input-group input-group-sm">
                    <span class="input-group-text">이름</span>
                    <input class="form-control" type="text" name="text1" value="{{ $text1 }}"
                        onkeydown="if(event.keyCode == 13) {find_text();}">
                    <button class="btn mycolor1 ms-1" type="button" onclick="find_text()">검색</button>
                </div>
            </div>
            <div class="col-9" align="right">
                <a href="{{ route('product.create') }}{{ $tmp }}" class="btn btn-sm mycolor1">추가</a>
            </div>
        </div>
    </form>

    <table class="table table-sm table-bordered table-hover mymargin5">
        <tr class="mycolor2">
            <td width="10%">번호</td>
            <td width="20%">구분명</td>
            <td width="30%">제품명</td>
            <td width="20%">단가</td>
            <td width="20%">재고</td>
        </tr>
        @foreach ($list as $row)
            <tr>
                <td>{{ $row->id }}</td>
                <td>{{ $row->gubun_name }}</td>
                <td><a href="{{ route('product.show', $row->id) }}">{{ $row->name }}</a></td>
                <td>{{ $row->price }}</td>
                <td>{{ $row->jaego }}</td>
            </tr>
        @endforeach

    </table>

    <div class="row">
        <div class="col">
            {{ $list->links('mypagination') }}
        </div>
    </div>
    </div>
@endsection
