@extends('layouts.admin')
@section('content')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.projects.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.project.title_singular') }}
            </a>
        </div>
    </div>

<div class="card">
    <div class="card-header">
        {{ trans('cruds.project.title') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover datatable datatable-Project">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.project.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.project.fields.titre') }}
                        </th>
                        <th>
                            {{ trans('cruds.project.fields.Description') }}
                        </th>
                        <th>
                            {{ trans('cruds.project.fields.DateDebut') }}
                        </th>
                        <th>
                            {{ trans('cruds.project.fields.DateFin') }}
                        </th>
                        <th>
                            {{ trans('cruds.project.fields.Budget') }}
                        </th>
                        <th>
                            {{ trans('cruds.project.fields.competences') }}
                        </th>
                        <th>
                            {{ trans('cruds.project.fields.etat') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($projects as $key => $project)
                        <tr data-entry-id="{{ $project->id }}" id="project-{{ $project->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $project->id ?? '' }}
                                </td>
                                <td>
                                    {{ $project->titre ?? '' }}
                                </td>
                                <td>
                                    {{ $project->Description ?? '' }}
                                </td>
                                <td>
                                    {{ $project->DateDebut ?? '' }}
                                </td>
                                <td>
                                    {{ $project->DateFin ?? '' }}
                                </td>
                                <td>
                                    {{ $project->Budget ?? '' }}
                                </td>
                                <td>
                                    {{ $project->competences ?? '' }}
                                </td>
                                <td>
        @if ($project->etat == 'pending')
            <a href="#" style="color: blue" onclick="showConfirmationDialog({{ $project->id }})">Pending</a>
        @elseif ($project->etat == 'accepted')
            <span style="color: green">Accepted</span>
        @elseif ($project->etat == 'rejected')
            <span style="color: red">Rejected</span>
        @endif
    </td>
                            <td>

                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.projects.show', $project->id) }}">
                                        {{ trans('global.view') }}
                                    </a>

                                    <a class="btn btn-xs btn-info" href="{{ route('admin.projects.edit', $project->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>

                                    <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>

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
        let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
            let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
            let deleteButton = {
                text: deleteButtonTrans,
                url: "{{ route('admin.projects.massDestroy') }}",
                className: 'btn-danger',
                action: function (e, dt, node, config) {
                    var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
                        return $(entry).data('entry-id')
                    });

                    if (ids.length === 0) {
                        alert('{{ trans('global.datatables.zero_selected') }}')

                        return
                    }

                    if (confirm('{{ trans('global.areYouSure') }}')) {
                        $.ajax({
                            headers: {'x-csrf-token': _token},
                            method: 'POST',
                            url: config.url,
                            data: { ids: ids, _method: 'DELETE' }})
                            .done(function () { location.reload() })
                    }
                }
            }
            dtButtons.push(deleteButton)

        $.extend(true, $.fn.dataTable.defaults, {
            order: [[ 1, 'desc' ]],
            pageLength: 100,
        });
        $('.datatable-Project:not(.ajaxTable)').DataTable({ buttons: dtButtons })
        $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
            $($.fn.dataTable.tables(true)).DataTable()
                .columns.adjust();
        });
    })

</script>


<script>
    function showConfirmationDialog(projectId) {
        let result = confirm("Do you want to accept this project?");
        if (result) {
            updateProjectStatus(projectId, 'accepted');
        } else {
            updateProjectStatus(projectId, 'rejected');
        }
    }

    function updateProjectStatus(projectId, status) {
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            method: 'POST',
            url: `/admin/projects/${projectId}/update-status`,
            data: { status: status }
        }).done(function (data) {
            if (data.success) {
                // Update the view accordingly based on the updated status
                updateView(status, projectId);
               // location.reload(); // Reload the page after the update
            } else {
                alert("Error: " + data.message); // Display error message if there was an issue with the update
            }
        }).fail(function (jqXHR, textStatus, errorThrown) {
            console.error("Error:", errorThrown); // Log any AJAX request failures
        });
    }

    function updateView(status, projectId) {
    const projectElement = document.querySelector(`#project-${projectId} td:nth-child(9)`);

    if (projectElement) {
        if (status === 'accepted') {
            projectElement.innerHTML = `<span style="color: green">Accepted</span>`;
        } else if (status === 'rejected') {
            projectElement.innerHTML = `<span style="color: red">Rejected</span>`;
        }
    } else {
        console.error(`Element with ID 'project-${projectId}' not found`);
    }
}

</script>




@endsection
