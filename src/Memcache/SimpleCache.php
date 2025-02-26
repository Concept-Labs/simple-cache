<?php
namespace Concept\SimpleCache\Memcache;

class SimpleCache extends \Concept\SimpleCache\AbstractCache
{
    /**
     * @var \Memcache
     */
    private Mem $memcache;

    public function __construct(\Memcache $memcache)
    {
        $this->memcache = $memcache;
    }

    public function get($key, $default = null)
    {
        $value = $this->memcache->get($key);
        return $value === false ? $default : $value;
    }

    public function set($key, $value, $ttl = null)
    {
        return $this->memcache->set($key, $value, 0, $ttl);
    }

    public function delete($key)
    {
        return $this->memcache->delete($key);
    }

    public function clear()
    {
        return $this->memcache->flush();
    }

    public function getMultiple($keys, $default = null)
    {
        foreach ($keys as $key) {
            yield $this->get($key, $default);
        }
    }

    public function setMultiple($values, $ttl = null)
    {
        foreach ($values as $key => $value) {
            $this->set($key, $value, $ttl);
        }
    }

    public function deleteMultiple($keys)
    {
        foreach ($keys as $key) {
            $this->delete($key);
        }
    }

    public function has($key)
    {
        return $this->memcache->get($key) !== false;
    }
}