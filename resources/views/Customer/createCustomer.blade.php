
@extends('layouts.main')
@section('autocompax')
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
$( function() {
var availableTags = [
@foreach($customers as $customers)
"{{ $customers->name }}",
@endforeach
];
$( "#name" ).autocomplete({
source: availableTags
});
} );
</script>
  @endsection

@section('content')
<section id ="contact" class="section-padding">
  <div class="container">
    <div class="row">
      <div class="header-section text-center">
        <h2>เพิ่มข้อมูลลูกค้า</h2>

        <hr class="bottom-line">

      </div>
      <!-- <input type="text" name="term" id="q" data-action="{{ route('search-autocomplete') }}"> -->
<div class="col-md-5 col-md-offset-3 col-sm-7 col-sm-offset-1 col-xs-12 ">
          {!! Form::open(['url' => 'customer', 'class' => 'form-horizontal']) !!}

              <input type="hidden" value="{{ $idinvoice }}" name="idinvoice" id="idinvoice" >
              <div class="form-group">
              {!! Form::label('title', 'ชื่อลูกค้า', ['class' => 'col-sm-5 col-md-3 col-xs-12 control-label'])
              !!}
              <div class="col-sm-7   col-md-9 col-xs-12">
              {!! Form::text('name', null, ['class' => 'form-control']) !!}
            </div>
              </div>

              <div class="form-group">
                  <div class="col-md-5 col-md-offset-7 col-sm-5 col-sm-offset-7 col-xs-12 ">
                    <button type="submit" class="btn btn-bg green btn-block" >ตกลง <i class="fa fa-plus" aria-hidden="true"></i></button>
                </div>
              </div>
      {!! Form::close() !!}
    </div>
    </div>
  </div>
</section>

  @endsection
@section('scripts')
<!-- <script>

$('#name').autocomplete({
	 {"suggestions": ["United Arab Emirates", "United Kingdom", "United States"]}
});
</script> -->

  @endsection
