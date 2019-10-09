<?php
/**
 * WordPress helpers.
 */
if (!defined('ABSPATH')) {
  return;
}

if (!function_exists('cache_forever')) {

  function cache_remember($key, $minutes, $callable)
  {
    if (!$value = get_transient($key)) {
      $value = (object) [
        'v' => $callable(),
        't' => time(),
      ];
      set_transient($key, $value, $minutes * 60);
    }
    return $value->v;
  }

  function cache_forever($key, $callable)
  {
    return cache_remember($key, 0, $callable);
  }

  function cache_forget($key)
  {
    return delete_transient($key);
  }

}

/**
 * Get the API access token that should be used in the current request
 * @return null|String
 */
function redwood_api_access_token() : ?String
{
  if ($user = wp_get_current_user()) {
    if ($token = get_user_meta($user->ID, '_redwood_api_access_token', true)) {
      return $token;
    }
  }
  if (trim($token = get_field('redwood_api_access_token', 'option'))) {
    return $token;
  }
  if (defined('REDWOOD_API_ACCESS_TOKEN')) {
    return constant('REDWOOD_API_ACCESS_TOKEN');
  }
  if (function_exists('env')) {
    return env('REDWOOD_API_ACCESS_TOKEN');
  }
  return null;
}

/**
 * Get the Redwood SDK API Client
 * @param string|null The access token to use; omit to use whatever is returned by redwood_api_access_token()
 * personal access token should be used
 * @return \Redwood\Client\DefaultApi
 */
function redwood($accessToken = null)
{
  static $api;

  $accessToken = $accessToken ?: redwood_api_access_token();

  if (empty($api[$accessToken])) {
    $config = Redwood\Configuration::getDefaultConfiguration()
      ->setHost(env('REDWOOD_API_HOST').'/api/v1')
      ->setAccessToken($accessToken);

    $api[$accessToken] = new Redwood\Client\DefaultApi(
      new GuzzleHttp\Client([
        'verify' => env('SSL_VERIFY', false),
      ]),
      $config
    );
  }

  return $api[$accessToken];
}

/**
 * Get a list of the SSO apps available in accessRedwood
 * @param bool $flush Flush the local cache
 * @return \Redwood\Models\SsoApp[]
 */
function redwood_sso_apps($flush = false) : ?array
{
  $cacheKey = 'redwood_sso_apps';

  if ($flush) {
    cache_forget($cacheKey);
  }

  return cache_remember($cacheKey, 5, function() {
    if (!$apps = redwood()->ssoAppsGet()) {
      throw new \Exception("Failed to load SSO apps from Redwood API");
    }
    return $apps;
  });
}

/**
 * Given an app URL (the unique identifier), find the app, or return false
 * @param $url
 * @param bool $flush
 * @return bool|\Redwood\Models\SsoApp
 */
function redwood_get_sso_app_by_url($url, $flush = false)
{
  if ($apps = redwood_sso_apps($flush)) {
    foreach($apps as $app) {
      if ($app['url'] === $url) {
        return $app;
      }
    }
  }

  return false;
}

/**
 * Load an array of Offices
 * @param bool $flush
 * @return array|null
 */
function redwood_offices($flush = false) : ?array
{
  $cacheKey = 'redwood_offices';

  if ($flush) {
    cache_forget($cacheKey);
  }

  return cache_remember($cacheKey, 5, function() {
    if (!$offices = redwood()->officesGet()) {
      throw new \Exception("Failed to load offices from Redwood API");
    }
    return $offices;
  });
}

/**
 * Load an array of Roles
 * @param bool $flush
 * @return array|null
 */
function redwood_roles($flush = false) : ?array
{
  $cacheKey = 'redwood_roles';

  if ($flush) {
    cache_forget($cacheKey);
  }

  return cache_remember($cacheKey, 5, function() {
    if (!$roles = redwood()->rolesGet()) {
      throw new \Exception("Failed to load roles from Redwood API");
    }
    return $roles;
  });
}

/**
 * Load a Guide
 * @param $connection
 * @param $id
 * @return \Redwood\Models\Guide
 * @throws \Redwood\ApiException
 */
