
@extends('layouts.main')
<section id ="contact" class="section-padding">
  <div class="container">
    <div class="row">
      <div class="header-section text-center">
        <h2>เพิ่มข้อมูลลูกค้า</h2>

        <hr class="bottom-line">
        @if($errors->any())
      			<ul class="alert alert-danger">
      				@foreach($errors->all() as $error)
      					<li>{{ $error }}</li>
      				@endforeach
      			</ul>
      	@endif
      </div>

      {!! Form::model($customer,['method' => 'PATCH',
          'action' => ['CustomerController@update', $customer->id]
          ]) !!}
              <input type="hidden" value="<?=$_GET["idinvoice"]?>" name="idinvoice" id="idinvoice" >
              <div class="form-group">
              {!! Form::label('title', 'ชื่อลูกค้า')
              !!}
              {!! Form::text('name', null, ['class' => 'form-control']) !!}

              </div>
              <div class="form-group">
              {!! Form::label('title', 'บริษัท')
              !!}
              {!! Form::text('company', null, ['class' => 'form-control']) !!}
              </div>
              <div class="form-group">
              {!! Form::label('body', 'ที่อยู่') !!}
              {!! Form::text('address', null, ['class' => 'form-control']) !!}
              </div>
              <div class="form-group">
              {!! Form::label('body', 'อำเภอ') !!}
              {!! Form::text('city', null, ['class' => 'form-control']) !!}
              </div>
              <div class="form-group">
              {!! Form::label('body', 'จังหวัด') !!}
              {!! Form::text('province', null, ['class' => 'form-control']) !!}
              </div>
              <div class="form-group">
              {!! Form::label('body', 'รหัสไปรษณีย์') !!}
              {!! Form::text('zipcode', null, ['class' => 'form-control']) !!}
              </div>
              <div class="form-group">
              {!! Form::label('body', 'เบอร์โทรศัพย์') !!}
              {!! Form::text('tel', null, ['class' => 'form-control']) !!}
              </div>
              <div class="form-group">
              {!! Form::label('body', 'เบอร์ Fax') !!}
              {!! Form::text('fax', null, ['class' => 'form-control']) !!}
              </div>
              <div class="form-group">
              {!! Form::label('body', 'อ้างอิง') !!}
              {!! Form::text('reference', null, ['class' => 'form-control']) !!}
              </div>
                <hr class="bottom-line">
              <div class="form-group">

              {!! Form::submit('แก้ไขข้อมูลลูกค้า',
              ['class'=>'btn btn-block btn-submit']) !!}
              </div>
      {!! Form::close() !!}
    </div>
  </div>
</section>


@section('content')
