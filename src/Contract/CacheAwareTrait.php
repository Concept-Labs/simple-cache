<?php
namespace Concept\SimpleCache\Contract;

use Psr\SimpleCache\CacheInterface;

trait CacheAwareTrait
{
    /**
     * @var CacheInterface
     */
    private ?CacheInterface $___cache = null;

    /**
     * {@inheritDoc}
     */
    public function withCache(CacheInterface $cache): static
    {
        $new = clone $this;
        $new->setCache($cache);

        return $new;
    }

    /**
     * {@inheritDoc}
     */
    public function setCache(CacheInterface $cache): static
    {
        $this->cache = $cache;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getCache(): CacheInterface
    {
        return $this->cache;
    }
}