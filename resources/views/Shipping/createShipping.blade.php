@extends('layouts.main') @section('content')

<section id="feature" class="section-padding">
  <div class="container">
    <div class="row">
      <div class="header-section text-center">
        <h2>@if($invoice->type==1)
            ตารางส่งคอนกรีตผสมเสร็จ
          @else
            ตารางส่งคอนกรีตแผ่นพื้น
          @endif</h2>
        <hr class="bottom-line"> {{ Form::open(['route' => 'shipping.check2']) }} {{ csrf_field() }}
        <div class="cta-2-form text-center">
          <h3> กรุณาเลือกวันที่ต้องการ </h3>
          <input type="hidden" name="idinvoice" value="{{ $invoice->id }}">
          <input type="hidden" name="type" value="{{ $invoice->type }}"> {!! Form::date('date', null) !!} {!! Form::submit('Check',['class'=>'cta-2-form-submit-btn']) !!}
        </div>
        <hr>
        {!! Form::close() !!} {!! $calendar->calendar() !!}
      </div>
    </div>
</section>

@endsection
@section('scripts')
{!! $calendar->script() !!}
@endsection
