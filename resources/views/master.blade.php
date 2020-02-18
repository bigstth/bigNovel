<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>bigNovel อ่านนิยายออนไลน์</title>
    <base href="{{ URL::asset('/') }}" target="_top">
    <link rel="preload" href="{{ url('css/bootstrap.min.css') }}" as="style">
    <link rel="preload" href="{{ url('css/mycustomize.css') }}" as="style">
    <link rel="preload" href="{{ url('slick/slick.css') }}" as="style">
    <link rel="preload" href="{{ url('slick/slick-theme.css') }}" as="style">

    <link rel="preload" href="{{ url('js/jquery-1.11.0.min.js') }}" as="script">
    <link rel="preload" href="{{ url('js/jquery-migrate-1.2.1.min.js') }}" as="script">
    <link rel="preload" href="{{ url('slick/slick.min.js') }}" as="script">
    <link rel="preload" href="{{ url('js/popper.min.js') }}" as="script">
    <link rel="preload" href="{{ url('js/bootstrap.min.js') }}" as="script">
    <link rel="preload" href="{{ url('js/mycustomize.js') }}" as="script">

    <link rel="stylesheet" href="{{ url('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('css/mycustomize.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('slick/slick.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ url('slick/slick-theme.css') }}"/>

    <script src="https://kit.fontawesome.com/290c141738.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Kanit&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Bai+Jamjuree&display=swap" rel="stylesheet">

    
</head>
<body>
 
{{--menu--}}
<nav class="navbar navbar-expand-lg navbar-dark ">
    <div class="container"> 
        <a class="navbar-brand mb-0 h1 " href="{{ url('/')}}">bigNovel</a>
        <div class="navbar-toggler">
        <button class="navbar-toggler mr-2" data-toggle="collapse" data-target="#menudrop" aria-controls="menudrop" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <button class="btn btn-warning" data-toggle="modal" data-target="#login">เข้าสู่ระบบ</button>
       
        
        
    </div>
        <div class="collapse navbar-collapse " id="menudrop">
          <ul class="navbar-nav mr-auto">
            
            <li class="nav-item active">
              <a class="nav-link" href="{{ url('/search')}}"><span class="fas fa-search pr-1"></span> หมวดหมู่นิยาย</a>
             
            </li>
            <li class="nav-item active">
                    <a class="nav-link" href="{{ url('/ranking')}}"><span class="fas fa-star pr-1"></span> นิยายยอดนิยม</a>
            </li>
            <li class="nav-item active">
                    <a class="nav-link" href="{{ url('/bookshelf')}}"><span class="fas fa-bookmark pr-1"></span> ชั้นหนังสือ</a>
            </li>
            <li class="nav-item active">
                    <a class="nav-link" href="{{ url('/writer')}}"><span class="fas fa-feather-alt pr-1"></span> เขียนนิยาย</a>
            </li>
          </ul>
            <div class="col d-none d-lg-block  d-md-none d-xl-block text-right">
              <a href="{{ url('/register')}}" class="btn btn-warning">สมัครสมาชิก</a>
                <button class="btn btn-success" data-toggle="modal" data-target="#login">เข้าสู่ระบบ</button>
              </div>
        </div>
    </div>
      </nav>
      {{-- modal of login --}}
      <div class="modal fade" id="login" tabindex="1" role="dialog" aria-labelledby="เข้าสู่ระบบ" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">เข้าสู่ระบบ</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"><button type="button" class="btn btn-danger" data-dismiss="modal">X</button>
                </span>
              </button>
            </div>
            <div class="modal-body">
              <form>
                <div class="form-group">
                  <label for="username">ชื่อผู้ใช้งาน</label>
                  <input type="email" class="form-control" id="username" aria-describedby="username">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">รหัสผ่าน</label>
                  <input type="password" class="form-control" id="exampleInputPassword1">
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-warning">สมัครสมาชิก</button>
              <button type="submit" class="btn btn-success">เข้าสู่ระบบ</button>
            </form>
            </div>
          </div>
        </div>
      </div>
      {{-- end of modal of login --}}
      @yield('slide')
{{--content--}}
    @yield('content')
{{-- </div> --}}

<div class="card">
    <div class="card-body text-center">
        {{--Footer--}}
       <a href="{{ url('/contact')}}" class="text-black-50 ">ติดต่อเรา</a>
    </div>
</div>
<script src="{{ url('js/jquery-3.4.1.min.js') }}"></script>
<script type="text/javascript" src="{{ url('js/jquery-1.11.0.min.js') }}"></script>
<script type="text/javascript" src="{{ url('js/jquery-migrate-1.2.1.min.js') }}"></script>
<script type="text/javascript" src="{{ url('slick/slick.min.js') }}" charset="UTF-8"></script>
<script src="{{ url('js/popper.min.js') }}"></script>
<script src="{{ url('js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ url('js/mycustomize.js') }}"></script>

</body>
</html>