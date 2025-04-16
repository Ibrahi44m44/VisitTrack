<div class="row">
    <div class="col-md-4">
        <div class="mb-3">
            <x-form.input name="name" placeholder="Enter Visiter Name" type="text" label="Name"
                value="{{ old('name') }}"></x-form.input>
        </div>
    </div>
    <div class="col-md-4">


        <div class="mb-3">
            <x-form.input name="idNumber" placeholder="Enter Visiter Id Number" type="number" label="Id Number"
                value="{{ old('idNumber') }}"></x-form.input>
        </div>
    </div>
    <div class="col-md-4">
        <div class="mb-3">
            <x-form.input name="phone" placeholder="Enter Visiter Phone" type="text" label="Phone"
                value="{{ old('phone') }}"></x-form.input>
        </div>
    </div>
</div>



<div class="mb-3">
    <x-form.input name="dep_name" placeholder="Enter Name Of The Department Of The Employ Visiter Vame To visit"
        type="text" label="Department Name" value="{{ old('dep_name') }}"></x-form.input>
</div>

<div class="mb-3">
    <x-form.input name="emp_name" placeholder="Enter Name Of The Employ Came To Visit" type="text"
        label="Employ Name" value="{{ old('emp_name') }}"> </x-form.input>
</div>
