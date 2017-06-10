@extends('layouts.menuinventory')
<section id ="contact" class="section-padding">
  <div class="container">
    <div class="row">
      <div class="header-section text-center">
        <h2>สร้างรายการสินค้า</h2>

        <hr class="bottom-line">
      </div>


          {!! Form::open(['url' => 'product' , 'class' => 'form-horizontal']) !!}
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12 ">
          <div class="form-group">
              {!! Form::label('title', 'ชื่อสินค้า:', ['class' => 'col-sm-5 col-md-4 col-xs-12 control-label'])  !!}
           <div class="col-sm-7   col-md-8 col-xs-12">
               {!! Form::text('name', 'แผ่นพื้นสำเร็จรูป', ['class' => 'form-control']) !!}
           </div>
           </div>
           <div class="form-group">
               {!! Form::label('title', 'รหัสสินค้า:', ['class' => 'col-sm-5 col-md-4 col-xs-12 control-label'])  !!}
            <div class="col-sm-7  col-md-8 col-xs-12">
                {!! Form::text('code', null, ['class' => 'form-control']) !!}
            </div>
            </div>
            <div class="form-group">
                {!! Form::label('title', 'ความยาว', ['class' => 'col-sm-5 col-md-4 col-xs-12 control-label'])  !!}
             <div class="col-sm-7  col-md-8 col-xs-12">
                 {!! Form::text('height', null, ['class' => 'form-control']) !!}
             </div>
             </div>
             <div class="form-group">
                     {!! Form::label('title', 'จำนวณสินค้าในคลัง:', ['class' => 'col-sm-5 col-md-4 col-xs-12 control-label'])  !!}
                  <div class="col-sm-7  col-md-8 col-xs-12">
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
