<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <title>Mark as Shipped</title>
</head>
<body>
    <form class = "m-5" method="GET">
    <div class="mb-3">
        <label for="mark" class="form-label">Enter the OrderId</label>
        <input type="number" class = "form-control" name="mark">
        <input type="submit" class="mt-2 btn btn-primary" value="Mark Shipped">
    </div>
    </form>
    @if ($response != null)
        <h1>{{$response}}</h1>
    @endif

    <div class="table-responsive m-5">
        <h1>Shipped Orders</h1>
        <table class="table">
        <tr>
            <th>Sl No.</th>
            <th>Order Number</th>
            <th>Order Id</th>
            <th>Order Status</th>
            <th>Order Total</th>
            <th>Amount Paid</th>
            <th>Tax Amount</th>
            <th>Shipping Amount</th>
            <th>Carrier Code</th>
            <th>Serive Code</th>
            <th>Ship Date</th>
        </tr>
        @foreach ($shipped as $item)
            <tr>
                <td>{{$item['id']}}</td>
                <td>{{$item['orderNumber']}}</td>
                <td>{{$item['orderId']}}</td>
                <td>{{$item['orderStatus']}}</td>
                <td>{{$item['orderTotal']}}</td>
                <td>{{$item['amountPaid']}}</td>
                <td>{{$item['taxAmount']}}</td>
                <td>{{$item['shippingAmount']}}</td>
                <td>{{$item['carrierCode']}}</td>
                <td>{{$item['serviceCode']}}</td>
                <td>{{$item['shipDate']}}</td>
                
            </tr>
        @endforeach
        </table>
    </div>
</body>
</html>