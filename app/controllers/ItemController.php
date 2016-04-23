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
     * Retrieve the content for a specific Item.
     *
     * The file should be located in the storage directory: items/{item->ID}.md
     *
     * Path: /items/{id:[0-9]+}/content
     *
     * @return Response
     */
    public function getSingleContent()
    {
        return $this->buildResponse(['content' => $this->c->storage->read('items/' . $this->args['id'] . '.md')]);
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
     * Get the Links for a specific Item, with the linked items.
     *
     * Path: /items/{id:[0-9]+}/linksWithItems
     *
     * @return Response
     */
    public function getSingleLinksWithItems()
    {
        return $this->buildResponse(Item::find((int)$this->args['id'])->linksWithItems());
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
        $updateSuccess = Item::find((int)$this->args['id'])->update($this->request->getParsedBody());

        if ($updateSuccess) {
            return $this->buildResponse(Item::find((int)$this->args['id']));
        }

        return $this->buildResponse('update failed');
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
}
