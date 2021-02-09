<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\AppointmentRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=AppointmentRepository::class)
 */
class Appointment
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Patient::class, inversedBy="appointments")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Patient;

    /**
     * @ORM\ManyToOne(targetEntity=Doctor::class, inversedBy="appointments")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Doctor;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $contact;

    /**
     * @ORM\Column(type="date")
     */
    private $dateAppointment;

    /**
     * @ORM\Column(type="time")
     */
    private $timeAppointment;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $comment;

    /**
     * @ORM\OneToOne(targetEntity=AppointmentDetails::class, mappedBy="appointment", cascade={"persist", "remove"})
     */
    private $appointmentDetails;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPatient(): ?Patient
    {
        return $this->Patient;
    }

    public function setPatient(?Patient $Patient): self
    {
        $this->Patient = $Patient;

        return $this;
    }

    public function getDoctor(): ?Doctor
    {
        return $this->Doctor;
    }

    public function setDoctor(?Doctor $Doctor): self
    {
        $this->Doctor = $Doctor;

        return $this;
    }

    public function getContact(): ?string
    {
        return $this->contact;
    }

    public function setContact(?string $contact): self
    {
        $this->contact = $contact;

        return $this;
    }

    public function getDateAppointment(): ?\DateTimeInterface
    {
        return $this->dateAppointment;
    }

    public function setDateAppointment(\DateTimeInterface $dateAppointment): self
    {
        $this->dateAppointment = $dateAppointment;

        return $this;
    }

    public function getTimeAppointment(): ?\DateTimeInterface
    {
        return $this->timeAppointment;
    }

    public function setTimeAppointment(\DateTimeInterface $timeAppointment): self
    {
        $this->timeAppointment = $timeAppointment;

        return $this;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(?string $comment): self
    {
        $this->comment = $comment;

        return $this;
    }

    public function getAppointmentDetails(): ?AppointmentDetails
    {
        return $this->appointmentDetails;
    }

    public function setAppointmentDetails(AppointmentDetails $appointmentDetails): self
    {
        // set the owning side of the relation if necessary
        if ($appointmentDetails->getAppointment() !== $this) {
            $appointmentDetails->setAppointment($this);
        }

        $this->appointmentDetails = $appointmentDetails;

        return $this;
    }
}
