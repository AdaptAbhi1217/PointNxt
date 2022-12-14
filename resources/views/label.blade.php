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
        <h1>Label Creation</h1>
        <div class="col-md-6 mb-5">
            <div class="form-group">
                <form>
                    @csrf
                    <label for="orderId" class="form-label">Order Id</label>
                    <input type="number" class = "form-control" name="orderId"/>

                    <label for="carrier" class="form-label">Carrier Code</label>
                    <input type="text" class = "form-control" name="carrier"/>

                    <label for="service" class="form-label">Service Code</label>
                    <input type="text" class = "form-control" name="service"/>

                    <label for="package" class="form-label">Package Code</label>
                    <input type="text" class = "form-control" name="package"/>

                    <label for="confirmation" class="form-label">Confirmation</label>
                    <input type="text" class = "form-control" name="confirmation"/>

                    <label for="shipDate" class="form-label">Ship Date</label>
                    <input type="date" class = "form-control" name="shipDate"/>

                    <label for="weight_value" class="form-label">Weight - Value</label>
                    <input type="number" class = "form-control" name="weight_value"/>

                    <label for="weight_units" class="form-label">Weight - Units</label>
                    <input type="number" class = "form-control" name="weight_units"/>

                    <label for="dimension_units" class="form-label">Dimension Units</label>
                    <input type="number" class = "form-control" name="dimension_units"/>

                    <label for="dimension_length" class="form-label">Dimension Length</label>
                    <input type="number" class = "form-control" name="dimension_length"/>

                    <label for="dimension_width" class="form-label">Dimension Width</label>
                    <input type="number" class = "form-control" name="dimension_width"/>

                    <label for="dimension_height" class="form-label">Dimension Height</label>
                    <input type="number" class = "form-control" name="dimension_height"/>


                    <input type="submit" class="mt-2 btn btn-primary" value="Create Label">
                </form>
            </div>
        </div>
    </div>
</body>
</html>

