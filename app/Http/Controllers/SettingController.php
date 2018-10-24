<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index(){
    	$paypal_mode = 1;
    	$paypal_mode =  (env('PAYPAL_URI') === 'https://www.paypal.com/cgi-bin/webscr')  ? 1 : 2;
    	return view('settings.index',compact('paypal_mode'));
    }

    public function store(Request $request){

    	//Imap Settings
    	if($request->setting_var === 'imap'){

    		setEnvironmentValue('IMAP_USERNAME',$request->imap_username);
    		setEnvironmentValue('IMAP_PASSWORD',$request->imap_password);
    	}

    	//Mail Settings

    	if($request->setting_var === 'mail'){

			setEnvironmentValue('MAIL_DRIVER',$request->mail_driver);
			setEnvironmentValue('MAIL_HOST',$request->mail_host);
			setEnvironmentValue('MAIL_PORT',$request->mail_port);	
			setEnvironmentValue('MAIL_USERNAME',$request->mail_username);
			setEnvironmentValue('MAIL_PASSWORD',$request->mail_password);
			setEnvironmentValue('MAIL_ENCRYPTION',$request->mail_encryption);
    	}

    	//Paypal Settings

    	if($request->setting_var === 'paypal'){

    		$paypal_uri ="https://www.paypal.com/cgi-bin/webscr";

    		if($request->paypal_mode == 2){ 
    			//Paypal mode is 2 for sandbox
    			$paypal_uri = "https://www.sandbox.paypal.com/cgi-bin/webscr";
    		}else{
    			$paypal_uri ="https://www.paypal.com/cgi-bin/webscr";
    		}

			setEnvironmentValue('PAYPAL_USERNAME',$request->paypal_username);
			setEnvironmentValue('PAYPAL_URI',$paypal_uri);
    	}

    	return redirect()->back();

    }
}
