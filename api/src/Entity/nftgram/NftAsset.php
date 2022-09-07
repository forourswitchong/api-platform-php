<?php
// api/src/Entity/NftAsset.php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
//use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * This is a NFT Asset entity.
 */
#[ApiResource(mercure:true)]
#[ORM\Entity]
class NftAsset
{

    #[ORM\Id, ORM\Column, ORM\GeneratedValue]
    private ?int $nft_asset_id = null;  //PK

    #[ORM\Column]
    public string $asset_contract_address = ''; //UK

    #[ORM\Column]
    public string $assetContractName = '';

    #[ORM\Column]
    public string $contractType = 'NFT';

    #[ORM\Column]
    public string $contractSchema = 'ERC721';

    #[ORM\Column]
    public string $assetContractDescription = '';

    #[ORM\Column]
    public  string $assetContractSymbol = '';

    #[ORM\Column]
    public int $assetContractOwner = 0;

    #[ORM\Column]
    public string $assetContractImageUrl = '';

    #[ORM\Column]
    public string $assetContractPayoutAddress = '';

    public function getNftAssetId(): ?int {
        return $this->nftAssetId;
    }
}
