Material management
=======

Proof of concept - hexagonal architecture

## Initialization

- configure DB connect ``app/config/parameters.yml``
- run update db ``php app/console doctrine:database:create``
- run update db ``php app/console doctrine:schema:update --force``

## Test's command

To run behat Domain tests

- ``php bin/behat --suite="DomainCategory"``
- ``php bin/behat --suite="DomainUnit"``
- ``php bin/behat --suite="DomainMaterial"``

Scenarios are at folder ``features/Domain``


To run behat AppBundle tests

- ``php bin/behat --suite="AppBundle"``

For AppBundle tests, need to
- run server by php by default -> ``php app/console server:run``
- or create vHost and change destination host in ``behat.yml.dist`` from ``http://localhost:8000``




