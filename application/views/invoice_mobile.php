<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title><?= $titleInvoice ?></title>
    
    <style>
    .invoice-box p {
        font-size: 12px;
        line-height : 85%;
        margin-bottom: 5px;
    }

    .invoice-box p.nama {
        font-size: 12px;
        line-height : 85%;
        margin-right: 40px;
        margin-bottom: 5px;
    }

    .invoice-box p.hormat {
        font-size: 12px;
        line-height : 85%;
        margin-right: 25px;
        margin-bottom: 5px;
    }

    .invoice-box td.noInvoice {
        font-size: 12px;
        /*line-height : 85%;*/
        margin-right: 25px;
        /*margin-bottom: 5px;*/
    }

    .invoice-box img {
        margin-top: 5px;
    }

    .invoice-box {
        max-width: 800px;
        margin: auto;
        padding: 30px;
        border: 1px solid #eee;
        box-shadow: 0 0 10px rgba(0, 0, 0, .15);
        font-size: 12px;
        line-height: 24px;
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color: #555;
    }
    
    .invoice-box table {
        width: 100%;
        line-height: inherit;
        text-align: left;
    }
    
    .invoice-box table td {
        padding: 5px;
        vertical-align: top;
    }
    
    .invoice-box table tr td:nth-child(2) {
        text-align: right;
    }
    
    .invoice-box table tr.top table td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.top table td.title {
        font-size: 45px;
        line-height: 45px;
        color: #333;
    }
    
    .invoice-box table tr.information table td {
        padding-bottom: 40px;
    }
    
    .invoice-box table tr.heading td {
        background: #eee;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
    }
    
    .invoice-box table tr.details td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.item td{
        border-bottom: 1px solid #eee;
    }
    
    .invoice-box table tr.item.last td {
        border-bottom: none;
    }
    
    .invoice-box table tr.total td:nth-child(2) {
        border-top: 2px solid #eee;
        font-weight: bold;
    }
    
    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td {
            width: 100%;
            display: block;
            text-align: center;
        }
        
        .invoice-box table tr.information table td {
            width: 100%;
            display: block;
            text-align: center;
        }
    }
    
    /** RTL **/
    .rtl {
        direction: rtl;
        font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    }
    
    .rtl table {
        text-align: right;
    }
    
    .rtl table p tr td:nth-child(2) {
        text-align: left;
    }
    </style>
</head>

<body>
    <div class="invoice-box">
        <img src="assets/kop.png" style="width:100%; height: 80">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="noInvoice">                             
                                NO. INVOICE: <?php echo $inv['kode'] ?>                                
                            </td>
                            <td class="noInvoice">
                                <?php 
                                    $bulan = '';
                                    $angkaBulan = date("n", strtotime($inv['tanggal'])); 
                                    if ($angkaBulan == '1') {
                                        $bulan = 'Januari';
                                    } else if ($angkaBulan == '2') {
                                        $bulan = 'Februari';
                                    } else if ($angkaBulan == '3') {
                                        $bulan = 'Maret';
                                    } else if ($angkaBulan == '4') {
                                        $bulan = 'April';
                                    } else if ($angkaBulan == '5') {
                                        $bulan = 'Mei';
                                    } else if ($angkaBulan == '6') {
                                        $bulan = 'Juni';
                                    } else if ($angkaBulan == '7') {
                                        $bulan = 'Juli';
                                    } else if ($angkaBulan == '8') {
                                        $bulan = 'Agustus';
                                    } else if ($angkaBulan == '9') {
                                        $bulan = 'Sepetmber';
                                    } else if ($angkaBulan == '10') {
                                        $bulan = 'Oktober';
                                    } else if ($angkaBulan == '11') {
                                        $bulan = 'November';
                                    }else if ($angkaBulan == '12') {
                                        $bulan = 'Desember';
                                    }
                                    echo "TANGGAL PEMBAYARAN: ".date('d', strtotime($inv['tanggal'])).' '.$bulan.' '.date('Y', strtotime($inv['tanggal']));
                                ?>                    
                                <!-- TANGGAL PEMBAYARAN: <?php echo date('d F Y', strtotime($inv['tanggal'])) ?> -->
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="heading">
                <td>
                    NAMA PELANGGAN
                </td>
                
                <td>
                    ALAMAT PELANGGAN
                </td>
            </tr>
            
            <tr class="details">
                <td>
                    <?php echo $inv['nama'] ?>
                </td>
                
                <td>
                    <?php echo $inv['alamat'] ?>
                </td>
            </tr>
            
            <tr class="heading">
                <td>
                    TOTAL TAGIHAN
                </td>
                
                <td>
                    PERIODE
                </td>
            </tr>
            
            <tr class="details">
                <td>
                    <?php $rupiah = number_format($inv['tagih'],2,",",".");
                     echo "Rp. ".$rupiah; ?>
                </td>                
                <td>
                <?php 
                    $c = count($inv['periode']);
                    for ($i=0; $i < $c; $i++) { 
                        echo $inv['periode'][$i]."<br>";                        
                    }
                 ?>
                </td>
            </tr>
            <tr class="heading">
                <td>
                    <i>Terbilang</i>
                </td>
                
                <td>
                
                </td>
            </tr>                
            
            <tr class="details">
                <td>
                    <?php echo $inv['bilang']?>
                </td>                
                <td>
                </td>
            </tr>
        </table>
        <table>
            <tr class="details">
                <td></td>
                <td>
                    <p class="hormat">Hormat Kami,</p>
                    <img src="assets/images/ttd/<?php echo $user->signature ?>" style="width:110px; height: 75px">       
                    <p class="nama"><?php echo $user->nama_user ?></p>    
                </td>
            </tr>
        </table>        
    </div>
</body>
</html>