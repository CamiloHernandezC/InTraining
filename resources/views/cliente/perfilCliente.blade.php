@extends('perfilTemplate')

@section('title') Mi Perfil @endsection

@section('tab3Title') Información físca @endsection

@section('tab3Content')
    @php
        $horasRestante=0;
    @endphp
    <h4 class="info-text">Cuentanos un poco de ti</h4>
    <div class="row m-auto">
        <div class="col-sm-4 m-auto">
            <div class="input-group">
                <span class="input-group-addon iconos">
                    <span class="fas fa-weight"></span>
                </span>
                <div class="form-group label-floating">
                    <label class="control-label">Peso inicial <small>(kilogramos)</small></label>
                    @if($user->cliente != null &&  $user->cliente->peso())
                        <input name="peso" type="number" step="any" class="form-control" required value="{{number_format($user->cliente->peso()->peso, 2)}}">
                    @else
                        <input name="peso" type="number" step="any" class="form-control" required>
                    @endif
                </div>
            </div>

            <div class="input-group">
                <span class="input-group-addon iconos">
                    <i class="fas fa-ruler-horizontal"></i>
                </span>
                <div class="form-group label-floating">
                    <label class="control-label">Estatura inicial <small>(centimetros)</small></label>
                    @if($user->cliente != null && $user->cliente->estatura())
                        <input name="estatura" type="number" step="any" class="form-control" required value="{{number_format($user->cliente->estatura()->estatura, 2)}}">
                    @else
                        <input name="estatura" type="number" step="any" class="form-control" required>
                    @endif
                </div>
            </div>
            <div class="input-group">
                <span class="input-group-addon iconos">
                    <span class="fas fa-weight"></span>
                </span>
                <div class="form-group label-floating">
                    <label class="control-label">Meta <small>(kilogramos)</small></label>
                    @if($user->cliente != null)
                        <input name="pesoIdeal" type="number" step="any" class="form-control" required value="{{number_format($user->cliente->peso_ideal, 2)}}">
                    @else
                        <input name="pesoIdeal" type="number" step="any" class="form-control" required>
                    @endif
                </div>
            </div>
            <div class="input-group">
                <span class="iconos" style="padding: 0/*para que en firefox queden horizontales*/">
                    <i class="fas fa-venus-mars"></i>
                </span>
                <div class="radio">
                    <label class="radio-label">
                        <input required type="radio" name="genero" value="f" {{$user->genero != null && $user->genero == 'f' ? "checked=true" : ""}}>
                        Femenino
                    </label>
                </div>
                <div class="radio">
                    <label class="radio-label">
                        <input required type="radio" name="genero" value="m" {{$user->genero != null && $user->genero == 'm' ? "checked=true" : ""}}>
                        Masculino
                    </label>
                </div>
            </div>
        </div>
        <div class="col-sm-8" style="text-align: center">
            <h4>¿Qué tipo de cuerpo tienes?</h4>
            <a style="cursor: help" data-toggle="modal" data-target="#modalExplicacionCuerpo">
                ayudame a escoger
                <i class="far fa-question-circle"></i>
            </a>
            <div class="row">
                <div class="col-sm-4">
                @if($user->cliente != null and $user->cliente->biotipo == 'ectomorfo')
                    <div class="choice form-group active" checked="checked" data-toggle="wizard-radio">
                    <input type="radio" name="tipoCuerpo" value="ectomorfo" required checked="checked">
                @else
                    <div class="choice form-group" data-toggle="wizard-radio">
                    <input type="radio" name="tipoCuerpo" value="ectomorfo" required>
                @endif
                        <div class="icon">
                            <img src="{{asset('images/ectomorfo.png')}}" id="bodytype" title="Tipos de cuerpo" style="height: 200px; width: 100px"/>
                        </div>
                        <h6>ectomorfo</h6>
                    </div>
                </div>

                <div class="col-sm-4">
                @if($user->cliente != null and $user->cliente->biotipo == 'mesomorfo')
                    <div class="choice form-group active" checked="checked" data-toggle="wizard-radio">
                        <input type="radio" name="tipoCuerpo" value="mesoomorfo" required checked="checked">
                @else
                    <div class="choice form-group" data-toggle="wizard-radio">
                        <input type="radio" name="tipoCuerpo" value="mesomorfo" required>
                @endif
                        <div class="icon">
                            <img src="{{asset('images/mesomorfo.png')}}" id="bodytype" title="Tipos de cuerpo" style="height: 200px; width: 100px"/>
                        </div>
                        <h6>mesomorfo</h6>
                    </div>
                </div>

                <div class="col-sm-4">
                @if($user->cliente != null and $user->cliente->biotipo == 'endomorfo')
                    <div class="choice form-group active" checked="checked" data-toggle="wizard-radio">
                        <input type="radio" name="tipoCuerpo" value="endomorfo" required checked="checked">
                @else
                    <div class="choice form-group" data-toggle="wizard-radio">
                        <input type="radio" name="tipoCuerpo" value="endomorfo" required>
                @endif
                        <div class="icon">
                            <img src="{{asset('images/endomorfo.png')}}" id="bodytype" title="Tipos de cuerpo" style="height: 200px; width: 100px"/>
                        </div>
                        <h6>endomorfo</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal explicación tipo cuerpo-->
    <div class="modal fade" id="modalExplicacionCuerpo" data-backdrop="false" tabindex="-1" role="dialog" aria-labelledby="modalExplicacionCuerpoTitle" aria-hidden="true" style="z-index: 1100">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title font-weight-bold" id="exampleModalLongTitle">Tipos de cuerpo</h5>
                    <button type="button" class="close" onclick="cerrarModal('modalExplicacionCuerpo')" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <script>
                        function cerrarModal(idModal) {
                            $('#'+idModal).modal('hide');
                        }
                    </script>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-4">
                            <b>Ectomorfos:</b>
                            <ul>
                                <li>Altos,delgados y largos</li>
                                <li>Estructura osea poco pesada</li>
                                <li>Ligeramente musculados</li>
                                <li>No ganan grasa facilmente</li>
                                <li>Dificultad para ganar musculos</li>
                                <li>Metábolismo super rápido</li>
                                <li>Pecho plano</li>
                                <li>Hombos pequeños</li>
                                <li>Estan por debajo del peso medio</li>
                            </ul>
                        </div>

                        <div class="col-sm-4">
                            <b>Mesomorfos:</b>
                            <ul>
                                <li>Atleticos</li>
                                <li>Forma de "reloj de arena" en las mujeres</li>
                                <li>Forma en "V" en hombres</li>
                                <li>Cuerpo duro y musculado</li>
                                <li>Fuertes</li>
                                <li>Ganan musculo facilmente</li>
                                <li>Ganan grasa más facilmente</li>
                                <li>Hombreos anchos</li>
                                <li>Metábolismo regular</li>
                            </ul>
                        </div>

                        <div class="col-sm-4">
                            <b>Endomorfos:</b>
                            <ul>
                                <li>Cuerpo blando y redondo</li>
                                <li>Por lo general bajos y fornidos</li>
                                <li>Ganan musculo facilmente</li>
                                <li>Acumulan grasa con facilidad</li>
                                <li>Dificultad para perder peso</li>
                                <li>Metábolismo lento</li>
                                <li>Hombros grandes</li>
                                <li>Están por encima del peso promedio</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal explicación tipo cuerpo-->

            @endsection

