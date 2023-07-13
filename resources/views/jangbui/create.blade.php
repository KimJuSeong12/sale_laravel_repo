@extends('main')
@section('content')
    <br>
    <div class="alert mycolor1" role="alert">매입</div>

    <form name="form1" action="{{ route('jangbui.store') }}{{ $tmp }}" method="post">
        @csrf

        <table class="table table-bordered table-sm mymargin5">
            <tr>
                <td width="20%" class="mycolor2">
                    <font color="red">*</font> 날짜
                </td>
                <td width="80%" align="left">
                    <div class="d-inline-flex">
                        <input type="text" name="writeday" size="20" value="{{ old('writeday') }}"
                            class="form-select form-control-sm">
                    </div>
                    @error('writeday')
                        {{ $message }}
                    @enderror
                </td>
            </tr>
            <tr>
                <td width="20%" class="mycolor2">
                    <font color="red">*</font> 제품명
                </td>
                <td width="80%" align="left">
                    <div class="d-inline-flex">
                        <select name="products_id" class="form-select form-control-sm">
                            <option value="" selected>선택하세요.</option>
                            @foreach ($list as $row)
                                @if ($row->id == old('products_id'))
                                    <option value="{{ $row->id }}" selected>{{ $row->name }}</option>
                                @else
                                    <option value="{{ $row->id }}" selected>{{ $row->name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    @error('products_id')
                        {{ $message }}
                    @enderror
                </td>
            </tr>
            <tr>
                <td width="20%" class="mycolor2">단가</td>
                <td width="80%" align="left">
                    <div class="d-inline-flex">
                        <input type="text" name="price" size="20" value="{{ old('price') }}"
                            class="form-select form-control-sm">
                    </div>
                </td>
            </tr>
            <tr>
                <td width="20%" class="mycolor2">수량</td>
                <td width="80%" align="left">
                    <div class="d-inline-flex">
                        <input type="text" name="numi" size="20" value="{{ old('numi') }}"
                            class="form-select form-control-sm">
                    </div>
                </td>
            </tr>
            <tr>
                <td width="20%" class="mycolor2">금액</td>
                <td width="80%" align="left">
                    <div class="d-inline-flex">
                        <input type="text" name="prices" size="20" value="{{ old('prices') }}"
                            class="form-select form-control-sm">
                    </div>
                </td>
            </tr>
            <tr>
                <td width="20%" class="mycolor2">비고</td>
                <td width="80%" align="left">
                    <div class="d-inline-flex">
                        <input type="text" name="bigo" size="20" value="{{ old('bigo') }}"
                            class="form-select form-control-sm">
                    </div>
                </td>
            </tr>

        </table>

        <div align="center">
            <input type="submit" value="저장" class="btn btn-sm mycolor1" />&nbsp;
            <input type="button" value="이전화면" class="btn btn-sm mycolor1" onclick="history.back();" />
        </div>
    </form>
@endsection
