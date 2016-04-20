<?php

namespace Lchski;

use Lchski\Contracts\Controller;
use Slim\Http\Response;

class LinkController extends BaseController implements Controller
{
    /**
     * Get all Links.
     *
     * Path: /links
     *
     * @return Response
     */
    public function index()
    {
        return $this->buildResponse(Link::all());
    }

    /**
     * Get a specific Link.
     *
     * Path: /links/{id:[0-9]+}
     *
     * @return Response
     */
    public function getSingle()
    {
        return $this->buildResponse(Link::find((int)$this->args['id']));
    }

    /**
     * Get the Items linked by a specific Link.
     *
     * Path: /links/{id:[0-9]+}/items
     *
     * @return Response
     */
    public function getSingleItems()
    {
        return $this->buildResponse(Link::find((int)$this->args['id'])->items);
    }

    /**
     * Delete a Link.
     *
     * Path: /links/{id:[0-9]+} (DELETE)
     *
     * @return Response
     */
    public function deleteSingle()
    {
        return $this->buildResponse(Link::destroy((int)$this->args['id']));
    }

    /**
     * Create a new Link.
     *
     * Path: /links (POST)
     *
     * @return Response
     */
    public function createSingle()
    {
        $requestBody = $this->request->getParsedBody();

        $item = Link::create($requestBody);

        $item->items()->attach($requestBody['items']);

        return $this->buildResponse($item);
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
