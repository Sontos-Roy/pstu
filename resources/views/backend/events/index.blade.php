@extends("backend.layouts.app")

@section('content')
<div class="container-fluid">
    <div class="block-header">
        <div class="d-sm-flex justify-content-between">
            <div>
                <h2>All Events</h2>
                <small class="text-muted">Patuakhali Science & Technology University</small>
            </div>
            @can('events.create')
            <div>
                <a href="{{ route('admin.events.create') }}" class="btn btn-raised btn-defualt">Add Event</a>
            </div>
            @endcan
        </div>
    </div>
    <!-- Basic Examples -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="body table-responsive">
                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                        <thead>
                            <tr>
                                <th>no</th>
                                <th>Heading</th>
                                <th>slug</th>
                                <th>Message</th>
                                <th>Date and Time</th>
                                <th>User</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($events as $key=>$item)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ StrLimit($item->heading, 100) }}</td>
                                <td>{{ StrLimit($item->slug, 100) }}</td>
                                <td>{{ StrLimit($item->short, 100) }}</td>
                                <td>{{ date('d M Y', strtotime($item->date)) }}, {{ date('h:i A', strtotime($item->time)) }}</td>
                                <td>{{ $item->user->name }}</td>
                                <td><img src="{{ getImage('events', $item->image) }}" width="100" alt=""></td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ route('admin.events.show', $item->id) }}" class="btn btn-info waves-effect pull-right btn-sm" style="color: white;"><span class="material-symbols-outlined">
                                            visibility
                                            </span></a>
                                        @can('events.edit')
                                        <a href="{{ route('admin.events.edit', $item->id) }}" class="btn btn-info waves-effect pull-right btn-sm" style="color: white;"><span class="material-symbols-outlined">
                                            edit_note
                                            </span>
                                        </a>
                                        @endcan
                                        @can('events.delete')
                                        <form action="{{ route('admin.events.destroy', $item->id) }}" class="delete_form" method="POST">
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger waves-effect pull-right btn-sm" style="color: white;"><span class="material-symbols-outlined">
                                            delete
                                            </span></button>
                                        </form>
                                        @endcan
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- #END# Basic Examples -->
</div>
@endsection
