# PHP Soundcloud API SDK

A PHP SDK for the Soundcloud API, built on [Saloon](https://github.com/saloonphp/saloon).

## Installation

```bash
composer require janyksteenbeek/soundcloud
```

## Basic Usage

```php
use Janyk\Soundcloud\Soundcloud;
use Saloon\Http\Auth\TokenAuthenticator;
use Saloon\Http\Auth\QueryAuthenticator;

// Create a new Soundcloud client
$client = new Soundcloud();

// Authenticate with OAuth token (for API endpoints requiring user authentication)
$client->authenticate(new TokenAuthenticator('YOUR_ACCESS_TOKEN'));

// Or authenticate with client ID for endpoints that only require API key
// $client->authenticate(new QueryAuthenticator('client_id', 'YOUR_CLIENT_ID'));

// Get information about the authenticated user (requires OAuth authentication)
$me = $client->me()->getMyProfile();

// Get a track by ID (can work with just client ID authentication)
$track = $client->tracks()->getTrack(123456789, null);

// Search for tracks
$searchResults = $client->search()->tracks('query', null, null, 10, null, true);

// Get user likes (requires OAuth authentication)
$likes = $client->likes()->getMyLikes(10, true);

// Get a user's public profile (can work with just client ID)
$user = $client->users()->getUser(123456789);
```

## Internal Mode

Soundcloud has an alternative API endpoint that allows more functionality with just a client ID. The SDK provides a simple way to enable this "internal" mode:

```php
use Janyk\Soundcloud\Soundcloud;

$client = new Soundcloud();

// Enable internal mode with your client ID
// This automatically sets the base URL to api-v2.soundcloud.com and authenticates with your client ID
$client->enableInternalMode('YOUR_CLIENT_ID');

// Now you can access endpoints that would normally require OAuth with just your client ID
$track = $client->tracks()->getTrack(123456789, null);

// Check if internal mode is enabled
if ($client->isInternalModeEnabled()) {
    // do something specific to internal mode
}

// You can disable internal mode if needed
$client->disableInternalMode();
```

When internal mode is enabled:
- The base URL changes to `api-v2.soundcloud.com`
- The client automatically uses Query Authentication with your client ID
- Some endpoints that normally require OAuth authentication become accessible with just the client ID

This is useful for building applications that need to access certain Soundcloud features without requiring user authentication.

## Authentication

### OAuth Authentication

The Soundcloud API uses OAuth 2.0 for authentication. This SDK provides methods to handle the OAuth flow.

#### Authorization Flow

```php
use Janyk\Soundcloud\Soundcloud;
use Saloon\Http\Auth\TokenAuthenticator;

// Step 1: Create a client for authorization
$soundcloud = new Soundcloud();

// Step 2: Get the authorization URL to redirect the user
$clientId = 'YOUR_CLIENT_ID';
$redirectUri = 'YOUR_REDIRECT_URI';
$responseType = 'code';
$state = bin2hex(random_bytes(16)); // Generate a random state for CSRF protection

// Store the state in the session for validation later
$_SESSION['oauth_state'] = $state;

// Get the authorization URL
$response = $soundcloud->oauth()->deprecatedUseSecureConnect(
    $clientId, 
    $redirectUri, 
    $responseType, 
    $state
);

// Redirect the user to the authorization URL
// This is normally done with a proper redirect in your framework
$authUrl = $response->body();
// header('Location: ' . $authUrl);
```

#### Token Exchange and Using the API with Authentication

```php
use Janyk\Soundcloud\Soundcloud;
use Saloon\Http\Auth\TokenAuthenticator;

// Step 3: After the user is redirected back to your app
// Exchange the authorization code for an access token
// This would typically be done in a separate callback route

// Verify state parameter to prevent CSRF attacks
if ($_GET['state'] !== $_SESSION['oauth_state']) {
    die('Invalid state parameter');
}

// The code will be in the query parameters after redirect
$code = $_GET['code'];

// Exchange code for token (this would be implemented by you using the token endpoint)
// $tokenResponse = $yourHttpClient->post('https://api.soundcloud.com/oauth2/token', [
//     'client_id' => 'YOUR_CLIENT_ID',
//     'client_secret' => 'YOUR_CLIENT_SECRET',
//     'grant_type' => 'authorization_code',
//     'code' => $code,
//     'redirect_uri' => 'YOUR_REDIRECT_URI'
// ]);
// $accessToken = $tokenResponse->json()['access_token'];

// For demonstration purposes only:
$accessToken = 'YOUR_ACCESS_TOKEN';

// Step 4: Create a new authenticated client
$soundcloud = new Soundcloud();
$soundcloud->authenticate(new TokenAuthenticator($accessToken));

// Now you can make authenticated requests
$myProfile = $soundcloud->me()->getMyProfile();
$myPlaylists = $soundcloud->me()->getMyPlaylists(10, true);
```

### Simple API Key Authentication

For some endpoints, you can use just the client ID as an API key:

```php
use Janyk\Soundcloud\Soundcloud;
use Saloon\Http\Auth\QueryAuthenticator;

// Create client with API key auth
$soundcloud = new Soundcloud();
$soundcloud->authenticate(new QueryAuthenticator('client_id', 'YOUR_CLIENT_ID'));

// Now you can make requests that only require client_id
$track = $soundcloud->tracks()->getTrack(123456789, null);
```

## Available Resources

The SDK provides access to the following Soundcloud API resources:

### Tracks

Access and manage tracks on Soundcloud:

```php
// Get a track
$track = $client->tracks()->getTrack($trackId, $secretToken);

// Upload a track
$response = $client->tracks()->uploadTrack();

// Update a track
$response = $client->tracks()->updateTrack($trackId);

// Delete a track
$response = $client->tracks()->deleteTrack($trackId);

// Get track comments
$comments = $client->tracks()->getTrackComments($trackId, $limit, $offset, $linkedPartitioning);

// Create a comment on a track
$response = $client->tracks()->createComment($trackId);

// Get track favoriters
$favoriters = $client->tracks()->trackFavoriters($trackId, $limit, $linkedPartitioning);

// Get track reposters
$reposters = $client->tracks()->trackReposters($trackId, $limit);

// Get track streams
$streams = $client->tracks()->trackStreams($trackId, $secretToken);

// Get related tracks
$related = $client->tracks()->relatedTracks($trackId, $access, $limit, $offset, $linkedPartitioning);
```

### Users

Access and manage user information:

```php
// Get a user by ID
$user = $client->users()->getUser($userId);

// Get user playlists
$playlists = $client->users()->getUserPlaylists($userId, $limit, $linkedPartitioning);

// Get user tracks
$tracks = $client->users()->getUserTracks($userId, $limit, $linkedPartitioning);

// Get user followers
$followers = $client->users()->getUserFollowers($userId, $limit, $linkedPartitioning);

// Get users followed by a user
$followings = $client->users()->getUserFollowings($userId, $limit, $linkedPartitioning);
```

### Playlists

Access and manage playlists:

```php
// Get a playlist
$playlist = $client->playlists()->getPlaylist($playlistId, $secretToken);

// Get playlist tracks
$tracks = $client->playlists()->getPlaylistTracks($playlistId, $secretToken);
```

### Me (Current User)

Access and manage the authenticated user's information:

```php
// Get current user's profile
$profile = $client->me()->getMyProfile();

// Get current user's playlists
$playlists = $client->me()->getMyPlaylists($limit, $linkedPartitioning);

// Get current user's tracks
$tracks = $client->me()->getMyTracks($limit, $linkedPartitioning);

// Get current user's followers
$followers = $client->me()->getMyFollowers($limit, $linkedPartitioning);

// Get users followed by current user
$followings = $client->me()->getMyFollowings($limit, $linkedPartitioning);
```

### Search

Search for resources on Soundcloud:

```php
// Search for tracks
$tracks = $client->search()->tracks($query, $tags, $genres, $limit, $offset, $linkedPartitioning);

// Search for playlists
$playlists = $client->search()->playlists($query, $limit, $offset, $linkedPartitioning);

// Search for users
$users = $client->search()->users($query, $limit, $offset, $linkedPartitioning);
```

### Likes

Access and manage likes:

```php
// Get user likes
$likes = $client->likes()->getUserLikes($userId, $limit, $linkedPartitioning);

// Get current user's likes
$likes = $client->likes()->getMyLikes($limit, $linkedPartitioning);
```

### Reposts

Access and manage reposts:

```php
// Get user reposts
$reposts = $client->reposts()->getUserReposts($userId, $limit, $linkedPartitioning);

// Get current user's reposts
$reposts = $client->reposts()->getMyReposts($limit, $linkedPartitioning);
```

### OAuth

Handle OAuth authentication:

```php
// Get OAuth token
$token = $client->oauth()->getToken();
```

## License

This package is open-sourced software licensed under the MIT license. 