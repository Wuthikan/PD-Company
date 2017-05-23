@extends('layouts.main')

@section('content')
<section id ="contact" class="section-padding">
  <div class="container">
    <div class="row">
      <div class="header-section text-center">


        <h2>คอนกรีทแผ่นพื้น</h2>
        <hr class="bottom-line">
      </div>
      <div id="sendmessage">Your message has been sent. Thank you!</div>
      <div id="errormessage"></div>

      <div class="row">
        <div class="col-md-7 col-sm-6 col-xs-12 left">

          <img src="{{ url('img/4.jpg') }}" class="img-responsive">
        </div>
          <div class="col-md-5 col-sm-6 col-xs-12 right">
            @if($errors->any())
                <ul class="alert alert-danger">
                  @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
            @endif

          <br>

<div class="row">

                      {!! Form::open(['url' => 'boxconcrete', 'name' => 'form1' ,'class' => 'contactForm form-horizontal']) !!}
                      <input type="hidden" value="{{ $idinvoice }}" name="idinvoice" id="idinvoice" >
                      <input type="hidden" value="{{ $products->id }}" name="idproduct" id="idproduct" >
                      <div class="form-group">
                        <label for="inputEmail3" class="col-sm-5 col-md-5 control-label">ความกว้าง(เมตร)*</label>
                        <div class="col-sm-7 col-md-7">
                          <label class="form-control"  > 0.35 </label>
                          </div>
                          <div class="validation"></div>
                        </div>
                        <div class="form-group">
                          <label for="inputEmail3" class="col-sm-5 col-md-5 control-label">ความยาว(เมตร)*</label>
                            <div class="col-sm-7 col-md-7 ">
                              <input type="text" class="form-control"   name="height" id="height" onkeyup='plus()' >
                            </div>
                            <div class="validation"></div>
                        </div>
                          <div class="form-group">
                            <label for="inputEmail3" class="col-sm-5 col-md-5 control-label">จำนวณแผ่น*</label>
                              <div class="col-sm-7 col-md-7 ">
                                <input type="text" class="form-control"   name="amount" id="amount" onkeyup='plus()' >
                              </div>
                              <div class="validation"></div>
                            </div>
                                <div class="form-group">
                              <label for="inputEmail3" class="col-sm-5 col-md-5 control-label">ราคาต่อหน่วย*</label>
                                <div class="col-sm-7 col-md-7">
                                  <input type="text" class="form-control"   name="price" id="price" onkeyup='plus()' >
                                </div>
                                <div class="validation"></div>
                              </div>

                      <div class="header-section text-right">
                        <button type="submit" id="submit" name="submit" class="form contact-form-button light-form-button oswald light">สั่งซื้อ</button>
                    </div>
                    {!! Form::close() !!}

          </div>
        </div>
</div>

    </div>
  </div>
</section>

@endsection
