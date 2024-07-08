<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>MYPELTAR API</title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.style.css") }}" media="screen">
    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.print.css") }}" media="print">

    <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.10/lodash.min.js"></script>

    <link rel="stylesheet"
          href="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/styles/obsidian.min.css">
    <script src="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/highlight.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jets/0.14.1/jets.min.js"></script>

    <style id="language-style">
        /* starts out as display none and is replaced with js later  */
                    body .content .bash-example code { display: none; }
                    body .content .javascript-example code { display: none; }
                    body .content .php-example code { display: none; }
                    body .content .python-example code { display: none; }
            </style>

    <script>
        var tryItOutBaseUrl = "http://mypeltar";
        var useCsrf = Boolean(1);
        var csrfUrl = "/sanctum/csrf-cookie";
    </script>
    <script src="{{ asset("/vendor/scribe/js/tryitout-4.19.1.js") }}"></script>

    <script src="{{ asset("/vendor/scribe/js/theme-default-4.19.1.js") }}"></script>

</head>

<body data-languages="[&quot;bash&quot;,&quot;javascript&quot;,&quot;php&quot;,&quot;python&quot;]">

<a href="#" id="nav-button">
    <span>
        MENU
        <img src="{{ asset("/vendor/scribe/images/navbar.png") }}" alt="navbar-image"/>
    </span>
</a>
<div class="tocify-wrapper">
            <img src="1" alt="logo" class="logo" style="padding-top: 10px;" width="100%"/>
    
            <div class="lang-selector">
                                            <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                            <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                                            <button type="button" class="lang-button" data-language-name="php">php</button>
                                            <button type="button" class="lang-button" data-language-name="python">python</button>
                    </div>
    
    <div class="search">
        <input type="text" class="search" id="input-search" placeholder="Search">
    </div>

    <div id="toc">
                    <ul id="tocify-header-introduction" class="tocify-header">
                <li class="tocify-item level-1" data-unique="introduction">
                    <a href="#introduction">Introduction</a>
                </li>
                            </ul>
                    <ul id="tocify-header-authenticating-requests" class="tocify-header">
                <li class="tocify-item level-1" data-unique="authenticating-requests">
                    <a href="#authenticating-requests">Authenticating requests</a>
                </li>
                            </ul>
                    <ul id="tocify-header-auth" class="tocify-header">
                <li class="tocify-item level-1" data-unique="auth">
                    <a href="#auth">AUTH</a>
                </li>
                                    <ul id="tocify-subheader-auth" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="auth-POSTapi-v1-auth-login">
                                <a href="#auth-POSTapi-v1-auth-login">Log in.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="auth-POSTapi-v1-auth-logout">
                                <a href="#auth-POSTapi-v1-auth-logout">Log out</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="auth-POSTapi-v1-auth-refresh">
                                <a href="#auth-POSTapi-v1-auth-refresh">Refresh</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="auth-GETapi-v1-auth-profile">
                                <a href="#auth-GETapi-v1-auth-profile">Profile</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-assets" class="tocify-header">
                <li class="tocify-item level-1" data-unique="assets">
                    <a href="#assets">Assets</a>
                </li>
                                    <ul id="tocify-subheader-assets" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="assets-GETapi-v1-asset-getall">
                                <a href="#assets-GETapi-v1-asset-getall">Get All Assets
Display a listing of the Assets.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="assets-GETapi-v1-asset-search">
                                <a href="#assets-GETapi-v1-asset-search">Search the specified Assets</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="assets-POSTapi-v1-asset-store">
                                <a href="#assets-POSTapi-v1-asset-store">Create an Assets
Store a newly created Assets.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="assets-GETapi-v1-asset-show--asset_id-">
                                <a href="#assets-GETapi-v1-asset-show--asset_id-">Get Assets by ID
Display the specified Assets.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="assets-POSTapi-v1-asset-update--asset_id-">
                                <a href="#assets-POSTapi-v1-asset-update--asset_id-">Update Assets
Update the specified Assets.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="assets-POSTapi-v1-asset-destroy--asset_id-">
                                <a href="#assets-POSTapi-v1-asset-destroy--asset_id-">Delete the specified Assets from storage.</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-category" class="tocify-header">
                <li class="tocify-item level-1" data-unique="category">
                    <a href="#category">Category</a>
                </li>
                                    <ul id="tocify-subheader-category" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="category-GETapi-v1-category-getall">
                                <a href="#category-GETapi-v1-category-getall">Display a listing of the resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="category-POSTapi-v1-category-store">
                                <a href="#category-POSTapi-v1-category-store">Store a newly created resource in storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="category-GETapi-v1-category-show--category_id-">
                                <a href="#category-GETapi-v1-category-show--category_id-">Display the specified resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="category-GETapi-v1-category-search">
                                <a href="#category-GETapi-v1-category-search">GET api/v1/category/search</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="category-POSTapi-v1-category-update--category_id-">
                                <a href="#category-POSTapi-v1-category-update--category_id-">Update the specified resource in storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="category-POSTapi-v1-category-destroy--category_id-">
                                <a href="#category-POSTapi-v1-category-destroy--category_id-">Remove the specified resource from storage.</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-client" class="tocify-header">
                <li class="tocify-item level-1" data-unique="client">
                    <a href="#client">Client</a>
                </li>
                                    <ul id="tocify-subheader-client" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="client-GETapi-v1-client-getall">
                                <a href="#client-GETapi-v1-client-getall">Get All Client
Display a listing of the Client</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="client-GETapi-v1-client--client_uuid-">
                                <a href="#client-GETapi-v1-client--client_uuid-">GET api/v1/client/{client_uuid}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="client-POSTapi-v1-client-store">
                                <a href="#client-POSTapi-v1-client-store">POST api/v1/client/store</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-location" class="tocify-header">
                <li class="tocify-item level-1" data-unique="location">
                    <a href="#location">Location</a>
                </li>
                                    <ul id="tocify-subheader-location" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="location-GETapi-v1-location-getall">
                                <a href="#location-GETapi-v1-location-getall">Display a listing of the resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="location-POSTapi-v1-location-store">
                                <a href="#location-POSTapi-v1-location-store">Store a newly created resource in storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="location-GETapi-v1-location-show--location_id-">
                                <a href="#location-GETapi-v1-location-show--location_id-">Display the specified resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="location-POSTapi-v1-location-update--location_id-">
                                <a href="#location-POSTapi-v1-location-update--location_id-">Update the specified resource in storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="location-POSTapi-v1-location-destroy--location_id-">
                                <a href="#location-POSTapi-v1-location-destroy--location_id-">Remove the specified resource from storage.</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-maintenance" class="tocify-header">
                <li class="tocify-item level-1" data-unique="maintenance">
                    <a href="#maintenance">Maintenance</a>
                </li>
                                    <ul id="tocify-subheader-maintenance" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="maintenance-GETapi-v1-maintenance-getall">
                                <a href="#maintenance-GETapi-v1-maintenance-getall">Display a listing of the resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="maintenance-GETapi-v1-maintenance-maintenance_aplly--maintenance_id-">
                                <a href="#maintenance-GETapi-v1-maintenance-maintenance_aplly--maintenance_id-">GET api/v1/maintenance/maintenance_aplly/{maintenance_id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="maintenance-GETapi-v1-maintenance-self_get">
                                <a href="#maintenance-GETapi-v1-maintenance-self_get">Display a listing of the resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="maintenance-GETapi-v1-maintenance-show--maintenance_id-">
                                <a href="#maintenance-GETapi-v1-maintenance-show--maintenance_id-">Display the specified resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="maintenance-POSTapi-v1-maintenance-destroy--maintenance_id-">
                                <a href="#maintenance-POSTapi-v1-maintenance-destroy--maintenance_id-">Remove the specified resource from storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="maintenance-POSTapi-v1-maintenance--maintenance--history-update--pupdate-">
                                <a href="#maintenance-POSTapi-v1-maintenance--maintenance--history-update--pupdate-">Update the specified resource in storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="maintenance-POSTapi-v1-maintenance--maintenance--history-show--pupdate-">
                                <a href="#maintenance-POSTapi-v1-maintenance--maintenance--history-show--pupdate-">Update the specified resource in storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="maintenance-POSTapi-v1-maintenance--maintenance--history-store">
                                <a href="#maintenance-POSTapi-v1-maintenance--maintenance--history-store">Update the specified resource in storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="maintenance-POSTapi-v1-maintenance--maintenance--history-destroy--pupdate-">
                                <a href="#maintenance-POSTapi-v1-maintenance--maintenance--history-destroy--pupdate-">Update the specified resource in storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="maintenance-POSTapi-v1-inspeksi-store">
                                <a href="#maintenance-POSTapi-v1-inspeksi-store">POST api/v1/inspeksi/store</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="maintenance-POSTapi-v1-inspeksi-update--maintenance-">
                                <a href="#maintenance-POSTapi-v1-inspeksi-update--maintenance-">POST api/v1/inspeksi/update/{maintenance}</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-news" class="tocify-header">
                <li class="tocify-item level-1" data-unique="news">
                    <a href="#news">News</a>
                </li>
                                    <ul id="tocify-subheader-news" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="news-GETapi-v1-news-getall">
                                <a href="#news-GETapi-v1-news-getall">Display a listing of the resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="news-POSTapi-v1-news-store">
                                <a href="#news-POSTapi-v1-news-store">Store a newly created resource in storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="news-GETapi-v1-news-show--news_id-">
                                <a href="#news-GETapi-v1-news-show--news_id-">Display the specified resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="news-POSTapi-v1-news-update--news_id-">
                                <a href="#news-POSTapi-v1-news-update--news_id-">Update the specified resource in storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="news-POSTapi-v1-news-destroy--news_id-">
                                <a href="#news-POSTapi-v1-news-destroy--news_id-">Remove the specified resource from storage.</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-role" class="tocify-header">
                <li class="tocify-item level-1" data-unique="role">
                    <a href="#role">Role</a>
                </li>
                                    <ul id="tocify-subheader-role" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="role-GETapi-v1-role-getall">
                                <a href="#role-GETapi-v1-role-getall">Display a listing of the resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="role-GETapi-v1-role-show--role_id-">
                                <a href="#role-GETapi-v1-role-show--role_id-">Display the specified resource.</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-satuan-kerja" class="tocify-header">
                <li class="tocify-item level-1" data-unique="satuan-kerja">
                    <a href="#satuan-kerja">Satuan Kerja</a>
                </li>
                                    <ul id="tocify-subheader-satuan-kerja" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="satuan-kerja-GETapi-v1-satker-getall">
                                <a href="#satuan-kerja-GETapi-v1-satker-getall">Display a listing of the resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="satuan-kerja-POSTapi-v1-satker-store">
                                <a href="#satuan-kerja-POSTapi-v1-satker-store">Store a newly created resource in storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="satuan-kerja-GETapi-v1-satker-show--satker_id-">
                                <a href="#satuan-kerja-GETapi-v1-satker-show--satker_id-">Display the specified resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="satuan-kerja-POSTapi-v1-satker-update--satker_id-">
                                <a href="#satuan-kerja-POSTapi-v1-satker-update--satker_id-">Update the specified resource in storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="satuan-kerja-POSTapi-v1-satker-destroy--satker_id-">
                                <a href="#satuan-kerja-POSTapi-v1-satker-destroy--satker_id-">Remove the specified resource from storage.</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-status" class="tocify-header">
                <li class="tocify-item level-1" data-unique="status">
                    <a href="#status">Status</a>
                </li>
                                    <ul id="tocify-subheader-status" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="status-GETapi-v1-statusa-getall">
                                <a href="#status-GETapi-v1-statusa-getall">Display a listing of the resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="status-POSTapi-v1-statusa-store">
                                <a href="#status-POSTapi-v1-statusa-store">Store a newly created resource in storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="status-GETapi-v1-statusa-show--statusassets-">
                                <a href="#status-GETapi-v1-statusa-show--statusassets-">Display the specified resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="status-POSTapi-v1-statusa-update--statusassets-">
                                <a href="#status-POSTapi-v1-statusa-update--statusassets-">Update the specified resource in storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="status-POSTapi-v1-statusa-destroy--statusassets-">
                                <a href="#status-POSTapi-v1-statusa-destroy--statusassets-">Remove the specified resource from storage.</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-sub-satuan-kerja" class="tocify-header">
                <li class="tocify-item level-1" data-unique="sub-satuan-kerja">
                    <a href="#sub-satuan-kerja">Sub Satuan Kerja</a>
                </li>
                                    <ul id="tocify-subheader-sub-satuan-kerja" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="sub-satuan-kerja-GETapi-v1-subsatker-getall">
                                <a href="#sub-satuan-kerja-GETapi-v1-subsatker-getall">Display a listing of the resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="sub-satuan-kerja-POSTapi-v1-subsatker-store">
                                <a href="#sub-satuan-kerja-POSTapi-v1-subsatker-store">Store a newly created resource in storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="sub-satuan-kerja-GETapi-v1-subsatker-show--subsatker_id-">
                                <a href="#sub-satuan-kerja-GETapi-v1-subsatker-show--subsatker_id-">Display the specified resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="sub-satuan-kerja-POSTapi-v1-subsatker-update--subsatker_id-">
                                <a href="#sub-satuan-kerja-POSTapi-v1-subsatker-update--subsatker_id-">Update the specified resource in storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="sub-satuan-kerja-POSTapi-v1-subsatker-destroy--subsatker_id-">
                                <a href="#sub-satuan-kerja-POSTapi-v1-subsatker-destroy--subsatker_id-">Remove the specified resource from storage.</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-users" class="tocify-header">
                <li class="tocify-item level-1" data-unique="users">
                    <a href="#users">Users</a>
                </li>
                                    <ul id="tocify-subheader-users" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="users-GETapi-v1-user-getall">
                                <a href="#users-GETapi-v1-user-getall">GET api/v1/user/getall</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="users-GETapi-v1-user-search">
                                <a href="#users-GETapi-v1-user-search">GET api/v1/user/search</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="users-POSTapi-v1-user-store">
                                <a href="#users-POSTapi-v1-user-store">Store a newly created resource in storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="users-GETapi-v1-user-show--user_uuid-">
                                <a href="#users-GETapi-v1-user-show--user_uuid-">Display the specified resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="users-POSTapi-v1-user-destroy--user_uuid-">
                                <a href="#users-POSTapi-v1-user-destroy--user_uuid-">Remove the specified resource from storage.</a>
                            </li>
                                                                        </ul>
                            </ul>
            </div>

    <ul class="toc-footer" id="toc-footer">
                    <li style="padding-bottom: 5px;"><a href="{{ route("scribe.postman") }}">View Postman collection</a></li>
                        <li><a href="http://github.com/knuckleswtf/scribe">Documentation powered by Scribe ✍</a></li>
    </ul>

    <ul class="toc-footer" id="last-updated">
        <li>Last updated: July 5, 2024</li>
    </ul>
</div>

<div class="page-wrapper">
    <div class="dark-box"></div>
    <div class="content">
        <h1 id="introduction">Introduction</h1>
<aside>
    <strong>Base URL</strong>: <code>https://myapi.peltar.id</code>
</aside>
<p>This documentation aims to provide all the information you need to work with our API.</p>
<aside>As you scroll, you'll see code examples for working with the API in different programming languages in the dark area to the right (or as part of the content on mobile).
You can switch the language used with the tabs at the top right (or from the nav menu at the top left on mobile).</aside>

        <h1 id="authenticating-requests">Authenticating requests</h1>
<p>To authenticate requests, include a <strong><code>MYP_API_KEY</code></strong> header with the value <strong><code>"{YOUR_AUTH_KEY}"</code></strong>.</p>
<p>All authenticated endpoints are marked with a <code>requires authentication</code> badge in the documentation below.</p>
<p>You can retrieve your token by visiting your dashboard and clicking <b>Generate API token</b>.</p>

        <h1 id="auth">AUTH</h1>

    

                                <h2 id="auth-POSTapi-v1-auth-login">Log in.</h2>

<p>
</p>



<span id="example-requests-POSTapi-v1-auth-login">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://myapi.peltar.id/api/v1/auth/login" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "MYP-API-KEY: {YOUR_API_KEY}" \
    --data "{
    \"username\": \"username\",
    \"password\": \"secret\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://myapi.peltar.id/api/v1/auth/login"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "MYP-API-KEY": "{YOUR_API_KEY}",
};

let body = {
    "username": "username",
    "password": "secret"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'https://myapi.peltar.id/api/v1/auth/login',
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'MYP-API-KEY' =&gt; '{YOUR_API_KEY}',
        ],
        'json' =&gt; [
            'username' =&gt; 'username',
            'password' =&gt; 'secret',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'https://myapi.peltar.id/api/v1/auth/login'
payload = {
    "username": "username",
    "password": "secret"
}
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'MYP-API-KEY': '{YOUR_API_KEY}'
}

response = requests.request('POST', url, headers=headers, json=payload)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-auth-login">
            <blockquote>
            <p>Example response (200, Ok):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
     &quot;status&quot; : &quot;success&quot;,
     &quot;user&quot; : `User Object` ,
     &quot;authorisation&quot; : {
         &quot;token&quot; : &quot;eyJ0eXAiO . . .&quot;,
         &quot;type&quot; : &quot;bearer&quot; }
}</code>
 </pre>
            <blockquote>
            <p>Example response (422, Unprocessable Content):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: &quot;fails&quot;,
    &quot;message&quot;: &quot;Wrong Username&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-v1-auth-login" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-auth-login"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-auth-login"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-auth-login" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-auth-login">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-auth-login" data-method="POST"
      data-path="api/v1/auth/login"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-auth-login', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-auth-login"
                    onclick="tryItOut('POSTapi-v1-auth-login');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-auth-login"
                    onclick="cancelTryOut('POSTapi-v1-auth-login');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-auth-login"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/auth/login</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Content-Type"                data-endpoint="POSTapi-v1-auth-login"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Accept"                data-endpoint="POSTapi-v1-auth-login"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>MYP-API-KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="MYP-API-KEY"                data-endpoint="POSTapi-v1-auth-login"
               value="{YOUR_API_KEY}"
               data-component="header">
    <br>
<p>Example: <code>{YOUR_API_KEY}</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>username</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="username"                data-endpoint="POSTapi-v1-auth-login"
               value="username"
               data-component="body">
    <br>
<p>The username of the  user. Example: <code>username</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="password"                data-endpoint="POSTapi-v1-auth-login"
               value="secret"
               data-component="body">
    <br>
<p>The password of the  user. Example: <code>secret</code></p>
        </div>
        </form>

    <h3>Response</h3>
    <h4 class="fancy-heading-panel"><b>Response Fields</b></h4>
    <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>username</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
<br>
<p>The username of this User must be <code>string</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>password</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
<br>
<p>The password of this User must be <code>string</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
<br>
<p>Map of each request their status (<code>success</code> or <code>fails</code>).</p>
        </div>
                        <h2 id="auth-POSTapi-v1-auth-logout">Log out</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Log out the user and delete the token.</p>

<span id="example-requests-POSTapi-v1-auth-logout">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://myapi.peltar.id/api/v1/auth/logout" \
    --header "MYP_API_KEY: {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "MYP-API-KEY: {YOUR_API_KEY}"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://myapi.peltar.id/api/v1/auth/logout"
);

