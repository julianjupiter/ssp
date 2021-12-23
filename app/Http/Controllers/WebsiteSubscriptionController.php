<?php

namespace App\Http\Controllers;

use App\Models\WebsiteSubscription;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class WebsiteSubscriptionController extends Controller
{
    public function create(Request $request) {
        $data = $request->all();
        $websiteSubscription = new WebsiteSubscription($data);
        try {
            $websiteSubscription->save();
        } catch (Exception $exception) {
            return response()->json(['status' => 'FAILED'], 500);
        }

        return response()->json([
            'status' => 'SUCCESS',
            'message' => 'Subscription successful!'
        ], 200);
    }
}
