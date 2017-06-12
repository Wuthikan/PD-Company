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
                                     'action' => ['ShippingController@updatepicture', $user->id ] ,'files' => true , 'class' => 'form-horizontal'
                                     ]) !!}                      
                                  {{!! Form::label('image','เพิ่มรูปภาพ') !!}}
                                  {{!! Form::file('image',null) !!}}
                                  {!! Form::close() !!}
                                </div>
                              </div>
                          </div>
                  <div class="col-md-1">
                    <a href="#" onclick="goBack()">
                      <i class="fa fa-chevron-left" aria-hidden="true"></i> Back
                    </a>
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
