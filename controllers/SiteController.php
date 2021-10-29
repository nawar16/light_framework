<?php

namespace app\controllers;

use nawar\framework\Application;
use nawar\framework\Controller;
use nawar\framework\Request;
use nawar\framework\Response;
use app\models\ContactForm;

class SiteController extends Controller 
{
    public function home()
    {
        $params = [
            'name' => 'nawar'
        ];
        return $this->render('home', $params);
    }
    public function contact(Request $request, Response $response)
    {
        $contact = new ContactForm();
        if($request->isPost())
        {
            $contact->loadData($request->getBody());
            if($contact->validate() && $contact->send())
            {
                Application::$app->session->setFlash('success', 'Thanks for contacting us');
                return $response->redirect('contact');
            }
        }
        return $this->render('contact', [
            'model' => $contact
        ]);
    }
}