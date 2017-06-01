@extends('layouts.main')

@section('content')

<section id ="feature" class="section-padding">
    <div class="container">
      <div class="row">
        <div class="header-section text-center">
          <h2>@if($type==1)
            ตารางส่งคอนกรีตผสมเสร็จ
          @else
            ตารางส่งคอนกรีตแผ่นพื้น
          @endif</h2>
            <hr class="bottom-line">



          {!! $calendar->calendar() !!}

      </div>


<hr>

</div>
</section>

@endsection
@section('scripts')
{!! HTML::script('fullcalendar/lib/jquery.min.js') !!}
{!! HTML::script('fullcalendar/lib/moment.min.js') !!}
{!! HTML::script('fullcalendar/fullcalendar.js') !!}
  {!! $calendar->script() !!}

  @endsection
