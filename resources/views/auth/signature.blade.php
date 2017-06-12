@extends('layouts.main')

@section('content')

<section id ="feature" class="section-padding">
    <div class="container">
      <div class="row">
        <div class="header-section text-center">
          <h2>ลายเซ็นของท่าน </h2>
          <hr class="bottom-line">

            </div>
                <div class="row">
                    <div class="text-center">
                    </div>
                          <hr>
                          <div class="container">
                              <div class="row">
                                <div class="col-md-7 col-md-offset-2 col-sm-9 col-sm-offset-1 col-xs-12 ">
                                  {!! Form::model( ['method' => 'PATCH',
                                     'action' => ['ShippingController@updatepicture', $user->id ] , 'class' => 'form-horizontal' ,'files' => true
                                     ]) !!}
                                     <div class="form-group">
                                       <label for="inputPassword3" class="col-sm-3 col-md-3 col-xs-12 control-label">
                                         เพิ่มรูปภาพ
                                       </label>
                                        <div class="col-sm-6 col-md-6 col-xs-12">
                                          {!! Form::file('image',null) !!}
                                        </div>
                                        <br>
                                        <div class="col-sm-3 col-md-3 col-xs-12">
                                            {!! Form::submit('บันทึกลายเซ็น',['class'=>'btn btn-bg green btn-block']) !!}
                                        </div>
                                     </div>
                                  {!! Form::close() !!}
                                </div>
                              </div>
                          </div>

                </div>
    </div>
    <script>
    function goBack() {
        window.history.back();
    }
    </script>
</section>

@endsection
