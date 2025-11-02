<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\UserForm;
use Illuminate\Support\Facades\Auth;

class UserFormController extends Controller
{
     public function start()
    {
        return view('index');
    }
    
    // ****************step1***********************************
    public function showfirststep()
    {
        return view('stepone');
    }

    public function storestepone(Request $request)
    {
         $data = $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer|min:12|max:60',
            'email' => 'required|email|max:255',
            'gender' => 'required|in:male,female',
        ]);

        $request->session()->put('form_data', $data);

         return redirect()->route('secondstep.show');
    }

    // *******************step2*****************************************

    public function showsteptwo(Request $request)
    {
        if (! $request->session()->has('form_data')) {
            return redirect()->route('firststep.show');
        }


        return view('steptwo');
    }

    public function storesteptwo(Request $request)
    {
        $id=1;
        
         $data = $request->validate([
            'university' => 'required|string|max:255',
            'college' => 'required|string|max:255',
            'major' => 'required|string|max:255',
        ]);

        $request->session()->put('form_data.university', $data['university']);
        $request->session()->put('form_data.college', $data['college']);
        $request->session()->put('form_data.major', $data['major']);

         $formData = array_merge(
            $request->session()->get('form_data', []),
            $data
        );

        UserForm::create([
            'user_id' => $id, 
            'form_data' => $formData,
        ]);

        $request->session()->forget('form_data');
         return redirect()->route('complete');
    }

    // **************complete*******************

     public function complete()
    {
        return view('complete');
    }
}
