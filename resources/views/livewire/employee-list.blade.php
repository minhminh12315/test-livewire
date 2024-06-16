@extends('livewire.dashboard')
@section('content')
<div class="p-5">

    <div class="manage-employees">
        <div class="header d-flex justify-content-between">
            <div class="title p-3">
                <h2>Manage Employees</h2>
            </div>
            <div class="d-flex flex-wrap gap-2 pe-5 align-items-center">
                <button  data-bs-toggle="modal" data-bs-target="#confirmDeleteModal" class="delete_selected btn btn-danger h-45 d-flex align-items-center gap-1 ">
                    <span class="material-symbols-outlined text-dark bg-light border-none rounded-circle">
                        remove
                    </span>
                    Delete
                </button>
                <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="confirmDeleteModalLabel">Confirm Delete</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Are you sure to delete these items?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="button" class="btn btn-danger" wire:click="deleteSelected" data-bs-dismiss="modal">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="/add/new" wire:navigate class="btn btn-success h-45 align-items-center d-flex gap-1 addnew">
                    <span class="material-symbols-outlined text-dark bg-light border-none rounded-circle ">
                        add
                    </span>Add New Employees</a>
            </div>
        </div>
        
        <div>
            <div class="table-responsive">
                <table class="table table-striped fs-5">
                    <thead>
                        <tr>
                            <td class="pt-3 pb-3" scope="col"><input disabled type="checkbox" name="" id=""></td>
                            <td class="pt-3 pb-3" scope="col">Name</td>
                            <td class="pt-3 pb-3" scope="col">Email</td>
                            <td class="pt-3 pb-3" scope="col">Phone</td>
                            <td class="pt-3 pb-3" scope="col">Address</td>
                            <td class="pt-3 pb-3 text-center fs-5">Actions</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($employees as $e)
                        <tr wire:key="row-{{ $e->id }}">
                            <td class="pt-3 pb-3"><input type="checkbox" name="check" id="" wire:change="toggleEmployeeSelection({{ $e->id }})"></td>
                            <td class="pt-3 pb-3">{{ $e->name }}</td>
                            <td class="pt-3 pb-3">{{ $e->email }}</td>
                            <td class="pt-3 pb-3">({{ $e->phone }})</td>
                            <td class="pt-3 pb-3">{{ $e->address }}</td>
                            <td class="pt-3 pb-3 d-flex justify-content-center">
                                <a href="/edit/employee/{{$e->id}}" wire:navigate class="">
                                    <span class="material-symbols-outlined text-warning">
                                        edit
                                    </span>
                                </a>
                                <button wire:click="delete({{$e->id}})" wire:confirm="Are you sure you want to delete this?" class="delete-icon ps-2">
                                    <span class="material-symbols-outlined text-danger border-none">
                                        delete
                                    </span>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div>
                    {{ $employees->links('vendor.pagination.default') }}
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('.delete_selected').addClass('disabled');
        $('input[type="checkbox"]').change(function() {
            if ($('input[type="checkbox"]:checked').length > 0) {
                $('.delete_selected').removeClass('disabled');
            } else {
                $('.delete_selected').addClass('disabled');
            }
        });
    });
</script>
@endsection