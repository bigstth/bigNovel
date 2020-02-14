@extends('master')
@section('content')

<?php 
$check= DB::table('story')->count();
  $stid = $id;
  if($id>$check || $id==0){
    echo '<div class="container text-center mt-4 mb-4 h2">ไม่มีนิยายเรื่องนี้ <br> <a href="/" class="btn btn-success mt-3">กลับหน้าหลัก</a></div> ';
  }
  else{
  $storys = DB::table('story')->where('storyId',$stid)->first();
  $category = DB::table('category')->where('categoryId',$storys->categoryId)->first();
  $user = DB::table('user')->where('userId',$storys->userId)->first();
  $chapter = DB::table('chapter')->where('storyId',$storys->storyId)->orderBy('chapterNo','asc')->get();
  $chapterCount = $chapter->count();
  //$chapterViews = DB::table('chapter')->where('storyId',$storys->storyId)->sum('chapterView');
  $chapterViews2 = $chapter->sum('chapterView');

?>
@foreach ($user as $val)
@endforeach

<div class="container">
    <div class="row">
        <!-- News jumbotron -->
<div class="jumbotron text-center hoverable p-4 mt-4" style="background: #2A2A2A;">

  <!-- Grid row -->
  <div class="row">

    <!-- Grid column -->
    <div class="col-md-4 offset-md-1 mx-3 my-3">

      <!-- Featured image -->
      <div class="view overlay">
        <img src="images/storybanners/{!! $storys->storyBanner !!}" class="img-fluid cardhover" alt="{!! $storys->storyName !!} style=">
        <a>
          <div class="mask rgba-white-slight"></div>
        </a>
      </div>

    </div>
    <!-- Grid column -->

    <!-- Grid column -->
    <div class="col-md-7 text-md-left ml-3 mt-3">

      <!-- Excerpt -->
    
      <h2 class="mb-4 text-light"> {!! $storys->storyName !!} </h2>
      <a href="category/{!! $category->categoryId !!}"><small class="card-text btn btn-outline-warning btn-sm mb-3"> <span class="fas fa-layer-group"></span> หมวดหมู่: {!! $category->categoryName !!}</small></a>
      <small class="card-text btn btn-outline-warning btn-sm mb-3"> <span class="fas fa-layer-group"></span> โดย: {!! $user->penname!!}</small>

      <p class="font-weight-normal text-light storyDes  mt-2"> {!! $storys->storyDescription !!}</p>

        <a href="#" class="btn btn-warning mb-3 pr-5 pl-5"><span class="fas fa-book-reader"> </span>  อ่าน</a>
        <a href="#" class="btn btn-warning mb-3 pr-5 pl-5 ml-2"><span class="fas fa-plus"></span> เพิ่มลงชั้นหนังสือ </a>
    </div>
    <!-- Grid column -->
    <div class="text-center ml-5">
    <small class="mb-3 ml-5 text-warning"> <span class="far fa-eye"></span> {!! $chapterViews2 !!}</small>
    <small class="mb-3 ml-5 text-success"> <span class="far fa-clock"></span> อัพเดทล่าสุด {!! fbtime($storys->storyUpdate); !!}</small>
    </div>
</div>
  <!-- Grid row -->

</div>
<!-- News jumbotron -->     

    </div>
    <div style="background: #FFBB33; border-radius: 0.3em;"><h3 class="text-center pt-2 pb-2"> สารบัญ</h3></div>
    @foreach ($chapter as $cp)

  <a href="chapter/{!! $cp->chapterId !!}" class="btn btn-light btn-sm mb-1 cardhover" style="background: #F0F0F0; border-radius: 0.3em; width:100%; border: none;"> 
        <div class="row justify-content-md-center mb-1">
            <div class="col col-lg-2 pt-2 pl-5">
              <h5> ตอนที่ {!! $cp->chapterNo !!} </h5>
            </div>
            <div class="col col-lg-5 text-left pt-2">
                <h5>  {!! $cp->chapterName !!} </h5>
            </div>
            <div class="col col-lg-2  pt-2">
                <h5> <span class="far fa-eye"></span> {!! $cp->chapterView !!}</h5>
            </div>
            <div class="col col-lg-3  pt-2 pr-5">
                <h5> <span class="far fa-clock"></span> {!! fbtime($cp->chapterCreate); !!} </h5>
            </div>
      
          </div>
        </a>
   


    @endforeach


</div>
<?php } ?>
<?php 
function fbtime($timestamp){
  
  date_default_timezone_set("Asia/Bangkok");         
  $time_ago        = strtotime($timestamp);
  $current_time    = time();
  $time_difference = $current_time - $time_ago;
  $seconds         = $time_difference;
  
  $minutes = round($seconds / 60); // value 60 is seconds  
  $hours   = round($seconds / 3600); //value 3600 is 60 minutes * 60 sec  
  $days    = round($seconds / 86400); //86400 = 24 * 60 * 60;  
  $weeks   = round($seconds / 604800); // 7*24*60*60;  
  $months  = round($seconds / 2629440); //((365+365+365+365+366)/5/12)*24*60*60  
  $years   = round($seconds / 31553280); //(365+365+365+365+366)/5 * 24 * 60 * 60
                
  if ($seconds <= 60){

    return "เมื่อสักครู่";

  } else if ($minutes <= 60){

    if ($minutes == 1){

      return "1 นาที";

    } else {

      return "$minutes นาที";

    }

  } else if ($hours <= 24){

    if ($hours == 1){

      return "ชั่วโมงที่แล้ว";

    } else {

      return "$hours ชั่วโมง";

    }

  } else if ($days <= 7){

    if ($days == 1){

      return "เมื่อวาน";

    } else {

      return "$days วัน";

    }

  } else if ($weeks <= 4.3){

    if ($weeks == 1){

      return "อาทิตย์ที่แล้ว";

    } else {

      return "$weeks อาทิตย์";

    }

  } else if ($months <= 12){

    if ($months == 1){

      return "เดือนที่แล้ว";

    } else {

      return "$months เดือน";

    }

  } else {
    
    if ($years == 1){

      return "ปีที่แล้ว";

    } else {

      return "$years ปี";

    }
  }
}

?>
@endsection