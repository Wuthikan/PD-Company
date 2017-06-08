@extends('layouts.app')

@section('content')
<br>
<hr>
<section id ="contact" class="section-padding">
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-success">
                <div class="panel-heading">Edit User</div>
                <div class="panel-body">
                  {!! Form::model($user, ['method' => 'PATCH',
                      'action' => ['UserController@update', $user->id],
                      'class' => 'form-horizontal'
                      ]) !!}
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">ชื่อ-สกุล</label>

                            <div class="col-md-6">
                                 {!! Form::text('name', null, ['class' => 'form-control']) !!}
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                  {!! Form::email('email', null, ['class' => 'form-control']) !!}
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('tel') ? ' has-error' : '' }}">
                            <label for="tel" class="col-md-4 control-label">เบอร์โทรศัพท์</label>

                            <div class="col-md-6">
                                  {!! Form::text('tel', null, ['class' => 'form-control']) !!}
                                @if ($errors->has('tel'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tel') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label for="address" class="col-md-4 control-label">ที่อยู่</label>

                            <div class="col-md-6">
                                  {!! Form::text('address', null, ['class' => 'form-control']) !!}
                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('position') ? ' has-error' : '' }}">
                            <label for="position" class="col-md-4 control-label">ตำแหน่ง</label>

                            <div class="col-md-6">
                                  {!! Form::text('position', null, ['class' => 'form-control']) !!}
                                @if ($errors->has('position'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('position') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('class') ? ' has-error' : '' }}">
                            <label for="class" class="col-md-4 control-label">สิทธิการใช้งาน</label>

                            <div class="col-md-6">
                            <select name="class" id="class" class="form-control">
                              <option value="1" @if(Auth::user()->class == 1) selected @endif>ระบบขายสินค้า</option>
                              <option value="2" @if(Auth::user()->class == 2) selected @endif>ระบบคลังสินค้า</option>
                              <option value="4" @if(Auth::user()->class == 4) selected @endif>ทุกระบบ</option>
                              </select>
                                @if ($errors->has('class'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('class') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-bg green btn-block">
                                    แก้ไขข้อมูล
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
@endsection
