<x-back.layout title="Add New Admin">

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.store') }}" method="POST">
                @csrf


                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input name="name" type="text" class=" form-control @error('name') is-invalid  @enderror">
                    @error('name')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Phone</label>
                    <input name="phone" type="text" class=" form-control @error('phone') is-invalid  @enderror">
                    @error('phone')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input name="email" type="email" class="form-control @error('email') is-invalid  @enderror">
                    @error('email')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input name="password" type="password" class="form-control @error('password') is-invalid  @enderror">
                    @error('password')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <button class="btn btn-success">Save</button>
            </form>
        </div>
    </div>


</x-back.layout>
