<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ParametrageRepository")
 */
class Parametrage
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=1)
     */
    private $pgColInfos;

    /**
     * @ORM\Column(type="string", length=1)
     */
    private $pgColPmzGeo;

    /**
     * @ORM\Column(type="string", length=1)
     */
    private $pgColPmzId;

    /**
     * @ORM\Column(type="smallint")
     */
    private $pgLiPmz;

    /**
     * @ORM\Column(type="string", length=1)
     */
    private $pgColPaGeo;

    /**
     * @ORM\Column(type="string", length=1)
     */
    private $pgColPaId;

    /**
     * @ORM\Column(type="smallint")
     */
    private $pgLiPa;

    /**
     * @ORM\Column(type="smallint")
     */
    private $pgLiDebInfos;

    /**
     * @ORM\Column(type="smallint")
     */
    private $pgLiFinInfos;

    /**
     * @ORM\Column(type="string", length=1)
     */
    private $pgColNbPmz;

    /**
     * @ORM\Column(type="string", length=1)
     */
    private $pgColNbPa;

    /**
     * @ORM\Column(type="smallint")
     */
    private $pgLiNb;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $version;

    /**
     * @ORM\Column(type="string", length=1)
     */
    private $peColMenu;

    /**
     * @ORM\Column(type="string", length=1)
     */
    private $peColTotal;

    /**
     * @ORM\Column(type="string", length=1)
     */
    private $peColElp;

    /**
     * @ORM\Column(type="string", length=1)
     */
    private $peColElr;

    /**
     * @ORM\Column(type="string", length=1)
     */
    private $peColNbre;

    /**
     * @ORM\Column(type="string", length=1)
     */
    private $pseColId;

    /**
     * @ORM\Column(type="string", length=1)
     */
    private $pseColNb;

    /**
     * @ORM\Column(type="string", length=1)
     */
    private $pseColNbSum;

    /**
     * @ORM\Column(type="string", length=1)
     */
    private $sbColNb;

    /**
     * @ORM\Column(type="smallint")
     */
    private $sbLiPmz;

    /**
     * @ORM\Column(type="smallint")
     */
    private $sbLiPa;

    /**
     * @ORM\Column(type="string", length=1)
     */
    private $pgColLabId;

    /**
     * @ORM\Column(type="string", length=1)
     */
    private $pgColLab;

    /**
     * @ORM\Column(type="string", length=1)
     */
    private $pgColLabNb;

    /**
     * @ORM\Column(type="smallint")
     */
    private $peLiDe;

    /**
     * @ORM\Column(type="smallint")
     */
    private $pseLiDe;

    /**
     * @ORM\Column(type="string", length=1, nullable=true)
     */
    private $pseColTro;

    /**
     * @ORM\Column(type="string", length=1, nullable=true)
     */
    private $pseColAdr;

    /**
     * @ORM\Column(type="string", length=1, nullable=true)
     */
    private $pseColSit;

    /**
     * @ORM\Column(type="string", length=1, nullable=true)
     */
    private $pseColIdGeo;

    /**
     * @ORM\Column(type="string", length=1, nullable=true)
     */
    private $pgColEmpPa;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $pgLiEmpPa;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $pgLiPaGeo;

    /**
     * @ORM\Column(type="string", length=1, nullable=true)
     */
    private $pgColLog;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $pgLiLog;

    /**
     * @ORM\Column(type="string", length=1, nullable=true)
     */
    private $addColCom;

    /**
     * @ORM\Column(type="string", length=1, nullable=true)
     */
    private $addColIte;

    /**
     * @ORM\Column(type="string", length=1, nullable=true)
     */
    private $addColHau;

    /**
     * @ORM\Column(type="string", length=1, nullable=true)
     */
    private $addColIon;

    /**
     * @ORM\Column(type="string", length=1, nullable=true)
     */
    private $addColNat;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPgColInfos(): ?string
    {
        return $this->pgColInfos;
    }

    public function setPgColInfos(string $pgColInfos): self
    {
        $this->pgColInfos = strtoupper($pgColInfos);

        return $this;
    }

    public function getPgColPmzGeo(): ?string
    {
        return $this->pgColPmzGeo;
    }

    public function setPgColPmzGeo(string $pgColPmzGeo): self
    {
        $this->pgColPmzGeo = strtoupper($pgColPmzGeo);

        return $this;
    }

    public function getPgColPmzId(): ?string
    {
        return $this->pgColPmzId;
    }

    public function setPgColPmzId(string $pgColPmzId): self
    {
        $this->pgColPmzId = strtoupper($pgColPmzId);

        return $this;
    }

    public function getPgLiPmz(): ?int
    {
        return $this->pgLiPmz;
    }

    public function setPgLiPmz(int $pgLiPmz): self
    {
        $this->pgLiPmz = $pgLiPmz;

        return $this;
    }

    public function getPgColPaGeo(): ?string
    {
        return $this->pgColPaGeo;
    }

    public function setPgColPaGeo(string $pgColPaGeo): self
    {
        $this->pgColPaGeo = strtoupper($pgColPaGeo);

        return $this;
    }

    public function getPgColPaId(): ?string
    {
        return $this->pgColPaId;
    }

    public function setPgColPaId(string $pgColPaId): self
    {
        $this->pgColPaId = strtoupper($pgColPaId);

        return $this;
    }

    public function getPgLiPa(): ?int
    {
        return $this->pgLiPa;
    }

    public function setPgLiPa(int $pgLiPa): self
    {
        $this->pgLiPa = $pgLiPa;

        return $this;
    }

    public function getPgLiDebInfos(): ?int
    {
        return $this->pgLiDebInfos;
    }

    public function setPgLiDebInfos(int $pgLiDebInfos): self
    {
        $this->pgLiDebInfos = $pgLiDebInfos;

        return $this;
    }

    public function getPgLiFinInfos(): ?int
    {
        return $this->pgLiFinInfos;
    }

    public function setPgLiFinInfos(int $pgLiFinInfos): self
    {
        $this->pgLiFinInfos = $pgLiFinInfos;

        return $this;
    }

    public function getPgColNbPmz(): ?string
    {
        return $this->pgColNbPmz;
    }

    public function setPgColNbPmz(string $pgColNbPmz): self
    {
        $this->pgColNbPmz = strtoupper($pgColNbPmz);

        return $this;
    }

    public function getPgColNbPa(): ?string
    {
        return $this->pgColNbPa;
    }

    public function setPgColNbPa(string $pgColNbPa): self
    {
        $this->pgColNbPa = strtoupper($pgColNbPa);

        return $this;
    }

    public function getPgLiNb(): ?int
    {
        return $this->pgLiNb;
    }

    public function setPgLiNb(int $pgLiNb): self
    {
        $this->pgLiNb = $pgLiNb;

        return $this;
    }

    public function getVersion(): ?string
    {
        return $this->version;
    }

    public function setVersion(string $version): self
    {
        $this->version = strtoupper($version);

        return $this;
    }

    public function getPeColMenu(): ?string
    {
        return $this->peColMenu;
    }

    public function setPeColMenu(string $peColMenu): self
    {
        $this->peColMenu = strtoupper($peColMenu);

        return $this;
    }

    public function getPeColTotal(): ?string
    {
        return $this->peColTotal;
    }

    public function setPeColTotal(string $peColTotal): self
    {
        $this->peColTotal = strtoupper($peColTotal);

        return $this;
    }

    public function getPeColElp(): ?string
    {
        return $this->peColElp;
    }

    public function setPeColElp(string $peColElp): self
    {
        $this->peColElp = strtoupper($peColElp);

        return $this;
    }

    public function getPeColElr(): ?string
    {
        return $this->peColElr;
    }

    public function setPeColElr(string $peColElr): self
    {
        $this->peColElr = strtoupper($peColElr);

        return $this;
    }

    public function getPeColNbre(): ?string
    {
        return $this->peColNbre;
    }

    public function setPeColNbre(string $peColNbre): self
    {
        $this->peColNbre = strtoupper($peColNbre);

        return $this;
    }

    public function getPseColId(): ?string
    {
        return $this->pseColId;
    }

    public function setPseColId(string $pseColId): self
    {
        $this->pseColId = strtoupper($pseColId);

        return $this;
    }

    public function getPseColNb(): ?string
    {
        return $this->pseColNb;
    }

    public function setPseColNb(string $pseColNb): self
    {
        $this->pseColNb = strtoupper($pseColNb);

        return $this;
    }

    public function getPseColNbSum(): ?string
    {
        return $this->pseColNbSum;
    }

    public function setPseColNbSum(string $pseColNbSum): self
    {
        $this->pseColNbSum = strtoupper($pseColNbSum);

        return $this;
    }

    public function getSbColNb(): ?string
    {
        return $this->sbColNb;
    }

    public function setSbColNb(string $sbColNb): self
    {
        $this->sbColNb = strtoupper($sbColNb);

        return $this;
    }

    public function getSbLiPmz(): ?int
    {
        return $this->sbLiPmz;
    }

    public function setSbLiPmz(int $sbLiPmz): self
    {
        $this->sbLiPmz = $sbLiPmz;

        return $this;
    }

    public function getSbLiPa(): ?int
    {
        return $this->sbLiPa;
    }

    public function setSbLiPa(int $sbLiPa): self
    {
        $this->sbLiPa = $sbLiPa;

        return $this;
    }

    public function getPgColLabId(): ?string
    {
        return $this->pgColLabId;
    }

    public function setPgColLabId(string $pgColLabId): self
    {
        $this->pgColLabId = strtoupper($pgColLabId);

        return $this;
    }

    public function getPgColLab(): ?string
    {
        return $this->pgColLab;
    }

    public function setPgColLab(string $pgColLab): self
    {
        $this->pgColLab = strtoupper($pgColLab);

        return $this;
    }

    public function getPgColLabNb(): ?string
    {
        return $this->pgColLabNb;
    }

    public function setPgColLabNb(string $pgColLabNb): self
    {
        $this->pgColLabNb = strtoupper($pgColLabNb);

        return $this;
    }

    public function getPeLiDe(): ?int
    {
        return $this->peLiDe;
    }

    public function setPeLiDe(int $peLiDe): self
    {
        $this->peLiDe = $peLiDe;

        return $this;
    }

    public function getPseLiDe(): ?int
    {
        return $this->pseLiDe;
    }

    public function setPseLiDe(int $pseLiDe): self
    {
        $this->pseLiDe = $pseLiDe;

        return $this;
    }

    public function getPseColTro(): ?string
    {
        return $this->pseColTro;
    }

    public function setPseColTro(?string $pseColTro): self
    {
        $this->pseColTro = $pseColTro;

        return $this;
    }

    public function getPseColAdr(): ?string
    {
        return $this->pseColAdr;
    }

    public function setPseColAdr(?string $pseColAdr): self
    {
        $this->pseColAdr = $pseColAdr;

        return $this;
    }

    public function getPseColSit(): ?string
    {
        return $this->pseColSit;
    }

    public function setPseColSit(?string $pseColSit): self
    {
        $this->pseColSit = $pseColSit;

        return $this;
    }

    public function getPseColIdGeo(): ?string
    {
        return $this->pseColIdGeo;
    }

    public function setPseColIdGeo(?string $pseColIdGeo): self
    {
        $this->pseColIdGeo = $pseColIdGeo;

        return $this;
    }

    public function getPgColEmpPa(): ?string
    {
        return $this->pgColEmpPa;
    }

    public function setPgColEmpPa(?string $pgColEmpPa): self
    {
        $this->pgColEmpPa = $pgColEmpPa;

        return $this;
    }

    public function getPgLiEmpPa(): ?int
    {
        return $this->pgLiEmpPa;
    }

    public function setPgLiEmpPa(?int $pgLiEmpPa): self
    {
        $this->pgLiEmpPa = $pgLiEmpPa;

        return $this;
    }

    public function getPgLiPaGeo(): ?int
    {
        return $this->pgLiPaGeo;
    }

    public function setPgLiPaGeo(?int $pgLiPaGeo): self
    {
        $this->pgLiPaGeo = $pgLiPaGeo;

        return $this;
    }

    public function getPgColLog(): ?string
    {
        return $this->pgColLog;
    }

    public function setPgColLog(?string $pgColLog): self
    {
        $this->pgColLog = $pgColLog;

        return $this;
    }

    public function getPgLiLog(): ?int
    {
        return $this->pgLiLog;
    }

    public function setPgLiLog(?int $pgLiLog): self
    {
        $this->pgLiLog = $pgLiLog;

        return $this;
    }

    public function getAddColCom(): ?string
    {
        return $this->addColCom;
    }

    public function setAddColCom(?string $addColCom): self
    {
        $this->addColCom = $addColCom;

        return $this;
    }

    public function getAddColIte(): ?string
    {
        return $this->addColIte;
    }

    public function setAddColIte(?string $addColIte): self
    {
        $this->addColIte = $addColIte;

        return $this;
    }

    public function getAddColHau(): ?string
    {
        return $this->addColHau;
    }

    public function setAddColHau(?string $addColHau): self
    {
        $this->addColHau = $addColHau;

        return $this;
    }

    public function getAddColIon(): ?string
    {
        return $this->addColIon;
    }

    public function setAddColIon(?string $addColIon): self
    {
        $this->addColIon = $addColIon;

        return $this;
    }

    public function getAddColNat(): ?string
    {
        return $this->addColNat;
    }

    public function setAddColNat(?string $addColNat): self
    {
        $this->addColNat = $addColNat;

        return $this;
    }
}
