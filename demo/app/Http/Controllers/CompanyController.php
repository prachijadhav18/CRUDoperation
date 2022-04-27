<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        $data['companies'] = Company::orderBy('id')->paginate(5);
        return view('index', $data);
    }
    public function add(Request $request)
    {
        $request->validate([
            'name' => 'required|max:191',
            'email' => 'required|email|unique:companies',
            'password' => 'required',
            'designation' => 'nullable',
            'gender' => 'nullable'
        ]);
        $company = new Company;
        $company->name = $request->name;
        $company->email = $request->email;
        $company->password = $request->password;
        $company->gender = $request->input('gender', '');
        $company->designation = $request->input('designation', '');
        if ($image = $request->file('photo')) {
            $destinationPath = 'img';

            echo $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $company->photo = $profileImage;
        } else {
            $company->photo = '';
        }
        $company->save();
        return redirect('company')
            ->with('success', 'Company has been created successfully.');
    }

    public function edit($id)
    {
        $company = Company::find($id);
        return view('edit', compact('company'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:191',
            'email' => 'required|email',
            'password' => 'required',
            'designation' => 'nullable',
            'gender' => 'nullable'
        ]);
        
        $company1 = Company::find($id);
        $image1=$company1->photo;
        $company = Company::find($id);
        $company->name = $request->name;
        $company->email = $request->email;
        $company->password = $request->password;
        $company->gender = $request->input('gender', '');
        $company->designation = $request->input('designation', '');
        if ($image = $request->file('photo')) {
            $destinationPath = 'img';

            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $company->photo = $profileImage;
        } else if($image=="") {
            
            $company->photo = $image1;
        }
        $company->save();
        return redirect('company')
            ->with('success', 'Company has been updated successfully.');
    }

    public function delete($id)
    {
        $company = company::find($id);
        unlink("img/" . $company->photo);

        $company->delete();
        return redirect('company')
            ->with('success', 'Company has been Deleted successfully.');
    }
}
