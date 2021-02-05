<?php

namespace App\Controller;

use App\Entity\CommercialEntity;
use App\Form\CommercialEntityType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Nelmio\ApiDocBundle\Annotation\Model;
use Nelmio\ApiDocBundle\Annotation\Security;
use OpenApi\Annotations as OA;

/**
 * @Route("/commercial")
 */
class CommercialEntityController extends AbstractController
{
    /**
     * @Route("/", name="commercial_entity_index", methods={"GET"})
     *
     * @OA\Get (
     *     path="/commercial/",
     *     summary="List all commercials",
     *     @OA\Response(
     *         response=200,
     *         description="Returns the commercial entities",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref=@Model(type=CommercialEntity::class, groups={"full"}))
     *         )
     *     )
     * )
     */
    public function index(): Response
    {
        $entityList = [];
        $quantity = rand(1, 10);
        for ($i=0; $i<$quantity; $i++) {
            $entity = new CommercialEntity();
            $entity->setId($i);
            $entity->setType(sprintf('Type-%d', $i));
            $entity->setName(sprintf('Name-%d', $i));
            $entityList[] = $entity;
        }
        return $this->json($entityList);
    }

    /**
     * @Route("/new", name="commercial_entity_new", methods={"POST"})
     * @OA\Post (
     *     path="/commercial/new",
     *     summary="Create new commercial",
     *     @OA\Response(
     *         response=200,
     *         description="Returns the created commercial",
     *         @OA\Response(
     *         response=200,
     *         description="Returns the created commercial",
     *         @OA\JsonContent(ref=@Model(type=CommercialEntity::class, groups={"full"}))
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
        $commercialEntity = new CommercialEntity();
        $form = $this->createForm(CommercialEntityType::class, $commercialEntity);
        $form->handleRequest($request);

        $commercialEntity->setId($data['id']);
        $commercialEntity->setName($data['name']);
        $commercialEntity->setType($data['type']);
        $commercialEntity->setSuccess(true);
        return $this->json($commercialEntity);
    }

    /**
     * @Route("/{id}", name="commercial_entity_show", methods={"GET"})
     * @OA\Get (
     *     path="/commercial/{id}",
     *     summary="Get specific commercial",
     *     @OA\Parameter(
     *    		name="id",
     *    		in="path",
     *    		required=true,
     *    		description="Id of the commercial entity",
     *    		@OA\Schema(
     *    			type="string",
     *    			default="1",
     *              example="10"
     *    		),
     *    	),
     *     @OA\Response(
     *         response=200,
     *         description="Returns specific commercial entity",
     *         @OA\JsonContent(ref=@Model(type=CommercialEntity::class, groups={"full"}))
     *     )
     * )
     */
    public function show($id): Response
    {
        $privateEntity = new CommercialEntity();
        $privateEntity->setName("Fetched Name");
        $privateEntity->setType("Internal");
        $privateEntity->setId($id);
        return $this->json($privateEntity);
    }
}
