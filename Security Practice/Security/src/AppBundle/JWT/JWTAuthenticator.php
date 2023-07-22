<?php
// src/AppBundle/Security/TokenAuthenticator.php
namespace AppBundle\JWT;

use JwtBundle\Jwt;
use Symfony\Component\Finder\Exception\AccessDeniedException;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestMatcherInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Guard\AbstractGuardAuthenticator;
use Symfony\Component\Routing\RouterInterface;


class JWTAuthenticator extends AbstractGuardAuthenticator
{

    public function __construct(RouterInterface $router)
    {
        $this->router = $router;
    }



    private $secret;
    private $router;


    public function getSecret()
    {
        return $this->secret;
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
    /**
     * Called on every request to decide if this authenticator should be
     * used for the request. Returning `false` will cause this authenticator
     * to be skipped.
     */
    public function supports(Request $request)
    {
        return $request->headers->has('Authorization');
        // return true;
    }

    /**
     * Called on every request. Return whatever credentials you want to
     * be passed to getUser() as $credentials.
     */
    public function getCredentials(Request $request)
    {

        $req_roles = $request->attributes->get('req_roles');
        $headers = getAllHeaders();
        $token_string = (object)$headers;
        $token = trim($token_string->Authorization, 'Bearer');
        $user_roles = $this->checkRoles($token);
        $intersect = false;
        foreach ($req_roles as $role) {
            if (in_array($role, $user_roles)) {
                $intersect = true;
                break;
            }
        }
        if ($intersect && !empty($token)) {
            return $token;
        } else {
            return null;
        }
    }
    private function base64url_encode($str)
    {
        if (!empty($str)) {
            return rtrim(strtr(base64_encode($str), '+/', '-_'), '=',);
        }
    }

    public function checkRoles($token)
    {
        $tokenParts = explode('.', $token);
        $payload = base64_decode($tokenParts[1]);

        return json_decode($payload)->roles;
    }

    public function validate_jwt($jwt)
    {
        $this->setSecret();
        $tokenParts = explode('.', $jwt);

        $headers = base64_decode($tokenParts[0]);
        $payload = base64_decode($tokenParts[1]);
        $signature_provided = trim($tokenParts[2], '"');

        // check the expiration time - note this will cause an error if there is no 'exp' claim in the jwt
        $expiration = json_decode($payload)->expiration;
        $is_token_expired = ($expiration - time()) < 0;

        // build a signature based on the header and payload using the secret
        $base64_url_header = $this->base64url_encode($headers);
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
    public function getUser($credentials, UserProviderInterface $userProvider)
    {

        if (null === $credentials) {
            // The token header was empty, authentication fails with HTTP Status
            // Code 401 "Unauthorized"
            return true;
        }

        $tokenParts = explode('.', $credentials);
        $payload = base64_decode($tokenParts[1]);
        $signature_provided = trim($tokenParts[2], '"');
        $username = json_decode($payload)->username;

        try {
            //code...

            $user =   $userProvider->loadUserByUsername($username);
            return $user;
        } catch (\Throwable $th) {
            //throw $th;
            return null;
        }
        // if a User is returned, checkCredentials() is called
    }



    public function checkCredentials($credentials, $token)
    {
        // check credentials - e.g. make sure the password is valid
        // no credential check is needed in this case
        if ($credentials !== null) {
            // $jwt_instance =  new Jwt();
            $is_valid = $this->validate_jwt($credentials);
            return $is_valid;
        }
        return false;

        // return true to cause authentication success
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token, $providerKey)
    {
        // on success, let the request continue
        return new JsonResponse("sucess", 200);
    }

    public function onAuthenticationFailure(Request $request, AuthenticationException $exception)
    {
        $data = [
            // you may want to customize or obfuscate the message first
            'message' => strtr($exception->getMessageKey(), ["WHERE ARE YOU GOING??"])
            // $exception->getMessageData()

            // or to translate this message
            // $this->translator->trans($exception->getMessageKey(), $exception->getMessageData())
        ];

        return new JsonResponse($data, Response::HTTP_UNAUTHORIZED);
    }

    /**
     * Called when authentication is needed, but it's not sent
     */
    public function start(Request $request, AuthenticationException $authException = null)
    {
        $data = [
            // you might translate this message
            'message' => 'Authentication Required'
        ];

        return new JsonResponse($data, Response::HTTP_UNAUTHORIZED);
    }

    public function supportsRememberMe()
    {
        return false;
    }
}
