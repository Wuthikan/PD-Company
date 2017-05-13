@extends('layouts.main')
<!--Organisations-->
<section id ="organisations" class="section-padding">
  <div class="container">
    <div class="row">

      <div class="col-md-6">
          <img src="{{ url("mentor/img/course01.jpg") }}"
              class="img-responsive"
              >
      </div>
      <div class="col-md-6">
        <div class="detail-info">

          <hgroup>
            <h3 class="det-txt"> {{ $products->name }}</h3>
            <h4 class="sm-txt">ยาว {{ $products->width }} เมตร</h4>
          </hgroup>

              <p class="text-par">
                @if($errors->any())
                    <ul class="alert alert-danger">
                      @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                      @endforeach
                    </ul>
                @endif
                @forelse($stocks as $stocks)
                สินค้าในคลัง
                         {{ $stocks->amount }}
                แผ่น

                <a href="#" data-target="#editStock" data-toggle="modal"> Edit </a>

                <!--Modal box delete-->
                <div class="modal fade" id="editStock" role="dialog">
                  <div class="modal-dialog modal-sm">
                    <!-- Modal content no 1-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title text-center form-title">แก้ไขสินค้าในคลัง</h4>
                      </div>
                      <div class="modal-body padtrbl text-center">
                          สินค้าในคลังปัจจุบัน  {{ $stocks->amount }} แผ่น
                        <div class="login-box-body">
                          <div class="form-group">
                            <form action="{{ route('stock.edit', ['id'=>$stocks->id]) }}">
                                <input class="form-control" name="amount" id="amount" type="text" autocomplete="off" />
                                <br>
                                <button type="submit" class="btn btn-bg green btn-block"  >
                                 ตกลง
                               </button>
                             </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>


                @empty
                @if($errors->any())
                    <ul class="alert alert-danger">
                      @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                      @endforeach
                    </ul>
                @endif
                  <a href="#" data-target="#createStock" data-toggle="modal"> เพิ่มสินค้าในคลัง </a>
                  <!--Modal box delete-->
                  <div class="modal fade" id="createStock" role="dialog">
                    <div class="modal-dialog modal-sm">
                      <!-- Modal content no 1-->
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title text-center form-title">เพิ่มสินค้าในคลัง</h4>
                        </div>
                        <div class="modal-body padtrbl">

                          <div class="login-box-body">
                            <div class="form-group">
                                  {!! Form::open(['url' => 'stock']) !!}
                                  <input class="form-control" name="amount" id="amount" type="text" autocomplete="off" />
                                  <input class="form-control" name="idproduct" id="idproduct" type="hidden" value="{{ $products->id }}" />
                                      <br>
                                  <button type="submit" class="btn btn-bg green btn-block"  >
                                   ตกลง
                                 </button>
                                {!! Form::close() !!}
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                @endforelse

              </p>
            <div class="row">
                <div class="col-xs-4 col-md-3 col-sm-3">
                  <a class="btn btn-block btn-submit" href="{{ url("product/{$products->id}/edit") }}">
                      แก้ไข
                  </a>
                </div>
                <div class="col-xs-4 col-md-6 col-sm-6"></div>
                <div class="col-xs-4 col-md-3 col-sm-3">
                  {!! Form::open(['method' => 'DELETE', 'url' => 'product/'. $products->id ]) !!}
                  <button type="submit" class="btn btn-block btn-submit" onclick="return confirm('Are you sure to delete this data');">
                    ลบ
                  </button>
                  <!-- {!! Form::submit('ลบ', ['class'=>'btn btn-block btn-submit']) !!} -->
            			{!! Form::close() !!}
              </div>
            </div>



      </div>
    </div>
  </div>
</section>


@section('content')
