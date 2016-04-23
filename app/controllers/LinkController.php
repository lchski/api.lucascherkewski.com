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
     * Update a specific Link.
     *
     * Path: /links/{id:[0-9]+} (PUT)
     *
     * @return Response
     */
    public function updateSingle()
    {
        return $this->buildResponse(Link::find((int)$this->args['id'])->update($this->request->getParsedBody()));
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
}
