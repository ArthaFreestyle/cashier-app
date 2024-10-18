<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title> Invoice #6</title>

    <style>
        html,
        body {
            margin: 10px;
            padding: 10px;
            font-family: sans-serif;
        }
        h1,h2,h3,h4,h5,h6,p,span,label {
            font-family: sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 0px !important;
        }
        table thead th {
            height: 28px;
            text-align: left;
            font-size: 16px;
            font-family: sans-serif;
        }
        table, th, td {
            border: 1px solid #ddd;
            padding: 8px;
            font-size: 14px;
        }

        .heading {
            font-size: 24px;
            margin-top: 12px;
            margin-bottom: 12px;
            font-family: sans-serif;
        }
        .small-heading {
            font-size: 18px;
            font-family: sans-serif;
        }
        .total-heading {
            font-size: 18px;
            font-weight: 700;
            font-family: sans-serif;
        }
        .order-details tbody tr td:nth-child(1) {
            width: 20%;
        }
        .order-details tbody tr td:nth-child(3) {
            width: 20%;
        }

        .text-start {
            text-align: left;
        }
        .text-end {
            text-align: right;
        }
        .text-center {
            text-align: center;
        }
        .company-data span {
            margin-bottom: 4px;
            display: inline-block;
            font-family: sans-serif;
            font-size: 14px;
            font-weight: 400;
        }
        .no-border {
            border: 1px solid #fff !important;
        }
        .bg-blue {
            background-color: #414ab1;
            color: #fff;
        }
    </style>
</head>
<body>

    <table class="order-details">
        <thead>
            <tr>
                <th width="50%" colspan="2">
                    <h2 class="text-start">GRAND FC</h2>
                </th>
                <th width="50%" colspan="2" class="text-end company-data">
                    <span> Invoice Id: #{{ $order->id_penjualan }}</span> <br>
                    <span>Time: {{ $date }}</span> <br>
                    <span>Address: jl.Moh saleh Bantilan ,Sandana Galang.Tolitoli</span> <br>
                </th>
            </tr>
            <tr class="bg-blue">
                <th width="50%" colspan="2">Order Details</th>
                <th width="50%" colspan="2">Admin Details</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Order Id:</td>
                <td>{{ $order->id_penjualan }}</td>

                <td>Full Name:</td>
                <td>{{ $user->Nama_User }}</td>
            </tr>
            <tr>
                <td>Tracking Id/No.:</td>
                <td>funda-CRheOqspbA</td>

                <td>Email Id:</td>
                <td>{{ $user->email }}</td>
            </tr>
            <tr>
                <td>Ordered Date:</td>
                <td>{{ $date }}</td>

                <td>Phone:</td>
                <td>{{ $user->wa }}</td>
            </tr>
            <tr>
                <td>Payment Mode:</td>
                <td>Cash</td>

            </tr>
            <tr>
                <td>Order Status:</td>
                <td>completed</td>

            </tr>
        </tbody>
    </table>

    <table>
        <thead>
            <tr>
                <th class="no-border text-start heading" colspan="5">
                    Order Items
                </th>
            </tr>
            <tr class="bg-blue">
                <th>ID</th>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
            <tr>
                <td width="10%">{{ $item->id_barang }}</td>
                <td>
                    {{ $barang->find($item->id_barang)->nama_barang }}
                </td>
                <td width="10%">{{ number_format($barang->find($item->id_barang)->harga_barang) }}</td>
                <td width="10%">{{ $item->jumlah_barang }}</td>
                <td width="15%" class="fw-bold">{{ number_format($barang->find($item->id_barang)->harga_barang*$item->jumlah_barang) }}</td>
            </tr>
            @endforeach
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td><b>Total</b></td>
                <td><b>{{ number_format($order->Total_Harga) }}</b></td>
            </tr>
        </tbody>
    </table>

    <br>
    <p class="text-center">
        Thank your for shopping with Grand FC
    </p>

</body>
</html>