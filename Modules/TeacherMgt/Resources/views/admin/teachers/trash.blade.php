@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('Trashed') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li class="active">{{ trans('teachermgt::teachers.title.teachers') }}</li>
    </ol>
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="row">
                <div class="btn-group pull-right" style="margin: 0 15px 15px 0;">
                    <a href="{{ route('admin.teachermgt.teacher.index') }}" class="btn btn-primary btn-flat" style="padding: 4px 10px;">
                        <i class="fa fa-rotate-left"></i> {{ trans('Back') }}
                    </a>
                    {{-- <a href="{{ route('admin.teachermgt.teacher.create') }}" class="btn btn-primary btn-flat" style="padding: 4px 10px;">
                        <i class="fa fa-pencil"></i> {{ trans('teachermgt::teachers.button.create teacher') }}
                    </a> --}}
                    {{-- <a href="{{ route('admin.teachermgt.teacher.trashed') }}" class="btn btn-primary btn-flat" style="padding: 4px 10px;">
                        <i class="fa fa-pencil"></i> {{ trans('Trash') }}
                    </a> --}}
                    {{-- <button class="btn btn-danger btn-flat" data-toggle="modal" data-target="#modal-delete-confirmation" data-action-target="{{ route('admin.teachermgt.teacher.destroy', [$teacher->id]) }}"><i class="fa fa-trash"></i></button> --}}
                </div>
                
            </div>
            <div class="box box-primary">
                <div class="box-header">
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="data-table table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Profile</th>
                                <th>Name</th>
                                <th>Gender</th>
                                <th>Address</th>
                                <th>Department</th>
                                
                                <th>{{ trans('core::core.table.created at') }}</th>
                                <th data-sortable="false">{{ trans('core::core.table.actions') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (isset($teachers)): ?>
                            <?php foreach ($teachers as $teacher): ?>
                            <tr>
                                <td>
                                    <a href="{{ route('admin.teachermgt.teacher.edit', [$teacher->id]) }}">
                                        {{ $teacher->id}}
                                    </a>
                                </td>
                                <td>
                                    @if ($teacher->image !== '')
                                        <img src="@thumbnail($teacher->image->path,'smallThumb')" alt=""/>
                                        @else
                                            <img src="{{ Module::asset('teachermgt:image/null.jpg') }}" alt="" width="50" height="50">
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.teachermgt.teacher.edit', [$teacher->id]) }}">
                                        {{ $teacher->first_name.' '.$teacher->last_name }}
                                    </a>
                                </td>

                                <td>
                                    <a href="{{ route('admin.teachermgt.teacher.edit', [$teacher->id]) }}">
                                        {{ $teacher->present()->gender}}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('admin.teachermgt.teacher.edit', [$teacher->id]) }}">
                                        {{ $teacher->address}}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('admin.teachermgt.teacher.edit', [$teacher->id]) }}">
                                        {{ $teacher->department->name}}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('admin.teachermgt.teacher.edit', [$teacher->id]) }}">
                                        {{ $teacher->created_at }}
                                    </a>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('admin.teachermgt.teacher.recover', [$teacher->id]) }}" class="btn btn-default btn-flat"><i class="fa fa-rotate-left"></i></a>
                                        <button class="btn btn-danger btn-flat" data-toggle="modal" data-target="#modal-delete-confirmation" data-action-target="{{ route('admin.teachermgt.teacher.permanentDetele', [$teacher->id]) }}"><i class="fa fa-trash"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            <?php endif; ?>
                            </tbody>
                            <tfoot>

                                
                            {{-- <tr>
                                <th>{{ trans('core::core.table.created at') }}</th>
                                <th>{{ trans('core::core.table.actions') }}</th>
                            </tr> --}}
                            </tfoot>
                        </table>
                        <!-- /.box-body -->
                    </div>
                </div>
                <!-- /.box -->
            </div>
        </div>
    </div>
    @include('core::partials.delete-modal')
@stop

@section('footer')
    <a data-toggle="modal" data-target="#keyboardShortcutsModal"><i class="fa fa-keyboard-o"></i></a> &nbsp;
@stop
@section('shortcuts')
    <dl class="dl-horizontal">
        <dt><code>c</code></dt>
        <dd>{{ trans('teachermgt::teachers.title.create teacher') }}</dd>
    </dl>
@stop
@push('js-stack')
    <script type="text/javascript">
        $( document ).ready(function() {
            $(document).keypressAction({
                actions: [
                    { key: 'c', route: "<?= route('admin.teachermgt.teacher.create') ?>" }
                ]
            });
        });
    </script>
    <?php $locale = locale(); ?>
    <script type="text/javascript">
        $(function () {
            $('.data-table').dataTable({
                "paginate": true,
                "lengthChange": true,
                "filter": true,
                "sort": true,
                "info": true,
                "autoWidth": true,
                "order": [[ 0, "desc" ]],
                "language": {
                    "url": '<?php echo Module::asset("core:js/vendor/datatables/{$locale}.json") ?>'
                }
            });
        });
    </script>
@endpush
