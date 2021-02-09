<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\AppointmentDetailsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=AppointmentDetailsRepository::class)
 */
class AppointmentDetails
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity=Appointment::class, inversedBy="appointmentDetails", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $appointment;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $testToDo;

    /**
     * @ORM\Column(type="json")
     */
    private $symptoms = [];

    /**
     * @ORM\Column(type="json")
     */
    private $prescriptions = [];

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAppointment(): ?Appointment
    {
        return $this->appointment;
    }

    public function setAppointment(Appointment $appointment): self
    {
        $this->appointment = $appointment;

        return $this;
    }

    public function getTestToDo(): ?string
    {
        return $this->testToDo;
    }

    public function setTestToDo(?string $testToDo): self
    {
        $this->testToDo = $testToDo;

        return $this;
    }

    public function getSymptoms(): ?array
    {
        return $this->symptoms;
    }

    public function setSymptoms(array $symptoms): self
    {
        $this->symptoms = $symptoms;

        return $this;
    }

    public function getPrescriptions(): ?array
    {
        return $this->prescriptions;
    }

    public function setPrescriptions(array $prescriptions): self
    {
        $this->prescriptions = $prescriptions;

        return $this;
    }
}
