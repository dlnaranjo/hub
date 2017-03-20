<?php

namespace Hub\HubBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Administration
 *
 * @ORM\Table(name="administration")
 * @ORM\Entity
 */
class Administration
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idAdministration", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idadministration;

    /**
     * @var integer
     *
     * @ORM\Column(name="trial", type="integer", nullable=false)
     */
    private $trial;

    /**
     * @var integer
     *
     * @ORM\Column(name="paymentPeriod", type="integer", nullable=false)
     */
    private $paymentperiod;

    /**
     * @var float
     *
     * @ORM\Column(name="paymentBusiness", type="float", precision=10, scale=0, nullable=false)
     */
    private $paymentbusiness;

    /**
     * @var float
     *
     * @ORM\Column(name="paymentProfessional", type="float", precision=10, scale=0, nullable=false)
     */
    private $paymentprofessional;



    /**
     * Get idadministration
     *
     * @return integer
     */
    public function getIdadministration()
    {
        return $this->idadministration;
    }

    /**
     * Set trial
     *
     * @param integer $trial
     *
     * @return Administration
     */
    public function setTrial($trial)
    {
        $this->trial = $trial;

        return $this;
    }

    /**
     * Get trial
     *
     * @return integer
     */
    public function getTrial()
    {
        return $this->trial;
    }

    /**
     * Set paymentperiod
     *
     * @param integer $paymentperiod
     *
     * @return Administration
     */
    public function setPaymentperiod($paymentperiod)
    {
        $this->paymentperiod = $paymentperiod;

        return $this;
    }

    /**
     * Get paymentperiod
     *
     * @return integer
     */
    public function getPaymentperiod()
    {
        return $this->paymentperiod;
    }

    /**
     * Set paymentbusiness
     *
     * @param float $paymentbusiness
     *
     * @return Administration
     */
    public function setPaymentbusiness($paymentbusiness)
    {
        $this->paymentbusiness = $paymentbusiness;

        return $this;
    }

    /**
     * Get paymentbusiness
     *
     * @return float
     */
    public function getPaymentbusiness()
    {
        return $this->paymentbusiness;
    }

    /**
     * Set paymentprofessional
     *
     * @param float $paymentprofessional
     *
     * @return Administration
     */
    public function setPaymentprofessional($paymentprofessional)
    {
        $this->paymentprofessional = $paymentprofessional;

        return $this;
    }

    /**
     * Get paymentprofessional
     *
     * @return float
     */
    public function getPaymentprofessional()
    {
        return $this->paymentprofessional;
    }
}
