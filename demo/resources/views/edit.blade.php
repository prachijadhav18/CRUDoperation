@include('header')

<div class="container">
    <h2>Add Company</h2>
    <form action="/updatecompany/{{$company->id}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" value="{{ $company->name }}" placeholder="Enter name" name="name">
            @error('name')
            <div class="" style="color: red;">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" value="{{ $company->email }}" placeholder="Enter email" name="email">
            @error('email')
            <div class="" style="color: red;">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" class="form-control" id="pwd" value="{{ $company->password }}" placeholder="Enter password" name="password">
            @error('password')
            <div class="" style="color: red;">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="pwd">Gender:</label>
            <input type="radio" id="gender" name="gender" value="Male"  {{ $company->gender == "Male" ? 'checked' : '' }}>Male
            <input type="radio" id="gender" name="gender" value="Female"  {{ $company->gender == "Female" ? 'checked' : '' }}>Female
        </div>

        <div class="form-group">
            <label for="pwd">Designation:</label>
            <select name="designation" id="designation" class="form-cotrol">
                <option value="">Select</option>
                <option value="MCA" {{$company->designation == 'MCA'  ? 'selected' : ''}}>MCA</option>
                <option value="MBA" {{$company->designation == 'MBA'  ? 'selected' : ''}}>MBA</option>
                <option value="BE" {{$company->designation == 'BE'  ? 'selected' : ''}}>BE</option>
            </select>
        </div>

        <div class="form-group">
            <label for="pwd">File:</label>
            <img src="../img/{{$company->photo}}" height="100" width="">
            <input type="file" class="form-control" id="photo" name="photo">
        </div>


        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>