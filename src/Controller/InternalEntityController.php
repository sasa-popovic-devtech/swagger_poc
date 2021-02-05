<?php

namespace App\Controller;

use App\Entity\InternalEntity;
use App\Form\InternalEntityType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Nelmio\ApiDocBundle\Annotation\Model;
use Nelmio\ApiDocBundle\Annotation\Security;
use OpenApi\Annotations as OA;

/**
 * @Route("/internal")
 */
class InternalEntityController extends AbstractController
{
    /**
     * @Route("/", name="internal_entity_index", methods={"GET"})
     *
     * @OA\Get (
     *     path="/internal/",
     *     summary="List all internals",
     *     @OA\Response(
     *         response=200,
     *         description="Returns the internal entities",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref=@Model(type=InternalEntity::class, groups={"full"}))
     *         )
     *     )
     * )
     */
    public function index(): Response
    {
        $entityList = [];
        $quantity = rand(1, 10);
        for ($i=0; $i<$quantity; $i++) {
            $entity = new InternalEntity();
            $entity->setId($i);
            $entity->setType(sprintf('Type-%d', $i));
            $entity->setName(sprintf('Name-%d', $i));
            $entityList[] = $entity;
        }
        return $this->json($entityList);
    }

    /**
     * @Route("/new", name="internal_entity_new", methods={"POST"})
     * @OA\Post (
     *     path="/internal/new",
     *     summary="Create new internal",
     *     @OA\Response(
     *         response=200,
     *         description="Returns the created internal",
     *         @OA\Response(
     *         response=200,
     *         description="Returns the created internal",
     *         @OA\JsonContent(ref=@Model(type=InternalEntity::class, groups={"full"}))
     *         )
     *     ),
     *    	@OA\RequestBody(
     *    		@OA\MediaType(
     *    			mediaType="application/json",
     *    			@OA\Schema(
     *    				 @OA\Property(property="id",
     *    					type="integer",
     *    					format="int32",
     *    					example="10",
     *    					description="Id of the entity"
     *    				),
     *    				 @OA\Property(property="name",
     *    					type="string",
     *    					example="Test-name",
     *    					description="Name of the entity"
     *    				),
     *    				 @OA\Property(property="type",
     *    					type="string",
     *    					example="Internal",
     *    					description="Type of the entity"
     *    				)
     *    			)
     *    		)
     *    	)
     * )
     */
    public function new(Request $request): Response
    {
        $data = json_decode($request->getContent(), true);
        $internalEntity = new InternalEntity();
        $form = $this->createForm(InternalEntityType::class, $internalEntity);
        $form->handleRequest($request);
        $internalEntity->setId($data['id']);
        $internalEntity->setName($data['name']);
        $internalEntity->setType($data['type']);
        $internalEntity->setSuccess(true);
        return $this->json($internalEntity);
    }

    /**
     * @Route("/{id}", name="internal_entity_show", methods={"GET"})
     * @OA\Get (
     *     path="/internal/{id}",
     *     summary="Get specific internal",
     *     @OA\Parameter(
     *    		name="id",
     *    		in="path",
     *    		required=true,
     *    		description="Id of the internal entity",
     *    		@OA\Schema(
     *    			type="string",
     *    			default="1",
     *              example="10"
     *    		),
     *    	),
     *     @OA\Response(
     *         response=200,
     *         description="Returns specific internal entity",
     *         @OA\JsonContent(ref=@Model(type=InternalEntity::class, groups={"full"}))
     *     )
     * )
     */
    public function show($id): Response
    {
        $privateEntity = new InternalEntity();
        $privateEntity->setName("Fetched Name");
        $privateEntity->setType("Internal");
        $privateEntity->setId($id);
        return $this->json($privateEntity);
    }
}
