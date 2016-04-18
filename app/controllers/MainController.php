<?php

namespace Lchski;

use Lchski\Contracts\Controller;
use Slim\Http\Response as Response;

class MainController extends BaseController implements Controller
{
    /**
     * Respond to any request to our route.
     * @return Response
     */
    public function index()
    {
        return $this->response->write('This is an API. No touchy!');
    }
}
