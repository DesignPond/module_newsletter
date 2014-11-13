@extends('layouts.admin')
@section('content')

<div class="row">
    <div class="col-md-6">
        <h3>Abonnés la newsletter</h3>
    </div>
    <div class="col-md-6">
        <div class="options text-right" style="margin-bottom: 10px;">
            <div class="btn-toolbar">
                <a href="{{ url('admin/abonne/create') }}" class="btn btn-green"><i class="fa fa-plus"></i> &nbsp;Ajouter un abonné</a>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">

        <div class="panel panel-inverse">
            <div class="panel-heading">
                <h4><i class="fa fa-tasks"></i> &nbsp;Abonnés</h4>
            </div>
            <div class="panel-body">
                <div class="table-responsive">

                    <table class="table" style="margin-bottom: 0px;" id="abonnes">
                        <thead>
                        <tr>
                            <th class="col-sm-2">Action</th>
                            <th class="col-sm-2">Status</th>
                            <th class="col-sm-2">Date</th>
                            <th class="col-sm-2">Email</th>
                            <th class="col-sm-3">Abonnements</th>
                            <th class="col-sm-1"></th>
                        </tr>
                        </thead>
                        <tbody class="selects">

                        @if(!empty($abonnes))
                            @foreach($abonnes as $abonne)
                            <tr>
                                <td><a class="btn btn-sky btn-sm" href="{{ url('admin/abonne/'.$abonne->id.'/edit') }}">&Eacute;diter</a></td>
                                <td>
                                    @if( $abonne->activated_at )
                                        <span class="label label-success">Confirmé</span>
                                    @else
                                        <span class="label label-default">Email non confirmé</span>
                                    @endif
                                </td>
                                <td>
                                    @if( $abonne->activated_at)
                                        {{ $abonne->activated_at->formatLocalized('%d %B %Y') }}
                                    @endif
                                </td>
                                <td>{{ $abonne->email }}</td>
                                <td>
                                    @if( !$abonne->subscription->isEmpty() )
                                        <?php
                                            $abos = $abonne->subscription->lists('titre');
                                            echo implode(',',$abos);
                                        ?>
                                    @endif
                                </td>
                                <td class="text-right">
                                    {{ Form::open(array('route' => array('admin.abonne.destroy', $abonne->email), 'method' => 'delete')) }}
                                        <button data-action="Abonné {{ $abonne->email }}" class="btn btn-danger btn-xs deleteAction">Supprimer</button>
                                    {{ Form::close() }}
                                </td>
                            </tr>
                            @endforeach
                        @endif

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>

@stop