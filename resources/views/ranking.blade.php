@extends('master')
<?php
$storys=DB::table('story')
->orderBy('storyLike','desc')
->get();


?>
<section class="backgroundsection1 pb-5" style="background: rgb(214,214,214);
background: linear-gradient(0deg, rgba(214,214,214,1) 0%, rgba(246,246,246,1) 100%);">
@section('content')

<div class="container">
  <div class="h1 mt-5">นิยายยอดนิยม</div><hr>
    @foreach ($storys as $story)
        <?php $chapters = DB::table('chapter')->where('storyId',$story->storyId)->get();
        $cps = $chapters->count(); 
        $views= $chapters->sum('chapterView'); 
        ?>
        
        <div class="jumbotron text-center hoverable p-1 mt-4 cardshadow cardhover" style="background: #2A2A2A; border-radius: 1em;">

                <div class="row">
    
                            <!-- Grid column -->
                            <div class="col-md-3 offset-md-1 mx-3 my-3">
                                    <a href="storys/{!! $story->storyId !!}" class="stretched-link" >
    
                              <!-- Featured image -->
                              <div class="view overlay">
                                   
                                <img src="images/storybanners/{!! $story->storyBanner !!}" class="img-fluid cardhover" alt="{!! $story->storyName !!}" style="width:150px; height:150px; border-radius:5em; border: 5px solid #FFD101;">
                          
                               
                              </div></a>
                        
                            </div>
                            <!-- Grid column -->
                        
                            <!-- Grid column -->
                            <div class="col-md-8 text-md-left ml-3 mt-3">
                                    <a href="storys/{!! $story->storyId !!}" class="stretched-link" ></a>
    
                              <!-- Excerpt -->
                           
    
                          <h2 class="mb-1 text-light">{!! $story->storyName !!}</h2> 
                              <div class="mb-3">
                            <small class="mb-3 text-danger"> <span class="fas fa-star"></span> {!! $story->storyLike !!} </small>
                              <small class="mb-3 text-warning"> <span class="far fa-eye"></span> {{$views}} </small>
                              <small class="mb-3 text-secondary"> <span class="fas fa-bars"></span> {{$cps}} ตอน</small>
                              <small class="mb-3 text-success"> <span class="far fa-clock"></span> อัพเดทล่าสุด {!! fbtime($story->storyUpdate); !!}</small>
                              </div>
                           <div class="mb-3"> <small class="text-light">{{ cutStr($story->storyDescription,'500','') }}</small> </div>
                            
                        </div>
                        <!-- Grid column -->
                        </div>
            </div>
            @endforeach

</div></section>
@endsection
<?php 
function cutStr($str, $maxChars='', $holder=''){

if (strlen($str) > $maxChars ){
    $str = iconv_substr($str, 0, $maxChars,"UTF-8") . $holder;
} 
return $str;
} 
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