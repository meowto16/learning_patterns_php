@php
    $themes = [
        'fundamental' => [
            'name' => 'Фундаментальные <br>(Fundamental)',
            'routes' => [
                'delegation' => ['name' => 'Делегирование (Delegation)', 'route' => route('fundamentals.delegation')],
                'eventChannel' => ['name' => 'Канал событий (Event channel)', 'route' => route('fundamentals.eventChannel')],
                'interface' => ['name' => 'Интерфейс (Interface)', 'route' => route('fundamentals.interface')],
                'propertyContainer' => ['name' => 'Контейнер свойств (Property Container)', 'route' => route('fundamentals.propertyContainer')],
            ]
        ],
        'creational' => [
            'name' => 'Порождающие <br>(Creational)',
            'routes' => [
                'abstractFactory' => ['name' => 'Абстрактная фабрика (Abstract factory)', 'route' => route('creational.abstractFactory')],
                'builder' => ['name' => 'Строитель (Builder)', 'route' => route('creational.builder')],
                'factoryMethod' => ['name' => 'Фабричный метод (Factory method)', 'route' => route('creational.factoryMethod')],
                'lazyInitialization' => ['name' => 'Ленивая загрузка (Lazy initialization)', 'route' => route('creational.lazyInitialization')],
                'multiton' => ['name' => 'Мультитон (Multiton)', 'route' => route('creational.multiton')],
                'simpleFactory' => ['name' => 'Простая фабрика (Simple factory)', 'route' => route('creational.simpleFactory')],
                'singleton' => ['name' => 'Одиночка (Singleton)', 'route' => route('creational.singleton')],
                'staticFactory' => ['name' => 'Статичная фабрика (Static factory)', 'route' => route('creational.staticFactory')],
                'Prototype' => ['name' => 'Прототип (Prototype)', 'route' => route('creational.prototype')],
            ]
        ],
        'behavioral' => [
            'name' => 'Поведенческие <br>(Behavioral)',
            'routes' => [
               'strategy' => ['name' => 'Стратегия (Strategy)', 'route' => route('behavioral.strategy')],
            ]
        ],
        'structural' => [
            'name' => 'Структурные <br>(Structural)',
            'routes' => []
        ]
    ];
@endphp

<div class="row">
    @foreach ($themes as $themeKey => $theme)
        <div class="col-6">
            <div class="p-3 bg-white">
                <h2>{!! $theme['name'] !!}</h2>
                <hr class="my-4">
                @if (count($theme['routes']))
                    <div class="list-group">
                        @foreach ($theme['routes'] as $routeKey => $route)
                            <a href="{{ $route['route'] }}" class="list-group-item link {{
                                mb_strtolower($routeKey) ===  mb_strtolower($pattern ?? '') ? 'active' : ''
                            }}">
                                {{ $route['name'] }}
                            </a>
                        @endforeach
                    </div>
                @else
                    <p>Пока нету :(</p>
                @endif
                <div class="list-group">
                </div>
            </div>
        </div>
    @endforeach
</div>
