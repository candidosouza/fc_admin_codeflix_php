<?php

namespace Tests\Unit\UseCase\Category;

use Core\Domain\Entity\Category;
use Core\Domain\Repository\CategoryRepositoryInterface;
use Core\Domain\UseCase\Category\CreateCategoryUseCase as CategoryCreateCategoryUseCase;
use Core\UseCase\Category\CreateCategoryUseCase;
// use Core\UseCase\DTO\Category\CreateCategory\{
//     CategoryCreateInputDto,
//     CategoryCreateOutputDto
// };
use Mockery;
use PHPUnit\Framework\TestCase;
use Ramsey\Uuid\Uuid;
use stdClass;

class CreateCategoryUseCaseUnitTest extends TestCase
{
    public function testCreateNewCategory()
    {
        $uuid = (string) Uuid::uuid4()->toString();
        $categoryName = 'name cat';
        $this->mockEntity = Mockery::mock(Category::class, [$uuid, $categoryName]);
        $this->mockRepo = Mockery::mock(stdClass::class, CategoryRepositoryInterface::class);
        $this->mockRepo->shouldReceive('insert')->andReturn();
        $useCase = new CreateCategoryUseCase($this->mockRepo);
        $useCase->execute();
        $this->assertTrue(true);
        Mockery::close();
    }
}
