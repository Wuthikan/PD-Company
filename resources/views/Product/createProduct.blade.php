@extends('layouts.main')
<section id ="contact" class="section-padding">
  <div class="container">
    <div class="row">
      <div class="header-section text-center">
        <h2>เพิ่มสินค้า</h2>

        <hr class="bottom-line">
        @if($errors->any())
      			<ul class="alert alert-danger">
      				@foreach($errors->all() as $error)
      					<li>{{ $error }}</li>
      				@endforeach
      			</ul>
      	@endif
      </div>


          {!! Form::open(['url' => 'product']) !!}

              <div class="form-group">
              {!! Form::label('title', 'ชื่อสินค้า')
              !!}
              {!! Form::text('name', null, ['class' => 'form-control']) !!}

              </div>
              <div class="form-group">
              {!! Form::label('body', 'ความกว้าง(เมตร)') !!}
              {!! Form::text('width', null, ['class' => 'form-control']) !!}
              </div>
              <div class="form-group">
              {!! Form::label('body', 'จำนวณสินค้าในคลัง') !!}
              {!! Form::text('amount', null, ['class' => 'form-control']) !!}
              </div>
                <hr class="bottom-line">
              <div class="form-group">

              {!! Form::submit('เพิ่มสินค้า',
              ['class'=>'btn btn-block btn-submit']) !!}
              </div>
      {!! Form::close() !!}
    </div>
  </div>
</section>


@section('content')
