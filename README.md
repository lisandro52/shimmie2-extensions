# shimmie2-extensions
A little collection of extensions for the [shimmie2 project](https://github.com/shish/shimmie2)

Description
-----------

#### Mass Remover

Based off the 'Mass Tagger' extension that is currently part of the shimmie2 extensions package, this plugin lets you select pictures on-the-fly from the current page by clicking them, to be removed later on by confirming the selection.


#### Users Only

This little extension only allows registered users to view __any__ page from the booru, if enabled. The only two pages left out from the prohibition are the registration page (which can alse be disabled by yet another extension) and the login page.

**Quick installation process**

Once you are inside your shimmie2's root folder, run the following commands:
```language-bash
cd ext/
git init .
git remote add -t \* -f origin https://github.com/lisandro52/shimmie2-extensions
git checkout master
```
The reason for not simply cloning the repo is that you __can not__ make a git clone into your `ext` folder, because it's a not empty folder, and thus, the `git clone` command will fail.

You can also clone the repo as you normally would, and then move the two folders into `ext` manually.

---

Note that probably your shimmie2 folder will be owned by `www-data` (or the user your web server uses) so you will need to execute the git commands with `root` privileges. Another option would be to log in as your web server's user to execute these commands.
If you choose to execute them with `root` privileges, remember to change the ownership of the downloaded folders to your web server's user, and the file permissions to `755`.
