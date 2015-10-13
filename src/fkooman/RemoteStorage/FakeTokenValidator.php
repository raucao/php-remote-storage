<?php

namespace fkooman\RemoteStorage;

use fkooman\Rest\Plugin\Authentication\Bearer\ValidatorInterface;
use fkooman\Rest\Plugin\Authentication\Bearer\TokenInfo;

class FakeTokenValidator implements ValidatorInterface
{
    /**
     * @return TokenInfo
     */
    public function validate($bearerToken)
    {
        switch ($bearerToken) {
            case 'token':
                return new TokenInfo(
                    array(
                        'active' => true,
                        'username' => 'demo',
                        'scope' => 'api-test:rw',
                    )
                );
            case 'root_token':
                return new TokenInfo(
                    array(
                        'active' => true,
                        'username' => 'demo',
                        'scope' => '*:rw',
                    )
                );
            default:
                return new TokenInfo(
                    array(
                        'active' => false,
                    )
                );
        }
    }
}