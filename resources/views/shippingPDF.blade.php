
<html lang="{{ config('app.locale') }}">
  <head>
    <meta http-equiv="Content-Language" content="th">
     <meta http-equiv="Content-Type" content="text/html; charset=TIS-620" />
    <meta http-equiv="content-Type" content="text/html; charset=window-874">
  </head>
<div class="container">
    <div class="row">
        <div class="well col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">

          <strong>ห้างหุ้นส่วนจำกัด พีดี คอนกรีต (สำนักงานใหญ่)</strong>
          <hr>
                <table width="100%">
                  <tr>
                    <td align="left"><font size=4>PD Concrete Part, Ltd.</font></td>
                  </tr>
                  <tr>
                    <td align="left"><font size=3>523/1 หมู่ 15 ต.บ่อแอ่ว อ.เมืองลำปาง จ.ลำปาง 52100</font></td>
                  </tr>
                  <tr>
                    <td align="left"><font size=3>523/1, Moo 15, Tumbon Borhaew, Aumphur Muang Lampang, Lampang, 52100</font></td>
                  </tr>
                </table>
                <div  style="text-align:center">
                    <h2>ใบส่งสินค้า/ใบขึ้นสินค้า</h2>
                </div>
<table width="100%"  align="center">
    <tr>
      <td align="left"><font size=3>รหัสลูกค้า: {{ $invoice->customers->code }}</font></td>
      <td align="right"><font size=3>เลขที่: {{ $invoice->code }}</font></td>
    </tr>
    <tr>
      <td align="left"><font size=3>ชื่อผู้รับ: {{ $invoice->customers->name }} </font></td>
      <td align="right"><font size=3>วันที่ส่งสินค้า: {{ $shipping->date->formatLocalized('%d / %m / %Y') }}</font></td>
    </tr>
    <tr>
      <td align="left"><font size=3>ที่อยู่: {{ $invoice->customers->address }} {{ $invoice->customers->city }}</font></td>
    </tr>
</table>
<hr>
                <table width="100%"  border="0" cellpadding="5">
                    <thead>
                        <tr>
                          <th width="15%"><font size=3>รหัสสินค้า</font><hr></th>
                            <th width="60%"><font size=3>ชื่อสินค้า</font><hr></th>
                            <th width="10%" align="right" ><font size=3>กว้าง</font><hr></th>
                            <th width="10%" align="right"><font size=3>ยาว</font><hr></th>
                            <th width="15%" align="right"><font size=3>จำนวณ</font><hr></th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php $total=0; ?>
                        @if (isset($concrete))
                      @foreach($concrete as $concrete)
                      <tr>
                        <td align="center"><font size=3>
                          @if($invoice->type==1)

                          @else
                          {{  $concrete->products->code }}
                            @endif
                          </font>
                        </td>
        								 	<td><font size=3>
                            @if($invoice->type==1)
                            คอนกรีตผสม
                            @else
                            {{  $concrete->products->name }}

                            @endif
                          </font>
                           </td>
        									<td align="right">
                            <font size=3>
                            @if($invoice->type==1)
                            -
                            @else
                              0.35
                            @endif
                          </font>
        									</td>
                          <td align="right">
                            <font size=3>
                            @if($invoice->type==1)
                            -
                            @else
                            {{ $concrete->products->height }}
                            @endif
                          </font>
                          </td>
                          <td align="right">
                            <font size=3>
                            @if($invoice->type==1)
                            {{ $concrete->amount }} คิว
                            @else
                            {{ $concrete->amount }} แผ่น
                            @endif
                          </font>
                          </td>
        							</tr>
                        <?php $total=$total+$concrete->amount; ?>
        								@endforeach
                        @endif
                        @if (isset($Extraconcrete))
                      @foreach($Extraconcrete as $Extraconcrete)
                              <tr>
                                <td align="center"><font size=3></font> - </td>
                								 	<td><font size=3>
                                    {{  $Extraconcrete->name }}
                                  </font>
                                   </td>
                                   <td align="right">
                                     <font size=3>
                                        0.35
                                      </font>
                                   </td>
                                    <td align="right">
                                      <font size=3>
                                      {{ $Extraconcrete->height }}
                                    </font>
                                      </td>
                									<td align="right">
                                    <font size=3>
                                    {{ $Extraconcrete->amount }} แผ่น
                                  </font>
                                  </td>
                							</tr>
                              <?php $total=$total+$Extraconcrete->amount; ?>
                								@endforeach
                        @endif
                        </table>
                        <hr>
                        <table width="100%">
                        <tr>
                          <td colspan="4" align="right" width="85%">
                            <font size=3><b>  รวมจำนวนสินค้า(แผ่น): </b>
                            </font>
                          </td>
                            <td align="right" width="15%"><font size=3> <?=$total?> </font></td>
                        </tr>
                    </tbody>
                </table>
                <hr>

                <br>
                <br>
                <br>

                <table width="100%" margin="50">
                    <tr>
                      <td align="center" width="40%" ><font size=3>ลงชื่อ..................................................ผู้ส่งสินค้า</font></td>
                      <td width="20%" ></td>
                      <td align="center" width="40%" ><font size=3>ลงชื่อ..................................................ผู้รับสินค้า</font></td>
                    </tr>
          <tr><td></td></tr>
                    <tr>
                      <td align="center" width="40%" ><font size=3>(..................................................)</font></td>
                      <td width="20%" ></td>
                      <td align="center" width="40%" ><font size=3>(..................................................)</font></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
