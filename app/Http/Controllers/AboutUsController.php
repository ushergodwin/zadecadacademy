<?php

namespace App\Http\Controllers;

use App\Models\CompanyAddress;
use App\Models\CompanyProfile;
use App\Models\PaymentOption;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    //

    public function profile(Request $request)
    {
        if ($request->post('background_statement')) {

            $profile_data = [
                'background_statement' => $request->post('background_statement'),
                'background_statement_photo' => '',
                'vision_statement' => $request->post('vision_statement'),
                'vision_statement_photo' => '',
                'mission_statement' => $request->post('mission_statement'),
                'mission_statement_photo' => '',
                'objectives' => [],
                'objectives_photo' => ''
            ];

            $objectives = $request->post('objectives');

            if (is_array($objectives) && count($objectives) < 1) {
                return redirect()->back()->with('error', 'At least one objective is required!');
            }

            $converted_objectives = [];
            foreach ($objectives as $key => $obj) {
                // convert to objects
                $id = intval($key) + 1;
                if (strlen($obj) > 10) {
                    $objective = ['id' => $id, 'text' => $obj];
                    array_push($converted_objectives, $objective);
                }
            }

            $profile_data['objectives'] = json_encode($converted_objectives);

            if ($request->hasFile('background_statement_photo')) {
                $filename = uniqid('background-statement-photo-') . '.' . $request->background_statement_photo->getClientOriginalExtension();
                $request->background_statement_photo->move(public_path('uploads/profile'), $filename);
                $profile_data['background_statement_photo'] = $filename;
            }

            if ($request->hasFile('vision_statement_photo')) {
                $filename = uniqid('vision-statement-photo-') . '.' . $request->vision_statement_photo->getClientOriginalExtension();
                $request->vision_statement_photo->move(public_path('uploads/profile'), $filename);
                $profile_data['vision_statement_photo'] = $filename;
            }

            if ($request->hasFile('mission_statement_photo')) {
                $filename = uniqid('mission-statement-photo-') . '.' . $request->mission_statement_photo->getClientOriginalExtension();
                $request->mission_statement_photo->move(public_path('uploads/profile'), $filename);
                $profile_data['mission_statement_photo'] = $filename;
            }

            if ($request->hasFile('objectives_photo')) {
                $filename = uniqid('objectives-photo-') . '.' . $request->objectives_photo->getClientOriginalExtension();
                $request->objectives_photo->move(public_path('uploads/profile'), $filename);
                $profile_data['objectives_photo'] = $filename;
            }

            $is_update = 1;
            $profile = CompanyProfile::where('id', 1)->first();
            if (!$profile) {
                $profile = new CompanyProfile($profile_data);
                $is_update = 0;
            }

            if ($is_update) {
                foreach ($profile_data as $key => $value) {

                    if ($value) {
                        $profile->$key = $value;
                    }
                }
            }

            $profile->save();

            return redirect()->back()->with('success', 'Profile Changes Saved Successfully!');
        }

        $profile = CompanyProfile::all()->first();

        return view('admin.profile.index', compact('profile'));
    }

    public function clientele(Request $request)
    {
        if ($request->post('clientele_content')) {

            $profile_data = [
                'clientele_content' => $request->post('clientele_content'),
                'clientele_photo' => ''
            ];


            if ($request->hasFile('clientele_photo')) {
                $filename = uniqid('clientele-photo-') . '.' . $request->clientele_photo->getClientOriginalExtension();
                $request->clientele_photo->move(public_path('uploads/clientele'), $filename);
                $profile_data['clientele_photo'] = $filename;
            }

            $is_update = 1;
            $profile = CompanyProfile::where('id', 1)->first();
            if (!$profile) {
                $profile = new CompanyProfile($profile_data);
                $is_update = 0;
            }

            if ($is_update) {
                foreach ($profile_data as $key => $value) {
                    if ($value) {
                        $profile->$key = $value;
                    }
                }
            }

            $profile->save();

            return redirect()->back()->with('success', 'Clientele Changes Saved Successfully!');
        }

        $profile = CompanyProfile::all()->first();

        return view('admin.profile.clientele', compact('profile'));
    }

    public function deliverables(Request $request)
    {
        if ($request->post('deliverables_content')) {

            $profile_data = [
                'deliverables_content' => $request->post('deliverables_content'),
                'deliverables_photo' => ''
            ];


            if ($request->hasFile('deliverables_photo')) {
                $filename = uniqid('deliverables-photo-') . '.' . $request->deliverables_photo->getClientOriginalExtension();
                $request->deliverables_photo->move(public_path('uploads/deliverables'), $filename);
                $profile_data['deliverables_photo'] = $filename;
            }

            $is_update = 1;
            $profile = CompanyProfile::where('id', 1)->first();
            if (!$profile) {
                $profile = new CompanyProfile($profile_data);
                $is_update = 0;
            }

            if ($is_update) {
                foreach ($profile_data as $key => $value) {
                    if ($value) {
                        $profile->$key = $value;
                    }
                }
            }

            $profile->save();

            return redirect()->back()->with('success', 'Clientele Changes Saved Successfully!');
        }

        $profile = CompanyProfile::all()->first();

        return view('admin.profile.deliverables', compact('profile'));
    }

    public function paymentOptions(Request $request)
    {
        if ($request->post('bank_name')) {

            $options = [
                'account_number' => $request->post('account_number'),
                'account_name' => $request->post('account_name'),
                'bank_name' => $request->post('bank_name'),
                'reference' => $request->post('reference'),
                'airtel_money_steps' => $request->post('airtel_money_steps'),
                'mtn_money_steps' => $request->post('mtn_money_steps')
            ];

            $paymentOptions = PaymentOption::where('id', 1)->first();
            if (!$paymentOptions) {
                $paymentOptions = new PaymentOption($options);
            }

            foreach ($options as $key => $value) {
                $paymentOptions->$key = $value;
            }

            $paymentOptions->save();
            return redirect()->back()->with('success', 'Payment Options Changes Saved Successfully!');
        }
        $paymentOptions = PaymentOption::all()->first();
        return view('admin.profile.payment_options', compact('paymentOptions'));
    }

    public function companyAddress(Request $request)
    {
        if ($request->post('office_name')) {

            $companyAddressData = [
                'office_name' => $request->post('office_name'),
                'office_address' => $request->post('office_address'),
                'office_po_box' => $request->post('office_po_box'),
                'office_email' => $request->post('office_email'),
                'office_line1' => $request->post('office_line1'),
                'office_line2' => $request->post('office_line2'),
                'office_line3' => $request->post('office_line3')
            ];

            $companyAddress = CompanyAddress::where('id', 1)->first();
            if (!$companyAddress) {
                $companyAddress = new CompanyAddress($companyAddressData);
            }

            foreach ($companyAddressData as $key => $value) {
                $companyAddress->$key = $value;
            }

            $companyAddress->save();
            return redirect()->back()->with('success', 'Office Address Changes Saved Successfully!');
        }
        $companyAddress = CompanyAddress::all()->first();
        return view('admin.profile.company_address', compact('companyAddress'));
    }
}
