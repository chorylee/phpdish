<?php

namespace PHPDish\Component\Media\UrlBuilder;

use Liip\ImagineBundle\Imagine\Cache\CacheManager as ImagineCacheManager;
use PHPDish\Component\Media\Model\ImageInterface;
use PHPDish\Component\Media\Model\MediaInterface;

class GeneralBuilder implements UrlBuilderInterface
{
    /**
     * 基本url.
     *
     * @var string
     */
    protected $baseUrl;

    protected $imagineCacheManager;

    public function __construct(ImagineCacheManager $cacheManager, $baseUrl)
    {
        $this->imagineCacheManager = $cacheManager;
        if (strpos($baseUrl, 'http://') !== false || strpos($baseUrl, 'https://') !== false ) {
            $this->baseUrl = rtrim($baseUrl, '/').'/';
        } else {
            $this->baseUrl = '/'.trim($baseUrl, '/').'/';
        }
    }

    /**
     * {@inheritdoc}
     */
    public function build($media)
    {
        $key = $media instanceof MediaInterface ? $media->getKey() : $media;
        return "{$this->baseUrl}{$key}";
    }

    /**
     * {@inheritdoc}
     */
    public function buildImageResizeUrl(ImageInterface $image, $filter, $runtimeConfig = [])
    {
        return $this->imagineCacheManager->getBrowserPath($image->getKey(), $filter, $runtimeConfig);
    }
}
