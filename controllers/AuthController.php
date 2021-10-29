<?php

namespace app\controllers;

use nawar\framework\Application;
use nawar\framework\Controller;
use nawar\framework\middlewares\AuthMiddleware;
use nawar\framework\Request;
use nawar\framework\Response;
use app\models\LoginForm;
use app\models\User;

class AuthController extends Controller 
{
    public function __construct()
    {
        $this->registerMiddleware(new AuthMiddleware(['profile']));
    }
    public function login(Request $request, Response $response)
    {
        $this->setLayout('auth');
        $loginForm = new LoginForm();
        if($request->isPost())
        {
            $loginForm->loadData($request->getBody());
            if($loginForm->validate() && $loginForm->login())
            {
                $response->redirect('/');
                return;
            }
        }
        return $this->render('login', [
            'model' => $loginForm
        ]);
    }
    public function register(Request $request)
    {
        $this->setLayout('auth');
        $user = new User();
        if($request->isPost())
        {
            $user->loadData($request->getBody());

            if($user->validate() && $user->save())
            {
                Application::$app->session->setFlash('success', 'Thanks for registering');
                Application::$app->response->redirect('/');
                return 'Success';
            }
            return $this->render('register', [
                'model' => $user
            ]);
        }
        return $this->render('register', [
            'model' => $user
        ]);
    }
    public function logout(Request $request, Response $response)
    {
        Application::$app->logout();
        $response->redirect('/');
    }
    public function profile()
    {
        return $this->render('profile');
    }
}