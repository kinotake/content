<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ConfirmRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendTestMail;

class ConfirmController extends Controller
{
    public function getHome()
    {
        return view('home');
    }

    public function getOldHome($old_service)
    {

        return view('home')->with(compact('old_service'));
    }

    public function postConfirm(ConfirmRequest $request)
    {
        $checkboxes = $request->input('checkboxes', []);
        $plans = collect([]);

        foreach ($checkboxes as $checkbox){
            $plans->push($checkbox);
        }

        $count = count($plans);

        $request->input('text');
        $name = $request->input('name');
        $input_datas = collect([
        ['name' => $request->input('name'), 'email' => $request->input('email'), 'service' => $request->input('service'),'category' => $request->input('category'),'plan' => $request->input('plan'),'text' => $request->input('text')],
        ]);

        return view('confirm', compact('plans','input_datas','count'));
    }

    public function postThanks(Request $request)
    {
        if($request->input('back') == 'back'){

            $old_service = $request->input('service');

            return redirect('/'.$old_service)->withInput();
        }

        $email = $request->input('email');

        $input_datas = collect([
        ['name' => $request->input('name'), 'email' => $request->input('email'), 'service' => $request->input('service'),'category' => $request->input('category'),'plan' => $request->input('plan'),'text' => $request->input('text')],
        ]);

        Mail::to($email)->send(new SendTestMail($input_datas));

        return view('completion');
    }

}
