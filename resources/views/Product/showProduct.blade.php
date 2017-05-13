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
              <h5 class="det-txt">สินค้าในคลัง {{ $products->amount }} </h5>
          </hgroup>


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
