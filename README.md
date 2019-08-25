# Repositor

Simple app in Symfony, returning the last commit hash on Vsc services.
Current exist only a GitHub implementation.

## Example usage

In command line:
```
bin/console repositor:get-last-commit-hash justinrainbow/json-schema gh-pages
```
result:
```
0c321631adbb88e3e5ea2ffffeb0207691f93751
```