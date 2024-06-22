@extends('layouts.version2.modulos')
@section('titulo', 'Denuncia Digital')

@section('contenido')
    <div class="container">

        <div class="card" style="margin-top: 170px;">

            <div class="card-header">

            </div>
            <div class="card-block table-border-style">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th><center>Folio Predenuncia</center></th>
                            <th><center>Fecha Registro</center></th>
                            <th><center>Estado</center></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Larry</td>
                            <td>the Bird</td>
                            <td>@twitter</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection


@section('js')
  <script>

  </script>
@endsection
