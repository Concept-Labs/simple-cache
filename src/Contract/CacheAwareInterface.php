<?php
namespace Concept\SimpleCache\Contract;

use Psr\SimpleCache\CacheInterface;

interface CacheAwareInterface
{
    /**
     * Set the cache instance to use
     * 
     * @param CacheInterface $cache
     * 
     * @return static
     */
    public function withCache(CacheInterface $cache): static;

    /**
     * Set the cache instance to use
     * 
     * @param CacheInterface $cache
     * 
     * @return static
     */
    public function setCache(CacheInterface $cache): static;

    /**
     * Get the cache instance
     * 
     * @return CacheInterface
     */
    public function getCache(): CacheInterface;
}