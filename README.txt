=== Plugin Name ===
Contributors: MikeGillihan, purposewp
Donate link: https://purposewp.com
Tags: author box, author bio, Beaver Builder, Beaver Builder Theme
Requires at least: 4.0.1
Tested up to: 4.6
Stable tag: 4.3
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Easily add an Author Box to your Beaver Builder theme powered site.

== Description ==

This is the long description.  No limit, and you can use Markdown (as well as in the following sections).

For backwards compatibility, if this section is missing, the full length of the short description will be used, and
Markdown parsed.

A few notes about the sections above:

*   "Contributors" is a comma separated list of wp.org/wp-plugins.org usernames
*   "Tags" is a comma separated list of tags that apply to the plugin
*   "Requires at least" is the lowest version that the plugin will work on
*   "Tested up to" is the highest version that you've *successfully used to test the plugin*. Note that it might work on
higher versions... this is just the highest one you've verified.
*   Stable tag should indicate the Subversion "tag" of the latest stable version, or "trunk," if you use `/trunk/` for
stable.

    Note that the `readme.txt` of the stable tag is the one that is considered the defining one for the plugin, so
if the `/trunk/readme.txt` file says that the stable tag is `4.3`, then it is `/tags/4.3/readme.txt` that'll be used
for displaying information about the plugin.  In this situation, the only thing considered from the trunk `readme.txt`
is the stable tag pointer.  Thus, if you develop in trunk, you can update the trunk `readme.txt` to reflect changes in
your in-development version, without having that information incorrectly disclosed about the current stable version
that lacks those changes -- as long as the trunk's `readme.txt` points to the correct stable tag.

    If no stable tag is provided, it is assumed that trunk is stable, but you should specify "trunk" if that's where
you put the stable version, in order to eliminate any doubt.

== Installation ==

Install Easy Author Box for Beaver builder via the plugin directory, or by uploading the files manually to your server.

e.g.

1. Upload the `pwp-easy-author-box` folder to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress

The plugin only has one configuration setting, Author Box Position, which can be accessed from within the Customizer in the Content > Post Layout settings.

The Author Box pulls directly from the author's User Profile. Make sure to complete your update your Gravatar, add a Biography and add any of the associated social media profiles.


== Frequently Asked Questions ==

= I activated the plugin, why isn't the Author Box being displayed?  =

Check to make sure you are viewing a post and that the author has added a bio to their user profile.

= How do I change the location of the author box? =

You can change the location of the author box by navigating to Content > Post Layout in the Customizer and modifying the Author Box Position setting.

There are three position options available: Above the Content, After the Content, After Post Meta.

== Screenshots ==

1. This screen shot description corresponds to screenshot-1.(png|jpg|jpeg|gif). Note that the screenshot is taken from
the /assets directory or the directory that contains the stable readme.txt (tags or trunk). Screenshots in the /assets
directory take precedence. For example, `/assets/screenshot-1.png` would win over `/tags/4.3/screenshot-1.png`
(or jpg, jpeg, gif).
2. This is the second screen shot
