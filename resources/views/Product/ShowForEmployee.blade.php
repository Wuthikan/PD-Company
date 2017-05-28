@extends('layouts.main')

@section('content')

<section id ="feature" class="section-padding">
    <div class="container">
      <div class="row">
        <div class="header-section text-center">
          <h2>สินค้า</h2>
          <hr class="bottom-line">

        <table class="table  table-hover table-striped ">
            <tr>
                <th class="col-md-1 text-center">เลขที่</th>
                  <th class="col-md-4 text-center"> รายการ </th>
                  <th class="col-md-1 text-right"> กว้าง </th>
                  <th class="col-md-1 text-right"> ยาว </th>

                      <th class="col-md-2 text-right"> คงเหลือ </th>
            </tr>
            <?php $i = 1; ?>
            <tr>
                <td class="text-center">  {{ $i }} </td>
                <td> คอนกรีตผสม  </td>
                <td class="text-right"> - </td>
                  <td class="text-right"> - </td>
                    <td class="text-right"> - </td>

            </tr>
            <?php $i++; ?>
            @foreach($products as $product)
            <tr>
                <td class="text-center">  {{ $i }} </td>
                <td>  <a >
                          {{ $product->name }}
                      </a>

                </td>
                <td class="text-right">
                        0.35 เมตร
                </td>
                <td class="text-right">
                          {{ $product->height }} เมตร
                </td>

                <td class="text-right"> {{ $product->amount }} แผ่น</td>

            <?php $i++; ?>
            <script>
            function delete_record(){
            swal({
              title: 'คุณต้องการลบสินค้าหรือไม่?',
              text: "{{ $product->name }}",
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
                window.location.assign('Product/delete/<?=$product->id?>');
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
