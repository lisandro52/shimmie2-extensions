# shimmie2-extensions
A little collection of extensions for the [shimmie2 project](https://github.com/shish/shimmie2)

**Quick installation process**

Once you are inside your shimmie2's root folder:
```
cd ext/
git init .
git remote add -t \* -f origin https://github.com/lisandro52/shimmie2-extensions
git checkout master
```

Note that probably your shimmie2 folder will be owned by `www-data` (or the user your web server uses) so you will need to execute the git commands with `root` privileges. Another option would be to log in as your web server's user to execute this commands.
If you choose to execute them with `root` privileges, remember to change the ownership of the downloaded folders to your web server's user, and the file permissions to `755`.
