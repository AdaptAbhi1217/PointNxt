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
    <title>Products</title>
</head>
<body>
    
    <div class="table-responsive m-5">
        <h1>Products</h1>
        <table class="table">
        <tr>
            <th>Sl No.</th>
            <th>Product Id</th>
            <th>Sku</th>
            <th>Name</th>
            <th>Price</th>
            <th>Length</th>
            <th>Width</th>
            <th>Height</th>
            <th>WeightOz</th>
            <th>Fulfillment Sku</th>
            <th>Warehouse Location</th>
            <th>Carrier Code</th>
            <th>Service Code</th>
            <th>Package Code</th>
            <th>Confirmation</th>
            <th>Customs Description</th>
            <th>Customs Value</th>
            <th>Customs TarriffNo</th>
            <th>Customs Country Code</th>
        </tr>
        @foreach ($products as $product)
            <tr>
                <td>{{$product['id']}}</td>
                <td>{{$product['productId']}}</td>
                <td>{{$product['sku']}}</td>
                <td>{{$product['name']}}</td>
                <td>{{$product['price']}}</td>
                <td>{{$product['length']}}</td>
                <td>{{$product['width']}}</td>
                <td>{{$product['height']}}</td>
                <td>{{$product['weightOz']}}</td>
                <td>{{$product['fulfillmentSku']}}</td>
                <td>{{$product['warehouseLocation']}}</td>
                <td>{{$product['defaultCarrierCode']}}</td>
                <td>{{$product['defaultServiceCode']}}</td>
                <td>{{$product['defaultPackageCode']}}</td>
                <td>{{$product['defaultConfirmation']}}</td>
                <td>{{$product['customsDescription']}}</td>
                <td>{{$product['customsValue']}}</td>
                <td>{{$product['customsTarriffNo']}}</td>
                <td>{{$product['customsCountryCode']}}</td>
            </tr>
        @endforeach
        </table>
    </div>
</body>
</html>