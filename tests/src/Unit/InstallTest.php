<?php

declare(strict_types=1);

namespace Drupal\Tests\open_knowledge\Unit;

use Drupal\Core\DependencyInjection\ContainerBuilder;
use Drupal\Core\Entity\EntityStorageInterface;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\Tests\UnitTestCase;

require_once __DIR__ . '/../../../open_knowledge.install';

/**
 * Tests the open_knowledge_install function.
 *
 * @group open_knowledge
 */
class InstallTest extends UnitTestCase {

  /**
   * The container.
   *
   * @var \Drupal\Core\DependencyInjection\ContainerBuilder
   */
  protected $container;

  /**
   * The entity type manager.
   *
   * @var \Drupal\Core\Entity\EntityTypeManagerInterface|\PHPUnit\Framework\MockObject\MockObject
   */
  protected $entityTypeManager;

  /**
   * The user storage.
   *
   * @var \Drupal\Core\Entity\EntityStorageInterface|\PHPUnit\Framework\MockObject\MockObject
   */
  protected $userStorage;

  /**
   * The shortcut storage.
   *
   * @var \Drupal\Core\Entity\EntityStorageInterface|\PHPUnit\Framework\MockObject\MockObject
   */
  protected $shortcutStorage;

  /**
   * {@inheritdoc}
   */
  protected function setUp(): void {
    parent::setUp();
    $this->container = new ContainerBuilder();
    \Drupal::setContainer($this->container);

    $this->entityTypeManager = $this->createMock(EntityTypeManagerInterface::class);
    $this->container->set('entity_type.manager', $this->entityTypeManager);

    $this->userStorage = $this->createMock(EntityStorageInterface::class);
    $this->shortcutStorage = $this->createMock(EntityStorageInterface::class);
  }

  /**
   * Tests the open_knowledge_install function. hook_install().
   *
   * @coversFunction open_knowledge_install
   */
  public function testOpenKnowledgeInstall() {
    $this->entityTypeManager->expects($this->exactly(2))
      ->method('getStorage')
      ->willReturn($this->userStorage, $this->shortcutStorage);

    $user = $this->createMock('Drupal\user\Entity\User');
    $this->userStorage->expects($this->once())
      ->method('load')
      ->with(1)
      ->willReturn($user);
    $user->expects($this->once())
      ->method('addRole')
      ->with('administrator');
    $user->expects($this->once())
      ->method('save');

    $shortcut = $this->createMock('Drupal\shortcut\Entity\Shortcut');
    $this->shortcutStorage->expects($this->exactly(2))
      ->method('create')
      ->willReturn($shortcut);
    $shortcut->expects($this->exactly(2))
      ->method('save');

    open_knowledge_install();
  }

}
