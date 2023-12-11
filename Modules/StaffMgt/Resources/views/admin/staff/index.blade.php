@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('staffmgt::staff.title.staff') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li class="active">{{ trans('staffmgt::staff.title.staff') }}</li>
    </ol>
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="row">
                <div class="btn-group pull-right" style="margin: 0 15px 15px 0;">
                    <a href="{{ route('admin.staffmgt.staff.create') }}" class="btn btn-primary btn-flat" style="padding: 4px 10px;">
                        <i class="fa fa-pencil"></i> {{ trans('staffmgt::staff.button.create staff') }}
                    </a>
                    <a href="{{ route('admin.staffmgt.staff.trashed') }}" class="btn btn-danger btn-flat" style="padding: 4px 10px; margin-left:10px">
                        <i class="fa fa-trash"></i> {{ trans('Trash') }}
                    </a>
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
                                <th>Profile</th>
                                <th>Name</th>
                                <th>Gender</th>
                                <th>Department</th>
                                <th>Decription</th>
                                <th>Gallary</th>
                                <th>Hire Date</th>
                                <th>{{ trans('core::core.table.created at') }}</th>
                                <th data-sortable="false">{{ trans('core::core.table.actions') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (isset($staff)): ?>
                            <?php foreach ($staff as $staff): ?>
                            <tr>
                                <td>
                                    {{-- <a href="{{ route('admin.staffmgt.staff.edit', [$staff->id]) }}"> --}}
                                            @if ($staff->image !== '')
                                                <img src="@thumbnail($staff->image->path,'smallThumb')" alt=""/>
                                                @else
                                                    <img src="{{ Module::asset('StaffMgt:image/null.jpg') }}" alt="" width="50" height="50">
                                            @endif
                                    {{-- </a> --}}
                                </td>
                                <td>
                                    <a href="{{ route('admin.staffmgt.staff.edit', [$staff->id]) }}">
                                        {{ $staff->name }}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('admin.staffmgt.staff.edit', [$staff->id]) }}">
                                        {{ $staff->present()->gender}}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('admin.staffmgt.staff.edit', [$staff->id]) }}">
                                        {{ $staff->department->name}}
                                        {{-- propoty'name'of none = go to staff php and import PresentableTrait --}}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('admin.staffmgt.staff.edit', [$staff->id]) }}">
                                        {!! $staff->description !!}
                                    </a>
                                </td>
                                <td>
                                    {{-- multi image  --}}
                                    @if ($staff->images !== '')
                                        @foreach ( $staff->images as $img )
                                            <img src="@thumbnail($img->path,'smallThumb')" alt=""/>
                                        @endforeach
                                    @else
                                        <img src="{{ Module::asset('StaffMgt:image/null.jpg') }}" alt="" width="50" height="50">
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.staffmgt.staff.edit', [$staff->id]) }}">
                                        {{ $staff->hire_date }}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('admin.staffmgt.staff.edit', [$staff->id]) }}">
                                        {{ $staff->created_at }}
                                    </a>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('admin.staffmgt.staff.edit', [$staff->id]) }}" class="btn btn-default btn-flat"><i class="fa fa-pencil"></i></a>
                                        <button class="btn btn-danger btn-flat" data-toggle="modal" data-target="#modal-delete-confirmation" data-action-target="{{ route('admin.staffmgt.staff.destroy', [$staff->id]) }}"><i class="fa fa-trash"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            <?php endif; ?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>{{ trans('core::core.table.created at') }}</th>
                                <th>{{ trans('core::core.table.actions') }}</th>
                            </tr>
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
        <dd>{{ trans('staffmgt::staff.title.create staff') }}</dd>
    </dl>
@stop

@push('js-stack')
    <script type="text/javascript">
        $( document ).ready(function() {
            $(document).keypressAction({
                actions: [
                    { key: 'c', route: "<?= route('admin.staffmgt.staff.create') ?>" }
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
