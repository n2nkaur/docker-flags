<?php
namespace App\Application\Actions;

use Psr\Container\ContainerInterface;

use App\Domain\Country\CountryRepository;
use Slim\Views\PhpRenderer;

class AbstractController {
  /**
   * @var ContainerInterface
   */
  protected $container;

  public function __construct(ContainerInterface $conainter) {
    $this->container = $conainter;
  }

  protected function getCountryRepository (): CountryRepository {
    return $this->container->get(CountryRepository::class);
  }

  protected function getView (): PhpRenderer {
    return $this->container->get(PhpRenderer::class);
  }
}
