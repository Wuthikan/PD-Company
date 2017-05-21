@extends('layouts.main')

@section('content')
<section id ="contact" class="section-padding">
  <div class="container">
    <div class="row">
      <div class="header-section text-center">


        <h2>คอนกรีทแผ่นพื้นสั่งพิเศษ</h2>
        <hr class="bottom-line">
      </div>
      <div id="sendmessage">Your message has been sent. Thank you!</div>
      <div id="errormessage"></div>

      <div class="row">

          <div class="col-md-6 col-sm-6 col-xs-12 right">
            @if($errors->any())
                <ul class="alert alert-danger">
                  @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
            @endif

          <br>


          {!! Form::model($concrete, ['method' => 'PATCH',
              'action' => ['ExtraConcreteController@update', $concrete->id,'class' => 'contactForm form-horizontal']

              ]) !!}
                      <input type="hidden" value="<?=$_GET["idinvoice"]?>" name="idinvoice" id="idinvoice" >
                      <div class="form-group">
                        <label for="inputEmail3" class="col-sm-5 col-md-5 control-label">ชื่อสินค้า</label>
                        <div class="col-sm-7 col-md-7">
                        {!! Form::text('name', null, ['class' => 'form-control']) !!}
                          </div>
                          <div class="validation"></div>
                        </div>
                      <div class="form-group">
                        <label for="inputEmail3" class="col-sm-5 col-md-5 control-label">ความกว้าง(เมตร)</label>
                        <div class="col-sm-7 col-md-7">
                        {!! Form::text('width', null, ['class' => 'form-control']) !!}
                          </div>
                          <div class="validation"></div>
                        </div>
                        <div class="form-group">
                          <label for="inputEmail3" class="col-sm-5 col-md-5 control-label">ความยาว(เมตร)</label>
                            <div class="col-sm-7 col-md-7 ">
                              {!! Form::text('height', null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="validation"></div>
                        </div>
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
          <div class="col-md-6 col-sm-6 col-xs-12 left">

            <img src="{{ url('img/5.jpg') }}" class="img-responsive">
          </div>
        </div>
    </div>
  </div>
</section>

@endsection
