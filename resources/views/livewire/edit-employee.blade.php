@extends('livewire.dashboard')
@section('content')
<div class="p-5">
    <div class=" edit">
        <div class="card">
            <div class="card-header header">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="title">
                        <h2>Edit Employee</h2>
                    </div>
                    <div>
                        <a href="/employees" wire:navigate class=" btn btn-success float-end">Employee List</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form wire:submit="update">
                    <div class="mb-3">
                        <label for="name" class="form-label">Employee Name</label>
                        <input type="text" wire:model="name" class="form-control" id="name" name="name" value="{{$name}}">
                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" wire:model="email" class="form-control" id="email" name="email" value="{{$email}}">
                        @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" wire:model="phone" class="form-control" id="phone" name="phone" value="{{$phone}}">
                        @error('phone')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" wire:model="address" class="form-control" id="address" name="address" value="{{$address}}">
                        @error('address')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-success">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection