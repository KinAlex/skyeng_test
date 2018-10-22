<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 22.10.18
 * Time: 23:42
 */

namespace src\Facade;


use src\Interfaces\DataProviderInterface;

class SomeFacade
{
    use DateTime;
    use Exception;
    use Psr\Cache\CacheItemPoolInterface;
    use Psr\Log\LoggerInterface;
    use src\Integration\DataProvider;

    public $dataProvider;
    public $cache;
    public $logger;

    /**
     * @param DataProviderInterface $dataProvider
     * @param CacheItemPoolInterface $cache
     * @param LoggerInterface $logger
     */
    public function __construct(DataProviderInterface $dataProvider, CacheItemPoolInterface $cache, LoggerInterface $logger)
    {
        $this->dataProvider = $dataProvider;
        $this->cache = $cache;
        $this->logger = $logger;
    }

    /**
     * @param array $input
     * @return array
     */
    public function getResponse(array $input) : array
    {
        try {
            $cacheKey = $this->getCacheKey($input);
            $cacheItem = $this->cache->getItem($cacheKey);
            if ($cacheItem->isHit()) {
                return $cacheItem->get();
            }

            $result = $this->dataProvider->get($input);

            $cacheItem
                ->set($result)
                ->expiresAt(
                    (new DateTime())->modify('+1 day')
                );

            return $result;
        } catch (Exception $e) {
            $this->logger->critical('Error');
        }

        return [];
    }

    private function getCacheKey(array $input)
    {
        return json_encode($input);
    }
}