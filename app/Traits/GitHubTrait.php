<?php

namespace App\Traits;

use Exception;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Http;

trait GitHubTrait
{
    protected Response $response;

    public function getClosePullRequests()
    {
        $this->response = Http::withHeaders([
            'Accept' => 'application/vnd.github+json',
            'X-GitHub-Api-Version' => '2022-11-28',
            'Authorization' => sprintf("Bearer %s", Config::get('github.live.token'))
        ])
            ->get(
                sprintf(
                    "%s/%s/%s/pulls?%s",
                    Config::get('github.live.url'),
                    Config::get('github.live.owner'),
                    Config::get('github.live.repository'),
                    implode('&', Config::get('github.live.params'))
                )
            );

        if (!$this->response->ok()) {
            throw new Exception('Não foi possivel conectar a API do GitHub');
        }

        return $this->response->object();
    }
}
