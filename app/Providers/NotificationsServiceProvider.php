<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Notification;
use App\Models\ReadNotification;
use Illuminate\Support\Facades\Auth;
use App\Transformers\NotificationTransformer;


class NotificationsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*', function ($view) {
            if ($user = Auth::user()) {
                $notificationsData = array_filter(fractal(Notification::orderBy('id', 'desc')->get(), new NotificationTransformer())->toArray()['data']);
                $unread = array_filter($notificationsData, function ($notification) {
                    return !$notification['read'];
                });
                $read = array_filter($notificationsData, function ($notification) {
                    return $notification['read'];
                });
                $notifications = [
                    'total' => count($notificationsData),
                    'unread' => count($unread),
                    'read' => count($read),
                    'data' => $notificationsData,
                ];
                $view->with('notifications', $notifications);
            }
        });
    }
}
