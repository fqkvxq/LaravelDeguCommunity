<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Auth;
use App\UserNotification;


class NotificationProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function($view) {
            if (!Auth::check()) {
                return;
            }

            $id = Auth::id();
            $count = UserNotification::where('read', 0)
                    ->where('user_id', $id)
                    ->count();

            $messages = UserNotification::where('user_id', $id)
                ->orderBy('created_at', 'desc')
                ->get();

                $view->with('notification_count', $count)
                ->with('notification_messages', $messages);
        });
    }
}