@section('modals')

    <!--solicitud modal ELIMINAR--><!--Solo se utiliza para clientes ya que los entrenadores pueder ir a la info de la solictud y eliminar su oferta-->
    <div class="modal fade" id="solicitudModalEliminar" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="eliminarSolicitudForm" method="post" action="{{route('eliminarSolicitud', ['user'=> Auth::user()->slug])}}" autocomplete="off">
                    @method('DELETE')
                    @csrf

                    <input type="hidden" name="solicitudIDEliminar" id="solicitudIDEliminar">

                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Confirmar eliminación</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>¿Está seguro que desea eliminar su solicitud?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                        <button type="button" class="btn btn-success" data-dismiss="modal" aria-label="Close">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('tipoUsuario') Atleta @endsection

@section('medidasCliente')
    @if($user->cliente != null && $user->cliente->estatura())
        <p>{{number_format($user->cliente->estatura()->estatura, 2)}} {{$user->cliente->estatura()->unidadMedidaAbreviatura}}</p>
    @endif
    @if($user->cliente != null &&  $user->cliente->peso())
        <p>{{number_format($user->cliente->peso()->peso, 2)}} {{$user->cliente->peso()->unidadMedidaAbreviatura}}</p>
    @endif
@endsection

@section('card1')
    @include('cliente.estadisticasCliente')
@endsection


@section('card2')
    @if(!$visitante)

        @include('entrenamientosAgendados')

        <div class="floating-card bg-semi-transparent p-3 mb-3">
            <div class="mb-5">
                <h3 class="d-inline-block">Mis solicitudes:</h3>
                @if(!$solicitudes->isEmpty())
                    <a class="btn btn-success float-right" href="{{route('crearSolicitud')}}">
                        Crear Solicitud
                    </a>
                @endif
            </div>

            @include('solicitudesAbiertas')

        </div>
    @endif
@endsection

@section('scripts')
    <!--Asignar id de la oferta a eliminar-->
    <script>
        $( '#solicitudModalEliminar' ).on('shown.bs.modal', function(event){
            var button = $(event.relatedTarget );
            document.getElementById('solicitudIDEliminar').value= button.data('solicitudid');
        });
    </script>

    <!--Validar completar perfil-->
    <script>
        $(document).ready(function () {
            $('.icon').click(function () {
                $('.icon').css("border-color","");
            });
        });
        function validar() {
            if(typeof $("input[name='genero']:checked").val()  === "undefined"){
                $('.radio-label').css("cssText", "color: red!important;")
            }else{
                $('.radio-label').css("color", "red")
            }
            if(typeof $("input[name='tipoCuerpo']:checked").val()  === "undefined"){
                $('.icon').css("border-color","red");
            }
        }
    </script>
@endsection
