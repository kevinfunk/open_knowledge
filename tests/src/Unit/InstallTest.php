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
   * The workflow storage.
   *
   * @var \Drupal\Core\Entity\EntityStorageInterface|\PHPUnit\Framework\MockObject\MockObject
   */
  protected $workflowStorage;

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
    $this->workflowStorage = $this->createMock(EntityStorageInterface::class);
  }

  /**
   * Tests the open_knowledge_install function. hook_install().
   *
   * @coversFunction open_knowledge_install
   */
  public function testOpenKnowledgeInstall() {
    $this->entityTypeManager->expects($this->exactly(3))
      ->method('getStorage')
      ->willReturnMap([
        ['user', $this->userStorage],
        ['shortcut', $this->shortcutStorage],
        ['workflow', $this->workflowStorage],
      ]);

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

    $workflow = $this->createMock('Drupal\Core\Config\Config');
    $workflow->expects($this->once())
      ->method('get')
      ->with('type_settings')
      ->willReturn(['entity_types' => ['node' => []]]);
    $workflow->expects($this->once())
      ->method('set')
      ->with('type_settings', ['entity_types' => ['node' => ['article']]])
      ->willReturnSelf();
    $workflow->expects($this->once())
      ->method('save');
    $this->workflowStorage->expects($this->once())
      ->method('load')
      ->with('knowledge')
      ->willReturn($workflow);

    open_knowledge_install();
  }

}
