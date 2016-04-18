<?php

namespace Lchski;

use Lchski\Contracts\Controller;

class ItemController extends BaseController implements Controller
{
    public function returnResponse($data)
    {
        return $this->response
                    ->withHeader('Content-Type', 'application/json')
                    ->write(
                        json_encode( $data, JSON_PRETTY_PRINT )
                    );
    }
}
