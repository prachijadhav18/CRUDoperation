@include('header')

<div class="container">
    <h2>Add Company</h2>
    <form action="createcompany" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
            @error('name')
            <div class="" style="color: red;">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
            @error('email')
            <div class="" style="color: red;">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
            @error('password')
            <div class="" style="color: red;">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="pwd">Gender:</label>
            <input type="radio" id="gender" name="gender" value="male">Male
            <input type="radio" id="gender" name="gender" value="female">Female
        </div>

        <div class="form-group">
            <label for="pwd">Designation:</label>
            <select name="designation" id="designation" class="form-cotrol">
                <option value="">Select</option>
                <option value="MCA">MCA</option>
                <option value="MBA">MBA</option>
                <option value="BE">BE</option>
            </select>
        </div>

        <div class="form-group">
            <label for="pwd">File:</label>
            <input type="file" class="form-control" id="photo" name="photo">
        </div>


        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
