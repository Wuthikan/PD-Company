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
        <div class="col-md-6 col-sm-6 col-xs-12 left">

          <img src="{{ url('mentor/img/course05.jpg') }}" class="img-responsive">
        </div>
          <div class="col-md-6 col-sm-6 col-xs-12 right">
            @if($errors->any())
                <ul class="alert alert-danger">
                  @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
            @endif

          <br>



                      {!! Form::open(['url' => 'boxconcrete', 'name' => 'form1' ,'class' => 'contactForm form-horizontal']) !!}
                      <input type="hidden" value="{{ $idinvoice }}" name="idinvoice" id="idinvoice" >
                      <input type="hidden" value="{{ $products->id }}" name="idproduct" id="idproduct" >
                      <div class="form-group">
                        <label for="inputEmail3" class="col-sm-5 col-md-5 control-label">ความกว้าง(เมตร)</label>
                        <div class="col-sm-7 col-md-7">
                          <label class="form-control"  >{{ $products->width }} </label>
                          <input type="hidden" value="{{ $products->width }}" name="width" id="width" >
                          </div>
                          <div class="validation"></div>
                        </div>
                        <div class="form-group">
                          <label for="inputEmail3" class="col-sm-5 col-md-5 control-label">ความยาว(เมตร)</label>
                            <div class="col-sm-7 col-md-7 ">
                              <input type="text" class="form-control"   name="height" id="height" onkeyup='plus()' >
                            </div>
                            <div class="validation"></div>
                        </div>
                          <div class="form-group">
                            <label for="inputEmail3" class="col-sm-5 col-md-5 control-label">จำนวณแผ่น</label>
                              <div class="col-sm-7 col-md-7 ">
                                <input type="text" class="form-control"   name="amount" id="amount" onkeyup='plus()' >
                              </div>
                              <div class="validation"></div>
                            </div>
                              <div class="form-group">
                              <label for="inputEmail3" class="col-sm-5 col-md-5 control-label">จำนวนตารางเมตร</label>
                                <div class="col-sm-7 col-md-7 ">
                                  <b>
                                <input type="text" class="form-control"   name="total" id="total" >
                              </b>
                                </div>
                                <div class="validation"></div>
                              </div>
                                <div class="form-group">
                              <label for="inputEmail3" class="col-sm-5 col-md-5 control-label">ราคาต่อหน่วย</label>
                                <div class="col-sm-7 col-md-7">
                                  <input type="text" class="form-control"   name="price" id="price" onkeyup='plus()' >
                                </div>
                                <div class="validation"></div>
                              </div>
                                <div class="form-group">
                            <label for="inputEmail3" class="col-sm-5 col-md-5 control-label">ราคารวม</label>
                            <div class="col-sm-7 col-md-7 ">
                              <b>
                            <input type="text" class="form-control" name="lastprice" id="lastprice"  onkeyup='plus()' />
                          </b>
                            </div>

                          <div class="validation"></div>
                      </div>
                      <div class="header-section text-right">
                        <button type="submit" id="submit" name="submit" class="form contact-form-button light-form-button oswald light">สั่งซื้อ</button>
                    </div>
                    {!! Form::close() !!}

          </div>
        </div>

<script language='javascript' type='text/javascript'>
function plus(){
         var Width = document.form1.width.value;
         var Height = document.form1.height.value;
         var Amount = document.form1.amount.value;
         if(Width == "" || Height == ""|| Amount == ""){return false;}
         var Total = 0;
         Total = (Number(Width)  * Number(Height)* Number(Amount)).toFixed(3);
          form1.total.value = Total;
        var Price = document.form1.price.value;
          Lastprice = (Number(Total)  * Number(Price)).toFixed(2);
          form1.lastprice.value = Lastprice;
         }
</script>
    </div>
  </div>
</section>

@endsection
