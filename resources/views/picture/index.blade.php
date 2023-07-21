@extends('main')
@section('content')
    <br>
    <div class="alert mycolor1" role="alert">제품사진</div>

    <script>
        function find_text() {
            form1.action = "{{ route('picture.index') }}";
            form1.submit();
        }
    </script>
    <form name="form1" action="" method="get">
        <div class="row">
            <div class="col-6" align="left">
                <div class="input-group input-group-sm">
                    <span class="input-group-text">이름</span>
                    <input class="form-control" type="text" name="text1" value="{{ $text1 }}"
                        onkeydown="if(event.keyCode == 13) {find_text();}">
                    <button class="btn mycolor1 ms-1" type="button" onclick="find_text()">검색</button>
                </div>
            </div>
        </div>
    </form>

    <div class="row">
        @foreach ($list as $row)
            @php
                $iname = $row->pic ? $row->pic : '';
                $pname = $row->name;
            @endphp
            <div class="col-3">
                <div class="mythumb_box">
                    <img src="{{ asset('/storage/product_img/thumb/' . $iname) }}" class="mythumb_image"
                        style="cursor: pointer" data-bs-toggle="modal" data-bs-target="#zoomModal"
                        onclick="document.getElementById('zoomModalLabel').innerText='{{ $pname }}'; picname.src='{{ asset('/storage/product_img/' . $iname) }}'">
                    <div class="mythumb_text">{{ $pname }}</div>
                </div>
            </div>
        @endforeach
    </div>
    </div>
@endsection

{{-- Zoom Modal 이미지 --}}
<div class="modal fade" id="zoomModal" tabindex="-1" aria-labelledby="zoomModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h5 class="modal-title" id="zoomModalLabel">상품명1</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" align="center">
                <img src="#" name="picname" class="img-fluid img-thumbnail" style="cursor: pointer"
                    data-bs-dismiss="modal">
            </div>
        </div>
    </div>
</div>
