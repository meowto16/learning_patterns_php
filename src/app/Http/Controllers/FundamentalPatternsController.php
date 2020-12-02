<?php

namespace App\Http\Controllers;

use App\DesignPatterns\Fundamental\Delegation\AppMessenger;
use App\DesignPatterns\Fundamental\EventChannel\EventChannelJob;
use App\DesignPatterns\Fundamental\PropertyContainer\BlogPost;

class FundamentalPatternsController extends Controller
{
    /**
     * Демонстрация шаблона проектирования "Контейнер свойств (англ. property container)
     */
    public function PropertyContainer()
    {
        $item = new BlogPost();

        $item->setTitle('Заголовок статьи');
        $item->setCategory(10);

        $item->addProperty('view_count', 100);

        $item->addProperty('last_update', '2030-02-01');
        $item->setProperty('last_update', '2030-02-02');

        $item->addProperty('read_only', true);
        $item->deleteProperty('read_only');

        \Debugbar::info($item);

        return view('welcome', ['pattern' => __FUNCTION__]);
    }

    /**
     * Демонстрация шаблона проектирования - "Делегирование"
     */
    public function Delegation()
    {
        $appMessenger = new AppMessenger();

        $appMessenger->setSender('sender@email.net')
            ->setRecipient('recipient@email.net')
            ->setMessage('Hello email messenger!')
            ->send();

        $appMessenger->toSms()
            ->setSender('11111111')
            ->setRecipient('2222222222')
            ->setMessage('Hello SMS messenger!')
            ->send();

        \DebugBar::info($appMessenger);

        return view('welcome', ['pattern' => __FUNCTION__]);
    }

    /**
     * Демонстрация шаблона проектирования - "Канал событий (Event Channel)"
     */
    public function EventChannel()
    {
        $item = new EventChannelJob();
        $item->run();

        return view('welcome', ['pattern' => __FUNCTION__]);
    }

    /**
     * Демонстрация шаблона проектирования - "Интерфейс (Interface)"
     * ... В видео не было кода
     */
    public function Interface()
    {
        return view('welcome', ['pattern' => __FUNCTION__]);
    }
}
