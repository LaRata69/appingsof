<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Import Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>

</head>
<body>
    <section style="padding-top:60px;">
        <div class=" container">
            <div class="row">
                <div class="card">
                    <div class="card-header">
                        Import

                    </div>
                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data" action="{{route('asignatura.import')}}">
                            @csrf
                            <div class="form-group">
                                <label for="file"> elige archivo </label>
                                <input type="file" name="file" class="form-control"/>

                            </div>
                            <button type="submit" class="btn btn-primary"> subir archivo</button>
                        </form>
                    </div>

                </div>

            </div>

        </div>

    </section>
    <section style="padding-left:128px;">
        <h1>Listas</h1>

        <table border="1">
            <tr>
                <td>Nrc de la asignatura</td>
                <td>Código de la asignatura</td>
                <td>Rut del profesor</td>
                <td>Nombre del profesor</td>
                <td>Periodo Academico</td>

            <tr>

            @foreach ($asignaturas as $asignatura)
            <tr>

                <td>{{$asignatura['nrc']}}</td>
                <td>{{$asignatura['codigo_asignatura']}}</td>
                <td>{{$asignatura['rut_profesor']}}</td>
                <td>{{$asignatura['nombre_profesor']}}</td>
                <td>{{$asignatura['periodo_academico']}}</td>

            @endforeach

        </table>
    </section>
</body>
</html>