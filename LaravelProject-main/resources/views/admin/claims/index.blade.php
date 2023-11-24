@can('location_access')

@extends('layouts.admin')

@section('content')
@can('location_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        Claim List
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover datatable datatable-Location text-center">
                <thead>
                    <tr>
                        <th width="10"></th>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Mail</th>
                        <th>Status</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($claims as $key => $claim) <!-- Changed $location to $claim -->
                        <tr data-entry-id="{{ $claim->id }}"> <!-- Changed $location to $claim -->
                            <td></td>
                            <td>{{ $claim->id ?? '' }}</td>
                            <td>{{ $claim->claim_title ?? '' }}</td>
                            <td>{{ $claim->claim_mail ?? '' }}</td>
                            <td>
    @can('location_edit')
        @php
            $buttonText = $claim->claim_status == 0 ? 'Unprocessed' : 'Processed';
            $buttonColor = $claim->claim_status == 0 ? 'btn-secondary' : 'btn-success';
        @endphp
        <a class="btn btn-xs {{ $buttonColor }}" href="{{ route('admin.claims.edit', $claim->id) }}">
            {{ $buttonText }}
        </a>
    @endcan
</td>
                            <td>
                                @can('location_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.claims.show', $claim->id) }}">
                                        Details
                                    </a>
                                @endcan

                                @can('location_delete')
                                    <form action="{{ route('admin.claims.destroy', $claim->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="Delete">
                                    </form>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

@section('scripts')
@parent
<script>
    $(function () {
        let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons);
        let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
        let deleteButton = {
            text: deleteButtonTrans,
            url: "{{ route('admin.claims.massDestroy') }}",
            className: 'btn-danger',
            action: function (e, dt, node, config) {
                var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
                    return $(entry).data('entry-id');
                });

                if (ids.length === 0) {
                    alert('{{ trans('global.datatables.zero_selected') }}');
                    return;
                }

                if (confirm('{{ trans('global.areYouSure') }}')) {
                    $.ajax({
                        headers: {'x-csrf-token': _token},
                        method: 'POST',
                        url: config.url,
                        data: { ids: ids, _method: 'DELETE' }
                    }).done(function () {
                        location.reload();
                    });
                }
            }
        };
        dtButtons.push(deleteButton);

        $.extend(true, $.fn.dataTable.defaults, {
            order: [[1, 'desc']],
            pageLength: 100,
        });

        $('.datatable-Location:not(.ajaxTable)').DataTable({ buttons: dtButtons });
        $('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
            $($.fn.dataTable.tables(true)).DataTable().columns.adjust();
        });
    });
</script>
@endsection
@endcan

