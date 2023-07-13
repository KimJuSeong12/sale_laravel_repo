<!DOCTYPE html>
<html lang="kr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>판매관리</title>
    <link rel="stylesheet" href="{{ asset('my/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('my/css/my.css') }}">
    <script src="{{ asset('my/js/jquery.js') }}"></script>
    <script src="{{ asset('my/js/popper.js') }}"></script>
    <script src="{{ asset('my/js/bootstrap.min.js') }}"></script>
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">판매관리</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="#">매입</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">매출</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">기간조회</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">통계</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Best제품</a></li>
                                <li><a class="dropdown-item" href="#">월별제품별현황</a></li>
                                <li><a class="dropdown-item" href="#">종류별분포도</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">기초정보</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('gubun.index') }}">구분</a></li>
                                <li><a class="dropdown-item" href="{{ route('product.index') }}">제품</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="{{ route('member.index') }}">사용자</a></li>
                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="#">사진</a></li>
                    </ul>
                    <a class="btn btn-sm btn-outline-secondary btn-dark" href="#">로그인</a>
                </div>
            </div>
        </nav>
        @yield('content')
</body>

</html>
