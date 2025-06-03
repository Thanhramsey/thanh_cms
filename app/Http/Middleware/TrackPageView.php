<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\PageView;
use Carbon\Carbon;

class TrackPageView
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Chỉ ghi nhận các request GET đến các trang HTML (không phải AJAX, assets, v.v.)
        if ($request->isMethod('GET') && !$request->ajax() && !$request->is('admin/*') && !$request->is('laravel-filemanager/*') && !$request->is('nova-api/*')) {
            $sessionId = $request->session()->getId();
            $ipAddress = $request->ip();
            $userAgent = $request->header('User-Agent');
            $currentUrl = $request->fullUrl();
            $today = Carbon::today();

            // Kiểm tra xem session này đã truy cập trang này trong hôm nay chưa để tránh trùng lặp quá nhiều
            // Hoặc bạn có thể chỉ ghi nhận mỗi session một lần trong một khoảng thời gian nhất định
            $existingView = PageView::where('session_id', $sessionId)
                                    ->where('url', $currentUrl)
                                    ->whereDate('created_at', $today)
                                    ->first();

            if (!$existingView) {
                PageView::create([
                    'session_id' => $sessionId,
                    'ip_address' => $ipAddress,
                    'user_agent' => $userAgent,
                    'url' => $currentUrl,
                    'view_date' => $today,
                ]);
            }
        }

        return $next($request);
    }
}