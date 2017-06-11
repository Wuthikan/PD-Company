
<html lang="{{ config('app.locale') }}">
  <head>
    <meta http-equiv="Content-Language" content="th">
     <meta http-equiv="Content-Type" content="text/html; charset=TIS-620" />
    <meta http-equiv="content-Type" content="text/html; charset=window-874">


  </head>

                <table width="100%">
                  <tr>
                    <td align="left"><font size=3><strong>ห้างหุ้นส่วนจำกัด พี ดี คอนกรีต</strong></font></td>
                  </tr>
                  <tr>
                    <td align="left"><font size=3>523/1 หมู่ 15 ต.บ่อแอ่ว อ.เมืองลำปาง จ.ลำปาง 52100</font></td>
                  </tr>
                  <tr>
                    <td align="left"><font size=3>Tel/Fax: 0 5482 4264, 0 5482 4266</font></td>
                    <td align="right"><font size=5><strong>บิลเงินสด/ใบกำกับภาษีอย่างย่อ</strong></font></td>
                  </tr>
                  <tr>
                    <td align="left"><font size=3>เลขประจำตัวผู้เสียภาษี 0523557001542</font></td>
                  </tr>
                </table>
              <br>
<table width="100%"  align="center">
    <tr>
        <td align="left" width="7%" ><font size=3>ลูกค้า </font></td>
      <td align="left"><font size=3> {{ $invoice->customers->name }}</font></td>
      <td align="right"><font size=3>เลขที่บิลเงินสด</font></td>
        <td  width="5%" ><font size=3> </font></td>
      <td align="left"  width="20%"><font size=3>HS{{ $invoice->code }}</font></td>
    </tr>
    @if (!$invoice->customers->company==null)
    <tr>
        <td align="left" width="7%" ><font size=3>บริษัท </font></td>
      <td align="left"><font size=3>{{ $invoice->customers->company }}</font></td>
    </tr>
    @endif
    <tr>
        <td align="left" width="7%" ><font size=3>ที่อยู่ </font></td>
      <td align="left"><font size=3>{{ $invoice->customers->address }}</font></td>
    </tr>
    <tr>
        <td align="left" width="7%" ><font size=3></font></td>
      <td align="left"><font size=3>
          @if (!$invoice->customers->city==null)
        อ.{{ $invoice->customers->city}}
        @endif
        @if (!$invoice->customers->province==null)
        จ.{{ $invoice->customers->province}}
        @endif
      </font></td>
      <td align="right"><font size=3>วันที่</font></td>
        <td  width="5%" ><font size=3> </font></td>
      <td align="left"  width="20%"><font size=3>{{ $datenow->formatLocalized('%d/%m/%Y') }}</font></td>
    </tr>
    <tr>
        <td align="left" width="7%" ><font size=3></font></td>
      <td align="left"><font size=3>{{ $invoice->customers->zipcode}}</font></td>
    </tr>
    <tr>
        <td align="left" width="7%" ><font size=3>โทร.</font></td>
      <td align="left"><font size=3>{{ $invoice->customers->tel}}
        @if (!$invoice->customers->fax==null)
        fax.{{ $invoice->customers->fax}}
        @endif
      </font></td>
      <td align="right"><font size=3>เลขที่ใบสั่งขาย</font></td>
        <td  width="5%" ><font size=3> </font></td>
      <td align="left"  width="20%"><font size=3>QT{{ $invoice->code }}</font></td>
    </tr>
    <tr>
        <td align="left" width="7%" ><font size=3>อ้างอิง</font></td>
      <td align="left"><font size=3>
          @if (!$invoice->customers->reference==null)
        {{ $invoice->customers->reference}}
        @endif
      </font></td>
      <td align="right"><font size=3>พนักงานขาย</font></td>
        <td  width="5%" ><font size=3> </font></td>
      <td align="left"  width="20%"><font size=3>{{ $invoice->users->name}}</font></td>
    </tr>
    <tr>
        <td align="left" width="10%" ><font size=3>ขนส่งโดย</font></td>
      <td align="left"><font size=3></font></td>
      <td align="right"><font size=3>เขตการขาย</font></td>
        <td  width="5%" ><font size=3> </font></td>
      <td align="left"  width="20%"><font size=3></font></td>
    </tr>
