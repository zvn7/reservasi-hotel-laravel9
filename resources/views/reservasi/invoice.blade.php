<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <style>
        body {
            background-color: #f8f9fa;
        }

        .card {
            background-color: #ffffff;
            border: 1px solid #e0e0e0;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .logo img {
            width: 100px;
            height: auto;
            margin-right: 15px;
        }

        h2 {
            color: #343a40;
        }

        .font-weight-bold {
            font-weight: bold;
        }

        .text-center {
            text-align: center;
        }

        .highlight {
            background-color: #f2f8f9;
        }

        .total-section {
            background-color: #343a40;
            color: #ffffff;
        }

        .total-section td {
            border: none;
        }

        .status-section {
            margin-top: 20px;
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .status-label {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .status-text {
            font-size: 24px;
            font-weight: bold;
            color: #000000;
        }

        .status-paid {
            color: #28a745;
        }

        .status-unpaid {
            color: #dc3545;
        }
    </style>
    <title>Invoice</title>
</head>

<body>
    <div class="container mt-5 mb-3">
        <div class="row d-flex justify-content-center">
            <div class="col-md-8">
                <div class="card p-4">
                    <div class="d-flex flex-row mb-4 logo">
                        <img
                            src="https://img.freepik.com/free-vector/home-leaf-logo-design-template_474888-1849.jpg?w=100&t=st=1704461839~exp=1704462439~hmac=24b04679e93665382deb3dc7db74cb13fe8a6edcca3720354b99c5eec0c6fb4c">
                        <div class="d-flex flex-column">
                            <h2 class="font-weight-bold mb-0">Hotel Reservation</h2>
                            <span class="font-weight-bold">Tax Invoice</span>
                            <small>INV-{{ $reservasi->id }}</small>
                        </div>
                    </div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tbody>
                                <tr class="highlight">
                                    <td class="font-weight-bold">Bill To</td>
                                    <td class="font-weight-bold">Ship To</td>
                                </tr>
                                <tr>
                                    <td>{{ $reservasi['nama'] }} <br>{{ $reservasi['alamat'] }}</td>
                                    <td>Hotel <br> Jakarta</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tbody>
                                <tr class="highlight">
                                    <td class="font-weight-bold">Description</td>
                                    <td class="font-weight-bold">Days</td>
                                    <td class="font-weight-bold">Price</td>
                                    <td class="text-center font-weight-bold">Total</td>
                                </tr>
                                <tr>
                                    <td>{{ $reservasi->tipe_kamar }}</td>
                                    <td>{{ $reservasi->lama_hari }} Hari</td>
                                    <td>{{ $reservasi->harga }}</td>
                                    <td class="text-center">{{ $reservasi->total_harga }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <hr>
                    <div class="table-responsive total-section">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td colspan="3" class="font-weight-bold text-center">Total</td>
                                    <td class="text-center font-weight-bold">{{ $reservasi->total_harga }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="status-section">
                        <div class="status-label">Payment Status:</div>
                        <div class="status-text
                            {{ $reservasi->status_pembayaran == 1 ? 'status-paid' : 'status-unpaid' }}">
                            {{ $reservasi->status_pembayaran == 1 ? 'Lunas' : 'Belum Lunas' }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
