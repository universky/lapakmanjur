<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Exception;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function edit_status($id)
    {
        $notification = Notification::find($id);
        $notification->status = 1;

        try {
            $notification->save();
            if ($notification->notif_type == "AK1") {
                return redirect('/kartu_kuning');
            } else if ($notification->notif_type == "Rekom Passport") {
                return redirect('/rekom_passport');
            }
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Internal error',
                'code' => 500,
                'error' => true,
                'errors' => $e,
            ], 500);
        }
    }

    public function notif_ak1()
    {
        $notif_ak1 = Notification::where('notif_type', 'AK1')->where('group_id', 1)->where('status', 0)->get();

        foreach ($notif_ak1 as $notification) {
            $notification->status = 1;

            try {
                $notification->save();
                return redirect('/kartu_kuning');
            } catch (Exception $e) {
                return response()->json([
                    'message' => 'Internal error',
                    'code' => 500,
                    'error' => true,
                    'errors' => $e,
                ], 500);
            }
        }
    }

    public function notif_rekom()
    {
        $notif_rekom = Notification::where('notif_type', 'Rekom Passport')->where('group_id', 1)->where('status', 0)->get();

        // return $notif_rekom;

        foreach ($notif_rekom as $notification) {
            $notification = Notification::find($notification['id']);
            $notification->status = 1;

            try {
                $notification->save();
                return redirect('/rekom_passport/admin');
            } catch (Exception $e) {
                return response()->json([
                    'message' => 'Internal error',
                    'code' => 500,
                    'error' => true,
                    'errors' => $e,
                ], 500);
            }
        }
    }
}
