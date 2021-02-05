<?php

namespace App\Entity;

use OpenApi\Annotations as OA;
/**
 * @OA\Schema(
 *     schema="InternalEntity",
 *     @OA\Property(
 *         property="name",
 *         type="string",
 *         example="Test-name"
 *     ),
 *     @OA\Property(
 *         property="type",
 *         type="string",
 *         example="Internal"
 *     ),
 *     @OA\Property(
 *         property="success",
 *         type="boolean",
 *         example="true"
 *     )
 * )
 */
class InternalEntity
{
    /**
     * @var int
     * @OA\Property(description="The unique identifier of the entity.")
     */
    private $id;

    /**
     * @var string
     * @OA\Property(description="Name of the entity.")
     */
    private $name;

    /**
     * @var string
     * @OA\Property(description="Type of the entity.")
     */
    private $type;

    /**
     * @var boolean
     * @OA\Property(description="Flag for entity creation.")
     */
    private $success;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getSuccess(): ?bool
    {
        return $this->success;
    }

    public function setSuccess(bool $success): self
    {
        $this->success = $success;

        return $this;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }
}
