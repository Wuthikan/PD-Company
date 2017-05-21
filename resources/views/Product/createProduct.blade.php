@extends('layouts.main')
<section id ="contact" class="section-padding">
  <div class="container">
    <div class="row">
      <div class="header-section text-center">
        <h2>สร้างรายการสินค้า</h2>

        <hr class="bottom-line">
        @if($errors->any())

      				@foreach($errors->all() as $error)
              <?php
              Alert::info($error)->persistent("Close");
              ?>
      				@endforeach
      	@endif
      </div>


          {!! Form::open(['url' => 'product' , 'class' => 'form-horizontal']) !!}
<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12 ">
          <div class="form-group">
              {!! Form::label('title', 'ชื่อสินค้า:', ['class' => 'col-sm-5 col-md-4 col-xs-12 control-label'])  !!}
           <div class="col-sm-7 col-md-8 col-xs-12">
               {!! Form::text('name', null, ['class' => 'form-control']) !!}
           </div>
           </div>
           <div class="form-group">
               {!! Form::label('title', 'รหัสสินค้า:', ['class' => 'col-sm-5 col-md-4 col-xs-12 control-label'])  !!}
            <div class="col-sm-7 col-md-8 col-xs-12">
                {!! Form::text('code', null, ['class' => 'form-control']) !!}
            </div>
            </div>
            <div class="form-group">
                    {!! Form::label('title', 'ความกว้าง(เมตร):', ['class' => 'col-sm-5 col-md-4 col-xs-12 control-label'])  !!}
                 <div class="col-sm-7 col-md-8 col-xs-12">
                     {!! Form::text('width', null, ['class' => 'form-control']) !!}
                 </div>
             </div>
             <div class="form-group">
                     {!! Form::label('title', 'จำนวณสินค้าในคลัง:', ['class' => 'col-sm-5 col-md-4 col-xs-12 control-label'])  !!}
                  <div class="col-sm-7 col-md-8 col-xs-12">
                      {!! Form::text('amount', null, ['class' => 'form-control']) !!}
                  </div>
              </div>

              <div class="form-group">
                  <div class="col-md-5 col-md-offset-7 col-sm-5 col-sm-offset-7 col-xs-12 ">
                    <button type="submit" class="btn btn-bg green btn-block" >เพิ่มสินค้า <i class="fa fa-plus" aria-hidden="true"></i></button>
                </div>
              </div>
        </div>
      {!! Form::close() !!}
    </div>
  </div>
</section>


@section('content')