</table>
<p></p>
<hr>
                <table width="100%" frame="void"  border="0" hight="100%" cellpadding="6">
                    <thead>
                        <tr>
                          <th width="5%"><font size=3>No.</font>  <hr></th>
                            <th width="50%"><font size=3>รหัสสินค้า/รายละเอียด</font>  <hr></th>
                            <th width="15%" align="right" ><font size=3>จำนวน</font>  <hr></th>
                            <th width="15%" align="right"><font size=3>หน่วยละ</font>  <hr></th>
                            <th width="15%" align="right"><font size=3>ราคารวมภาษี</font>  <hr></th>

                        </tr>
                    </thead>
                    <tbody>
                      <?php $total=0; $i=1; $lastprice='0'; ?>
                        @if (isset($concrete))
                      @foreach($concrete as $concrete)
                      <tr >
                        <td align="center"><font size=3>
                        {{ $i }}
                          </font>
                        </td>
        								 	<td><font size=3>
                            @if($invoice->type==1)
                            คอนกรีตผสมเสร็จ
                            @else
                            {{  $concrete->products->name }}
                            0.35x{{  $concrete->products->height }}
                            {{  $concrete->amount }}แผ่น
                            @endif
                          </font>
                           </td>
        									<td align="right">
                            <font size=3>
                            @if($invoice->type==1)
                              {{  $concrete->amount }} คิว
                            @else
                            <?php $sum = 0.35*$concrete->products->height*$concrete->amount;  	?>
                            {{ number_format($sum, 3, '.', '') }} ตร.ม
                            @endif
                          </font>
        									</td>
                          <td align="right">
                            <font size=3>
                          {{ number_format($concrete->price, 3, '.', '') }}
                          </font>
                          </td>
                          <td align="right">
                            <font size=3>
                            @if($invoice->type==1)
                            <?php $total=$concrete->amount*$concrete->price;
                                    $total = number_format($total, 2, '.', '');
                             ?>

                            @else
                            <?php $total=$sum*$concrete->price;
          													$total = number_format($total, 2, '.', '');
          									 ?>
                            @endif
                             {{ $total }}
                          </font>
                          </td>
        							</tr>
                        <?php $lastprice=$total+$lastprice; $i++;?>
        								@endforeach
                        @endif
                        @if (isset($Extraconcrete))
                      @foreach($Extraconcrete as $Extraconcrete)
                              <tr>
                                <td align="center"><font size=3></font> {{ $i }} </td>
                								 	<td><font size=3>
                                    {{  $Extraconcrete->name }}
                                    0.35x{{  $Extraconcrete->height }}
                                    {{  $Extraconcrete->amount }}แผ่น
                                  </font>
                                   </td>
                                   <td align="right">
                                     <font size=3>
                                       <?php $sum = 0.35*$Extraconcrete->height*$Extraconcrete->amount;  	?>
                                       {{ number_format($sum, 3, '.', '') }} ตร.ม
                                      </font>
                                   </td>
                                    <td align="right">
                                      <font size=3>
                                        {{ number_format($Extraconcrete->price, 3, '.', '') }}
                                    </font>
                                      </td>
                									<td align="right">
                                    <font size=3>
                                      <?php $total=$sum*$Extraconcrete->price;
                    													$total = number_format($total, 2, '.', '');
                    									 ?>
                                       {{ $total }}
                                  </font>
                                  </td>
                							</tr>
                              <?php $lastprice=$total+$lastprice; $i++; ?>
                								@endforeach
                        @endif

                        @if (isset($others))
                      @foreach($others as $other)
                              <tr>
                                <td align="center"><font size=3></font> {{ $i }} </td>
                                  <td><font size=3>
                                    {{  $other->detail }}
                                  </font>
                                   </td>
                                   <td align="right">
                                     <font size=3>
                                       -
                                      </font>
                                   </td>
                                    <td align="right">
                                      <font size=3>
                                      -
                                    </font>
                                      </td>
                                  <td align="right">
                                    <font size=3>
                                      <?php $totals=$other->price;
                                              $totalsum = number_format($totals, 2, '.', '');
                                       ?>
                                       {{ $totalsum }}
                                   </font>
                                  </td>
                              </tr>
                              <?php $lastprice=$totals+$lastprice; $i++; ?>
                                @endforeach

                        @endif
  </table>
  <hr>
  <table width=100% border="0">

    <tr>
      <td colspan="2"><font size=3></font></td>
        <td colspan="2"  align="left" width=70%><font size=3>
              รวมเป็นเงิน
        </font>
         </td>
         <td align="right" width=15%>
           <font size=3>

            </font>
         </td>
          <td align="right" width=15%>
            <font size=3>
              {{ number_format($lastprice, 2, '.', '') }}
          </font>
            </td>
        </tr>
        <tr>
          <td colspan="2"><font size=3></font></td>
            <td colspan="2" align="left"><font size=3>
              หักส่วนลด
            </font>
             </td>
             <td align="right">
               <font size=3 width=15%>

                </font>
             </td>
              <td align="right"  width=15% >
                <font size=3>
                  {{ number_format($invoice->discount, 2, '.', '') }}
              </font>
                </td>
            </tr>
            <tr>
              <td colspan="2"><font size=3></font></td>
                <td colspan="2" align="left"><font size=3>
                  ยอดหลังหักส่วนลด
                </font>
                 </td>
                 <td align="right">
                   <font size=3>

                    </font>
                 </td>
                  <td align="right">
                    <font size=3>
                      {{ number_format($lastprice-$invoice->discount, 2, '.', '') }}
                  </font>
                    </td>
                </tr>
                <tr>
                  <td colspan="2"><font size=3></font></td>
                    <td colspan="2" align="left"><font size=3>
                        จำนวนภาษีมูลค่าเพิ่ม
                    </font>
                     </td>
                     <td align="right">
                       <font size=3>
         7.00%
                        </font>
                     </td>
                      <td align="right">
                        <font size=3>

                          <?php
                              $vax =($lastprice-$invoice->discount)*0.07;
                              ?>
                            {{ number_format($vax, 2, '.', '') }}
                        </td>
                    </tr>

                    <tr>
                      <td colspan="2" align="left"><font size=3>(
                          <?php $read =  number_format(($lastprice-$invoice->discount)-$vax, 2, '.', '');
                            echo  Convert($read);
                          ?> )
                      </font></td>
                        <td colspan="2" align="left"><font size=3>
                            ราคาสินค้า
                        </font>
                         </td>
                         <td align="right">
                           <font size=3>
                            </font>
                         </td>
                          <td align="right">
                            <font size=3>

                                  {{ number_format(($lastprice-$invoice->discount)-$vax, 2, '.', '') }}
                            </td>
                        </tr>
                    </tbody>

                </table>
