<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Text;
use MoonShine\Fields\Slug;
use MoonShine\Fields\Number;
use MoonShine\Fields\Field;
use MoonShine\Fields\Relationships\BelongsTo;

class CategoryResource extends ModelResource
{
    protected string $model = Category::class;

    protected string $title = 'Categories';

    protected string $column = 'Title';

    protected array $with = ['category'];

    public function fields(): array
    {
        return [
            Block::make([
                ID::make()->sortable(),
                //BelongsTo::make('Parent', 'category', resource: new CategoryResource()),
                Text::make('title')
                    ->setLabel(
                        'Заголовок'
                    )
                    ->updateOnPreview()
                    ->required(),
                Text::make('description')
                    ->setLabel(
                        'Описание'
                    )
                    ->required(),
                Slug::make('Slug')->from('Title')->separator('-'),
                Number::make('Sorting')->buttons()->default(0),
            ]),
        ];
    }

    public function rules(Model $item): array
    {
        return [];
    }
}
