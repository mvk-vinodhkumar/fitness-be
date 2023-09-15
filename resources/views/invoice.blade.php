<!DOCTYPE html>
<html>

<head>
    <title>RalFitness | Mail</title>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,600,700,800,900" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">

    <style>
        body {
            font-family: 'Nunito', sans-serif;
            font-size: 13px;
            line-height: 1.4;
            color: #000;
        }
        img { width: 100%; }
        address { font-style: normal; }
        .mgt-25{ margin-top: 25px; }
        .txt-right { text-align: right !important; }
        .dis-blk { display: block; }

        .page-wrapper {
            max-width: 700px;
            margin: 0 auto;
        }
        .main-table-wrap {
            width: 100%;
        }
        .page-wrapper .brand-wrap {
            width: 200px;
            text-align: center;
            margin: 10px auto;
        }
        .head-2 {
            font-weight: 700;
            margin-bottom: 0;
            font-size: 15px;
        }
        .cus-name {
            color: #007bff;
            font-weight: 600;
            font-size: 14px;
            margin: 0;
        }
        ._label {
            color: #444;
            font-weight: 600;
            display: inline-block;
            min-width: 74px;
        }

        /*receipt table*/
        .receipt-table {
            width: 100%;
            margin: 10px 0;
            border-collapse: collapse;
        }
        .receipt-table tr th, .receipt-table tr td,
        .bank-details tr th, .bank-details tr td {
            text-align: center;
            vertical-align: middle;
            border: 1px solid #ccc;
        }
        .receipt-table tr th {
            background: #007bff;
            color: #fff;
            padding: 10px;
            font-size: 14px;
            font-weight: 600;
        }
        .receipt-table tr td {
            padding: 7px;
        }

        /*Bank Details*/
        .bank-details {
            margin: 10px auto;
            border-collapse: collapse;
        }
        .bank-details tr th, .bank-details tr td {
            padding: 5px;
        }
        .bank-details tr th {
            min-width: 120px;
            text-align: right;
        }
        .bank-details tr td {
            text-align: left;
        }

        ._info {
            color: #333;
            text-align: center;
            font-style: italic;
            margin-top: 10px;
            padding-bottom: 10px;
            display: inline-block;
        }
    </style>
</head>

<body id="body-pdf">

<?php



function moneyFormatIndia($num) {
    $explrestunits = "" ;
    if(strlen($num)>3) {
        $lastthree = substr($num, strlen($num)-3, strlen($num));
        $restunits = substr($num, 0, strlen($num)-3); // extracts the last three digits
        $restunits = (strlen($restunits)%2 == 1)?"0".$restunits:$restunits; // explodes the remaining digits in 2's formats, adds a zero in the beginning to maintain the 2's grouping.
        $expunit = str_split($restunits, 2);
        for($i=0; $i<sizeof($expunit); $i++) {
            // creates each of the 2's group and adds a comma to the end
            if($i==0) {
                $explrestunits .= (int)$expunit[$i].","; // if is first value , convert into integer
            } else {
                $explrestunits .= $expunit[$i].",";
            }
        }
        $thecash = $explrestunits.$lastthree;
    } else {
        $thecash = $num;
    }
    return $thecash; // writes the final format where $currency is the currency symbol.
}

