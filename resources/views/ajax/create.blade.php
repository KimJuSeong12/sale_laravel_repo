@extends('main')
@section('content')
    <br>
    <div class="alert mycolor1" role="alert">구분</div>

    <form name="form1" action="{{ route('gubun.store') }}{{ $tmp }}" method="post">
        @csrf

        <table class="table table-bordered table-sm mymargin5">
            <tr>
                <td width="20%" class="mycolor2">번호</td>
                <td width="80%" align="left"></td>
            </tr>
            <tr>
                <td width="20%" class="mycolor2">
                    <font color="red">*</font> 구분명
                </td>
                <td width="80%" align="left">
                    <div class="d-inline-flex">
                        <input type="text" name="name" size="20" maxlength="20" value="{{ old('name') }}"
                            class="form-control form-control-sm" />
                    </div>
                    @error('name')
                        {{ $message }}
                    @enderror
                </td>
            </tr>

        </table>

        <div align="center">
            <input type="submit" value="저장" class="btn btn-sm mycolor1" />&nbsp;
            <input type="button" value="이전화면" class="btn btn-sm mycolor1" onclick="history.back();" />
        </div>
    </form>
@endsection
