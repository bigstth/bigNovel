@extends('master')
<?php $story = DB::table('story')
->orderBy('storyUpdate','desc')
->get();
$slide = DB::table('slide')->get();
?>
@section('slide')
<div id="overlay" style="z-index: 99;">
  <div class="spinner"></div>  <div class="h2 textpreload">bigNovel</div>
  </div>     
<section class="backgroundsection2 pt-2 ">
<section class="slidef slider d-none d-md-block d-lg-block d-xl-block">
    @foreach ($slide as $value)
    <div>
     <a href="storys/{{$value->link}}"> <img src="images/slide/{!! $value->img !!}"> </a>
    </div>
    @endforeach
  </section>
  <section>
      <section class="backgroundsection2 pt-2 ">
          <section class="slides slider d-block d-sm-none">
              @foreach ($slide as $value)
              <div>
              <a href="storys/{{$value->link}}"> <img src="images/slide/{{$value->img}}"> </a>
              </div>
              @endforeach
            </section>
            <section>
@endsection

@section('content')
<section class="backgroundsection1 pt-2">
<div class="container mb-4 pt-2 pb-3" style="border-radius:0.5em;background-color: #2A2A2A;">
 
     <div class="section1header mt-1"><h3 class="text-center pt-2 pb-2"><span class="fas fa-book"></span>  นิยายอัพเดทล่าสุด </h3></div>
      <div class="card-deck sm-12 pt-4" style="margin-left:2em;">
@foreach ($story as $value)
    <?php $category = DB::table('category')->where('categoryId',$value->categoryId)->first(); 
    $chapter = DB::table('chapter')->where('storyId',$value->storyId)->get();
    $chapterCount = $chapter->count();
    //$chapterViews = DB::table('chapter')->where('storyId',$value->storyId)->sum('chapterView');
    $chapterViews2 = $chapter->sum('chapterView');
    ?>
<!-- Card -->
<div class="row col-sm-12 col-md-6 col-lg-4 mb-4" style="margin-left:0.03em;">
<div class="card w-100 mb-4 cardshadow cardhover" style="border-radius: 0.5em;">
  <!-- Card image -->
  <div class="view overlay">
    <a href="storys/{{$value->storyId}}" class="stretched-link"><img class="card-img-top" src="images/storybanners/{{$value->storyBanner}}" style="border-radius: 0.4em 0.4em 0em 0em;height: 300px" alt="{!! $value->storyName !!}"> 
    </a>  <div class="card-img-overlay">
      <div class="row">
    <div class="col text-left"><small class="mb-3 text-success p-1 pr-2 pl-2 " style="background-color: rgba(0, 0, 0, 0.7); border-radius: 1em;"> <span class="far fa-clock"></span> {!! fbtime($value->storyUpdate); !!} </small></div>
    <div class="col text-right"><small class="mb-3 text-danger p-1 pr-2 pl-2" style="background-color: rgba(0, 0, 0, 0.7); border-radius: 1em;"> <span class="fas fa-star"></span> {!! $value->storyLike !!} </small></div>
    </div>
  </div>
      <div class="mask rgba-white-slight"></div>
    </a>
  </div>
  <div class="card-header text-center bg-warning h5">{!! $value->storyName !!}</div>
  <!-- Card content -->
  <div class="card-body text-center p-1">
    <!-- Title -->
    {{-- <h4 class="card-title">{!! $value->storyName !!}</h4> --}}
    {{-- <hr> --}}
    <!-- Text -->
    <small class="card-text pr-2"> <span class="fas fa-layer-group"></span> {!! $category->categoryName !!}</small>
    <small class="card-text"><span class="fas fa-bars"></span> {!! $chapterCount !!}</small>
    <small class="card-text"><i class="far fa-eye pr-1"></i>{!! $chapterViews2 !!}</small>

  </div>
  <!-- Card footer -->
  {{-- <div class="rounded-bottom text-center  pt-2" style="background: linear-gradient(to top, #E3E3E3 5%, #ffffff 100%);">
    <ul class="list-unstyled list-inline font-small ">
      <li class="list-inline-item pr-2 white-text"><i class="far fa-eye pr-1"></i>{!! $chapterViews2 !!}</li>
      <li class="list-inline-item pr-2"><i class="far fa-clock pr-1"></i>{!! fbtime($value->storyUpdate); !!}</li>
    </ul>
  </div> --}}
</div>
<!-- Card -->
    
    </div>
      @endforeach
    
    </div>
  </div>
  <section>
    
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

