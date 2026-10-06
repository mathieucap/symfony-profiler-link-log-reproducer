# Reproducer: ProfilerLinkLogListener turns the response into a 500

`ProfilerLinkLogListener` (symfony/symfony#60505) generates the `_profiler` URL without catching
`RouteNotFoundException`. In the `test` environment, the recipe does not import the profiler routes,
so any request made after `$client->enableProfiler()` answers with a 500.

```bash
composer install
php bin/phpunit
```

- `testWithoutProfiler` passes.
- `testWithProfiler` fails: `Unable to generate a URL for the named route "_profiler" as such route does not exist.`

Relevant changes on top of `symfony/skeleton:8.2.x-dev`: [`src/Controller/HomeController.php`](src/Controller/HomeController.php)
and [`tests/ProfilerLinkLogTest.php`](tests/ProfilerLinkLogTest.php).
