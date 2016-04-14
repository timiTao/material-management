[![License](https://poser.pugx.org/timitao/material-management/license.svg)](https://packagist.org/packages/timitao/material-management)
[![Latest Stable Version](https://poser.pugx.org/timitao/material-management/v/stable.svg)](https://packagist.org/packages/timitao/material-management)
[![Latest Unstable Version](https://poser.pugx.org/timitao/material-management/v/unstable.svg)](https://packagist.org/packages/timitao/material-management)
[![Total Downloads](https://poser.pugx.org/timitao/material-management/downloads.svg)](https://packagist.org/packages/timitao/material-management)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/d4577aab-945e-4a50-9615-01890dfc8946/mini.png)](https://insight.sensiolabs.com/projects/d4577aab-945e-4a50-9615-01890dfc8946)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/timiTao/material-management/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/timiTao/material-management/?branch=master)
[![Build Status](https://travis-ci.org/timiTao/BehatDbalExtension.svg?branch=master)](https://travis-ci.org/timiTao/material-management)


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

## Versioning

Staring version ``1.0.0``, will follow [Semantic Versioning v2.0.0](http://semver.org/spec/v2.0.0.html).

## Contributors

* Tomasz Kunicki [TimiTao](http://github.com/timiTao) [lead developer]



