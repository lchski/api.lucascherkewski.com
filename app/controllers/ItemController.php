<?php

namespace Lchski;

use Lchski\Contracts\Controller;

class ItemController extends BaseController implements Controller
{
    public function index()
    {
        return $this->buildResponse(Item::all());
    }

    public function getSingle()
    {
        return $this->buildResponse(Item::find((int)$this->args['id']));
    }

    public function getSingleLinks()
    {
        return $this->buildResponse(Item::find((int)$this->args['id'])->links);
    }

    public function getSingleItems()
    {
        return $this->buildResponse(Item::find((int)$this->args['id'])->items());
    }

    public function createSingle()
    {
        return $this->buildResponse(Item::create($this->request->getParsedBody()));
    }

    public function buildResponse($data)
    {
        return $this->response
            ->withHeader('Content-Type', 'application/json')
            ->write(
                json_encode($data, JSON_PRETTY_PRINT)
            );
    }
}
