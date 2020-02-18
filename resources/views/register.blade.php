@extends('master')

@section('content')
    <div class="container mt-5 mb-5" style="width: 50%">
            <form>
                    <div class="form-group">
                      <label for="username">ชื่อผู้ใช้งาน</label>
                      <input type="email" class="form-control" id="username" aria-describedby="username" autofocus>
                      <small id="usernameTip" class="form-text text-muted">เฉพาะภาษาอังกฤษ และ ตัวเลข เท่านั้น</small>
                    </div>
                    <div class="form-group">
                      <label for="password">รหัสผ่าน</label>
                      <input type="password" class="form-control" id="password">
                    </div>
                    <div class="form-group">
                            <label for="confirmpassword">ยืนยันรหัสผ่าน</label>
                            <input type="confirmpassword" class="form-control" id="confirmpassword">
                          </div>
                    <div class="form-group">
                        <label for="email">อีเมล</label>
                        <input type="email" class="form-control" id="email" aria-describedby="email" placeholder="ตัวอย่าง: example@gmail.com">
                    </div>
                    <div class="text-center">
                        <button type="reset" class="btn btn-danger mr-5">ลบ</button>
                        <button type="submit" class="btn btn-success">สมัครสมาชิก</button></div>
                    </form>
    </div>
@endsection