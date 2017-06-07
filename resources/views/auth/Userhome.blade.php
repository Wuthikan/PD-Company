@extends('layouts.admin')

@section('content')

<section id ="feature" class="section-padding">
    <div class="container">
      <div class="row">
        <div class="header-section text-center">
          <h2>รายชื่อพนักงาน</h2>
          <hr class="bottom-line">
                <div class="row">
                    <div class="col-xs-7 col-md-10 col-sm-9"></div>
                    <div class="col-xs-5 col-md-2 col-sm-3">  <p>
                        <a href="{{ url("/Usermanagement/create") }}">
                          <button name="button" type="button" class="btn btn-block btn-submit">
                          เพิ่มพนักงาน <i class="fa fa-plus" aria-hidden="true"></i></button>
                        </a>
                      </p>
                  </div>
                </div>
        </div>
        <table class="table  table-hover table-striped ">
            <tr>
                <th class="col-md-1 text-center">เลขที่</th>
                  <th class="col-md-4 text-center"> ชื่อ-สกุล </th>
                  <th class="col-md-1 text-right"> เบอร์โทรศัพท์ </th>
                      <th class="col-md-2 text-right"> ตำแหน่ง </th>
                      <th class="col-md-1 text-right"> แก้ไข </th>
                      <th class="col-md-1 text-right"> ลบ </th>
            </tr>
            <?php $i = 1; ?>
            <?php $i++; ?>
            @foreach($users as $users)
            <tr>
                <td class="text-center">  {{ $i }} </td>
                <td>  <a >
                          {{ $users->name }}
                      </a>

                </td>
                <td class="text-right">
                          {{ $users->tel }}
                </td>

                <td class="text-right"> {{ $users->position }} แผ่น</td>
                <td class="text-right">    <a  href="{{ url("Usermanagement/{$users->id}/edit") }}">
                    <i class="fa fa-pencil" aria-hidden="true"></i>
                  </a> </td>
                <td class="text-right">
                            <a href="#"  onclick="return delete_record();"  >
                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                            </a>
            </tr>
            <?php $i++; ?>
            <script>
            function delete_record(){
            swal({
              title: 'คุณต้องการลบหรือไม่?',
              text: "{{ $users->name }}",
              type: "warning",
              showCancelButton: true,
              confirmButtonColor: "#DD6B55",
              confirmButtonText: "Yes",
              cancelButtonText: "No",
              closeOnConfirm: false,
              closeOnCancel: false
            },

            function(isConfirm){
              if (isConfirm) {
                window.location.assign('Usermanagement/delete/<?=$users->id?>');
              } else {
                swal("Cancelled", "Your imaginary file is safe :)", "error");
              }
            });
            }
            </script>
              @endforeach

        </table>

    </div>
</div>
</section>
@endsection
