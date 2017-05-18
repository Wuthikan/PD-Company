@extends('layouts.main')

@section('content')
<section id ="contact" class="section-padding">
  <div class="container">
    <div class="row">
      <div class="header-section text-center">


        <h2>คอนกรีทผสม</h2>
        <hr class="bottom-line">
      </div>
      <div id="sendmessage">Your message has been sent. Thank you!</div>
      <div id="errormessage"></div>

      <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12 left">

          <img src="{{ url('mentor/img/course01.jpg') }}" class="img-responsive">
        </div>
          <div class="col-md-6 col-sm-6 col-xs-12 right">

          <form  role="form" class="contactForm form-horizontal">

          <br>
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-3 control-label">ยาว (เมตร)</label>
              <div class="col-sm-9">
              <input type="text" name="long" class="form-control form" id="long" placeholder="" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
              </div>
                <div class="validation"></div>
            </div>
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-3 control-label">กว้าง (เมตร)</label>
                <div class="col-sm-9">
                <input type="text" class="form-control" name="width" id="width" placeholder="" data-rule="email" data-msg="Please enter a valid email" />
              </div>
                <div class="validation"></div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">หนา (มิลเมตร)</label>
                  <div class="col-sm-9">
                <input type="text" class="form-control" name="thick" id="thick" placeholder="1 ม. = 1000 มิลเมตร " data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
              </div>
                <div class="validation"></div>
            </div>

            <div class="header-section text-right">
              <button type="button" id="submit" name="submit" class="form contact-form-button light-form-button oswald light" onclick="Calculate()">คำนวณความต้องการ</button>
          </div>
                </form>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 col-sm-6 col-xs-12">
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


            {!! Form::open(['url' => 'concrete', 'name' => 'form1', 'class' => 'contactForm form-horizontal']) !!}
            <input type="hidden" value="{{ $idinvoice }}" name="idinvoice" id="idinvoice" >

            <div class="form-group">
              <label for="inputEmail3" class="col-sm-5 control-label">คอนกรีต ปริมาณ (คิว)</label>
                <div class="col-sm-7">
                <input type="text" class="form-control" name="amount" id="amount"    />
                </div>
                <div class="validation"></div>
              </div>

                <div class="form-group">
                <label for="inputEmail3" class="col-sm-5 control-label">ราคาต่อคิว</label>
                  <div class="col-sm-7">
                    <input type="text" class="form-control"   name="price" id="price" onkeyup='plus()' >
                  </div>
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-5 control-label">รวม</label>
                  <div class="col-sm-7">
                  <input type="text" class="form-control" name="lastprice" id="lastprice"  onkeyup='plus()' />
                  </div>
                <div class="validation"></div>
            </div>
            <div class="form-group">
            <div class="header-section text-right">
              <button type="submit" id="submit" name="submit" class="form contact-form-button light-form-button oswald light">สั่งซื้อ</button>
          </div>
            </div>
          {!! Form::close() !!}


          </div>
      </div>
<script language='javascript' type='text/javascript'>


function Calculate()
{
  var resources = document.getElementById('long').value;
  var minutes = document.getElementById('width').value;
  var thick = document.getElementById('thick').value;
  var permin = parseFloat(resources) / 60;
  document.getElementById('amount').value= (parseFloat(permin) * parseFloat(minutes)* parseFloat(thick)).toFixed(0);
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
    </div>
  </div>
</section>
@endsection
