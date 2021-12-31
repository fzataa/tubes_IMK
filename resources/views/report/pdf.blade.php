<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
        <h1>{{ $judul }}</h1>
        <table border="1">
            @foreach ($data as $dataa)
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>E-Mail</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Address Location</th>
                    <th>City</th>
                    <th>Province</th>
                    <th>Courier</th>
                    <th>Total</th>
                    <th>Date</th>
                </tr>
                <tr>
                    <td>{{ $dataa->id }}</td>
                    <td>{{ $dataa->name }}</td>
                    <td>{{ $dataa->phone }}</td>
                    <td>{{ $dataa->e_mail }}</td>
                    <td>{!! $dataa->product_name !!}</td>
                    <td>{{ $dataa->quantity }}</td>
                    <td>{{ $dataa->address_location }}</td>
                    <td>{{ $dataa->city }}</td>
                    <td>{{ $dataa->province }}</td>
                    <td>{{ $dataa->courier }}</td>
                    <td>{{ $dataa->total }}</td>
                    <td>{{ $dataa->created_at }}</td>
                </tr>
            @endforeach
        </table>







    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>