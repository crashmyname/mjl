<?php
namespace Support;

class AuthMiddleware
{
    public function handle() {
        // Pengecekan login
        if (!$this->checkLogin()) {
            // include __DIR__ . '/../../app/Handle/errors/401.php';
            View::redirectTo('/sign-in');
            exit();
        }
    }

    public function checkLogin() {
        if (!\Support\Session::has('user')) {
            if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
                http_response_code(401); // Unauthorized
                exit;
            } else {
                return redirect('/sign-in');
            }
        }

        $session_lifetime = env('SESSION_LIFETIME')*60;
        $current_time = time();
        
        if (isset($_SESSION['login_time']) && ($current_time - $_SESSION['login_time']) > $session_lifetime) {
            session_unset();
            session_destroy();
            if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
                http_response_code(401); // Unauthorized
                exit;
            } else {
                return redirect('/sign-in');
            }
        }
        
        $_SESSION['login_time'] = $current_time;
        return true;
    }
}