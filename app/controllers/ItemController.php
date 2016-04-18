<?php

namespace Lchski;

use Lchski\Contracts\Controller;

class ItemController extends BaseController implements Controller
{
    public function index()
    {
        $responseContent = \Lchski\Item::all();

        return $this->buildResponse($responseContent);
    }

    public function buildResponse($data)
    {
        return $this->response
                    ->withHeader('Content-Type', 'application/json')
                    ->write(
                        json_encode( $data, JSON_PRETTY_PRINT )
                    );
    }
}
