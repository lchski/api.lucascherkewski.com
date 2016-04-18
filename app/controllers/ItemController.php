<?php

namespace Lchski;

use Lchski\Contracts\Controller;

class ItemController extends BaseController implements Controller
{
    public function index()
    {
        $responseContent = Item::all();

        return $this->buildResponse($responseContent);
    }

    public function getSingle()
    {
        $responseContent = Item::find(intval($this->args['id']));

        return $this->buildResponse($responseContent);
    }

    public function getSingleLinks()
    {
        $responseContent = Item::find(intval($this->args['id']))->links;

        return $this->buildResponse($responseContent);
    }

    public function getSingleItems()
    {
        $responseContent = Item::find(intval($this->args['id']))->items();

        return $this->buildResponse($responseContent);
    }

    public function createSingle()
    {
        $item = Item::create($this->request->getParsedBody());

        return $this->buildResponse($item);
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
