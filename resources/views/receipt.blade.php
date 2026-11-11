<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Struk Pembelian</title>
    <style>
        body {
            background: #eee;
            font-family: monospace;
            padding: 20px;
        }

        .receipt {
            background: white;
            width: 300px;
            margin: auto;
            padding: 20px;
            box-shadow: 0 0 8px #aaa;
        }

        .center {
            text-align: center;
        }

        .row {
            display: flex;
            justify-content: space-between;
            margin: 8px 0;
        }

        hr {
            border: none;
            border-top: 1px dashed black;
        }

        button {
            display: block;
            margin: 20px auto;
            padding: 10px 20px;
            background: green;
            color: white;
            border: none;
            cursor: pointer;
        }

        @media print {
            body {
                background: white;
                padding: 0;
            }

            .receipt {
                box-shadow: none;
                margin: 0 auto;
                width: 72mm;
            }

            .no-print {
                display: none;
            }
        }
    </style>
</head>
<body>

<div class="receipt">

    <div class="center">
        <h2>MARKET SABU</h2>
        <p>STRUK PEMBELIAN</p>
        <p>Terima kasih sudah berbelanja</p>
    </div>

    <hr>

    <p>No: {{ $transactionNumber }}</p>
    <p>Tanggal: {{ $date }}</p>

    <hr>

    @foreach ($items as $item)
        <p>{{ $item['name'] }}</p>

        <div class="row">
            <span>
                {{ $item['qty'] }} x
                {{ number_format($item['price'], 0, ',', '.') }}
            </span>

            <span>
                Rp {{ number_format($item['qty'] * $item['price'], 0, ',', '.') }}
            </span>
        </div>
    @endforeach

    <hr>

    <div class="row">
        <strong>Subtotal</strong>
        <strong>Rp {{ number_format($subtotal, 0, ',', '.') }}</strong>
    </div>

    <div class="row">
        <span>Bayar</span>
        <span>Rp {{ number_format($payment, 0, ',', '.') }}</span>
    </div>

    <div class="row">
        <span>Kembalian</span>
        <span>Rp {{ number_format($change, 0, ',', '.') }}</span>
    </div>

    <hr>

    <div class="center">
        <p>Barang yang sudah dibeli</p>
        <p>tidak dapat dikembalikan.</p>
        <h3>TERIMA KASIH</h3>
    </div>

</div>

<div class="no-print">
    <button onclick="window.print()">CETAK STRUK</button>
</div>

</body>
</html>