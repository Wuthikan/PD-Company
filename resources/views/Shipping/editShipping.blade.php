@extends('layouts.main')

@section('content')

<section id ="feature" class="section-padding">
    <div class="container">
      <div class="row">
        <div class="header-section text-center">
          <h2>สร้างรายการส่งสินค้า </h2>
          <hr class="bottom-line">

            </div>
                <div class="row">
                    <div class="text-center">
                      @if($shipping->type==1)
                        <h3>คิวส่งคอนกรีตผสม</h3>
                      @else
                        <h3>คิวส่งคอนกรีตแผ่นพื้น</h3>
                      @endif
                    @if (empty($date))
                      <p>วันที่ {{ $shipping->date->formatLocalized('%d/%m/%Y %R%p') }}
                        @else
                          <p>วันที่ {{ $date }}  มีคิวที่ลงไว้แล้ว
                             {{ $result }} คิว
                      @endif
                      	<a href="#" data-target="#editdate" data-toggle="modal" >
                          แก้ไขวันส่ง <i class="fa fa-pencil" aria-hidden="true"></i></a></p>
                          </div>
                          <hr>
                          <div class="container">
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
                            <div class="col-md-7 col-md-offset-2 col-sm-9 col-sm-offset-1 col-xs-12 ">
                              <div class="form-group">
                               <label for="inputPassword3" class="col-sm-4 col-md-4 col-xs-12 control-label">
                                 @if($shipping->type==1)
                                 จำนวณคิว
                                 @else
                                 จำนวนแผ่น
                                 @endif
                               </label>
                               <div class="col-sm-8 col-md-8 col-xs-12">
                                   {!! Form::text('amount', null, ['class' => 'form-control']) !!}

                               </div>
                             </div>
                          <div class="form-group">
                           <label for="inputPassword3" class="col-sm-4 col-md-4 col-xs-12 control-label">
                             @if($shipping->type==1)
                             จำนวณรถเล็ก(คัน)
                             @else
                             จำนวนรถ6ล้อ(คัน)
                             @endif
                           </label>
                           <div class="col-sm-8 col-md-8 col-xs-12">
                               {!! Form::text('smallcar', null, ['class' => 'form-control']) !!}

                           </div>
                         </div>
                         <div class="form-group">
                          <label for="inputPassword3" class="col-sm-4 col-md-4 col-xs-12 control-label">
                            @if($shipping->type==1)
                            จำนวณรถใหญ่(คัน)
                            @else
                            จำนวนรถ10ล้อ(คัน)
                            @endif
                          </label>
                          <div class="col-sm-8 col-md-8 col-xs-12">
                            {!! Form::text('bigcar', null, ['class' => 'form-control']) !!}

                          </div>
                        </div>
                          @if($shipping->type!=1)
                        <div class="form-group">
                          <label for="inputPassword3" class="col-sm-4 col-md-4 col-xs-12 control-label">  </label>
                                <div class="col-sm-8 col-md-8 col-xs-12">
                          <input type="checkbox"   name="crane" value="1" @if($shipping->crane==1) checked @endif> ต้องการใช้รถเครน<br>
                            </label>
                          </div>
                        </div>
                          @endif
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

                  <div class="col-md-1">
                    <a href="#" onclick="goBack()">
                      <i class="fa fa-chevron-left" aria-hidden="true"></i> Back
                    </a>
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
                                     {!! Form::datetimelocal('date', null ,['class' => 'form-control'] ) !!}
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
    <script>
    function goBack() {
        window.history.back();
    }
    </script>
</section>

@endsection
