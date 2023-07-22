<?php

namespace AppBundle;

use AppBundle\Entity\User;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\User\UserInterface;

class Jwt implements UserInterface
{



    private $headers;
    private $secret;
    private $payload;
    private $token;
    public function __construct(User $user=null)
    {


        $this->setHeaders();
        $this->setSecret();
        $payload = $this->generatePayload($user);

        



    }
    public function getRoles()
    {
        // return $this->roles;
    }

    public function getPassword()
    {
        // return $this->password;
    }

    public function getUsername()
    {
        // return $this->username;
    }

    public function getSalt()
    {
        // You can implement this method if needed
    }

    public function eraseCredentials()
    {
        // You can implement this method if needed
    }

    public function setToken($token)
    {
        $this->token = $token;
    }

    public function generateToken(User $user)
    {
        $payload = $this->generatePayload($user);
        $token =    $this->generateJWT($payload);
        return $token;
    }

    public function setHeaders()
    {
        $this->headers = [
            'typ' => 'JWT', 'alg' => 'HS256'
        ];
        return $this;
    }
    public function setPayload($payload)
    {
        $this->payload = $payload;
        return $this;
    }
    public function getPayload()
    {
        return $this->payload;
    }

    public function setSecret()
    {
        $this->secret = 'FxdQAL;yM6K#/!uDg.FP,!=Efcrxq%
        -b6-THkp!7qYP86wz.)Bi5uMWPL/fZ
        i5H5mnxu8wY,QR=_5.R@8Cu_TC8ka9
        UBvBiy5ChtQ-q]mQ{;&KnL/zrCNe8S
        }::@A(TTc5+bSzq:LeK$fj{+&;F9cK
        cGen,@8PjZzr[6V]*3jP#e*fieUt,.
        z%gChPBnc}_Cib%%V=tnZeptat?w)i
        2KRk(EXvD-r)ZKRp.(u/nEp,8B@J;,
        R_K4cd6duJb&.urn=wFjhFzu64]&VJ
        E{6aJ;mQYM&:7]/ru,@.*z$$(+V}{h';
        return $this;
    }

    /*
    Returns secret key 
    */

    public function getSecret()
    {

        return $this->secret;
    }


    public function generatePayload(User $user)
    {

        $payload = [
            // 'user_id' =>  $user->getId(),
            'roles' => $user->getRoles(),
            // 'organization_id' => $user->getOrganizationId(),
            'username' => $user->getUsername(),
            //Time in seconds
            // 60000 = 16 hours for dev purposes
            'expiration' => time() + 60000
        ];

        return $payload;
    }
    /*
    Returns headers  
    */

    public function getHeaders()
    {
        return $this->headers;
    }
    /*
    Generates a JWT given the payload and secret key  
    */

    public function generateJWT($payload)
    {
        $secret = $this->getSecret();
        $headers = $this->getHeaders();

        $headers_encoded = $this->base64url_encode(json_encode($headers));
        //echo "headers encoded". $headers_encoded;

        $payload_encoded =  $this->base64url_encode(json_encode($payload));
        // echo "generated payload". $payload_encoded;

        $signature = hash_hmac('SHA256', "$headers_encoded.$payload_encoded", $secret, true);
        $signature_encoded =  $this->base64url_encode($signature);

        $jwt = "$headers_encoded.$payload_encoded.$signature_encoded";

        return $jwt;
    }
    /*
    Retrieves organization from jwt  
    */

    public function getOrgnization($jwt)
    {
        $tokenParts = explode('.', $jwt);
        $payload = base64_decode($tokenParts[1]);
        $organization = json_decode($payload)->organization_id;
        return $organization;
    }
    /*
    Validates given jwt  
    */

    public function validate_jwt($jwt)
    {
        $tokenParts = explode('.', $jwt);
        $payload = base64_decode($tokenParts[1]);
        $signature_provided = trim($tokenParts[2], '"');



        // check the expiration time - note this will cause an error if there is no 'exp' claim in the jwt
        $expiration = json_decode($payload)->expiration;
        $is_token_expired = ($expiration - time()) < 0;
        // build a signature based on the header and payload using the secret
        $base64_url_header = $this->base64url_encode(json_encode($this->getHeaders()));
        $base64_url_payload = $this->base64url_encode($payload);

        $signature = hash_hmac('SHA256', "$base64_url_header.$base64_url_payload", $this->getSecret(), true);

        $base64_url_signature = $this->base64url_encode($signature);

        // verify it matches the signature provided in the jwt

        $is_signature_valid = ($base64_url_signature === $signature_provided);
        if ($is_token_expired || !$is_signature_valid) {
            return false;
        } else {
            return true;
        }
    }

    public function refreshToken($token)
    {

        $tokenParts = explode('.', $token);
        $payload = base64_decode($tokenParts[1]);
        $newToken = $this->generateJWT($payload);

        return json_encode($newToken);
    }
    /*
    Fetches the JWT from the request header
    */
    public function fetchJWT()
    {
        $headers = getallheaders();
        $token_string = (object)$headers;
        $token = trim($token_string->Authorization, 'Bearer ');
        return json_encode($token);
    }
    /*
    Encodes the generated payload
    */
    private function base64url_encode($str)
    {
        if (!empty($str)) {
            return rtrim(strtr(base64_encode($str), '+/', '-_'), '=',);
        }
    }

    public function __toString(){
        return $this->token;
    }
}
