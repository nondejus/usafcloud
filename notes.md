# Notes :)

# Laravel Packages

-   Core
    -- Updated for 5.8: DONE
-   Telescope
    -- Status: Done
    -- Updated for 5.8: DONE
-   Horizon
    -- Status: Done
    -- Updated for 5.8: DONE
-   Passport
    -- Status: Started
    -- Updated for 5.8: DONE
    -- Modified for UUIDs on the user_id's
-   Helpers
    -- installed
-   UUID
    -- https://github.com/webpatser/laravel-uuid
    -- https://medium.com/@didin.ahmadi/implement-uuid-on-authentication-built-in-laravel-5-7-e289e6a5a9a5
    -- https://medium.com/@steveazz/setting-up-uuids-in-laravel-5-552412db2088

# Ideas

-   Main domain: usaf.cloud
-   Subdomains
    -- auth.usaf.cloud

# Auth.usaf.cloud

-   Will be an oauth2 provider

# User registration

-   locked down to:
    -- usaf.af.mil
    -- usaf.cloud

# OAuth

-   Resource Owner: User
-   Resource Server: Usaf.cloud
-   Client: Rogue.usaf.cloud
-   Auth Server:

https://developer.okta.com/blog/2017/06/21/what-the-heck-is-oauth

# Flow

1. User wants to sign into rogue
2. Redirect user to auth.usaf.cloud
3. User successfully logs in to usaf.cloud
4. User has an account at usaf.cloud, so grant them access to rogue

# Google

-   https://developers.google.com/admin-sdk/directory/v1/guides/delegation
-   https://developers.google.com/admin-sdk/directory/v1/reference/users/insert?authuser=1#auth
-   https://developers.google.com/admin-sdk/directory/v1/reference/
-   https://gist.github.com/fillup/9fbf5ff35b337b27762a
-   https://developers.google.com/admin-sdk/directory/v1/reference/users
-   https://michaelseiler.net/2014/12/16/google-admin-sdk-api-with-php/
-   https://developers.google.com/api-client-library/php/auth/service-accounts#creatinganaccount
-   https://developers.google.com/admin-sdk/directory/v1/guides/authorizing
-   https://developers.google.com/api-client-library/php/auth/service-accounts
