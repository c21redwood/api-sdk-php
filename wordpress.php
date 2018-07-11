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
 * @return \Redwood\Client\DefaultApi
 */
function redwood() : Redwood\Client\DefaultApi
{
  static $api;

  if (empty($api)) {
    $config = Redwood\Configuration::getDefaultConfiguration()
      ->setHost(env('REDWOOD_API_HOST'))
      ->setAccessToken(redwood_api_access_token());

    $api = new Redwood\Client\DefaultApi(
      new GuzzleHttp\Client([
        'verify' => false,
      ]),
      $config
    );
  }

  return $api;
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