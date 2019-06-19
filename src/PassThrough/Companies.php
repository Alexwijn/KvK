<?php

namespace Alexwijn\KvK\PassThrough;

use Alexwijn\KvK\Concerns\HasConnection;
use Alexwijn\KvK\Resources;
use GuzzleHttp\Exception\GuzzleException;

/**
 * Alexwijn\KvK\PassThrough\Companies
 */
class Companies
{
    use HasConnection;

    public function find(string $id): ?Resources\Company
    {
        try {
            $url = vprintf('/?%s', compact('id'));
            $body = $this->connection->request('GET', $url);

            if ($response = json_decode($body, true)) {
                return new Resources\Company($response);
            }
        } catch (GuzzleException $e) {
            //
        }

        return null;
    }

    public function search(string $query, int $page = 1, int $size = 100): ?Resources\Companies
    {
        try {
            $url = vprintf('/?%s', [http_build_query(compact('query', 'page', 'size'))]);
            $body = $this->connection->request('GET', $url);

            if ($response = json_decode($body, true)) {
                $collection = new Resources\Companies();
                foreach ($response['_embedded'] as $company) {
                    $collection->push(new Resources\Company($company));
                }

                return $collection;
            }
        } catch (GuzzleException $e) {
            //
        }

        return null;
    }

    public function suggest(string $query, int $size = 10): ?Resources\Companies
    {
        try {
            $url = vprintf('/suggest/%s?%s', [$query, http_build_query(compact('size'))]);
            $body = $this->connection->request('GET', $url);

            if ($response = json_decode($body, true)) {
                $collection = new Resources\Companies();
                foreach ($response['_embedded'] as $company) {
                    $collection->push(new Resources\Company($company));
                }

                return $collection;
            }
        } catch (GuzzleException $e) {
            //
        }

        return null;
    }
}