<hr>
<br>
<table width="100%" margin="50">
    <tr>
      <td align="left" width="40%" ><font size=3>ได้รับสินค้าตามรายการข้างบนนี้ไว้ถูกต้อง</font></td>
      <td width="20%" ></td>
      <td align="center" width="40%" ><font size=3></font></td>
    </tr>
    <tr>
      <td align="left" width="40%" ><font size=3>และอยู่ในสภาพเรียบร้อยทุกประการ</font></td>
      <td width="20%" ></td>
      <td align="center" width="40%" ><font size=3></font></td>
    </tr>
    <tr><td>
      <br><br><br><br><br><br>
    </td></tr>
    <tr>
      <td align="left" width="50%" ><font size=3>ผู้รับสินค้า..............................วันที่......./......./.......</font></td>
      <td width="10%" ></td>
      <td align="left" width="40%" ><font size=3>ผู้รับมอบอำนาจ <img  src="{{ url('img/user/Signature1.png') }}" class="img-responsive"></font></td>
    </tr>
</table>
<hr>
<script><?php

function Convert($amount_number)
{
    $amount_number = number_format($amount_number, 2, ".","");
    $pt = strpos($amount_number , ".");
    $number = $fraction = "";
    if ($pt === false)
        $number = $amount_number;
    else
    {
      $fraction = substr($amount_number, $pt + 1);
        $number = substr($amount_number, 0, $pt);
    }

    $ret = "";
    $baht = ReadNumber ($number);
    if ($baht != "")
        $ret .= $baht . "บาท";

    $satang = ReadNumber($fraction);
    if ($satang != "")
        $ret .=  $satang . "สตางค์";
    else
        $ret .= "ถ้วน";
    return $ret;
}

function ReadNumber($number)
{
    $position_call = array("แสน", "หมื่น", "พัน", "ร้อย", "สิบ", "");
    $number_call = array("", "หนึ่ง", "สอง", "สาม", "สี่", "ห้า", "หก", "เจ็ด", "แปด", "เก้า");
    $number = $number + 0;
    $ret = "";
    if ($number == 0) return $ret;
    if ($number > 1000000)
    {
        $ret .= ReadNumber(intval($number / 1000000)) . "ล้าน";
        $number = intval(fmod($number, 1000000));
    }

    $divider = 100000;
    $pos = 0;
    while($number > 0)
    {
        $d = intval($number / $divider);
        $ret .= (($divider == 10) && ($d == 2)) ? "ยี่" :
            ((($divider == 10) && ($d == 1)) ? "" :
            ((($divider == 1) && ($d == 1) && ($ret != "")) ? "เอ็ด" : $number_call[$d]));
        $ret .= ($d ? $position_call[$pos] : "");
        $number = $number % $divider;
        $divider = $divider / 10;
        $pos++;
    }
    return $ret;
}

?>

</script>
</body>
</html>
