<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\StudentRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=StudentRepository::class)
 * @ApiResource(
 *  normalizationContext={"groups":"student:read"},
 *  collectionOperations={
 * "get"={},
 * "post"={}
 * }
 * )
 */

class Student
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer",length=10)
     * @Groups("student:read")
     *
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=25)
     *@Groups("student:read")
     *@Assert\Length(
     *      min = 4,
     *      max = 25,
     *      minMessage = "first name must be at least {{ limit }} characters long",
     *      maxMessage = "first name cannot be longer than {{ limit }} characters"
     * )
     */
    private $FirstName;

    /**
     * @ORM\Column(type="string", length=25)
     * @Groups("student:read")
     * *@Assert\Length(
     *      min = 4,
     *      max = 25,
     *      minMessage = "last name must be at least {{ limit }} characters long",
     *      maxMessage = "last name cannot be longer than {{ limit }} characters"
     * )
     *
     */
    private $LastName;

    /**
     * @ORM\Column(type="integer",length=10)
     * @Groups("student:read")
     * *@Assert\Length(
     *      min = 4,
     *      max = 10,
     *      minMessage = "Number must be at least {{ limit }} characters long",
     *      maxMessage = "Number cannot be longer than {{ limit }} characters"
     * )
     */
    private $NumEtud;

    /**
     * @ORM\ManyToOne(targetEntity=Department::class, inversedBy="student",fetch="EAGER",cascade={"persist", "remove" })
     *@Groups("student:read")
     */
    private $department;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->FirstName;
    }

    public function setFirstName(string $FirstName): self
    {
        $this->FirstName = $FirstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->LastName;
    }

    public function setLastName(string $LastName): self
    {
        $this->LastName = $LastName;

        return $this;
    }

    public function getNumEtud(): ?int
    {
        return $this->NumEtud;
    }

    public function setNumEtud(int $NumEtud): self
    {
        $this->NumEtud = $NumEtud;

        return $this;
    }

    public function getDepartment(): ?Department
    {
        return $this->department;
    }

    public function setDepartment(?Department $department): self
    {
        $this->department = $department;

        return $this;
    }
}
