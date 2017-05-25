@extends('layouts.main')

@section('content')
<section id ="contact" class="section-padding">
  <div class="container">
    <div class="row">
      <div class="header-section text-center">


        <h2>คอนกรีทแผ่นพื้น {{ $concrete->name }} {{ $concrete->products->height }}เมตร</h2>
        <hr class="bottom-line">
      </div>
      <div class="row">
        <div class="col-md-7 col-sm-6 col-xs-12 left">

          <img src="{{ url('img/4.jpg') }}" class="img-responsive">
        </div>
          <div class="col-md-5 col-sm-6 col-xs-12 right">
          <br>
          {!! Form::model($concrete, ['method' => 'PATCH',
              'action' => ['BoxconcreteController@update', $concrete->id,'class' => 'contactForm form-horizontal']

              ]) !!}
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <input type="hidden" value="<?=$_GET["idinvoice"]?>" name="idinvoice" id="idinvoice" >
                      <input type="hidden" value="{{ $products->id }}" name="idproduct" id="idproduct" >
                          <div class="form-group">
                            <label for="inputEmail3" class="col-sm-5 col-md-5 control-label">จำนวณแผ่น</label>
                              <div class="col-sm-7 col-md-7 ">
                                {!! Form::text('amount', null, ['class' => 'form-control']) !!}
                              </div>
                              <div class="validation"></div>
                            </div>
                                <div class="form-group">
                              <label for="inputEmail3" class="col-sm-5 col-md-5 control-label">ราคาต่อหน่วย</label>
                                <div class="col-sm-7 col-md-7">
                                    {!! Form::text('price', null, ['class' => 'form-control']) !!}
                                </div>
                                <div class="validation"></div>
                              </div>

                      <div class="header-section text-right">
                        <button type="submit" id="submit" name="submit" class="form contact-form-button light-form-button oswald light">แก้ไข</button>
                    </div>
                    {!! Form::close() !!}

          </div>
        </div>
    </div>
  </div>
</section>

@endsection
