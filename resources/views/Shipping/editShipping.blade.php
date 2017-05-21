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
                      @if($shipping->type==1)
                        <h3>คิวส่งคอนกรีตผสม</h3>
                      @else
                        <h3>คิวส่งคอนกรีตแผ่นพื้น</h3>
                      @endif
                    @if (empty($date))
                      <p>วันที่ {{ $shipping->date->formatLocalized('%d %B %Y') }}
                        @else
                          <p>วันที่ {{ $date }}  มีคิวที่ลงไว้แล้ว

                             {{ $result }} คิว
                      @endif
                      	<a href="#" data-target="#editdate" data-toggle="modal" >
                          แก้ไขวันส่ง <i class="fa fa-pencil" aria-hidden="true"></i></a></p>
                          </div>
                    {!! Form::model($shipping, ['method' => 'PATCH',
                               'action' => ['ShippingController@update', $shipping->id ]  , 'class' => 'form-horizontal'
                               ]) !!}

                        <input type="hidden" name="idinvoice" value="{{ $shipping->idinvoice }}">
                        <input type="hidden" name="type" value="{{ $shipping->type }}">
                        @if (empty($date))
                          <input type="hidden" name="date" value="{{ $shipping->date }}">
                        @else
                        <input type="hidden" name="date" value="{{ $date }}">
                        @endif
                        <div class="container">
                          <div class="row">
                            <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-12 ">
                          <div class="form-group">
                           <label for="inputPassword3" class="col-sm-4 col-md-3 col-xs-3 control-label">ระยะทาง</label>
                           <div class="col-sm-8 col-md-9 col-xs-9">
                               {!! Form::text('distance', null, ['class' => 'form-control']) !!}

                           </div>
                         </div>
                         <div class="form-group">
                          <label for="inputPassword3" class="col-sm-4 col-md-3 col-xs-3 control-label">ทะเบียนรถ</label>
                          <div class="col-sm-8 col-md-9 col-xs-9">
                            {!! Form::text('licenseplate', null, ['class' => 'form-control']) !!}

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

                <div class="modal fade" id="editdate" role="dialog">
                  <div class="modal-dialog modal-sm">
                    <!-- Modal content no 1-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title text-center form-title">เลือกวันที่ ที่ต้องการ</h4>
                      </div>
                      <div class="modal-body padtrbl">

                        <div class="login-box-body">
                          <p class="text-center"></p>
                          <div class="form-group">
                            {{  Form::open(['route' => 'shipping.editdate']) }}
                                   {{ csrf_field() }}
                                     {!! Form::date('date', null ,['class' => 'form-control'] ) !!}
                                       <input type="hidden" name="id" value="{{ $shipping->id }}">
                                        <input type="hidden" name="type" value="{{ $shipping->type }}">
                                     <br>
                                <button type="submit" class="btn btn-bg green btn-block"  >
                                 Check
                               </button>
                              {!! Form::close() !!}
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>


        </div>

    </div>

</section>

@endsection
