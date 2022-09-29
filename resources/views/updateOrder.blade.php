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
    <title>Label Creation</title>
</head>
<body>
<div class="m-5 shadow p-4 mb-4 bg-white ">
    <h1>Update Order</h1>
    <div class="col-md-6 mb-5">
        <div class="form-group">
            <form action= "{{ url('updateOrder') }}" method="post">
                @csrf
                <label for="orderId" class="form-label">Order Id</label>
                <input type="number" class = "form-control" name="orderId"/>

                <label for="orderNumber" class="form-label">Order Number</label>
                <input type="text" class = "form-control" name="orderNumber"/>

                <label for="orderKey" class="form-label">Order Key</label>
                <input type="text" class = "form-control" name="orderKey"/>

                <label for="orderDate" class="form-label">Order Date</label>
                <input type="date" class = "form-control" name="orderDate"/>

                <label for="orderStatus" class="form-label">Order Status</label>
                <input type="text" class = "form-control" name="orderStatus"/>

                <label for="customerUsername" class="form-label">Customer Username</label>
                <input type="text" class = "form-control" name="customerUsername"/>

                <label for="customerEmail" class="form-label">Customer Email</label>
                <input type="email" class = "form-control" name="customerEmail"/>

                <label for="amountPaid" class="form-label">Amount Paid</label>
                <input type="number" class = "form-control" name="amountPaid"/>

                <label for="customerNotes" class="form-label">Customer Notes</label>
                <input type="text" class = "form-control" name="customerNotes"/>

                <label for="carrierCode" class="form-label">Carrier Code</label>
                <input type="text" class = "form-control" name="carrierCode"/>

                <label for="serviceCode" class="form-label">Service Code</label>
                <input type="text" class = "form-control" name="serviceCode"/>

                <label for="confirmation" class="form-label">Confirmation</label>
                <input type="text" class = "form-control" name="confirmation"/>


                <div>
                    <h3 class="p-2">Bill To</h3>
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class = "form-control" name="name"/>

                    <label for="company" class="form-label">Company</label>
                    <input type="text" class = "form-control" name="company"/>

                    <label for="street1" class="form-label">Street 1</label>
                    <input type="text" class = "form-control" name="street1"/>

                    <label for="street2" class="form-label">Street 2</label>
                    <input type="text" class = "form-control" name="street2"/>

                    <label for="street3" class="form-label">Street 3</label>
                    <input type="text" class = "form-control" name="street3"/>

                    <label for="city" class="form-label">City</label>
                    <input type="text" class = "form-control" name="city"/>

                    <label for="state" class="form-label">State</label>
                    <input type="text" class = "form-control" name="state"/>

                    <label for="postalCode" class="form-label">Postal Code</label>
                    <input type="number" class = "form-control" name="postalCode"/>

                    <label for="country" class="form-label">Country</label>
                    <input type="text" class = "form-control" name="country"/>

                    <label for="phone" class="form-label">Phone</label>
                    <input type="number" class = "form-control" name="phone"/>

                    <label for="residential" class="form-label">Residential</label>
                    <input type="text" class = "form-control" name="residential"/>
                </div>
                <div>
                    <h3 class="p-2">Ship To</h3>
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class = "form-control" name="name"/>

                    <label for="company" class="form-label">Company</label>
                    <input type="text" class = "form-control" name="company"/>

                    <label for="street1" class="form-label">Street 1</label>
                    <input type="text" class = "form-control" name="street1"/>

                    <label for="street2" class="form-label">Street 2</label>
                    <input type="text" class = "form-control" name="street2"/>

                    <label for="street3" class="form-label">Street 3</label>
                    <input type="text" class = "form-control" name="street3"/>

                    <label for="city" class="form-label">City</label>
                    <input type="text" class = "form-control" name="city"/>

                    <label for="state" class="form-label">State</label>
                    <input type="text" class = "form-control" name="state"/>

                    <label for="postalCode" class="form-label">Postal Code</label>
                    <input type="number" class = "form-control" name="postalCode"/>

                    <label for="country" class="form-label">Country</label>
                    <input type="text" class = "form-control" name="country"/>

                    <label for="phone" class="form-label">Phone</label>
                    <input type="number" class = "form-control" name="phone"/>

                    <label for="residential" class="form-label">Residential</label>
                    <input type="text" class = "form-control" name="residential"/>
                </div>
                <input type="submit" class="mt-2 btn btn-primary" value="Create Label">
            </form>
        </div>
    </div>
</div>
</body>
</html>

