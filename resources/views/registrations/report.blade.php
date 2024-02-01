<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registro PublicaloPe</title>
    <link rel="stylesheet" href="{{asset('css/pdf.css')}}">
</head>

<body>
    <div class="container">

        <div class="row all">
            <div class="col">

                <!-- Head -->
                <div class="header row py-3 mb-3">
                    <div class="col d-flex justify-content-center align-items-center">
                        <img height="80" src="{{ asset('publicalope.svg') }}"
                            alt="asd">
                    </div>
                    <div class="col d-flex justify-content-center align-items-center">
                        <div class="font-weight-bold" style="font-size: 1.2em"><b>Confirmacion de pago</b></div>
                    </div>
                </div>
                <!-- qr -->
                <div class="row justify-content-center">
                    <div class="col-auto d-flex justify-content-center">
                        <img src="https://images.vexels.com/media/users/3/158122/isolated/preview/39e6da6d7ac6e177c43e50a97eb9de4d-etiqueta-engomada-del-codigo-qr.png"
                            alt="qr" width="300">
                    </div>
                </div>
                <!-- message -->
                <div class="row text-center my-3">
                    <div class="col-12">Estimado <i><b><?php echo $data->user->username; ?></b></i><b> El pago ha sido realizado!</b>
                    </div>
                    <div class="col-12">Gracias por realizar el pago con <b><?php echo $data->payment->payment_method; ?></b>!.</div>
                    <div class="col-12">este es el detalle del pago.</div>
                </div>
                <!-- dataPago -->
                <div class="row text-center my-3 data mx-3">
                    <div class="col-12 data-1 p-3">
                        <div class="row">
                            <div class="col-12">Evento: <b><?php echo $data->event->name; ?></b></div>
                            <div class="col-12">Tipo de ticket: <b><?php echo $data->ticket->type; ?></b></div>
                        </div>
                    </div>
                    <div class="col-6 data-2 p-3">
                        <div class="row">
                            <div class="col-12">Código de pago</div>
                            <div class="col-12"><b><?php echo $data->ticket->id; ?></b></div>
                        </div>
                    </div>
                    <div class="col-6 data-3 p-3">
                        <div class="row">
                            <div class="col-12">Total Pagado</div>
                            <div class="col-12"><b>S/. <?php echo $data->ticket->price; ?></b></div>
                        </div>
                    </div>
                </div>
                <!-- ExtraInfo -->
                <div class="row justify-content-center text-center my-3 p-3">
                    <div class="col-8">
                        Ahora procederemos a informar a <b><?php echo $data->user->email; ?></b>, se enviara a tu correo esta
                        informacion. Lorem
                        ipsum dolor sit amet consectetur adipisicing elit. Nulla praesentium voluptas commodi optio a,
                        fugit tempora incidunt facilis accusamus deserunt.
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="alert alert-primary" role="alert"> --}}
        <?php
        // echo '<pre>';
        // var_dump($data);
        // var_dump(json_decode($data));
        // echo json_decode($data)[0]->type;
        // echo $data[0]->type;
        // echo '</pre>';
        ?>
        {{-- </div> --}}

    </div>


</body>

</html>
