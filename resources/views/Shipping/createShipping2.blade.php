@extends('layouts.main')

@section('content')

<section id ="feature" class="section-padding">
    <div class="container">
      <div class="row">
        <div class="header-section text-center">
          <h2>สร้างรายการส่งสินค้า </h2>
          <hr class="bottom-line">
          @if($errors->any())
              <ul class="alert alert-danger">
                @foreach($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
          @endif
                <div class="row">
                    <div class="text-center">
                      @if($request->type==1)
                        <h3>คิวส่งคอนกรีตผสม</h3>
                      @else
                        <h3>คิวส่งคอนกรีตแผ่นพื้น</h3>
                      @endif
                      <p>วันที่ {{ $request->date }} มีคิวที่ลงไว้แล้ว {{ $result }} คิว</p>
                          </div>
                    {{  Form::open(['route' => 'shipping.addShipping' , 'class' => 'form-horizontal']) }}
                           {{ csrf_field() }}

                        <input type="hidden" name="idinvoice" value="{{ $request->idinvoice }}">
                        <input type="hidden" name="type" value="{{ $request->type }}">
                          <input type="hidden" name="date" value="{{ $request->date }}">
                        <div class="container">
                          <div class="row">
                            <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-12 ">
                          <div class="form-group">
                           <label for="inputPassword3" class="col-sm-4 col-md-3 col-xs-3 control-label">ระยะทาง</label>
                           <div class="col-sm-8 col-md-9 col-xs-9">
                             <input type="text" class="form-control" name="distance">
                           </div>
                         </div>
                         <div class="form-group">
                          <label for="inputPassword3" class="col-sm-4 col-md-3 col-xs-3 control-label">ทะเบียนรถ</label>
                          <div class="col-sm-8 col-md-9 col-xs-9">
                            <input type="text" class="form-control" name="licenseplate">
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-md-4 col-md-offset-8 col-sm-8 col-sm-offset-4 col-xs-9 col-xs-offset-3">
                          {!! Form::submit('บันทึกรายการขนส่ง',['class'=>'btn btn-bg green btn-block']) !!}
                        </div>
                      </div>
                    {!! Form::close() !!}

                  </div>
                  </div>
                  </div>





                </div>
        </div>

    </div>

</section>

@endsection