function redwood_get_guide_by_connection($connection, $id, $flush = false)
{
  $cacheKey = sprintf('redwood_guide_%s_%s', $connection, $id);

  if ($flush) {
    cache_forget($cacheKey);
  }

  return cache_remember($cacheKey, 5, function() use ($connection, $id) {
    if (!$guide = redwood()->supportConnectionGuideIdGet($connection, $id)) {
      throw new \Exception("Couldn't load Guide [{$connection}:{$id}].");
    }
    return $guide;
  });
}

/**
 * @param WP_User|string|integer|null $user
 * @param string|'id' $field
 * @param bool $flush
 * @return \Redwood\Models\User
 * @throws \Redwood\ApiException
 */
function redwood_get_user($user = null, $field = 'id', $flush = false)
{
  if (is_null($user)) {
    if (!is_user_logged_in()) {
      return false;
    }
    $user = wp_get_current_user()->user_login;
    $field = 'email';
  } else if (is_object($user)) {
    $user = $user->user_login;
    $field = 'email';
  }

  $cacheKey = sprintf('redwood_get_user_%s_%s', $field, $user);

  if ($flush) {
    cache_forget($cacheKey);
  }

  return cache_remember($cacheKey, 1, function() use ($user, $field) {
    return redwood()->usersRefGet($user, $field);
  });
}

/**
 * @param $connection
 * @param $ref
 * @param string $field
 * @param bool $flush
 * @return \Redwood\Models\Listing
 * @throws \Redwood\ApiException
 */
function redwood_get_listing_by_mls($connection, $ref, $field = 'mls_id', $flush = false)
{
  $cacheKey = sprintf('redwood_listing_%s_%s_%s', $connection, $ref, $field);

  if ($flush) {
    cache_forget($cacheKey);
  }

  return cache_remember($cacheKey, 30, function() use ($connection, $ref, $field) {
    return redwood()->listingsConnectionRefGet($connection, $ref, $field);
  });
}

/**
 * This function should be called to ensure that a Contact record
 * exists for the given email address.
 * @param $email
 * @param $source
 * @param array $data
 * @return \Redwood\Models\Contact
 * @throws InvalidArgumentException If the given email is invalid
 * @throws \Redwood\ApiException On request failure
 */
function redwood_create_contact($email, $source, array $data = [])
{
  if (!$email = filter_var($email, FILTER_VALIDATE_EMAIL)) {
    throw new \InvalidArgumentException("The email address given is invalid");
  }
  if (!$source = trim($source)) {
    throw new \InvalidArgumentException("The source argument is required");
  }

  return redwood()->contactsPost(
    (object) array_merge(
      $data,
      [
        'email' => $email,
        'source' => $source,
      ]
    )
  );
}


if (function_exists('add_action')) {

  /**
   * If the user exists in accessRedwood, determine which Role
   * the user should have in this WordPress install.
   * @param $user_id
   */
  $redwoodSetUserRole = function ($user_id) {
    $user = get_user_by('ID', $user_id);

    $currentRole = !empty($user->roles[0]) ? $user->roles[0] : null;

    try {
      $remote = redwood_get_user($user->user_login, 'email', true);
    } catch (\Redwood\ApiException $e) {
      if ($e->getCode() === 404) {
        // user doesn't exist
      } else {
        throw $e;
      }
    }

    if ($remote) {
      $roleShouldBe = $currentRole ?: 'subscriber';

      $remoteRoles = array_map(function ($role) {
        return $role->getName();
      }, $remote->getRoles());

      if (in_array('administrator', $remoteRoles) || in_array('company-owner', $remoteRoles)) {
        $roleShouldBe = 'administrator';
      }

      $roleShouldBe = apply_filters('redwood_set_user_role', $roleShouldBe, $remoteRoles, $remote, $user, $user_id);

      if ($currentRole !== $roleShouldBe && !empty($roleShouldBe)) {
        $user->set_role($roleShouldBe);
      }
    }
  };

  add_action('profile_update', $redwoodSetUserRole);
  add_action('user_register', $redwoodSetUserRole);

}