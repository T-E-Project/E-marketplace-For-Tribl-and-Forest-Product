
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
        <!-- Google Fonts -->
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto+Condensed:wght@400;700&display=swap" rel="stylesheet">
        <!--X- Google Fonts -X-->

        <!-- Font Awsome Icon -->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!--X- Font Awsome Icon -X-->

        <!--Boostrap CDN -->
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <!--X- Boostrap CDN -X-->
        <style>
            *{
                padding: 0;
                margin: 0;
                box-sizing: border-box;
            }

            body{
                font-family:'Open Sans', sans-serif;
                /* background-color:#eaeded; */
            }

            /* ========Global Style======== */
                ul{
                    list-style-type: none;
                }
                a{
                    text-decoration: none;
                }
                a:hover{
                    text-decoration:none;
                }
                :root{
                    --logo:rgb(4, 238, 4);
                    --background: #000;
                    --color: #fff;
                    --color1:#ccc;
                    --color2: #333333;
                    --color3: #f0f0f065;
                    --color4:#928f88;
                    --color5: #444349;
                    --font:'Roboto Condensed', sans-serif;
                    --shado :0 4px 16px rgb(0 0 0 / 10%);
                }
            /* ========Global Style======== */

            /* ====invoice_body===== */
                .email_description{
                    margin-top:20px;
                    justify-content:center;
                }
                .email_description img{
                    width:100px;
                    padding:10px;
                }
                .email_description h2{
                    color: var(--logo);
                    font-family: var(--font);
                    font-weight:700;
                    text-transform:capitalize;
                }
                .invoice_body {
                    justify-content:center;
                    margin-top:20px;
                    background-color: var(--color);
                    box-shadow: var(--shado);
                    padding:25px;
                    font-family: var(--font);
                    border-radius: 5px;
                }
                .invoice_body h1{
                    color: var(--logo);
                    text-transform: uppercase;
                    text-align:center;
                    font-size: 20px;
                    font-weight:700;
                }
            
                .invoice_body .invoice_user ul li{
                    font-size: 18px;
                    color: var(--color2);
                    font-weight:700;
                    padding:2px;
                }
                .invoice_body .invoice_user ul li span{
                    font-size: 16px;
                }
                .invoice_body .subtotal h2{
                color: var(--color2);
                font-size:20px;
                font-weight:700;
                padding:10px;
                }
                .invoice_body .subtotal h2 span{
                    color: var(--logo);
                    padding-left: 10px;
                    font-size:22px;
                }
            /* ==X==invoice_body==X=== */
        </style>
</head>
<body>
    <div class="container">
        <div class="row email_description">
            <div class="col-xl-6 text-center">
                <img src="<?php echo WEBSITE_PATH; ?>assets/success.jpg" alt="">
                <h2>Hi,Pruthviraj<br> Your Order has been <br> placed successfully !</h2>
            </div>
        </div>
        <div class="row invoice_body">
            <div class="col-xl-6">
                <h1><i class="fa fa-shopping-bag" aria-hidden="true"></i> <span>Tribal & Forrest</span></h1>
                <div class="invoice_user">
                    <ul>
                        <li>Name : <span>Pruthviraj</span></li>
                        <li>Order Id : <span>Pruthviraj</span></li>
                        <li>Email : <span>Pruthviraj</span></li>
                        <li>Mobile No : <span>Pruthviraj</span></li>
                        <li>Address : <span>Pruthviraj</span></li>
                    </ul>
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>qunty</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>tomat</td>
                            <td>1</td>
                            <td>20</td>
                        </tr>
                    </tbody>
                </table>
                <div class="subtotal">
                    <h2>SubToal <span>300</span></h2>
                </div>
            </div>
        </div>
    </div>
</body>
</html>