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