?>
<div class="page-wrapper">
    <table class="main-table-wrap">
        <tr>
            <th colspan="2">
                <div class="brand-wrap">
                    <img src="/fitness/images/logo.png" alt="RalFitness Logo">
                </div>
            </th>
        </tr>
        <tr>
            <td>
                <h2 class="head-2">RALSTON FITNESS LLP</h2>
                <address>
                    186 B, 4th Cross, S.T.Bed Koramangala<br>
                    Bengaluru 560 034<br>
                    <span class="_label">Contact no:</span> +91-63649 09522<br>
                    <span class="_label">GST no:</span> 29AAZFR6400J1ZJ
                </address>
            </td>
        </tr>

        <tr>
            <td>
                <h2 class="head-2 mgt-25">Bill To,</h2>
                <span class="_label">Contact no: </span> {{$invoice['mobile']}}<br>
                <span class="_label">E-mail ID: </span> <a href="mailto:{{$invoice['email']}}">{{$invoice['email']}}</a>
            </td>
            <td class="txt-right">
                <span class="_label">Date: </span> {{date('d M-Y' ,strtotime($invoice['created_at']))}}<br>
                <span class="_label">Invoice no: </span> Inv/{{date('Y' ,strtotime($invoice['created_at']))}}-{{date('y' ,strtotime($invoice['created_at']))+1}}/{{$invoice['id']}}
            </td>
        </tr>

        <tr>
            <td colspan="2">
                <table class="receipt-table" cellpadding="0" cellspacing="0">
                    <tr>
                        <th>Sl.No.</th>
                        <th class="txt-right">Particulars</th>
                        <th>Amount ({{$invoice['currency_type']}})</th>
                    </tr>
                    <tr>
                        <td>1.</td>
                        <td class="txt-right">Fitness services for {{$invoice['plan']}}, starts from  {{date('d M-Y' ,strtotime($invoice['created_at']))}}</td>
                        <td>{{ str_replace('.00','', moneyFormatIndia($amounts['amount_minus_18']))}}</td>
                    </tr>

                    <tr>
                        <td>&nbsp;</td>
                        <td class="txt-right"><b>Sub-total</b></td>
                        <td><b>{{ str_replace('.00','', moneyFormatIndia($amounts['amount_minus_18']))}}</b></td>

                    </tr>

                    @if($amounts['amount_minus_9'])

                      @if( (($invoice['country']=='INDIA') && ($invoice['state']=='Karnataka')) || ($invoice['country']=='International') )
                        <tr>
                            <td>&nbsp;</td>
                            <td class="txt-right">CGST @ 9%</td>
                            <td>{{ str_replace('.00','', moneyFormatIndia($amounts['amount_minus_9']))}}</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td class="txt-right">SGST @ 9%</td>
                            <td>{{ str_replace('.00','', moneyFormatIndia($amounts['amount_minus_9']))}}</td>
                        </tr>
                      @else
                        <tr>
                            <td>&nbsp;</td>
                            <td class="txt-right">IGST @ 18%</td>
                            <td>{{ str_replace('.00','', moneyFormatIndia($amounts['amount_minus_9']*2))}}</td>
                        </tr>

                      @endif
                  @endif
                    <tr>
                        <td colspan="2" class="txt-right" style="font-size: 15px;font-weight: 600;">Total</td>
                        <td style="font-size: 15px;font-weight: 600;">{{ str_replace('.00','', moneyFormatIndia(round($amounts['amount_total'])))}}</td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <table class="bank-details" cellspacing="0" cellpadding="0">
                    <tr>
                        <th colspan="2" style="padding: 10px;text-align: center;color: #007bff;font-size: 14px;">Bank Account details for wire transfer</th>
                    </tr>
                    <tr>
                        <th>A/c holder Name</th>
                        <td>RALSTON FITNESS LLP</td>
                    </tr>
                    <tr>
                        <th>Bank</th>
                        <td>HDFC</td>
                    </tr>
                    <tr>
                        <th>Account No.</th>
                        <td>50200040127341</td>
                    </tr>
                    <tr>
                        <th>IFSC</th>
                        <td>HDFC0004460</td>
                    </tr>
                    <tr>
                        <th>Branch</th>
                        <td>KORAMANGALA 1ST BLOCK BANGALORE</td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr>
            <td colspan="2">For <span class="_label" style="margin-top: 20px;">RALSTON FITNESS LLP</span></td>
        </tr>
        <tr>
            <td>
                <span class="_label">Ralston Dsouza</span>
                <span class="dis-blk">Partner</span>
            </td>
        </tr>
        <tr>
            <td colspan="2"><span class="_info">This is System Generated Invoice, Signature not required.</span></td>
        </tr>
        <tr>
            <td colspan="2">
                <a href="javascript:demoFromHTML()" class="downloads" style="background-color: #1c8d1a;
				    border-radius: 5px;
				    color: #fff;
				    font-size: 13px;
				    text-align: center;
				    text-decoration: none;
				    display: block;
				    margin: 10px auto;
				    width: 120px;
				    line-height: 2.8;
				    font-weight: 600;">Download as PDF</a>
            </td>
        </tr>

    </table>
    {{--<a href="javascript:demoFromHTML()" class="btn btn-primary pull-right downloads" ><span class="fa fa-file"></span> Generate PDF </a>--}}

</div>



<script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>

<script src="/js/jspdf.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.auto.min.js"></script>
<script type="text/javascript" src="/js/html2canvas.min.js"></script>
<script type="text/javascript" src="/js/html2pdf.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.4.1/jspdf.debug.js" integrity="sha384-THVO/sM0mFD9h7dfSndI6TS0PgAGavwKvB5hAxRRvc0o9cPLohB0wb/PTA7LdUHs" crossorigin="anonymous"></script>

<script>
    function demoFromHTML() {
        $(".downloads").hide();
        var element = document.getElementById('body-pdf');
        var name="RalFitness Invoice";
        var opt = {
            margin:       .2,
            filename:     name,
            image:        { type: 'jpeg', quality: 0.98 },
            html2canvas:  { scale: 5 },
            jsPDF:        { unit: 'in', format: 'a4', orientation: 'portrait' }
        };
        html2pdf().from(element).set(opt).save();
        setTimeout(function(){
            $(".downloads").show();
        }, 2000);
    }
</script>
</body>
</html>
