<?php

namespace Lchski;

use Lchski\Contracts\Controller;
use Slim\Http\Response;

class ItemController extends BaseController implements Controller
{
    /**
     * Get all Items.
     *
     * Path: /items
     *
     * @return Response
     */
    public function index()
    {
        return $this->buildResponse(Item::all());
    }

    /**
     * Create a new Item.
     *
     * Path: /items (POST)
     *
     * @return Response
     */
    public function createSingle()
    {
        return $this->buildResponse(Item::create($this->request->getParsedBody()));
    }

    /**
     * Get a specific Item.
     *
     * Path: /items/{id:[0-9]+}
     *
     * @return Response
     */
    public function getSingle()
    {
        return $this->buildResponse(Item::find((int)$this->args['id']));
    }

    /**
     * Get the links for a specific Item.
     *
     * Path: /items/{id:[0-9]+}/links
     *
     * @return Response
     */
    public function getSingleLinks()
    {
        return $this->buildResponse(Item::find((int)$this->args['id'])->links);
    }

    /**
     * Get the related Items for a specific Item.
     *
     * Path: /items/{id:[0-9]+}/items
     *
     * @return Response
     */
    public function getSingleItems()
    {
        return $this->buildResponse(Item::find((int)$this->args['id'])->items());
    }

    /**
     * Update a specific Item.
     *
     * Path: /items/{id:[0-9]+} (PUT)
     *
     * @return Response
     */
    public function updateSingle()
    {
        return $this->buildResponse(Item::find((int)$this->args['id'])->update($this->request->getParsedBody()));
    }

    /**
     * Delete an Item.
     *
     * Path: /items/{id:[0-9]+} (DELETE)
     *
     * @return Response
     */
    public function deleteSingle()
    {
        return $this->buildResponse(Item::destroy((int)$this->args['id']));
    }

    /**
     * Convert data to JSON and set as response.
     *
     * @param $data mixed
     *
     * @return Response
     */
    public function buildResponse($data)
    {
        return $this->response
            ->withHeader('Content-Type', 'application/json')
            ->write(
                json_encode($data, JSON_PRETTY_PRINT)
            );
    }
}