const headers = {
    "MYP_API_KEY": "{YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "MYP-API-KEY": "{YOUR_API_KEY}",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'https://myapi.peltar.id/api/v1/auth/logout',
    [
        'headers' =&gt; [
            'MYP_API_KEY' =&gt; '{YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'MYP-API-KEY' =&gt; '{YOUR_API_KEY}',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'https://myapi.peltar.id/api/v1/auth/logout'
headers = {
  'MYP_API_KEY': '{YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'MYP-API-KEY': '{YOUR_API_KEY}'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-auth-logout">
            <blockquote>
            <p>Example response (200, Ok):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: &quot;success&quot;,
    &quot;message&quot;: &quot;Successfully logged out&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-v1-auth-logout" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-auth-logout"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-auth-logout"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-auth-logout" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-auth-logout">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-auth-logout" data-method="POST"
      data-path="api/v1/auth/logout"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-auth-logout', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-auth-logout"
                    onclick="tryItOut('POSTapi-v1-auth-logout');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-auth-logout"
                    onclick="cancelTryOut('POSTapi-v1-auth-logout');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-auth-logout"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/auth/logout</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>MYP_API_KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="MYP_API_KEY" class="auth-value"               data-endpoint="POSTapi-v1-auth-logout"
               value="{YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>{YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Content-Type"                data-endpoint="POSTapi-v1-auth-logout"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Accept"                data-endpoint="POSTapi-v1-auth-logout"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>MYP-API-KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="MYP-API-KEY"                data-endpoint="POSTapi-v1-auth-logout"
               value="{YOUR_API_KEY}"
               data-component="header">
    <br>
<p>Example: <code>{YOUR_API_KEY}</code></p>
            </div>
                        </form>

                    <h2 id="auth-POSTapi-v1-auth-refresh">Refresh</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-v1-auth-refresh">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://myapi.peltar.id/api/v1/auth/refresh" \
    --header "MYP_API_KEY: {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "MYP-API-KEY: {YOUR_API_KEY}"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://myapi.peltar.id/api/v1/auth/refresh"
);

const headers = {
    "MYP_API_KEY": "{YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "MYP-API-KEY": "{YOUR_API_KEY}",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'https://myapi.peltar.id/api/v1/auth/refresh',
    [
        'headers' =&gt; [
            'MYP_API_KEY' =&gt; '{YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'MYP-API-KEY' =&gt; '{YOUR_API_KEY}',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'https://myapi.peltar.id/api/v1/auth/refresh'
headers = {
  'MYP_API_KEY': '{YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'MYP-API-KEY': '{YOUR_API_KEY}'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-auth-refresh">
            <blockquote>
            <p>Example response (200, Ok):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
     &quot;status&quot; : &quot;success&quot;,
     &quot;user&quot; : `User Object` ,
     &quot;authorisation&quot; : {
         &quot;token&quot; : &quot;eyJ0eXAiO . . .&quot;,
         &quot;type&quot; : &quot;bearer&quot;
     },
     &quot;api-key&quot; : {
         &quot;api_key&quot; : &quot;c4ksKs . . .&quot;,
         &quot;expiration_date&quot; : &quot;2023-07-15 17:31:00&quot;
     }
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-v1-auth-refresh" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-auth-refresh"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-auth-refresh"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-auth-refresh" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-auth-refresh">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-auth-refresh" data-method="POST"
      data-path="api/v1/auth/refresh"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-auth-refresh', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-auth-refresh"
                    onclick="tryItOut('POSTapi-v1-auth-refresh');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-auth-refresh"
                    onclick="cancelTryOut('POSTapi-v1-auth-refresh');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-auth-refresh"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/auth/refresh</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>MYP_API_KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="MYP_API_KEY" class="auth-value"               data-endpoint="POSTapi-v1-auth-refresh"
               value="{YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>{YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Content-Type"                data-endpoint="POSTapi-v1-auth-refresh"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Accept"                data-endpoint="POSTapi-v1-auth-refresh"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>MYP-API-KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="MYP-API-KEY"                data-endpoint="POSTapi-v1-auth-refresh"
               value="{YOUR_API_KEY}"
               data-component="header">
    <br>
<p>Example: <code>{YOUR_API_KEY}</code></p>
            </div>
                        </form>

                    <h2 id="auth-GETapi-v1-auth-profile">Profile</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Give respons of profile the user.</p>

<span id="example-requests-GETapi-v1-auth-profile">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://myapi.peltar.id/api/v1/auth/profile" \
    --header "MYP_API_KEY: {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "MYP-API-KEY: {YOUR_API_KEY}"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://myapi.peltar.id/api/v1/auth/profile"
);

const headers = {
    "MYP_API_KEY": "{YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "MYP-API-KEY": "{YOUR_API_KEY}",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'https://myapi.peltar.id/api/v1/auth/profile',
    [
        'headers' =&gt; [
            'MYP_API_KEY' =&gt; '{YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'MYP-API-KEY' =&gt; '{YOUR_API_KEY}',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'https://myapi.peltar.id/api/v1/auth/profile'
headers = {
  'MYP_API_KEY': '{YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'MYP-API-KEY': '{YOUR_API_KEY}'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-auth-profile">
            <blockquote>
            <p>Example response (200, Ok):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: &quot;success&quot;,
    &quot;user&quot;: {
        &quot;nama&quot;: &quot;SomeUser&quot;,
        &quot;email&quot;: &quot;someuser@example.com&quot;,
        &quot;username&quot;: &quot;someuser&quot;,
        &quot;role&quot;: [
            &quot;someAdmin&quot;
        ],
        &quot;subsatker&quot;: &quot;IT&quot;,
        &quot;satker&quot;: &quot;Perawatan&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-auth-profile" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-auth-profile"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-auth-profile"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-auth-profile" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-auth-profile">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-auth-profile" data-method="GET"
      data-path="api/v1/auth/profile"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-auth-profile', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-auth-profile"
                    onclick="tryItOut('GETapi-v1-auth-profile');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-auth-profile"
                    onclick="cancelTryOut('GETapi-v1-auth-profile');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-auth-profile"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/auth/profile</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>MYP_API_KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="MYP_API_KEY" class="auth-value"               data-endpoint="GETapi-v1-auth-profile"
               value="{YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>{YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Content-Type"                data-endpoint="GETapi-v1-auth-profile"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Accept"                data-endpoint="GETapi-v1-auth-profile"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>MYP-API-KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="MYP-API-KEY"                data-endpoint="GETapi-v1-auth-profile"
               value="{YOUR_API_KEY}"
               data-component="header">
    <br>
<p>Example: <code>{YOUR_API_KEY}</code></p>
            </div>
                        </form>

                <h1 id="assets">Assets</h1>

    

                                <h2 id="assets-GETapi-v1-asset-getall">Get All Assets
Display a listing of the Assets.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-v1-asset-getall">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://myapi.peltar.id/api/v1/asset/getall?page=1&amp;limit=20" \
    --header "MYP_API_KEY: {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "MYP-API-KEY: {YOUR_API_KEY}"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://myapi.peltar.id/api/v1/asset/getall"
);

const params = {
    "page": "1",
    "limit": "20",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "MYP_API_KEY": "{YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "MYP-API-KEY": "{YOUR_API_KEY}",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'https://myapi.peltar.id/api/v1/asset/getall',
    [
        'headers' =&gt; [
            'MYP_API_KEY' =&gt; '{YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'MYP-API-KEY' =&gt; '{YOUR_API_KEY}',
        ],
        'query' =&gt; [
            'page' =&gt; '1',
            'limit' =&gt; '20',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'https://myapi.peltar.id/api/v1/asset/getall'
params = {
  'page': '1',
  'limit': '20',
}
headers = {
  'MYP_API_KEY': '{YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'MYP-API-KEY': '{YOUR_API_KEY}'
}

response = requests.request('GET', url, headers=headers, params=params)
response.json()</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-asset-getall">
            <blockquote>
            <p>Example response (200, Ok):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
  &quot;status&quot;: &quot;success&quot;,
  &quot;asset&quot;: [
    {
      &quot;id&quot;: 2,
      &quot;stockcode&quot;: &quot;26&quot;,
      &quot;code_asset&quot;: &quot;AST23060002&quot;,
      &quot;serialnumber&quot;: &quot;FAKESerial00002&quot;,
      &quot;nama_asset&quot;: &quot;Dr. Felipe Green&quot;,
      &quot;merk&quot;: &quot;Quos.&quot;,
      &quot;model&quot;: &quot;Perspiciatis nisi.&quot;,
      &quot;spesifikasi&quot;: &quot;Magnam est quis.&quot;,
      &quot;deskripsi&quot;: &quot;Dolores ipsam dignissimos.&quot;,
      &quot;lokasi&quot;: &quot;RCD2&quot;,
      &quot;kategori&quot;: [
        &quot;Pariatur.&quot;
      ],
      &quot;status&quot;: &quot;Pending&quot;,
      &quot;updated_at&quot;: &quot;2023-06-15T10:33:27.000000Z&quot;,
      &quot;created_at&quot;: &quot;2023-06-15T10:31:00.000000Z&quot;
    },
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-asset-getall" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-asset-getall"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-asset-getall"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-asset-getall" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-asset-getall">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-asset-getall" data-method="GET"
      data-path="api/v1/asset/getall"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-asset-getall', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-asset-getall"
                    onclick="tryItOut('GETapi-v1-asset-getall');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-asset-getall"
                    onclick="cancelTryOut('GETapi-v1-asset-getall');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-asset-getall"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/asset/getall</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>MYP_API_KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="MYP_API_KEY" class="auth-value"               data-endpoint="GETapi-v1-asset-getall"
               value="{YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>{YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Content-Type"                data-endpoint="GETapi-v1-asset-getall"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Accept"                data-endpoint="GETapi-v1-asset-getall"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>MYP-API-KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="MYP-API-KEY"                data-endpoint="GETapi-v1-asset-getall"
               value="{YOUR_API_KEY}"
               data-component="header">
    <br>
<p>Example: <code>{YOUR_API_KEY}</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>page</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               name="page"                data-endpoint="GETapi-v1-asset-getall"
               value="1"
               data-component="query">
    <br>
<p>The paginate of collection asset. Example: <code>1</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>limit</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               name="limit"                data-endpoint="GETapi-v1-asset-getall"
               value="20"
               data-component="query">
    <br>
<p>The count of collection asset per page. default <code>20</code> per page Example: <code>20</code></p>
            </div>
                </form>

                    <h2 id="assets-GETapi-v1-asset-search">Search the specified Assets</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>search a collection of data asset</p>

<span id="example-requests-GETapi-v1-asset-search">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://myapi.peltar.id/api/v1/asset/search?page=1&amp;limit=20&amp;name=Printer+Epsen+L310&amp;merk=Epsen&amp;model=Printer+%26+Scanner&amp;code_asset=AST0010&amp;stockcode=202015602&amp;serialnumber=hjk4h65...&amp;kategori=printer&amp;status=baik" \
    --header "MYP_API_KEY: {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "MYP-API-KEY: {YOUR_API_KEY}"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://myapi.peltar.id/api/v1/asset/search"
);

const params = {
    "page": "1",
    "limit": "20",
    "name": "Printer Epsen L310",
    "merk": "Epsen",
    "model": "Printer &amp; Scanner",
    "code_asset": "AST0010",
    "stockcode": "202015602",
    "serialnumber": "hjk4h65...",
    "kategori": "printer",
    "status": "baik",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "MYP_API_KEY": "{YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "MYP-API-KEY": "{YOUR_API_KEY}",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'https://myapi.peltar.id/api/v1/asset/search',
    [
        'headers' =&gt; [
            'MYP_API_KEY' =&gt; '{YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'MYP-API-KEY' =&gt; '{YOUR_API_KEY}',
        ],
        'query' =&gt; [
            'page' =&gt; '1',
            'limit' =&gt; '20',
            'name' =&gt; 'Printer Epsen L310',
            'merk' =&gt; 'Epsen',
            'model' =&gt; 'Printer &amp; Scanner',
            'code_asset' =&gt; 'AST0010',
            'stockcode' =&gt; '202015602',
            'serialnumber' =&gt; 'hjk4h65...',
            'kategori' =&gt; 'printer',
            'status' =&gt; 'baik',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'https://myapi.peltar.id/api/v1/asset/search'
params = {
  'page': '1',
  'limit': '20',
  'name': 'Printer Epsen L310',
  'merk': 'Epsen',
  'model': 'Printer &amp; Scanner',
  'code_asset': 'AST0010',
  'stockcode': '202015602',
  'serialnumber': 'hjk4h65...',
  'kategori': 'printer',
  'status': 'baik',
}
headers = {
  'MYP_API_KEY': '{YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'MYP-API-KEY': '{YOUR_API_KEY}'
}

response = requests.request('GET', url, headers=headers, params=params)
response.json()</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-asset-search">
            <blockquote>
            <p>Example response (200, Ok):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">[
    {
      &quot;id&quot;: 2,
      &quot;stockcode&quot;: &quot;26&quot;,
      &quot;code_asset&quot;: &quot;AST23060002&quot;,
      &quot;serialnumber&quot;: &quot;FAKESerial00002&quot;,
      &quot;nama_asset&quot;: &quot;Dr. Felipe Green&quot;,
      &quot;merk&quot;: &quot;Quos.&quot;,
      &quot;model&quot;: &quot;Perspiciatis nisi.&quot;,
      &quot;spesifikasi&quot;: &quot;Magnam est quis.&quot;,
      &quot;deskripsi&quot;: &quot;Dolores ipsam dignissimos.&quot;,
      &quot;lokasi&quot;: &quot;RCD2&quot;,
      &quot;kategori&quot;: [
        &quot;Pariatur.&quot;
      ],
      &quot;status&quot;: &quot;Pending&quot;,
      &quot;updated_at&quot;: &quot;2023-06-15T10:33:27.000000Z&quot;,
      &quot;created_at&quot;: &quot;2023-06-15T10:31:00.000000Z&quot;
    },
]</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-asset-search" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-asset-search"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-asset-search"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-asset-search" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-asset-search">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-asset-search" data-method="GET"
      data-path="api/v1/asset/search"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-asset-search', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-asset-search"
                    onclick="tryItOut('GETapi-v1-asset-search');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-asset-search"
                    onclick="cancelTryOut('GETapi-v1-asset-search');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-asset-search"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/asset/search</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>MYP_API_KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="MYP_API_KEY" class="auth-value"               data-endpoint="GETapi-v1-asset-search"
               value="{YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>{YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Content-Type"                data-endpoint="GETapi-v1-asset-search"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Accept"                data-endpoint="GETapi-v1-asset-search"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>MYP-API-KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="MYP-API-KEY"                data-endpoint="GETapi-v1-asset-search"
               value="{YOUR_API_KEY}"
               data-component="header">
    <br>
<p>Example: <code>{YOUR_API_KEY}</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>page</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               name="page"                data-endpoint="GETapi-v1-asset-search"
               value="1"
               data-component="query">
    <br>
<p>The paginate of collection asset. Example: <code>1</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>limit</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               name="limit"                data-endpoint="GETapi-v1-asset-search"
               value="20"
               data-component="query">
    <br>
<p>The count of collection asset per page. default <code>20</code> per page Example: <code>20</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
               name="name"                data-endpoint="GETapi-v1-asset-search"
               value="Printer Epsen L310"
               data-component="query">
    <br>
<p>The name of the  asset. Example: <code>Printer Epsen L310</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>merk</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="merk"                data-endpoint="GETapi-v1-asset-search"
               value="Epsen"
               data-component="query">
    <br>
<p>The merk of the user. Example: <code>Epsen</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>model</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="model"                data-endpoint="GETapi-v1-asset-search"
               value="Printer & Scanner"
               data-component="query">
    <br>
<p>The model of the user. Example: <code>Printer &amp; Scanner</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>code_asset</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="code_asset"                data-endpoint="GETapi-v1-asset-search"
               value="AST0010"
               data-component="query">
    <br>
<p>The code_asset of the user. Example: <code>AST0010</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>stockcode</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="stockcode"                data-endpoint="GETapi-v1-asset-search"
               value="202015602"
               data-component="query">
    <br>
<p>The stockcode of the user. Example: <code>202015602</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>serialnumber</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="serialnumber"                data-endpoint="GETapi-v1-asset-search"
               value="hjk4h65..."
               data-component="query">
    <br>
<p>The serialnumber of the user. Example: <code>hjk4h65...</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>kategori</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="kategori"                data-endpoint="GETapi-v1-asset-search"
               value="printer"
               data-component="query">
    <br>
<p>The kategori of the user. Example: <code>printer</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="status"                data-endpoint="GETapi-v1-asset-search"
               value="baik"
               data-component="query">
    <br>
<p>The status of the user. Example: <code>baik</code></p>
            </div>
                </form>

                    <h2 id="assets-POSTapi-v1-asset-store">Create an Assets
Store a newly created Assets.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-v1-asset-store">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://myapi.peltar.id/api/v1/asset/store" \
    --header "MYP_API_KEY: {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "MYP-API-KEY: {YOUR_API_KEY}" \
    --data "{
    \"stockcode\": \"consequatur\",
    \"serialnumber\": \"consequatur\",
    \"nama_asset\": \"mqeopfuudtdsufvyvddqamniihfqcoynlazghdtqtqxbajwbpilpmufinllwloauydlsmsjury\",
    \"merk\": \"consequatur\",
    \"model\": \"consequatur\",
    \"spesifikasi\": \"consequatur\",
    \"deskripsi\": \"consequatur\",
    \"id_lokasi\": 17,
    \"id_kategori\": \"consequatur\",
    \"id_status\": 17
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://myapi.peltar.id/api/v1/asset/store"
);

const headers = {
    "MYP_API_KEY": "{YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "MYP-API-KEY": "{YOUR_API_KEY}",
};

let body = {
    "stockcode": "consequatur",
    "serialnumber": "consequatur",
    "nama_asset": "mqeopfuudtdsufvyvddqamniihfqcoynlazghdtqtqxbajwbpilpmufinllwloauydlsmsjury",
    "merk": "consequatur",
    "model": "consequatur",
    "spesifikasi": "consequatur",
    "deskripsi": "consequatur",
    "id_lokasi": 17,
    "id_kategori": "consequatur",
    "id_status": 17
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'https://myapi.peltar.id/api/v1/asset/store',
    [
        'headers' =&gt; [
            'MYP_API_KEY' =&gt; '{YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'MYP-API-KEY' =&gt; '{YOUR_API_KEY}',
        ],
        'json' =&gt; [
            'stockcode' =&gt; 'consequatur',
            'serialnumber' =&gt; 'consequatur',
            'nama_asset' =&gt; 'mqeopfuudtdsufvyvddqamniihfqcoynlazghdtqtqxbajwbpilpmufinllwloauydlsmsjury',
            'merk' =&gt; 'consequatur',
            'model' =&gt; 'consequatur',
            'spesifikasi' =&gt; 'consequatur',
            'deskripsi' =&gt; 'consequatur',
            'id_lokasi' =&gt; 17,
            'id_kategori' =&gt; 'consequatur',
            'id_status' =&gt; 17,
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'https://myapi.peltar.id/api/v1/asset/store'
payload = {
    "stockcode": "consequatur",
    "serialnumber": "consequatur",
    "nama_asset": "mqeopfuudtdsufvyvddqamniihfqcoynlazghdtqtqxbajwbpilpmufinllwloauydlsmsjury",
    "merk": "consequatur",
    "model": "consequatur",
    "spesifikasi": "consequatur",
    "deskripsi": "consequatur",
    "id_lokasi": 17,
    "id_kategori": "consequatur",
    "id_status": 17
}
headers = {
  'MYP_API_KEY': '{YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'MYP-API-KEY': '{YOUR_API_KEY}'
}

response = requests.request('POST', url, headers=headers, json=payload)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-asset-store">
            <blockquote>
            <p>Example response (200, Ok):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
  &#039;status&#039; =&gt; &#039;success&#039;,
  &#039;message&#039; =&gt; &#039;Asset Berhasil Ditambahkan !&#039;
}</code>
 </pre>
            <blockquote>
            <p>Example response (422, Unprocessable Content):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;The given data was invalid.&quot;,
    &quot;errors&quot;: {
        &quot;stockcode&quot;: [
            &quot;The stockcode has already been taken.&quot;
        ],
        &quot;serialnumber&quot;: [
            &quot;The serialnumber has already been taken.&quot;
        ]
    }
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-v1-asset-store" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-asset-store"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-asset-store"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-asset-store" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-asset-store">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-asset-store" data-method="POST"
      data-path="api/v1/asset/store"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-asset-store', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-asset-store"
                    onclick="tryItOut('POSTapi-v1-asset-store');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-asset-store"
                    onclick="cancelTryOut('POSTapi-v1-asset-store');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-asset-store"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/asset/store</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>MYP_API_KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="MYP_API_KEY" class="auth-value"               data-endpoint="POSTapi-v1-asset-store"
               value="{YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>{YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Content-Type"                data-endpoint="POSTapi-v1-asset-store"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Accept"                data-endpoint="POSTapi-v1-asset-store"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>MYP-API-KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="MYP-API-KEY"                data-endpoint="POSTapi-v1-asset-store"
               value="{YOUR_API_KEY}"
               data-component="header">
    <br>
<p>Example: <code>{YOUR_API_KEY}</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>stockcode</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="stockcode"                data-endpoint="POSTapi-v1-asset-store"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>serialnumber</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="serialnumber"                data-endpoint="POSTapi-v1-asset-store"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>nama_asset</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
               name="nama_asset"                data-endpoint="POSTapi-v1-asset-store"
               value="mqeopfuudtdsufvyvddqamniihfqcoynlazghdtqtqxbajwbpilpmufinllwloauydlsmsjury"
               data-component="body">
    <br>
<p>Must be at least 6 characters. Example: <code>mqeopfuudtdsufvyvddqamniihfqcoynlazghdtqtqxbajwbpilpmufinllwloauydlsmsjury</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>merk</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="merk"                data-endpoint="POSTapi-v1-asset-store"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>model</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
               name="model"                data-endpoint="POSTapi-v1-asset-store"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>spesifikasi</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
               name="spesifikasi"                data-endpoint="POSTapi-v1-asset-store"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>deskripsi</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
               name="deskripsi"                data-endpoint="POSTapi-v1-asset-store"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>id_lokasi</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               name="id_lokasi"                data-endpoint="POSTapi-v1-asset-store"
               value="17"
               data-component="body">
    <br>
<p>Example: <code>17</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>id_kategori</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="id_kategori"                data-endpoint="POSTapi-v1-asset-store"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>id_status</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               name="id_status"                data-endpoint="POSTapi-v1-asset-store"
               value="17"
               data-component="body">
    <br>
<p>Example: <code>17</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>image</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
               name="image"                data-endpoint="POSTapi-v1-asset-store"
               value=""
               data-component="body">
    <br>

        </div>
        </form>

                    <h2 id="assets-GETapi-v1-asset-show--asset_id-">Get Assets by ID
Display the specified Assets.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-v1-asset-show--asset_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://myapi.peltar.id/api/v1/asset/show/1" \
    --header "MYP_API_KEY: {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "MYP-API-KEY: {YOUR_API_KEY}"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://myapi.peltar.id/api/v1/asset/show/1"
);

const headers = {
    "MYP_API_KEY": "{YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "MYP-API-KEY": "{YOUR_API_KEY}",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'https://myapi.peltar.id/api/v1/asset/show/1',
    [
        'headers' =&gt; [
            'MYP_API_KEY' =&gt; '{YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'MYP-API-KEY' =&gt; '{YOUR_API_KEY}',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'https://myapi.peltar.id/api/v1/asset/show/1'
headers = {
  'MYP_API_KEY': '{YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'MYP-API-KEY': '{YOUR_API_KEY}'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-asset-show--asset_id-">
            <blockquote>
            <p>Example response (200, Ok):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;id&quot;: 4,
        &quot;stockcode&quot;: &quot;178&quot;,
        &quot;code_asset&quot;: &quot;AST23060004&quot;,
        &quot;serialnumber&quot;: &quot;FAKESerial00004&quot;,
        &quot;nama_asset&quot;: &quot;Ben Carter&quot;,
        &quot;merk&quot;: &quot;Ut molestiae eveniet alias.&quot;,
        &quot;model&quot;: &quot;Explicabo earum quibusdam.&quot;,
        &quot;spesifikasi&quot;: &quot;At.&quot;,
        &quot;deskripsi&quot;: &quot;Sint et beatae.&quot;,
        &quot;lokasi&quot;: &quot;RCD1&quot;,
        &quot;kategori&quot;: [
            &quot;Sit.&quot;
        ],
        &quot;status&quot;: &quot;Baik&quot;,
        &quot;updated_at&quot;: &quot;2023-06-15T10:31:00.000000Z&quot;,
        &quot;created_at&quot;: &quot;2023-06-15T10:31:00.000000Z&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-asset-show--asset_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-asset-show--asset_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-asset-show--asset_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-asset-show--asset_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-asset-show--asset_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-asset-show--asset_id-" data-method="GET"
      data-path="api/v1/asset/show/{asset_id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-asset-show--asset_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-asset-show--asset_id-"
                    onclick="tryItOut('GETapi-v1-asset-show--asset_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-asset-show--asset_id-"
                    onclick="cancelTryOut('GETapi-v1-asset-show--asset_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-asset-show--asset_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/asset/show/{asset_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>MYP_API_KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="MYP_API_KEY" class="auth-value"               data-endpoint="GETapi-v1-asset-show--asset_id-"
               value="{YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>{YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Content-Type"                data-endpoint="GETapi-v1-asset-show--asset_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Accept"                data-endpoint="GETapi-v1-asset-show--asset_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>MYP-API-KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="MYP-API-KEY"                data-endpoint="GETapi-v1-asset-show--asset_id-"
               value="{YOUR_API_KEY}"
               data-component="header">
    <br>
<p>Example: <code>{YOUR_API_KEY}</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>asset_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               name="asset_id"                data-endpoint="GETapi-v1-asset-show--asset_id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the asset. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="assets-POSTapi-v1-asset-update--asset_id-">Update Assets
Update the specified Assets.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-v1-asset-update--asset_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://myapi.peltar.id/api/v1/asset/update/1" \
    --header "MYP_API_KEY: {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "MYP-API-KEY: {YOUR_API_KEY}" \
    --data "{
    \"stockcode\": \"consequatur\",
    \"serialnumber\": \"consequatur\",
    \"nama_asset\": \"mqeopfuudtdsufvyvddqamniihfqcoynlazghdtqtqxbajwbpilpmufinllwloauydlsmsjury\",
    \"merk\": \"consequatur\",
    \"model\": \"consequatur\",
    \"spesifikasi\": \"consequatur\",
    \"deskripsi\": \"consequatur\",
    \"id_lokasi\": 17,
    \"id_status\": 17
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://myapi.peltar.id/api/v1/asset/update/1"
);

const headers = {
    "MYP_API_KEY": "{YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "MYP-API-KEY": "{YOUR_API_KEY}",
};

let body = {
    "stockcode": "consequatur",
    "serialnumber": "consequatur",
    "nama_asset": "mqeopfuudtdsufvyvddqamniihfqcoynlazghdtqtqxbajwbpilpmufinllwloauydlsmsjury",
    "merk": "consequatur",
    "model": "consequatur",
    "spesifikasi": "consequatur",
    "deskripsi": "consequatur",
    "id_lokasi": 17,
    "id_status": 17
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'https://myapi.peltar.id/api/v1/asset/update/1',
    [
        'headers' =&gt; [
            'MYP_API_KEY' =&gt; '{YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'MYP-API-KEY' =&gt; '{YOUR_API_KEY}',
        ],
        'json' =&gt; [
            'stockcode' =&gt; 'consequatur',
            'serialnumber' =&gt; 'consequatur',
            'nama_asset' =&gt; 'mqeopfuudtdsufvyvddqamniihfqcoynlazghdtqtqxbajwbpilpmufinllwloauydlsmsjury',
            'merk' =&gt; 'consequatur',
            'model' =&gt; 'consequatur',
            'spesifikasi' =&gt; 'consequatur',
            'deskripsi' =&gt; 'consequatur',
            'id_lokasi' =&gt; 17,
            'id_status' =&gt; 17,
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'https://myapi.peltar.id/api/v1/asset/update/1'
payload = {
    "stockcode": "consequatur",
    "serialnumber": "consequatur",
    "nama_asset": "mqeopfuudtdsufvyvddqamniihfqcoynlazghdtqtqxbajwbpilpmufinllwloauydlsmsjury",
    "merk": "consequatur",
    "model": "consequatur",
    "spesifikasi": "consequatur",
    "deskripsi": "consequatur",
    "id_lokasi": 17,
    "id_status": 17
}
headers = {
  'MYP_API_KEY': '{YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'MYP-API-KEY': '{YOUR_API_KEY}'
}

response = requests.request('POST', url, headers=headers, json=payload)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-asset-update--asset_id-">
            <blockquote>
            <p>Example response (403):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 51
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;This action is unauthorized.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-v1-asset-update--asset_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-asset-update--asset_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-asset-update--asset_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-asset-update--asset_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-asset-update--asset_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-asset-update--asset_id-" data-method="POST"
      data-path="api/v1/asset/update/{asset_id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-asset-update--asset_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-asset-update--asset_id-"
                    onclick="tryItOut('POSTapi-v1-asset-update--asset_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-asset-update--asset_id-"
                    onclick="cancelTryOut('POSTapi-v1-asset-update--asset_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-asset-update--asset_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/asset/update/{asset_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>MYP_API_KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="MYP_API_KEY" class="auth-value"               data-endpoint="POSTapi-v1-asset-update--asset_id-"
               value="{YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>{YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Content-Type"                data-endpoint="POSTapi-v1-asset-update--asset_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Accept"                data-endpoint="POSTapi-v1-asset-update--asset_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>MYP-API-KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="MYP-API-KEY"                data-endpoint="POSTapi-v1-asset-update--asset_id-"
               value="{YOUR_API_KEY}"
               data-component="header">
    <br>
<p>Example: <code>{YOUR_API_KEY}</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>asset_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               name="asset_id"                data-endpoint="POSTapi-v1-asset-update--asset_id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the asset. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>stockcode</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="stockcode"                data-endpoint="POSTapi-v1-asset-update--asset_id-"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>serialnumber</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="serialnumber"                data-endpoint="POSTapi-v1-asset-update--asset_id-"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>nama_asset</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
               name="nama_asset"                data-endpoint="POSTapi-v1-asset-update--asset_id-"
               value="mqeopfuudtdsufvyvddqamniihfqcoynlazghdtqtqxbajwbpilpmufinllwloauydlsmsjury"
               data-component="body">
    <br>
<p>Must be at least 6 characters. Example: <code>mqeopfuudtdsufvyvddqamniihfqcoynlazghdtqtqxbajwbpilpmufinllwloauydlsmsjury</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>merk</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="merk"                data-endpoint="POSTapi-v1-asset-update--asset_id-"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>model</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
               name="model"                data-endpoint="POSTapi-v1-asset-update--asset_id-"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>spesifikasi</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
               name="spesifikasi"                data-endpoint="POSTapi-v1-asset-update--asset_id-"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>deskripsi</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
               name="deskripsi"                data-endpoint="POSTapi-v1-asset-update--asset_id-"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>id_lokasi</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               name="id_lokasi"                data-endpoint="POSTapi-v1-asset-update--asset_id-"
               value="17"
               data-component="body">
    <br>
<p>Example: <code>17</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>id_kategori</code></b>&nbsp;&nbsp;
<small>object</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
               name="id_kategori"                data-endpoint="POSTapi-v1-asset-update--asset_id-"
               value=""
               data-component="body">
    <br>

        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>id_status</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               name="id_status"                data-endpoint="POSTapi-v1-asset-update--asset_id-"
               value="17"
               data-component="body">
    <br>
<p>Example: <code>17</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>image</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
               name="image"                data-endpoint="POSTapi-v1-asset-update--asset_id-"
               value=""
               data-component="body">
    <br>

        </div>
        </form>

                    <h2 id="assets-POSTapi-v1-asset-destroy--asset_id-">Delete the specified Assets from storage.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-v1-asset-destroy--asset_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://myapi.peltar.id/api/v1/asset/destroy/1" \
    --header "MYP_API_KEY: {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "MYP-API-KEY: {YOUR_API_KEY}"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://myapi.peltar.id/api/v1/asset/destroy/1"
);

const headers = {
    "MYP_API_KEY": "{YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "MYP-API-KEY": "{YOUR_API_KEY}",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'https://myapi.peltar.id/api/v1/asset/destroy/1',
    [
        'headers' =&gt; [
            'MYP_API_KEY' =&gt; '{YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'MYP-API-KEY' =&gt; '{YOUR_API_KEY}',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'https://myapi.peltar.id/api/v1/asset/destroy/1'
headers = {
  'MYP_API_KEY': '{YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'MYP-API-KEY': '{YOUR_API_KEY}'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-asset-destroy--asset_id-">
            <blockquote>
            <p>Example response (403):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 50
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;This action is unauthorized.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-v1-asset-destroy--asset_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-asset-destroy--asset_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-asset-destroy--asset_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-asset-destroy--asset_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-asset-destroy--asset_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-asset-destroy--asset_id-" data-method="POST"
      data-path="api/v1/asset/destroy/{asset_id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-asset-destroy--asset_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-asset-destroy--asset_id-"
                    onclick="tryItOut('POSTapi-v1-asset-destroy--asset_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-asset-destroy--asset_id-"
                    onclick="cancelTryOut('POSTapi-v1-asset-destroy--asset_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-asset-destroy--asset_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/asset/destroy/{asset_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>MYP_API_KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="MYP_API_KEY" class="auth-value"               data-endpoint="POSTapi-v1-asset-destroy--asset_id-"
               value="{YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>{YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Content-Type"                data-endpoint="POSTapi-v1-asset-destroy--asset_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Accept"                data-endpoint="POSTapi-v1-asset-destroy--asset_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>MYP-API-KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="MYP-API-KEY"                data-endpoint="POSTapi-v1-asset-destroy--asset_id-"
               value="{YOUR_API_KEY}"
               data-component="header">
    <br>
<p>Example: <code>{YOUR_API_KEY}</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>asset_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               name="asset_id"                data-endpoint="POSTapi-v1-asset-destroy--asset_id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the asset. Example: <code>1</code></p>
            </div>
                    </form>

                <h1 id="category">Category</h1>

    

                                <h2 id="category-GETapi-v1-category-getall">Display a listing of the resource.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-v1-category-getall">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://myapi.peltar.id/api/v1/category/getall" \
    --header "MYP_API_KEY: {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "MYP-API-KEY: {YOUR_API_KEY}"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://myapi.peltar.id/api/v1/category/getall"
);

const headers = {
    "MYP_API_KEY": "{YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "MYP-API-KEY": "{YOUR_API_KEY}",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'https://myapi.peltar.id/api/v1/category/getall',
    [
        'headers' =&gt; [
            'MYP_API_KEY' =&gt; '{YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'MYP-API-KEY' =&gt; '{YOUR_API_KEY}',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'https://myapi.peltar.id/api/v1/category/getall'
headers = {
  'MYP_API_KEY': '{YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'MYP-API-KEY': '{YOUR_API_KEY}'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-category-getall">
            <blockquote>
            <p>Example response (500):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 38
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Server Error&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-category-getall" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-category-getall"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-category-getall"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-category-getall" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-category-getall">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-category-getall" data-method="GET"
      data-path="api/v1/category/getall"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-category-getall', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-category-getall"
                    onclick="tryItOut('GETapi-v1-category-getall');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-category-getall"
                    onclick="cancelTryOut('GETapi-v1-category-getall');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-category-getall"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/category/getall</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>MYP_API_KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="MYP_API_KEY" class="auth-value"               data-endpoint="GETapi-v1-category-getall"
               value="{YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>{YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Content-Type"                data-endpoint="GETapi-v1-category-getall"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Accept"                data-endpoint="GETapi-v1-category-getall"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>MYP-API-KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="MYP-API-KEY"                data-endpoint="GETapi-v1-category-getall"
               value="{YOUR_API_KEY}"
               data-component="header">
    <br>
<p>Example: <code>{YOUR_API_KEY}</code></p>
            </div>
                        </form>

                    <h2 id="category-POSTapi-v1-category-store">Store a newly created resource in storage.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-v1-category-store">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://myapi.peltar.id/api/v1/category/store" \
    --header "MYP_API_KEY: {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "MYP-API-KEY: {YOUR_API_KEY}" \
    --data "{
    \"kategori\": \"consequatur\",
    \"id_subsatker\": 17
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://myapi.peltar.id/api/v1/category/store"
);

const headers = {
    "MYP_API_KEY": "{YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "MYP-API-KEY": "{YOUR_API_KEY}",
};

let body = {
    "kategori": "consequatur",
    "id_subsatker": 17
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'https://myapi.peltar.id/api/v1/category/store',
    [
        'headers' =&gt; [
            'MYP_API_KEY' =&gt; '{YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'MYP-API-KEY' =&gt; '{YOUR_API_KEY}',
        ],
        'json' =&gt; [
            'kategori' =&gt; 'consequatur',
            'id_subsatker' =&gt; 17,
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'https://myapi.peltar.id/api/v1/category/store'
payload = {
    "kategori": "consequatur",
    "id_subsatker": 17
}
headers = {
  'MYP_API_KEY': '{YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'MYP-API-KEY': '{YOUR_API_KEY}'
}

response = requests.request('POST', url, headers=headers, json=payload)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-category-store">
            <blockquote>
            <p>Example response (403):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 37
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;This action is unauthorized.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-v1-category-store" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-category-store"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-category-store"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-category-store" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-category-store">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-category-store" data-method="POST"
      data-path="api/v1/category/store"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-category-store', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-category-store"
                    onclick="tryItOut('POSTapi-v1-category-store');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-category-store"
                    onclick="cancelTryOut('POSTapi-v1-category-store');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-category-store"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/category/store</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>MYP_API_KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="MYP_API_KEY" class="auth-value"               data-endpoint="POSTapi-v1-category-store"
               value="{YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>{YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Content-Type"                data-endpoint="POSTapi-v1-category-store"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Accept"                data-endpoint="POSTapi-v1-category-store"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>MYP-API-KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="MYP-API-KEY"                data-endpoint="POSTapi-v1-category-store"
               value="{YOUR_API_KEY}"
               data-component="header">
    <br>
<p>Example: <code>{YOUR_API_KEY}</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>kategori</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="kategori"                data-endpoint="POSTapi-v1-category-store"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>id_subsatker</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               name="id_subsatker"                data-endpoint="POSTapi-v1-category-store"
               value="17"
               data-component="body">
    <br>
<p>Example: <code>17</code></p>
        </div>
        </form>

                    <h2 id="category-GETapi-v1-category-show--category_id-">Display the specified resource.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-v1-category-show--category_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://myapi.peltar.id/api/v1/category/show/1" \
    --header "MYP_API_KEY: {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "MYP-API-KEY: {YOUR_API_KEY}"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://myapi.peltar.id/api/v1/category/show/1"
);

const headers = {
    "MYP_API_KEY": "{YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "MYP-API-KEY": "{YOUR_API_KEY}",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'https://myapi.peltar.id/api/v1/category/show/1',
    [
        'headers' =&gt; [
            'MYP_API_KEY' =&gt; '{YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'MYP-API-KEY' =&gt; '{YOUR_API_KEY}',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'https://myapi.peltar.id/api/v1/category/show/1'
headers = {
  'MYP_API_KEY': '{YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'MYP-API-KEY': '{YOUR_API_KEY}'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-category-show--category_id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 36
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;id&quot;: 1,
        &quot;kategori&quot;: &quot;Assumenda.&quot;,
        &quot;subSatker&quot;: {
            &quot;id&quot;: 2,
            &quot;subsatker&quot;: &quot;Perawatan Listrik&quot;,
            &quot;id_satker&quot;: 1,
            &quot;created_at&quot;: &quot;2024-06-30T19:46:52.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2024-06-30T19:46:52.000000Z&quot;
        }
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-category-show--category_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-category-show--category_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-category-show--category_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-category-show--category_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-category-show--category_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-category-show--category_id-" data-method="GET"
      data-path="api/v1/category/show/{category_id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-category-show--category_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-category-show--category_id-"
                    onclick="tryItOut('GETapi-v1-category-show--category_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-category-show--category_id-"
                    onclick="cancelTryOut('GETapi-v1-category-show--category_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-category-show--category_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/category/show/{category_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>MYP_API_KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="MYP_API_KEY" class="auth-value"               data-endpoint="GETapi-v1-category-show--category_id-"
               value="{YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>{YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Content-Type"                data-endpoint="GETapi-v1-category-show--category_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Accept"                data-endpoint="GETapi-v1-category-show--category_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>MYP-API-KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="MYP-API-KEY"                data-endpoint="GETapi-v1-category-show--category_id-"
               value="{YOUR_API_KEY}"
               data-component="header">
    <br>
<p>Example: <code>{YOUR_API_KEY}</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>category_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               name="category_id"                data-endpoint="GETapi-v1-category-show--category_id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the category. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="category-GETapi-v1-category-search">GET api/v1/category/search</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-v1-category-search">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://myapi.peltar.id/api/v1/category/search" \
    --header "MYP_API_KEY: {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "MYP-API-KEY: {YOUR_API_KEY}"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://myapi.peltar.id/api/v1/category/search"
);

const headers = {
    "MYP_API_KEY": "{YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "MYP-API-KEY": "{YOUR_API_KEY}",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'https://myapi.peltar.id/api/v1/category/search',
    [
        'headers' =&gt; [
            'MYP_API_KEY' =&gt; '{YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'MYP-API-KEY' =&gt; '{YOUR_API_KEY}',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'https://myapi.peltar.id/api/v1/category/search'
headers = {
  'MYP_API_KEY': '{YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'MYP-API-KEY': '{YOUR_API_KEY}'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-category-search">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 35
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;kategori&quot;: &quot;Assumenda.&quot;,
            &quot;id_subsatker&quot;: 2,
            &quot;created_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;
        },
        {
            &quot;id&quot;: 2,
            &quot;kategori&quot;: &quot;Corrupti quia.&quot;,
            &quot;id_subsatker&quot;: 5,
            &quot;created_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;
        },
        {
            &quot;id&quot;: 3,
            &quot;kategori&quot;: &quot;Magni sapiente.&quot;,
            &quot;id_subsatker&quot;: 2,
            &quot;created_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;
        },
        {
            &quot;id&quot;: 4,
            &quot;kategori&quot;: &quot;Aut.&quot;,
            &quot;id_subsatker&quot;: 2,
            &quot;created_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;
        },
        {
            &quot;id&quot;: 5,
            &quot;kategori&quot;: &quot;Dolore dolore.&quot;,
            &quot;id_subsatker&quot;: 5,
            &quot;created_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-category-search" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-category-search"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-category-search"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-category-search" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-category-search">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-category-search" data-method="GET"
      data-path="api/v1/category/search"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-category-search', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-category-search"
                    onclick="tryItOut('GETapi-v1-category-search');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-category-search"
                    onclick="cancelTryOut('GETapi-v1-category-search');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-category-search"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/category/search</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>MYP_API_KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="MYP_API_KEY" class="auth-value"               data-endpoint="GETapi-v1-category-search"
               value="{YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>{YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Content-Type"                data-endpoint="GETapi-v1-category-search"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Accept"                data-endpoint="GETapi-v1-category-search"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>MYP-API-KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="MYP-API-KEY"                data-endpoint="GETapi-v1-category-search"
               value="{YOUR_API_KEY}"
               data-component="header">
    <br>
<p>Example: <code>{YOUR_API_KEY}</code></p>
            </div>
                        </form>

                    <h2 id="category-POSTapi-v1-category-update--category_id-">Update the specified resource in storage.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-v1-category-update--category_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://myapi.peltar.id/api/v1/category/update/1" \
    --header "MYP_API_KEY: {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "MYP-API-KEY: {YOUR_API_KEY}" \
    --data "{
    \"kategori\": \"consequatur\",
    \"id_subsatker\": 17
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://myapi.peltar.id/api/v1/category/update/1"
);

const headers = {
    "MYP_API_KEY": "{YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "MYP-API-KEY": "{YOUR_API_KEY}",
};

let body = {
    "kategori": "consequatur",
    "id_subsatker": 17
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'https://myapi.peltar.id/api/v1/category/update/1',
    [
        'headers' =&gt; [
            'MYP_API_KEY' =&gt; '{YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'MYP-API-KEY' =&gt; '{YOUR_API_KEY}',
        ],
        'json' =&gt; [
            'kategori' =&gt; 'consequatur',
            'id_subsatker' =&gt; 17,
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'https://myapi.peltar.id/api/v1/category/update/1'
payload = {
    "kategori": "consequatur",
    "id_subsatker": 17
}
headers = {
  'MYP_API_KEY': '{YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'MYP-API-KEY': '{YOUR_API_KEY}'
}

response = requests.request('POST', url, headers=headers, json=payload)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-category-update--category_id-">
            <blockquote>
            <p>Example response (403):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 34
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;This action is unauthorized.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-v1-category-update--category_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-category-update--category_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-category-update--category_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-category-update--category_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-category-update--category_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-category-update--category_id-" data-method="POST"
      data-path="api/v1/category/update/{category_id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-category-update--category_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-category-update--category_id-"
                    onclick="tryItOut('POSTapi-v1-category-update--category_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-category-update--category_id-"
                    onclick="cancelTryOut('POSTapi-v1-category-update--category_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-category-update--category_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/category/update/{category_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>MYP_API_KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="MYP_API_KEY" class="auth-value"               data-endpoint="POSTapi-v1-category-update--category_id-"
               value="{YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>{YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Content-Type"                data-endpoint="POSTapi-v1-category-update--category_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Accept"                data-endpoint="POSTapi-v1-category-update--category_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>MYP-API-KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="MYP-API-KEY"                data-endpoint="POSTapi-v1-category-update--category_id-"
               value="{YOUR_API_KEY}"
               data-component="header">
    <br>
<p>Example: <code>{YOUR_API_KEY}</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>category_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               name="category_id"                data-endpoint="POSTapi-v1-category-update--category_id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the category. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>kategori</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="kategori"                data-endpoint="POSTapi-v1-category-update--category_id-"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>id_subsatker</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               name="id_subsatker"                data-endpoint="POSTapi-v1-category-update--category_id-"
               value="17"
               data-component="body">
    <br>
<p>Example: <code>17</code></p>
        </div>
        </form>

                    <h2 id="category-POSTapi-v1-category-destroy--category_id-">Remove the specified resource from storage.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-v1-category-destroy--category_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://myapi.peltar.id/api/v1/category/destroy/1" \
    --header "MYP_API_KEY: {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "MYP-API-KEY: {YOUR_API_KEY}"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://myapi.peltar.id/api/v1/category/destroy/1"
);

const headers = {
    "MYP_API_KEY": "{YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "MYP-API-KEY": "{YOUR_API_KEY}",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'https://myapi.peltar.id/api/v1/category/destroy/1',
    [
        'headers' =&gt; [
            'MYP_API_KEY' =&gt; '{YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'MYP-API-KEY' =&gt; '{YOUR_API_KEY}',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'https://myapi.peltar.id/api/v1/category/destroy/1'
headers = {
  'MYP_API_KEY': '{YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'MYP-API-KEY': '{YOUR_API_KEY}'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-category-destroy--category_id-">
            <blockquote>
            <p>Example response (403):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 33
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;This action is unauthorized.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-v1-category-destroy--category_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-category-destroy--category_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-category-destroy--category_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-category-destroy--category_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-category-destroy--category_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-category-destroy--category_id-" data-method="POST"
      data-path="api/v1/category/destroy/{category_id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-category-destroy--category_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-category-destroy--category_id-"
                    onclick="tryItOut('POSTapi-v1-category-destroy--category_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-category-destroy--category_id-"
                    onclick="cancelTryOut('POSTapi-v1-category-destroy--category_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-category-destroy--category_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/category/destroy/{category_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>MYP_API_KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="MYP_API_KEY" class="auth-value"               data-endpoint="POSTapi-v1-category-destroy--category_id-"
               value="{YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>{YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Content-Type"                data-endpoint="POSTapi-v1-category-destroy--category_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Accept"                data-endpoint="POSTapi-v1-category-destroy--category_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>MYP-API-KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="MYP-API-KEY"                data-endpoint="POSTapi-v1-category-destroy--category_id-"
               value="{YOUR_API_KEY}"
               data-component="header">
    <br>
<p>Example: <code>{YOUR_API_KEY}</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>category_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               name="category_id"                data-endpoint="POSTapi-v1-category-destroy--category_id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the category. Example: <code>1</code></p>
            </div>
                    </form>

                <h1 id="client">Client</h1>

    

                                <h2 id="client-GETapi-v1-client-getall">Get All Client
Display a listing of the Client</h2>

<p>
</p>



<span id="example-requests-GETapi-v1-client-getall">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://myapi.peltar.id/api/v1/client/getall" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "MYP-API-KEY: {YOUR_API_KEY}"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://myapi.peltar.id/api/v1/client/getall"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "MYP-API-KEY": "{YOUR_API_KEY}",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'https://myapi.peltar.id/api/v1/client/getall',
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'MYP-API-KEY' =&gt; '{YOUR_API_KEY}',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'https://myapi.peltar.id/api/v1/client/getall'
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'MYP-API-KEY': '{YOUR_API_KEY}'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-client-getall">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 59
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">[
    {
        &quot;id&quot;: 1,
        &quot;name&quot;: &quot;mypeltar_test&quot;,
        &quot;uuid&quot;: &quot;D70A352AD6964AAC935013278A0ADDEA&quot;,
        &quot;api_key&quot;: &quot;6D563614-B987-4A13-9107-5630CCF7ED21&quot;,
        &quot;created_at&quot;: &quot;2024-06-30T19:46:53.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2024-06-30T19:46:53.000000Z&quot;
    },
    {
        &quot;id&quot;: 2,
        &quot;name&quot;: &quot;mypeltar_web&quot;,
        &quot;uuid&quot;: &quot;7DBF7426C0E9458F82DAEBCC991D9886&quot;,
        &quot;api_key&quot;: &quot;CD0C0258-A560-4EC3-B4B2-C43410E110B7&quot;,
        &quot;created_at&quot;: &quot;2024-06-30T19:46:53.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2024-06-30T19:46:53.000000Z&quot;
    },
    {
        &quot;id&quot;: 3,
        &quot;name&quot;: &quot;mypeltar_android&quot;,
        &quot;uuid&quot;: &quot;1FA86BD04F0D4FCEB7FD4925C238454B&quot;,
        &quot;api_key&quot;: &quot;B2FDB24B-A579-47AB-AAA4-FF7DEAA57363&quot;,
        &quot;created_at&quot;: &quot;2024-06-30T19:46:53.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2024-06-30T19:46:53.000000Z&quot;
    },
    {
        &quot;id&quot;: 4,
        &quot;name&quot;: &quot;test&quot;,
        &quot;uuid&quot;: &quot;044088AD4BEF41478C6D546D77610C62&quot;,
        &quot;api_key&quot;: &quot;42D2256A-924F-4A18-8DE1-65AB127F987C&quot;,
        &quot;created_at&quot;: &quot;2024-07-05T04:05:56.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2024-07-05T04:05:56.000000Z&quot;
    }
]</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-client-getall" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-client-getall"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-client-getall"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-client-getall" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-client-getall">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-client-getall" data-method="GET"
      data-path="api/v1/client/getall"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-client-getall', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-client-getall"
                    onclick="tryItOut('GETapi-v1-client-getall');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-client-getall"
                    onclick="cancelTryOut('GETapi-v1-client-getall');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-client-getall"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/client/getall</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Content-Type"                data-endpoint="GETapi-v1-client-getall"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Accept"                data-endpoint="GETapi-v1-client-getall"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>MYP-API-KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="MYP-API-KEY"                data-endpoint="GETapi-v1-client-getall"
               value="{YOUR_API_KEY}"
               data-component="header">
    <br>
<p>Example: <code>{YOUR_API_KEY}</code></p>
            </div>
                        </form>

                    <h2 id="client-GETapi-v1-client--client_uuid-">GET api/v1/client/{client_uuid}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-v1-client--client_uuid-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://myapi.peltar.id/api/v1/client/D70A352AD6964AAC935013278A0ADDEA" \
    --header "MYP_API_KEY: {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "MYP-API-KEY: {YOUR_API_KEY}"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://myapi.peltar.id/api/v1/client/D70A352AD6964AAC935013278A0ADDEA"
);

const headers = {
    "MYP_API_KEY": "{YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "MYP-API-KEY": "{YOUR_API_KEY}",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'https://myapi.peltar.id/api/v1/client/D70A352AD6964AAC935013278A0ADDEA',
    [
        'headers' =&gt; [
            'MYP_API_KEY' =&gt; '{YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'MYP-API-KEY' =&gt; '{YOUR_API_KEY}',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'https://myapi.peltar.id/api/v1/client/D70A352AD6964AAC935013278A0ADDEA'
headers = {
  'MYP_API_KEY': '{YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'MYP-API-KEY': '{YOUR_API_KEY}'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-client--client_uuid-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 58
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;id&quot;: 1,
    &quot;name&quot;: &quot;mypeltar_test&quot;,
    &quot;uuid&quot;: &quot;D70A352AD6964AAC935013278A0ADDEA&quot;,
    &quot;api_key&quot;: &quot;6D563614-B987-4A13-9107-5630CCF7ED21&quot;,
    &quot;created_at&quot;: &quot;2024-06-30T19:46:53.000000Z&quot;,
    &quot;updated_at&quot;: &quot;2024-06-30T19:46:53.000000Z&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-client--client_uuid-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-client--client_uuid-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-client--client_uuid-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-client--client_uuid-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-client--client_uuid-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-client--client_uuid-" data-method="GET"
      data-path="api/v1/client/{client_uuid}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-client--client_uuid-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-client--client_uuid-"
                    onclick="tryItOut('GETapi-v1-client--client_uuid-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-client--client_uuid-"
                    onclick="cancelTryOut('GETapi-v1-client--client_uuid-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-client--client_uuid-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/client/{client_uuid}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>MYP_API_KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="MYP_API_KEY" class="auth-value"               data-endpoint="GETapi-v1-client--client_uuid-"
               value="{YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>{YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Content-Type"                data-endpoint="GETapi-v1-client--client_uuid-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Accept"                data-endpoint="GETapi-v1-client--client_uuid-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>MYP-API-KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="MYP-API-KEY"                data-endpoint="GETapi-v1-client--client_uuid-"
               value="{YOUR_API_KEY}"
               data-component="header">
    <br>
<p>Example: <code>{YOUR_API_KEY}</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>client_uuid</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="client_uuid"                data-endpoint="GETapi-v1-client--client_uuid-"
               value="D70A352AD6964AAC935013278A0ADDEA"
               data-component="url">
    <br>
<p>Example: <code>D70A352AD6964AAC935013278A0ADDEA</code></p>
            </div>
                    </form>

                    <h2 id="client-POSTapi-v1-client-store">POST api/v1/client/store</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-v1-client-store">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://myapi.peltar.id/api/v1/client/store" \
    --header "MYP_API_KEY: {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "MYP-API-KEY: {YOUR_API_KEY}" \
    --data "{
    \"name\": \"vmqeopfuudtdsufvyvddq\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://myapi.peltar.id/api/v1/client/store"
);

const headers = {
    "MYP_API_KEY": "{YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "MYP-API-KEY": "{YOUR_API_KEY}",
};

let body = {
    "name": "vmqeopfuudtdsufvyvddq"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'https://myapi.peltar.id/api/v1/client/store',
    [
        'headers' =&gt; [
            'MYP_API_KEY' =&gt; '{YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'MYP-API-KEY' =&gt; '{YOUR_API_KEY}',
        ],
        'json' =&gt; [
            'name' =&gt; 'vmqeopfuudtdsufvyvddq',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'https://myapi.peltar.id/api/v1/client/store'
payload = {
    "name": "vmqeopfuudtdsufvyvddq"
}
headers = {
  'MYP_API_KEY': '{YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'MYP-API-KEY': '{YOUR_API_KEY}'
}

response = requests.request('POST', url, headers=headers, json=payload)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-client-store">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 57
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;name&quot;: &quot;vmqeopfuudtdsufvyvddq&quot;,
    &quot;api_key&quot;: &quot;D3A0D652-57EC-4610-8BC1-F3AF46772569&quot;,
    &quot;uuid&quot;: &quot;DDF60F1D930A471FB062A6553C088695&quot;,
    &quot;updated_at&quot;: &quot;2024-07-05T06:09:13.000000Z&quot;,
    &quot;created_at&quot;: &quot;2024-07-05T06:09:13.000000Z&quot;,
    &quot;id&quot;: 6
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-v1-client-store" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-client-store"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-client-store"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-client-store" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-client-store">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-client-store" data-method="POST"
      data-path="api/v1/client/store"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-client-store', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-client-store"
                    onclick="tryItOut('POSTapi-v1-client-store');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-client-store"
                    onclick="cancelTryOut('POSTapi-v1-client-store');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-client-store"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/client/store</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>MYP_API_KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="MYP_API_KEY" class="auth-value"               data-endpoint="POSTapi-v1-client-store"
               value="{YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>{YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Content-Type"                data-endpoint="POSTapi-v1-client-store"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Accept"                data-endpoint="POSTapi-v1-client-store"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>MYP-API-KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="MYP-API-KEY"                data-endpoint="POSTapi-v1-client-store"
               value="{YOUR_API_KEY}"
               data-component="header">
    <br>
<p>Example: <code>{YOUR_API_KEY}</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="name"                data-endpoint="POSTapi-v1-client-store"
               value="vmqeopfuudtdsufvyvddq"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>vmqeopfuudtdsufvyvddq</code></p>
        </div>
        </form>

                <h1 id="location">Location</h1>

    

                                <h2 id="location-GETapi-v1-location-getall">Display a listing of the resource.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-v1-location-getall">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://myapi.peltar.id/api/v1/location/getall" \
    --header "MYP_API_KEY: {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "MYP-API-KEY: {YOUR_API_KEY}"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://myapi.peltar.id/api/v1/location/getall"
);

const headers = {
    "MYP_API_KEY": "{YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "MYP-API-KEY": "{YOUR_API_KEY}",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'https://myapi.peltar.id/api/v1/location/getall',
    [
        'headers' =&gt; [
            'MYP_API_KEY' =&gt; '{YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'MYP-API-KEY' =&gt; '{YOUR_API_KEY}',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'https://myapi.peltar.id/api/v1/location/getall'
headers = {
  'MYP_API_KEY': '{YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'MYP-API-KEY': '{YOUR_API_KEY}'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-location-getall">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 32
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;current_page&quot;: 1,
    &quot;data&quot;: [
        {
            &quot;id&quot;: 4,
            &quot;unit&quot;: &quot;Quo neque.&quot;,
            &quot;created_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;
        },
        {
            &quot;id&quot;: 5,
            &quot;unit&quot;: &quot;Eveniet.&quot;,
            &quot;created_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;
        },
        {
            &quot;id&quot;: 6,
            &quot;unit&quot;: &quot;Quaerat odio.&quot;,
            &quot;created_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;
        },
        {
            &quot;id&quot;: 7,
            &quot;unit&quot;: &quot;Rerum ad.&quot;,
            &quot;created_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;
        },
        {
            &quot;id&quot;: 8,
            &quot;unit&quot;: &quot;Cumque non.&quot;,
            &quot;created_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;
        },
        {
            &quot;id&quot;: 1,
            &quot;unit&quot;: &quot;RCD1&quot;,
            &quot;created_at&quot;: &quot;2024-06-30T19:46:52.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2024-06-30T19:46:52.000000Z&quot;
        },
        {
            &quot;id&quot;: 2,
            &quot;unit&quot;: &quot;Pompa&quot;,
            &quot;created_at&quot;: &quot;2024-06-30T19:46:52.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2024-06-30T19:46:52.000000Z&quot;
        },
        {
            &quot;id&quot;: 3,
            &quot;unit&quot;: &quot;RCD2&quot;,
            &quot;created_at&quot;: &quot;2024-06-30T19:46:52.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2024-06-30T19:46:52.000000Z&quot;
        }
    ],
    &quot;first_page_url&quot;: &quot;http://mypeltar/api/v1/location/getall?page=1&quot;,
    &quot;from&quot;: 1,
    &quot;last_page&quot;: 1,
    &quot;last_page_url&quot;: &quot;http://mypeltar/api/v1/location/getall?page=1&quot;,
    &quot;links&quot;: [
        {
            &quot;url&quot;: null,
            &quot;label&quot;: &quot;&amp;laquo; Previous&quot;,
            &quot;active&quot;: false
        },
        {
            &quot;url&quot;: &quot;http://mypeltar/api/v1/location/getall?page=1&quot;,
            &quot;label&quot;: &quot;1&quot;,
            &quot;active&quot;: true
        },
        {
            &quot;url&quot;: null,
            &quot;label&quot;: &quot;Next &amp;raquo;&quot;,
            &quot;active&quot;: false
        }
    ],
    &quot;next_page_url&quot;: null,
    &quot;path&quot;: &quot;http://mypeltar/api/v1/location/getall&quot;,
    &quot;per_page&quot;: 50,
    &quot;prev_page_url&quot;: null,
    &quot;to&quot;: 8,
    &quot;total&quot;: 8
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-location-getall" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-location-getall"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-location-getall"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-location-getall" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-location-getall">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-location-getall" data-method="GET"
      data-path="api/v1/location/getall"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-location-getall', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-location-getall"
                    onclick="tryItOut('GETapi-v1-location-getall');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-location-getall"
                    onclick="cancelTryOut('GETapi-v1-location-getall');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-location-getall"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/location/getall</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>MYP_API_KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="MYP_API_KEY" class="auth-value"               data-endpoint="GETapi-v1-location-getall"
               value="{YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>{YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Content-Type"                data-endpoint="GETapi-v1-location-getall"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Accept"                data-endpoint="GETapi-v1-location-getall"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>MYP-API-KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="MYP-API-KEY"                data-endpoint="GETapi-v1-location-getall"
               value="{YOUR_API_KEY}"
               data-component="header">
    <br>
<p>Example: <code>{YOUR_API_KEY}</code></p>
            </div>
                        </form>

                    <h2 id="location-POSTapi-v1-location-store">Store a newly created resource in storage.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-v1-location-store">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://myapi.peltar.id/api/v1/location/store" \
    --header "MYP_API_KEY: {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "MYP-API-KEY: {YOUR_API_KEY}" \
    --data "{
    \"unit\": \"consequatur\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://myapi.peltar.id/api/v1/location/store"
);

const headers = {
    "MYP_API_KEY": "{YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "MYP-API-KEY": "{YOUR_API_KEY}",
};

let body = {
    "unit": "consequatur"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'https://myapi.peltar.id/api/v1/location/store',
    [
        'headers' =&gt; [
            'MYP_API_KEY' =&gt; '{YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'MYP-API-KEY' =&gt; '{YOUR_API_KEY}',
        ],
        'json' =&gt; [
            'unit' =&gt; 'consequatur',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'https://myapi.peltar.id/api/v1/location/store'
payload = {
    "unit": "consequatur"
}
headers = {
  'MYP_API_KEY': '{YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'MYP-API-KEY': '{YOUR_API_KEY}'
}

response = requests.request('POST', url, headers=headers, json=payload)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-location-store">
            <blockquote>
            <p>Example response (403):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 31
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;This action is unauthorized.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-v1-location-store" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-location-store"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-location-store"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-location-store" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-location-store">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-location-store" data-method="POST"
      data-path="api/v1/location/store"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-location-store', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-location-store"
                    onclick="tryItOut('POSTapi-v1-location-store');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-location-store"
                    onclick="cancelTryOut('POSTapi-v1-location-store');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-location-store"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/location/store</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>MYP_API_KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="MYP_API_KEY" class="auth-value"               data-endpoint="POSTapi-v1-location-store"
               value="{YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>{YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Content-Type"                data-endpoint="POSTapi-v1-location-store"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Accept"                data-endpoint="POSTapi-v1-location-store"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>MYP-API-KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="MYP-API-KEY"                data-endpoint="POSTapi-v1-location-store"
               value="{YOUR_API_KEY}"
               data-component="header">
    <br>
<p>Example: <code>{YOUR_API_KEY}</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>unit</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="unit"                data-endpoint="POSTapi-v1-location-store"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
        </form>

                    <h2 id="location-GETapi-v1-location-show--location_id-">Display the specified resource.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-v1-location-show--location_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://myapi.peltar.id/api/v1/location/show/1" \
    --header "MYP_API_KEY: {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "MYP-API-KEY: {YOUR_API_KEY}"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://myapi.peltar.id/api/v1/location/show/1"
);

const headers = {
    "MYP_API_KEY": "{YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "MYP-API-KEY": "{YOUR_API_KEY}",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'https://myapi.peltar.id/api/v1/location/show/1',
    [
        'headers' =&gt; [
            'MYP_API_KEY' =&gt; '{YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'MYP-API-KEY' =&gt; '{YOUR_API_KEY}',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'https://myapi.peltar.id/api/v1/location/show/1'
headers = {
  'MYP_API_KEY': '{YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'MYP-API-KEY': '{YOUR_API_KEY}'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-location-show--location_id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 30
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;id&quot;: 1,
        &quot;unit&quot;: &quot;RCD1&quot;,
        &quot;created_at&quot;: &quot;2024-06-30T19:46:52.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2024-06-30T19:46:52.000000Z&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-location-show--location_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-location-show--location_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-location-show--location_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-location-show--location_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-location-show--location_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-location-show--location_id-" data-method="GET"
      data-path="api/v1/location/show/{location_id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-location-show--location_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-location-show--location_id-"
                    onclick="tryItOut('GETapi-v1-location-show--location_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-location-show--location_id-"
                    onclick="cancelTryOut('GETapi-v1-location-show--location_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-location-show--location_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/location/show/{location_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>MYP_API_KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="MYP_API_KEY" class="auth-value"               data-endpoint="GETapi-v1-location-show--location_id-"
               value="{YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>{YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Content-Type"                data-endpoint="GETapi-v1-location-show--location_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Accept"                data-endpoint="GETapi-v1-location-show--location_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>MYP-API-KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="MYP-API-KEY"                data-endpoint="GETapi-v1-location-show--location_id-"
               value="{YOUR_API_KEY}"
               data-component="header">
    <br>
<p>Example: <code>{YOUR_API_KEY}</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>location_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               name="location_id"                data-endpoint="GETapi-v1-location-show--location_id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the location. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="location-POSTapi-v1-location-update--location_id-">Update the specified resource in storage.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-v1-location-update--location_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://myapi.peltar.id/api/v1/location/update/1" \
    --header "MYP_API_KEY: {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "MYP-API-KEY: {YOUR_API_KEY}" \
    --data "{
    \"unit\": \"consequatur\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://myapi.peltar.id/api/v1/location/update/1"
);

const headers = {
    "MYP_API_KEY": "{YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "MYP-API-KEY": "{YOUR_API_KEY}",
};

let body = {
    "unit": "consequatur"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'https://myapi.peltar.id/api/v1/location/update/1',
    [
        'headers' =&gt; [
            'MYP_API_KEY' =&gt; '{YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'MYP-API-KEY' =&gt; '{YOUR_API_KEY}',
        ],
        'json' =&gt; [
            'unit' =&gt; 'consequatur',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'https://myapi.peltar.id/api/v1/location/update/1'
payload = {
    "unit": "consequatur"
}
headers = {
  'MYP_API_KEY': '{YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'MYP-API-KEY': '{YOUR_API_KEY}'
}

response = requests.request('POST', url, headers=headers, json=payload)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-location-update--location_id-">
            <blockquote>
            <p>Example response (403):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 29
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;This action is unauthorized.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-v1-location-update--location_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-location-update--location_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-location-update--location_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-location-update--location_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-location-update--location_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-location-update--location_id-" data-method="POST"
      data-path="api/v1/location/update/{location_id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-location-update--location_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-location-update--location_id-"
                    onclick="tryItOut('POSTapi-v1-location-update--location_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-location-update--location_id-"
                    onclick="cancelTryOut('POSTapi-v1-location-update--location_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-location-update--location_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/location/update/{location_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>MYP_API_KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="MYP_API_KEY" class="auth-value"               data-endpoint="POSTapi-v1-location-update--location_id-"
               value="{YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>{YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Content-Type"                data-endpoint="POSTapi-v1-location-update--location_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Accept"                data-endpoint="POSTapi-v1-location-update--location_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>MYP-API-KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="MYP-API-KEY"                data-endpoint="POSTapi-v1-location-update--location_id-"
               value="{YOUR_API_KEY}"
               data-component="header">
    <br>
<p>Example: <code>{YOUR_API_KEY}</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>location_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               name="location_id"                data-endpoint="POSTapi-v1-location-update--location_id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the location. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>unit</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="unit"                data-endpoint="POSTapi-v1-location-update--location_id-"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
        </form>

                    <h2 id="location-POSTapi-v1-location-destroy--location_id-">Remove the specified resource from storage.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-v1-location-destroy--location_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://myapi.peltar.id/api/v1/location/destroy/1" \
    --header "MYP_API_KEY: {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "MYP-API-KEY: {YOUR_API_KEY}"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://myapi.peltar.id/api/v1/location/destroy/1"
);

const headers = {
    "MYP_API_KEY": "{YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "MYP-API-KEY": "{YOUR_API_KEY}",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'https://myapi.peltar.id/api/v1/location/destroy/1',
    [
        'headers' =&gt; [
            'MYP_API_KEY' =&gt; '{YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'MYP-API-KEY' =&gt; '{YOUR_API_KEY}',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'https://myapi.peltar.id/api/v1/location/destroy/1'
headers = {
  'MYP_API_KEY': '{YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'MYP-API-KEY': '{YOUR_API_KEY}'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-location-destroy--location_id-">
            <blockquote>
            <p>Example response (403):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 28
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;This action is unauthorized.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-v1-location-destroy--location_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-location-destroy--location_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-location-destroy--location_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-location-destroy--location_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-location-destroy--location_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-location-destroy--location_id-" data-method="POST"
      data-path="api/v1/location/destroy/{location_id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-location-destroy--location_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-location-destroy--location_id-"
                    onclick="tryItOut('POSTapi-v1-location-destroy--location_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-location-destroy--location_id-"
                    onclick="cancelTryOut('POSTapi-v1-location-destroy--location_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-location-destroy--location_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/location/destroy/{location_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>MYP_API_KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="MYP_API_KEY" class="auth-value"               data-endpoint="POSTapi-v1-location-destroy--location_id-"
               value="{YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>{YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Content-Type"                data-endpoint="POSTapi-v1-location-destroy--location_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Accept"                data-endpoint="POSTapi-v1-location-destroy--location_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>MYP-API-KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="MYP-API-KEY"                data-endpoint="POSTapi-v1-location-destroy--location_id-"
               value="{YOUR_API_KEY}"
               data-component="header">
    <br>
<p>Example: <code>{YOUR_API_KEY}</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>location_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               name="location_id"                data-endpoint="POSTapi-v1-location-destroy--location_id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the location. Example: <code>1</code></p>
            </div>
                    </form>

                <h1 id="maintenance">Maintenance</h1>

    

                                <h2 id="maintenance-GETapi-v1-maintenance-getall">Display a listing of the resource.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-v1-maintenance-getall">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://myapi.peltar.id/api/v1/maintenance/getall" \
    --header "MYP_API_KEY: {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "MYP-API-KEY: {YOUR_API_KEY}"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://myapi.peltar.id/api/v1/maintenance/getall"
);

const headers = {
    "MYP_API_KEY": "{YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "MYP-API-KEY": "{YOUR_API_KEY}",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'https://myapi.peltar.id/api/v1/maintenance/getall',
    [
        'headers' =&gt; [
            'MYP_API_KEY' =&gt; '{YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'MYP-API-KEY' =&gt; '{YOUR_API_KEY}',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'https://myapi.peltar.id/api/v1/maintenance/getall'
headers = {
  'MYP_API_KEY': '{YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'MYP-API-KEY': '{YOUR_API_KEY}'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-maintenance-getall">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 49
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">[
    {
        &quot;id&quot;: 4864,
        &quot;user_inspektor&quot;: null,
        &quot;asset&quot;: {
            &quot;id&quot;: 5,
            &quot;stockcode&quot;: &quot;106&quot;,
            &quot;code_asset&quot;: &quot;AST24070005&quot;,
            &quot;serialnumber&quot;: &quot;FAKESerial00005&quot;,
            &quot;nama_asset&quot;: &quot;Marietta Hermiston I&quot;,
            &quot;merk&quot;: &quot;Eum illum ut.&quot;,
            &quot;model&quot;: &quot;Qui.&quot;,
            &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
            &quot;spesifikasi&quot;: &quot;Eum aperiam vel.&quot;,
            &quot;deskripsi&quot;: &quot;Aut illo fugit.&quot;,
            &quot;lokasi&quot;: &quot;RCD2&quot;,
            &quot;kategori&quot;: [
                &quot;Corrupti quia.&quot;
            ],
            &quot;status&quot;: &quot;Dalam Perbaikan&quot;,
            &quot;updated_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;,
            &quot;created_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;
        },
        &quot;type&quot;: {
            &quot;id&quot;: 1,
            &quot;type&quot;: &quot;Inspeksi&quot;
        },
        &quot;imagebefore&quot;: &quot;http://myapi.peltar.id/storage/Molestias est molestias non doloremque.&quot;,
        &quot;imageafter&quot;: &quot;http://myapi.peltar.id/Et nam cumque nisi omnis.&quot;,
        &quot;history&quot;: [
            {
                &quot;id&quot;: 9727,
                &quot;user&quot;: &quot;Admin&quot;,
                &quot;status&quot;: &quot;Pending&quot;,
                &quot;deskripsi&quot;: &quot;Corporis non et necessitatibus.&quot;,
                &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
                &quot;created_at&quot;: &quot;2024-06-30T19:47:46.000000Z&quot;,
                &quot;update_at&quot;: &quot;2024-06-30T19:47:46.000000Z&quot;
            },
            {
                &quot;id&quot;: 9728,
                &quot;user&quot;: &quot;AdminInspeksi&quot;,
                &quot;status&quot;: &quot;Dalam Perbaikan&quot;,
                &quot;deskripsi&quot;: &quot;Quis dignissimos odio sint quaerat.&quot;,
                &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
                &quot;created_at&quot;: &quot;2024-06-30T19:47:46.000000Z&quot;,
                &quot;update_at&quot;: &quot;2024-06-30T19:47:46.000000Z&quot;
            }
        ]
    },
    {
        &quot;id&quot;: 4865,
        &quot;user_inspektor&quot;: null,
        &quot;asset&quot;: {
            &quot;id&quot;: 3,
            &quot;stockcode&quot;: &quot;21&quot;,
            &quot;code_asset&quot;: &quot;AST24070003&quot;,
            &quot;serialnumber&quot;: &quot;FAKESerial00003&quot;,
            &quot;nama_asset&quot;: &quot;Yvonne Fay Jr.&quot;,
            &quot;merk&quot;: &quot;Modi.&quot;,
            &quot;model&quot;: &quot;Beatae.&quot;,
            &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
            &quot;spesifikasi&quot;: &quot;Qui.&quot;,
            &quot;deskripsi&quot;: &quot;Quae neque sapiente laudantium.&quot;,
            &quot;lokasi&quot;: &quot;RCD2&quot;,
            &quot;kategori&quot;: [
                &quot;Dolore dolore.&quot;
            ],
            &quot;status&quot;: &quot;Dalam Perbaikan&quot;,
            &quot;updated_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;,
            &quot;created_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;
        },
        &quot;type&quot;: {
            &quot;id&quot;: 1,
            &quot;type&quot;: &quot;Inspeksi&quot;
        },
        &quot;imagebefore&quot;: &quot;http://myapi.peltar.id/storage/Eum aliquid delectus dolor esse.&quot;,
        &quot;imageafter&quot;: &quot;http://myapi.peltar.id/Et voluptates saepe qui laborum.&quot;,
        &quot;history&quot;: [
            {
                &quot;id&quot;: 9729,
                &quot;user&quot;: &quot;Admin&quot;,
                &quot;status&quot;: &quot;Pending&quot;,
                &quot;deskripsi&quot;: &quot;Quam et soluta a.&quot;,
                &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
                &quot;created_at&quot;: &quot;2024-06-30T19:47:46.000000Z&quot;,
                &quot;update_at&quot;: &quot;2024-06-30T19:47:46.000000Z&quot;
            },
            {
                &quot;id&quot;: 9730,
                &quot;user&quot;: &quot;AdminMaintenance&quot;,
                &quot;status&quot;: &quot;Pending&quot;,
                &quot;deskripsi&quot;: &quot;Eum.&quot;,
                &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
                &quot;created_at&quot;: &quot;2024-06-30T19:47:46.000000Z&quot;,
                &quot;update_at&quot;: &quot;2024-06-30T19:47:46.000000Z&quot;
            }
        ]
    },
    {
        &quot;id&quot;: 4866,
        &quot;user_inspektor&quot;: null,
        &quot;asset&quot;: {
            &quot;id&quot;: 1,
            &quot;stockcode&quot;: &quot;114&quot;,
            &quot;code_asset&quot;: &quot;AST24070001&quot;,
            &quot;serialnumber&quot;: &quot;FAKESerial00001&quot;,
            &quot;nama_asset&quot;: &quot;Lloyd Casper&quot;,
            &quot;merk&quot;: &quot;Eos maxime omnis architecto et.&quot;,
            &quot;model&quot;: &quot;Consequuntur laboriosam.&quot;,
            &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
            &quot;spesifikasi&quot;: &quot;Dolorem quas consectetur fuga.&quot;,
            &quot;deskripsi&quot;: &quot;Nihil dolorum.&quot;,
            &quot;lokasi&quot;: &quot;Quo neque.&quot;,
            &quot;kategori&quot;: [
                &quot;Aut.&quot;
            ],
            &quot;status&quot;: &quot;Rusak&quot;,
            &quot;updated_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;,
            &quot;created_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;
        },
        &quot;type&quot;: {
            &quot;id&quot;: 1,
            &quot;type&quot;: &quot;Inspeksi&quot;
        },
        &quot;imagebefore&quot;: &quot;http://myapi.peltar.id/storage/Dolorem corrupti quia numquam animi aspernatur.&quot;,
        &quot;imageafter&quot;: &quot;http://myapi.peltar.id/Distinctio cumque id in quae suscipit eaque.&quot;,
        &quot;history&quot;: [
            {
                &quot;id&quot;: 9731,
                &quot;user&quot;: &quot;SuperUser&quot;,
                &quot;status&quot;: &quot;Dalam Perbaikan&quot;,
                &quot;deskripsi&quot;: &quot;Non voluptatem architecto numquam.&quot;,
                &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
                &quot;created_at&quot;: &quot;2024-06-30T19:47:46.000000Z&quot;,
                &quot;update_at&quot;: &quot;2024-06-30T19:47:46.000000Z&quot;
            },
            {
                &quot;id&quot;: 9732,
                &quot;user&quot;: &quot;Admin&quot;,
                &quot;status&quot;: &quot;Pending&quot;,
                &quot;deskripsi&quot;: &quot;Suscipit.&quot;,
                &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
                &quot;created_at&quot;: &quot;2024-06-30T19:47:46.000000Z&quot;,
                &quot;update_at&quot;: &quot;2024-06-30T19:47:46.000000Z&quot;
            }
        ]
    },
    {
        &quot;id&quot;: 4867,
        &quot;user_inspektor&quot;: null,
        &quot;asset&quot;: {
            &quot;id&quot;: 4,
            &quot;stockcode&quot;: &quot;163&quot;,
            &quot;code_asset&quot;: &quot;AST24070004&quot;,
            &quot;serialnumber&quot;: &quot;FAKESerial00004&quot;,
            &quot;nama_asset&quot;: &quot;Prof. Manuel Denesik III&quot;,
            &quot;merk&quot;: &quot;Quis sunt.&quot;,
            &quot;model&quot;: &quot;Quia.&quot;,
            &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
            &quot;spesifikasi&quot;: &quot;Rerum voluptas.&quot;,
            &quot;deskripsi&quot;: &quot;Iure totam.&quot;,
            &quot;lokasi&quot;: &quot;RCD1&quot;,
            &quot;kategori&quot;: [
                &quot;Aut.&quot;
            ],
            &quot;status&quot;: &quot;Dalam Perbaikan&quot;,
            &quot;updated_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;,
            &quot;created_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;
        },
        &quot;type&quot;: {
            &quot;id&quot;: 2,
            &quot;type&quot;: &quot;Breakdown&quot;
        },
        &quot;imagebefore&quot;: &quot;http://myapi.peltar.id/storage/Rerum quos fuga.&quot;,
        &quot;imageafter&quot;: &quot;http://myapi.peltar.id/Quam delectus laudantium sequi ut.&quot;,
        &quot;history&quot;: [
            {
                &quot;id&quot;: 9733,
                &quot;user&quot;: &quot;AdminMaintenance&quot;,
                &quot;status&quot;: &quot;Dalam Perbaikan&quot;,
                &quot;deskripsi&quot;: &quot;Placeat exercitationem.&quot;,
                &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
                &quot;created_at&quot;: &quot;2024-06-30T19:47:46.000000Z&quot;,
                &quot;update_at&quot;: &quot;2024-06-30T19:47:46.000000Z&quot;
            },
            {
                &quot;id&quot;: 9734,
                &quot;user&quot;: &quot;AdminMaintenance&quot;,
                &quot;status&quot;: &quot;Pending&quot;,
                &quot;deskripsi&quot;: &quot;Ex quod.&quot;,
                &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
                &quot;created_at&quot;: &quot;2024-06-30T19:47:46.000000Z&quot;,
                &quot;update_at&quot;: &quot;2024-06-30T19:47:46.000000Z&quot;
            }
        ]
    },
    {
        &quot;id&quot;: 4868,
        &quot;user_inspektor&quot;: null,
        &quot;asset&quot;: {
            &quot;id&quot;: 1,
            &quot;stockcode&quot;: &quot;114&quot;,
            &quot;code_asset&quot;: &quot;AST24070001&quot;,
            &quot;serialnumber&quot;: &quot;FAKESerial00001&quot;,
            &quot;nama_asset&quot;: &quot;Lloyd Casper&quot;,
            &quot;merk&quot;: &quot;Eos maxime omnis architecto et.&quot;,
            &quot;model&quot;: &quot;Consequuntur laboriosam.&quot;,
            &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
            &quot;spesifikasi&quot;: &quot;Dolorem quas consectetur fuga.&quot;,
            &quot;deskripsi&quot;: &quot;Nihil dolorum.&quot;,
            &quot;lokasi&quot;: &quot;Quo neque.&quot;,
            &quot;kategori&quot;: [
                &quot;Aut.&quot;
            ],
            &quot;status&quot;: &quot;Rusak&quot;,
            &quot;updated_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;,
            &quot;created_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;
        },
        &quot;type&quot;: {
            &quot;id&quot;: 1,
            &quot;type&quot;: &quot;Inspeksi&quot;
        },
        &quot;imagebefore&quot;: &quot;http://myapi.peltar.id/storage/Vero necessitatibus nisi placeat aut corporis adipisci.&quot;,
        &quot;imageafter&quot;: &quot;http://myapi.peltar.id/Perspiciatis non aliquam exercitationem ad.&quot;,
        &quot;history&quot;: [
            {
                &quot;id&quot;: 9735,
                &quot;user&quot;: &quot;Admin&quot;,
                &quot;status&quot;: &quot;Dalam Perbaikan&quot;,
                &quot;deskripsi&quot;: &quot;Sint.&quot;,
                &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
                &quot;created_at&quot;: &quot;2024-06-30T19:47:46.000000Z&quot;,
                &quot;update_at&quot;: &quot;2024-06-30T19:47:46.000000Z&quot;
            },
            {
                &quot;id&quot;: 9736,
                &quot;user&quot;: &quot;Admin&quot;,
                &quot;status&quot;: &quot;Pending&quot;,
                &quot;deskripsi&quot;: &quot;Error.&quot;,
                &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
                &quot;created_at&quot;: &quot;2024-06-30T19:47:46.000000Z&quot;,
                &quot;update_at&quot;: &quot;2024-06-30T19:47:46.000000Z&quot;
            }
        ]
    },
    {
        &quot;id&quot;: 4869,
        &quot;user_inspektor&quot;: null,
        &quot;asset&quot;: {
            &quot;id&quot;: 3,
            &quot;stockcode&quot;: &quot;21&quot;,
            &quot;code_asset&quot;: &quot;AST24070003&quot;,
            &quot;serialnumber&quot;: &quot;FAKESerial00003&quot;,
            &quot;nama_asset&quot;: &quot;Yvonne Fay Jr.&quot;,
            &quot;merk&quot;: &quot;Modi.&quot;,
            &quot;model&quot;: &quot;Beatae.&quot;,
            &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
            &quot;spesifikasi&quot;: &quot;Qui.&quot;,
            &quot;deskripsi&quot;: &quot;Quae neque sapiente laudantium.&quot;,
            &quot;lokasi&quot;: &quot;RCD2&quot;,
            &quot;kategori&quot;: [
                &quot;Dolore dolore.&quot;
            ],
            &quot;status&quot;: &quot;Dalam Perbaikan&quot;,
            &quot;updated_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;,
            &quot;created_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;
        },
        &quot;type&quot;: {
            &quot;id&quot;: 2,
            &quot;type&quot;: &quot;Breakdown&quot;
        },
        &quot;imagebefore&quot;: &quot;http://myapi.peltar.id/storage/Provident voluptatibus aspernatur at.&quot;,
        &quot;imageafter&quot;: &quot;http://myapi.peltar.id/Molestias non qui.&quot;,
        &quot;history&quot;: [
            {
                &quot;id&quot;: 9737,
                &quot;user&quot;: &quot;SuperUser&quot;,
                &quot;status&quot;: &quot;Dalam Perbaikan&quot;,
                &quot;deskripsi&quot;: &quot;Ea quod architecto voluptatem aspernatur.&quot;,
                &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
                &quot;created_at&quot;: &quot;2024-06-30T19:47:46.000000Z&quot;,
                &quot;update_at&quot;: &quot;2024-06-30T19:47:46.000000Z&quot;
            },
            {
                &quot;id&quot;: 9738,
                &quot;user&quot;: &quot;SuperUser&quot;,
                &quot;status&quot;: &quot;Selesai&quot;,
                &quot;deskripsi&quot;: &quot;Sed.&quot;,
                &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
                &quot;created_at&quot;: &quot;2024-06-30T19:47:46.000000Z&quot;,
                &quot;update_at&quot;: &quot;2024-06-30T19:47:46.000000Z&quot;
            }
        ]
    },
    {
        &quot;id&quot;: 4870,
        &quot;user_inspektor&quot;: null,
        &quot;asset&quot;: {
            &quot;id&quot;: 5,
            &quot;stockcode&quot;: &quot;106&quot;,
            &quot;code_asset&quot;: &quot;AST24070005&quot;,
            &quot;serialnumber&quot;: &quot;FAKESerial00005&quot;,
            &quot;nama_asset&quot;: &quot;Marietta Hermiston I&quot;,
            &quot;merk&quot;: &quot;Eum illum ut.&quot;,
            &quot;model&quot;: &quot;Qui.&quot;,
            &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
            &quot;spesifikasi&quot;: &quot;Eum aperiam vel.&quot;,
            &quot;deskripsi&quot;: &quot;Aut illo fugit.&quot;,
            &quot;lokasi&quot;: &quot;RCD2&quot;,
            &quot;kategori&quot;: [
                &quot;Corrupti quia.&quot;
            ],
            &quot;status&quot;: &quot;Dalam Perbaikan&quot;,
            &quot;updated_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;,
            &quot;created_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;
        },
        &quot;type&quot;: {
            &quot;id&quot;: 1,
            &quot;type&quot;: &quot;Inspeksi&quot;
        },
        &quot;imagebefore&quot;: &quot;http://myapi.peltar.id/storage/Est blanditiis veniam dolor odit.&quot;,
        &quot;imageafter&quot;: &quot;http://myapi.peltar.id/Vel quam enim inventore ex.&quot;,
        &quot;history&quot;: [
            {
                &quot;id&quot;: 9739,
                &quot;user&quot;: &quot;AdminMaintenance&quot;,
                &quot;status&quot;: &quot;Dalam Perbaikan&quot;,
                &quot;deskripsi&quot;: &quot;Delectus ipsum.&quot;,
                &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
                &quot;created_at&quot;: &quot;2024-06-30T19:47:46.000000Z&quot;,
                &quot;update_at&quot;: &quot;2024-06-30T19:47:46.000000Z&quot;
            },
            {
                &quot;id&quot;: 9740,
                &quot;user&quot;: &quot;AdminInspeksi&quot;,
                &quot;status&quot;: &quot;Pending&quot;,
                &quot;deskripsi&quot;: &quot;Perspiciatis consectetur est dicta.&quot;,
                &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
                &quot;created_at&quot;: &quot;2024-06-30T19:47:46.000000Z&quot;,
                &quot;update_at&quot;: &quot;2024-06-30T19:47:46.000000Z&quot;
            }
        ]
    },
    {
        &quot;id&quot;: 4871,
        &quot;user_inspektor&quot;: null,
        &quot;asset&quot;: {
            &quot;id&quot;: 5,
            &quot;stockcode&quot;: &quot;106&quot;,
            &quot;code_asset&quot;: &quot;AST24070005&quot;,
            &quot;serialnumber&quot;: &quot;FAKESerial00005&quot;,
            &quot;nama_asset&quot;: &quot;Marietta Hermiston I&quot;,
            &quot;merk&quot;: &quot;Eum illum ut.&quot;,
            &quot;model&quot;: &quot;Qui.&quot;,
            &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
            &quot;spesifikasi&quot;: &quot;Eum aperiam vel.&quot;,
            &quot;deskripsi&quot;: &quot;Aut illo fugit.&quot;,
            &quot;lokasi&quot;: &quot;RCD2&quot;,
            &quot;kategori&quot;: [
                &quot;Corrupti quia.&quot;
            ],
            &quot;status&quot;: &quot;Dalam Perbaikan&quot;,
            &quot;updated_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;,
            &quot;created_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;
        },
        &quot;type&quot;: {
            &quot;id&quot;: 1,
            &quot;type&quot;: &quot;Inspeksi&quot;
        },
        &quot;imagebefore&quot;: &quot;http://myapi.peltar.id/storage/Autem voluptate qui.&quot;,
        &quot;imageafter&quot;: &quot;http://myapi.peltar.id/Sit dolorem molestiae.&quot;,
        &quot;history&quot;: [
            {
                &quot;id&quot;: 9741,
                &quot;user&quot;: &quot;Admin&quot;,
                &quot;status&quot;: &quot;Pending&quot;,
                &quot;deskripsi&quot;: &quot;Cum possimus consequatur distinctio.&quot;,
                &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
                &quot;created_at&quot;: &quot;2024-06-30T19:47:46.000000Z&quot;,
                &quot;update_at&quot;: &quot;2024-06-30T19:47:46.000000Z&quot;
            },
            {
                &quot;id&quot;: 9742,
                &quot;user&quot;: &quot;Admin&quot;,
                &quot;status&quot;: &quot;Selesai&quot;,
                &quot;deskripsi&quot;: &quot;Ut architecto cumque quo.&quot;,
                &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
                &quot;created_at&quot;: &quot;2024-06-30T19:47:46.000000Z&quot;,
                &quot;update_at&quot;: &quot;2024-06-30T19:47:46.000000Z&quot;
            }
        ]
    },
    {
        &quot;id&quot;: 4872,
        &quot;user_inspektor&quot;: null,
        &quot;asset&quot;: {
            &quot;id&quot;: 5,
            &quot;stockcode&quot;: &quot;106&quot;,
            &quot;code_asset&quot;: &quot;AST24070005&quot;,
            &quot;serialnumber&quot;: &quot;FAKESerial00005&quot;,
            &quot;nama_asset&quot;: &quot;Marietta Hermiston I&quot;,
            &quot;merk&quot;: &quot;Eum illum ut.&quot;,
            &quot;model&quot;: &quot;Qui.&quot;,
            &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
            &quot;spesifikasi&quot;: &quot;Eum aperiam vel.&quot;,
            &quot;deskripsi&quot;: &quot;Aut illo fugit.&quot;,
            &quot;lokasi&quot;: &quot;RCD2&quot;,
            &quot;kategori&quot;: [
                &quot;Corrupti quia.&quot;
            ],
            &quot;status&quot;: &quot;Dalam Perbaikan&quot;,
            &quot;updated_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;,
            &quot;created_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;
        },
        &quot;type&quot;: {
            &quot;id&quot;: 1,
            &quot;type&quot;: &quot;Inspeksi&quot;
        },
        &quot;imagebefore&quot;: &quot;http://myapi.peltar.id/storage/Voluptatem quibusdam laborum eveniet.&quot;,
        &quot;imageafter&quot;: &quot;http://myapi.peltar.id/Alias delectus commodi vel labore.&quot;,
        &quot;history&quot;: [
            {
                &quot;id&quot;: 9743,
                &quot;user&quot;: &quot;AdminInspeksi&quot;,
                &quot;status&quot;: &quot;Selesai&quot;,
                &quot;deskripsi&quot;: &quot;Velit quas reprehenderit quis.&quot;,
                &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
                &quot;created_at&quot;: &quot;2024-06-30T19:47:46.000000Z&quot;,
                &quot;update_at&quot;: &quot;2024-06-30T19:47:46.000000Z&quot;
            },
            {
                &quot;id&quot;: 9744,
                &quot;user&quot;: &quot;Admin&quot;,
                &quot;status&quot;: &quot;Selesai&quot;,
                &quot;deskripsi&quot;: &quot;Non asperiores cumque.&quot;,
                &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
                &quot;created_at&quot;: &quot;2024-06-30T19:47:46.000000Z&quot;,
                &quot;update_at&quot;: &quot;2024-06-30T19:47:46.000000Z&quot;
            }
        ]
    },
    {
        &quot;id&quot;: 4873,
        &quot;user_inspektor&quot;: null,
        &quot;asset&quot;: {
            &quot;id&quot;: 2,
            &quot;stockcode&quot;: &quot;33&quot;,
            &quot;code_asset&quot;: &quot;AST24070002&quot;,
            &quot;serialnumber&quot;: &quot;FAKESerial00002&quot;,
            &quot;nama_asset&quot;: &quot;Maggie Frami&quot;,
            &quot;merk&quot;: &quot;Laboriosam repudiandae.&quot;,
            &quot;model&quot;: &quot;Quo doloribus.&quot;,
            &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
            &quot;spesifikasi&quot;: &quot;Enim illum non.&quot;,
            &quot;deskripsi&quot;: &quot;Non hic eius.&quot;,
            &quot;lokasi&quot;: &quot;Eveniet.&quot;,
            &quot;kategori&quot;: [
                &quot;Aut.&quot;
            ],
            &quot;status&quot;: &quot;Rusak&quot;,
            &quot;updated_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;,
            &quot;created_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;
        },
        &quot;type&quot;: {
            &quot;id&quot;: 2,
            &quot;type&quot;: &quot;Breakdown&quot;
        },
        &quot;imagebefore&quot;: &quot;http://myapi.peltar.id/storage/In ut voluptatem sunt aliquid.&quot;,
        &quot;imageafter&quot;: &quot;http://myapi.peltar.id/Voluptas voluptatem sint ullam nostrum.&quot;,
        &quot;history&quot;: [
            {
                &quot;id&quot;: 9745,
                &quot;user&quot;: &quot;Admin&quot;,
                &quot;status&quot;: &quot;Dalam Perbaikan&quot;,
                &quot;deskripsi&quot;: &quot;Et aperiam.&quot;,
                &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
                &quot;created_at&quot;: &quot;2024-06-30T19:47:46.000000Z&quot;,
                &quot;update_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;
            },
            {
                &quot;id&quot;: 9746,
                &quot;user&quot;: &quot;SuperUser&quot;,
                &quot;status&quot;: &quot;Pending&quot;,
                &quot;deskripsi&quot;: &quot;Recusandae quaerat.&quot;,
                &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
                &quot;created_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;,
                &quot;update_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;
            }
        ]
    },
    {
        &quot;id&quot;: 4874,
        &quot;user_inspektor&quot;: null,
        &quot;asset&quot;: {
            &quot;id&quot;: 4,
            &quot;stockcode&quot;: &quot;163&quot;,
            &quot;code_asset&quot;: &quot;AST24070004&quot;,
            &quot;serialnumber&quot;: &quot;FAKESerial00004&quot;,
            &quot;nama_asset&quot;: &quot;Prof. Manuel Denesik III&quot;,
            &quot;merk&quot;: &quot;Quis sunt.&quot;,
            &quot;model&quot;: &quot;Quia.&quot;,
            &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
            &quot;spesifikasi&quot;: &quot;Rerum voluptas.&quot;,
            &quot;deskripsi&quot;: &quot;Iure totam.&quot;,
            &quot;lokasi&quot;: &quot;RCD1&quot;,
            &quot;kategori&quot;: [
                &quot;Aut.&quot;
            ],
            &quot;status&quot;: &quot;Dalam Perbaikan&quot;,
            &quot;updated_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;,
            &quot;created_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;
        },
        &quot;type&quot;: {
            &quot;id&quot;: 1,
            &quot;type&quot;: &quot;Inspeksi&quot;
        },
        &quot;imagebefore&quot;: &quot;http://myapi.peltar.id/storage/Dignissimos est totam eum.&quot;,
        &quot;imageafter&quot;: &quot;http://myapi.peltar.id/Exercitationem esse.&quot;,
        &quot;history&quot;: [
            {
                &quot;id&quot;: 9747,
                &quot;user&quot;: &quot;Admin&quot;,
                &quot;status&quot;: &quot;Pending&quot;,
                &quot;deskripsi&quot;: &quot;Tenetur soluta est voluptate.&quot;,
                &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
                &quot;created_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;,
                &quot;update_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;
            },
            {
                &quot;id&quot;: 9748,
                &quot;user&quot;: &quot;AdminMaintenance&quot;,
                &quot;status&quot;: &quot;Selesai&quot;,
                &quot;deskripsi&quot;: &quot;Modi et.&quot;,
                &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
                &quot;created_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;,
                &quot;update_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;
            }
        ]
    },
    {
        &quot;id&quot;: 4875,
        &quot;user_inspektor&quot;: null,
        &quot;asset&quot;: {
            &quot;id&quot;: 3,
            &quot;stockcode&quot;: &quot;21&quot;,
            &quot;code_asset&quot;: &quot;AST24070003&quot;,
            &quot;serialnumber&quot;: &quot;FAKESerial00003&quot;,
            &quot;nama_asset&quot;: &quot;Yvonne Fay Jr.&quot;,
            &quot;merk&quot;: &quot;Modi.&quot;,
            &quot;model&quot;: &quot;Beatae.&quot;,
            &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
            &quot;spesifikasi&quot;: &quot;Qui.&quot;,
            &quot;deskripsi&quot;: &quot;Quae neque sapiente laudantium.&quot;,
            &quot;lokasi&quot;: &quot;RCD2&quot;,
            &quot;kategori&quot;: [
                &quot;Dolore dolore.&quot;
            ],
            &quot;status&quot;: &quot;Dalam Perbaikan&quot;,
            &quot;updated_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;,
            &quot;created_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;
        },
        &quot;type&quot;: {
            &quot;id&quot;: 1,
            &quot;type&quot;: &quot;Inspeksi&quot;
        },
        &quot;imagebefore&quot;: &quot;http://myapi.peltar.id/storage/Dolor repudiandae libero suscipit vel dolor.&quot;,
        &quot;imageafter&quot;: &quot;http://myapi.peltar.id/Reiciendis repudiandae quaerat quia similique impedit nobis.&quot;,
        &quot;history&quot;: [
            {
                &quot;id&quot;: 9749,
                &quot;user&quot;: &quot;AdminInspeksi&quot;,
                &quot;status&quot;: &quot;Pending&quot;,
                &quot;deskripsi&quot;: &quot;Reiciendis et qui soluta delectus.&quot;,
                &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
                &quot;created_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;,
                &quot;update_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;
            },
            {
                &quot;id&quot;: 9750,
                &quot;user&quot;: &quot;Admin&quot;,
                &quot;status&quot;: &quot;Selesai&quot;,
                &quot;deskripsi&quot;: &quot;Ullam quod sed minus.&quot;,
                &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
                &quot;created_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;,
                &quot;update_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;
            }
        ]
    },
    {
        &quot;id&quot;: 4876,
        &quot;user_inspektor&quot;: null,
        &quot;asset&quot;: {
            &quot;id&quot;: 1,
            &quot;stockcode&quot;: &quot;114&quot;,
            &quot;code_asset&quot;: &quot;AST24070001&quot;,
            &quot;serialnumber&quot;: &quot;FAKESerial00001&quot;,
            &quot;nama_asset&quot;: &quot;Lloyd Casper&quot;,
            &quot;merk&quot;: &quot;Eos maxime omnis architecto et.&quot;,
            &quot;model&quot;: &quot;Consequuntur laboriosam.&quot;,
            &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
            &quot;spesifikasi&quot;: &quot;Dolorem quas consectetur fuga.&quot;,
            &quot;deskripsi&quot;: &quot;Nihil dolorum.&quot;,
            &quot;lokasi&quot;: &quot;Quo neque.&quot;,
            &quot;kategori&quot;: [
                &quot;Aut.&quot;
            ],
            &quot;status&quot;: &quot;Rusak&quot;,
            &quot;updated_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;,
            &quot;created_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;
        },
        &quot;type&quot;: {
            &quot;id&quot;: 1,
            &quot;type&quot;: &quot;Inspeksi&quot;
        },
        &quot;imagebefore&quot;: &quot;http://myapi.peltar.id/storage/Sint vero numquam harum.&quot;,
        &quot;imageafter&quot;: &quot;http://myapi.peltar.id/Non incidunt ullam quaerat ad.&quot;,
        &quot;history&quot;: [
            {
                &quot;id&quot;: 9751,
                &quot;user&quot;: &quot;AdminInspeksi&quot;,
                &quot;status&quot;: &quot;Pending&quot;,
                &quot;deskripsi&quot;: &quot;Officiis dolorum autem nihil.&quot;,
                &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
                &quot;created_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;,
                &quot;update_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;
            },
            {
                &quot;id&quot;: 9752,
                &quot;user&quot;: &quot;AdminInspeksi&quot;,
                &quot;status&quot;: &quot;Pending&quot;,
                &quot;deskripsi&quot;: &quot;At dolor omnis eos aut.&quot;,
                &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
                &quot;created_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;,
                &quot;update_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;
            }
        ]
    },
    {
        &quot;id&quot;: 4877,
        &quot;user_inspektor&quot;: null,
        &quot;asset&quot;: {
            &quot;id&quot;: 5,
            &quot;stockcode&quot;: &quot;106&quot;,
            &quot;code_asset&quot;: &quot;AST24070005&quot;,
            &quot;serialnumber&quot;: &quot;FAKESerial00005&quot;,
            &quot;nama_asset&quot;: &quot;Marietta Hermiston I&quot;,
            &quot;merk&quot;: &quot;Eum illum ut.&quot;,
            &quot;model&quot;: &quot;Qui.&quot;,
            &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
            &quot;spesifikasi&quot;: &quot;Eum aperiam vel.&quot;,
            &quot;deskripsi&quot;: &quot;Aut illo fugit.&quot;,
            &quot;lokasi&quot;: &quot;RCD2&quot;,
            &quot;kategori&quot;: [
                &quot;Corrupti quia.&quot;
            ],
            &quot;status&quot;: &quot;Dalam Perbaikan&quot;,
            &quot;updated_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;,
            &quot;created_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;
        },
        &quot;type&quot;: {
            &quot;id&quot;: 1,
            &quot;type&quot;: &quot;Inspeksi&quot;
        },
        &quot;imagebefore&quot;: &quot;http://myapi.peltar.id/storage/Nisi doloribus sit voluptate iste.&quot;,
        &quot;imageafter&quot;: &quot;http://myapi.peltar.id/Culpa officiis culpa similique accusamus tenetur.&quot;,
        &quot;history&quot;: [
            {
                &quot;id&quot;: 9753,
                &quot;user&quot;: &quot;Admin&quot;,
                &quot;status&quot;: &quot;Dalam Perbaikan&quot;,
                &quot;deskripsi&quot;: &quot;Qui aut.&quot;,
                &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
                &quot;created_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;,
                &quot;update_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;
            },
            {
                &quot;id&quot;: 9754,
                &quot;user&quot;: &quot;Admin&quot;,
                &quot;status&quot;: &quot;Dalam Perbaikan&quot;,
                &quot;deskripsi&quot;: &quot;Cupiditate id.&quot;,
                &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
                &quot;created_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;,
                &quot;update_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;
            }
        ]
    },
    {
        &quot;id&quot;: 4878,
        &quot;user_inspektor&quot;: null,
        &quot;asset&quot;: {
            &quot;id&quot;: 1,
            &quot;stockcode&quot;: &quot;114&quot;,
            &quot;code_asset&quot;: &quot;AST24070001&quot;,
            &quot;serialnumber&quot;: &quot;FAKESerial00001&quot;,
            &quot;nama_asset&quot;: &quot;Lloyd Casper&quot;,
            &quot;merk&quot;: &quot;Eos maxime omnis architecto et.&quot;,
            &quot;model&quot;: &quot;Consequuntur laboriosam.&quot;,
            &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
            &quot;spesifikasi&quot;: &quot;Dolorem quas consectetur fuga.&quot;,
            &quot;deskripsi&quot;: &quot;Nihil dolorum.&quot;,
            &quot;lokasi&quot;: &quot;Quo neque.&quot;,
            &quot;kategori&quot;: [
                &quot;Aut.&quot;
            ],
            &quot;status&quot;: &quot;Rusak&quot;,
            &quot;updated_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;,
            &quot;created_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;
        },
        &quot;type&quot;: {
            &quot;id&quot;: 2,
            &quot;type&quot;: &quot;Breakdown&quot;
        },
        &quot;imagebefore&quot;: &quot;http://myapi.peltar.id/storage/Veritatis sed nobis fugit dolor ea.&quot;,
        &quot;imageafter&quot;: &quot;http://myapi.peltar.id/Tenetur qui nobis doloribus animi corrupti voluptatem.&quot;,
        &quot;history&quot;: [
            {
                &quot;id&quot;: 9755,
                &quot;user&quot;: &quot;Admin&quot;,
                &quot;status&quot;: &quot;Selesai&quot;,
                &quot;deskripsi&quot;: &quot;Delectus ipsum dolorem.&quot;,
                &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
                &quot;created_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;,
                &quot;update_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;
            },
            {
                &quot;id&quot;: 9756,
                &quot;user&quot;: &quot;Admin&quot;,
                &quot;status&quot;: &quot;Selesai&quot;,
                &quot;deskripsi&quot;: &quot;Qui consequatur adipisci.&quot;,
                &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
                &quot;created_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;,
                &quot;update_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;
            }
        ]
    },
    {
        &quot;id&quot;: 4879,
        &quot;user_inspektor&quot;: null,
        &quot;asset&quot;: {
            &quot;id&quot;: 4,
            &quot;stockcode&quot;: &quot;163&quot;,
            &quot;code_asset&quot;: &quot;AST24070004&quot;,
            &quot;serialnumber&quot;: &quot;FAKESerial00004&quot;,
            &quot;nama_asset&quot;: &quot;Prof. Manuel Denesik III&quot;,
            &quot;merk&quot;: &quot;Quis sunt.&quot;,
            &quot;model&quot;: &quot;Quia.&quot;,
            &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
            &quot;spesifikasi&quot;: &quot;Rerum voluptas.&quot;,
            &quot;deskripsi&quot;: &quot;Iure totam.&quot;,
            &quot;lokasi&quot;: &quot;RCD1&quot;,
            &quot;kategori&quot;: [
                &quot;Aut.&quot;
            ],
            &quot;status&quot;: &quot;Dalam Perbaikan&quot;,
            &quot;updated_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;,
            &quot;created_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;
        },
        &quot;type&quot;: {
            &quot;id&quot;: 1,
            &quot;type&quot;: &quot;Inspeksi&quot;
        },
        &quot;imagebefore&quot;: &quot;http://myapi.peltar.id/storage/Possimus vel facere ut enim.&quot;,
        &quot;imageafter&quot;: &quot;http://myapi.peltar.id/Delectus qui reprehenderit.&quot;,
        &quot;history&quot;: [
            {
                &quot;id&quot;: 9757,
                &quot;user&quot;: &quot;AdminInspeksi&quot;,
                &quot;status&quot;: &quot;Dalam Perbaikan&quot;,
                &quot;deskripsi&quot;: &quot;Molestiae est.&quot;,
                &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
                &quot;created_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;,
                &quot;update_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;
            },
            {
                &quot;id&quot;: 9758,
                &quot;user&quot;: &quot;Admin&quot;,
                &quot;status&quot;: &quot;Pending&quot;,
                &quot;deskripsi&quot;: &quot;Dolorem quo.&quot;,
                &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
                &quot;created_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;,
                &quot;update_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;
            }
        ]
    },
    {
        &quot;id&quot;: 4880,
        &quot;user_inspektor&quot;: null,
        &quot;asset&quot;: {
            &quot;id&quot;: 5,
            &quot;stockcode&quot;: &quot;106&quot;,
            &quot;code_asset&quot;: &quot;AST24070005&quot;,
            &quot;serialnumber&quot;: &quot;FAKESerial00005&quot;,
            &quot;nama_asset&quot;: &quot;Marietta Hermiston I&quot;,
            &quot;merk&quot;: &quot;Eum illum ut.&quot;,
            &quot;model&quot;: &quot;Qui.&quot;,
            &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
            &quot;spesifikasi&quot;: &quot;Eum aperiam vel.&quot;,
            &quot;deskripsi&quot;: &quot;Aut illo fugit.&quot;,
            &quot;lokasi&quot;: &quot;RCD2&quot;,
            &quot;kategori&quot;: [
                &quot;Corrupti quia.&quot;
            ],
            &quot;status&quot;: &quot;Dalam Perbaikan&quot;,
            &quot;updated_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;,
            &quot;created_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;
        },
        &quot;type&quot;: {
            &quot;id&quot;: 2,
            &quot;type&quot;: &quot;Breakdown&quot;
        },
        &quot;imagebefore&quot;: &quot;http://myapi.peltar.id/storage/Ea hic occaecati cum quo.&quot;,
        &quot;imageafter&quot;: &quot;http://myapi.peltar.id/Omnis consequuntur minima.&quot;,
        &quot;history&quot;: [
            {
                &quot;id&quot;: 9759,
                &quot;user&quot;: &quot;AdminInspeksi&quot;,
                &quot;status&quot;: &quot;Selesai&quot;,
                &quot;deskripsi&quot;: &quot;Placeat ipsam autem quisquam.&quot;,
                &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
                &quot;created_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;,
                &quot;update_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;
            },
            {
                &quot;id&quot;: 9760,
                &quot;user&quot;: &quot;SuperUser&quot;,
                &quot;status&quot;: &quot;Dalam Perbaikan&quot;,
                &quot;deskripsi&quot;: &quot;Commodi officiis.&quot;,
                &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
                &quot;created_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;,
                &quot;update_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;
            }
        ]
    },
    {
        &quot;id&quot;: 4881,
        &quot;user_inspektor&quot;: null,
        &quot;asset&quot;: {
            &quot;id&quot;: 5,
            &quot;stockcode&quot;: &quot;106&quot;,
            &quot;code_asset&quot;: &quot;AST24070005&quot;,
            &quot;serialnumber&quot;: &quot;FAKESerial00005&quot;,
            &quot;nama_asset&quot;: &quot;Marietta Hermiston I&quot;,
            &quot;merk&quot;: &quot;Eum illum ut.&quot;,
            &quot;model&quot;: &quot;Qui.&quot;,
            &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
            &quot;spesifikasi&quot;: &quot;Eum aperiam vel.&quot;,
            &quot;deskripsi&quot;: &quot;Aut illo fugit.&quot;,
            &quot;lokasi&quot;: &quot;RCD2&quot;,
            &quot;kategori&quot;: [
                &quot;Corrupti quia.&quot;
            ],
            &quot;status&quot;: &quot;Dalam Perbaikan&quot;,
            &quot;updated_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;,
            &quot;created_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;
        },
        &quot;type&quot;: {
            &quot;id&quot;: 2,
            &quot;type&quot;: &quot;Breakdown&quot;
        },
        &quot;imagebefore&quot;: &quot;http://myapi.peltar.id/storage/Praesentium repellendus iste.&quot;,
        &quot;imageafter&quot;: &quot;http://myapi.peltar.id/Inventore atque eius dolorem.&quot;,
        &quot;history&quot;: [
            {
                &quot;id&quot;: 9761,
                &quot;user&quot;: &quot;Admin&quot;,
                &quot;status&quot;: &quot;Dalam Perbaikan&quot;,
                &quot;deskripsi&quot;: &quot;Labore.&quot;,
                &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
                &quot;created_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;,
                &quot;update_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;
            },
            {
                &quot;id&quot;: 9762,
                &quot;user&quot;: &quot;SuperUser&quot;,
                &quot;status&quot;: &quot;Selesai&quot;,
                &quot;deskripsi&quot;: &quot;Repudiandae dolorem non.&quot;,
                &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
                &quot;created_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;,
                &quot;update_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;
            }
        ]
    },
    {
        &quot;id&quot;: 4882,
        &quot;user_inspektor&quot;: null,
        &quot;asset&quot;: {
            &quot;id&quot;: 1,
            &quot;stockcode&quot;: &quot;114&quot;,
            &quot;code_asset&quot;: &quot;AST24070001&quot;,
            &quot;serialnumber&quot;: &quot;FAKESerial00001&quot;,
            &quot;nama_asset&quot;: &quot;Lloyd Casper&quot;,
            &quot;merk&quot;: &quot;Eos maxime omnis architecto et.&quot;,
            &quot;model&quot;: &quot;Consequuntur laboriosam.&quot;,
            &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
            &quot;spesifikasi&quot;: &quot;Dolorem quas consectetur fuga.&quot;,
            &quot;deskripsi&quot;: &quot;Nihil dolorum.&quot;,
            &quot;lokasi&quot;: &quot;Quo neque.&quot;,
            &quot;kategori&quot;: [
                &quot;Aut.&quot;
            ],
            &quot;status&quot;: &quot;Rusak&quot;,
            &quot;updated_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;,
            &quot;created_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;
        },
        &quot;type&quot;: {
            &quot;id&quot;: 1,
            &quot;type&quot;: &quot;Inspeksi&quot;
        },
        &quot;imagebefore&quot;: &quot;http://myapi.peltar.id/storage/Accusantium id repellendus.&quot;,
        &quot;imageafter&quot;: &quot;http://myapi.peltar.id/Dolorum in et quia sint.&quot;,
        &quot;history&quot;: [
            {
                &quot;id&quot;: 9763,
                &quot;user&quot;: &quot;Admin&quot;,
                &quot;status&quot;: &quot;Pending&quot;,
                &quot;deskripsi&quot;: &quot;Sint impedit cum.&quot;,
                &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
                &quot;created_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;,
                &quot;update_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;
            },
            {
                &quot;id&quot;: 9764,
                &quot;user&quot;: &quot;SuperUser&quot;,
                &quot;status&quot;: &quot;Selesai&quot;,
                &quot;deskripsi&quot;: &quot;Quia voluptate.&quot;,
                &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
                &quot;created_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;,
                &quot;update_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;
            }
        ]
    },
    {
        &quot;id&quot;: 4883,
        &quot;user_inspektor&quot;: null,
        &quot;asset&quot;: {
            &quot;id&quot;: 4,
            &quot;stockcode&quot;: &quot;163&quot;,
            &quot;code_asset&quot;: &quot;AST24070004&quot;,
            &quot;serialnumber&quot;: &quot;FAKESerial00004&quot;,
            &quot;nama_asset&quot;: &quot;Prof. Manuel Denesik III&quot;,
            &quot;merk&quot;: &quot;Quis sunt.&quot;,
            &quot;model&quot;: &quot;Quia.&quot;,
            &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
            &quot;spesifikasi&quot;: &quot;Rerum voluptas.&quot;,
            &quot;deskripsi&quot;: &quot;Iure totam.&quot;,
            &quot;lokasi&quot;: &quot;RCD1&quot;,
            &quot;kategori&quot;: [
                &quot;Aut.&quot;
            ],
            &quot;status&quot;: &quot;Dalam Perbaikan&quot;,
            &quot;updated_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;,
            &quot;created_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;
        },
        &quot;type&quot;: {
            &quot;id&quot;: 1,
            &quot;type&quot;: &quot;Inspeksi&quot;
        },
        &quot;imagebefore&quot;: &quot;http://myapi.peltar.id/storage/Voluptatem quis aliquid qui dolores.&quot;,
        &quot;imageafter&quot;: &quot;http://myapi.peltar.id/Maiores nihil at similique nihil.&quot;,
        &quot;history&quot;: [
            {
                &quot;id&quot;: 9765,
                &quot;user&quot;: &quot;Admin&quot;,
                &quot;status&quot;: &quot;Dalam Perbaikan&quot;,
                &quot;deskripsi&quot;: &quot;Aut et unde.&quot;,
                &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
                &quot;created_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;,
                &quot;update_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;
            },
            {
                &quot;id&quot;: 9766,
                &quot;user&quot;: &quot;AdminMaintenance&quot;,
                &quot;status&quot;: &quot;Pending&quot;,
                &quot;deskripsi&quot;: &quot;Eveniet at nobis.&quot;,
                &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
                &quot;created_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;,
                &quot;update_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;
            }
        ]
    },
    {
        &quot;id&quot;: 4884,
        &quot;user_inspektor&quot;: null,
        &quot;asset&quot;: {
            &quot;id&quot;: 2,
            &quot;stockcode&quot;: &quot;33&quot;,
            &quot;code_asset&quot;: &quot;AST24070002&quot;,
            &quot;serialnumber&quot;: &quot;FAKESerial00002&quot;,
            &quot;nama_asset&quot;: &quot;Maggie Frami&quot;,
            &quot;merk&quot;: &quot;Laboriosam repudiandae.&quot;,
            &quot;model&quot;: &quot;Quo doloribus.&quot;,
            &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
            &quot;spesifikasi&quot;: &quot;Enim illum non.&quot;,
            &quot;deskripsi&quot;: &quot;Non hic eius.&quot;,
            &quot;lokasi&quot;: &quot;Eveniet.&quot;,
            &quot;kategori&quot;: [
                &quot;Aut.&quot;
            ],
            &quot;status&quot;: &quot;Rusak&quot;,
            &quot;updated_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;,
            &quot;created_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;
        },
        &quot;type&quot;: {
            &quot;id&quot;: 2,
            &quot;type&quot;: &quot;Breakdown&quot;
        },
        &quot;imagebefore&quot;: &quot;http://myapi.peltar.id/storage/Beatae nemo earum sit.&quot;,
        &quot;imageafter&quot;: &quot;http://myapi.peltar.id/Quo reprehenderit consectetur atque qui quidem.&quot;,
        &quot;history&quot;: [
            {
                &quot;id&quot;: 9767,
                &quot;user&quot;: &quot;AdminMaintenance&quot;,
                &quot;status&quot;: &quot;Dalam Perbaikan&quot;,
                &quot;deskripsi&quot;: &quot;Sed sunt.&quot;,
                &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
                &quot;created_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;,
                &quot;update_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;
            },
            {
                &quot;id&quot;: 9768,
                &quot;user&quot;: &quot;Admin&quot;,
                &quot;status&quot;: &quot;Selesai&quot;,
                &quot;deskripsi&quot;: &quot;Qui sed.&quot;,
                &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
                &quot;created_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;,
                &quot;update_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;
            }
        ]
    },
    {
        &quot;id&quot;: 4885,
        &quot;user_inspektor&quot;: null,
        &quot;asset&quot;: {
            &quot;id&quot;: 4,
            &quot;stockcode&quot;: &quot;163&quot;,
            &quot;code_asset&quot;: &quot;AST24070004&quot;,
            &quot;serialnumber&quot;: &quot;FAKESerial00004&quot;,
            &quot;nama_asset&quot;: &quot;Prof. Manuel Denesik III&quot;,
            &quot;merk&quot;: &quot;Quis sunt.&quot;,
            &quot;model&quot;: &quot;Quia.&quot;,
            &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
            &quot;spesifikasi&quot;: &quot;Rerum voluptas.&quot;,
            &quot;deskripsi&quot;: &quot;Iure totam.&quot;,
            &quot;lokasi&quot;: &quot;RCD1&quot;,
            &quot;kategori&quot;: [
                &quot;Aut.&quot;
            ],
            &quot;status&quot;: &quot;Dalam Perbaikan&quot;,
            &quot;updated_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;,
            &quot;created_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;
        },
        &quot;type&quot;: {
            &quot;id&quot;: 1,
            &quot;type&quot;: &quot;Inspeksi&quot;
        },
        &quot;imagebefore&quot;: &quot;http://myapi.peltar.id/storage/Porro accusantium ut labore.&quot;,
        &quot;imageafter&quot;: &quot;http://myapi.peltar.id/Dignissimos ab.&quot;,
        &quot;history&quot;: [
            {
                &quot;id&quot;: 9769,
                &quot;user&quot;: &quot;SuperUser&quot;,
                &quot;status&quot;: &quot;Dalam Perbaikan&quot;,
                &quot;deskripsi&quot;: &quot;At natus.&quot;,
                &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
                &quot;created_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;,
                &quot;update_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;
            },
            {
                &quot;id&quot;: 9770,
                &quot;user&quot;: &quot;Admin&quot;,
                &quot;status&quot;: &quot;Dalam Perbaikan&quot;,
                &quot;deskripsi&quot;: &quot;Ut in excepturi dicta.&quot;,
                &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
                &quot;created_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;,
                &quot;update_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;
            }
        ]
    },
    {
        &quot;id&quot;: 4886,
        &quot;user_inspektor&quot;: null,
        &quot;asset&quot;: {
            &quot;id&quot;: 5,
            &quot;stockcode&quot;: &quot;106&quot;,
            &quot;code_asset&quot;: &quot;AST24070005&quot;,
            &quot;serialnumber&quot;: &quot;FAKESerial00005&quot;,
            &quot;nama_asset&quot;: &quot;Marietta Hermiston I&quot;,
            &quot;merk&quot;: &quot;Eum illum ut.&quot;,
            &quot;model&quot;: &quot;Qui.&quot;,
            &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
            &quot;spesifikasi&quot;: &quot;Eum aperiam vel.&quot;,
            &quot;deskripsi&quot;: &quot;Aut illo fugit.&quot;,
            &quot;lokasi&quot;: &quot;RCD2&quot;,
            &quot;kategori&quot;: [
                &quot;Corrupti quia.&quot;
            ],
            &quot;status&quot;: &quot;Dalam Perbaikan&quot;,
            &quot;updated_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;,
            &quot;created_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;
        },
        &quot;type&quot;: {
            &quot;id&quot;: 1,
            &quot;type&quot;: &quot;Inspeksi&quot;
        },
        &quot;imagebefore&quot;: &quot;http://myapi.peltar.id/storage/Aperiam quo.&quot;,
        &quot;imageafter&quot;: &quot;http://myapi.peltar.id/Impedit necessitatibus quaerat.&quot;,
        &quot;history&quot;: [
            {
                &quot;id&quot;: 9771,
                &quot;user&quot;: &quot;AdminInspeksi&quot;,
                &quot;status&quot;: &quot;Selesai&quot;,
                &quot;deskripsi&quot;: &quot;Et numquam est.&quot;,
                &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
                &quot;created_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;,
                &quot;update_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;
            },
            {
                &quot;id&quot;: 9772,
                &quot;user&quot;: &quot;AdminMaintenance&quot;,
                &quot;status&quot;: &quot;Dalam Perbaikan&quot;,
                &quot;deskripsi&quot;: &quot;Odit porro officiis dolores repellendus.&quot;,
                &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
                &quot;created_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;,
                &quot;update_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;
            }
        ]
    },
    {
        &quot;id&quot;: 4887,
        &quot;user_inspektor&quot;: null,
        &quot;asset&quot;: {
            &quot;id&quot;: 2,
            &quot;stockcode&quot;: &quot;33&quot;,
            &quot;code_asset&quot;: &quot;AST24070002&quot;,
            &quot;serialnumber&quot;: &quot;FAKESerial00002&quot;,
            &quot;nama_asset&quot;: &quot;Maggie Frami&quot;,
            &quot;merk&quot;: &quot;Laboriosam repudiandae.&quot;,
            &quot;model&quot;: &quot;Quo doloribus.&quot;,
            &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
            &quot;spesifikasi&quot;: &quot;Enim illum non.&quot;,
            &quot;deskripsi&quot;: &quot;Non hic eius.&quot;,
            &quot;lokasi&quot;: &quot;Eveniet.&quot;,
            &quot;kategori&quot;: [
                &quot;Aut.&quot;
            ],
            &quot;status&quot;: &quot;Rusak&quot;,
            &quot;updated_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;,
            &quot;created_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;
        },
        &quot;type&quot;: {
            &quot;id&quot;: 2,
            &quot;type&quot;: &quot;Breakdown&quot;
        },
        &quot;imagebefore&quot;: &quot;http://myapi.peltar.id/storage/Ea pariatur.&quot;,
        &quot;imageafter&quot;: &quot;http://myapi.peltar.id/Dicta qui.&quot;,
        &quot;history&quot;: [
            {
                &quot;id&quot;: 9773,
                &quot;user&quot;: &quot;Admin&quot;,
                &quot;status&quot;: &quot;Pending&quot;,
                &quot;deskripsi&quot;: &quot;Repellat rerum.&quot;,
                &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
                &quot;created_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;,
                &quot;update_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;
            },
            {
                &quot;id&quot;: 9774,
                &quot;user&quot;: &quot;SuperUser&quot;,
                &quot;status&quot;: &quot;Selesai&quot;,
                &quot;deskripsi&quot;: &quot;Ut ea ut amet.&quot;,
                &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
                &quot;created_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;,
                &quot;update_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;
            }
        ]
    },
    {
        &quot;id&quot;: 4888,
        &quot;user_inspektor&quot;: null,
        &quot;asset&quot;: {
            &quot;id&quot;: 4,
            &quot;stockcode&quot;: &quot;163&quot;,
            &quot;code_asset&quot;: &quot;AST24070004&quot;,
            &quot;serialnumber&quot;: &quot;FAKESerial00004&quot;,
            &quot;nama_asset&quot;: &quot;Prof. Manuel Denesik III&quot;,
            &quot;merk&quot;: &quot;Quis sunt.&quot;,
            &quot;model&quot;: &quot;Quia.&quot;,
            &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
            &quot;spesifikasi&quot;: &quot;Rerum voluptas.&quot;,
            &quot;deskripsi&quot;: &quot;Iure totam.&quot;,
            &quot;lokasi&quot;: &quot;RCD1&quot;,
            &quot;kategori&quot;: [
                &quot;Aut.&quot;
            ],
            &quot;status&quot;: &quot;Dalam Perbaikan&quot;,
            &quot;updated_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;,
            &quot;created_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;
        },
        &quot;type&quot;: {
            &quot;id&quot;: 2,
            &quot;type&quot;: &quot;Breakdown&quot;
        },
        &quot;imagebefore&quot;: &quot;http://myapi.peltar.id/storage/Aut praesentium natus.&quot;,
        &quot;imageafter&quot;: &quot;http://myapi.peltar.id/Voluptatum in repudiandae ducimus et architecto.&quot;,
        &quot;history&quot;: [
            {
                &quot;id&quot;: 9775,
                &quot;user&quot;: &quot;SuperUser&quot;,
                &quot;status&quot;: &quot;Selesai&quot;,
                &quot;deskripsi&quot;: &quot;Voluptate molestias.&quot;,
                &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
                &quot;created_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;,
                &quot;update_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;
            },
            {
                &quot;id&quot;: 9776,
                &quot;user&quot;: &quot;AdminInspeksi&quot;,
                &quot;status&quot;: &quot;Selesai&quot;,
                &quot;deskripsi&quot;: &quot;Culpa commodi.&quot;,
                &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
                &quot;created_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;,
                &quot;update_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;
            }
        ]
    },
    {
        &quot;id&quot;: 4889,
        &quot;user_inspektor&quot;: null,
        &quot;asset&quot;: {
            &quot;id&quot;: 5,
            &quot;stockcode&quot;: &quot;106&quot;,
            &quot;code_asset&quot;: &quot;AST24070005&quot;,
            &quot;serialnumber&quot;: &quot;FAKESerial00005&quot;,
            &quot;nama_asset&quot;: &quot;Marietta Hermiston I&quot;,
            &quot;merk&quot;: &quot;Eum illum ut.&quot;,
            &quot;model&quot;: &quot;Qui.&quot;,
            &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
            &quot;spesifikasi&quot;: &quot;Eum aperiam vel.&quot;,
            &quot;deskripsi&quot;: &quot;Aut illo fugit.&quot;,
            &quot;lokasi&quot;: &quot;RCD2&quot;,
            &quot;kategori&quot;: [
                &quot;Corrupti quia.&quot;
            ],
            &quot;status&quot;: &quot;Dalam Perbaikan&quot;,
            &quot;updated_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;,
            &quot;created_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;
        },
        &quot;type&quot;: {
            &quot;id&quot;: 2,
            &quot;type&quot;: &quot;Breakdown&quot;
        },
        &quot;imagebefore&quot;: &quot;http://myapi.peltar.id/storage/Repellendus sed.&quot;,
        &quot;imageafter&quot;: &quot;http://myapi.peltar.id/Similique et cum quaerat.&quot;,
        &quot;history&quot;: [
            {
                &quot;id&quot;: 9777,
                &quot;user&quot;: &quot;AdminMaintenance&quot;,
                &quot;status&quot;: &quot;Pending&quot;,
                &quot;deskripsi&quot;: &quot;Rerum ut atque.&quot;,
                &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
                &quot;created_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;,
                &quot;update_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;
            },
            {
                &quot;id&quot;: 9778,
                &quot;user&quot;: &quot;SuperUser&quot;,
                &quot;status&quot;: &quot;Dalam Perbaikan&quot;,
                &quot;deskripsi&quot;: &quot;Fugit modi est id et.&quot;,
                &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
                &quot;created_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;,
                &quot;update_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;
            }
        ]
    },
    {
        &quot;id&quot;: 4890,
        &quot;user_inspektor&quot;: null,
        &quot;asset&quot;: {
            &quot;id&quot;: 1,
            &quot;stockcode&quot;: &quot;114&quot;,
            &quot;code_asset&quot;: &quot;AST24070001&quot;,
            &quot;serialnumber&quot;: &quot;FAKESerial00001&quot;,
            &quot;nama_asset&quot;: &quot;Lloyd Casper&quot;,
            &quot;merk&quot;: &quot;Eos maxime omnis architecto et.&quot;,
            &quot;model&quot;: &quot;Consequuntur laboriosam.&quot;,
            &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
            &quot;spesifikasi&quot;: &quot;Dolorem quas consectetur fuga.&quot;,
            &quot;deskripsi&quot;: &quot;Nihil dolorum.&quot;,
            &quot;lokasi&quot;: &quot;Quo neque.&quot;,
            &quot;kategori&quot;: [
                &quot;Aut.&quot;
            ],
            &quot;status&quot;: &quot;Rusak&quot;,
            &quot;updated_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;,
            &quot;created_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;
        },
        &quot;type&quot;: {
            &quot;id&quot;: 1,
            &quot;type&quot;: &quot;Inspeksi&quot;
        },
        &quot;imagebefore&quot;: &quot;http://myapi.peltar.id/storage/Qui tempore officiis ipsa cumque minus beatae.&quot;,
        &quot;imageafter&quot;: &quot;http://myapi.peltar.id/Sed deserunt tempora rerum incidunt.&quot;,
        &quot;history&quot;: [
            {
                &quot;id&quot;: 9779,
                &quot;user&quot;: &quot;Admin&quot;,
                &quot;status&quot;: &quot;Pending&quot;,
                &quot;deskripsi&quot;: &quot;Aut tempora.&quot;,
                &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
                &quot;created_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;,
                &quot;update_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;
            },
            {
                &quot;id&quot;: 9780,
                &quot;user&quot;: &quot;Admin&quot;,
                &quot;status&quot;: &quot;Dalam Perbaikan&quot;,
                &quot;deskripsi&quot;: &quot;In repellat.&quot;,
                &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
                &quot;created_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;,
                &quot;update_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;
            }
        ]
    },
    {
        &quot;id&quot;: 4891,
        &quot;user_inspektor&quot;: null,
        &quot;asset&quot;: {
            &quot;id&quot;: 4,
            &quot;stockcode&quot;: &quot;163&quot;,
            &quot;code_asset&quot;: &quot;AST24070004&quot;,
            &quot;serialnumber&quot;: &quot;FAKESerial00004&quot;,
            &quot;nama_asset&quot;: &quot;Prof. Manuel Denesik III&quot;,
            &quot;merk&quot;: &quot;Quis sunt.&quot;,
            &quot;model&quot;: &quot;Quia.&quot;,
            &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
            &quot;spesifikasi&quot;: &quot;Rerum voluptas.&quot;,
            &quot;deskripsi&quot;: &quot;Iure totam.&quot;,
            &quot;lokasi&quot;: &quot;RCD1&quot;,
            &quot;kategori&quot;: [
                &quot;Aut.&quot;
            ],
            &quot;status&quot;: &quot;Dalam Perbaikan&quot;,
            &quot;updated_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;,
            &quot;created_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;
        },
        &quot;type&quot;: {
            &quot;id&quot;: 1,
            &quot;type&quot;: &quot;Inspeksi&quot;
        },
        &quot;imagebefore&quot;: &quot;http://myapi.peltar.id/storage/Vel sint.&quot;,
        &quot;imageafter&quot;: &quot;http://myapi.peltar.id/Animi aut dolor quia sint.&quot;,
        &quot;history&quot;: [
            {
                &quot;id&quot;: 9781,
                &quot;user&quot;: &quot;SuperUser&quot;,
                &quot;status&quot;: &quot;Dalam Perbaikan&quot;,
                &quot;deskripsi&quot;: &quot;Ut quasi.&quot;,
                &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
                &quot;created_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;,
                &quot;update_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;
            },
            {
                &quot;id&quot;: 9782,
                &quot;user&quot;: &quot;Admin&quot;,
                &quot;status&quot;: &quot;Selesai&quot;,
                &quot;deskripsi&quot;: &quot;Dolorum quia ex nesciunt.&quot;,
                &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
                &quot;created_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;,
                &quot;update_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;
            }
        ]
    },
    {
        &quot;id&quot;: 4892,
        &quot;user_inspektor&quot;: null,
        &quot;asset&quot;: {
            &quot;id&quot;: 2,
            &quot;stockcode&quot;: &quot;33&quot;,
            &quot;code_asset&quot;: &quot;AST24070002&quot;,
            &quot;serialnumber&quot;: &quot;FAKESerial00002&quot;,
            &quot;nama_asset&quot;: &quot;Maggie Frami&quot;,
            &quot;merk&quot;: &quot;Laboriosam repudiandae.&quot;,
            &quot;model&quot;: &quot;Quo doloribus.&quot;,
            &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
            &quot;spesifikasi&quot;: &quot;Enim illum non.&quot;,
            &quot;deskripsi&quot;: &quot;Non hic eius.&quot;,
            &quot;lokasi&quot;: &quot;Eveniet.&quot;,
            &quot;kategori&quot;: [
                &quot;Aut.&quot;
            ],
            &quot;status&quot;: &quot;Rusak&quot;,
            &quot;updated_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;,
            &quot;created_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;
        },
        &quot;type&quot;: {
            &quot;id&quot;: 1,
            &quot;type&quot;: &quot;Inspeksi&quot;
        },
        &quot;imagebefore&quot;: &quot;http://myapi.peltar.id/storage/Explicabo explicabo facere aliquid.&quot;,
        &quot;imageafter&quot;: &quot;http://myapi.peltar.id/Enim laudantium ea quia id.&quot;,
        &quot;history&quot;: [
            {
                &quot;id&quot;: 9783,
                &quot;user&quot;: &quot;AdminInspeksi&quot;,
                &quot;status&quot;: &quot;Pending&quot;,
                &quot;deskripsi&quot;: &quot;Et tenetur quis quam.&quot;,
                &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
                &quot;created_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;,
                &quot;update_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;
            },
            {
                &quot;id&quot;: 9784,
                &quot;user&quot;: &quot;SuperUser&quot;,
                &quot;status&quot;: &quot;Selesai&quot;,
                &quot;deskripsi&quot;: &quot;Aliquid aperiam.&quot;,
                &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
                &quot;created_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;,
                &quot;update_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;
            }
        ]
    },
    {
        &quot;id&quot;: 4893,
        &quot;user_inspektor&quot;: null,
        &quot;asset&quot;: {
            &quot;id&quot;: 5,
            &quot;stockcode&quot;: &quot;106&quot;,
            &quot;code_asset&quot;: &quot;AST24070005&quot;,
            &quot;serialnumber&quot;: &quot;FAKESerial00005&quot;,
            &quot;nama_asset&quot;: &quot;Marietta Hermiston I&quot;,
            &quot;merk&quot;: &quot;Eum illum ut.&quot;,
            &quot;model&quot;: &quot;Qui.&quot;,
            &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
            &quot;spesifikasi&quot;: &quot;Eum aperiam vel.&quot;,
            &quot;deskripsi&quot;: &quot;Aut illo fugit.&quot;,
            &quot;lokasi&quot;: &quot;RCD2&quot;,
            &quot;kategori&quot;: [
                &quot;Corrupti quia.&quot;
            ],
            &quot;status&quot;: &quot;Dalam Perbaikan&quot;,
            &quot;updated_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;,
            &quot;created_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;
        },
        &quot;type&quot;: {
            &quot;id&quot;: 1,
            &quot;type&quot;: &quot;Inspeksi&quot;
        },
        &quot;imagebefore&quot;: &quot;http://myapi.peltar.id/storage/Ab consequatur.&quot;,
        &quot;imageafter&quot;: &quot;http://myapi.peltar.id/Assumenda et veritatis.&quot;,
        &quot;history&quot;: [
            {
                &quot;id&quot;: 9785,
                &quot;user&quot;: &quot;SuperUser&quot;,
                &quot;status&quot;: &quot;Pending&quot;,
                &quot;deskripsi&quot;: &quot;Blanditiis quo.&quot;,
                &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
                &quot;created_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;,
                &quot;update_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;
            },
            {
                &quot;id&quot;: 9786,
                &quot;user&quot;: &quot;SuperUser&quot;,
                &quot;status&quot;: &quot;Dalam Perbaikan&quot;,
                &quot;deskripsi&quot;: &quot;Nihil et distinctio.&quot;,
                &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
                &quot;created_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;,
                &quot;update_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;
            }
        ]
    },
    {
        &quot;id&quot;: 4894,
        &quot;user_inspektor&quot;: null,
        &quot;asset&quot;: {
            &quot;id&quot;: 3,
            &quot;stockcode&quot;: &quot;21&quot;,
            &quot;code_asset&quot;: &quot;AST24070003&quot;,
            &quot;serialnumber&quot;: &quot;FAKESerial00003&quot;,
            &quot;nama_asset&quot;: &quot;Yvonne Fay Jr.&quot;,
            &quot;merk&quot;: &quot;Modi.&quot;,
            &quot;model&quot;: &quot;Beatae.&quot;,
            &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
            &quot;spesifikasi&quot;: &quot;Qui.&quot;,
            &quot;deskripsi&quot;: &quot;Quae neque sapiente laudantium.&quot;,
            &quot;lokasi&quot;: &quot;RCD2&quot;,
            &quot;kategori&quot;: [
                &quot;Dolore dolore.&quot;
            ],
            &quot;status&quot;: &quot;Dalam Perbaikan&quot;,
            &quot;updated_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;,
            &quot;created_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;
        },
        &quot;type&quot;: {
            &quot;id&quot;: 2,
            &quot;type&quot;: &quot;Breakdown&quot;
        },
        &quot;imagebefore&quot;: &quot;http://myapi.peltar.id/storage/Omnis aut modi non aut ut.&quot;,
        &quot;imageafter&quot;: &quot;http://myapi.peltar.id/Quibusdam sint.&quot;,
        &quot;history&quot;: [
            {
                &quot;id&quot;: 9787,
                &quot;user&quot;: &quot;AdminInspeksi&quot;,
                &quot;status&quot;: &quot;Selesai&quot;,
                &quot;deskripsi&quot;: &quot;Quis illum a est expedita.&quot;,
                &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
                &quot;created_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;,
                &quot;update_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;
            },
            {
                &quot;id&quot;: 9788,
                &quot;user&quot;: &quot;SuperUser&quot;,
                &quot;status&quot;: &quot;Pending&quot;,
                &quot;deskripsi&quot;: &quot;Rerum omnis.&quot;,
                &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
                &quot;created_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;,
                &quot;update_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;
            }
        ]
    },
    {
        &quot;id&quot;: 4895,
        &quot;user_inspektor&quot;: null,
        &quot;asset&quot;: {
            &quot;id&quot;: 4,
            &quot;stockcode&quot;: &quot;163&quot;,
            &quot;code_asset&quot;: &quot;AST24070004&quot;,
            &quot;serialnumber&quot;: &quot;FAKESerial00004&quot;,
            &quot;nama_asset&quot;: &quot;Prof. Manuel Denesik III&quot;,
            &quot;merk&quot;: &quot;Quis sunt.&quot;,
            &quot;model&quot;: &quot;Quia.&quot;,
            &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
            &quot;spesifikasi&quot;: &quot;Rerum voluptas.&quot;,
            &quot;deskripsi&quot;: &quot;Iure totam.&quot;,
            &quot;lokasi&quot;: &quot;RCD1&quot;,
            &quot;kategori&quot;: [
                &quot;Aut.&quot;
            ],
            &quot;status&quot;: &quot;Dalam Perbaikan&quot;,
            &quot;updated_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;,
            &quot;created_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;
        },
        &quot;type&quot;: {
            &quot;id&quot;: 1,
            &quot;type&quot;: &quot;Inspeksi&quot;
        },
        &quot;imagebefore&quot;: &quot;http://myapi.peltar.id/storage/Fugit molestiae quam repellendus.&quot;,
        &quot;imageafter&quot;: &quot;http://myapi.peltar.id/Rerum iusto consequatur.&quot;,
        &quot;history&quot;: [
            {
                &quot;id&quot;: 9789,
                &quot;user&quot;: &quot;SuperUser&quot;,
                &quot;status&quot;: &quot;Pending&quot;,
                &quot;deskripsi&quot;: &quot;Voluptas dolores culpa ipsum.&quot;,
                &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
                &quot;created_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;,
                &quot;update_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;
            },
            {
                &quot;id&quot;: 9790,
                &quot;user&quot;: &quot;SuperUser&quot;,
                &quot;status&quot;: &quot;Selesai&quot;,
                &quot;deskripsi&quot;: &quot;Quidem optio nulla consectetur.&quot;,
                &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
                &quot;created_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;,
                &quot;update_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;
            }
        ]
    },
    {
        &quot;id&quot;: 4896,
        &quot;user_inspektor&quot;: null,
        &quot;asset&quot;: {
            &quot;id&quot;: 1,
            &quot;stockcode&quot;: &quot;114&quot;,
            &quot;code_asset&quot;: &quot;AST24070001&quot;,
            &quot;serialnumber&quot;: &quot;FAKESerial00001&quot;,
            &quot;nama_asset&quot;: &quot;Lloyd Casper&quot;,
            &quot;merk&quot;: &quot;Eos maxime omnis architecto et.&quot;,
            &quot;model&quot;: &quot;Consequuntur laboriosam.&quot;,
            &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
            &quot;spesifikasi&quot;: &quot;Dolorem quas consectetur fuga.&quot;,
            &quot;deskripsi&quot;: &quot;Nihil dolorum.&quot;,
            &quot;lokasi&quot;: &quot;Quo neque.&quot;,
            &quot;kategori&quot;: [
                &quot;Aut.&quot;
            ],
            &quot;status&quot;: &quot;Rusak&quot;,
            &quot;updated_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;,
            &quot;created_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;
        },
        &quot;type&quot;: {
            &quot;id&quot;: 2,
            &quot;type&quot;: &quot;Breakdown&quot;
        },
        &quot;imagebefore&quot;: &quot;http://myapi.peltar.id/storage/Nisi quas.&quot;,
        &quot;imageafter&quot;: &quot;http://myapi.peltar.id/Vitae aperiam amet aliquid asperiores debitis.&quot;,
        &quot;history&quot;: [
            {
                &quot;id&quot;: 9791,
                &quot;user&quot;: &quot;AdminInspeksi&quot;,
                &quot;status&quot;: &quot;Pending&quot;,
                &quot;deskripsi&quot;: &quot;Est libero molestiae.&quot;,
                &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
                &quot;created_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;,
                &quot;update_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;
            },
            {
                &quot;id&quot;: 9792,
                &quot;user&quot;: &quot;SuperUser&quot;,
                &quot;status&quot;: &quot;Pending&quot;,
                &quot;deskripsi&quot;: &quot;Quod sit qui voluptas dolorum.&quot;,
                &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
                &quot;created_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;,
                &quot;update_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;
            }
        ]
    },
    {
        &quot;id&quot;: 4897,
        &quot;user_inspektor&quot;: null,
        &quot;asset&quot;: {
            &quot;id&quot;: 2,
            &quot;stockcode&quot;: &quot;33&quot;,
            &quot;code_asset&quot;: &quot;AST24070002&quot;,
            &quot;serialnumber&quot;: &quot;FAKESerial00002&quot;,
            &quot;nama_asset&quot;: &quot;Maggie Frami&quot;,
            &quot;merk&quot;: &quot;Laboriosam repudiandae.&quot;,
            &quot;model&quot;: &quot;Quo doloribus.&quot;,
            &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
            &quot;spesifikasi&quot;: &quot;Enim illum non.&quot;,
            &quot;deskripsi&quot;: &quot;Non hic eius.&quot;,
            &quot;lokasi&quot;: &quot;Eveniet.&quot;,
            &quot;kategori&quot;: [
                &quot;Aut.&quot;
            ],
            &quot;status&quot;: &quot;Rusak&quot;,
            &quot;updated_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;,
            &quot;created_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;
        },
        &quot;type&quot;: {
            &quot;id&quot;: 1,
            &quot;type&quot;: &quot;Inspeksi&quot;
        },
        &quot;imagebefore&quot;: &quot;http://myapi.peltar.id/storage/Rem quisquam dolorem consequatur.&quot;,
        &quot;imageafter&quot;: &quot;http://myapi.peltar.id/Pariatur autem voluptas.&quot;,
        &quot;history&quot;: [
            {
                &quot;id&quot;: 9793,
                &quot;user&quot;: &quot;SuperUser&quot;,
                &quot;status&quot;: &quot;Dalam Perbaikan&quot;,
                &quot;deskripsi&quot;: &quot;Illo et.&quot;,
                &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
                &quot;created_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;,
                &quot;update_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;
            },
            {
                &quot;id&quot;: 9794,
                &quot;user&quot;: &quot;AdminMaintenance&quot;,
                &quot;status&quot;: &quot;Dalam Perbaikan&quot;,
                &quot;deskripsi&quot;: &quot;Quia totam placeat aut qui.&quot;,
                &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
                &quot;created_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;,
                &quot;update_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;
            }
        ]
    },
    {
        &quot;id&quot;: 4898,
        &quot;user_inspektor&quot;: null,
        &quot;asset&quot;: {
            &quot;id&quot;: 3,
            &quot;stockcode&quot;: &quot;21&quot;,
            &quot;code_asset&quot;: &quot;AST24070003&quot;,
            &quot;serialnumber&quot;: &quot;FAKESerial00003&quot;,
            &quot;nama_asset&quot;: &quot;Yvonne Fay Jr.&quot;,
            &quot;merk&quot;: &quot;Modi.&quot;,
            &quot;model&quot;: &quot;Beatae.&quot;,
            &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
            &quot;spesifikasi&quot;: &quot;Qui.&quot;,
            &quot;deskripsi&quot;: &quot;Quae neque sapiente laudantium.&quot;,
            &quot;lokasi&quot;: &quot;RCD2&quot;,
            &quot;kategori&quot;: [
                &quot;Dolore dolore.&quot;
            ],
            &quot;status&quot;: &quot;Dalam Perbaikan&quot;,
            &quot;updated_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;,
            &quot;created_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;
        },
        &quot;type&quot;: {
            &quot;id&quot;: 1,
            &quot;type&quot;: &quot;Inspeksi&quot;
        },
        &quot;imagebefore&quot;: &quot;http://myapi.peltar.id/storage/Asperiores saepe itaque architecto.&quot;,
        &quot;imageafter&quot;: &quot;http://myapi.peltar.id/Explicabo officiis sunt sint.&quot;,
        &quot;history&quot;: [
            {
                &quot;id&quot;: 9795,
                &quot;user&quot;: &quot;SuperUser&quot;,
                &quot;status&quot;: &quot;Selesai&quot;,
                &quot;deskripsi&quot;: &quot;Voluptas voluptatem excepturi dolorem.&quot;,
                &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
                &quot;created_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;,
                &quot;update_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;
            },
            {
                &quot;id&quot;: 9796,
                &quot;user&quot;: &quot;AdminInspeksi&quot;,
                &quot;status&quot;: &quot;Pending&quot;,
                &quot;deskripsi&quot;: &quot;Quisquam non maxime aut.&quot;,
                &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
                &quot;created_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;,
                &quot;update_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;
            }
        ]
    },
    {
        &quot;id&quot;: 4899,
        &quot;user_inspektor&quot;: null,
        &quot;asset&quot;: {
            &quot;id&quot;: 2,
            &quot;stockcode&quot;: &quot;33&quot;,
            &quot;code_asset&quot;: &quot;AST24070002&quot;,
            &quot;serialnumber&quot;: &quot;FAKESerial00002&quot;,
            &quot;nama_asset&quot;: &quot;Maggie Frami&quot;,
            &quot;merk&quot;: &quot;Laboriosam repudiandae.&quot;,
            &quot;model&quot;: &quot;Quo doloribus.&quot;,
            &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
            &quot;spesifikasi&quot;: &quot;Enim illum non.&quot;,
            &quot;deskripsi&quot;: &quot;Non hic eius.&quot;,
            &quot;lokasi&quot;: &quot;Eveniet.&quot;,
            &quot;kategori&quot;: [
                &quot;Aut.&quot;
            ],
            &quot;status&quot;: &quot;Rusak&quot;,
            &quot;updated_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;,
            &quot;created_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;
        },
        &quot;type&quot;: {
            &quot;id&quot;: 1,
            &quot;type&quot;: &quot;Inspeksi&quot;
        },
        &quot;imagebefore&quot;: &quot;http://myapi.peltar.id/storage/Deleniti minus est.&quot;,
        &quot;imageafter&quot;: &quot;http://myapi.peltar.id/Natus quidem voluptatem.&quot;,
        &quot;history&quot;: [
            {
                &quot;id&quot;: 9797,
                &quot;user&quot;: &quot;AdminMaintenance&quot;,
                &quot;status&quot;: &quot;Dalam Perbaikan&quot;,
                &quot;deskripsi&quot;: &quot;Quisquam similique non.&quot;,
                &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
                &quot;created_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;,
                &quot;update_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;
            },
            {
                &quot;id&quot;: 9798,
                &quot;user&quot;: &quot;AdminInspeksi&quot;,
                &quot;status&quot;: &quot;Dalam Perbaikan&quot;,
                &quot;deskripsi&quot;: &quot;Aut.&quot;,
                &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
                &quot;created_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;,
                &quot;update_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;
            }
        ]
    },
    {
        &quot;id&quot;: 4900,
        &quot;user_inspektor&quot;: null,
        &quot;asset&quot;: {
            &quot;id&quot;: 1,
            &quot;stockcode&quot;: &quot;114&quot;,
            &quot;code_asset&quot;: &quot;AST24070001&quot;,
            &quot;serialnumber&quot;: &quot;FAKESerial00001&quot;,
            &quot;nama_asset&quot;: &quot;Lloyd Casper&quot;,
            &quot;merk&quot;: &quot;Eos maxime omnis architecto et.&quot;,
            &quot;model&quot;: &quot;Consequuntur laboriosam.&quot;,
            &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
            &quot;spesifikasi&quot;: &quot;Dolorem quas consectetur fuga.&quot;,
            &quot;deskripsi&quot;: &quot;Nihil dolorum.&quot;,
            &quot;lokasi&quot;: &quot;Quo neque.&quot;,
            &quot;kategori&quot;: [
                &quot;Aut.&quot;
            ],
            &quot;status&quot;: &quot;Rusak&quot;,
            &quot;updated_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;,
            &quot;created_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;
        },
        &quot;type&quot;: {
            &quot;id&quot;: 2,
            &quot;type&quot;: &quot;Breakdown&quot;
        },
        &quot;imagebefore&quot;: &quot;http://myapi.peltar.id/storage/Quaerat inventore laudantium dolor perspiciatis.&quot;,
        &quot;imageafter&quot;: &quot;http://myapi.peltar.id/Dolor et ut eos sed.&quot;,
        &quot;history&quot;: [
            {
                &quot;id&quot;: 9799,
                &quot;user&quot;: &quot;AdminMaintenance&quot;,
                &quot;status&quot;: &quot;Selesai&quot;,
                &quot;deskripsi&quot;: &quot;Accusamus dolorem maxime.&quot;,
                &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
                &quot;created_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;,
                &quot;update_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;
            },
            {
                &quot;id&quot;: 9800,
                &quot;user&quot;: &quot;SuperUser&quot;,
                &quot;status&quot;: &quot;Selesai&quot;,
                &quot;deskripsi&quot;: &quot;Et impedit consectetur eum et.&quot;,
                &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
                &quot;created_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;,
                &quot;update_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;
            }
        ]
    },
    {
        &quot;id&quot;: 4901,
        &quot;user_inspektor&quot;: null,
        &quot;asset&quot;: {
            &quot;id&quot;: 4,
            &quot;stockcode&quot;: &quot;163&quot;,
            &quot;code_asset&quot;: &quot;AST24070004&quot;,
            &quot;serialnumber&quot;: &quot;FAKESerial00004&quot;,
            &quot;nama_asset&quot;: &quot;Prof. Manuel Denesik III&quot;,
            &quot;merk&quot;: &quot;Quis sunt.&quot;,
            &quot;model&quot;: &quot;Quia.&quot;,
            &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
            &quot;spesifikasi&quot;: &quot;Rerum voluptas.&quot;,
            &quot;deskripsi&quot;: &quot;Iure totam.&quot;,
            &quot;lokasi&quot;: &quot;RCD1&quot;,
            &quot;kategori&quot;: [
                &quot;Aut.&quot;
            ],
            &quot;status&quot;: &quot;Dalam Perbaikan&quot;,
            &quot;updated_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;,
            &quot;created_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;
        },
        &quot;type&quot;: {
            &quot;id&quot;: 2,
            &quot;type&quot;: &quot;Breakdown&quot;
        },
        &quot;imagebefore&quot;: &quot;http://myapi.peltar.id/storage/Perspiciatis pariatur.&quot;,
        &quot;imageafter&quot;: &quot;http://myapi.peltar.id/Possimus non accusamus inventore.&quot;,
        &quot;history&quot;: [
            {
                &quot;id&quot;: 9801,
                &quot;user&quot;: &quot;SuperUser&quot;,
                &quot;status&quot;: &quot;Selesai&quot;,
                &quot;deskripsi&quot;: &quot;Et quo quis.&quot;,
                &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
                &quot;created_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;,
                &quot;update_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;
            },
            {
                &quot;id&quot;: 9802,
                &quot;user&quot;: &quot;SuperUser&quot;,
                &quot;status&quot;: &quot;Pending&quot;,
                &quot;deskripsi&quot;: &quot;Qui hic.&quot;,
                &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
                &quot;created_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;,
                &quot;update_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;
            }
        ]
    },
    {
        &quot;id&quot;: 4902,
        &quot;user_inspektor&quot;: null,
        &quot;asset&quot;: {
            &quot;id&quot;: 2,
            &quot;stockcode&quot;: &quot;33&quot;,
            &quot;code_asset&quot;: &quot;AST24070002&quot;,
            &quot;serialnumber&quot;: &quot;FAKESerial00002&quot;,
            &quot;nama_asset&quot;: &quot;Maggie Frami&quot;,
            &quot;merk&quot;: &quot;Laboriosam repudiandae.&quot;,
            &quot;model&quot;: &quot;Quo doloribus.&quot;,
            &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
            &quot;spesifikasi&quot;: &quot;Enim illum non.&quot;,
            &quot;deskripsi&quot;: &quot;Non hic eius.&quot;,
            &quot;lokasi&quot;: &quot;Eveniet.&quot;,
            &quot;kategori&quot;: [
                &quot;Aut.&quot;
            ],
            &quot;status&quot;: &quot;Rusak&quot;,
            &quot;updated_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;,
            &quot;created_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;
        },
        &quot;type&quot;: {
            &quot;id&quot;: 1,
            &quot;type&quot;: &quot;Inspeksi&quot;
        },
        &quot;imagebefore&quot;: &quot;http://myapi.peltar.id/storage/Temporibus officia ipsam sint nobis.&quot;,
        &quot;imageafter&quot;: &quot;http://myapi.peltar.id/Neque corporis.&quot;,
        &quot;history&quot;: [
            {
                &quot;id&quot;: 9803,
                &quot;user&quot;: &quot;Admin&quot;,
                &quot;status&quot;: &quot;Pending&quot;,
                &quot;deskripsi&quot;: &quot;Facere nulla voluptas.&quot;,
                &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
                &quot;created_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;,
                &quot;update_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;
            },
            {
                &quot;id&quot;: 9804,
                &quot;user&quot;: &quot;SuperUser&quot;,
                &quot;status&quot;: &quot;Selesai&quot;,
                &quot;deskripsi&quot;: &quot;Aut nulla eaque illum.&quot;,
                &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
                &quot;created_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;,
                &quot;update_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;
            }
        ]
    },
    {
        &quot;id&quot;: 4903,
        &quot;user_inspektor&quot;: null,
        &quot;asset&quot;: {
            &quot;id&quot;: 5,
            &quot;stockcode&quot;: &quot;106&quot;,
            &quot;code_asset&quot;: &quot;AST24070005&quot;,
            &quot;serialnumber&quot;: &quot;FAKESerial00005&quot;,
            &quot;nama_asset&quot;: &quot;Marietta Hermiston I&quot;,
            &quot;merk&quot;: &quot;Eum illum ut.&quot;,
            &quot;model&quot;: &quot;Qui.&quot;,
            &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
            &quot;spesifikasi&quot;: &quot;Eum aperiam vel.&quot;,
            &quot;deskripsi&quot;: &quot;Aut illo fugit.&quot;,
            &quot;lokasi&quot;: &quot;RCD2&quot;,
            &quot;kategori&quot;: [
                &quot;Corrupti quia.&quot;
            ],
            &quot;status&quot;: &quot;Dalam Perbaikan&quot;,
            &quot;updated_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;,
            &quot;created_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;
        },
        &quot;type&quot;: {
            &quot;id&quot;: 1,
            &quot;type&quot;: &quot;Inspeksi&quot;
        },
        &quot;imagebefore&quot;: &quot;http://myapi.peltar.id/storage/Et vero totam.&quot;,
        &quot;imageafter&quot;: &quot;http://myapi.peltar.id/Totam accusantium.&quot;,
        &quot;history&quot;: [
            {
                &quot;id&quot;: 9805,
                &quot;user&quot;: &quot;SuperUser&quot;,
                &quot;status&quot;: &quot;Selesai&quot;,
                &quot;deskripsi&quot;: &quot;Dolorem vel.&quot;,
                &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
                &quot;created_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;,
                &quot;update_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;
            },
            {
                &quot;id&quot;: 9806,
                &quot;user&quot;: &quot;AdminInspeksi&quot;,
                &quot;status&quot;: &quot;Selesai&quot;,
                &quot;deskripsi&quot;: &quot;Atque soluta.&quot;,
                &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
                &quot;created_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;,
                &quot;update_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;
            }
        ]
    },
    {
        &quot;id&quot;: 4904,
        &quot;user_inspektor&quot;: null,
        &quot;asset&quot;: {
            &quot;id&quot;: 4,
            &quot;stockcode&quot;: &quot;163&quot;,
            &quot;code_asset&quot;: &quot;AST24070004&quot;,
            &quot;serialnumber&quot;: &quot;FAKESerial00004&quot;,
            &quot;nama_asset&quot;: &quot;Prof. Manuel Denesik III&quot;,
            &quot;merk&quot;: &quot;Quis sunt.&quot;,
            &quot;model&quot;: &quot;Quia.&quot;,
            &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
            &quot;spesifikasi&quot;: &quot;Rerum voluptas.&quot;,
            &quot;deskripsi&quot;: &quot;Iure totam.&quot;,
            &quot;lokasi&quot;: &quot;RCD1&quot;,
            &quot;kategori&quot;: [
                &quot;Aut.&quot;
            ],
            &quot;status&quot;: &quot;Dalam Perbaikan&quot;,
            &quot;updated_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;,
            &quot;created_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;
        },
        &quot;type&quot;: {
            &quot;id&quot;: 1,
            &quot;type&quot;: &quot;Inspeksi&quot;
        },
        &quot;imagebefore&quot;: &quot;http://myapi.peltar.id/storage/Doloribus quia aut.&quot;,
        &quot;imageafter&quot;: &quot;http://myapi.peltar.id/Tempore nobis aut minima.&quot;,
        &quot;history&quot;: [
            {
                &quot;id&quot;: 9807,
                &quot;user&quot;: &quot;SuperUser&quot;,
                &quot;status&quot;: &quot;Selesai&quot;,
                &quot;deskripsi&quot;: &quot;Fuga qui placeat.&quot;,
                &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
                &quot;created_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;,
                &quot;update_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;
            },
            {
                &quot;id&quot;: 9808,
                &quot;user&quot;: &quot;AdminInspeksi&quot;,
                &quot;status&quot;: &quot;Selesai&quot;,
                &quot;deskripsi&quot;: &quot;Necessitatibus rem nihil consectetur aut.&quot;,
                &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
                &quot;created_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;,
                &quot;update_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;
            }
        ]
    },
    {
        &quot;id&quot;: 4905,
        &quot;user_inspektor&quot;: null,
        &quot;asset&quot;: {
            &quot;id&quot;: 5,
            &quot;stockcode&quot;: &quot;106&quot;,
            &quot;code_asset&quot;: &quot;AST24070005&quot;,
            &quot;serialnumber&quot;: &quot;FAKESerial00005&quot;,
            &quot;nama_asset&quot;: &quot;Marietta Hermiston I&quot;,
            &quot;merk&quot;: &quot;Eum illum ut.&quot;,
            &quot;model&quot;: &quot;Qui.&quot;,
            &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
            &quot;spesifikasi&quot;: &quot;Eum aperiam vel.&quot;,
            &quot;deskripsi&quot;: &quot;Aut illo fugit.&quot;,
            &quot;lokasi&quot;: &quot;RCD2&quot;,
            &quot;kategori&quot;: [
                &quot;Corrupti quia.&quot;
            ],
            &quot;status&quot;: &quot;Dalam Perbaikan&quot;,
            &quot;updated_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;,
            &quot;created_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;
        },
        &quot;type&quot;: {
            &quot;id&quot;: 1,
            &quot;type&quot;: &quot;Inspeksi&quot;
        },
        &quot;imagebefore&quot;: &quot;http://myapi.peltar.id/storage/Excepturi aut qui voluptates adipisci iure ut.&quot;,
        &quot;imageafter&quot;: &quot;http://myapi.peltar.id/Aut voluptatem voluptas aut quo.&quot;,
        &quot;history&quot;: [
            {
                &quot;id&quot;: 9809,
                &quot;user&quot;: &quot;SuperUser&quot;,
                &quot;status&quot;: &quot;Selesai&quot;,
                &quot;deskripsi&quot;: &quot;Ea.&quot;,
                &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
                &quot;created_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;,
                &quot;update_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;
            },
            {
                &quot;id&quot;: 9810,
                &quot;user&quot;: &quot;AdminInspeksi&quot;,
                &quot;status&quot;: &quot;Pending&quot;,
                &quot;deskripsi&quot;: &quot;Et perferendis nesciunt.&quot;,
                &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
                &quot;created_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;,
                &quot;update_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;
            }
        ]
    },
    {
        &quot;id&quot;: 4906,
        &quot;user_inspektor&quot;: null,
        &quot;asset&quot;: {
            &quot;id&quot;: 4,
            &quot;stockcode&quot;: &quot;163&quot;,
            &quot;code_asset&quot;: &quot;AST24070004&quot;,
            &quot;serialnumber&quot;: &quot;FAKESerial00004&quot;,
            &quot;nama_asset&quot;: &quot;Prof. Manuel Denesik III&quot;,
            &quot;merk&quot;: &quot;Quis sunt.&quot;,
            &quot;model&quot;: &quot;Quia.&quot;,
            &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
            &quot;spesifikasi&quot;: &quot;Rerum voluptas.&quot;,
            &quot;deskripsi&quot;: &quot;Iure totam.&quot;,
            &quot;lokasi&quot;: &quot;RCD1&quot;,
            &quot;kategori&quot;: [
                &quot;Aut.&quot;
            ],
            &quot;status&quot;: &quot;Dalam Perbaikan&quot;,
            &quot;updated_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;,
            &quot;created_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;
        },
        &quot;type&quot;: {
            &quot;id&quot;: 2,
            &quot;type&quot;: &quot;Breakdown&quot;
        },
        &quot;imagebefore&quot;: &quot;http://myapi.peltar.id/storage/Ipsam quo consequuntur sit maiores.&quot;,
        &quot;imageafter&quot;: &quot;http://myapi.peltar.id/Fuga blanditiis pariatur totam ut.&quot;,
        &quot;history&quot;: [
            {
                &quot;id&quot;: 9811,
                &quot;user&quot;: &quot;AdminMaintenance&quot;,
                &quot;status&quot;: &quot;Dalam Perbaikan&quot;,
                &quot;deskripsi&quot;: &quot;Facere magni.&quot;,
                &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
                &quot;created_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;,
                &quot;update_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;
            },
            {
                &quot;id&quot;: 9812,
                &quot;user&quot;: &quot;AdminMaintenance&quot;,
                &quot;status&quot;: &quot;Dalam Perbaikan&quot;,
                &quot;deskripsi&quot;: &quot;Eius.&quot;,
                &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
                &quot;created_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;,
                &quot;update_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;
            }
        ]
    },
    {
        &quot;id&quot;: 4907,
        &quot;user_inspektor&quot;: null,
        &quot;asset&quot;: {
            &quot;id&quot;: 2,
            &quot;stockcode&quot;: &quot;33&quot;,
            &quot;code_asset&quot;: &quot;AST24070002&quot;,
            &quot;serialnumber&quot;: &quot;FAKESerial00002&quot;,
            &quot;nama_asset&quot;: &quot;Maggie Frami&quot;,
            &quot;merk&quot;: &quot;Laboriosam repudiandae.&quot;,
            &quot;model&quot;: &quot;Quo doloribus.&quot;,
            &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
            &quot;spesifikasi&quot;: &quot;Enim illum non.&quot;,
            &quot;deskripsi&quot;: &quot;Non hic eius.&quot;,
            &quot;lokasi&quot;: &quot;Eveniet.&quot;,
            &quot;kategori&quot;: [
                &quot;Aut.&quot;
            ],
            &quot;status&quot;: &quot;Rusak&quot;,
            &quot;updated_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;,
            &quot;created_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;
        },
        &quot;type&quot;: {
            &quot;id&quot;: 1,
            &quot;type&quot;: &quot;Inspeksi&quot;
        },
        &quot;imagebefore&quot;: &quot;http://myapi.peltar.id/storage/Sequi non provident et.&quot;,
        &quot;imageafter&quot;: &quot;http://myapi.peltar.id/Perspiciatis quo voluptas.&quot;,
        &quot;history&quot;: [
            {
                &quot;id&quot;: 9813,
                &quot;user&quot;: &quot;AdminInspeksi&quot;,
                &quot;status&quot;: &quot;Pending&quot;,
                &quot;deskripsi&quot;: &quot;Omnis sint alias et aut cumque.&quot;,
                &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
                &quot;created_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;,
                &quot;update_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;
            },
            {
                &quot;id&quot;: 9814,
                &quot;user&quot;: &quot;Admin&quot;,
                &quot;status&quot;: &quot;Pending&quot;,
                &quot;deskripsi&quot;: &quot;Excepturi cum.&quot;,
                &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
                &quot;created_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;,
                &quot;update_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;
            }
        ]
    },
    {
        &quot;id&quot;: 4908,
        &quot;user_inspektor&quot;: null,
        &quot;asset&quot;: {
            &quot;id&quot;: 5,
            &quot;stockcode&quot;: &quot;106&quot;,
            &quot;code_asset&quot;: &quot;AST24070005&quot;,
            &quot;serialnumber&quot;: &quot;FAKESerial00005&quot;,
            &quot;nama_asset&quot;: &quot;Marietta Hermiston I&quot;,
            &quot;merk&quot;: &quot;Eum illum ut.&quot;,
            &quot;model&quot;: &quot;Qui.&quot;,
            &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
            &quot;spesifikasi&quot;: &quot;Eum aperiam vel.&quot;,
            &quot;deskripsi&quot;: &quot;Aut illo fugit.&quot;,
            &quot;lokasi&quot;: &quot;RCD2&quot;,
            &quot;kategori&quot;: [
                &quot;Corrupti quia.&quot;
            ],
            &quot;status&quot;: &quot;Dalam Perbaikan&quot;,
            &quot;updated_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;,
            &quot;created_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;
        },
        &quot;type&quot;: {
            &quot;id&quot;: 1,
            &quot;type&quot;: &quot;Inspeksi&quot;
        },
        &quot;imagebefore&quot;: &quot;http://myapi.peltar.id/storage/Beatae nisi esse.&quot;,
        &quot;imageafter&quot;: &quot;http://myapi.peltar.id/Nobis in voluptas.&quot;,
        &quot;history&quot;: [
            {
                &quot;id&quot;: 9815,
                &quot;user&quot;: &quot;AdminMaintenance&quot;,
                &quot;status&quot;: &quot;Selesai&quot;,
                &quot;deskripsi&quot;: &quot;Sit.&quot;,
                &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
                &quot;created_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;,
                &quot;update_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;
            },
            {
                &quot;id&quot;: 9816,
                &quot;user&quot;: &quot;Admin&quot;,
                &quot;status&quot;: &quot;Pending&quot;,
                &quot;deskripsi&quot;: &quot;Neque illum ipsum aut possimus.&quot;,
                &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
                &quot;created_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;,
                &quot;update_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;
            }
        ]
    },
    {
        &quot;id&quot;: 4909,
        &quot;user_inspektor&quot;: null,
        &quot;asset&quot;: {
            &quot;id&quot;: 2,
            &quot;stockcode&quot;: &quot;33&quot;,
            &quot;code_asset&quot;: &quot;AST24070002&quot;,
            &quot;serialnumber&quot;: &quot;FAKESerial00002&quot;,
            &quot;nama_asset&quot;: &quot;Maggie Frami&quot;,
            &quot;merk&quot;: &quot;Laboriosam repudiandae.&quot;,
            &quot;model&quot;: &quot;Quo doloribus.&quot;,
            &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
            &quot;spesifikasi&quot;: &quot;Enim illum non.&quot;,
            &quot;deskripsi&quot;: &quot;Non hic eius.&quot;,
            &quot;lokasi&quot;: &quot;Eveniet.&quot;,
            &quot;kategori&quot;: [
                &quot;Aut.&quot;
            ],
            &quot;status&quot;: &quot;Rusak&quot;,
            &quot;updated_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;,
            &quot;created_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;
        },
        &quot;type&quot;: {
            &quot;id&quot;: 1,
            &quot;type&quot;: &quot;Inspeksi&quot;
        },
        &quot;imagebefore&quot;: &quot;http://myapi.peltar.id/storage/Quis id qui.&quot;,
        &quot;imageafter&quot;: &quot;http://myapi.peltar.id/Natus cumque illum aut et.&quot;,
        &quot;history&quot;: [
            {
                &quot;id&quot;: 9817,
                &quot;user&quot;: &quot;Admin&quot;,
                &quot;status&quot;: &quot;Pending&quot;,
                &quot;deskripsi&quot;: &quot;Eius quia harum.&quot;,
                &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
                &quot;created_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;,
                &quot;update_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;
            },
            {
                &quot;id&quot;: 9818,
                &quot;user&quot;: &quot;AdminInspeksi&quot;,
                &quot;status&quot;: &quot;Selesai&quot;,
                &quot;deskripsi&quot;: &quot;Eos.&quot;,
                &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
                &quot;created_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;,
                &quot;update_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;
            }
        ]
    },
    {
        &quot;id&quot;: 4910,
        &quot;user_inspektor&quot;: null,
        &quot;asset&quot;: {
            &quot;id&quot;: 3,
            &quot;stockcode&quot;: &quot;21&quot;,
            &quot;code_asset&quot;: &quot;AST24070003&quot;,
            &quot;serialnumber&quot;: &quot;FAKESerial00003&quot;,
            &quot;nama_asset&quot;: &quot;Yvonne Fay Jr.&quot;,
            &quot;merk&quot;: &quot;Modi.&quot;,
            &quot;model&quot;: &quot;Beatae.&quot;,
            &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
            &quot;spesifikasi&quot;: &quot;Qui.&quot;,
            &quot;deskripsi&quot;: &quot;Quae neque sapiente laudantium.&quot;,
            &quot;lokasi&quot;: &quot;RCD2&quot;,
            &quot;kategori&quot;: [
                &quot;Dolore dolore.&quot;
            ],
            &quot;status&quot;: &quot;Dalam Perbaikan&quot;,
            &quot;updated_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;,
            &quot;created_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;
        },
        &quot;type&quot;: {
            &quot;id&quot;: 2,
            &quot;type&quot;: &quot;Breakdown&quot;
        },
        &quot;imagebefore&quot;: &quot;http://myapi.peltar.id/storage/Eos animi ea ab vel.&quot;,
        &quot;imageafter&quot;: &quot;http://myapi.peltar.id/Nostrum et.&quot;,
        &quot;history&quot;: [
            {
                &quot;id&quot;: 9819,
                &quot;user&quot;: &quot;AdminInspeksi&quot;,
                &quot;status&quot;: &quot;Pending&quot;,
                &quot;deskripsi&quot;: &quot;Corporis at sit.&quot;,
                &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
                &quot;created_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;,
                &quot;update_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;
            },
            {
                &quot;id&quot;: 9820,
                &quot;user&quot;: &quot;AdminInspeksi&quot;,
                &quot;status&quot;: &quot;Pending&quot;,
                &quot;deskripsi&quot;: &quot;Aut quia corporis aut.&quot;,
                &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
                &quot;created_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;,
                &quot;update_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;
            }
        ]
    },
    {
        &quot;id&quot;: 4911,
        &quot;user_inspektor&quot;: null,
        &quot;asset&quot;: {
            &quot;id&quot;: 2,
            &quot;stockcode&quot;: &quot;33&quot;,
            &quot;code_asset&quot;: &quot;AST24070002&quot;,
            &quot;serialnumber&quot;: &quot;FAKESerial00002&quot;,
            &quot;nama_asset&quot;: &quot;Maggie Frami&quot;,
            &quot;merk&quot;: &quot;Laboriosam repudiandae.&quot;,
            &quot;model&quot;: &quot;Quo doloribus.&quot;,
            &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
            &quot;spesifikasi&quot;: &quot;Enim illum non.&quot;,
            &quot;deskripsi&quot;: &quot;Non hic eius.&quot;,
            &quot;lokasi&quot;: &quot;Eveniet.&quot;,
            &quot;kategori&quot;: [
                &quot;Aut.&quot;
            ],
            &quot;status&quot;: &quot;Rusak&quot;,
            &quot;updated_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;,
            &quot;created_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;
        },
        &quot;type&quot;: {
            &quot;id&quot;: 2,
            &quot;type&quot;: &quot;Breakdown&quot;
        },
        &quot;imagebefore&quot;: &quot;http://myapi.peltar.id/storage/Repudiandae molestias et molestias.&quot;,
        &quot;imageafter&quot;: &quot;http://myapi.peltar.id/Atque porro ipsa tempora et.&quot;,
        &quot;history&quot;: [
            {
                &quot;id&quot;: 9821,
                &quot;user&quot;: &quot;AdminMaintenance&quot;,
                &quot;status&quot;: &quot;Selesai&quot;,
                &quot;deskripsi&quot;: &quot;Id.&quot;,
                &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
                &quot;created_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;,
                &quot;update_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;
            },
            {
                &quot;id&quot;: 9822,
                &quot;user&quot;: &quot;SuperUser&quot;,
                &quot;status&quot;: &quot;Pending&quot;,
                &quot;deskripsi&quot;: &quot;Quibusdam commodi qui.&quot;,
                &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
                &quot;created_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;,
                &quot;update_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;
            }
        ]
    },
    {
        &quot;id&quot;: 4912,
        &quot;user_inspektor&quot;: null,
        &quot;asset&quot;: {
            &quot;id&quot;: 5,
            &quot;stockcode&quot;: &quot;106&quot;,
            &quot;code_asset&quot;: &quot;AST24070005&quot;,
            &quot;serialnumber&quot;: &quot;FAKESerial00005&quot;,
            &quot;nama_asset&quot;: &quot;Marietta Hermiston I&quot;,
            &quot;merk&quot;: &quot;Eum illum ut.&quot;,
            &quot;model&quot;: &quot;Qui.&quot;,
            &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
            &quot;spesifikasi&quot;: &quot;Eum aperiam vel.&quot;,
            &quot;deskripsi&quot;: &quot;Aut illo fugit.&quot;,
            &quot;lokasi&quot;: &quot;RCD2&quot;,
            &quot;kategori&quot;: [
                &quot;Corrupti quia.&quot;
            ],
            &quot;status&quot;: &quot;Dalam Perbaikan&quot;,
            &quot;updated_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;,
            &quot;created_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;
        },
        &quot;type&quot;: {
            &quot;id&quot;: 2,
            &quot;type&quot;: &quot;Breakdown&quot;
        },
        &quot;imagebefore&quot;: &quot;http://myapi.peltar.id/storage/Libero debitis ut sit delectus.&quot;,
        &quot;imageafter&quot;: &quot;http://myapi.peltar.id/Laboriosam velit omnis qui possimus.&quot;,
        &quot;history&quot;: [
            {
                &quot;id&quot;: 9823,
                &quot;user&quot;: &quot;SuperUser&quot;,
                &quot;status&quot;: &quot;Selesai&quot;,
                &quot;deskripsi&quot;: &quot;Voluptas minima consequatur quia ratione.&quot;,
                &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
                &quot;created_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;,
                &quot;update_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;
            },
            {
                &quot;id&quot;: 9824,
                &quot;user&quot;: &quot;AdminMaintenance&quot;,
                &quot;status&quot;: &quot;Selesai&quot;,
                &quot;deskripsi&quot;: &quot;Illo laborum corporis debitis.&quot;,
                &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
                &quot;created_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;,
                &quot;update_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;
            }
        ]
    },
    {
        &quot;id&quot;: 4913,
        &quot;user_inspektor&quot;: null,
        &quot;asset&quot;: {
            &quot;id&quot;: 3,
            &quot;stockcode&quot;: &quot;21&quot;,
            &quot;code_asset&quot;: &quot;AST24070003&quot;,
            &quot;serialnumber&quot;: &quot;FAKESerial00003&quot;,
            &quot;nama_asset&quot;: &quot;Yvonne Fay Jr.&quot;,
            &quot;merk&quot;: &quot;Modi.&quot;,
            &quot;model&quot;: &quot;Beatae.&quot;,
            &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
            &quot;spesifikasi&quot;: &quot;Qui.&quot;,
            &quot;deskripsi&quot;: &quot;Quae neque sapiente laudantium.&quot;,
            &quot;lokasi&quot;: &quot;RCD2&quot;,
            &quot;kategori&quot;: [
                &quot;Dolore dolore.&quot;
            ],
            &quot;status&quot;: &quot;Dalam Perbaikan&quot;,
            &quot;updated_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;,
            &quot;created_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;
        },
        &quot;type&quot;: {
            &quot;id&quot;: 2,
            &quot;type&quot;: &quot;Breakdown&quot;
        },
        &quot;imagebefore&quot;: &quot;http://myapi.peltar.id/storage/Aperiam non in.&quot;,
        &quot;imageafter&quot;: &quot;http://myapi.peltar.id/Velit nisi sit voluptates officiis.&quot;,
        &quot;history&quot;: [
            {
                &quot;id&quot;: 9825,
                &quot;user&quot;: &quot;SuperUser&quot;,
                &quot;status&quot;: &quot;Pending&quot;,
                &quot;deskripsi&quot;: &quot;Eveniet odio.&quot;,
                &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
                &quot;created_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;,
                &quot;update_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;
            },
            {
                &quot;id&quot;: 9826,
                &quot;user&quot;: &quot;SuperUser&quot;,
                &quot;status&quot;: &quot;Selesai&quot;,
                &quot;deskripsi&quot;: &quot;Quae fugiat a.&quot;,
                &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
                &quot;created_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;,
                &quot;update_at&quot;: &quot;2024-06-30T19:47:47.000000Z&quot;
            }
        ]
    }
]</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-maintenance-getall" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-maintenance-getall"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-maintenance-getall"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-maintenance-getall" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-maintenance-getall">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-maintenance-getall" data-method="GET"
      data-path="api/v1/maintenance/getall"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-maintenance-getall', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-maintenance-getall"
                    onclick="tryItOut('GETapi-v1-maintenance-getall');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-maintenance-getall"
                    onclick="cancelTryOut('GETapi-v1-maintenance-getall');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-maintenance-getall"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/maintenance/getall</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>MYP_API_KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="MYP_API_KEY" class="auth-value"               data-endpoint="GETapi-v1-maintenance-getall"
               value="{YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>{YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Content-Type"                data-endpoint="GETapi-v1-maintenance-getall"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Accept"                data-endpoint="GETapi-v1-maintenance-getall"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>MYP-API-KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="MYP-API-KEY"                data-endpoint="GETapi-v1-maintenance-getall"
               value="{YOUR_API_KEY}"
               data-component="header">
    <br>
<p>Example: <code>{YOUR_API_KEY}</code></p>
            </div>
                        </form>

                    <h2 id="maintenance-GETapi-v1-maintenance-maintenance_aplly--maintenance_id-">GET api/v1/maintenance/maintenance_aplly/{maintenance_id}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-v1-maintenance-maintenance_aplly--maintenance_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://myapi.peltar.id/api/v1/maintenance/maintenance_aplly/1" \
    --header "MYP_API_KEY: {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "MYP-API-KEY: {YOUR_API_KEY}"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://myapi.peltar.id/api/v1/maintenance/maintenance_aplly/1"
);

const headers = {
    "MYP_API_KEY": "{YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "MYP-API-KEY": "{YOUR_API_KEY}",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'https://myapi.peltar.id/api/v1/maintenance/maintenance_aplly/1',
    [
        'headers' =&gt; [
            'MYP_API_KEY' =&gt; '{YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'MYP-API-KEY' =&gt; '{YOUR_API_KEY}',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'https://myapi.peltar.id/api/v1/maintenance/maintenance_aplly/1'
headers = {
  'MYP_API_KEY': '{YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'MYP-API-KEY': '{YOUR_API_KEY}'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-maintenance-maintenance_aplly--maintenance_id-">
            <blockquote>
            <p>Example response (500):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 48
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Server Error&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-maintenance-maintenance_aplly--maintenance_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-maintenance-maintenance_aplly--maintenance_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-maintenance-maintenance_aplly--maintenance_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-maintenance-maintenance_aplly--maintenance_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-maintenance-maintenance_aplly--maintenance_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-maintenance-maintenance_aplly--maintenance_id-" data-method="GET"
      data-path="api/v1/maintenance/maintenance_aplly/{maintenance_id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-maintenance-maintenance_aplly--maintenance_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-maintenance-maintenance_aplly--maintenance_id-"
                    onclick="tryItOut('GETapi-v1-maintenance-maintenance_aplly--maintenance_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-maintenance-maintenance_aplly--maintenance_id-"
                    onclick="cancelTryOut('GETapi-v1-maintenance-maintenance_aplly--maintenance_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-maintenance-maintenance_aplly--maintenance_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/maintenance/maintenance_aplly/{maintenance_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>MYP_API_KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="MYP_API_KEY" class="auth-value"               data-endpoint="GETapi-v1-maintenance-maintenance_aplly--maintenance_id-"
               value="{YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>{YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Content-Type"                data-endpoint="GETapi-v1-maintenance-maintenance_aplly--maintenance_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Accept"                data-endpoint="GETapi-v1-maintenance-maintenance_aplly--maintenance_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>MYP-API-KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="MYP-API-KEY"                data-endpoint="GETapi-v1-maintenance-maintenance_aplly--maintenance_id-"
               value="{YOUR_API_KEY}"
               data-component="header">
    <br>
<p>Example: <code>{YOUR_API_KEY}</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>maintenance_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               name="maintenance_id"                data-endpoint="GETapi-v1-maintenance-maintenance_aplly--maintenance_id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the maintenance. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="maintenance-GETapi-v1-maintenance-self_get">Display a listing of the resource.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-v1-maintenance-self_get">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://myapi.peltar.id/api/v1/maintenance/self_get" \
    --header "MYP_API_KEY: {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "MYP-API-KEY: {YOUR_API_KEY}"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://myapi.peltar.id/api/v1/maintenance/self_get"
);

const headers = {
    "MYP_API_KEY": "{YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "MYP-API-KEY": "{YOUR_API_KEY}",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'https://myapi.peltar.id/api/v1/maintenance/self_get',
    [
        'headers' =&gt; [
            'MYP_API_KEY' =&gt; '{YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'MYP-API-KEY' =&gt; '{YOUR_API_KEY}',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'https://myapi.peltar.id/api/v1/maintenance/self_get'
headers = {
  'MYP_API_KEY': '{YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'MYP-API-KEY': '{YOUR_API_KEY}'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-maintenance-self_get">
            <blockquote>
            <p>Example response (500):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 47
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Server Error&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-maintenance-self_get" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-maintenance-self_get"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-maintenance-self_get"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-maintenance-self_get" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-maintenance-self_get">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-maintenance-self_get" data-method="GET"
      data-path="api/v1/maintenance/self_get"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-maintenance-self_get', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-maintenance-self_get"
                    onclick="tryItOut('GETapi-v1-maintenance-self_get');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-maintenance-self_get"
                    onclick="cancelTryOut('GETapi-v1-maintenance-self_get');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-maintenance-self_get"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/maintenance/self_get</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>MYP_API_KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="MYP_API_KEY" class="auth-value"               data-endpoint="GETapi-v1-maintenance-self_get"
               value="{YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>{YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Content-Type"                data-endpoint="GETapi-v1-maintenance-self_get"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Accept"                data-endpoint="GETapi-v1-maintenance-self_get"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>MYP-API-KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="MYP-API-KEY"                data-endpoint="GETapi-v1-maintenance-self_get"
               value="{YOUR_API_KEY}"
               data-component="header">
    <br>
<p>Example: <code>{YOUR_API_KEY}</code></p>
            </div>
                        </form>

                    <h2 id="maintenance-GETapi-v1-maintenance-show--maintenance_id-">Display the specified resource.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-v1-maintenance-show--maintenance_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://myapi.peltar.id/api/v1/maintenance/show/1" \
    --header "MYP_API_KEY: {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "MYP-API-KEY: {YOUR_API_KEY}"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://myapi.peltar.id/api/v1/maintenance/show/1"
);

const headers = {
    "MYP_API_KEY": "{YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "MYP-API-KEY": "{YOUR_API_KEY}",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'https://myapi.peltar.id/api/v1/maintenance/show/1',
    [
        'headers' =&gt; [
            'MYP_API_KEY' =&gt; '{YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'MYP-API-KEY' =&gt; '{YOUR_API_KEY}',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'https://myapi.peltar.id/api/v1/maintenance/show/1'
headers = {
  'MYP_API_KEY': '{YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'MYP-API-KEY': '{YOUR_API_KEY}'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-maintenance-show--maintenance_id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 46
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;id&quot;: 1,
        &quot;user_inspektor&quot;: null,
        &quot;asset&quot;: {
            &quot;id&quot;: 2,
            &quot;stockcode&quot;: &quot;33&quot;,
            &quot;code_asset&quot;: &quot;AST24070002&quot;,
            &quot;serialnumber&quot;: &quot;FAKESerial00002&quot;,
            &quot;nama_asset&quot;: &quot;Maggie Frami&quot;,
            &quot;merk&quot;: &quot;Laboriosam repudiandae.&quot;,
            &quot;model&quot;: &quot;Quo doloribus.&quot;,
            &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
            &quot;spesifikasi&quot;: &quot;Enim illum non.&quot;,
            &quot;deskripsi&quot;: &quot;Non hic eius.&quot;,
            &quot;lokasi&quot;: &quot;Eveniet.&quot;,
            &quot;kategori&quot;: [
                &quot;Aut.&quot;
            ],
            &quot;status&quot;: &quot;Rusak&quot;,
            &quot;updated_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;,
            &quot;created_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;
        },
        &quot;type&quot;: {
            &quot;id&quot;: 2,
            &quot;type&quot;: &quot;Breakdown&quot;
        },
        &quot;imagebefore&quot;: &quot;http://myapi.peltar.id/storage/At qui dolor est repellat.&quot;,
        &quot;imageafter&quot;: &quot;http://myapi.peltar.id/Et possimus id.&quot;,
        &quot;history&quot;: [
            {
                &quot;id&quot;: 1,
                &quot;user&quot;: &quot;AdminMaintenance&quot;,
                &quot;status&quot;: &quot;Selesai&quot;,
                &quot;deskripsi&quot;: &quot;Repudiandae eum maxime.&quot;,
                &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
                &quot;created_at&quot;: &quot;2024-06-30T19:47:05.000000Z&quot;,
                &quot;update_at&quot;: &quot;2024-06-30T19:47:05.000000Z&quot;
            },
            {
                &quot;id&quot;: 2,
                &quot;user&quot;: &quot;SuperUser&quot;,
                &quot;status&quot;: &quot;Pending&quot;,
                &quot;deskripsi&quot;: &quot;Rem voluptas.&quot;,
                &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
                &quot;created_at&quot;: &quot;2024-06-30T19:47:05.000000Z&quot;,
                &quot;update_at&quot;: &quot;2024-06-30T19:47:05.000000Z&quot;
            }
        ]
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-maintenance-show--maintenance_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-maintenance-show--maintenance_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-maintenance-show--maintenance_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-maintenance-show--maintenance_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-maintenance-show--maintenance_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-maintenance-show--maintenance_id-" data-method="GET"
      data-path="api/v1/maintenance/show/{maintenance_id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-maintenance-show--maintenance_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-maintenance-show--maintenance_id-"
                    onclick="tryItOut('GETapi-v1-maintenance-show--maintenance_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-maintenance-show--maintenance_id-"
                    onclick="cancelTryOut('GETapi-v1-maintenance-show--maintenance_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-maintenance-show--maintenance_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/maintenance/show/{maintenance_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>MYP_API_KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="MYP_API_KEY" class="auth-value"               data-endpoint="GETapi-v1-maintenance-show--maintenance_id-"
               value="{YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>{YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Content-Type"                data-endpoint="GETapi-v1-maintenance-show--maintenance_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Accept"                data-endpoint="GETapi-v1-maintenance-show--maintenance_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>MYP-API-KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="MYP-API-KEY"                data-endpoint="GETapi-v1-maintenance-show--maintenance_id-"
               value="{YOUR_API_KEY}"
               data-component="header">
    <br>
<p>Example: <code>{YOUR_API_KEY}</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>maintenance_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               name="maintenance_id"                data-endpoint="GETapi-v1-maintenance-show--maintenance_id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the maintenance. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="maintenance-POSTapi-v1-maintenance-destroy--maintenance_id-">Remove the specified resource from storage.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-v1-maintenance-destroy--maintenance_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://myapi.peltar.id/api/v1/maintenance/destroy/1" \
    --header "MYP_API_KEY: {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "MYP-API-KEY: {YOUR_API_KEY}"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://myapi.peltar.id/api/v1/maintenance/destroy/1"
);

const headers = {
    "MYP_API_KEY": "{YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "MYP-API-KEY": "{YOUR_API_KEY}",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'https://myapi.peltar.id/api/v1/maintenance/destroy/1',
    [
        'headers' =&gt; [
            'MYP_API_KEY' =&gt; '{YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'MYP-API-KEY' =&gt; '{YOUR_API_KEY}',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'https://myapi.peltar.id/api/v1/maintenance/destroy/1'
headers = {
  'MYP_API_KEY': '{YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'MYP-API-KEY': '{YOUR_API_KEY}'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-maintenance-destroy--maintenance_id-">
            <blockquote>
            <p>Example response (403):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 45
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;This action is unauthorized.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-v1-maintenance-destroy--maintenance_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-maintenance-destroy--maintenance_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-maintenance-destroy--maintenance_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-maintenance-destroy--maintenance_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-maintenance-destroy--maintenance_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-maintenance-destroy--maintenance_id-" data-method="POST"
      data-path="api/v1/maintenance/destroy/{maintenance_id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-maintenance-destroy--maintenance_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-maintenance-destroy--maintenance_id-"
                    onclick="tryItOut('POSTapi-v1-maintenance-destroy--maintenance_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-maintenance-destroy--maintenance_id-"
                    onclick="cancelTryOut('POSTapi-v1-maintenance-destroy--maintenance_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-maintenance-destroy--maintenance_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/maintenance/destroy/{maintenance_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>MYP_API_KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="MYP_API_KEY" class="auth-value"               data-endpoint="POSTapi-v1-maintenance-destroy--maintenance_id-"
               value="{YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>{YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Content-Type"                data-endpoint="POSTapi-v1-maintenance-destroy--maintenance_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Accept"                data-endpoint="POSTapi-v1-maintenance-destroy--maintenance_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>MYP-API-KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="MYP-API-KEY"                data-endpoint="POSTapi-v1-maintenance-destroy--maintenance_id-"
               value="{YOUR_API_KEY}"
               data-component="header">
    <br>
<p>Example: <code>{YOUR_API_KEY}</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>maintenance_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               name="maintenance_id"                data-endpoint="POSTapi-v1-maintenance-destroy--maintenance_id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the maintenance. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="maintenance-POSTapi-v1-maintenance--maintenance--history-update--pupdate-">Update the specified resource in storage.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-v1-maintenance--maintenance--history-update--pupdate-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://myapi.peltar.id/api/v1/maintenance/1/history/update/consequatur" \
    --header "MYP_API_KEY: {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "MYP-API-KEY: {YOUR_API_KEY}" \
    --data "{
    \"id_status\": \"consequatur\",
    \"deskripsi_update\": \"consequatur\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://myapi.peltar.id/api/v1/maintenance/1/history/update/consequatur"
);

const headers = {
    "MYP_API_KEY": "{YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "MYP-API-KEY": "{YOUR_API_KEY}",
};

let body = {
    "id_status": "consequatur",
    "deskripsi_update": "consequatur"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'https://myapi.peltar.id/api/v1/maintenance/1/history/update/consequatur',
    [
        'headers' =&gt; [
            'MYP_API_KEY' =&gt; '{YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'MYP-API-KEY' =&gt; '{YOUR_API_KEY}',
        ],
        'json' =&gt; [
            'id_status' =&gt; 'consequatur',
            'deskripsi_update' =&gt; 'consequatur',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'https://myapi.peltar.id/api/v1/maintenance/1/history/update/consequatur'
payload = {
    "id_status": "consequatur",
    "deskripsi_update": "consequatur"
}
headers = {
  'MYP_API_KEY': '{YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'MYP-API-KEY': '{YOUR_API_KEY}'
}

response = requests.request('POST', url, headers=headers, json=payload)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-maintenance--maintenance--history-update--pupdate-">
            <blockquote>
            <p>Example response (403):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 44
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;This action is unauthorized.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-v1-maintenance--maintenance--history-update--pupdate-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-maintenance--maintenance--history-update--pupdate-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-maintenance--maintenance--history-update--pupdate-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-maintenance--maintenance--history-update--pupdate-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-maintenance--maintenance--history-update--pupdate-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-maintenance--maintenance--history-update--pupdate-" data-method="POST"
      data-path="api/v1/maintenance/{maintenance}/history/update/{pupdate}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-maintenance--maintenance--history-update--pupdate-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-maintenance--maintenance--history-update--pupdate-"
                    onclick="tryItOut('POSTapi-v1-maintenance--maintenance--history-update--pupdate-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-maintenance--maintenance--history-update--pupdate-"
                    onclick="cancelTryOut('POSTapi-v1-maintenance--maintenance--history-update--pupdate-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-maintenance--maintenance--history-update--pupdate-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/maintenance/{maintenance}/history/update/{pupdate}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>MYP_API_KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="MYP_API_KEY" class="auth-value"               data-endpoint="POSTapi-v1-maintenance--maintenance--history-update--pupdate-"
               value="{YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>{YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Content-Type"                data-endpoint="POSTapi-v1-maintenance--maintenance--history-update--pupdate-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Accept"                data-endpoint="POSTapi-v1-maintenance--maintenance--history-update--pupdate-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>MYP-API-KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="MYP-API-KEY"                data-endpoint="POSTapi-v1-maintenance--maintenance--history-update--pupdate-"
               value="{YOUR_API_KEY}"
               data-component="header">
    <br>
<p>Example: <code>{YOUR_API_KEY}</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>maintenance</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               name="maintenance"                data-endpoint="POSTapi-v1-maintenance--maintenance--history-update--pupdate-"
               value="1"
               data-component="url">
    <br>
<p>The maintenance. Example: <code>1</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>pupdate</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="pupdate"                data-endpoint="POSTapi-v1-maintenance--maintenance--history-update--pupdate-"
               value="consequatur"
               data-component="url">
    <br>
<p>Example: <code>consequatur</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>image</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
               name="image"                data-endpoint="POSTapi-v1-maintenance--maintenance--history-update--pupdate-"
               value=""
               data-component="body">
    <br>

        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>id_status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="id_status"                data-endpoint="POSTapi-v1-maintenance--maintenance--history-update--pupdate-"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>deskripsi_update</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="deskripsi_update"                data-endpoint="POSTapi-v1-maintenance--maintenance--history-update--pupdate-"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
        </form>

                    <h2 id="maintenance-POSTapi-v1-maintenance--maintenance--history-show--pupdate-">Update the specified resource in storage.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-v1-maintenance--maintenance--history-show--pupdate-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://myapi.peltar.id/api/v1/maintenance/1/history/show/consequatur" \
    --header "MYP_API_KEY: {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "MYP-API-KEY: {YOUR_API_KEY}" \
    --data "{
    \"id_status\": \"consequatur\",
    \"deskripsi_update\": \"consequatur\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://myapi.peltar.id/api/v1/maintenance/1/history/show/consequatur"
);

const headers = {
    "MYP_API_KEY": "{YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "MYP-API-KEY": "{YOUR_API_KEY}",
};

let body = {
    "id_status": "consequatur",
    "deskripsi_update": "consequatur"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'https://myapi.peltar.id/api/v1/maintenance/1/history/show/consequatur',
    [
        'headers' =&gt; [
            'MYP_API_KEY' =&gt; '{YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'MYP-API-KEY' =&gt; '{YOUR_API_KEY}',
        ],
        'json' =&gt; [
            'id_status' =&gt; 'consequatur',
            'deskripsi_update' =&gt; 'consequatur',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'https://myapi.peltar.id/api/v1/maintenance/1/history/show/consequatur'
payload = {
    "id_status": "consequatur",
    "deskripsi_update": "consequatur"
}
headers = {
  'MYP_API_KEY': '{YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'MYP-API-KEY': '{YOUR_API_KEY}'
}

response = requests.request('POST', url, headers=headers, json=payload)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-maintenance--maintenance--history-show--pupdate-">
            <blockquote>
            <p>Example response (403):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 43
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;This action is unauthorized.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-v1-maintenance--maintenance--history-show--pupdate-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-maintenance--maintenance--history-show--pupdate-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-maintenance--maintenance--history-show--pupdate-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-maintenance--maintenance--history-show--pupdate-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-maintenance--maintenance--history-show--pupdate-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-maintenance--maintenance--history-show--pupdate-" data-method="POST"
      data-path="api/v1/maintenance/{maintenance}/history/show/{pupdate}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-maintenance--maintenance--history-show--pupdate-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-maintenance--maintenance--history-show--pupdate-"
                    onclick="tryItOut('POSTapi-v1-maintenance--maintenance--history-show--pupdate-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-maintenance--maintenance--history-show--pupdate-"
                    onclick="cancelTryOut('POSTapi-v1-maintenance--maintenance--history-show--pupdate-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-maintenance--maintenance--history-show--pupdate-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/maintenance/{maintenance}/history/show/{pupdate}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>MYP_API_KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="MYP_API_KEY" class="auth-value"               data-endpoint="POSTapi-v1-maintenance--maintenance--history-show--pupdate-"
               value="{YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>{YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Content-Type"                data-endpoint="POSTapi-v1-maintenance--maintenance--history-show--pupdate-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Accept"                data-endpoint="POSTapi-v1-maintenance--maintenance--history-show--pupdate-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>MYP-API-KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="MYP-API-KEY"                data-endpoint="POSTapi-v1-maintenance--maintenance--history-show--pupdate-"
               value="{YOUR_API_KEY}"
               data-component="header">
    <br>
<p>Example: <code>{YOUR_API_KEY}</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>maintenance</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               name="maintenance"                data-endpoint="POSTapi-v1-maintenance--maintenance--history-show--pupdate-"
               value="1"
               data-component="url">
    <br>
<p>The maintenance. Example: <code>1</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>pupdate</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="pupdate"                data-endpoint="POSTapi-v1-maintenance--maintenance--history-show--pupdate-"
               value="consequatur"
               data-component="url">
    <br>
<p>Example: <code>consequatur</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>image</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
               name="image"                data-endpoint="POSTapi-v1-maintenance--maintenance--history-show--pupdate-"
               value=""
               data-component="body">
    <br>

        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>id_status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="id_status"                data-endpoint="POSTapi-v1-maintenance--maintenance--history-show--pupdate-"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>deskripsi_update</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="deskripsi_update"                data-endpoint="POSTapi-v1-maintenance--maintenance--history-show--pupdate-"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
        </form>

                    <h2 id="maintenance-POSTapi-v1-maintenance--maintenance--history-store">Update the specified resource in storage.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-v1-maintenance--maintenance--history-store">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://myapi.peltar.id/api/v1/maintenance/1/history/store" \
    --header "MYP_API_KEY: {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "MYP-API-KEY: {YOUR_API_KEY}" \
    --data "{
    \"id_status\": \"consequatur\",
    \"deskripsi_update\": \"consequatur\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://myapi.peltar.id/api/v1/maintenance/1/history/store"
);

const headers = {
    "MYP_API_KEY": "{YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "MYP-API-KEY": "{YOUR_API_KEY}",
};

let body = {
    "id_status": "consequatur",
    "deskripsi_update": "consequatur"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'https://myapi.peltar.id/api/v1/maintenance/1/history/store',
    [
        'headers' =&gt; [
            'MYP_API_KEY' =&gt; '{YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'MYP-API-KEY' =&gt; '{YOUR_API_KEY}',
        ],
        'json' =&gt; [
            'id_status' =&gt; 'consequatur',
            'deskripsi_update' =&gt; 'consequatur',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'https://myapi.peltar.id/api/v1/maintenance/1/history/store'
payload = {
    "id_status": "consequatur",
    "deskripsi_update": "consequatur"
}
headers = {
  'MYP_API_KEY': '{YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'MYP-API-KEY': '{YOUR_API_KEY}'
}

response = requests.request('POST', url, headers=headers, json=payload)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-maintenance--maintenance--history-store">
            <blockquote>
            <p>Example response (403):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 42
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;This action is unauthorized.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-v1-maintenance--maintenance--history-store" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-maintenance--maintenance--history-store"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-maintenance--maintenance--history-store"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-maintenance--maintenance--history-store" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-maintenance--maintenance--history-store">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-maintenance--maintenance--history-store" data-method="POST"
      data-path="api/v1/maintenance/{maintenance}/history/store"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-maintenance--maintenance--history-store', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-maintenance--maintenance--history-store"
                    onclick="tryItOut('POSTapi-v1-maintenance--maintenance--history-store');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-maintenance--maintenance--history-store"
                    onclick="cancelTryOut('POSTapi-v1-maintenance--maintenance--history-store');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-maintenance--maintenance--history-store"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/maintenance/{maintenance}/history/store</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>MYP_API_KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="MYP_API_KEY" class="auth-value"               data-endpoint="POSTapi-v1-maintenance--maintenance--history-store"
               value="{YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>{YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Content-Type"                data-endpoint="POSTapi-v1-maintenance--maintenance--history-store"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Accept"                data-endpoint="POSTapi-v1-maintenance--maintenance--history-store"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>MYP-API-KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="MYP-API-KEY"                data-endpoint="POSTapi-v1-maintenance--maintenance--history-store"
               value="{YOUR_API_KEY}"
               data-component="header">
    <br>
<p>Example: <code>{YOUR_API_KEY}</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>maintenance</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               name="maintenance"                data-endpoint="POSTapi-v1-maintenance--maintenance--history-store"
               value="1"
               data-component="url">
    <br>
<p>The maintenance. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>image</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
               name="image"                data-endpoint="POSTapi-v1-maintenance--maintenance--history-store"
               value=""
               data-component="body">
    <br>

        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>id_status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="id_status"                data-endpoint="POSTapi-v1-maintenance--maintenance--history-store"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>deskripsi_update</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="deskripsi_update"                data-endpoint="POSTapi-v1-maintenance--maintenance--history-store"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
        </form>

                    <h2 id="maintenance-POSTapi-v1-maintenance--maintenance--history-destroy--pupdate-">Update the specified resource in storage.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-v1-maintenance--maintenance--history-destroy--pupdate-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://myapi.peltar.id/api/v1/maintenance/1/history/destroy/consequatur" \
    --header "MYP_API_KEY: {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "MYP-API-KEY: {YOUR_API_KEY}" \
    --data "{
    \"id_status\": \"consequatur\",
    \"deskripsi_update\": \"consequatur\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://myapi.peltar.id/api/v1/maintenance/1/history/destroy/consequatur"
);

const headers = {
    "MYP_API_KEY": "{YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "MYP-API-KEY": "{YOUR_API_KEY}",
};

let body = {
    "id_status": "consequatur",
    "deskripsi_update": "consequatur"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'https://myapi.peltar.id/api/v1/maintenance/1/history/destroy/consequatur',
    [
        'headers' =&gt; [
            'MYP_API_KEY' =&gt; '{YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'MYP-API-KEY' =&gt; '{YOUR_API_KEY}',
        ],
        'json' =&gt; [
            'id_status' =&gt; 'consequatur',
            'deskripsi_update' =&gt; 'consequatur',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'https://myapi.peltar.id/api/v1/maintenance/1/history/destroy/consequatur'
payload = {
    "id_status": "consequatur",
    "deskripsi_update": "consequatur"
}
headers = {
  'MYP_API_KEY': '{YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'MYP-API-KEY': '{YOUR_API_KEY}'
}

response = requests.request('POST', url, headers=headers, json=payload)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-maintenance--maintenance--history-destroy--pupdate-">
            <blockquote>
            <p>Example response (403):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 41
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;This action is unauthorized.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-v1-maintenance--maintenance--history-destroy--pupdate-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-maintenance--maintenance--history-destroy--pupdate-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-maintenance--maintenance--history-destroy--pupdate-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-maintenance--maintenance--history-destroy--pupdate-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-maintenance--maintenance--history-destroy--pupdate-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-maintenance--maintenance--history-destroy--pupdate-" data-method="POST"
      data-path="api/v1/maintenance/{maintenance}/history/destroy/{pupdate}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-maintenance--maintenance--history-destroy--pupdate-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-maintenance--maintenance--history-destroy--pupdate-"
                    onclick="tryItOut('POSTapi-v1-maintenance--maintenance--history-destroy--pupdate-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-maintenance--maintenance--history-destroy--pupdate-"
                    onclick="cancelTryOut('POSTapi-v1-maintenance--maintenance--history-destroy--pupdate-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-maintenance--maintenance--history-destroy--pupdate-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/maintenance/{maintenance}/history/destroy/{pupdate}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>MYP_API_KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="MYP_API_KEY" class="auth-value"               data-endpoint="POSTapi-v1-maintenance--maintenance--history-destroy--pupdate-"
               value="{YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>{YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Content-Type"                data-endpoint="POSTapi-v1-maintenance--maintenance--history-destroy--pupdate-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Accept"                data-endpoint="POSTapi-v1-maintenance--maintenance--history-destroy--pupdate-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>MYP-API-KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="MYP-API-KEY"                data-endpoint="POSTapi-v1-maintenance--maintenance--history-destroy--pupdate-"
               value="{YOUR_API_KEY}"
               data-component="header">
    <br>
<p>Example: <code>{YOUR_API_KEY}</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>maintenance</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               name="maintenance"                data-endpoint="POSTapi-v1-maintenance--maintenance--history-destroy--pupdate-"
               value="1"
               data-component="url">
    <br>
<p>The maintenance. Example: <code>1</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>pupdate</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="pupdate"                data-endpoint="POSTapi-v1-maintenance--maintenance--history-destroy--pupdate-"
               value="consequatur"
               data-component="url">
    <br>
<p>Example: <code>consequatur</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>image</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
               name="image"                data-endpoint="POSTapi-v1-maintenance--maintenance--history-destroy--pupdate-"
               value=""
               data-component="body">
    <br>

        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>id_status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="id_status"                data-endpoint="POSTapi-v1-maintenance--maintenance--history-destroy--pupdate-"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>deskripsi_update</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="deskripsi_update"                data-endpoint="POSTapi-v1-maintenance--maintenance--history-destroy--pupdate-"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
        </form>

                    <h2 id="maintenance-POSTapi-v1-inspeksi-store">POST api/v1/inspeksi/store</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-v1-inspeksi-store">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://myapi.peltar.id/api/v1/inspeksi/store" \
    --header "MYP_API_KEY: {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "MYP-API-KEY: {YOUR_API_KEY}" \
    --data "{
    \"id_asset\": \"consequatur\",
    \"id_type\": \"consequatur\",
    \"deskripsi\": \"consequatur\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://myapi.peltar.id/api/v1/inspeksi/store"
);

const headers = {
    "MYP_API_KEY": "{YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "MYP-API-KEY": "{YOUR_API_KEY}",
};

let body = {
    "id_asset": "consequatur",
    "id_type": "consequatur",
    "deskripsi": "consequatur"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'https://myapi.peltar.id/api/v1/inspeksi/store',
    [
        'headers' =&gt; [
            'MYP_API_KEY' =&gt; '{YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'MYP-API-KEY' =&gt; '{YOUR_API_KEY}',
        ],
        'json' =&gt; [
            'id_asset' =&gt; 'consequatur',
            'id_type' =&gt; 'consequatur',
            'deskripsi' =&gt; 'consequatur',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'https://myapi.peltar.id/api/v1/inspeksi/store'
payload = {
    "id_asset": "consequatur",
    "id_type": "consequatur",
    "deskripsi": "consequatur"
}
headers = {
  'MYP_API_KEY': '{YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'MYP-API-KEY': '{YOUR_API_KEY}'
}

response = requests.request('POST', url, headers=headers, json=payload)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-inspeksi-store">
            <blockquote>
            <p>Example response (403):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 40
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;This action is unauthorized.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-v1-inspeksi-store" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-inspeksi-store"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-inspeksi-store"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-inspeksi-store" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-inspeksi-store">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-inspeksi-store" data-method="POST"
      data-path="api/v1/inspeksi/store"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-inspeksi-store', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-inspeksi-store"
                    onclick="tryItOut('POSTapi-v1-inspeksi-store');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-inspeksi-store"
                    onclick="cancelTryOut('POSTapi-v1-inspeksi-store');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-inspeksi-store"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/inspeksi/store</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>MYP_API_KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="MYP_API_KEY" class="auth-value"               data-endpoint="POSTapi-v1-inspeksi-store"
               value="{YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>{YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Content-Type"                data-endpoint="POSTapi-v1-inspeksi-store"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Accept"                data-endpoint="POSTapi-v1-inspeksi-store"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>MYP-API-KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="MYP-API-KEY"                data-endpoint="POSTapi-v1-inspeksi-store"
               value="{YOUR_API_KEY}"
               data-component="header">
    <br>
<p>Example: <code>{YOUR_API_KEY}</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>imagebefore</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
               name="imagebefore"                data-endpoint="POSTapi-v1-inspeksi-store"
               value=""
               data-component="body">
    <br>

        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>id_asset</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="id_asset"                data-endpoint="POSTapi-v1-inspeksi-store"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>id_type</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="id_type"                data-endpoint="POSTapi-v1-inspeksi-store"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>deskripsi</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
               name="deskripsi"                data-endpoint="POSTapi-v1-inspeksi-store"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>imageafter</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
               name="imageafter"                data-endpoint="POSTapi-v1-inspeksi-store"
               value=""
               data-component="body">
    <br>

        </div>
        </form>

                    <h2 id="maintenance-POSTapi-v1-inspeksi-update--maintenance-">POST api/v1/inspeksi/update/{maintenance}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-v1-inspeksi-update--maintenance-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://myapi.peltar.id/api/v1/inspeksi/update/consequatur" \
    --header "MYP_API_KEY: {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "MYP-API-KEY: {YOUR_API_KEY}" \
    --data "{
    \"id_type\": \"consequatur\",
    \"deskripsi\": \"consequatur\",
    \"deskripsi_update\": \"consequatur\",
    \"id_status\": \"consequatur\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://myapi.peltar.id/api/v1/inspeksi/update/consequatur"
);

const headers = {
    "MYP_API_KEY": "{YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "MYP-API-KEY": "{YOUR_API_KEY}",
};

let body = {
    "id_type": "consequatur",
    "deskripsi": "consequatur",
    "deskripsi_update": "consequatur",
    "id_status": "consequatur"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'https://myapi.peltar.id/api/v1/inspeksi/update/consequatur',
    [
        'headers' =&gt; [
            'MYP_API_KEY' =&gt; '{YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'MYP-API-KEY' =&gt; '{YOUR_API_KEY}',
        ],
        'json' =&gt; [
            'id_type' =&gt; 'consequatur',
            'deskripsi' =&gt; 'consequatur',
            'deskripsi_update' =&gt; 'consequatur',
            'id_status' =&gt; 'consequatur',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'https://myapi.peltar.id/api/v1/inspeksi/update/consequatur'
payload = {
    "id_type": "consequatur",
    "deskripsi": "consequatur",
    "deskripsi_update": "consequatur",
    "id_status": "consequatur"
}
headers = {
  'MYP_API_KEY': '{YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'MYP-API-KEY': '{YOUR_API_KEY}'
}

response = requests.request('POST', url, headers=headers, json=payload)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-inspeksi-update--maintenance-">
            <blockquote>
            <p>Example response (403):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 39
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;This action is unauthorized.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-v1-inspeksi-update--maintenance-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-inspeksi-update--maintenance-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-inspeksi-update--maintenance-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-inspeksi-update--maintenance-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-inspeksi-update--maintenance-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-inspeksi-update--maintenance-" data-method="POST"
      data-path="api/v1/inspeksi/update/{maintenance}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-inspeksi-update--maintenance-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-inspeksi-update--maintenance-"
                    onclick="tryItOut('POSTapi-v1-inspeksi-update--maintenance-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-inspeksi-update--maintenance-"
                    onclick="cancelTryOut('POSTapi-v1-inspeksi-update--maintenance-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-inspeksi-update--maintenance-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/inspeksi/update/{maintenance}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>MYP_API_KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="MYP_API_KEY" class="auth-value"               data-endpoint="POSTapi-v1-inspeksi-update--maintenance-"
               value="{YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>{YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Content-Type"                data-endpoint="POSTapi-v1-inspeksi-update--maintenance-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Accept"                data-endpoint="POSTapi-v1-inspeksi-update--maintenance-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>MYP-API-KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="MYP-API-KEY"                data-endpoint="POSTapi-v1-inspeksi-update--maintenance-"
               value="{YOUR_API_KEY}"
               data-component="header">
    <br>
<p>Example: <code>{YOUR_API_KEY}</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>maintenance</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="maintenance"                data-endpoint="POSTapi-v1-inspeksi-update--maintenance-"
               value="consequatur"
               data-component="url">
    <br>
<p>Example: <code>consequatur</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>imagebefore</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
               name="imagebefore"                data-endpoint="POSTapi-v1-inspeksi-update--maintenance-"
               value=""
               data-component="body">
    <br>

        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>id_type</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="id_type"                data-endpoint="POSTapi-v1-inspeksi-update--maintenance-"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>deskripsi</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
               name="deskripsi"                data-endpoint="POSTapi-v1-inspeksi-update--maintenance-"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>deskripsi_update</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
               name="deskripsi_update"                data-endpoint="POSTapi-v1-inspeksi-update--maintenance-"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>id_status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="id_status"                data-endpoint="POSTapi-v1-inspeksi-update--maintenance-"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
        </form>

                <h1 id="news">News</h1>

    

                                <h2 id="news-GETapi-v1-news-getall">Display a listing of the resource.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-v1-news-getall">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://myapi.peltar.id/api/v1/news/getall" \
    --header "MYP_API_KEY: {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "MYP-API-KEY: {YOUR_API_KEY}"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://myapi.peltar.id/api/v1/news/getall"
);

const headers = {
    "MYP_API_KEY": "{YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "MYP-API-KEY": "{YOUR_API_KEY}",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'https://myapi.peltar.id/api/v1/news/getall',
    [
        'headers' =&gt; [
            'MYP_API_KEY' =&gt; '{YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'MYP-API-KEY' =&gt; '{YOUR_API_KEY}',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'https://myapi.peltar.id/api/v1/news/getall'
headers = {
  'MYP_API_KEY': '{YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'MYP-API-KEY': '{YOUR_API_KEY}'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-news-getall">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 10
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: &quot;success&quot;,
    &quot;news&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;user&quot;: &quot;AdminMaintenance&quot;,
            &quot;title&quot;: &quot;Prof.&quot;,
            &quot;deskripsi&quot;: &quot;Consequatur voluptatem incidunt odio repellat et et.&quot;,
            &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
            &quot;created_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;
        },
        {
            &quot;id&quot;: 2,
            &quot;user&quot;: &quot;AdminMaintenance&quot;,
            &quot;title&quot;: &quot;Ms.&quot;,
            &quot;deskripsi&quot;: &quot;Tempora similique sit dignissimos quis rem est error beatae inventore.&quot;,
            &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
            &quot;created_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;
        },
        {
            &quot;id&quot;: 3,
            &quot;user&quot;: &quot;AdminInspeksi&quot;,
            &quot;title&quot;: &quot;Ms.&quot;,
            &quot;deskripsi&quot;: &quot;Quis mollitia a quibusdam in magnam voluptatem ut sint.&quot;,
            &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
            &quot;created_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;
        },
        {
            &quot;id&quot;: 4,
            &quot;user&quot;: &quot;Admin&quot;,
            &quot;title&quot;: &quot;Miss&quot;,
            &quot;deskripsi&quot;: &quot;Ad ad rerum adipisci eveniet sit.&quot;,
            &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
            &quot;created_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;
        },
        {
            &quot;id&quot;: 5,
            &quot;user&quot;: &quot;SuperUser&quot;,
            &quot;title&quot;: &quot;Mr.&quot;,
            &quot;deskripsi&quot;: &quot;Iusto et inventore velit quas qui ipsam.&quot;,
            &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
            &quot;created_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-news-getall" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-news-getall"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-news-getall"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-news-getall" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-news-getall">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-news-getall" data-method="GET"
      data-path="api/v1/news/getall"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-news-getall', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-news-getall"
                    onclick="tryItOut('GETapi-v1-news-getall');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-news-getall"
                    onclick="cancelTryOut('GETapi-v1-news-getall');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-news-getall"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/news/getall</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>MYP_API_KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="MYP_API_KEY" class="auth-value"               data-endpoint="GETapi-v1-news-getall"
               value="{YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>{YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Content-Type"                data-endpoint="GETapi-v1-news-getall"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Accept"                data-endpoint="GETapi-v1-news-getall"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>MYP-API-KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="MYP-API-KEY"                data-endpoint="GETapi-v1-news-getall"
               value="{YOUR_API_KEY}"
               data-component="header">
    <br>
<p>Example: <code>{YOUR_API_KEY}</code></p>
            </div>
                        </form>

                    <h2 id="news-POSTapi-v1-news-store">Store a newly created resource in storage.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-v1-news-store">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://myapi.peltar.id/api/v1/news/store" \
    --header "MYP_API_KEY: {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "MYP-API-KEY: {YOUR_API_KEY}" \
    --data "{
    \"title\": \"consequatur\",
    \"deskripsi\": \"consequatur\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://myapi.peltar.id/api/v1/news/store"
);

const headers = {
    "MYP_API_KEY": "{YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "MYP-API-KEY": "{YOUR_API_KEY}",
};

let body = {
    "title": "consequatur",
    "deskripsi": "consequatur"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'https://myapi.peltar.id/api/v1/news/store',
    [
        'headers' =&gt; [
            'MYP_API_KEY' =&gt; '{YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'MYP-API-KEY' =&gt; '{YOUR_API_KEY}',
        ],
        'json' =&gt; [
            'title' =&gt; 'consequatur',
            'deskripsi' =&gt; 'consequatur',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'https://myapi.peltar.id/api/v1/news/store'
payload = {
    "title": "consequatur",
    "deskripsi": "consequatur"
}
headers = {
  'MYP_API_KEY': '{YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'MYP-API-KEY': '{YOUR_API_KEY}'
}

response = requests.request('POST', url, headers=headers, json=payload)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-news-store">
            <blockquote>
            <p>Example response (500):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 9
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Server Error&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-v1-news-store" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-news-store"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-news-store"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-news-store" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-news-store">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-news-store" data-method="POST"
      data-path="api/v1/news/store"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-news-store', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-news-store"
                    onclick="tryItOut('POSTapi-v1-news-store');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-news-store"
                    onclick="cancelTryOut('POSTapi-v1-news-store');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-news-store"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/news/store</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>MYP_API_KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="MYP_API_KEY" class="auth-value"               data-endpoint="POSTapi-v1-news-store"
               value="{YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>{YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Content-Type"                data-endpoint="POSTapi-v1-news-store"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Accept"                data-endpoint="POSTapi-v1-news-store"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>MYP-API-KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="MYP-API-KEY"                data-endpoint="POSTapi-v1-news-store"
               value="{YOUR_API_KEY}"
               data-component="header">
    <br>
<p>Example: <code>{YOUR_API_KEY}</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>image</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
               name="image"                data-endpoint="POSTapi-v1-news-store"
               value=""
               data-component="body">
    <br>

        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>title</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="title"                data-endpoint="POSTapi-v1-news-store"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>deskripsi</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="deskripsi"                data-endpoint="POSTapi-v1-news-store"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
        </form>

                    <h2 id="news-GETapi-v1-news-show--news_id-">Display the specified resource.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-v1-news-show--news_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://myapi.peltar.id/api/v1/news/show/1" \
    --header "MYP_API_KEY: {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "MYP-API-KEY: {YOUR_API_KEY}"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://myapi.peltar.id/api/v1/news/show/1"
);

const headers = {
    "MYP_API_KEY": "{YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "MYP-API-KEY": "{YOUR_API_KEY}",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'https://myapi.peltar.id/api/v1/news/show/1',
    [
        'headers' =&gt; [
            'MYP_API_KEY' =&gt; '{YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'MYP-API-KEY' =&gt; '{YOUR_API_KEY}',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'https://myapi.peltar.id/api/v1/news/show/1'
headers = {
  'MYP_API_KEY': '{YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'MYP-API-KEY': '{YOUR_API_KEY}'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-news-show--news_id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 8
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;id&quot;: 1,
        &quot;user&quot;: &quot;AdminMaintenance&quot;,
        &quot;title&quot;: &quot;Prof.&quot;,
        &quot;deskripsi&quot;: &quot;Consequatur voluptatem incidunt odio repellat et et.&quot;,
        &quot;image&quot;: &quot;http://myapi.peltar.id/storage/images/News/example.png&quot;,
        &quot;created_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-news-show--news_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-news-show--news_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-news-show--news_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-news-show--news_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-news-show--news_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-news-show--news_id-" data-method="GET"
      data-path="api/v1/news/show/{news_id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-news-show--news_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-news-show--news_id-"
                    onclick="tryItOut('GETapi-v1-news-show--news_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-news-show--news_id-"
                    onclick="cancelTryOut('GETapi-v1-news-show--news_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-news-show--news_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/news/show/{news_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>MYP_API_KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="MYP_API_KEY" class="auth-value"               data-endpoint="GETapi-v1-news-show--news_id-"
               value="{YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>{YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Content-Type"                data-endpoint="GETapi-v1-news-show--news_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Accept"                data-endpoint="GETapi-v1-news-show--news_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>MYP-API-KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="MYP-API-KEY"                data-endpoint="GETapi-v1-news-show--news_id-"
               value="{YOUR_API_KEY}"
               data-component="header">
    <br>
<p>Example: <code>{YOUR_API_KEY}</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>news_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               name="news_id"                data-endpoint="GETapi-v1-news-show--news_id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the news. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="news-POSTapi-v1-news-update--news_id-">Update the specified resource in storage.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-v1-news-update--news_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://myapi.peltar.id/api/v1/news/update/1" \
    --header "MYP_API_KEY: {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "MYP-API-KEY: {YOUR_API_KEY}" \
    --data "{
    \"title\": \"consequatur\",
    \"deskripsi\": \"consequatur\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://myapi.peltar.id/api/v1/news/update/1"
);

const headers = {
    "MYP_API_KEY": "{YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "MYP-API-KEY": "{YOUR_API_KEY}",
};

let body = {
    "title": "consequatur",
    "deskripsi": "consequatur"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'https://myapi.peltar.id/api/v1/news/update/1',
    [
        'headers' =&gt; [
            'MYP_API_KEY' =&gt; '{YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'MYP-API-KEY' =&gt; '{YOUR_API_KEY}',
        ],
        'json' =&gt; [
            'title' =&gt; 'consequatur',
            'deskripsi' =&gt; 'consequatur',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'https://myapi.peltar.id/api/v1/news/update/1'
payload = {
    "title": "consequatur",
    "deskripsi": "consequatur"
}
headers = {
  'MYP_API_KEY': '{YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'MYP-API-KEY': '{YOUR_API_KEY}'
}

response = requests.request('POST', url, headers=headers, json=payload)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-news-update--news_id-">
            <blockquote>
            <p>Example response (403):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 7
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;This action is unauthorized.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-v1-news-update--news_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-news-update--news_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-news-update--news_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-news-update--news_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-news-update--news_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-news-update--news_id-" data-method="POST"
      data-path="api/v1/news/update/{news_id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-news-update--news_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-news-update--news_id-"
                    onclick="tryItOut('POSTapi-v1-news-update--news_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-news-update--news_id-"
                    onclick="cancelTryOut('POSTapi-v1-news-update--news_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-news-update--news_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/news/update/{news_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>MYP_API_KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="MYP_API_KEY" class="auth-value"               data-endpoint="POSTapi-v1-news-update--news_id-"
               value="{YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>{YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Content-Type"                data-endpoint="POSTapi-v1-news-update--news_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Accept"                data-endpoint="POSTapi-v1-news-update--news_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>MYP-API-KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="MYP-API-KEY"                data-endpoint="POSTapi-v1-news-update--news_id-"
               value="{YOUR_API_KEY}"
               data-component="header">
    <br>
<p>Example: <code>{YOUR_API_KEY}</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>news_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               name="news_id"                data-endpoint="POSTapi-v1-news-update--news_id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the news. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>image</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
               name="image"                data-endpoint="POSTapi-v1-news-update--news_id-"
               value=""
               data-component="body">
    <br>

        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>title</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="title"                data-endpoint="POSTapi-v1-news-update--news_id-"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>deskripsi</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="deskripsi"                data-endpoint="POSTapi-v1-news-update--news_id-"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
        </form>

                    <h2 id="news-POSTapi-v1-news-destroy--news_id-">Remove the specified resource from storage.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-v1-news-destroy--news_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://myapi.peltar.id/api/v1/news/destroy/1" \
    --header "MYP_API_KEY: {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "MYP-API-KEY: {YOUR_API_KEY}"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://myapi.peltar.id/api/v1/news/destroy/1"
);

const headers = {
    "MYP_API_KEY": "{YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "MYP-API-KEY": "{YOUR_API_KEY}",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'https://myapi.peltar.id/api/v1/news/destroy/1',
    [
        'headers' =&gt; [
            'MYP_API_KEY' =&gt; '{YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'MYP-API-KEY' =&gt; '{YOUR_API_KEY}',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'https://myapi.peltar.id/api/v1/news/destroy/1'
headers = {
  'MYP_API_KEY': '{YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'MYP-API-KEY': '{YOUR_API_KEY}'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-news-destroy--news_id-">
            <blockquote>
            <p>Example response (403):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 6
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;This action is unauthorized.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-v1-news-destroy--news_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-news-destroy--news_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-news-destroy--news_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-news-destroy--news_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-news-destroy--news_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-news-destroy--news_id-" data-method="POST"
      data-path="api/v1/news/destroy/{news_id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-news-destroy--news_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-news-destroy--news_id-"
                    onclick="tryItOut('POSTapi-v1-news-destroy--news_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-news-destroy--news_id-"
                    onclick="cancelTryOut('POSTapi-v1-news-destroy--news_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-news-destroy--news_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/news/destroy/{news_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>MYP_API_KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="MYP_API_KEY" class="auth-value"               data-endpoint="POSTapi-v1-news-destroy--news_id-"
               value="{YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>{YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Content-Type"                data-endpoint="POSTapi-v1-news-destroy--news_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Accept"                data-endpoint="POSTapi-v1-news-destroy--news_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>MYP-API-KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="MYP-API-KEY"                data-endpoint="POSTapi-v1-news-destroy--news_id-"
               value="{YOUR_API_KEY}"
               data-component="header">
    <br>
<p>Example: <code>{YOUR_API_KEY}</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>news_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               name="news_id"                data-endpoint="POSTapi-v1-news-destroy--news_id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the news. Example: <code>1</code></p>
            </div>
                    </form>

                <h1 id="role">Role</h1>

    

                                <h2 id="role-GETapi-v1-role-getall">Display a listing of the resource.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-v1-role-getall">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://myapi.peltar.id/api/v1/role/getall" \
    --header "MYP_API_KEY: {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "MYP-API-KEY: {YOUR_API_KEY}"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://myapi.peltar.id/api/v1/role/getall"
);

const headers = {
    "MYP_API_KEY": "{YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "MYP-API-KEY": "{YOUR_API_KEY}",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'https://myapi.peltar.id/api/v1/role/getall',
    [
        'headers' =&gt; [
            'MYP_API_KEY' =&gt; '{YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'MYP-API-KEY' =&gt; '{YOUR_API_KEY}',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'https://myapi.peltar.id/api/v1/role/getall'
headers = {
  'MYP_API_KEY': '{YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'MYP-API-KEY': '{YOUR_API_KEY}'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-role-getall">
            <blockquote>
            <p>Example response (403):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 17
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;This action is unauthorized.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-role-getall" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-role-getall"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-role-getall"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-role-getall" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-role-getall">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-role-getall" data-method="GET"
      data-path="api/v1/role/getall"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-role-getall', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-role-getall"
                    onclick="tryItOut('GETapi-v1-role-getall');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-role-getall"
                    onclick="cancelTryOut('GETapi-v1-role-getall');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-role-getall"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/role/getall</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>MYP_API_KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="MYP_API_KEY" class="auth-value"               data-endpoint="GETapi-v1-role-getall"
               value="{YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>{YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Content-Type"                data-endpoint="GETapi-v1-role-getall"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Accept"                data-endpoint="GETapi-v1-role-getall"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>MYP-API-KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="MYP-API-KEY"                data-endpoint="GETapi-v1-role-getall"
               value="{YOUR_API_KEY}"
               data-component="header">
    <br>
<p>Example: <code>{YOUR_API_KEY}</code></p>
            </div>
                        </form>

                    <h2 id="role-GETapi-v1-role-show--role_id-">Display the specified resource.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-v1-role-show--role_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://myapi.peltar.id/api/v1/role/show/1" \
    --header "MYP_API_KEY: {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "MYP-API-KEY: {YOUR_API_KEY}"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://myapi.peltar.id/api/v1/role/show/1"
);

const headers = {
    "MYP_API_KEY": "{YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "MYP-API-KEY": "{YOUR_API_KEY}",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'https://myapi.peltar.id/api/v1/role/show/1',
    [
        'headers' =&gt; [
            'MYP_API_KEY' =&gt; '{YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'MYP-API-KEY' =&gt; '{YOUR_API_KEY}',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'https://myapi.peltar.id/api/v1/role/show/1'
headers = {
  'MYP_API_KEY': '{YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'MYP-API-KEY': '{YOUR_API_KEY}'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-role-show--role_id-">
            <blockquote>
            <p>Example response (403):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 16
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;This action is unauthorized.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-role-show--role_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-role-show--role_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-role-show--role_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-role-show--role_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-role-show--role_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-role-show--role_id-" data-method="GET"
      data-path="api/v1/role/show/{role_id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-role-show--role_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-role-show--role_id-"
                    onclick="tryItOut('GETapi-v1-role-show--role_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-role-show--role_id-"
                    onclick="cancelTryOut('GETapi-v1-role-show--role_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-role-show--role_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/role/show/{role_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>MYP_API_KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="MYP_API_KEY" class="auth-value"               data-endpoint="GETapi-v1-role-show--role_id-"
               value="{YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>{YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Content-Type"                data-endpoint="GETapi-v1-role-show--role_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Accept"                data-endpoint="GETapi-v1-role-show--role_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>MYP-API-KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="MYP-API-KEY"                data-endpoint="GETapi-v1-role-show--role_id-"
               value="{YOUR_API_KEY}"
               data-component="header">
    <br>
<p>Example: <code>{YOUR_API_KEY}</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>role_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               name="role_id"                data-endpoint="GETapi-v1-role-show--role_id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the role. Example: <code>1</code></p>
            </div>
                    </form>

                <h1 id="satuan-kerja">Satuan Kerja</h1>

    

                                <h2 id="satuan-kerja-GETapi-v1-satker-getall">Display a listing of the resource.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-v1-satker-getall">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://myapi.peltar.id/api/v1/satker/getall" \
    --header "MYP_API_KEY: {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "MYP-API-KEY: {YOUR_API_KEY}"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://myapi.peltar.id/api/v1/satker/getall"
);

const headers = {
    "MYP_API_KEY": "{YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "MYP-API-KEY": "{YOUR_API_KEY}",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'https://myapi.peltar.id/api/v1/satker/getall',
    [
        'headers' =&gt; [
            'MYP_API_KEY' =&gt; '{YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'MYP-API-KEY' =&gt; '{YOUR_API_KEY}',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'https://myapi.peltar.id/api/v1/satker/getall'
headers = {
  'MYP_API_KEY': '{YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'MYP-API-KEY': '{YOUR_API_KEY}'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-satker-getall">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 27
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;satker&quot;: &quot;Perawatan&quot;,
            &quot;created_at&quot;: &quot;2024-06-30T19:46:52.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2024-06-30T19:46:52.000000Z&quot;
        },
        {
            &quot;id&quot;: 2,
            &quot;satker&quot;: &quot;Vitae.&quot;,
            &quot;created_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;
        },
        {
            &quot;id&quot;: 3,
            &quot;satker&quot;: &quot;Recusandae consectetur.&quot;,
            &quot;created_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;
        },
        {
            &quot;id&quot;: 4,
            &quot;satker&quot;: &quot;Quaerat.&quot;,
            &quot;created_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;
        },
        {
            &quot;id&quot;: 5,
            &quot;satker&quot;: &quot;Consectetur.&quot;,
            &quot;created_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;
        },
        {
            &quot;id&quot;: 6,
            &quot;satker&quot;: &quot;Similique eum.&quot;,
            &quot;created_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;
        },
        {
            &quot;id&quot;: 7,
            &quot;satker&quot;: &quot;Temporibus.&quot;,
            &quot;created_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;
        },
        {
            &quot;id&quot;: 8,
            &quot;satker&quot;: &quot;Possimus.&quot;,
            &quot;created_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;
        },
        {
            &quot;id&quot;: 9,
            &quot;satker&quot;: &quot;Quis.&quot;,
            &quot;created_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;
        },
        {
            &quot;id&quot;: 10,
            &quot;satker&quot;: &quot;Atque.&quot;,
            &quot;created_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;
        },
        {
            &quot;id&quot;: 11,
            &quot;satker&quot;: &quot;Omnis provident.&quot;,
            &quot;created_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-satker-getall" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-satker-getall"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-satker-getall"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-satker-getall" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-satker-getall">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-satker-getall" data-method="GET"
      data-path="api/v1/satker/getall"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-satker-getall', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-satker-getall"
                    onclick="tryItOut('GETapi-v1-satker-getall');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-satker-getall"
                    onclick="cancelTryOut('GETapi-v1-satker-getall');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-satker-getall"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/satker/getall</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>MYP_API_KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="MYP_API_KEY" class="auth-value"               data-endpoint="GETapi-v1-satker-getall"
               value="{YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>{YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Content-Type"                data-endpoint="GETapi-v1-satker-getall"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Accept"                data-endpoint="GETapi-v1-satker-getall"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>MYP-API-KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="MYP-API-KEY"                data-endpoint="GETapi-v1-satker-getall"
               value="{YOUR_API_KEY}"
               data-component="header">
    <br>
<p>Example: <code>{YOUR_API_KEY}</code></p>
            </div>
                        </form>

                    <h2 id="satuan-kerja-POSTapi-v1-satker-store">Store a newly created resource in storage.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-v1-satker-store">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://myapi.peltar.id/api/v1/satker/store" \
    --header "MYP_API_KEY: {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "MYP-API-KEY: {YOUR_API_KEY}" \
    --data "{
    \"satker\": \"consequatur\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://myapi.peltar.id/api/v1/satker/store"
);

const headers = {
    "MYP_API_KEY": "{YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "MYP-API-KEY": "{YOUR_API_KEY}",
};

let body = {
    "satker": "consequatur"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'https://myapi.peltar.id/api/v1/satker/store',
    [
        'headers' =&gt; [
            'MYP_API_KEY' =&gt; '{YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'MYP-API-KEY' =&gt; '{YOUR_API_KEY}',
        ],
        'json' =&gt; [
            'satker' =&gt; 'consequatur',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'https://myapi.peltar.id/api/v1/satker/store'
payload = {
    "satker": "consequatur"
}
headers = {
  'MYP_API_KEY': '{YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'MYP-API-KEY': '{YOUR_API_KEY}'
}

response = requests.request('POST', url, headers=headers, json=payload)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-satker-store">
            <blockquote>
            <p>Example response (403):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 26
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;This action is unauthorized.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-v1-satker-store" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-satker-store"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-satker-store"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-satker-store" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-satker-store">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-satker-store" data-method="POST"
      data-path="api/v1/satker/store"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-satker-store', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-satker-store"
                    onclick="tryItOut('POSTapi-v1-satker-store');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-satker-store"
                    onclick="cancelTryOut('POSTapi-v1-satker-store');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-satker-store"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/satker/store</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>MYP_API_KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="MYP_API_KEY" class="auth-value"               data-endpoint="POSTapi-v1-satker-store"
               value="{YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>{YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Content-Type"                data-endpoint="POSTapi-v1-satker-store"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Accept"                data-endpoint="POSTapi-v1-satker-store"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>MYP-API-KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="MYP-API-KEY"                data-endpoint="POSTapi-v1-satker-store"
               value="{YOUR_API_KEY}"
               data-component="header">
    <br>
<p>Example: <code>{YOUR_API_KEY}</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>satker</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="satker"                data-endpoint="POSTapi-v1-satker-store"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
        </form>

                    <h2 id="satuan-kerja-GETapi-v1-satker-show--satker_id-">Display the specified resource.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-v1-satker-show--satker_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://myapi.peltar.id/api/v1/satker/show/1" \
    --header "MYP_API_KEY: {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "MYP-API-KEY: {YOUR_API_KEY}"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://myapi.peltar.id/api/v1/satker/show/1"
);

const headers = {
    "MYP_API_KEY": "{YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "MYP-API-KEY": "{YOUR_API_KEY}",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'https://myapi.peltar.id/api/v1/satker/show/1',
    [
        'headers' =&gt; [
            'MYP_API_KEY' =&gt; '{YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'MYP-API-KEY' =&gt; '{YOUR_API_KEY}',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'https://myapi.peltar.id/api/v1/satker/show/1'
headers = {
  'MYP_API_KEY': '{YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'MYP-API-KEY': '{YOUR_API_KEY}'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-satker-show--satker_id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 25
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;id&quot;: 1,
        &quot;satker&quot;: &quot;Perawatan&quot;,
        &quot;subSatker&quot;: [
            {
                &quot;id&quot;: 1,
                &quot;subsatker&quot;: &quot;IT&quot;,
                &quot;id_satker&quot;: 1,
                &quot;created_at&quot;: &quot;2024-06-30T19:46:52.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2024-06-30T19:46:52.000000Z&quot;
            },
            {
                &quot;id&quot;: 2,
                &quot;subsatker&quot;: &quot;Perawatan Listrik&quot;,
                &quot;id_satker&quot;: 1,
                &quot;created_at&quot;: &quot;2024-06-30T19:46:52.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2024-06-30T19:46:52.000000Z&quot;
            },
            {
                &quot;id&quot;: 3,
                &quot;subsatker&quot;: &quot;Mekanik&quot;,
                &quot;id_satker&quot;: 1,
                &quot;created_at&quot;: &quot;2024-06-30T19:46:52.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2024-06-30T19:46:52.000000Z&quot;
            }
        ]
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-satker-show--satker_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-satker-show--satker_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-satker-show--satker_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-satker-show--satker_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-satker-show--satker_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-satker-show--satker_id-" data-method="GET"
      data-path="api/v1/satker/show/{satker_id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-satker-show--satker_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-satker-show--satker_id-"
                    onclick="tryItOut('GETapi-v1-satker-show--satker_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-satker-show--satker_id-"
                    onclick="cancelTryOut('GETapi-v1-satker-show--satker_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-satker-show--satker_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/satker/show/{satker_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>MYP_API_KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="MYP_API_KEY" class="auth-value"               data-endpoint="GETapi-v1-satker-show--satker_id-"
               value="{YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>{YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Content-Type"                data-endpoint="GETapi-v1-satker-show--satker_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Accept"                data-endpoint="GETapi-v1-satker-show--satker_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>MYP-API-KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="MYP-API-KEY"                data-endpoint="GETapi-v1-satker-show--satker_id-"
               value="{YOUR_API_KEY}"
               data-component="header">
    <br>
<p>Example: <code>{YOUR_API_KEY}</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>satker_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               name="satker_id"                data-endpoint="GETapi-v1-satker-show--satker_id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the satker. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="satuan-kerja-POSTapi-v1-satker-update--satker_id-">Update the specified resource in storage.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-v1-satker-update--satker_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://myapi.peltar.id/api/v1/satker/update/1" \
    --header "MYP_API_KEY: {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "MYP-API-KEY: {YOUR_API_KEY}" \
    --data "{
    \"satker\": \"consequatur\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://myapi.peltar.id/api/v1/satker/update/1"
);

const headers = {
    "MYP_API_KEY": "{YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "MYP-API-KEY": "{YOUR_API_KEY}",
};

let body = {
    "satker": "consequatur"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'https://myapi.peltar.id/api/v1/satker/update/1',
    [
        'headers' =&gt; [
            'MYP_API_KEY' =&gt; '{YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'MYP-API-KEY' =&gt; '{YOUR_API_KEY}',
        ],
        'json' =&gt; [
            'satker' =&gt; 'consequatur',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'https://myapi.peltar.id/api/v1/satker/update/1'
payload = {
    "satker": "consequatur"
}
headers = {
  'MYP_API_KEY': '{YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'MYP-API-KEY': '{YOUR_API_KEY}'
}

response = requests.request('POST', url, headers=headers, json=payload)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-satker-update--satker_id-">
            <blockquote>
            <p>Example response (403):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 24
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;This action is unauthorized.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-v1-satker-update--satker_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-satker-update--satker_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-satker-update--satker_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-satker-update--satker_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-satker-update--satker_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-satker-update--satker_id-" data-method="POST"
      data-path="api/v1/satker/update/{satker_id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-satker-update--satker_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-satker-update--satker_id-"
                    onclick="tryItOut('POSTapi-v1-satker-update--satker_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-satker-update--satker_id-"
                    onclick="cancelTryOut('POSTapi-v1-satker-update--satker_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-satker-update--satker_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/satker/update/{satker_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>MYP_API_KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="MYP_API_KEY" class="auth-value"               data-endpoint="POSTapi-v1-satker-update--satker_id-"
               value="{YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>{YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Content-Type"                data-endpoint="POSTapi-v1-satker-update--satker_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Accept"                data-endpoint="POSTapi-v1-satker-update--satker_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>MYP-API-KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="MYP-API-KEY"                data-endpoint="POSTapi-v1-satker-update--satker_id-"
               value="{YOUR_API_KEY}"
               data-component="header">
    <br>
<p>Example: <code>{YOUR_API_KEY}</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>satker_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               name="satker_id"                data-endpoint="POSTapi-v1-satker-update--satker_id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the satker. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>satker</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="satker"                data-endpoint="POSTapi-v1-satker-update--satker_id-"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
        </form>

                    <h2 id="satuan-kerja-POSTapi-v1-satker-destroy--satker_id-">Remove the specified resource from storage.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-v1-satker-destroy--satker_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://myapi.peltar.id/api/v1/satker/destroy/1" \
    --header "MYP_API_KEY: {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "MYP-API-KEY: {YOUR_API_KEY}"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://myapi.peltar.id/api/v1/satker/destroy/1"
);

const headers = {
    "MYP_API_KEY": "{YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "MYP-API-KEY": "{YOUR_API_KEY}",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'https://myapi.peltar.id/api/v1/satker/destroy/1',
    [
        'headers' =&gt; [
            'MYP_API_KEY' =&gt; '{YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'MYP-API-KEY' =&gt; '{YOUR_API_KEY}',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'https://myapi.peltar.id/api/v1/satker/destroy/1'
headers = {
  'MYP_API_KEY': '{YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'MYP-API-KEY': '{YOUR_API_KEY}'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-satker-destroy--satker_id-">
            <blockquote>
            <p>Example response (403):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 23
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;This action is unauthorized.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-v1-satker-destroy--satker_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-satker-destroy--satker_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-satker-destroy--satker_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-satker-destroy--satker_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-satker-destroy--satker_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-satker-destroy--satker_id-" data-method="POST"
      data-path="api/v1/satker/destroy/{satker_id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-satker-destroy--satker_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-satker-destroy--satker_id-"
                    onclick="tryItOut('POSTapi-v1-satker-destroy--satker_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-satker-destroy--satker_id-"
                    onclick="cancelTryOut('POSTapi-v1-satker-destroy--satker_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-satker-destroy--satker_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/satker/destroy/{satker_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>MYP_API_KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="MYP_API_KEY" class="auth-value"               data-endpoint="POSTapi-v1-satker-destroy--satker_id-"
               value="{YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>{YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Content-Type"                data-endpoint="POSTapi-v1-satker-destroy--satker_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Accept"                data-endpoint="POSTapi-v1-satker-destroy--satker_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>MYP-API-KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="MYP-API-KEY"                data-endpoint="POSTapi-v1-satker-destroy--satker_id-"
               value="{YOUR_API_KEY}"
               data-component="header">
    <br>
<p>Example: <code>{YOUR_API_KEY}</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>satker_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               name="satker_id"                data-endpoint="POSTapi-v1-satker-destroy--satker_id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the satker. Example: <code>1</code></p>
            </div>
                    </form>

                <h1 id="status">Status</h1>

    

                                <h2 id="status-GETapi-v1-statusa-getall">Display a listing of the resource.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-v1-statusa-getall">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://myapi.peltar.id/api/v1/statusa/getall" \
    --header "MYP_API_KEY: {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "MYP-API-KEY: {YOUR_API_KEY}"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://myapi.peltar.id/api/v1/statusa/getall"
);

const headers = {
    "MYP_API_KEY": "{YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "MYP-API-KEY": "{YOUR_API_KEY}",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'https://myapi.peltar.id/api/v1/statusa/getall',
    [
        'headers' =&gt; [
            'MYP_API_KEY' =&gt; '{YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'MYP-API-KEY' =&gt; '{YOUR_API_KEY}',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'https://myapi.peltar.id/api/v1/statusa/getall'
headers = {
  'MYP_API_KEY': '{YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'MYP-API-KEY': '{YOUR_API_KEY}'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-statusa-getall">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 15
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;current_page&quot;: 1,
        &quot;data&quot;: [
            {
                &quot;id&quot;: 1,
                &quot;statustype&quot;: &quot;ASST&quot;,
                &quot;status&quot;: &quot;Dalam Perbaikan&quot;,
                &quot;created_at&quot;: &quot;2024-06-30T19:46:53.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2024-06-30T19:46:53.000000Z&quot;
            },
            {
                &quot;id&quot;: 2,
                &quot;statustype&quot;: &quot;ASST&quot;,
                &quot;status&quot;: &quot;Baik&quot;,
                &quot;created_at&quot;: &quot;2024-06-30T19:46:53.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2024-06-30T19:46:53.000000Z&quot;
            },
            {
                &quot;id&quot;: 3,
                &quot;statustype&quot;: &quot;ASST&quot;,
                &quot;status&quot;: &quot;Rusak&quot;,
                &quot;created_at&quot;: &quot;2024-06-30T19:46:53.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2024-06-30T19:46:53.000000Z&quot;
            },
            {
                &quot;id&quot;: 4,
                &quot;statustype&quot;: &quot;MTNC&quot;,
                &quot;status&quot;: &quot;Pending&quot;,
                &quot;created_at&quot;: &quot;2024-06-30T19:46:53.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2024-06-30T19:46:53.000000Z&quot;
            },
            {
                &quot;id&quot;: 5,
                &quot;statustype&quot;: &quot;MTNC&quot;,
                &quot;status&quot;: &quot;Dalam Perbaikan&quot;,
                &quot;created_at&quot;: &quot;2024-06-30T19:46:53.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2024-06-30T19:46:53.000000Z&quot;
            },
            {
                &quot;id&quot;: 6,
                &quot;statustype&quot;: &quot;MTNC&quot;,
                &quot;status&quot;: &quot;Selesai&quot;,
                &quot;created_at&quot;: &quot;2024-06-30T19:46:53.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2024-06-30T19:46:53.000000Z&quot;
            }
        ],
        &quot;first_page_url&quot;: &quot;http://mypeltar/api/v1/statusa/getall?page=1&quot;,
        &quot;from&quot;: 1,
        &quot;last_page&quot;: 1,
        &quot;last_page_url&quot;: &quot;http://mypeltar/api/v1/statusa/getall?page=1&quot;,
        &quot;links&quot;: [
            {
                &quot;url&quot;: null,
                &quot;label&quot;: &quot;&amp;laquo; Previous&quot;,
                &quot;active&quot;: false
            },
            {
                &quot;url&quot;: &quot;http://mypeltar/api/v1/statusa/getall?page=1&quot;,
                &quot;label&quot;: &quot;1&quot;,
                &quot;active&quot;: true
            },
            {
                &quot;url&quot;: null,
                &quot;label&quot;: &quot;Next &amp;raquo;&quot;,
                &quot;active&quot;: false
            }
        ],
        &quot;next_page_url&quot;: null,
        &quot;path&quot;: &quot;http://mypeltar/api/v1/statusa/getall&quot;,
        &quot;per_page&quot;: 50,
        &quot;prev_page_url&quot;: null,
        &quot;to&quot;: 6,
        &quot;total&quot;: 6
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-statusa-getall" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-statusa-getall"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-statusa-getall"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-statusa-getall" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-statusa-getall">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-statusa-getall" data-method="GET"
      data-path="api/v1/statusa/getall"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-statusa-getall', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-statusa-getall"
                    onclick="tryItOut('GETapi-v1-statusa-getall');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-statusa-getall"
                    onclick="cancelTryOut('GETapi-v1-statusa-getall');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-statusa-getall"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/statusa/getall</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>MYP_API_KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="MYP_API_KEY" class="auth-value"               data-endpoint="GETapi-v1-statusa-getall"
               value="{YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>{YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Content-Type"                data-endpoint="GETapi-v1-statusa-getall"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Accept"                data-endpoint="GETapi-v1-statusa-getall"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>MYP-API-KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="MYP-API-KEY"                data-endpoint="GETapi-v1-statusa-getall"
               value="{YOUR_API_KEY}"
               data-component="header">
    <br>
<p>Example: <code>{YOUR_API_KEY}</code></p>
            </div>
                        </form>

                    <h2 id="status-POSTapi-v1-statusa-store">Store a newly created resource in storage.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-v1-statusa-store">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://myapi.peltar.id/api/v1/statusa/store" \
    --header "MYP_API_KEY: {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "MYP-API-KEY: {YOUR_API_KEY}" \
    --data "{
    \"status\": \"consequatur\",
    \"statustype\": \"consequatur\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://myapi.peltar.id/api/v1/statusa/store"
);

const headers = {
    "MYP_API_KEY": "{YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "MYP-API-KEY": "{YOUR_API_KEY}",
};

let body = {
    "status": "consequatur",
    "statustype": "consequatur"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'https://myapi.peltar.id/api/v1/statusa/store',
    [
        'headers' =&gt; [
            'MYP_API_KEY' =&gt; '{YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'MYP-API-KEY' =&gt; '{YOUR_API_KEY}',
        ],
        'json' =&gt; [
            'status' =&gt; 'consequatur',
            'statustype' =&gt; 'consequatur',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'https://myapi.peltar.id/api/v1/statusa/store'
payload = {
    "status": "consequatur",
    "statustype": "consequatur"
}
headers = {
  'MYP_API_KEY': '{YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'MYP-API-KEY': '{YOUR_API_KEY}'
}

response = requests.request('POST', url, headers=headers, json=payload)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-statusa-store">
            <blockquote>
            <p>Example response (403):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 14
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;This action is unauthorized.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-v1-statusa-store" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-statusa-store"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-statusa-store"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-statusa-store" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-statusa-store">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-statusa-store" data-method="POST"
      data-path="api/v1/statusa/store"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-statusa-store', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-statusa-store"
                    onclick="tryItOut('POSTapi-v1-statusa-store');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-statusa-store"
                    onclick="cancelTryOut('POSTapi-v1-statusa-store');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-statusa-store"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/statusa/store</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>MYP_API_KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="MYP_API_KEY" class="auth-value"               data-endpoint="POSTapi-v1-statusa-store"
               value="{YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>{YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Content-Type"                data-endpoint="POSTapi-v1-statusa-store"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Accept"                data-endpoint="POSTapi-v1-statusa-store"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>MYP-API-KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="MYP-API-KEY"                data-endpoint="POSTapi-v1-statusa-store"
               value="{YOUR_API_KEY}"
               data-component="header">
    <br>
<p>Example: <code>{YOUR_API_KEY}</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="status"                data-endpoint="POSTapi-v1-statusa-store"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>statustype</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="statustype"                data-endpoint="POSTapi-v1-statusa-store"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
        </form>

                    <h2 id="status-GETapi-v1-statusa-show--statusassets-">Display the specified resource.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-v1-statusa-show--statusassets-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://myapi.peltar.id/api/v1/statusa/show/consequatur" \
    --header "MYP_API_KEY: {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "MYP-API-KEY: {YOUR_API_KEY}"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://myapi.peltar.id/api/v1/statusa/show/consequatur"
);

const headers = {
    "MYP_API_KEY": "{YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "MYP-API-KEY": "{YOUR_API_KEY}",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'https://myapi.peltar.id/api/v1/statusa/show/consequatur',
    [
        'headers' =&gt; [
            'MYP_API_KEY' =&gt; '{YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'MYP-API-KEY' =&gt; '{YOUR_API_KEY}',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'https://myapi.peltar.id/api/v1/statusa/show/consequatur'
headers = {
  'MYP_API_KEY': '{YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'MYP-API-KEY': '{YOUR_API_KEY}'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-statusa-show--statusassets-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 13
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: []
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-statusa-show--statusassets-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-statusa-show--statusassets-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-statusa-show--statusassets-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-statusa-show--statusassets-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-statusa-show--statusassets-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-statusa-show--statusassets-" data-method="GET"
      data-path="api/v1/statusa/show/{statusassets}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-statusa-show--statusassets-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-statusa-show--statusassets-"
                    onclick="tryItOut('GETapi-v1-statusa-show--statusassets-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-statusa-show--statusassets-"
                    onclick="cancelTryOut('GETapi-v1-statusa-show--statusassets-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-statusa-show--statusassets-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/statusa/show/{statusassets}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>MYP_API_KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="MYP_API_KEY" class="auth-value"               data-endpoint="GETapi-v1-statusa-show--statusassets-"
               value="{YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>{YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Content-Type"                data-endpoint="GETapi-v1-statusa-show--statusassets-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Accept"                data-endpoint="GETapi-v1-statusa-show--statusassets-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>MYP-API-KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="MYP-API-KEY"                data-endpoint="GETapi-v1-statusa-show--statusassets-"
               value="{YOUR_API_KEY}"
               data-component="header">
    <br>
<p>Example: <code>{YOUR_API_KEY}</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>statusassets</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="statusassets"                data-endpoint="GETapi-v1-statusa-show--statusassets-"
               value="consequatur"
               data-component="url">
    <br>
<p>Example: <code>consequatur</code></p>
            </div>
                    </form>

                    <h2 id="status-POSTapi-v1-statusa-update--statusassets-">Update the specified resource in storage.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-v1-statusa-update--statusassets-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://myapi.peltar.id/api/v1/statusa/update/consequatur" \
    --header "MYP_API_KEY: {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "MYP-API-KEY: {YOUR_API_KEY}" \
    --data "{
    \"status\": \"consequatur\",
    \"statustype\": \"consequatur\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://myapi.peltar.id/api/v1/statusa/update/consequatur"
);

const headers = {
    "MYP_API_KEY": "{YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "MYP-API-KEY": "{YOUR_API_KEY}",
};

let body = {
    "status": "consequatur",
    "statustype": "consequatur"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'https://myapi.peltar.id/api/v1/statusa/update/consequatur',
    [
        'headers' =&gt; [
            'MYP_API_KEY' =&gt; '{YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'MYP-API-KEY' =&gt; '{YOUR_API_KEY}',
        ],
        'json' =&gt; [
            'status' =&gt; 'consequatur',
            'statustype' =&gt; 'consequatur',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'https://myapi.peltar.id/api/v1/statusa/update/consequatur'
payload = {
    "status": "consequatur",
    "statustype": "consequatur"
}
headers = {
  'MYP_API_KEY': '{YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'MYP-API-KEY': '{YOUR_API_KEY}'
}

response = requests.request('POST', url, headers=headers, json=payload)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-statusa-update--statusassets-">
            <blockquote>
            <p>Example response (403):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 12
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;This action is unauthorized.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-v1-statusa-update--statusassets-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-statusa-update--statusassets-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-statusa-update--statusassets-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-statusa-update--statusassets-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-statusa-update--statusassets-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-statusa-update--statusassets-" data-method="POST"
      data-path="api/v1/statusa/update/{statusassets}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-statusa-update--statusassets-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-statusa-update--statusassets-"
                    onclick="tryItOut('POSTapi-v1-statusa-update--statusassets-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-statusa-update--statusassets-"
                    onclick="cancelTryOut('POSTapi-v1-statusa-update--statusassets-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-statusa-update--statusassets-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/statusa/update/{statusassets}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>MYP_API_KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="MYP_API_KEY" class="auth-value"               data-endpoint="POSTapi-v1-statusa-update--statusassets-"
               value="{YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>{YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Content-Type"                data-endpoint="POSTapi-v1-statusa-update--statusassets-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Accept"                data-endpoint="POSTapi-v1-statusa-update--statusassets-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>MYP-API-KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="MYP-API-KEY"                data-endpoint="POSTapi-v1-statusa-update--statusassets-"
               value="{YOUR_API_KEY}"
               data-component="header">
    <br>
<p>Example: <code>{YOUR_API_KEY}</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>statusassets</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="statusassets"                data-endpoint="POSTapi-v1-statusa-update--statusassets-"
               value="consequatur"
               data-component="url">
    <br>
<p>Example: <code>consequatur</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="status"                data-endpoint="POSTapi-v1-statusa-update--statusassets-"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>statustype</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="statustype"                data-endpoint="POSTapi-v1-statusa-update--statusassets-"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
        </form>

                    <h2 id="status-POSTapi-v1-statusa-destroy--statusassets-">Remove the specified resource from storage.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-v1-statusa-destroy--statusassets-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://myapi.peltar.id/api/v1/statusa/destroy/consequatur" \
    --header "MYP_API_KEY: {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "MYP-API-KEY: {YOUR_API_KEY}"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://myapi.peltar.id/api/v1/statusa/destroy/consequatur"
);

const headers = {
    "MYP_API_KEY": "{YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "MYP-API-KEY": "{YOUR_API_KEY}",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'https://myapi.peltar.id/api/v1/statusa/destroy/consequatur',
    [
        'headers' =&gt; [
            'MYP_API_KEY' =&gt; '{YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'MYP-API-KEY' =&gt; '{YOUR_API_KEY}',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'https://myapi.peltar.id/api/v1/statusa/destroy/consequatur'
headers = {
  'MYP_API_KEY': '{YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'MYP-API-KEY': '{YOUR_API_KEY}'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-statusa-destroy--statusassets-">
            <blockquote>
            <p>Example response (403):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 11
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;This action is unauthorized.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-v1-statusa-destroy--statusassets-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-statusa-destroy--statusassets-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-statusa-destroy--statusassets-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-statusa-destroy--statusassets-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-statusa-destroy--statusassets-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-statusa-destroy--statusassets-" data-method="POST"
      data-path="api/v1/statusa/destroy/{statusassets}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-statusa-destroy--statusassets-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-statusa-destroy--statusassets-"
                    onclick="tryItOut('POSTapi-v1-statusa-destroy--statusassets-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-statusa-destroy--statusassets-"
                    onclick="cancelTryOut('POSTapi-v1-statusa-destroy--statusassets-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-statusa-destroy--statusassets-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/statusa/destroy/{statusassets}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>MYP_API_KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="MYP_API_KEY" class="auth-value"               data-endpoint="POSTapi-v1-statusa-destroy--statusassets-"
               value="{YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>{YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Content-Type"                data-endpoint="POSTapi-v1-statusa-destroy--statusassets-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Accept"                data-endpoint="POSTapi-v1-statusa-destroy--statusassets-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>MYP-API-KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="MYP-API-KEY"                data-endpoint="POSTapi-v1-statusa-destroy--statusassets-"
               value="{YOUR_API_KEY}"
               data-component="header">
    <br>
<p>Example: <code>{YOUR_API_KEY}</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>statusassets</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="statusassets"                data-endpoint="POSTapi-v1-statusa-destroy--statusassets-"
               value="consequatur"
               data-component="url">
    <br>
<p>Example: <code>consequatur</code></p>
            </div>
                    </form>

                <h1 id="sub-satuan-kerja">Sub Satuan Kerja</h1>

    

                                <h2 id="sub-satuan-kerja-GETapi-v1-subsatker-getall">Display a listing of the resource.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-v1-subsatker-getall">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://myapi.peltar.id/api/v1/subsatker/getall" \
    --header "MYP_API_KEY: {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "MYP-API-KEY: {YOUR_API_KEY}"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://myapi.peltar.id/api/v1/subsatker/getall"
);

const headers = {
    "MYP_API_KEY": "{YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "MYP-API-KEY": "{YOUR_API_KEY}",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'https://myapi.peltar.id/api/v1/subsatker/getall',
    [
        'headers' =&gt; [
            'MYP_API_KEY' =&gt; '{YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'MYP-API-KEY' =&gt; '{YOUR_API_KEY}',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'https://myapi.peltar.id/api/v1/subsatker/getall'
headers = {
  'MYP_API_KEY': '{YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'MYP-API-KEY': '{YOUR_API_KEY}'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-subsatker-getall">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 22
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;subsatker&quot;: &quot;IT&quot;,
            &quot;satker&quot;: {
                &quot;id&quot;: 1,
                &quot;satker&quot;: &quot;Perawatan&quot;,
                &quot;created_at&quot;: &quot;2024-06-30T19:46:52.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2024-06-30T19:46:52.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: 2,
            &quot;subsatker&quot;: &quot;Perawatan Listrik&quot;,
            &quot;satker&quot;: {
                &quot;id&quot;: 1,
                &quot;satker&quot;: &quot;Perawatan&quot;,
                &quot;created_at&quot;: &quot;2024-06-30T19:46:52.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2024-06-30T19:46:52.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: 3,
            &quot;subsatker&quot;: &quot;Mekanik&quot;,
            &quot;satker&quot;: {
                &quot;id&quot;: 1,
                &quot;satker&quot;: &quot;Perawatan&quot;,
                &quot;created_at&quot;: &quot;2024-06-30T19:46:52.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2024-06-30T19:46:52.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: 4,
            &quot;subsatker&quot;: &quot;Sequi.&quot;,
            &quot;satker&quot;: {
                &quot;id&quot;: 7,
                &quot;satker&quot;: &quot;Temporibus.&quot;,
                &quot;created_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: 5,
            &quot;subsatker&quot;: &quot;Dolore.&quot;,
            &quot;satker&quot;: {
                &quot;id&quot;: 8,
                &quot;satker&quot;: &quot;Possimus.&quot;,
                &quot;created_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: 6,
            &quot;subsatker&quot;: &quot;Voluptate.&quot;,
            &quot;satker&quot;: {
                &quot;id&quot;: 9,
                &quot;satker&quot;: &quot;Quis.&quot;,
                &quot;created_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: 7,
            &quot;subsatker&quot;: &quot;Repellendus.&quot;,
            &quot;satker&quot;: {
                &quot;id&quot;: 10,
                &quot;satker&quot;: &quot;Atque.&quot;,
                &quot;created_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;
            }
        },
        {
            &quot;id&quot;: 8,
            &quot;subsatker&quot;: &quot;In earum.&quot;,
            &quot;satker&quot;: {
                &quot;id&quot;: 11,
                &quot;satker&quot;: &quot;Omnis provident.&quot;,
                &quot;created_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2024-06-30T19:46:54.000000Z&quot;
            }
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-subsatker-getall" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-subsatker-getall"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-subsatker-getall"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-subsatker-getall" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-subsatker-getall">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-subsatker-getall" data-method="GET"
      data-path="api/v1/subsatker/getall"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-subsatker-getall', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-subsatker-getall"
                    onclick="tryItOut('GETapi-v1-subsatker-getall');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-subsatker-getall"
                    onclick="cancelTryOut('GETapi-v1-subsatker-getall');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-subsatker-getall"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/subsatker/getall</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>MYP_API_KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="MYP_API_KEY" class="auth-value"               data-endpoint="GETapi-v1-subsatker-getall"
               value="{YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>{YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Content-Type"                data-endpoint="GETapi-v1-subsatker-getall"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Accept"                data-endpoint="GETapi-v1-subsatker-getall"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>MYP-API-KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="MYP-API-KEY"                data-endpoint="GETapi-v1-subsatker-getall"
               value="{YOUR_API_KEY}"
               data-component="header">
    <br>
<p>Example: <code>{YOUR_API_KEY}</code></p>
            </div>
                        </form>

                    <h2 id="sub-satuan-kerja-POSTapi-v1-subsatker-store">Store a newly created resource in storage.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-v1-subsatker-store">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://myapi.peltar.id/api/v1/subsatker/store" \
    --header "MYP_API_KEY: {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "MYP-API-KEY: {YOUR_API_KEY}" \
    --data "{
    \"subsatker\": \"consequatur\",
    \"satker\": 17
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://myapi.peltar.id/api/v1/subsatker/store"
);

const headers = {
    "MYP_API_KEY": "{YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "MYP-API-KEY": "{YOUR_API_KEY}",
};

let body = {
    "subsatker": "consequatur",
    "satker": 17
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'https://myapi.peltar.id/api/v1/subsatker/store',
    [
        'headers' =&gt; [
            'MYP_API_KEY' =&gt; '{YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'MYP-API-KEY' =&gt; '{YOUR_API_KEY}',
        ],
        'json' =&gt; [
            'subsatker' =&gt; 'consequatur',
            'satker' =&gt; 17,
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'https://myapi.peltar.id/api/v1/subsatker/store'
payload = {
    "subsatker": "consequatur",
    "satker": 17
}
headers = {
  'MYP_API_KEY': '{YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'MYP-API-KEY': '{YOUR_API_KEY}'
}

response = requests.request('POST', url, headers=headers, json=payload)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-subsatker-store">
            <blockquote>
            <p>Example response (403):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 21
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;This action is unauthorized.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-v1-subsatker-store" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-subsatker-store"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-subsatker-store"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-subsatker-store" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-subsatker-store">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-subsatker-store" data-method="POST"
      data-path="api/v1/subsatker/store"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-subsatker-store', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-subsatker-store"
                    onclick="tryItOut('POSTapi-v1-subsatker-store');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-subsatker-store"
                    onclick="cancelTryOut('POSTapi-v1-subsatker-store');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-subsatker-store"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/subsatker/store</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>MYP_API_KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="MYP_API_KEY" class="auth-value"               data-endpoint="POSTapi-v1-subsatker-store"
               value="{YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>{YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Content-Type"                data-endpoint="POSTapi-v1-subsatker-store"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Accept"                data-endpoint="POSTapi-v1-subsatker-store"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>MYP-API-KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="MYP-API-KEY"                data-endpoint="POSTapi-v1-subsatker-store"
               value="{YOUR_API_KEY}"
               data-component="header">
    <br>
<p>Example: <code>{YOUR_API_KEY}</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>subsatker</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="subsatker"                data-endpoint="POSTapi-v1-subsatker-store"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>satker</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               name="satker"                data-endpoint="POSTapi-v1-subsatker-store"
               value="17"
               data-component="body">
    <br>
<p>Example: <code>17</code></p>
        </div>
        </form>

                    <h2 id="sub-satuan-kerja-GETapi-v1-subsatker-show--subsatker_id-">Display the specified resource.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-v1-subsatker-show--subsatker_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://myapi.peltar.id/api/v1/subsatker/show/1" \
    --header "MYP_API_KEY: {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "MYP-API-KEY: {YOUR_API_KEY}"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://myapi.peltar.id/api/v1/subsatker/show/1"
);

const headers = {
    "MYP_API_KEY": "{YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "MYP-API-KEY": "{YOUR_API_KEY}",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'https://myapi.peltar.id/api/v1/subsatker/show/1',
    [
        'headers' =&gt; [
            'MYP_API_KEY' =&gt; '{YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'MYP-API-KEY' =&gt; '{YOUR_API_KEY}',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'https://myapi.peltar.id/api/v1/subsatker/show/1'
headers = {
  'MYP_API_KEY': '{YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'MYP-API-KEY': '{YOUR_API_KEY}'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-subsatker-show--subsatker_id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 20
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;id&quot;: 1,
        &quot;subsatker&quot;: &quot;IT&quot;,
        &quot;satker&quot;: {
            &quot;id&quot;: 1,
            &quot;satker&quot;: &quot;Perawatan&quot;,
            &quot;created_at&quot;: &quot;2024-06-30T19:46:52.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2024-06-30T19:46:52.000000Z&quot;
        }
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-subsatker-show--subsatker_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-subsatker-show--subsatker_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-subsatker-show--subsatker_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-subsatker-show--subsatker_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-subsatker-show--subsatker_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-subsatker-show--subsatker_id-" data-method="GET"
      data-path="api/v1/subsatker/show/{subsatker_id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-subsatker-show--subsatker_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-subsatker-show--subsatker_id-"
                    onclick="tryItOut('GETapi-v1-subsatker-show--subsatker_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-subsatker-show--subsatker_id-"
                    onclick="cancelTryOut('GETapi-v1-subsatker-show--subsatker_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-subsatker-show--subsatker_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/subsatker/show/{subsatker_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>MYP_API_KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="MYP_API_KEY" class="auth-value"               data-endpoint="GETapi-v1-subsatker-show--subsatker_id-"
               value="{YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>{YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Content-Type"                data-endpoint="GETapi-v1-subsatker-show--subsatker_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Accept"                data-endpoint="GETapi-v1-subsatker-show--subsatker_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>MYP-API-KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="MYP-API-KEY"                data-endpoint="GETapi-v1-subsatker-show--subsatker_id-"
               value="{YOUR_API_KEY}"
               data-component="header">
    <br>
<p>Example: <code>{YOUR_API_KEY}</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>subsatker_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               name="subsatker_id"                data-endpoint="GETapi-v1-subsatker-show--subsatker_id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the subsatker. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="sub-satuan-kerja-POSTapi-v1-subsatker-update--subsatker_id-">Update the specified resource in storage.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-v1-subsatker-update--subsatker_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://myapi.peltar.id/api/v1/subsatker/update/1" \
    --header "MYP_API_KEY: {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "MYP-API-KEY: {YOUR_API_KEY}" \
    --data "{
    \"subsatker\": \"consequatur\",
    \"satker\": 17
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://myapi.peltar.id/api/v1/subsatker/update/1"
);

const headers = {
    "MYP_API_KEY": "{YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "MYP-API-KEY": "{YOUR_API_KEY}",
};

let body = {
    "subsatker": "consequatur",
    "satker": 17
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'https://myapi.peltar.id/api/v1/subsatker/update/1',
    [
        'headers' =&gt; [
            'MYP_API_KEY' =&gt; '{YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'MYP-API-KEY' =&gt; '{YOUR_API_KEY}',
        ],
        'json' =&gt; [
            'subsatker' =&gt; 'consequatur',
            'satker' =&gt; 17,
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'https://myapi.peltar.id/api/v1/subsatker/update/1'
payload = {
    "subsatker": "consequatur",
    "satker": 17
}
headers = {
  'MYP_API_KEY': '{YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'MYP-API-KEY': '{YOUR_API_KEY}'
}

response = requests.request('POST', url, headers=headers, json=payload)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-subsatker-update--subsatker_id-">
            <blockquote>
            <p>Example response (403):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 19
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;This action is unauthorized.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-v1-subsatker-update--subsatker_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-subsatker-update--subsatker_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-subsatker-update--subsatker_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-subsatker-update--subsatker_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-subsatker-update--subsatker_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-subsatker-update--subsatker_id-" data-method="POST"
      data-path="api/v1/subsatker/update/{subsatker_id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-subsatker-update--subsatker_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-subsatker-update--subsatker_id-"
                    onclick="tryItOut('POSTapi-v1-subsatker-update--subsatker_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-subsatker-update--subsatker_id-"
                    onclick="cancelTryOut('POSTapi-v1-subsatker-update--subsatker_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-subsatker-update--subsatker_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/subsatker/update/{subsatker_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>MYP_API_KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="MYP_API_KEY" class="auth-value"               data-endpoint="POSTapi-v1-subsatker-update--subsatker_id-"
               value="{YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>{YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Content-Type"                data-endpoint="POSTapi-v1-subsatker-update--subsatker_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Accept"                data-endpoint="POSTapi-v1-subsatker-update--subsatker_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>MYP-API-KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="MYP-API-KEY"                data-endpoint="POSTapi-v1-subsatker-update--subsatker_id-"
               value="{YOUR_API_KEY}"
               data-component="header">
    <br>
<p>Example: <code>{YOUR_API_KEY}</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>subsatker_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               name="subsatker_id"                data-endpoint="POSTapi-v1-subsatker-update--subsatker_id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the subsatker. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>subsatker</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="subsatker"                data-endpoint="POSTapi-v1-subsatker-update--subsatker_id-"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>satker</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               name="satker"                data-endpoint="POSTapi-v1-subsatker-update--subsatker_id-"
               value="17"
               data-component="body">
    <br>
<p>Example: <code>17</code></p>
        </div>
        </form>

                    <h2 id="sub-satuan-kerja-POSTapi-v1-subsatker-destroy--subsatker_id-">Remove the specified resource from storage.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-v1-subsatker-destroy--subsatker_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://myapi.peltar.id/api/v1/subsatker/destroy/1" \
    --header "MYP_API_KEY: {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "MYP-API-KEY: {YOUR_API_KEY}"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://myapi.peltar.id/api/v1/subsatker/destroy/1"
);

const headers = {
    "MYP_API_KEY": "{YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "MYP-API-KEY": "{YOUR_API_KEY}",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'https://myapi.peltar.id/api/v1/subsatker/destroy/1',
    [
        'headers' =&gt; [
            'MYP_API_KEY' =&gt; '{YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'MYP-API-KEY' =&gt; '{YOUR_API_KEY}',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'https://myapi.peltar.id/api/v1/subsatker/destroy/1'
headers = {
  'MYP_API_KEY': '{YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'MYP-API-KEY': '{YOUR_API_KEY}'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-subsatker-destroy--subsatker_id-">
            <blockquote>
            <p>Example response (403):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 18
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;This action is unauthorized.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-v1-subsatker-destroy--subsatker_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-subsatker-destroy--subsatker_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-subsatker-destroy--subsatker_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-subsatker-destroy--subsatker_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-subsatker-destroy--subsatker_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-subsatker-destroy--subsatker_id-" data-method="POST"
      data-path="api/v1/subsatker/destroy/{subsatker_id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-subsatker-destroy--subsatker_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-subsatker-destroy--subsatker_id-"
                    onclick="tryItOut('POSTapi-v1-subsatker-destroy--subsatker_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-subsatker-destroy--subsatker_id-"
                    onclick="cancelTryOut('POSTapi-v1-subsatker-destroy--subsatker_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-subsatker-destroy--subsatker_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/subsatker/destroy/{subsatker_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>MYP_API_KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="MYP_API_KEY" class="auth-value"               data-endpoint="POSTapi-v1-subsatker-destroy--subsatker_id-"
               value="{YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>{YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Content-Type"                data-endpoint="POSTapi-v1-subsatker-destroy--subsatker_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Accept"                data-endpoint="POSTapi-v1-subsatker-destroy--subsatker_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>MYP-API-KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="MYP-API-KEY"                data-endpoint="POSTapi-v1-subsatker-destroy--subsatker_id-"
               value="{YOUR_API_KEY}"
               data-component="header">
    <br>
<p>Example: <code>{YOUR_API_KEY}</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>subsatker_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               name="subsatker_id"                data-endpoint="POSTapi-v1-subsatker-destroy--subsatker_id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the subsatker. Example: <code>1</code></p>
            </div>
                    </form>

                <h1 id="users">Users</h1>

    

                                <h2 id="users-GETapi-v1-user-getall">GET api/v1/user/getall</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-v1-user-getall">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://myapi.peltar.id/api/v1/user/getall" \
    --header "MYP_API_KEY: {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "MYP-API-KEY: {YOUR_API_KEY}"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://myapi.peltar.id/api/v1/user/getall"
);

const headers = {
    "MYP_API_KEY": "{YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "MYP-API-KEY": "{YOUR_API_KEY}",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'https://myapi.peltar.id/api/v1/user/getall',
    [
        'headers' =&gt; [
            'MYP_API_KEY' =&gt; '{YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'MYP-API-KEY' =&gt; '{YOUR_API_KEY}',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'https://myapi.peltar.id/api/v1/user/getall'
headers = {
  'MYP_API_KEY': '{YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'MYP-API-KEY': '{YOUR_API_KEY}'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-user-getall">
            <blockquote>
            <p>Example response (403):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 56
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;This action is unauthorized.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-user-getall" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-user-getall"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-user-getall"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-user-getall" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-user-getall">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-user-getall" data-method="GET"
      data-path="api/v1/user/getall"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-user-getall', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-user-getall"
                    onclick="tryItOut('GETapi-v1-user-getall');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-user-getall"
                    onclick="cancelTryOut('GETapi-v1-user-getall');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-user-getall"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/user/getall</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>MYP_API_KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="MYP_API_KEY" class="auth-value"               data-endpoint="GETapi-v1-user-getall"
               value="{YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>{YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Content-Type"                data-endpoint="GETapi-v1-user-getall"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Accept"                data-endpoint="GETapi-v1-user-getall"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>MYP-API-KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="MYP-API-KEY"                data-endpoint="GETapi-v1-user-getall"
               value="{YOUR_API_KEY}"
               data-component="header">
    <br>
<p>Example: <code>{YOUR_API_KEY}</code></p>
            </div>
                        </form>

                    <h2 id="users-GETapi-v1-user-search">GET api/v1/user/search</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-v1-user-search">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://myapi.peltar.id/api/v1/user/search" \
    --header "MYP_API_KEY: {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "MYP-API-KEY: {YOUR_API_KEY}"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://myapi.peltar.id/api/v1/user/search"
);

const headers = {
    "MYP_API_KEY": "{YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "MYP-API-KEY": "{YOUR_API_KEY}",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'https://myapi.peltar.id/api/v1/user/search',
    [
        'headers' =&gt; [
            'MYP_API_KEY' =&gt; '{YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'MYP-API-KEY' =&gt; '{YOUR_API_KEY}',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'https://myapi.peltar.id/api/v1/user/search'
headers = {
  'MYP_API_KEY': '{YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'MYP-API-KEY': '{YOUR_API_KEY}'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-user-search">
            <blockquote>
            <p>Example response (403):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 55
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;This action is unauthorized.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-user-search" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-user-search"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-user-search"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-user-search" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-user-search">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-user-search" data-method="GET"
      data-path="api/v1/user/search"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-user-search', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-user-search"
                    onclick="tryItOut('GETapi-v1-user-search');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-user-search"
                    onclick="cancelTryOut('GETapi-v1-user-search');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-user-search"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/user/search</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>MYP_API_KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="MYP_API_KEY" class="auth-value"               data-endpoint="GETapi-v1-user-search"
               value="{YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>{YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Content-Type"                data-endpoint="GETapi-v1-user-search"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Accept"                data-endpoint="GETapi-v1-user-search"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>MYP-API-KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="MYP-API-KEY"                data-endpoint="GETapi-v1-user-search"
               value="{YOUR_API_KEY}"
               data-component="header">
    <br>
<p>Example: <code>{YOUR_API_KEY}</code></p>
            </div>
                        </form>

                    <h2 id="users-POSTapi-v1-user-store">Store a newly created resource in storage.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-v1-user-store">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://myapi.peltar.id/api/v1/user/store" \
    --header "MYP_API_KEY: {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "MYP-API-KEY: {YOUR_API_KEY}" \
    --data "{
    \"name\": \"consequatur\",
    \"email\": \"carolyne.luettgen@example.org\",
    \"username\": \"consequatur\",
    \"id_satker\": \"consequatur\",
    \"id_subsatker\": \"consequatur\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://myapi.peltar.id/api/v1/user/store"
);

const headers = {
    "MYP_API_KEY": "{YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "MYP-API-KEY": "{YOUR_API_KEY}",
};

let body = {
    "name": "consequatur",
    "email": "carolyne.luettgen@example.org",
    "username": "consequatur",
    "id_satker": "consequatur",
    "id_subsatker": "consequatur"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'https://myapi.peltar.id/api/v1/user/store',
    [
        'headers' =&gt; [
            'MYP_API_KEY' =&gt; '{YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'MYP-API-KEY' =&gt; '{YOUR_API_KEY}',
        ],
        'json' =&gt; [
            'name' =&gt; 'consequatur',
            'email' =&gt; 'carolyne.luettgen@example.org',
            'username' =&gt; 'consequatur',
            'id_satker' =&gt; 'consequatur',
            'id_subsatker' =&gt; 'consequatur',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'https://myapi.peltar.id/api/v1/user/store'
payload = {
    "name": "consequatur",
    "email": "carolyne.luettgen@example.org",
    "username": "consequatur",
    "id_satker": "consequatur",
    "id_subsatker": "consequatur"
}
headers = {
  'MYP_API_KEY': '{YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'MYP-API-KEY': '{YOUR_API_KEY}'
}

response = requests.request('POST', url, headers=headers, json=payload)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-user-store">
            <blockquote>
            <p>Example response (403):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 54
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;This action is unauthorized.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-v1-user-store" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-user-store"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-user-store"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-user-store" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-user-store">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-user-store" data-method="POST"
      data-path="api/v1/user/store"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-user-store', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-user-store"
                    onclick="tryItOut('POSTapi-v1-user-store');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-user-store"
                    onclick="cancelTryOut('POSTapi-v1-user-store');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-user-store"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/user/store</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>MYP_API_KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="MYP_API_KEY" class="auth-value"               data-endpoint="POSTapi-v1-user-store"
               value="{YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>{YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Content-Type"                data-endpoint="POSTapi-v1-user-store"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Accept"                data-endpoint="POSTapi-v1-user-store"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>MYP-API-KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="MYP-API-KEY"                data-endpoint="POSTapi-v1-user-store"
               value="{YOUR_API_KEY}"
               data-component="header">
    <br>
<p>Example: <code>{YOUR_API_KEY}</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="name"                data-endpoint="POSTapi-v1-user-store"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="email"                data-endpoint="POSTapi-v1-user-store"
               value="carolyne.luettgen@example.org"
               data-component="body">
    <br>
<p>Must be a valid email address. Example: <code>carolyne.luettgen@example.org</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>username</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="username"                data-endpoint="POSTapi-v1-user-store"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>id_satker</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="id_satker"                data-endpoint="POSTapi-v1-user-store"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>id_subsatker</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="id_subsatker"                data-endpoint="POSTapi-v1-user-store"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>id_role</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
               name="id_role"                data-endpoint="POSTapi-v1-user-store"
               value=""
               data-component="body">
    <br>

        </div>
        </form>

                    <h2 id="users-GETapi-v1-user-show--user_uuid-">Display the specified resource.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-v1-user-show--user_uuid-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://myapi.peltar.id/api/v1/user/show/d873d0a605ef4fdf96893ff6373f0496" \
    --header "MYP_API_KEY: {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "MYP-API-KEY: {YOUR_API_KEY}"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://myapi.peltar.id/api/v1/user/show/d873d0a605ef4fdf96893ff6373f0496"
);

const headers = {
    "MYP_API_KEY": "{YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "MYP-API-KEY": "{YOUR_API_KEY}",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'https://myapi.peltar.id/api/v1/user/show/d873d0a605ef4fdf96893ff6373f0496',
    [
        'headers' =&gt; [
            'MYP_API_KEY' =&gt; '{YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'MYP-API-KEY' =&gt; '{YOUR_API_KEY}',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'https://myapi.peltar.id/api/v1/user/show/d873d0a605ef4fdf96893ff6373f0496'
headers = {
  'MYP_API_KEY': '{YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'MYP-API-KEY': '{YOUR_API_KEY}'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-user-show--user_uuid-">
            <blockquote>
            <p>Example response (403):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 53
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;This action is unauthorized.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-user-show--user_uuid-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-user-show--user_uuid-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-user-show--user_uuid-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-user-show--user_uuid-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-user-show--user_uuid-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-user-show--user_uuid-" data-method="GET"
      data-path="api/v1/user/show/{user_uuid}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-user-show--user_uuid-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-user-show--user_uuid-"
                    onclick="tryItOut('GETapi-v1-user-show--user_uuid-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-user-show--user_uuid-"
                    onclick="cancelTryOut('GETapi-v1-user-show--user_uuid-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-user-show--user_uuid-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/user/show/{user_uuid}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>MYP_API_KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="MYP_API_KEY" class="auth-value"               data-endpoint="GETapi-v1-user-show--user_uuid-"
               value="{YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>{YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Content-Type"                data-endpoint="GETapi-v1-user-show--user_uuid-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Accept"                data-endpoint="GETapi-v1-user-show--user_uuid-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>MYP-API-KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="MYP-API-KEY"                data-endpoint="GETapi-v1-user-show--user_uuid-"
               value="{YOUR_API_KEY}"
               data-component="header">
    <br>
<p>Example: <code>{YOUR_API_KEY}</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>user_uuid</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="user_uuid"                data-endpoint="GETapi-v1-user-show--user_uuid-"
               value="d873d0a605ef4fdf96893ff6373f0496"
               data-component="url">
    <br>
<p>Example: <code>d873d0a605ef4fdf96893ff6373f0496</code></p>
            </div>
                    </form>

                    <h2 id="users-POSTapi-v1-user-destroy--user_uuid-">Remove the specified resource from storage.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-v1-user-destroy--user_uuid-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://myapi.peltar.id/api/v1/user/destroy/d873d0a605ef4fdf96893ff6373f0496" \
    --header "MYP_API_KEY: {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "MYP-API-KEY: {YOUR_API_KEY}"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://myapi.peltar.id/api/v1/user/destroy/d873d0a605ef4fdf96893ff6373f0496"
);

const headers = {
    "MYP_API_KEY": "{YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
    "MYP-API-KEY": "{YOUR_API_KEY}",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'https://myapi.peltar.id/api/v1/user/destroy/d873d0a605ef4fdf96893ff6373f0496',
    [
        'headers' =&gt; [
            'MYP_API_KEY' =&gt; '{YOUR_AUTH_KEY}',
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'MYP-API-KEY' =&gt; '{YOUR_API_KEY}',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>


<div class="python-example">
    <pre><code class="language-python">import requests
import json

url = 'https://myapi.peltar.id/api/v1/user/destroy/d873d0a605ef4fdf96893ff6373f0496'
headers = {
  'MYP_API_KEY': '{YOUR_AUTH_KEY}',
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'MYP-API-KEY': '{YOUR_API_KEY}'
}

response = requests.request('POST', url, headers=headers)
response.json()</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-user-destroy--user_uuid-">
            <blockquote>
            <p>Example response (403):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 52
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;This action is unauthorized.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-v1-user-destroy--user_uuid-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-user-destroy--user_uuid-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-user-destroy--user_uuid-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-user-destroy--user_uuid-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-user-destroy--user_uuid-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-user-destroy--user_uuid-" data-method="POST"
      data-path="api/v1/user/destroy/{user_uuid}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-user-destroy--user_uuid-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-user-destroy--user_uuid-"
                    onclick="tryItOut('POSTapi-v1-user-destroy--user_uuid-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-user-destroy--user_uuid-"
                    onclick="cancelTryOut('POSTapi-v1-user-destroy--user_uuid-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-user-destroy--user_uuid-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/user/destroy/{user_uuid}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>MYP_API_KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="MYP_API_KEY" class="auth-value"               data-endpoint="POSTapi-v1-user-destroy--user_uuid-"
               value="{YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>{YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Content-Type"                data-endpoint="POSTapi-v1-user-destroy--user_uuid-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Accept"                data-endpoint="POSTapi-v1-user-destroy--user_uuid-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>MYP-API-KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="MYP-API-KEY"                data-endpoint="POSTapi-v1-user-destroy--user_uuid-"
               value="{YOUR_API_KEY}"
               data-component="header">
    <br>
<p>Example: <code>{YOUR_API_KEY}</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>user_uuid</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="user_uuid"                data-endpoint="POSTapi-v1-user-destroy--user_uuid-"
               value="d873d0a605ef4fdf96893ff6373f0496"
               data-component="url">
    <br>
<p>Example: <code>d873d0a605ef4fdf96893ff6373f0496</code></p>
            </div>
                    </form>

            

        
    </div>
    <div class="dark-box">
                    <div class="lang-selector">
                                                        <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                                        <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                                                        <button type="button" class="lang-button" data-language-name="php">php</button>
                                                        <button type="button" class="lang-button" data-language-name="python">python</button>
                            </div>
            </div>
</div>
</body>
</html>
