<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"> --}}
    <link rel="stylesheet"/ href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"> --}}
    {{-- <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet"> --}}
    <title>Registro PublicaloPe</title>
    <style>
        .all {
            /* border: 1px solid #6610f2; */
            border: 1px solid var(--cyan);
            border-radius: 0.5rem;
        }

        .header {
            /* background-color: #6610f2; */
            background-color: var(--cyan);
        }

        .data .data-1 {
            /* background-color: rgba(200,200,200,0.3); */
            background-color: #dee2e6;
            /* background-color: var(--gray-200); */
        }

        .data .data-2 {
            /* background-color: #6610f2; */
            background-color: var(--cyan);
        }

        .data .data-3 {
            background-color: var(--dark);
            color: var(--light);
        }
    </style>
</head>

<body>
    <div class="container">

        <div class="row all">
            <div class="col">
                <!-- Head -->
                <div class="header row py-3 mb-3">
                    <div class="col d-flex justify-content-center align-items-center">
                        <img width="200" src="https://upload.wikimedia.org/wikipedia/commons/2/2c/OneWeb_Logo.png"
                            alt="asd">
                    </div>
                    <div class="col d-flex justify-content-center align-items-center">
                        <div class="font-weight-bold">Confirmacion de pago</div>
                    </div>
                </div>
                <!-- qr -->
                <div class="row justify-content-center">
                    <div class="col-auto">
                        <img src="https://images.vexels.com/media/users/3/158122/isolated/preview/39e6da6d7ac6e177c43e50a97eb9de4d-etiqueta-engomada-del-codigo-qr.png"
                            alt="qr" width="300">
                    </div>
                </div>
                <!-- message -->
                <div class="row text-center my-3">
                    <div class="col-12"><b>El pago ha sido realizado!</b></div>
                    <div class="col-12">Gracias por realizar el pago para ######!.</div>
                    <div class="col-12">este es el detalle del pago.</div>
                </div>
                <!-- dataPago -->
                <div class="row text-center my-3 data mx-4">
                    <div class="col-12 data-1 p-3">
                        <div class="row">
                            <div class="col-12">Organizador: <b>########</b></div>
                            <div class="col-12 text-weigth-bold">Servicio: <b>########</b></div>
                        </div>
                    </div>
                    <div class="col-6 data-2 p-3">
                        <div class="row">
                            <div class="col-12">Código de pago</div>
                            <div class="col-12"><b>########</b></div>
                        </div>
                    </div>
                    <div class="col-6 data-3 p-3">
                        <div class="row">
                            <div class="col-12">Total Pagado</div>
                            <div class="col-12"><b>S/. #####</b></div>
                        </div>
                    </div>
                </div>
                <!-- ExtraInfo -->
                <div class="row justify-content-center text-center my-3 p-3">
                    <div class="col-8">
                        Ahora procederemos a informar a <b>######</b> y se enviara a tu correo esta informacion. Lorem
                        ipsum dolor sit amet consectetur adipisicing elit. Nulla praesentium voluptas commodi optio a,
                        fugit tempora incidunt facilis accusamus deserunt.
                    </div>
                </div>
            </div>
        </div>
        <div class="alert alert-primary" role="alert">
            <?php
            echo '<pre>';
            // var_dump($data);
            var_dump(json_decode($data));
            // echo json_decode($data)[0]->type;
            // echo $data[0]->type;
            echo '</pre>';
            ?>
        </div>

    </div>


</body>

</html>
