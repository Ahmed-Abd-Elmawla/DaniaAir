<?php

namespace App\Helpers;

use App\Models\Admin;
use App\Notifications\AdminNotify;

class sendNotification
{
    public static function newSafetyReportNotify()
    {
        $notifyData['message'] ='dashboard.notification.new_report';
        $notifyData['icon'] ='fa-solid fa-file-invoice';
        $notifyData['url'] = route('reports.index');
        $admins = self::getAdmins();
        self::notify($admins, $notifyData);
    }

    private static function getAdmins()
    {
        $admins = Admin::all();
        return $admins;
    }

    private static function notify($admins, $notifyData)
    {
        foreach ($admins as $admin) {
            $admin->notify(new AdminNotify($notifyData));
        }
    }
}
