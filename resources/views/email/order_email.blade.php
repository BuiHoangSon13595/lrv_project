<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Title Page</title>

    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.3/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-xs-6">
                <div class="row">
                    <h4>Customer: {{$c['name']}}</h4>
                    <h4>Address: {{$order['address']}}</h4>
                    <h4>Email: {{$c['email']}}</h4>
                    <h4>Order Code: {{$order['id']}} </h4>
                </div>
            </div>
            <div class="col-xs-6">
                <div class="row">
                    <h4>Recipient: {{$c_name}}</h4>
                    <h4>Created Day: {{date('h:i:s A d,M,Y',strtotime($order['created_at']))}} </h4>
                    <h4>Phone: {{$order['phone']}} </h4>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <h4>Order Details:</h4>
        <table border="1" cellspacing="0" cellpadding="10" width="100%">
            <thead>
                <tr style="background-color:red;color:#fff">
                    <th class="text-center" style="padding:10px">Stt</th>
                    <th class="text-center" style="padding:10px">Product</th>
                    <th class="text-center" style="padding:10px">Color</th>
                    <th class="text-center" style="padding:10px">Price</th>
                    <th class="text-center" style="padding:10px">Quantity</th>
                    <th class="text-center" style="padding:10px">Total</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <?php $n =1?>
                @foreach($items as $item)
                <tr>
                    <td>{{$n}}</td>
                    <td>
                        <p><strong>{{$item['name']}}</strong></p>
                    </td>
                    <td style="background: {{$item['color']}}"></td>
                    <td>$ {{$item['price']}}</td>
                    <td>{{$item['quantity']}}</td>
                    <td>$ {{$item['price']*$item['quantity']}}</td>
                </tr>
                <?php $n++?>
                @endforeach
            </tbody>
        </table>
        <div class="text-right">
            <h4>Total: {{$order['total_amount']}} $</h4>
        </div>
        <div class="text-center">
            <p>Thank you for believing in us!</p>
            <p>We appreciate your help in this matter and look forward to hearing from you soon!</p>
            <p>Please contact me:</p>
            <p>Address: 2168 S Archer, Chicago, IL60616, US</p>
            <p>Phone: +1 312-808-1999 | +1 233-688-8999</p>
            <p>Email: Beautycosmetics@gmail.com</p>
        </div>

    </div>

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>

</html>