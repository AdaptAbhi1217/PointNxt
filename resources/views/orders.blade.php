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
    <title>Orders</title>
</head>
<body>
    
    <div class="table-responsive m-5">
        <h1>Order Details</h1>
        <table class="table">
        <tr>
            <th>Sl No.</th>
            <th>Order Id</th>
            <th>Order Number</th>
            <th>Order Status</th>
            <th>Customer Id</th>
            <th>Customer Username</th>
            <th>Customer Email</th>
            <th>Order Total</th>
            <th>Amount Paid</th>
            <th>Tax Amount</th>
            <th>Shipping Amount</th>
            <th>Carrier Code</th>
            <th>Service Code</th>
            <th>Ship Date</th>
        </tr>
        @foreach ($orders as $order)
            <tr>
                <td>{{$order['id']}}</td>
                <td>{{$order['orderId']}}</td>
                <td>{{$order['orderNumber']}}</td>
                <td>{{$order['orderStatus']}}</td>
                <td>{{$order['customerId']}}</td>
                <td>{{$order['customerUsername']}}</td>
                <td>{{$order['customerEmail']}}</td>
                <td>{{$order['orderTotal']}}</td>
                <td>{{$order['amountPaid']}}</td>
                <td>{{$order['taxAmount']}}</td>
                <td>{{$order['shippingAmount']}}</td>
                <td>{{$order['carrierCode']}}</td>
                <td>{{$order['serviceCode']}}</td>
                <td>{{$order['shipDate']}}</td>
            </tr>
        @endforeach
        </table>
    </div>

    <div class="table-responsive m-5">
        <h1>Order Items</h1>
        <table class="table">
        <tr>
            <th>Sl No.</th>
            <th>Order Id</th>
            <th>Order Item Id</th>
            <th>Sku</th>
            <th>Name</th>
            <th>Quantity</th>
            <th>Unit Price</th>
            <th>Tax Amount</th>
            <th>Shipping Amount</th>
            <th>Product Id</th>
            <th>Fulfillment Sku</th>
        </tr>
        @foreach ($items as $item)
            <tr>
                <td>{{$item['id']}}</td>
                <td>{{$item['orderId']}}</td>
                <td>{{$item['orderItemId']}}</td>
                <td>{{$item['sku']}}</td>
                <td>{{$item['name']}}</td>
                <td>{{$item['quantity']}}</td>
                <td>{{$item['unitPrice']}}</td>
                <td>{{$item['taxAmount']}}</td>
                <td>{{$item['shippingAmount']}}</td>
                <td>{{$item['productId']}}</td>
                <td>{{$item['fulfillmentSku']}}</td>
            </tr>
        @endforeach
        </table>
    </div>
</body>
</html>