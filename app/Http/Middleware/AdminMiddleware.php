<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use App\Message;
use App\MessageReply;
use View;

class AdminMiddleware
{
    /**
     * Authenticate constructor.
     * @param Guard $auth
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($this->auth->guest() || \Auth::user()->level_id != 1) {
            if ($request->ajax()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect()->guest('login');
            }
        }else if (\Auth::check()){
            $unread  =   MessageReply::join('message', 'message.id', '=', 'message_reply.msg_id')
                ->select('message.id', 'msg_id', 'message_reply.sender', 'message.sender', 'message_reply.time')
                ->where('message_reply.is_read', 0)
                ->where('message_reply.sender', '<>', \Auth::user()->id)
                ->where(function ($query) {
                    $query->where('message.sender', \Auth::user()->id)
                        ->orWhere('message.receiver', \Auth::user()->id);
                })
                ->groupBy('message.id')
                ->get();

            View::share('unread', $unread);
        }
        return $next($request);
    }
}
