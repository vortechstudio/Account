<?php

namespace App\Actions;

use GitWrapper\GitBranches;
use GitWrapper\GitWrapper;

class VersionBuildAction
{
    private mixed $api_key;
    public mixed $owner;
    public mixed $repository;

    public function __construct()
    {
        $this->api_key = config('updater.github_token');
        $this->owner = config('updater.github_username');
        $this->repository = config('updater.github_repository');
    }

    public function getVersionInfo()
    {
        if(config('app.env') == 'local' || config('app.env') == 'testing') {
            return $this->getLastTag().'-'.$this->getLastCommitHash();
        } else {
            return $this->getLastTag();
        }
    }

    private  function getLastTag()
    {
        $response = \Http::withToken($this->api_key)
            ->get('https://api.github.com/repos/'.$this->owner.'/'.$this->repository.'/releases/latest');

        return $response['tag_name'];
    }

    private function getLastCommitHash()
    {
        $response = \Http::withToken($this->api_key)
            ->get('https://api.github.com/repos/'.$this->owner.'/'.$this->repository.'/commits/master');

        return substr($response['sha'], 0, 7);
    }
}
