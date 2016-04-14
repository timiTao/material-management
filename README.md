Material management
=======

Proof of concept - hexagonal architecture

## Domain

Logic is in project [Material-management-domain](https://github.com/timiTao/material-management-domain)

## Initialization

- configure DB connect ``app/config/parameters.yml``
- run update db ``php app/console doctrine:database:create``
- run update db ``php app/console doctrine:schema:update --force``

## Test's command

To run behat AppBundle tests

- ``php bin/behat --suite="AppBundle"``

For AppBundle tests, need to
- run server by php by default -> ``php app/console server:run``
- or create vHost and change destination host in ``behat.yml.dist`` from ``http://localhost:8000``




