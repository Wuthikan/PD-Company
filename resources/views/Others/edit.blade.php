@extends('layouts.main')

@section('content')
<section id ="contact" class="section-padding">
  <div class="container">
    <div class="row">
      <div class="header-section text-center">


        <h2>ค่าใช้จ่ายเพิ่มเติม</h2>
        <hr class="bottom-line">
      </div>


      <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12 left">

          <img src="{{ url('mentor/img/course01.jpg') }}" class="img-responsive">
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
        {!! Form::model($other, ['method' => 'PATCH',
            'action' => ['OtherController@update', $other->id]
            ]) !!}
            <input type="hidden" value="<?=$_GET["idinvoice"]?>" name="idinvoice" id="idinvoice" >
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-5 control-label">ชื่อรายการ</label>
              <div class="col-sm-7">
                {!! Form::text('detail', null, ['class' => 'form-control']) !!}

              </div>
              <label for="inputEmail3" class="col-sm-5 control-label">ราคา</label>
                <div class="col-sm-7">
                    {!! Form::text('price', null, ['class' => 'form-control']) !!}
                </div>

              <div class="validation"></div>
          </div>
          <div class="header-section text-right">
            <button type="submit" id="submit" name="submit" class="form contact-form-button light-form-button oswald light">เพิ่มรายการ</button>
        </div>
        {!! Form::close() !!}


        </div>
        </div>


    </div>
  </div>
</section>
@endsection
