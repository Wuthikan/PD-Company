@extends('layouts.main')

@section('content')
<section id ="contact" class="section-padding">
  <div class="container">
      <div class="row">
      <div class="header-section text-center">


        <h2>คอนกรีทผสม</h2>
        <hr class="bottom-line">
      </div>
    </div>
      <div class="row">

        <div class="col-md-5 col-sm-6 col-xs-12 left">

          <img src="{{ url('img/IMG_7179.jpg') }}" class="img-responsive img-rounded">
        </div>
        <div class="col-md-7 col-sm-6 col-xs-12 right">
<br>
          {!! Form::open(['url' => 'concrete', 'name' => 'form1', 'class' => 'contactForm form-horizontal']) !!}
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="hidden" value="{{ $idinvoice }}" name="idinvoice" id="idinvoice" >

          <div class="form-group">
            <label for="inputEmail3" class="col-sm-5 col-md-5 col-xs-12 control-label">ปริมาณ (คิว)</label>
              <div class="col-sm-7 col-md-7 col-xs-12">
              <input type="text" class="form-control" name="amount" id="amount"    />
              </div>
              <div class="validation"></div>
            </div>

              <div class="form-group">
              <label for="inputEmail3" class="col-sm-5 col-md-5 col-xs-12 control-label">ราคาต่อคิว</label>
                <div class="col-sm-7 col-md-7 col-xs-12">
                  <input type="text" class="form-control"   name="price" id="price" onkeyup='plus()' >
                </div>
                <div class="validation"></div>
              </div>
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-5 col-md-5 col-xs-12 control-label">รวม</label>
                <div class="col-sm-7 col-md-7 col-xs-12">
                <input type="text" class="form-control" name="lastprice" id="lastprice"  onkeyup='plus()' />
                </div>
              <div class="validation"></div>
          </div>

          <div class="header-section text-right">
            <button type="submit" id="submit" name="submit" class="form con
            tact-form-button light-form-button oswald light">สั่งซื้อ</button>

          </div>
        {!! Form::close() !!}


        </div>

        </div>
        <div class="row">
          <div class="col-md-6 col-sm-4 col-xs-12">
          </div>
          <div class="col-md-6 col-sm-8 col-xs-12 right">

          <form  role="form" class="contactForm form-horizontal">

          <br>
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-4 col-md-5 col-xs-12 control-label">ยาว (เมตร)</label>
              <div class="col-sm-8 col-md-7 col-xs-12 ">
              <input type="text" name="long" class="form-control form" id="long" placeholder="" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
              </div>
                <div class="validation"></div>
            </div>
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-4 col-md-5 col-xs-12 control-label">กว้าง (เมตร)</label>
                <div class="col-sm-8 col-md-7 col-xs-12 ">
                <input type="text" class="form-control" name="width" id="width" placeholder="" data-rule="email" data-msg="Please enter a valid email" />
              </div>
                <div class="validation"></div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-4 col-md-5 col-xs-12 control-label">หนา (เมตร)</label>
                  <div class="col-sm-8 col-md-7 col-xs-12 ">
                <input type="text" class="form-control" name="thick" id="thick"  data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
              </div>
                <div class="validation"></div>
            </div>

            <div class="header-section text-right">
              <button type="button" id="submit" name="submit" class="form contact-form-button light-form-button oswald light" onclick="Calculate()">
                คำนวณความต้องการ <i class="fa fa-arrow-up" aria-hidden="true"></i></button>
           </div>
                </form>
          </div>

      </div>
    </div>
<script language='javascript' type='text/javascript'>
function Calculate()
{
  var resources = document.getElementById('long').value;
  var minutes = document.getElementById('width').value;
  var thick = document.getElementById('thick').value;
  document.getElementById('amount').value= (parseFloat(resources) * parseFloat(minutes)* parseFloat(thick)).toFixed(0);
document.form1.submit();

}
function plus(){
         var one = document.form1.amount.value;
         var two = document.form1.price.value;
         if(one == "" || two == ""){return false;}
         var three = 0;
         three = Number(one)  * Number(two);
          form1.lastprice.value = three;
         }
</script>

</section>
@endsection
