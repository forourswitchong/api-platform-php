<?php
// api/src/Entity/Nft.php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
//use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use JetBrains\PhpStorm\Pure;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * This is a dummy entity. Remove it!
 */
#[ApiResource(mercure:true)]
#[ORM\Entity]
class Nft
{

    #[ORM\Id, ORM\Column, ORM\GeneratedValue]
    private ?int $nft_id = null;  //PK

    #[ORM\Column(length: 80, unique: true, nullable: false)]
    public ?string $asset_contract_address = ''; //UK

    #[ORM\Column(length: 300, unique: true, nullable: false)]
    public ?string $token_id = ''; //UK

    #[ORM\Column(nullable: false)]
    public string $market_type = 'OPENSEA';

    #[ORM\Column(nullable: false)]
    public int $market_id = 0;

    #[ORM\Column(name: 'nft_member_id')]
    public int $nft_member_id = 0;

    #[ORM\Column(length: 100)]
    public string $owner_user_name = '';

    #[ORM\Column]
    public string $owner_profile_imageUrl = '';

    #[ORM\Column(length: 80)]
    public string $owner_contract_address = '';

    #[ORM\Column(length: 100)]
    public string $creator_user_name = '';

    #[ORM\Column]
    public string $creator_profile_image_url = '';

    #[ORM\Column(length: 80)]
    public string $creator_contract_address = '';

    #[ORM\Column]
    public string $name = '';

    #[ORM\Column(type: 'text')]
    public string $description = '';

    #[ORM\Column]
    public int $num_sales = 0;

    #[ORM\Column]
    public string $image_url = '';

    #[ORM\Column]
    public string $image_preview_url = '';

    #[ORM\Column]
    public string $image_thumbnail_url = '';

    #[ORM\Column]
    public string $image_original_url = '';

    #[ORM\Column]
    public string $animation_url = '';

    #[ORM\Column]
    public string $animation_original_url = '';

    #[ORM\Column]
    public string $opensea_link = '';

    #[ORM\Column]
    public string $external_link = '';

    #[ORM\Column]
    public int $like_count = 0;

    #[ORM\Column]
    public int $favorite_count = 0;

    #[ORM\Column]
    public int $view_count = 0;

    #[ORM\Column]
    public string $collection_name = '';

    #[ORM\Column]
    public ?\DateTimeImmutable $last_sale_date = null;

    #[ORM\Column(length: 80)]
    public string $last_sale_contract_address = '';

    #[ORM\Column(length: 100)]
    public string $last_sale_user_name = '';

    #[ORM\Column]
    public int $frame_nft_id = 0;

    #[ORM\Column]
    public int $order_seq = 0;

    #[ORM\Column]
    public int $background_seq = 0;

    #[ORM\Column]
    public string $last_sale_profile_image_url = '';

//    #[ORM\OneToMany(mappedBy: 'nft', targetEntity: NftAsset::class, orphanRemoval: true)]
    #[ORM\ManyToOne(targetEntity: NftAsset::class, fetch: 'LAZY')]
    #[ORM\JoinColumn(name: 'nft_asset_id',nullable: false)]
    public iterable $nft_asset;

    #[Pure] public function __construct()
    {
        $this->nft_asset = new ArrayCollection();
//        $this->nftCollection = new ArrayCollection();
//        $this->nftProperties = new ArrayCollection();
    }

    #[ORM\Column(enumType: \ActiveStatus::class)]
    public \ActiveStatus $active_status = \ActiveStatus::ACTIVE;

    public int $property_order = 0;

    /**
     * @param int|null $nft_id
     */
    public function setNftId(?int $nft_id): void
    {
        $this->nft_id = $nft_id;
    }

    /**
     * @return int|null
     */
    public function getNftId(): ?int
    {
        return $this->nft_id;
    }
}
