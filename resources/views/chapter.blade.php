@extends('master')
<?php 
$chapter = DB::table('chapter')->where('chapterId',$id)->first();
$story = DB::table('story')->where('storyId',$chapter->storyId)->first();
$count = DB::table('chapter')->where('storyId',$chapter->storyId)->count();
?>

@section('content')
<div class="container mt-3">
 <div class="h2">{!! $story->storyName !!}</div>
 <div class="h4">ตอนที่ {!! $chapter->chapterNo !!} {!! $chapter->chapterName !!} </div>
 <div><small class="ml-1"><i class="far fa-clock pr-1"></i>{!! fbtime($chapter->chapterUpdate); !!} <i class="far fa-eye pr-1"></i>{!! $chapter->chapterView !!}</small></div>
 <div class="text-right mr-3"><i class="fas fa-adjust"></i> เปลี่ยนโทนสี</div>
<div class="readnovel mt-3">{!! $chapter->chapterContent !!}</div>
<div class="readnovel mt-3">{!! $chapter->chapterContent2 !!}</div>
<div class="row text-center mt-4 mb-4">
        @if ($count<$chapter->chapterNo)
        <?php $before = DB::table('chapter')->where('storyId',$chapter->storyId)->where('chapterId','<',$id)->latest('chapterId')->first(); ?>
        <div class="col"><a href="chapter/{!! $before->chapterId !!}" class="stretched-link btn btn-warning btn-block btn-lg">ตอนที่ {!! $before->chapterNo !!} {!! $before->chapterName !!}</a></div>
        
        @elseif($count==$chapter->chapterNo)
        <?php $before = DB::table('chapter')->where('storyId',$chapter->storyId)->where('chapterId','<',$id)->latest('chapterId')->first(); ?>
        <div class="col"><a href="chapter/{!! $before->chapterId !!}" class="stretched-link btn btn-warning btn-block btn-lg">ตอนที่ {!! $before->chapterNo !!} {!! $before->chapterName !!}</a></div>
      
        @elseif($count>$chapter->chapterNo && $chapter->chapterNo != 1)
        <?php $before = DB::table('chapter')->where('storyId',$chapter->storyId)->where('chapterId','<',$id)->latest('chapterId')->first(); ?>
        <div class="col"><a href="chapter/{!! $before->chapterId !!}" class="stretched-link btn btn-warning btn-block btn-lg">ตอนที่ {!! $before->chapterNo !!} {!! $before->chapterName !!}</a></div>
      
        @else
        <div class="col"><span class="stretched-link btn btn-warning btn-block btn-lg disabled">ไม่มีตอนก่อนหน้า</span></div>
        @endif
       
        <div class="col"><a href="storys/{{$chapter->storyId}}" class="stretched-link btn btn-danger btn-block btn-lg">กลับสู่สารบัญ</a></div>
        @if ($count>$chapter->chapterNo )
       <?php $next = DB::table('chapter')->where('storyId',$chapter->storyId)->where('chapterId','>',$id)->first(); ?>
       <div class="col"><a href="chapter/{!! $next->chapterId !!}" class="stretched-link btn btn-success btn-block btn-lg">ตอนที่ {!! $next->chapterNo !!} {!! $next->chapterName !!}</a></div>
       @else
       <div class="col"><span class="stretched-link btn btn-success btn-block btn-lg disabled">ยังไม่มีตอนถัดไป</span></div>
        @endif
      </div>
    </div>
</div>
@endsection
 
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