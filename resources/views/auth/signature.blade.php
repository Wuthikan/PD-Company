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
                      <div class="row">
                        <div class="col-md-7 col-md-offset-5 col-sm-7 col-sm-offset-4 col-xs-5 col-xs-offset-3 ">
                      @if($user->pic_signature)
                        <img src="{{ url($user->pic_signature)}}"
                              class="img-responsive"
                              height="700" width="171"
                              >
                      @endif
                        </div>
                      </div>
                    </div>

                          <hr>
                          <div class="container">
                              <div class="row">
                                <div class="col-md-7 col-md-offset-3 col-sm-7 col-sm-offset-2 col-xs-12 ">
                                     {{ Form::open(['route' => 'signature.add' , 'files' => true ]) }} {{ csrf_field() }}
                                     <input type="hidden" name="id" value="{{ $user->id  }}">
                                     <div class="form-group">
                                       <label for="inputPassword3" class="col-sm-4 col-md-3 col-md-offset-1 col-xs-12 control-label">
                                         เพิ่มรูปภาพ
                                       </label>
                                        <div class="col-sm-6 col-md-5 col-xs-12">
                                          {!! Form::file('pic_signature',null) !!}
                                        </div>
                                        <br>
                                     </div>
                                     <br>
                                     <div class="col-sm-12 col-md-8 col-md-offset-1 col-xs-12">
                                         {!! Form::submit('บันทึกลายเซ็น',['class'=>'btn btn-bg green btn-block']) !!}
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
