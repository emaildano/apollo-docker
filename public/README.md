# Apollo

#### A WordPress craft launched with Composer, manned with automation.

## About

Apollo is a two stage unit: A WordPress Stack built with Composer, and a Starter Theme packed with Sass, Gulp, Bower, and a Theme Wrapper structure.


#### Minimum Requirements (Stack)
Versions listed are required to be equal to or greater than.

- PHP v5.4.3
- [Composer] (https://getcomposer.org/) v1.0.0-alpha8

## Quick Start

```
$ git clone https://github.com/megumiteam/shifter-base.git
$ cd shifter-base
$ composer create-project
```

## Usage & Installation

Make sure you have everything listed in the above requirements installed & download this repo (or clone it and [change the remote repo](https://help.github.com/articles/changing-a-remote-s-url/) url).

- Open your terminal, `cd` into the directory you just cloned (base directory).
- Edit `composer.json` to add plugins as needed. See [Adding Plugins](#adding-plugins)
- Run `composer create-project`
- Point server hosts to the base directory.
- Edit the `wp-config` that is created in the base directory with your database and url credentials.


## Stack Setup

Apollo creates a stack that defers from a typical WordPress install. Apollo uses Composer to build out a managed instance, so the file structure is changed a bit. `wp-content` (themes, plugins, uploads, etc.) is redirected to `app`. WordPress files live in `wp`.

You should never edit files in `wp`, as changes are not tracked in git. Additionally, files in `app/plugins`, `app/uploads`, and `app/mu-plugins` are not tracked in git. Why? Because plugins and mu-plugins are managed through composer, and uploads are costly files to track in git. It's the price of automation :)

_Note: Due to the setup of the stack, Apollo does not play well in environments where a typical WordPress install is expected (such as using CiviCRM or Pantheon for deployment)._

## Configuration

### Site Configuration
Apollo creates a `wp-config` file in the base project directory. Edit the database configuration as normal. Update the `WP_HOME` and `WP_SITEURL` definitions to match your enviornment urls. `WP_SITEURL` should always end with `/wp`.

### Environment Configuration
Environments are controlled via the `WP_ENV` definition in `wp-config.php` and should be one of the following options:

- `development`
- `staging`
- `production`

This definition controls how errors are output and whether or not certain functions should be ran. Local development? Use `development`. Site running live? Use `production`. Testing on a staging server?...take a guess.

#### Want to change or add environmental attributes?
See `lib/config/apollo-config.php`.


## WordPress Versions
Apollo uses the [John Bloch Composer Repo] (https://github.com/johnpbloch/wordpress-core-installer) to install WordPress. To update WP, simply update the version of `"johnpbloch/wordpress"` in `composer.json` to match the version of WordPress you would like.


## Adding Plugins
Apollo's `composer.json` is setup to connect with the [WordPress Packagist] (http://wpackagist.org/) library. If you want to use a plugin, find it in the WordPress plugin repo, and copy the slug. In `composer.json`, add the plugin slug prepended by `wpackagist-plugin/` and its version in the `require` array.

Example:
    `"wpackagist-plugin/duplicate-post": "~2.6",`
