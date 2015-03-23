# PhpStarter
Takes care preparing PHP's settings to let you work on a well written project

```php
\Paq\PhpStarter\PhpStarter::start();
```

What does it do?

- Report all Errors
- Convert PHP Errors, Notices etc. to Exceptions

Why?

- Having error reporting enabled with conversion to exceptions gives you full control over your code.
It makes writing automatic tests easier which let's you provide much better software.
Many people disable error reporting in Production. IMHO it should be ENABLED on all environments.

## Convert PHP Errors, Notices etc. to Exceptions
If you only want to convert PHP Errors to Exceptions use 

```php
\Paq\PhpStarter\PhpStarter::convertErrorsToExceptions();
```

# Tips
You SHOULD NOT use "@" (Inline Error Suppression) in your code.

See [PHP The Right Way: Errors and Exceptions](http://www.phptherightway.com/#errors_and_exceptions)

# Credits
Thanks to 

- [Xstream](http://www.xstream.net) Ingest development team.

# Useful links

- [PHP The Right Way](http://www.phptherightway.com/)