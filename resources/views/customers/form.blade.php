<p>Name:</p>
<input type="text" name ="name" value="{{old('name') ?? $customer->name}}">
<br>{{$errors->first('name')}}
<p>Email:</p>
<input type="text" name ="email" value="{{old('email') ?? $customer->email}}">
<br>{{$errors->first('email')}}
<p>Phone:</p>
<input type="text" name="phone" value="{{old('phone') ?? $customer->phone}}">
<br>{{$errors->first('phone')}}

<br>
<div>
    <label for="active">Status</label>
        <br>
        <select name="active" id="active">
            <option value="" disabled>Select customer status</option>

            @foreach($customer -> activeOptions() as $activeOptionsKey => $activeOptionsValue)
                <option value="{{$activeOptionsKey}}" {{$customer->active == $activeOptionsValue ? 'selected' : ''}}>{{$activeOptionsValue}}</option>
            @endforeach
{{--            <option value="1" {{$customer->active == 'Active' ? 'selected' : ''}}>Active</option>--}}
{{--            <option value="0" {{$customer->active == 'Inactive' ? 'selected' : ''}}>Inactive</option>--}}
        </select>
</div>

<div>
    <label for="company_id">Company</label>
        <br>
        <select name="company_id" id="company_id">
            @foreach($companies as $company)
                <option value="{{$company->id}}" {{$company->id == $customer->company_id ? 'selected' : ''}}>{{$company->name}}</option>
            @endforeach
        </select>
</div>

<div class="form-group d-flex flex-column">
    <label for="image">Profile Image</label>
    <input type="file" name="image">
    <br>{{$errors->first('image')}}
</div>
